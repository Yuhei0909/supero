<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'nickname' => 'required|max:40',
            'text' => 'required|max:350',
        ];
    }

    public function messages()
    {
        return [
            'nickname.required' => 'ニックネームを入力してください',
            'nickname.max' => 'ニックネームは40文字以内で入力してください',
            'text.required' => 'コメントを入力してください',
            'text.max' => 'コメント本文は350文字以内で入力してください',
        ];
    }

}
