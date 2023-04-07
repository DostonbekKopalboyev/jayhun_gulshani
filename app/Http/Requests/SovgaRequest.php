<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SovgaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
                'name'=>'required',
                'description' => 'required',
                "narx" => 'required',
                "image" => 'required|file',
                'category_name'=>'required'
        ];

    }
}
