<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'name_1' => 'required|string',
            'Due_Date' => 'date|nullable',
            'IsCompleted' => 'boolean',
            'priority_id' => 'required',
            'drop_list_id' => 'required',

        ];
    }
}
