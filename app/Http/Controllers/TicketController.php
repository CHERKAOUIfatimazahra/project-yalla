<?php

namespace App\Http\Controllers;

use App\Repositories\TicketRepositoryInterface;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    protected $ticketRepository;

    public function __construct(TicketRepositoryInterface $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    public function showReservations($userId)
    {
        $reservations = $this->ticketRepository->getUserReservations($userId);

        return view('dashbord.reservation.reservations', compact('reservations'))
                    ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    
    public function userReservations($userId, $reservationId)
    {
        $user = auth()->user();
        $reservation = $this->ticketRepository->getReservationById($reservationId);

        if ($user->id !== $reservation->user_id) {
            abort(403, 'Unauthorized');
        }

        return view('dashbord.reservation.tickets_reservations', compact('reservation', 'userId'));
    }
}
