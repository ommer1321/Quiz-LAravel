<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizCreatRequest;
use App\Http\Requests\QuizUpdateRequest;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $title = $request->get('title');
        $status= $request->get('status');
   if($title){

        $quizzes =  Quiz::where('title','LIKE','%'.$title.'%')->paginate(5);
        
            return view('admin.quiz.list',compact('quizzes'));
          
    }elseif($status){

            $quizzes =  Quiz::where('status','LIKE','%'.$status.'%')->paginate(5);
        
            return view('admin.quiz.list',compact('quizzes'));
          
          }
        
      $quizzes = Quiz::withCount('questions')->paginate(5);

        return view('admin.quiz.list',compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizCreatRequest $request)
    { 
        $data = $request->post();     
        $data['slug']= Str::slug($request->title);

        Quiz::create($data);
        return redirect()->route('quizzes.index')->withSuccess('Quiz Başarılı Bir Şekilde Oluşturuldu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function quizOnizle($user_id,$slug)
    {

        //$quiz = Quiz::where('slug',$slug)->with('myResult','questions.myAnswer')->first();
        
         $user = User::where('id',$user_id)->first();
             $quiz = Quiz::where('slug',$slug)->with('questions')->with('questions.allAnswer')->first();
            
         
                   
         return     view('admin.quiz.quiz_onizle',compact(['user','quiz']));
         





    }
    public function quizSonuc($quiz_id)
    {
         $datas = Quiz::where('id',$quiz_id)->with('allResult')->with('allResult.user')->first();
     

        $point = 0;
        $user_count = count($datas->allResult);
        
         foreach ( $datas->allResult as $data ){

            $point += $data['point'];

         }
         $point =$point/$user_count;

       return  view('admin.quiz.sonuc',compact('datas','point','user_count'));
        

    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $data = Quiz::where('id',$id)->with('questions')->first();
        $dataCount = count($data->questions);
        $quiz = Quiz::find($id) ?? abort('404','Lo Quiz Bulunamadı');
       
   return view('admin.quiz.edit',compact('quiz','dataCount')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizUpdateRequest $request, $id)
    {  
         $data = $request->post();     
         $data['slug']= Str::slug($request->title);
          
         unset($data['_method']);
          unset($data['_token']);

        $quiz = Quiz::find($id) ?? abort('404',' Canım Quiz Bulunamadı');
        Quiz::where('id',$id)->update($data);
        return redirect()->route('quizzes.index')->withSuccess('Quiz Başarı İle Güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::find($id) ?? abort('404','Hacı Quiz Bulunamadı');
        $quiz->delete();
        return redirect()->route('quizzes.index')->withSuccess('Başarılı Bir Şekilde Silindi');
    }
}
