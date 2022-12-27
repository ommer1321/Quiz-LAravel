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
              <span class="badge bg-primary rounded-pill">{{$quiz->finished_at ? $quiz->finished_at->diffForHumans() :  'Tarih Belli Değil'}}</span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Soru Sayısı</div>      
              </div>
              <span class="badge bg-primary rounded-pill">{{$quiz->questions_count}}</span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Katılımcı Sayısı</div>      
              </div>
              <span class="badge bg-primary rounded-pill">-</span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Ortalama Puan</div>      
              </div>
              <span class="badge bg-primary rounded-pill">-</span>
            </li>

        
    

        </div>

        </div>


        
<div class="col-md-8">
  <div class="card">
    <div class="card-header">
      {{$quiz->title}}
    </div>
    <div class="card-body">
      <h5 class="card-title text-muted"> {{$quiz->description}}</h5>
   
  
      <a href="#" class="btn btn-primary">Quiz'e Katıl</a>   <a href="#" class="btn btn-primary">Quiz'e Katıl</a>
    </div>
  </div>
</div>






















    </div>


























</x-app-layout>
