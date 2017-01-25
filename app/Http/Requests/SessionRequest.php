<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Quizz;

class SessionRequest extends FormRequest
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
            //
        ];

        /*$rules = ['classroom_id' => 'required'];
        $quizz = Quizz::findOrFail($this->quizz_id);
        foreach ($quizz->question as $question) {
            $rules['question_' . $question->id] = 'required';
        }

        return $rules;*/
    }
}
