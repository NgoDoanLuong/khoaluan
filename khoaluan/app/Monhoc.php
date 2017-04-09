<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monhoc extends Model
{
    //
    protected $fillable=['id','magv','mamon','tenmon','hocky_id'];

    public function hocky(){
      return $this->belongsTo('App\Hocky');
    }

    public function diems(){
      return $this->hasMany('App\Diem');
    }
}
