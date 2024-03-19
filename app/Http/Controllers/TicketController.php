<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function showReservations($userId)
    {
        $user = auth()->user();
        $reservations = Reservation::where('user_id', $userId)
                                ->latest()
                                ->paginate(10);

        return view('dashbord.reservation.reservations', compact('reservations'))
                    ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    
    public function userReservations($userId, $reservationId)
{
    $user = auth()->user();

    $reservation = Reservation::findOrFail($reservationId);

    if ($user->id !== $reservation->user_id) {
        abort(403, 'Unauthorized');
    }

    return view('dashbord.reservation.tickets_reservations', compact('reservation', 'userId'));
}

}