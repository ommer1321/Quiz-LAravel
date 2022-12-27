<x-app-layout>
    <x-slot name="header">Anasayfa      
    </x-slot>
  
    <div class="row">

        <div class="col-md-8">

            <div class="list-group">
           

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

            Deneme

        </div>























    </div>


























</x-app-layout>
