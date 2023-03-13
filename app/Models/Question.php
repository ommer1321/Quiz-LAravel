<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'question',
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'correct_answer',
        'image'      
        
    ];

    protected  $appends = ['truePercent'];

    public function myAnswer(){

        return $this->hasOne('App\Models\Answer')->where('user_id',auth()->user()->id);
    
    }

    public function allAnswer(){

        return $this->hasMany('App\Models\Answer');
    
    }

    public function Percent(){


        return  $this->hasMany('App\Models\Answer');

    }
    

    public function gettruePercentAttribute(){


        $count_percent = $this->Percent()->count();
          $this->Percent()->get();
        $true_percent = $this->Percent()->where('answer',$this->correct_answer)->count();
        return (100/$count_percent)*$true_percent;    
    }
   
}
