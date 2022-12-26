<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionUpdateRequest extends FormRequest
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
       

            'question'=>'required|min:1',
            'image'=>'image|mimes:png,jpg,jpeg|max:1024|nullable',
            'answer1'=>'required|min:1',
            'answer2'=>'required|min:1',
            'answer3'=>'required|min:1',
            'answer4'=>'required|min:1',
            'correct_answer'=>'required',

            


        ];


    }


    public function attributes()
    {
return([
'question'=>'Soru',
'answer1'=>'Cevap 1',
'answer2'=>'Cevap 2',
'answer3'=>'Cevap 3',
'answer4'=>'Cevap 4',
'image'=>'Görsel',
'correct_answer'=>'Doğru Cevap',
]);
    }
}
