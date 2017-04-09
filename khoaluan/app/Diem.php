<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diem extends Model
{
    //
    protected $fillable=['id','diemdg','tieuchi_id','monhoc_id','sinhvien_id'];

    public function student(){
      return $this->belongsTo('App\Student');
    }

    public function hocky(){
      return $this->belongsTo('App\Hocky');
    }
    public function tieuchi(){
      return $this->belongsTo('App\Tieuchi');
    }
}
