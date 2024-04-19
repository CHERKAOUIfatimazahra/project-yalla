<?php
namespace App\Repositories;

interface HomeRepositoryInterface
{
    public function getUsers();

    public function getCategories();

    public function getPublishedEvents();

    public function getPopularEvents();

    public function getEventsOfWeek();
}