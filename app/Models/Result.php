<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Result extends Model
{
    use HasFactory;
protected $fillable = [
    'id',
    'quiz_id',
    'user_id',
    'point',
    'correct',
    'wrong',
    'created_at',
    'updated_at',


];

public function userDetail(){

    return $this->hasMany('App\Models\User');

}


public function user(){

    return $this->belongsTo('App\Models\User');
    
}


public function myList(){


    return $this->hasMany('App\Models\Quiz','id','quiz_id');

}

}
