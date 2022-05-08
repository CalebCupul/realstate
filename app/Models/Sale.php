<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'country_id',
        'state_id',
        'city_id',
        'suburb_id',
        'image',
        'description',
        'status',
        'property_type',
        'price',
        'sale_type',
        'street',
        'sold_at'
    ];

    protected $property_types = ['Casa', 'Departamento', 'Terreno'];
    protected $sale_types = ['Renta', 'Venta', 'Preventa'];

    public function getPropertyTypes(){
        return $this->property_types;
    }

    public function getSaleTypes(){
        return $this->sale_types;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function suburb(){
        return $this->belongsTo(Suburb::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
