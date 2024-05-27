<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'email',
        'country',
        'hotel',
        'phone',
        'comment',

    ];

    // relations between models

    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
