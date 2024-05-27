<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'currency_id',
    ];

    // relations between models

    public function currency(){
        return $this->belongsTo(Currency::class);
    }     
    
    public function booking(){
        return $this->belongsTo(Booking::class);
    }
}                  
