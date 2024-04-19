<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Repositories\HomeRepositoryInterface;

class HomeController extends Controller
{
    protected $homeRepository;

    public function __construct(HomeRepositoryInterface $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }

    public function index()
    {
        $users = $this->homeRepository->getUsers();
        $categories = $this->homeRepository->getCategories();
        $publishedEvents = $this->homeRepository->getPublishedEvents();
        $popularEvents = $this->homeRepository->getPopularEvents();
        $eventsOfWeek = $this->homeRepository->getEventsOfWeek();

        return view('home', compact('publishedEvents', 'users', 'categories', 'popularEvents', 'eventsOfWeek'));
    }

    public function eventShow(Event $event)
    {
        return view('single_page', compact('event'));
    }

    public function findEvent()
    {
        $categories = $this->homeRepository->getCategories();
        $publishedEvents = $this->homeRepository->getPublishedEvents();

        return view('find-event', compact('publishedEvents', 'categories'));
    }
}
