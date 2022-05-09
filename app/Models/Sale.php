<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Optix\Media\HasMedia;


class Sale extends Model
{
    use HasFactory, HasMedia;

    protected $fillable = [
        'user_id',
        'country_id',
        'state_id',
        'city_id',
        'suburb_id',
        'description',
        'status',
        'property_type',
        'price',
        'sale_type',
        'street',
        'sold_at'
    ];

    protected $with = [
        'media',
    ];

    protected $property_types = ['Casa', 'Departamento', 'Terreno'];
    protected $sale_types = ['Renta', 'Venta', 'Preventa'];

    public function house()
    {
        $media = $this->getMedia('house')->last();

        if (!$media) {
            return asset('images/default-avatar.jpeg');
        }

        $house = $media->name ?: null;

        return route('getFile', [$house, 'house']);
    }

    /* -------------------------------------------------------------------------- */
    /*                                 Media Library  optix/media                                 */
    /* -------------------------------------------------------------------------- */

    public function registerMediaGroups()
    {
        $this->addMediaGroup('house')
            ->performConversions('house');
    }

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

    /* -------------------------------------------------------------------------- */
/*                                 LaraTables                                 */
/* -------------------------------------------------------------------------- */

    /**
     * @param  $query
     * @return mixed
     */
    public static function laratablesQueryConditions($query)
    {
        return $query;
    }

    /**
     * @param $user
     */
    public static function laratablesCustomAction($sale)
    {
        return view('admin.sales.includes.index_action', compact('sale'))->render();
    }

    /**
     * @param $user
     */
    public static function laratablesCustomName($sale)
    {
        return view('admin.sales.includes.index_name', compact('sale'))->render();
    }

    /**
     * Additional columns to be loaded for datatables.
     *
     * @return array
     */
    public static function laratablesAdditionalColumns()
    {
        return ['street', 'user_id', 'sale_type', 'property_type'];
    }

}
