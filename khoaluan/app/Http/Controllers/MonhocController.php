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
      $monhoc=Monhoc::all();
      $hocky=Hocky::all();
      return view('admin.monhoc.list',compact('hocky','monhoc'));
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
      return redirect()->back();
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

    //Xoa mon Mon hoc
    public function deleteMH($id){
        $DIEM=Monhoc::find($id)->diems;
        foreach($DIEM as $value){
          $value->delete();
        }
        Monhoc::find($id)->delete();
        return redirect()->back();
    }
    //Hien thi trang edit
    public function showEdit($id){
        $monhoc=Monhoc::find($id);
        $hocky=Hocky::select('id','tenhocky')->where('id',$monhoc->hocky_id)->first();
        return view('admin.monhoc.edit',compact('hocky','monhoc'));
    }
    //Post mon hoc sau khi edit
    public function postEdit(Request $request,$id){
      $monhoc= Monhoc::find($id);
      $tatmonhoc=Monhoc::where('hocky_id',$monhoc->hocky_id)->get();
      foreach($tatmonhoc as $mon){
        if($mon->mamon==$request->mamon && $mon->magv==$request->magv){
          echo "da ton tai";
          return ;
        }
      }
      $monhoc->mamon=$request->mamon;
      $monhoc->magv=$request->magv;
      $monhoc->tenmon=$request->tenmon;
      $monhoc->save();
      return redirect()->route('monhoc.list');
    }

}
