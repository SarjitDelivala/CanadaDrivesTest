<?php

namespace App\Http\Requests\Player;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlayerRequest extends FormRequest
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
            'name' => [
                'sometimes',
                'string',
                'max:50',
            ],
            'age' => [
                'sometimes',
                'integer',
                'min:1',
                'max:100',
            ],
            'points' => [
                'sometimes',
                'integer',
                'min:0',
            ],
            'address' => [
                'sometimes',
                'string',
            ],
        ];
    }
}
