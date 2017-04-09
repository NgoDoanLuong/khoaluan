<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tieuchi extends Model
{
    //
    protected $fillable=['id','tentieuchi','hocky_id'];
    public function hocky(){
      return $this->belongsTo('App\Hocky');
    }
    public function diems(){
      return $this->hasMany('App\Diem');
    }
}
