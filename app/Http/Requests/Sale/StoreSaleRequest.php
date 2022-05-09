<?php

namespace App\Http\Requests\Sale;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id'         => 'nullable',
            'country_id'      => 'required',
            'state_id'        => 'required',
            'city_id'         => 'required',
            'suburb_id'       => 'required',
            'image'           => 'sometimes|mimes:png,jpg',
            'description'     => 'required',
            'property_type'   => 'required',
            'price'           => 'required',
            'sale_type'       => 'required',
            'street'          => 'required',
        ];
    }
}
