<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProducerRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

    public function rules() :array
    {
        return [
            'name' => 'required|min:5|max:100',
	        'header' => 'required|min:5|max:100'
        ];
    }
}
