<?php

namespace App\Http\Requests\work;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkRequest extends CreateWorkRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return parent::authorize();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return parent::rules();
        return [
            //
        ];
    }
}
