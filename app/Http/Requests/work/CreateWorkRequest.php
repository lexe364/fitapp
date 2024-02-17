<?php

namespace App\Http\Requests\work;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateWorkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool{

        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required','string','min:1'],
            'item_id'=>['required','int',Rule::exists('work_items','id')],
            'user_id'=>['sometime','int',Rule::exists('users','id')],
            'date'=>['required','date'],
            'colling_days'=>['required','int'],
            'comment'=>['sometime','string'],
        ];
    }
}
