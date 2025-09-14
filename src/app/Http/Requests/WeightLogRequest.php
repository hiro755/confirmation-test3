<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeightLogRequest extends FormRequest
{
    public function authorize(){ return true; }

    public function rules()
    {
        return [
            'date'           => ['required','date'],
            // 体重は「4桁以内 & 小数1桁まで」：例 9999.9
            'weight'         => ['required','numeric','regex:/^\d{1,4}(\.\d)?$/'],
            'calories'       => ['required','numeric'],
            // 00:00 形式
            'exercise_time'  => ['required','date_format:H:i'],
            'exercise_note'  => ['nullable','max:120'],
        ];
    }

    public function messages()
    {
        return [
            'date.required'            => '日付を入力してください',
            'weight.required'          => '体重を入力してください',
            'weight.numeric'           => '数字で入力してください',
            'weight.regex'             => '小数点は1桁で入力してください', // 「4桁まで」はregexが担保
            'calories.required'        => '摂取カロリーを入力してください',
            'calories.numeric'         => '数字で入力してください',
            'exercise_time.required'   => '運動時間を入力してください',
            'exercise_time.date_format'=> '00:00 形式で入力してください',
            'exercise_note.max'        => '120文字以内で入力してください',
        ];
    }
}