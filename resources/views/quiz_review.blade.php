<x-app-layout>
    <x-slot name="header"> Quiz Önizleme : {{$quiz->title}}   </x-slot>
  
    <div class="row">

        
<div class="alert alert-warning">
  <p class="mb-2" >İşaretlediğiniz Şık Doğru İse => (+)   Yanlış ise => (-) ile ifade edilmektedir. </p>
  <b  class="mb-2"><h1 style="color: rgba(1, 130, 6, 0.867); font-size: 1.7rem">Puan : {{$quiz->myResult->point}}</h1> </b>
 
  <b  class="mr-2"><span style="color: rgb(5, 155, 5)"> Doğru :  {{$quiz->myResult->correct}} </b> </span> 
  <b><span style="color: rgb(186, 3, 3)"> Yanlış :  {{$quiz->myResult->wrong}} </b> </span> 
</div>
@foreach ($quiz->questions as $question )
 
<form action="{{route('quiz.result',[$quiz->slug])}}" method="POST">
@csrf

<div class="col-md-12 mb-3">
  <div class="card ">
    <div class="card-header">
      @if ($question->correct_answer == 'answer1'   )<b><span style="color: rgb(0, 244, 0)">  (+) Dogru</b> </span>  @else <b><span style="color: rgb(244, 0, 0)"> (-)  Yanlış </b></span>@endif  <b>#{{$loop->iteration}}</b> {{$question->question}}
    </div>
    <div class="card-body">
<center>
  <a href="{{asset($question->image)}}" target="blank">
  <img src="{{asset($question->image)}}" width="700px" alt="">
  </a>
</center>
<br>


      
  <h5 class="card-title text-muted " style="font-size: 1.2rem ">
   
    {{$quiz->description}}</h5>

      <div class="form-check">
        <input  class="form-check-input" type="radio" @if ($question->myAnswer->answer == 'answer1'  ) checked   @else disabled  @endif  value="answer1" >
        <label class="form-check-label" for="exampleRadios1">
         @if ($question->correct_answer == 'answer1'   )<b><span style="color: rgb(0, 244, 0)">  1- {{$question->answer1}}  </b> </span>  @else 1- {{$question->answer1}}    @endif
      </div>
    
      <div class="form-check">
        <input  class="form-check-input" type="radio" @if ($question->myAnswer->answer == 'answer2'  ) checked   @else disabled  @endif  value="answer2" >
        <label class="form-check-label" for="exampleRadios1">
          @if ($question->correct_answer == 'answer2'   ) <b><span style="color: rgb(0, 244, 0)">  2- {{$question->answer2}} </b>   </span>  @else 2- {{$question->answer2}}    @endif
        </label>
      </div>
      

      <div class="form-check">
        <input  class="form-check-input" type="radio" @if ($question->myAnswer->answer == 'answer3'  ) checked   @else disabled  @endif    value="answer3" >
        <label class="form-check-label" for="exampleRadios1">
           @if ($question->correct_answer == 'answer3'   )<b><span style="color: rgb(0, 244, 0)"> 3- {{$question->answer3}}  </b> </span>  @else 3- {{$question->answer3}}     @endif
        </label>
      </div>
    
      <div class="form-check">
        <input  class="form-check-input" type="radio" @if ($question->myAnswer->answer == 'answer4'  ) checked   @else disabled  @endif     value="answer4" >
        <label class="form-check-label" for="exampleRadios1">
         @if ($question->correct_answer == 'answer4'   )<b><span style="color: rgb(0, 244, 0)">4- {{$question->answer4}}  </b> </span>  @else  4- {{$question->answer4}}    @endif
        </label>
      </div>
     
    <div class="alert alert-info mt-3">
        Bu Soruya  <b> %{{$question->true_percent}}</b> Oranında Doğru Cevap Verildi.. 
    </div>
  
    </div>
  </div>
</div>

@endforeach


  </form>







    </div>


























</x-app-layout>
