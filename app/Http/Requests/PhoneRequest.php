<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;


//use Route;

class PhoneRequest extends FormRequest
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
        $id = Route::current()->parameter('phone')->id;
        return [
            'number' => 'string|regex:/^([0-9\s\-\+\\.(\)]*)$/|unique:phones,number,' . $id,
            'name' => 'string|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'name',
            'number' => 'number',
        ];
    }
}
