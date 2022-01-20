<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAuthorsToFilmRequest extends FormRequest
{
    public function rules()
    {
        return [
            'actors' => ['required', 'array'],
            'actors.*' => ['required', 'exists:actors,id'],
        ];
    }
}
