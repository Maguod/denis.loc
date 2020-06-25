<?php

namespace App\Http\Requests\Home;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class VinRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
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
            'brand' => 'string|min:3|max:30',
            'model' => 'string|min:3|max:100',
            'month' => 'string|min:3|max:30',
            'capacity' => 'nullable|string|min:1|max:30',
            'motor' => 'nullable|string|min:2|max:20',
            'kpp' => 'nullable|string|min:3|max:100',
            'abs' => 'nullable',
            'гидроусилитель' => 'nullable',
            'электроусилитель' => 'nullable',
            'кондиционер' => 'nullable',
            'kuzov' => 'string|min:3|max:100',
            'vincode' => 'required|string|min:10|max:18',
            'engine' => 'nullable|string|min:3|max:18',
            'mess' => 'required|string|min:3|max:500',
            'name' => 'required|string|min:3|max:125',
            'phone' => 'required|string|min:10|max:15',
            'email' =>'nullable|email',
            'city' => 'nullable|string|max:100',
            'info' => 'required'
        ];
    }
    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'brand.min' => 'Марка авто. Минимум 3 символа',
            'brand.max' => 'Марка авто. Максимум 100 символов',
            'vincode.required' => 'ВИН код. Обязательное поле для данного запроса',
            'vincode.max' => 'ВИН код. Максимум 18 символов',
            'vincode.min' => 'ВИН код. Минимум 10 символов',
            'engine.max' => 'Номер двигателя. Максимум 18 символов',
            'engine.min' => 'Номер двигателя. Минимум 3 символа',
            'name.required' => 'Ваше Имя. Обязательное поле',
            'name.max' => 'Ваше Имя. Максимум 125 символов',
            'name.min' => 'Ваше Имя. Минимум 3 символа',
            'mess.required' => 'Ваше сообщение. Обязательное поле',
            'mess.max' => 'Ваше сообщение. Максимум 500 символов',
            'mess.min' => 'Ваше сообщение. Минимум 3 символа',
            'phone.required' => 'Телефон. Обязательное поле только цифры',
            'phone.max' => 'Телефон. Максимум 15 цифр',
            'phone.min' => 'Телефон. Минимум 10 цифр',
            'info.required' => 'Поставьте галочку что вы человек'
        ];
    }
}
