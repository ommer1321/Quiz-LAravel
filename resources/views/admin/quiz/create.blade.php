<x-app-layout>
    <x-slot name="header">Quiz Oluştur      
    </x-slot>
  


<div class="card">


  <div class="card-body">

<form action="{{route('quizzes.store')}}" method="post">
@csrf


<div class="form-group">
      <Label>*Quiz Başlığı</Label>
      <input type="text" name="title" class="form-control" placeholder="" value="{{old('title')}}" required> 
    </div>

    <br>
<div class="form-group">
  <Label>Quiz Açıklama  (Zorunlu Değil)</Label>
  <textarea name="description"  class="form-control"id="" cols="30" rows="10">{{old('description')}}</textarea> 
</div>

<br>
<div class="form-group">
  <Label>Bitiş Tarihi (Zorunlu Değil) </Label>
  <input type="datetime-local" name="finished_at" value="{{old('finished_at')}}" class="form-control" > 
</div>

<br>
<button style="color: rgb(0, 0, 0)" type="submit" class="btn btn-light">Quiz Olustur</button>





</form>

  </div>
</div>
</x-app-layout>
