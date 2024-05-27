<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'date',
        'service_id',
        'agency_id',
        'user_id',
        'client_id',
        'course_id',
        'seat',
        'pax',
        'amount',
        'paiement_mode',
        'type',
        'comment',
    ];

    // relations between models

   public function users(){
     return $this->belongsTo(User::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
        return $this->belongsTo(Course::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function agency(){
        return $this->belongsTo(Agency::class);
    }

    public function paiement(){
        return $this->hasOne(Paiement::class);
    }
    
}
