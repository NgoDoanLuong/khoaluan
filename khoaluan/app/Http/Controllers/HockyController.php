<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hocky;
class HockyController extends Controller
{
    //
    public function show(){
      $hocky=Hocky::all();
      return view('admin.hocky',compact('hocky'));
    }
    public function create(Request $request){
        $hocky=new Hocky;
        $hocky->tenhocky=$request->tenhocky;
        $hocky->save();
        return redirect()->back();
    }
    public function delete($id){
      $monhocs=Hocky::find($id)->monhocs;
      foreach($monhocs as $monhoc){
        $DIEM=$monhoc->diems;
        foreach($DIEM as $tungdiem){
          $tungdiem->delete();  //Xoa diem
        }
        $monhoc->delete();  //Xoa mon hoc
      }
      //Xoá tiêu chí
      $tieuchis=Hocky::find($id)->tieuchis;
      foreach($tieuchis as $tieuchi){
        $tieuchi->delete();
      }
      //Xoá học kì
      Hocky::find($id)->delete();
      return redirect()->back();
    }
}
