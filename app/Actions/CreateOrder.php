<?php

namespace App\Actions;

use App\Enums\{AddressType, CartStatus, CustomerType, OrderStatus, PaymentStatus};
use App\Models\{Cart, Customer, Order};

class CreateOrder
{
    public function order(array $data): Order
    {
        $customer = Customer::create([
            'first_name' => $data['customer']['firstName'],
            'last_name' => $data['customer']['lastName'],
            'type' => $data['purchasingAsCompany']
                ? CustomerType::Company
                : CustomerType::Individual,
            'company' => $data['purchasingAsCompany']
                ? $data['customer']['company']['name']
                : null,
            'email' => $data['customer']['email'],
            'phone' => $data['customer']['phone'],
            'meta' => array_filter([
                'business_no' => $data['customer']['company']['businessNo'] ?? null,
                'tax_no' => $data['customer']['company']['taxNo'] ?? null,
                'vat_no' => $data['customer']['company']['vatNo'] ?? null,
            ], fn ($value) => ! empty($value)),
        ]);

        $shippingAddress = $customer->addresses()->create([
            'type' => AddressType::Shipping,
            'street' => $data['shippingAddress']['street'],
            'city' => $data['shippingAddress']['city'],
            'post_code' => $data['shippingAddress']['postCode'],
            'country_code' => $data['shippingAddress']['countryCode'],
        ]);

        if (! $data['sameAddress']) {
            $billingAddress = $customer->addresses()->create([
                'type' => AddressType::Billing,
                'street' => $data['billingAddress']['street'],
                'city' => $data['billingAddress']['city'],
                'post_code' => $data['billingAddress']['postCode'],
                'country_code' => $data['billingAddress']['countryCode'],
            ]);
        }

        $cart = Cart::find(session()->get('cart_id'));

        $order = $customer->orders()->create([
            'cart_id' => $cart->id,
            'shipping_address_id' => $shippingAddress->id,
            'billing_address_id' => $billingAddress?->id ?? $shippingAddress->id,
            'status' => OrderStatus::Pending,
            'delivery_method' => $data['deliveryMethod'],
            'payment_method' => $data['paymentMethod'],
            'fees' => array_filter($data['fees'], fn ($value) => $value['fee'] > 0),
            'total' => $data['total'],
            'notes' => $data['notes'] ?? null,
        ]);

        $order->payment()->create([
            'intent_id' => null,
            'status' => PaymentStatus::Pending,
            'amount' => $data['total'],
        ]);

        $cart->update([
            'customer_id' => $customer->id,
            'status' => CartStatus::Completed,
            'completed_at' => now(),
        ]);

        return $order;
    }
}
