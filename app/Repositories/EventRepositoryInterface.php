<?php

namespace App\Repositories;

use App\Models\Event;

interface EventRepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(Event $event, array $data);

    public function delete(Event $event);

    public function find($id);
}
