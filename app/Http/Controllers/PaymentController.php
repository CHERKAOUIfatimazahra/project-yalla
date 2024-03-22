<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;

class PaymentController extends Controller
{
    public function payment($id)
    {
        $reservation = Reservation::find($id);

        if (!auth()->check() || $reservation->user_id != auth()->user()->id) {
            return redirect()->back()->with('error', 'You are not authorized to make payment for this reservation.');
        }
        if ($reservation->payment_status == 'paid') {
            return redirect()->back()->with('error', 'This reservation is already paid.');
        }
        // if ($reservation->event->date < Carbon::now()) {
        //     return redirect()->back()->with('error', 'You can not make payment for this reservation, because the event is already finished.');
        // }
        
        $totalAmount = $reservation->event->price;
        $totalAmount = number_format($totalAmount, 2, '.', '');
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "USD",
                "value" => $totalAmount,
            ],
            "description" => "product_name",
            "redirectUrl" => route('payment.success'),
        ]);

        // dd($payment);

        session()->put('paymentId', $payment->id);
        session()->put('reservationID',$id);
        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function payment_success(Request $request)
    {
        $paymentId = session()->get('paymentId');
        // dd($paymentId);
        $payment = Mollie::api()->payments->get($paymentId);
        $id = session()->get('reservationID');
        if ($payment->isPaid()) {

            $reservation = Reservation::find($id);

            $reservation->payment_status = 'paid';
            $reservation->save();
// dd($reservation);
            session()->forget('paymentId');
            session()->forget('reservationID');

            return redirect()->back()->with('success', 'Payment is success, your reservation is completed');
        } else {
            return redirect()->route('payment.cancel');
        }
    }

    public function payment_cancel()
    {
        return redirect()->back()->with('error','Payment is cancelled.');
    }
}
