<x-app-layout>
    <x-slot name="header">Quiz Detayları      
    </x-slot>
  
    <div class="row">

        

@foreach ($quiz->questions as $question )
  

        
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

<form action="" method="POST">
      
  <h5 class="card-title text-muted"> {{$quiz->description}}</h5>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="answer{{$question->id}}" value="answer{{$question->id}}" >
        <label class="form-check-label" for="exampleRadios1">
          1- {{$question->answer1}}
        </label>
      </div>
    
      <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="answer{{$question->id}}" value="option1" >
        <label class="form-check-label" for="exampleRadios1">
          2- {{$question->answer2}}
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="answer{{$question->id}}" value="option1" >
        <label class="form-check-label" for="exampleRadios1">
          3- {{$question->answer3}}
        </label>
      </div>
    
      <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="answer{{$question->id}}" value="option1" >
        <label class="form-check-label" for="exampleRadios1">
          4- {{$question->answer4}}
        </label>
      </div>
    
    </form>
    </div>
  </div>
</div>

@endforeach





<div class="d-grid gap-2 col-6 mx-auto">
  <button style="color: rgb(18, 17, 17);" class="btn btn-success" type="button">Sınavı Bitir</button>

</div>










    </div>


























</x-app-layout>
