<x-app-layout>
    <x-slot name="header">Quiz Sınav  </x-slot>
  
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


      
  <h5 class="card-title text-muted"> {{$quiz->description}}</h5>
      <div class="form-check">
        <input required class="form-check-input" type="radio" name="{{$question->id}}" id="{{$question->id}}" value="answer1" >
        <label class="form-check-label" for="exampleRadios1">
          1- {{$question->answer1}}
        </label>
      </div>
    
      <div class="form-check">
        <input required class="form-check-input" type="radio" name="{{$question->id}}" id="{{$question->id}}" value="answer2" >
        <label class="form-check-label" for="exampleRadios1">
          2- {{$question->answer2}}
        </label>
      </div>

      <div class="form-check">
        <input required class="form-check-input" type="radio" name="{{$question->id}}" id="{{$question->id}}" value="answer3" >
        <label class="form-check-label" for="exampleRadios1">
          3- {{$question->answer3}}
        </label>
      </div>
    
      <div class="form-check">
        <input required class="form-check-input" type="radio" name="{{$question->id}}" id="{{$question->id}}" value="answer4" >
        <label class="form-check-label" for="exampleRadios1">
          4- {{$question->answer4}}
        </label>
      </div>
    
  
    </div>
  </div>
</div>

@endforeach





<div class="d-grid gap-2 col-6 mx-auto">
  <input style="color: rgb(18, 17, 17);" class="btn btn-success" type="submit" value="Sınavı Bitir" >
  

</div>


  </form>







    </div>


























</x-app-layout>
