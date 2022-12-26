<x-app-layout>
    <x-slot name="header">Quiz Güncelle      
    </x-slot>
  


<div class="card">


  <div class="card-body">

<form method="POST" action="{{route('quizzes.update',$quiz->id)}}" >
@method('PUT')
  @csrf


<div class="form-group">
      <Label>*Quiz Başlığı</Label>
      <input type="text" name="title" class="form-control" value="{{$quiz->title}}" required> 
    </div>

    <br>
<div class="form-group">
  <Label>Quiz Açıklama  (Zorunlu Değil)</Label>
  <textarea name="description"  class="form-control"id="" cols="30" rows="10">{{$quiz->description}}</textarea> 
</div>

<br>
<div class="form-group">
  <Label>Quiz Açıklama  (Zorunlu Değil)</Label>
 <select name="status" id="">
  <option @if ($quiz->status =='passive' ) selected @endif value="passive">Pasif</option>
  <option  @if ($quiz->status =='draft' ) selected @endif value="draft">Taslak</option>
  <option  @if ($quiz->status =='publish' ) selected  @endif @if ($dataCount<4)disabled @endif value="publish">Aktif</option>
 </select>
</div>


<br>
<div class="form-group">
  <Label>Bitiş Tarihi (Zorunlu Değil) </Label>
  <input type="datetime-local" name="finished_at" value="{{$quiz->finished_at}}" class="form-control" > 
</div>

<br>
<button style="color: rgb(0, 0, 0)" type="submit" class="btn btn-light">Güncelle</button>





</form>

  </div>
</div>
</x-app-layout>
