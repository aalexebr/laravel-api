<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// helpers
use Illuminate\Support\Facades\Auth;
class StorePortfolioRequest extends FormRequest
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
            'title'=>'required|max:32',
            'content'=>'required',
            'typeOf'=>'nullable|exists:types,id',
            'date_start'=>'nullable|date',
            'date_end'=>'nullable|date|after_or_equal:date_start',
            'techs'=>'nullable|array',
            'techs.*'=>'exists:technologies,id',
            'img' => 'nullable|image|max:50000'
        ];
    }

    public function messages(){
        return [
            'title.max'=>'title too long',
            'typeOf'=>'invalid type',
            'date_end.after_or_equal'=>'after date must be after start date',
            'img.image'=>'file is not an image file',
            'img.max'=>'file is too large to upload'
        ];
    }
}
