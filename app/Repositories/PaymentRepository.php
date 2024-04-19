<?php

namespace App\Repositories;

use App\Models\Reservation;
use Mollie\Laravel\Facades\Mollie;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function createPayment($reservationId, $totalAmount)
    {
        $reservation = Reservation::find($reservationId);

        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "USD",
                "value" => $totalAmount,
            ],
            "description" => "product_name",
            "redirectUrl" => route('payment.success'),
        ]);

        session()->put('paymentId', $payment->id);
        session()->put('reservationID', $reservationId);

        return $payment;
    }

    public function getPayment($paymentId)
    {
        return Mollie::api()->payments->get($paymentId);
    }

    public function updateReservationPaymentStatus($reservationId)
    {
        $reservation = Reservation::find($reservationId);
        $reservation->payment_status = 'paid';
        $reservation->save();
    }
}
