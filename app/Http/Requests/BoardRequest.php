<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoardRequest extends FormRequest
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
            'title' => 'required',
            'comment' => 'required|max:140'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'タイトルを入力してください。',
            'comment.required' => '内容を載せてください。',
            'comment.max' => '内容は140文字以内で書いてください。',
        ];
    }
}
