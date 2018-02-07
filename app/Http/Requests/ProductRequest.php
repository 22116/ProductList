<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

    public function rules() :array
    {
        return [
			'name' => 'required|min:2|max:50',
	        'description' => 'required|max:255',
	        'type_id' => 'required',
	        'producer_id' => 'required'
        ];
    }
}
