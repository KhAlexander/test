<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
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
            'first_name' => 'required|max:50',
            'last_name' => 'max:50',
            'company_name' => 'max:150',
            `position` => 'max:50',
            'personal_email' => 'email|max:50|required_without_all:job_email,personal_phone,job_phone',
            'job_email' => 'email|max:50',
            'personal_phone' => 'phone',
            'job_phone' => 'phone',
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'company_name' => 'Компания',
            `position` => 'Должность',
            'personal_email' => 'Личный email',
            'job_email' => 'Рабочий email',
            'personal_phone' => 'Телефон',
            'job_phone' => 'Рабочий телефон',
        ];
    }
}
