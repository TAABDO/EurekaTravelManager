<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'amount',
        'type',
        'paiement_mode',
        'comment'
    ];

    // relations between models

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
