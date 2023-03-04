<?php

namespace App\Http\Livewire;

use App\Actions\CreateOrder;
use App\Enums\{DeliveryMethod, PaymentMethod};
use App\Models\{Cart, Order};
use App\Settings\ShippingSettings;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;
use Livewire\Component;

class Checkout extends Component
{
    public array $state = [
        'customer' => [
            'phone' => '+421 ',
        ],
        'purchasingAsCompany' => false,
        'shippingAddress' => [
            'countryCode' => 'SK',
        ],
        'billingAddress' => [
            'countryCode' => 'SK',
        ],
        'sameAddress' => true,
        'deliveryMethod' => 'courier',
        'paymentMethod' => 'card',
    ];

    public ?Cart $cart;

    public ?Order $order;

    public function mount(): void
    {
        $this->order = Order::find(session()->get('order_id'));

        if (! $this->order) {
            $this->cart = cart()->model();
        }
    }

    public function order()
    {
        $this->validate();

        $deliveryMethod = $this->deliveryMethods->firstWhere('key', $this->state['deliveryMethod']);
        $paymentMethod = collect(app(ShippingSettings::class)->payment_methods)->firstWhere('key', $this->state['paymentMethod']);

        $this->state['fees'] = [
            'deliveryFee' => [
                'name' => $deliveryMethod['name'],
                'fee' => $deliveryMethod['fee'],
            ],
            'paymentFee' => [
                'name' => $paymentMethod['name'],
                'fee' => $paymentMethod['fee'],
            ],
        ];

        $this->state['total'] = $this->total;

        $this->order = app(CreateOrder::class)->order($this->state);

        session()->put('order_id', $this->order->id);

        if ($this->state['paymentMethod'] !== 'card') {
            return to_route('pages.thanks');
        }
    }

    public function getIntentSecretProperty(): string
    {
        $intentId = session()->get('intent_id');

        if (! $intentId) {
            $intent = app('stripe')->paymentIntents->create([
                'amount' => (int) ($this->total * 100),
                'currency' => 'eur',
                'automatic_payment_methods' => [
                    'enabled' => 'true',
                ],
                'setup_future_usage' => 'on_session',
            ]);

            session()->put('intent_id', $intent->id);
        } else {
            $intent = app('stripe')->paymentIntents->retrieve($intentId);
        }

        return $intent->client_secret;
    }

    public function getTotalProperty(): float
    {
        return cart()->total()
            + $this->deliveryMethods->firstWhere('key', $this->state['deliveryMethod'])['fee']
            + $this->paymentMethods->firstWhere('key', $this->state['paymentMethod'])['fee'];
    }

    public function getDeliveryMethodsProperty(): Collection
    {
        return collect(app(ShippingSettings::class)->delivery_methods);
    }

    public function getPaymentMethodsProperty(): Collection
    {
        return collect(app(ShippingSettings::class)->payment_methods)
            ->whereIn('key', $this->deliveryMethods->firstWhere('key', $this->state['deliveryMethod'])['allowedPaymentMethods']);
    }

    public function rules(): array
    {
        return [
            'state.customer.firstName' => ['required', 'string', 'max:255'],
            'state.customer.lastName' => ['required', 'string', 'max:255'],
            'state.customer.phone' => ['required', 'string', 'min:10', 'max:255'],
            'state.customer.email' => ['required', 'email', 'max:255'],
            'state.purchasingAsCompany' => ['boolean'],
            'state.customer.company.name' => ['required_if:state.purchasingAsCompany,true', 'string', 'max:255'],
            'state.customer.company.businessNo' => ['required_if:state.purchasingAsCompany,true', 'numeric', 'max_digits:8'],
            'state.customer.company.taxNo' => ['required_if:state.purchasingAsCompany,true', 'numeric', 'max_digits:10'],
            'state.customer.company.vatNo' => ['string', 'alpha_num:ascii', 'max:12'],
            'state.shippingAddress.street' => ['required', 'string', 'max:255'],
            'state.shippingAddress.city' => ['required', 'string', 'max:255'],
            'state.shippingAddress.postCode' => ['required', 'string', 'max:6'],
            'state.shippingAddress.countryCode' => ['required', Rule::in(['SK'])],
            'state.sameAddress' => ['boolean'],
            'state.billingAddress.street' => ['required_if:state.sameAddress,false', 'string', 'max:255'],
            'state.billingAddress.city' => ['required_if:state.sameAddress,false', 'string', 'max:255'],
            'state.billingAddress.postCode' => ['required_if:state.sameAddress,false', 'string', 'max:6'],
            'state.billingAddress.countryCode' => ['required_if:state.sameAddress,false', Rule::in(['SK'])],
            'state.deliveryMethod' => ['required', new Enum(DeliveryMethod::class)],
            'state.paymentMethod' => ['required', new Enum(PaymentMethod::class)],
            'state.consent' => ['accepted'],
        ];
    }

    public function render(): View
    {
        return view('livewire.checkout.form');
    }
}
