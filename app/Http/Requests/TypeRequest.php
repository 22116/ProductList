<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

    public function rules() :array
    {
        return [
            'name' => 'required|min:5'
        ];
    }
}
