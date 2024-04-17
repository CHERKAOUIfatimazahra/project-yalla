<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrganizerEventController extends Controller
{
    public function index($userId)
    {
        // Fetch the user based on the provided user ID
        $user = User::findOrFail($userId);
        
        // Fetch events associated with the user, ensuring they are published
        $userEvents = $user->events()
                           ->where('is_published', 1)
                           ->latest()
                           ->paginate(6);

        return view('organizer_page', compact('userEvents', 'user'));
    }
}
