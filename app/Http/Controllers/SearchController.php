<?php

namespace App\Http\Controllers;

use App\Repositories\SearchRepositoryInterface;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $searchRepository;

    public function __construct(SearchRepositoryInterface $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    public function search(Request $request)
    {
        $events = $this->searchRepository->search($request);

        return response()->json([
            'events' => $events,
            'status' => $events->isNotEmpty(),
        ]);
    }
}
