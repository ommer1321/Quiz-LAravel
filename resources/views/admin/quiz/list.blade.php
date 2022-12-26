<x-app-layout>
    <x-slot name="header">Quizler Liste Sayfası      
    </x-slot>
  


    <div class="card card-body">
        <table class="table caption-top">
            <caption><a href="{{route('quizzes.create')}}"> + Quiz Oluştur</a></caption>

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
                  <a href="{{Route('quizzes.edit',$quiz->id)}}"> <b>Düzenle</b></a> <br> 
                  <a href="{{Route('quizzes.destroy',$quiz->id)}}"><b>Sil</b></a> <br> 
                  <a href="{{Route('questions.index',$quiz->id)}}"><b>Sorular</b></a></td>
              </tr>
            
                @endforeach
        
            </tbody>
          </table>
   {{$quizzes->links()}}
    <!--</div><div class="card">-->
</div>
</x-app-layout>
