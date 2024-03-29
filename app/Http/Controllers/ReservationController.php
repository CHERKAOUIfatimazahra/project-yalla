<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ReservationController extends Controller
{
    public function index($eventId)
    {
        $reservations = Reservation::where('event_id', $eventId)
                                   ->latest()
                                   ->paginate(10);

        return view('dashbord.reservation.index', compact('reservations'))
                    ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function reservation(Request $request, $eventId) {

        $user = auth()->user();
        $event = Event::findOrFail($eventId);
//cheque reservation date 
        $currentTime = Carbon::now();
        if ($currentTime->gt($event->end_datetime)) {
            return redirect()->back()->with('error', 'Sorry, you cannot reserve for events outside the event timeframe.');
        }
//cheque user reservation
        $existingReservation = Reservation::where('event_id', $eventId)
                                      ->where('user_id', $user->id)
                                      ->first();

        if ($existingReservation) {
            return redirect()->back()->with('error', 'You have already reserved this event.');
        }
//cheque ticket available
        if ($event->tickets_available <= 0) {
            return redirect()->back()->with('error', 'Sorry, all the places already reserved!');
        }

        //create reservation
        $reservation = new Reservation();
        $reservation->user_id = $user->id;
        $reservation->event_id = $event->id;
        $event->decrement('tickets_available');
        $placeNumber = ($event->tickets_available - $existingReservation) + 1;
        $reservation->place = $placeNumber;
        $reservation->reservation_code = Str::uuid()->toString();

        // Generate QR code
        $qrCodePath = 'qrcodes/reservation_' . $reservation->id . '.png';
        QrCode::format('png')->size(400)->generate($reservation->reservation_code, public_path($qrCodePath));

        // Save QR code path in reservation
        $reservation->qr_code_path = $qrCodePath;

        if ($event->reservation_type === 'automatique') {
            $reservation->status_reservation = 'approved';
        } else {
            $reservation->status_reservation = 'pending';
        }
        $reservation->save();

        return redirect()->back()->with('success', 'Reservation made successfully.');
    }
    public function updateStatus(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $status = $request->input('status');

        if ($status === 'rejected' && $reservation->status_reservation !== 'rejected') {
        
            $event = $reservation->event;
            $event->increment('tickets_available');
        }

        $reservation->status_reservation = $status;
        $reservation->save();

        return redirect()->back()->with('success', 'Reservation status updated successfully.');
    }

}