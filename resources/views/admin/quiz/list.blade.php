<x-app-layout>
    <x-slot name="header">Liste      
    </x-slot>
  


    <div class="card card-body">
        <table class="table caption-top">
            <caption><a href="{{route('quizzes.create')}}"> + Quiz Oluştur</a></caption>

            <thead>
              <tr>
                <th scope="col">Quiz</th>
                <th scope="col">Durum</th>            
                <th scope="col">Açıklama</th>
                <th scope="col">Bitiş Tarihi</th>
                <th scope="col">İşlemler</th>
              </tr>
            </thead>
            <tbody>


                @foreach ($quizzes as $quiz )
                
                    
            
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$quiz->title}}</td>
                <td>{{$quiz->description}}</td>
                <td>@if($quiz->finished_at == null)-@endif{{$quiz->finished_at}}</td>
                <td>{{$quiz->status}}</td>
                <td>
                  <a href="{{Route('quizzes.edit',$quiz->id)}}"> <b>Düzenle</b></a> <br> 
                  <a href="{{Route('quizzes.destroy',$quiz->id)}}"><b>Sil</b></a> <br> 
                  <a href="{{Route('questions.index',$quiz->id)}}"><b>Detay</b></a></td>
              </tr>
            
                @endforeach
        
            </tbody>
          </table>
   {{$quizzes->links()}}
    <!--</div><div class="card">-->
</div>
</x-app-layout>
