<?php

namespace App\Repositories;

use App\Models\Reservation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class PDFRepository implements PDFRepositoryInterface
{
    public function getUserById($userId)
    {
        return auth()->user();
    }

    public function getReservationById($reservationId)
    {
        return Reservation::findOrFail($reservationId);
    }

    public function sendReservationPDF($email, $title, $body, $pdfData)
    {
        $pdf = PDF::loadView('emails.myTestMail', $pdfData);

        Mail::send('emails.myTestMail', $pdfData, function ($message) use ($email, $title, $pdf) {
            $message->to($email)
                    ->subject($title)
                    ->attachData($pdf->output(), "text.pdf");
        });
    }

    public function downloadReservationPDF($title, $body, $pdfData)
    {
        $pdf = PDF::loadView('emails.myTestMail', $pdfData);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('ticket.pdf');
    }
}
