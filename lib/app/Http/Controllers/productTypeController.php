<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Author;
use App\Protype;
use App\Manufacture;
use Illuminate\Support\Facades\DB;
class productTypeController extends Controller
{
    public function getTypeShow(){
        $count_protype = Protype::all()->count();
        $protype = Protype::all();
        return view('backend.type',['count_protype'=>$count_protype,'protype'=>$protype]);
    }
    public function postTypeAdd(Request $request){
        $data = array();
        $data['type_name'] = $request->type_name;
        DB::table('protypes')->insert($data);
        return redirect(url('mobile-admin/protype/show'));
    }
    public function getTypeEdit($id){
        $type = Protype::find($id);
        return view('backend.edittype',['type'=>$type]);
    }
    public function postTypeEdit($id,Request $request){
        $edit_type = Protype::find($id);
        $edit_type->type_name = $request->type_name;
        $edit_type->save();
        return redirect(url('mobile-admin/protype/show'));
    }
    public function getTypeDelete($id){
        $type = Protype::find($id);
        $type->delete();
        return redirect(url('mobile-admin/protype/show'));
    }
}
