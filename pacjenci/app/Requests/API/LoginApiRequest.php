<?php

namespace App\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class LoginApiRequest extends formRequest
{

    public function authorize(): true
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function getEmail(): string
    {
        return $this->get('email');
    }

    public function getPassword(): string
    {
        return $this->get('password');
    }

}
