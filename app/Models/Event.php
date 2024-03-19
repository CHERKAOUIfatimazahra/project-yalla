<?php

namespace App\Models;

use App\Traits\HasPermissionsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 
        'description', 
        'location', 
        'start_datetime', 
        'end_datetime', 
        'type', 
        'price', 
        'tickets_available', 
        'image', 
        'is_published',
        'reservation_type',
        'user_id',
        'category_id'
    ];
    public function user()
    {
        return $this->hasMany(User::class, "user_id");
    }
    public function categories()
    {
        return $this->belongsTo(Category::class, "category_id");
    }
    public function reserve()
    {
        return $this->hasMany(Reservation::class);
    }

}
