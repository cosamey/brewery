<?php

namespace App\Http\Livewire;

use App\Actions\CreateOrder;
use App\Enums\{DeliveryMethod, PaymentMethod};
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;
use Livewire\{Component, Redirector};

class CheckoutForm extends Component
{
    public array $state = [
        'customer' => [
            'phone' => '+421 ',
        ],
        'purchasingAsCompany' => false,
        'shippingAddress' => [
            'countryCode' => 'SK',
        ],
        'sameAddress' => true,
        'deliveryMethod' => 'courier',
        'paymentMethod' => 'card',
    ];

    public function order(): RedirectResponse|Redirector
    {
        $this->validate();

        app(CreateOrder::class)->order($this->state);

        return to_route('pages.thanks');
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function rules(): array
    {
        return [
            'state.customer.firstName' => ['required', 'string', 'max:255'],
            'state.customer.lastName' => ['required', 'string', 'max:255'],
            'state.customer.phone' => ['required', 'string', 'min:10', 'max:255'],
            'state.customer.email' => ['required', 'email', 'max:255'],
            'state.purchasingAsCompany' => [],
            'state.customer.company.name' => ['required_if:state.purchasingAsCompany,true', 'string', 'max:255'],
            'state.customer.company.businessId' => ['required_if:state.purchasingAsCompany,true', 'string', 'max:255'],
            'state.customer.company.taxId' => ['required_if:state.purchasingAsCompany,true', 'string', 'max:255'],
            'state.customer.company.vatId' => ['string', 'max:255'],
            'state.shippingAddress.street' => ['required', 'string', 'max:255'],
            'state.shippingAddress.city' => ['required', 'string', 'max:255'],
            'state.shippingAddress.postCode' => ['required', 'string', 'max:6'],
            'state.shippingAddress.countryCode' => ['required', Rule::in(['SK'])],
            'state.sameAddress' => [],
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
