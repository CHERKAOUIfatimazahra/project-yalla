<?php

namespace App\Repositories;

use App\Models\Event;

class EventRepository implements EventRepositoryInterface
{
    public function all()
    {
        return Event::latest()->paginate(5);
    }

    public function create(array $data)
    {
        return Event::create($data);
    }

    public function update(Event $event, array $data)
    {
        $event->update($data);
        return $event;
    }

    public function delete(Event $event)
    {
        $event->delete();
    }
    public function findByUserId($userId)
    {
        return Event::where('user_id', $userId)->latest()->paginate(5);
    }

    public function find($id)
    {
        return Event::findOrFail($id);
    }
}
