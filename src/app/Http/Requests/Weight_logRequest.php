<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Weight_logRequest extends FormRequest
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
            'date' => ['required'],
            'weight' => ['required', 'regex:/^[0-9]+$/', 'numeric'],
            'calories' => ['required', 'numeric'],
            'exercise_time' => ['required'],
            'exercise_content' => ['max:120'],

        ];
    }
    public function messages()
    {
        return [
            'date.required' => '日付を入力してください',
            'weight.required' => '体重を入力してください',
            'calories.required' => '摂取カロリーを入力してください',
            'exercise_time.required' => '運動時間を入力してください',
            'exercise_content.max:120' => '120文字以内で入力してください',
        ];
}
}