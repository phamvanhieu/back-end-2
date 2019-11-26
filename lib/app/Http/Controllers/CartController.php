<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
class CartController extends Controller
{
    //Them San Pham Vao Gio Hang
    public function getAddCart(Request $request,$id){
        if(isset($request->qty)){
            $qty = $request->qty;
        }else{
            $qty = 1;
        }
        $product = Product::find($id);
        if($product->sale == 0){
            $product->sale = $product->price;
        }
        $arr = [
            'id' => $id, 
            'name' => $product->name, 
            'qty' => $qty, 
            'price' => $product->sale, 
            'options' => [
                'img' => $product->image
                ]
            ];
        Cart::add($arr);
        return redirect(url('cart/show'));  
    }
    //Hien Thi Trang gio Hang
    public function getShowCart(){
        $product_cart = Cart::content();
        $count_product_cart = Cart::count();
        $total_carts = explode('.00',Cart::total());
        $total_cart = implode($total_carts);
        $total_cart = str_replace(',','.',$total_cart);
        $arr = [
            'product'=>$product_cart,
            'count_product_cart'=>$count_product_cart,
            'total_cart'=>$total_cart
        ];
        return view('frontend.cart',$arr);
    }
    //Xoa San Pham Trong Gio Hang
    public function getDeleteCart($rowId){
        if($rowId != 'all'){
            Cart::remove($rowId);
        }else{
            Cart::destroy();
        }
        
        return back();
    }
    //cap nhat so luong san pham cho gio hang
    public function getUpdateCart($rowId,Request $request){
        $qty = $request->qty;
        Cart::update($rowId, ['qty' => $qty]);
        return back();
    }
}

