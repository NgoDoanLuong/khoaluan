<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable=['id','name','email','class','MSSV'];

    protected $hidden=['password'];

    public function diems(){
      return $this->hasMany('App\Diem');
    }
}
