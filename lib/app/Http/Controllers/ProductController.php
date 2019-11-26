<?php

namespace App\Http\Controllers;
use App\Product;
use App\Author;
use App\Protype;
use App\Manufacture;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;

class ProductController extends Controller
{
    public function getProductShow(){
        $count_product = Product::all()->count();
        $product = Product::orderBy('product_id','desc')->paginate(10);
        return view('backend.product',['data'=>$product,'count_product'=>$count_product]);
    }
    public function getProductAdd(){
        $protype = Protype::all();
        $manu = Manufacture::all();
        $tam = [
            'protype'=>$protype,
            'manu'=>$manu
        ];
        return view('backend.addproduct',$tam);
    }
    public function postProductAdd(AddProductRequest $request){
        
        $filename = $request->img->getClientOriginalName();
        $product = new Product;
        $product->name = $request->name;
        $product->image = $filename;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->hot = $request->hot;
        $product->sale = $request->sale;
        $product->manu_id = $request->manu_id;
        $product->type_id = $request->type_id;
        $request->img->storeAs('avartar',$filename);
        $product->save();
        return redirect()
            ->intended(url('mobile-admin/product/show'))
            ->withInput()
            ->with('message','Thêm Sản Phẩm Thành Công');
    }
    public function getProductDelete($id){
        $product = Product::find($id);
        $product->delete();
        return back();
    }
    public function getProductEdit($id){
        $product = Product::find($id);
        $type_id = $product->type_id;
        $manu_id = $product->manu_id;
        $hot = $product->hot;
        if($hot == 1){
            $hot_name = 'Hot';
        }else{
            $hot_name = 'Không';
        }
        $type_name = Protype::find($type_id)->type_name;
        $manu_name = Manufacture::find($manu_id)->manu_name;
        $type = Protype::all();
        $manu = Manufacture::all();
        $arr = [
            'pro'=>$product,
            'type_id'=>$type_id,
            'manu_id'=>$manu_id,
            'manu_name'=>$manu_name,
            'type_name'=>$type_name,
            'manu'=>$manu,
            'protype'=>$type,
            'hot_name'=>$hot_name
        ];
        return view('backend.editproduct',$arr);
    }
    public function postProductEdit($id,Request $request){
        if($request->hasFile('img')){
            $filename = $request->img->getClientOriginalName();
            $arr['image'] = $filename;
            $request->img->storeAs('avartar',$filename);
        }
        $product = new Product;
        $arr['name'] = $request->name;
        $arr['price'] = $request->price;
        $arr['description'] = $request->description;
        $arr['hot'] = $request->hot;
        $arr['sale'] = $request->sale;
        $arr['manu_id'] = $request->manu_id;
        $arr['type_id'] = $request->type_id;
        $product->where('product_id',$id)->update($arr);
        return redirect()
            ->intended(url('mobile-admin/product/show'))
            ->withInput()
            ->with('message','Sửa Sản Phẩm Thành Công');
    }
}
