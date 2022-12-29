<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class MainController extends Controller
{
    

    public function dashboard(){

     $quizzes= Quiz::where('status','publish')->withCount('questions')->paginate(5);

        return view('dashboard',compact('quizzes'));

    }




    public function quizDetail($slug){
         
         $quiz= Quiz::where('slug',$slug)->withCount('questions')->first() ?? abort('404','yiağ Quiz Bulunamadı ');
         return view('quiz_detail',compact('quiz'));

    }

    public function quizJoin($slug){
         
        $quiz= Quiz::where('slug',$slug)->withCount('questions')->first() ?? abort('404','yiağ Quiz Bulunamadı ');
        return view('quiz',compact('quiz'));

   }


   public function quizResult(Request $request , $slug){

     
     return     Quiz::where('slug',$slug)->with('questions')->first();
  $request->post();

}


}
