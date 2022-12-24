<x-app-layout>
    <x-slot name="header"> {{$quiz->title}}</x-slot>
  


    <div class="card card-body">
        <table class="table caption-top">
            <caption><a href=""> + Soru Oluştur</a></caption>

            <thead>
              <tr>
                <th scope="col">Soru</th>
                <th scope="col">Görsel</th>
                <th scope="col">Cevap 1</th>
                <th scope="col">Cevap 2</th>
                <th scope="col">Cevap 3</th>
                <th scope="col">Cevap 4</th>            
                <th scope="col">Doğru Cevap</th>
                <th scope="col">İşlemler</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($quiz->questions as $question )
                <tr>
                  
                    
               

                 <td>{{$question->question}}</td>
                <td>@if ($question->image == null) <b style="color: rgb(255, 0, 0)">---</b> @endif   {{$question->image}}</td>
                 <td> {{$question->answer1}}      </td>
                 <td>{{$question->answer2}}</td>
                 <td>{{$question->answer3}}</td>
                 <td>{{$question->answer4}}</td>
                 <td>{{substr($question->correct_answer,-1)}}</td>
                 <td>
                    <a href="{{Route('quizzes.edit',$quiz->id)}}"> <b style="color: rgb(64, 255, 6)">Düzenle</b></a> <br> 
                    <a href="{{Route('quizzes.destroy',$quiz->id)}}"><b style="color: rgb(255, 0, 0)">Sil</b></a> <br> 
                    <a href="{{Route('questions.index',$quiz->id)}}"><b style="color: rgb(219, 124, 7)">Detay</b></a>
                </td>
                
                  </tr> 
            @endforeach
            </tbody>
          </table>

    <!--</div><div class="card">-->
</div>
</x-app-layout>
