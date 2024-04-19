<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Repositories\PaymentRepositoryInterface;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $paymentRepository;

    public function __construct(PaymentRepositoryInterface $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function payment($id)
    {
        $reservation = Reservation::find($id);

        if (!auth()->check() || $reservation->user_id != auth()->user()->id) {
            return redirect()->back()->with('error', 'You are not authorized to make payment for this reservation.');
        }
        if ($reservation->payment_status == 'paid') {
            return redirect()->back()->with('error', 'This reservation is already paid.');
        }
        $totalAmount = $reservation->event->price;
        $totalAmount = number_format($totalAmount, 2, '.', '');

        // create payment
        $payment = $this->paymentRepository->createPayment($id, $totalAmount);

        // Redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function payment_success(Request $request)
    {
        $paymentId = session()->get('paymentId');
        $payment = $this->paymentRepository->getPayment($paymentId);
        $id = session()->get('reservationID');
        if ($payment->isPaid()) {
            
            $this->paymentRepository->updateReservationPaymentStatus($id);

            session()->forget('paymentId');
            session()->forget('reservationID');

            return view('/success-page')->with('success', 'Your reservation is completed');
        } else {
            return redirect()->route('payment.cancel');
        }
    }

    public function payment_cancel()
    {
        return redirect()->back()->with('error', 'Payment is cancelled.');
    }
}
