<?php
  
namespace App\Http\Controllers;
  
use App\Models\Reservation;
use PDF;
use Mail;
    
class PDFController extends Controller
{
    /**
     * Generate PDF for a specific reservation and send it via email.
     *
     * @param int $userId
     * @param int $reservationId
     * @return response()
     */
    public function index($userId, $reservationId)
    {
        $user = auth()->user();
        $reservation = Reservation::findOrFail($reservationId);

        $data["email"] = "cherkaoui.fatimazahra97@gmail.com";
        // $data["email"] = $user->email;
        $data["title"] = "Ticket for your reservation";
        $data["body"] = "This is Demo";
    
        // Pass $reservation to the view
        $pdf = PDF::loadView('emails.myTestMail', ['reservation' => $reservation, 'data' => $data]);
    
        Mail::send('emails.myTestMail', ['reservation' => $reservation, 'data' => $data], function($message) use ($data, $pdf) {
            $message->to($data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "text.pdf");
        });
            return redirect()->back()->with('success', 'Mail sent successfully');
        
    }
}
