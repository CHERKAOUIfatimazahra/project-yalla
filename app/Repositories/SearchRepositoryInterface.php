<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface SearchRepositoryInterface
{
    public function search(Request $request);
}