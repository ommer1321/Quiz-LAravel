<x-app-layout>
    <x-slot name="header">Anasayfa      
    </x-slot>
  
    <div class="row">

        <div class="col-md-8">

            <div class="list-group">
              <div class="d-flex w-100 justify-content-between">
            
                  <span style="font-size:1.5rem  ; color: rgb(55, 56, 62)"><b>Aktif Quizler</b></span>

         
                
              </div>

                @foreach ($quizzes as $quiz )
                    
                
                <a href="{{route('quiz.detail',[$quiz->slug])}}" class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{Str::limit($quiz->title,50);}}</h5>
                    <small class="text-muted">{{ $quiz->finished_at ? 'Son Tarih : '.$quiz->finished_at->diffForHumans() : 'Bitiş Tarih Yok';}}</small>
                  </div>
                  <p class="text-muted mb-1">Soru : {{$quiz->questions_count;}}</p>
                  <small class="text-muted">{{$quiz->description;}}</small>
                </a>
                @endforeach
              </div>



              <br>
{{$quizzes->links();}}




        </div>

        <div class="col-md-4">
       
           
         
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
<span style="font-size:1.5rem  ; color: rgb(55, 56, 62)"><b>Çözdüğüm Quizler</b></span>
            </li>
              @foreach ($myResultList as $Myresult )
          
            <li class="list-group-item d-flex justify-content-between align-items-center">
              {{  substr($Myresult->myList[0]->title,0,150) }}
            <a class="btn btn-secondary" href="{{route('quiz.review',$Myresult->myList[0]->slug)}}" role="button">{{$Myresult->myList[0]->id}}</a>
            </li>
            
              @endforeach
              {{$myResultList->links();}}
           
          </ul>
          

        </div>






















    </div>


























</x-app-layout>
