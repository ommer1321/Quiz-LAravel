<x-app-layout>
    <x-slot name="header">Quiz Öngörü   </x-slot>
  
    <div class="row">

        

@foreach ($quiz->questions as $question )
 
<form action="{{route('quiz.result',[$quiz->slug])}}" method="POST">
@csrf

<div class="col-md-12 mb-3">
  <div class="card">
    <div class="card-header">
     <b>#{{$loop->iteration}}</b> {{$question->question}}
    </div>
    <div class="card-body">
<center>
  <a href="{{asset($question->image)}}" target="blank">
  <img src="{{asset($question->image)}}" width="700px" alt="">
  </a>
</center>
<br>


      
  <h5 class="card-title text-muted">
    @if ($question->correct_answer == 'answer1'   )<b><span style="color: rgb(0, 244, 0)">  (+)</b> </span>  @else <b><span style="color: rgb(244, 0, 0)"> (-) </b> </span>@endif
    {{$quiz->description}}</h5>
      <div class="form-check">
        <input  class="form-check-input" type="radio" @if ($question->myAnswer->answer == 'answer1'  ) checked   @else disabled  @endif  value="answer1" >
        <label class="form-check-label" for="exampleRadios1">
          1- @if ($question->correct_answer == 'answer1'   )<b><span style="color: rgb(0, 244, 0)"> {{$question->answer1}}  </b> </span>  @else  {{$question->answer1}}     @endif
      </div>
    
      <div class="form-check">
        <input  class="form-check-input" type="radio" @if ($question->myAnswer->answer == 'answer2'  ) checked   @else disabled  @endif  value="answer2" >
        <label class="form-check-label" for="exampleRadios1">
          2- @if ($question->correct_answer == 'answer2'   ) <b><span style="color: green"> {{$question->answer2}} </b>   </span>  @else  {{$question->answer2}}     @endif
        </label>
      </div>
      

      <div class="form-check">
        <input  class="form-check-input" type="radio" @if ($question->myAnswer->answer == 'answer3'  ) checked   @else disabled  @endif    value="answer3" >
        <label class="form-check-label" for="exampleRadios1">
          3- @if ($question->correct_answer == 'answer3'   )<b><span style="color: rgb(0, 244, 0)"> {{$question->answer3}}  </b> </span>  @else  {{$question->answer3}}     @endif
        </label>
      </div>
    
      <div class="form-check">
        <input  class="form-check-input" type="radio" @if ($question->myAnswer->answer == 'answer4'  ) checked   @else disabled  @endif     value="answer4" >
        <label class="form-check-label" for="exampleRadios1">
          4- @if ($question->correct_answer == 'answer4'   )<b><span style="color: rgb(0, 244, 0)"> {{$question->answer4}}  </b> </span>  @else  {{$question->answer4}}     @endif
        </label>
      </div>
    
  
    </div>
  </div>
</div>

@endforeach


  </form>







    </div>


























</x-app-layout>
