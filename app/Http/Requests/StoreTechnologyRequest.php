<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// auth
use Illuminate\Support\Facades\Auth;

class StoreTechnologyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|max:32'
        ];
    }
    public function messages(){
        return [
            'name.max'=>'name too long'
        ];
    }
}
