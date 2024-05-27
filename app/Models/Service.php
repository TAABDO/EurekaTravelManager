<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
    ];

    // relations between models

    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
