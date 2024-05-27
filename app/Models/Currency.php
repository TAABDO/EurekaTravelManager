<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'symbol',
        'change'
    ];

    // relations between models

    public function paiements(){
        return $this->hasMany(Paiement::class);
    }
}
