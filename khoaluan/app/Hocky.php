<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hocky extends Model
{
    //
    protected $table='hockys';
    protected $fillable=['id','tenhocky'];

    public function monhocs(){
      return $this->hasMany('App\Monhoc');
    }
    public function tieuchis(){
      return $this->hasMany('App\Tieuchi');
    }
}
