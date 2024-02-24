<?php

namespace App\Http\Requests\work;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>['required','string','max:200'],
            'user_id'=>['nullable'],

            'image_key'=>['nullable','string','max:250'],
        ];
    }
}
