<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DropListRequest extends FormRequest
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
            'name' => 'required|string',
            'name_1' => 'required|array',
            'name_1.*' => 'required|string',
            'due_date' => 'array|required',
            'due_date.*' => 'date|required',
            'IsCompleted' => 'array',
            'priority_id' => 'array',
            'drop_list_id' => 'array',
        ];
    }
}
