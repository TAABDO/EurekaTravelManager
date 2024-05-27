<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'address',
        'phone',
        'type',
        'city_id',
        'description',

    ];

    // relations between models

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
