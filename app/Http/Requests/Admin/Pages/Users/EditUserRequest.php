<?php

namespace App\Http\Requests\Admin\Pages\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class EditUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $userId = request()->user_id;
        $validationValue = ['value' => ['required', 'string', 'max:255']];
        if (request()->field_name == 'phonenumber') {
            $validationValue = ['value' => ['required', 'string', 'phone_number', 'min:10', 'max:13', Rule::unique('users', 'phonenumber')->ignore($userId)]];
        } elseif (request()->field_name == 'link') {
            $validationValue = ['value' => ['required', 'string', 'max:255', Rule::unique('users', 'link')->ignore($userId) ]];
        }

        $validation = [
            'user_id' =>  ['required', 'exists:users,id'],
        ];

        return array_merge($validation, $validationValue);
    }
}
