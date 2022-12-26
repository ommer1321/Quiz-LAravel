<x-app-layout>
    <x-slot name="header">Soru Güncelle      
    </x-slot>
  
{{-- {{route('questions.update',$quiz->id,)}} --}}

<div class="card">


  <div class="card-body">

<form action="{{route('questions.update',[$quiz_id,$question_id])}}" method="POST" enctype="multipart/form-data">
  @csrf 
  @method('PUT')

 




<div class="form-group">
  <Label>*Soru   </Label>
  <textarea name="question"  class="form-control" id="" cols="30" rows="10">{{$single_question->question}}</textarea> 
</div>

<br>

@if ($single_question->image)
<a href="{{asset($single_question->image)}}" target="_blank"> <img width="200px"  src="{{asset($single_question->image)}}" alt=""></a> 
@endif
 

 <br>
<Label>Görsel Yükle (<b>Zorunlu Değil</b>)</Label>
<div class="form-group">

  <input type="file" name="image" class="form-control" >
</div>

<br>
 <div class="row">
  
  <div class="col-md-6">
  <div class="form-group">
    <Label>*Cevap 1 </Label>
    <input type="text" name="answer1" class="form-control" placeholder=""value="{{$single_question->answer1}}" > 
  </div>
</div>


  <div class="col-md-6">
  <div class="form-group">
  <Label>*Cevap 2 </Label>
  <input type="text" name="answer2" class="form-control" placeholder="" value="{{$single_question->answer2}}"> 
</div>
</div>
  
<div class="col-md-6">
<div class="form-group">
<Label>*Cevap 3</Label>
<input type="text" name="answer3" class="form-control" placeholder="" value="{{$single_question->answer3}}" > 
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<Label>*Cevap 4</Label>
<input type="text" name="answer4" class="form-control" placeholder="" value="{{$single_question->answer4}}" > 
</div>
</div>


<div class="form-group">
<Label> Doğru Cevap </Label>



<select name="correct_answer" id="" class="form-control">

  <option @if ($single_question->correct_answer=='answer1') selected @endif value="answer1">1. cevap</option>
  <option @if ($single_question->correct_answer=='answer2') selected   @endif value="answer2">2. cevap</option>
  <option @if ($single_question->correct_answer=='answer3') selected   @endif value="answer3">3. cevap</option>
  <option @if ($single_question->correct_answer=='answer4') selected   @endif value="answer4">4. cevap</option>
</select>
</div>



<button style="color: rgb(0, 0, 0)" type="submit" class="btn btn-light">Quiz Olustur</button>


</div>


</form>

  </div>
</div>
</x-app-layout>
