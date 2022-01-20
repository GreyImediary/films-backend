<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddFilmsToActorRequest extends FormRequest
{
    public function rules()
    {
        return [
            'films' => ['required', 'array'],
            'films.*' => ['required', 'exists:films,id'],
        ];
    }
}
