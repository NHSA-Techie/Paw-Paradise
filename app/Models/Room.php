<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_title',
        'images',
        'description',
        'price',
        // 'wifi',
        'roomtype',
    ];
}

// i put s in image
