<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //有効
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        //バリデーションルールを設定
        return [
            'name' => 'required|string|max:255',
            'priority_id' => 'nullable|exists:priorities,id',
        ];
    }

    //エラーメッセージをカスタマイズ
    public function messages(): array
    {
        return [
            'name.required' => 'タスク名は必須です',
            'name.string' => 'タスク名は文字列で入力してください',
            'name.max' => 'タスク名は255文字以内で入力してください',
            'priority_id.exists' => '指定された優先度が存在しません',
        ];
    }

    //属性名をカスタマイズ
    public function attributes(): array
    {
        return [
            'name' => 'タスク名',
            'priority_id' => '優先度',
        ];
    }
}
