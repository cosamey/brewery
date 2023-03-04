<?php

namespace App\Http\Controllers\Webhooks;

use App\Enums\PaymentStatus;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function __invoke(Request $request)
    {
        $payload = json_decode($request->getContent(), true);

        if ($payload['type'] === 'payment_intent.succeeded') {
            $payment = Payment::where('intent_id', $payload['data']['object']['id'])->firstOrFail();

            if ($payment->status === PaymentStatus::Pending) {
                $payment->update(['status' => PaymentStatus::Paid]);
            }
        }
    }
}
