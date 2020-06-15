<?php

namespace App\Http\Requests\Admin\User;

use App\Entity\User;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

//use App\Entity\User as $user;

class UpdateRequest extends FormRequest
{

    public function authorize():bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ];
    }

}