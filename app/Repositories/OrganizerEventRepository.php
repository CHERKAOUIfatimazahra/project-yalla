<?php

namespace App\Repositories;

use App\Models\User;

class OrganizerEventRepository implements OrganizerEventRepositoryInterface
{
    public function getUserById($userId)
    {
        return User::findOrFail($userId);
    }

    public function getPublishedEventsByUser($userId)
    {
        return User::findOrFail($userId)
            ->events()
            ->where('is_published', 1)
            ->latest()
            ->paginate(6);
    }
}
