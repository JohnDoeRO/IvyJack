<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * autorize
     *
     * @return void
     */
    public function authorize()
    {
        return true;
    }

    /**
     * rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'first_name' => 'required|min:3|max:255',
            'last_name' => 'required|min:3|max:255',
            'company_id' => 'required|integer',

        ];
    }

    /**
     * messages
     *
     * @return void
     */
    public function messages()
    {
        return [
            'first_name.required' => 'First Name is required',
        ];
    }
}
