<?php

namespace App\Http\Controllers;

use App\Repositories\OrganizerEventRepositoryInterface;

class OrganizerEventController extends Controller
{
    protected $organizerEventRepository;

    public function __construct(OrganizerEventRepositoryInterface $organizerEventRepository)
    {
        $this->organizerEventRepository = $organizerEventRepository;
    }

    public function index($userId)
    {
        $user = $this->organizerEventRepository->getUserById($userId);
        $userEvents = $this->organizerEventRepository->getPublishedEventsByUser($userId);

        return view('organizer_page', compact('userEvents', 'user'));
    }
}
