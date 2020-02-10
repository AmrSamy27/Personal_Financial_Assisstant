<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class expensesRequest extends FormRequest
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
            'amount'=>'numeric|min:0.25|required',
            'date'=>'date|required|date_format:Y-m-d',
            'subCategory'=>'required'
        ];
    }
}
