<?php

namespace App\Http\Controllers;

use App\Repositories\StaticRepositoryInterface;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    protected $staticRepository;

    public function __construct(StaticRepositoryInterface $staticRepository)
    {
        $this->staticRepository = $staticRepository;
    }

    public function statisTotal()
    {
        $counts = $this->staticRepository->getTotalCounts();
        
        return view('dashbord.statistique', $counts);
    } 

    public function reservationStatique(Request $request)
    {
        $organizer = $request->user();
        $statistics = $this->staticRepository->getReservationStatistics($organizer);

        return view('dashbord.static-reservation', $statistics);
    }
}
