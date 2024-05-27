<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reclamation extends Model implements HasMedia
{
    use HasFactory ,InteractsWithMedia;

    protected $fillable = [
        'date',
        'description',
        'user_id',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

}
