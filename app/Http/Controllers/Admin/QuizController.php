<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizCreatRequest;
use App\Http\Requests\QuizUpdateRequest;
use App\Models\Quiz;
use Illuminate\Http\Request;

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

        Quiz::create($request->post());
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
        
        $quiz = Quiz::find($id) ?? abort('404',' Canım Quiz Bulunamadı');
       Quiz::where('id',$id)->update($request->except(['_method','_token']));
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
