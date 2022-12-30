<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $dates =['finished_at'] ;
    protected $fillable = [
        'title',
        'description',
        'status',       
        'slug',
        'created_at',
        'updated_at',
        'finished_at',
        
    ];

   protected  $appends = ['details'];
    




    public function questions(){

        return $this->hasMany('App\Models\Question');
        

    } 
    



        
    public function finishedAtCarbonAttributes($dates){

        return $dates ? Carbon::parse('date') : null ;
            

    } 


    public function myResult(){

    return $this->hasOne('App\Models\Result')->where('user_id',auth()->user()->id);



    }
    
    
    

    public function allResult(){

        return $this->hasMany('App\Models\Result');
    
    
    
        }

        
        public function top_ten(){

            return $this->hasMany('App\Models\Result')->orderBy('point','desc')->limit(10);
        
        
        
            }
    

        public function getDetailsAttribute(){

         if($this->allResult()->count()>0){
               return [
        
                'avarage' =>round($this->allResult()->avg('point')),
                'join_count' =>count($this->allResult()->get()),

            ]; 
         }else{

            return [
        
                'avarage' =>null,
                'join_count' =>null,

            ]; 


         }

               
        }
        


        public function myQuizOrder(){

            return $this->hasOne('App\Models\Result')->where('user_id',auth()->user()->id)->orderBy('point','asc');
            
                        }

















}
