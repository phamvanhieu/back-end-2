<?php

namespace App\Http\Controllers;

use App\Manufacture;
use Illuminate\Http\Request;

class manufactureController extends Controller
{
    //Hien Thi Trang Danh Sach Hang San Xuat
    public function getManuShow(){
        $count_manu = Manufacture::all()->count();
        $manu = Manufacture::all();
        $arr = [
            'count_manu'=>$count_manu,
            'manu'=>$manu
        ];
        return view('backend.manufacture',$arr);
    }
    //Chuc Nang Them Hang San Xuat
    public function postManuAdd(Request $request){
        $data = array();
        $data['manu_name'] = $request->manu_name;
        $manu = new Manufacture;
        $manu->insert($data);
        return redirect(url('mobile-admin/manufacture/show'));
    }
    //Hien Thi Trang Sua Hang San Xuat
    public function getManuEdit($id){
        $manu = Manufacture::find($id);
        return view('backend.editmanu',['manu'=>$manu]);
    }
    //Chuc Nang Sua Hang San Xuat
    public function postManuEdit($id,Request $request){
        $edit_manu = Manufacture::find($id);
        $edit_manu->manu_name = $request->manu_name;
        $edit_manu->save();
        return redirect(url('mobile-admin/manufacture/show'));
    }
    //Chuc Nang Xoa Hang San Xuat
    public function getManuDelete($id){
        $manu = Manufacture::find($id);
        $manu->delete();
        return redirect(url('mobile-admin/manufacture/show'));
    }
}
