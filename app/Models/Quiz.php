<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'status',       
        'created_at',
        'updated_at',
        'finished_at',
    ];


    public function questions(){

        return $this->hasMany('App\Models\Question');
        

    } 
    
    protected $dates =['finished_at'] ;


        
    public function finishedAtCarbonAttributes($dates){

        return $dates ? Carbon::parse('date') : null ;
        

    } 
    
    
}
