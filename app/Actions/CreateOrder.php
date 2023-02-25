<?php

namespace App\Actions;

use App\Enums\{AddressType, CartStatus, CustomerType, OrderStatus};
use App\Models\{Cart, Customer, Order};

class CreateOrder
{
    public function order(array $data): Order
    {
        $customer = Customer::create([
            'name' => $data['purchasingAsCompany']
                ? $data['company']['name']
                : $data['firstName'].' '.$data['lastName'],
            'type' => $data['purchasingAsCompany']
                ? CustomerType::Company
                : CustomerType::Individual,
            'email' => $data['email'],
            'phone' => $data['phone'],
            'business_id' => $data['company']['businessId'] ?? null,
            'tax_id' => $data['company']['taxId'] ?? null,
            'vat_id' => $data['company']['vatId'] ?? null,
        ]);

        $shippingAddress = $customer->addresses()->create([
            'type' => AddressType::Shipping,
            'street' => $data['shippingAddress']['street'],
            'city' => $data['shippingAddress']['city'],
            'post_code' => $data['shippingAddress']['postCode'],
            'country_code' => $data['shippingAddress']['countryCode'],
        ]);

        if (! $data['sameAddress']) {
            $customer->addresses()->create([
                'type' => AddressType::Billing,
                'street' => $data['billingAddress']['street'],
                'city' => $data['billingAddress']['city'],
                'post_code' => $data['billingAddress']['postCode'],
                'country_code' => $data['billingAddress']['countryCode'],
            ]);
        }

        $cart = Cart::find(session()->get('cart_id'));
        $cart->update([
            'customer_id' => $customer->id,
            'status' => CartStatus::Completed,
            'completed_at' => now(),
        ]);

        $order = $customer->orders()->create([
            'cart_id' => $cart->id,
            'address_id' => $shippingAddress->id,
            'status' => OrderStatus::Pending,
            'delivery_method' => $data['deliveryMethod'],
            'payment_method' => $data['paymentMethod'],
            'notes' => $data['notes'] ?? null,
        ]);

        session()->flash('order', $order->id);

        return $order;
    }
}
