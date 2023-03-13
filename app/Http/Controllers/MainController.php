<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Result;
use Illuminate\Http\Request;

class MainController extends Controller
{
    

    public function dashboard(){

     $quizzes= Quiz::where('status','publish')->where('finished_at','=',null)->orwhere('finished_at','>',now())->where('status','publish')->withCount('questions')->paginate(5);
     
       $myResultList =  Result::where('user_id',auth()->user()->id)->with('myList')->paginate(10);
  
 
     return    view('dashboard',compact(['quizzes','myResultList']));

    }




    public function quizDetail($slug){
         
         $quiz= Quiz::where('slug',$slug)->with('myResult','top_ten.user','allResult','myQuizOrder')->withCount('questions')->first() ?? abort('404','yiağ Quiz Bulunamadı ');
          return   view('quiz_detail',compact('quiz'));

    }

    public function quizJoin($slug){
         
        $quiz= Quiz::where('slug',$slug)->withCount('questions')->first() ?? abort('404','yiağ Quiz Bulunamadı ');
        return view('quiz',compact('quiz'));

   }

   public function quizReview($slug){

     $quiz = Quiz::where('slug',$slug)->with('myResult','questions.myAnswer')->first();
    


     return view('quiz_review',compact(['quiz']));



   }


   public function quizResult(Request $request , $slug){

  
      $quiz = Quiz::where('slug',$slug)->with('questions')->first();
  
      $dogru_sayisi=0;

     foreach($quiz->questions as $question){

    Answer::create([

   'user_id' => auth()->user()->id,
   'question_id' => $question->id,
     'answer' => $request->post($question->id),
 ]);

 if($request->post($question->id) == $question->correct_answer){
  $dogru_sayisi++;
 } 
   }

   $point = round((100/count($quiz->questions)*$dogru_sayisi));


   if($quiz->myResult){

 abort('404','Geri Bas La!! Sen Bu Sınava Girdin ');
  }

Result::create([
  'user_id'=>auth()->user()->id,
  'quiz_id'=>$quiz->id,
  'correct'=>$dogru_sayisi,
  'wrong'=>count($quiz->questions)-$dogru_sayisi,
  'point'=> $point,

 ]);

 return redirect()->route('quiz.detail',$quiz->slug)->withSuccess('Quiz Başarılı Bir Şekilde Tamamlandı Puanınız : '.$point);

}


public function myResultList(){






}

}
