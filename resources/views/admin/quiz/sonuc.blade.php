<x-app-layout>
    <x-slot name="header">Quizler Liste Sayfası      
    </x-slot>
  

<div class="card">
    <div class=" card-body">
      <h5>
    
    </h5><table class="table caption-top">
           



            <thead>
              <tr>  <th scope="col">#</th>
                <th scope="col">Kullanıcı Adı </th>
                <th scope="col">Doğru</th>            
                <th scope="col">Yanlış</th>
                <th scope="col">Puan</th>
                <th scope="col">Quiz Önizleme</th>
              </tr>
            </thead>
            <tbody>


                
            <div class="alert alert-warning">
              <span style="font-size: 1.3rem">Quiz Başlığı : </span><span style="font-size: 1.3rem"> <b>{{$datas->title}}</b></span> 
              <br>
              <span style="font-size: 1.2rem">Quiz Açıklaması : </span><span style="font-size: 1.2rem"> <b>{{$datas->description}}</b></span> 
              <br>
              <span>Katılımcı Sayısı : </span><span> <b>{{$user_count}}</b></span> 
              <br>
              <span>Ortalama Alınan Puan : 100 \ </span><span> <b>{{$point}}</b></span> 
              


            </div>
              @foreach ( $datas->allResult as $data )
               
                      
            
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->user['name']}}</td>    
                <td>{{$data->correct}}</td>
                <td>{{$data->wrong}}</td>
                <td>{{$data->point}}</td>
           
                <td><a href=""> <span  class="badge bg-primary rounded-pill">Önizle</span></a></td>
              
           <!--route('quiz.onizle',[$data->user['id'],$datas->slug])-->
              
              
                @endforeach    
              </tr>
            
            
        
            </tbody>
          </table>

    <!--</div><div class="card">-->
</div>
</div>
</x-app-layout>
