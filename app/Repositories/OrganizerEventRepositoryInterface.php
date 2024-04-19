<?php

namespace App\Repositories;

interface OrganizerEventRepositoryInterface
{
    public function getUserById($userId);

    public function getPublishedEventsByUser($userId);
}
