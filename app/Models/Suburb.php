<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suburb extends Model
{
    use HasFactory;

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function sales(){
        return $this->hasMany(Sale::class);
    }
    
}
