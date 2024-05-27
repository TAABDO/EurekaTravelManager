<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'depart_point',
        'arrival_point',
        'user_id',
        'car_id',
        'expense_id',
        'gas_id',
    ];

    // relations between models

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function car(){
        return $this->belongsTo(Car::class);
    }

    public function gas(){
        return $this->hasOne(Gas::class);
    }

    public function expenses(){
        return $this->hasMany(Expense::class);
    }

    public function booking(){
        return $this->hasOne(Booking::class);
    }

}
