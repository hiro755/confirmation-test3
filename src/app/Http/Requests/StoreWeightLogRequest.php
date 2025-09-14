<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWeightLogRequest extends FormRequest
{
    public function authorize()
    {
        return true; // 認可を許可
    }

    public function rules()
    {
        return [
            'date' => 'required|date',
            'weight' => 'required|numeric|min:0|max:300',
            'calories' => 'required|integer|min:0',
            'exercise_time' => 'required',
            'exercise_content' => 'nullable|string|max:120',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を入力してください',
            'weight.required' => '体重を入力してください',
            'calories.required' => '摂取カロリーを入力してください',
            'exercise_time.required' => '運動時間を入力してください',
        ];
    }
}