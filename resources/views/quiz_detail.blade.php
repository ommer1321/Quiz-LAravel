<x-app-layout>
    <x-slot name="header">Quiz Detayları      
    </x-slot>
  
    <div class="row">

        <div class="col-md-4">


        <div class="list-group ">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Son Katılma Tarihi</div>      
              </div>
              <span class="badge bg-secondary rounded-pill">{{$quiz->finished_at ? $quiz->finished_at->diffForHumans() :  'Tarih Belli Değil'}}</span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Soru Sayısı</div>      
              </div>
              <span class="badge bg-primary rounded-pill">{{$quiz->questions_count ? $quiz->questions_count : '-' }}</span>
            </li>

            @if (!$quiz->details['join_count']==null)
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Katılımcı Sayısı</div>      
              </div>
              <span class="badge bg-primary rounded-pill">{{$quiz->details['join_count']}}</span>
            </li>
            @endif
            
            @if (!$quiz->details['avarage']==null)
                <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="fw-bold">Ortalama Puan</div>      
                          </div>
                          <span class="badge bg-primary rounded-pill">{{$quiz->details['avarage']}}</span>
                        </li>
            @endif
          

            @if (!count($quiz->allResult)>0)
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold bg-warning"> <b><u><i>Bu Quiz'e Henüz Katılan Olmadı !</i></u></b> </div>      
              </div>
              <span class="badge bg-primary rounded-pill">{{$quiz->details['join_count']}}</span>
            </li>
            @endif


           @if (!$quiz->myResult==null)
           
           <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
            <div class="fw-bold text-muted">    Puanım / Doğru / Yanlış</div>      
            </div>
            <span class="badge bg-warning rounded-pill">{{$quiz->myResult->point}}</span>
            <span class="badge bg-success rounded-pill mr-1 ml-1">{{$quiz->myResult->correct}}</span>
            <span class="badge bg-danger rounded-pill">{{$quiz->myResult->wrong}}</span>
          </li>
      
           @endif
    

        </div>

        </div>


        
<div class="col-md-8">
  <div class="card">
    <div class="card-header">
      {{$quiz->title}}
    </div>
    <div class="card-body">
      <h5 class="card-title text-muted"> {{$quiz->description}}</h5>
   
  @if (!$quiz->myResult == null)
  <a href="{{route('quizJoin',$quiz->slug)}}" class=" block btn btn-secondary ">Quiz Sonucum'a Git</a>  
  @endif
      
    
  @if ($quiz->myResult == null)
  <a href="{{route('quizJoin',$quiz->slug)}}" class=" block btn btn-warning">Quiz'e Katıl</a>  
  @endif
    
    </div>
  </div>
</div>
<div class="col-md-4 mt-3">

<div class="card" style="width: 24.3rem;">
  <div class="card-header ">
    <h1><b>İlk 10</b></h1>
  </div>
  <ul class="list-group list-group-flush ">

@if (!$quiz->top_ten==null)
  

    @foreach ($quiz->top_ten as $ia)
    
    
    
    <li class="list-group-item"> 
      <img class="mr-3" style="  border-radius: 2rem; display: inline; width: 50px" src="{{asset($ia->user['profile_photo_url'])}}" alt="">
      <span  class=" mr-1" style="font-size: 1.7rem;  border-radius: 2rem; display: inline;  ">{{$loop->iteration}}.</span>
      {{ $ia->user['name']}}

    @if ($loop->iteration<=3)
    <span class="badge bg-success rounded-pill float-right">{{$ia['point']}}</span>
    @endif


    @if ($loop->iteration < 7 && $loop->iteration > 3 )
    <span class="badge bg-warning rounded-pill float-right">{{$ia['point']}}</span>
    @endif

    @if ($loop->iteration>=7)
    <span class="badge bg-danger rounded-pill float-right">{{$ia['point']}}</span>
    @endif

    </li>

    @endforeach




@endif

  </ul>
</div>

</div>
















    </div>


























</x-app-layout>
