<?php

namespace App\Repositories;

use App\Models\Event;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ReservationRepository implements ReservationRepositoryInterface
{
    public function index($eventId)
    {
        return Reservation::where('event_id', $eventId) 
                          ->latest()
                          ->paginate(10);
    }

    public function makeReservation($userId, $eventId)
    {
        $user = auth()->user();
        $event = Event::findOrFail($eventId);
        $currentTime = Carbon::now();

        // Check reservation date 
        if ($currentTime->gt($event->end_datetime)) {
            return redirect()->back()->with('error', 'Sorry, you cannot reserve for events outside the event timeframe.');
        }

        // Check user reservation
        $existingReservation = Reservation::where('event_id', $eventId)
                                           ->where('user_id', $user->id)
                                           ->first();

        if ($existingReservation) {
            return redirect()->back()->with('error', 'You have already reserved this event.');
        }

        // Check ticket availability
        if ($event->tickets_available <= 0) {
            return redirect()->back()->with('error', 'Sorry, all the places already reserved!');
        }

        // Create reservation
        $reservation = new Reservation();
        $reservation->user_id = $user->id;
        $reservation->event_id = $eventId;
        $reservation->place = "unpaid";
        $reservation->reservation_code = Str::uuid()->toString();

        if ($event->reservation_type === 'automatique') {
            $reservation->status_reservation = 'approved';
             $reservation->save();
             return redirect()->route('payment.process', ['reservationId' => $reservation->id]);

        } else {
            $reservation->status_reservation = 'pending';
            $reservation->save();
            return redirect()->back()->with('success', 'your reservation is pending wait for approvement organizer'); ;
        }

    }

    public function updateStatus($reservationId, $newStatus)
    {
        $reservation = Reservation::findOrFail($reservationId);
        $reservation->status_reservation = $newStatus;
        $reservation->save();
    }
}
