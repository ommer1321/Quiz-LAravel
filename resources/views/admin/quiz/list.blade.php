<x-app-layout>
    <x-slot name="header">Quizler Liste Sayfası      
    </x-slot>
  

<div class="card">
    <div class=" card-body">
      <h5>
      <div class="float-right"><caption ><a href="{{route('quizzes.create')}}"> + Quiz Oluştur</a></caption></div>
    </h5><table class="table caption-top">
           
<form action="{{route('quizzes.index')}}" method="get" >
<div class="form-row d-flex">

  <div class="col-md-4  ">
    <input type="text" name="title" value="{{request()->get('title')}}" placeholder="Quiz Adı" class="form-control">
  </div>
  

  <div class="col-md-2">
    <select name="status" id="" onchange = "this.form.submit()" >
      <option @if (request()->get('status')=='passive') selected  @endif value="passive">Pasif</option>
      <option @if (request()->get('status')=='publish') selected  @endif value="publish">Aktif</option>
      <option @if (request()->get('status')=='draft') selected  @endif value="draft">Taslak</option>
    </select>
  </div>
 <div class="col-sm-2">
  <input style="color: rgb(0, 0, 0);" type="submit" value="Ara" class="btn btn-primary">
  @if (request()->get('status') || request()->get('title') )
  <a href="{{route('quizzes.index')}}"><input    style="color: rgb(0, 0, 0);" type="button" value="Sıfırla" class="btn btn-secondary"></a>
 @endif  
 </div>
</div>


</form>
            <thead>
              <tr>
                <th scope="col">Quiz</th>
                <th scope="col">Durum</th>            
                <th scope="col">Açıklama</th>
                <th scope="col">Soru Sayısı</th>
                <th scope="col">Bitiş Tarihi</th>
                <th scope="col">Durum</th>
                <th scope="col">İşlemler</th>
              </tr>
            </thead>
            <tbody>


                @foreach ($quizzes as $quiz )
                
                    
            
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$quiz->title}}</td>
                <td>{{$quiz->description}}</td>
                <td>{{$quiz->questions_count}}</td>
                <td><span title="{{$quiz->finished_at}}"> {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : '-'}}</span></td>
                @switch($quiz->status)
                  @case('draft')
                  <td><span style="color: white ; background-color: rgba(214, 201, 15, 0.733);" class="badge badge-success">{{$quiz->status}}</span></td>
                    @break
                
                    @case('publish')
                    <td><span style="color: white ; background-color: rgba(12, 198, 68, 0.733);" class="badge badge-success">{{$quiz->status}}</span></td>
                      @break
                  
                      @case('passive')
                      <td><span style="color: white ; background-color: rgba(198, 12, 12, 0.733);" class="badge badge-success">{{$quiz->status}}</span></td>
                        @break
                  @default
                    
                @endswitch
              
                <td>    
                  <a style="color: rgb(14, 197, 14)" href="{{route('quizzes.sonuc',$quiz->id)}}"> <b>Sonuçlar</b></a> <br> 
                  <a href="{{Route('quizzes.edit',$quiz->id)}}"> <b>Düzenle</b></a> <br> 
                  <a href="{{Route('quizzes.destroy',$quiz->id)}}"><b>Sil</b></a> <br> 
                  <a href="{{Route('questions.index',$quiz->id)}}"><b>Sorular</b></a></td>
                  
              </tr>
            
                @endforeach
        
            </tbody>
          </table>
   {{$quizzes->withQueryString()->links()}}
    <!--</div><div class="card">-->
</div>
</div>
</x-app-layout>
