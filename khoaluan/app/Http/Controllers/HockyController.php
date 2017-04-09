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

      /*
$monhoc_diem_id=Monhoc::select('id','hocky_id')->where('hocky_id',$id)->toArray();//Tìm tất cả id môn học có hocky_id=$id (bằng id của học kỳ)
      foreach($monhoc_diem_id as $value){
        Diem::where('monhoc_id',$value)->delete();//Đưa các môn đó vào mảng rồi for , rồi tìm những cái diểm có monhoc_id=id của môn học và xoá
      }
      $tieuchi_diem_id=Tieuchi::select('id','tieuchi_id')->where('tieuchi_id',$id)->toArray();//Tìm tatas cả id tiêu chí có cùng hocky_id
      foreach($tieuchi_diem_id as $value){
        Diem::where('tieuchi_id',$value)->delete();//Cũng đưa vào màng rồi for, tìm những điểm = tieuchi_id và xoá
      }*/


      // comment:toggleMonhoc::select('id','hocky_id')->where('hocky_id',$id)->delete();    //Xoá tất môn học của học kì
      //Xoá điểm

      $monhocs=Hocky::find($id)->monhocs->toArray();
      foreach($monhocs as $monhoc){
        $diems=$monhoc->diems->toArray();
        foreach($diems as $diem){
          $diem->delete();  //Xoa diem
        }
        $monhoc->delete();  //Xoa mon hoc
      }
      //Xoá tiêu chí
      $tieuchis=Hocky::find($id)->tieuchis->toArray();
      foreach($tieuchis as $tieuchi){
        $tieuchi->delete();
      }
      // comment:toggleTieuchi::elect('id','tieuchi_id')->where('tieuchi_id',$id)->delete();//Xoá tất tiêu chí liên quan đến học kì
      Hocky::find($id)->delete();
      return redirect()->back();
    }
}
