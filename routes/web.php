<?php

use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {

});




Route::group(['middleware'=>'auth'],function(){


    Route::get('panel',[MainController::class,'dashboard'])->name('dashboard');

    Route::get('quiz/{slug}',[MainController::class,'quizDetail'])->name('quiz.detail');

   

});









Route::group(['middleware'=>['auth','isAdmin'],'prefix'=>'admin'],function(){

    Route::get('quizzes/{id}',[QuizController::class,'destroy'])->whereNumber('id')->name('quizzes.destroy');
    
    Route::resource('quizzes',QuizController::class);
    
    Route::get('quiz/{quiz_id}/questions/{question_id}',[QuestionController::class,'destroy'])->whereNumber('question_id')->name('question.destroy');

    Route::resource('quiz/{quiz_id}/questions',QuestionController::class);
  
});


