<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutoReq extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'gos_nomer' => 'min:3|max:255',
            'color' => 'min:3|max:255',
            'vin' => 'max:17|min:17',
            'brand' => 'max:30',
            'model' => 'max:30',
            'year'=> 'max:8'
        ];
    }
}
