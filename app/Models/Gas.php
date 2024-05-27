<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gas extends Model
{
    use HasFactory;

    protected $fillable = [
        'km_depart',
        'km_arrival',
        'km_total',
        'time',
        'amount',
        'paiement_mode',
        'comment',
    ];

    // relations between models

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
