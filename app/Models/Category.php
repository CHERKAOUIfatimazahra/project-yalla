<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function eventsCategory()
    {
        return $this->hasMany(Event::class);
    }
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
