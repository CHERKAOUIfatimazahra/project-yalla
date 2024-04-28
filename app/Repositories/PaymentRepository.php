<?php

namespace App\Repositories;

use App\Models\Event;
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
        // Find the reservation
        $reservation = Reservation::find($reservationId);

        // Find the associated event
        $event = $reservation->event;

        // Update reservation payment status to 'paid'
        $reservation->payment_status = 'paid';

        // Decrement available tickets for the event
        $event->decrement('tickets_available');

        // Calculate the place number
        $placeNumber = $event->tickets_available + 1;

        // Update reservation place number
        $reservation->place = $placeNumber;
        
        // Save the changes
        $reservation->save();
    }

}
