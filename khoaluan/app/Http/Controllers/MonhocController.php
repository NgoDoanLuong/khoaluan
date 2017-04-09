<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hocky;
use App\Monhoc;
use Excel;
use Illuminate\Support\Facades\Input;
class MonhocController extends Controller
{
    //
    public function show(){
      $hocky=Hocky::all();
      return view('admin.monhoc.list',compact('hocky'));
    }

    public function create(Request $request){
      $dbmonhoc=Monhoc::select('mamon','magv','hocky_id')->get();
      foreach($dbmonhoc as $value){
        if($request->mamon==$value->mamon && $request->magv==$value->magv && $request->hocky_id==$value->hocky_id){
          echo "mon hoc bi trung";
          return ;
        }
      }
      $monhoc=new Monhoc;
      $monhoc->mamon=$request->mamon;
      $monhoc->magv=$request->magv;
      $monhoc->tenmon=$request->tenmon;
      $monhoc->hocky_id=$request->hocky_id;
      $monhoc->save();
      echo "them mon hoc thanh cong".$request->hocky_id;
    }

    public function createFromExcel(Request $request){
    //  $dbmonhoc=Monhoc::select('mamon','magv','hocky_id')->get();
      $data=Excel::load(Input::file('file'),function($reader){
      })->get();
      $trungmon=array();
      $dbmonhoc=Monhoc::select('mamon','magv','hocky_id')->get();
      foreach($data as $value){
        foreach($dbmonhoc as $db)
        if($value->mamon==$db->mamon && $value->magv==$db->magv && $request->hocky_id==$db->hocky_id){
            array_push($trungmon,$value);
            break;
        }
      };
      if(!empty($trungmon)){
        echo "Khong them duoc va nhung mon bi trung";
        foreach($trungmon as $i){
          echo $i;
        }
        return;
      }else {
        foreach($data as $value){
        $monhoc=new Monhoc;
        $monhoc->mamon=$value['mamon'];
        $monhoc->magv=$value['magv'];
        $monhoc->tenmon=$value['tenmon'];
        $monhoc->hocky_id=$request->hocky_id;
        $monhoc->save();
        }
      }
    }
}
