<?php

namespace App\Http\Requests\work;

use App\Models\WorkItemModel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateWorkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool{
        return true;
//        return Auth::check();
    }

    protected function prepareForValidation() {
        if(!isset($this->item_id) AND isset($this->item_name) AND !empty($this->item_name) AND strlen($this->item_name) > 3 ) {
            /*Если не указан в списко , но есть в поле ввода, то добавляем в таблицу и возвращаем id*/
            $item_model = WorkItemModel::firstOrCreate(['name'=>$this->item_name,'user_id'=>NULL]);
//            dd($item_model);
            $this->merge(['item_id'=>$item_model->id]);
//            $this->item_id = $item_model->id;
        }
        if(empty($this->name)){
            $this->merge(['name'=>str_replace('T',' ',$this->datetime)]);
        }
//        $this->merge();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array{
        return [
            'name'=>['nullable','string','min:0'],
            'item_id'=>['required','int',Rule::exists('work_items','id')],
            'user_id'=>['sometimes','int',Rule::exists('users','id')],
            'item_name'=>['nullable','string','max:2048'],
//            'date'=>['required','date'],
            'datetime'=>['required','string'],
            'colling_days'=>['required','int'],
            'comment'=>['nullable','string'],

            'work'=>['nullable','string'],
            'heft'=>['nullable','string','max:50'],
            'touch_count'=>['nullable','string','max:50'],
            'retry_count'=>['nullable','string','max:50'],

            'feeling'=>['nullable','float'],
            'feeling_text'=>['nullable','string','max:250'],

            'hours_after_last_work'=>['nullable','int'],
            'percent_last_work'=>['nullable','int'],
        ];
    }

}
