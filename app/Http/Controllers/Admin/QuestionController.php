<?php

namespace App\Http\Controllers\Admin;
use App\Models\Question;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionCreateRequest;
use App\Http\Requests\QuestionUpdateRequest;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
         $quiz = Quiz::where('id',$id)->with('questions')->first() ?? abort('404',' Layn Quiz Bulunamadı');
        return  view('admin.question.list',compact('quiz')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($quiz_id)
    {
        $quiz = Quiz::find($quiz_id)->first() ?? abort('404','Aha Quiz Bulunamadı');

        return view('admin.question.create',compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionCreateRequest $request , $quiz_id)
    {
        if($request->hasFile('image')){

            $fileName =  Str::slug($request->question).'.'.$request->image->extension();
            $fileNameWithUploadPath = 'uploads/'.$fileName;
           
            $request->image->move(public_path('uploads'),$fileName); 
           
            $request->merge([

                'image' =>$fileNameWithUploadPath

            ]);
     
        }
   
        Quiz::find($quiz_id)->questions()->create($request->post());
     return redirect()->route('questions.index',$quiz_id)->withSuccess('Soru Başarılı Bir Şekilde Oluşturuldu');
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
    public function edit( $quiz_id ,$question_id)
    {
         $single_question = Quiz::find($quiz_id)->questions()->where('id',$question_id)->first() ?? abort('404','Ahey Soru Yada Quiz Bulunamadı');
      return(view('admin.question.update',compact( 'single_question','question_id','quiz_id')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionUpdateRequest $request, $quiz_id , $question_id)
    {
        
        $data = $request->except(['_token','_method']);

        if($request->image){
  
                $fileName = Str::slug($request->question).".".$request->image->extension();
                $fileNameWithUploadPath = 'uploads/'.$fileName;

                $request->image->move(public_Path('uploads'), $fileNameWithUploadPath);

                // $request->merge([

                //     'image' =>$fileNameWithUploadPath
    
                // ]);


        $data['image'] = $fileNameWithUploadPath;
             
        }

        

       
        //gorsel guncellemıyor z-xamp hatası berıor
     Quiz::find($quiz_id)->questions()->where('id',$question_id)->update($data);
     return redirect()->route('questions.index',$quiz_id)->withSuccess('Güncelleme Başarılı');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
