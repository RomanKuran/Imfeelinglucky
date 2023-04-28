<?php

namespace App\Http\Requests\Pages\A;

use Illuminate\Foundation\Http\FormRequest;

class CreateHistoryRequest extends FormRequest
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
        return [
            'random_number' => ['required'],
            'winning_status' => ['required'],
            'amount_of_winning' => ['required']
        ];
    }
}
