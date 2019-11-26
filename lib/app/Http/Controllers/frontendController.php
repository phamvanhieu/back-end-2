<?php

namespace App\Http\Controllers;
use Auth;
use phpDocumentor\Reflection\Types\Null_;
use App\Product;
use App\Author;
use App\Bill;
use App\Customer;
use App\User;
use App\Protype;
use App\Billdetail;
use App\Comment;
use App\Manufacture;
use Cart;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Double;

class frontendController extends Controller
{
    //Hien Thi Trang Chu
    public function getIndex(){
        $products = Product::all();
        $pro = Product::orderBy('product_id','desc')->take(4)->get();
        $arr = [
            'data'=>$products,
            'pro'=>$pro
        ];
        return view('frontend.index',$arr);
    }
    //Hien Thi Trang Chi Tiet San Pham
    public function getDetail($id){
        $products = Product::find($id);
        $type_id = $products->type_id;
        $manu_id = $products->manu_id;
        $type_name = Protype::find($type_id)->type_name;
        $manu_name = Manufacture::find($manu_id)->manu_name;
        $comment = Comment::where('product_id','=',$id)->get();
        $count_cmt = Comment::where('product_id','=',$id)->get()->count();
        $arr = [
            'id'=>$id,
            'data'=>$products,
            'type_name'=>$type_name,
            'manu_name'=>$manu_name,
            'cmt'=>$comment,
            'count_cmt'=>$count_cmt
        ];
        return view('frontend.detail',$arr);
    }
    //Hien Thi Trang Danh Muc
    public function getCategory($type_id,$manu_id = NULL){
        if($manu_id != NULL){
            $type_name = Protype::find($type_id)->type_name;
            $manu_name = Manufacture::find($manu_id)->manu_name;
            $products = Product::where('type_id', '=',$type_id)
                                ->where('manu_id', '=',$manu_id)
                                ->orderBy('product_id','desc')
                                ->paginate(8);
            $arr = [
                'data'=>$products,
                'type_name'=>$type_name,
                'manu_name'=>$manu_name
            ];
        }else{
            $type_name = Protype::find($type_id)->type_name;
            $products = Product::where('type_id', '=',$type_id)
                                ->orderBy('product_id','desc')
                                ->paginate(8);
            $arr = [
                'data'=>$products,
                'type_name'=>$type_name
            ];
            
        }
        return view('frontend.category',$arr);
    }
    //Hien Thi Trang Hang San Xuat
    public function getManufacture($manu_id){
        $manu_name = Manufacture::find($manu_id)->manu_name;
        $products = Product::where('manu_id', '=',$manu_id)->orderBy('product_id','desc')->paginate(8);
        $arr = [
            'data'=>$products,
            'manu_name'=>$manu_name
        ];
        return view('frontend.manufacture',$arr);
    }
    //Hien Thi Trang Lien He
    public function getContact(){
        $author = Author::take(2)->orderBy('au_id','asc')->get();
        return view('frontend.contact',['data'=>$author]);
    }
    //Xu Ly Trang Lien He
    public function postContact(){
        
    }
    //Hien Thi Trang Dang Nhap User
    public function getLogin(){
        return view('frontend.login');
    }
    //Xu Ly Trang Dang Nhap User
    public function postLogin(Request $request){
        $user = $request->username;
        $pass = $request->password;
        $remember = $request->remember;
        if($remember == 'remember'){
            $remember = true;
        }else{
            $remember = true;
        }
        if(Auth::attempt(['username'=>$user,'password'=>$pass],$remember)){
            return redirect()->intended(url('/'))->withInput()->with('message','Đăng Nhập Thành Công');
        }else{
            return back()->withInput()->with('error','Tài Khoản Hoặc Mật Khẩu Chưa Đúng!!!');
        }
    }
    //Xu Ly Chuc Nang Dang Xuat
    public function getLogout(){
        Auth::logout();
        return redirect()->intended(url('/'))->withInput()->with('message','Đăng Xuất Thành Công');
    }
    //Hien thi Chuc Nang Trang Tim Kiem
    public function search(Request $request){
        $result = $request->search;
        $product_search = Product::where('name','like','%'.$result.'%')->paginate(8);
        $arr =[
            'product_search'=>$product_search,
            'result'=>$result
        ];
        return view('frontend.search',$arr);
    }

    //Xu Ly Chuc Nang Dat Hang
    public function getOrder(Request $request){
        //Kiem Tra Xe Co Khach Hang Chua Neu Co Thi Cap Nhat Khong Thi Them Khach Hang Moi
        $cus = new Customer;
        $cus->fullname = $request->fullname;
        $cus->phone = $request->phone;
        $cus->email = $request->email;
        $cus->country = $request->country;
        $cus->address = $request->address;
        $customer = Customer::where('fullname','=',$cus->fullname)
                            ->where('phone','=',$cus->phone)
                            ->first();
        if(!$customer){
            $cus->save();
            $cus_id = $cus->customer_id;
        }else{
            $cus_id = $customer->customer_id;
        }
        //Them Don Hang Moi Cho Khach Hang 
        $bill = new Bill;
        $bill->customer_id = $cus_id;
        $bill->note = $request->note;
        $total_carts = explode('.00',Cart::total());
        $total_cart = $total_carts[0];
        $total_cart = str_replace(',','',$total_cart);
        $bill->total_price = $total_cart;
        $bill->save();
        //Them Cac San Pham Co Trong Gio Hang Vao Don Hang Tren
        $cart = Cart::content();
        foreach ($cart as $key => $value) {
            $bill_detail = new Billdetail;
            $bill_detail->bill_id = $bill->bill_id;
            $bill_detail->product_id = $value->id;
            $bill_detail->qty = $value->qty;
            if($value->sale == 0){
                $bill_detail->unit_price = $value->price;
            }else{
                $bill_detail->unit_price = $value->sale;
            }
            $bill_detail->save();
        }
        //Xoa Thong Tin Gio Hang
        Cart::destroy();
        return redirect(url('complete'));
    }
    //Dat Hang Thanh Cong Se Chuyen Den Trang Hoan Thanh
    public function getComplete(){
        return view('frontend.complete');
    }
    //Hien Thi Trang Dang Ky User
    public function getRegister(){
        return view('frontend.register');
    }
    //Xu Ly Trang Dang Ky User
    public function postRegister(Request $request){
        $username= $request->username;
        $fullname = $request->fullname;
        $address = $request->address;
        $phone = $request->phone;
        $email = $request->email;
        $country = $request->country;
        $password = $request->password;
        $repassword = $request->repassword;
        $user = User::where('username','=',$username)->get();
        //Kiem Tra Xem Ten Username Co Nguoi Su Dung Chua Neu Co Thi Bao Loi Neu Khong Thi Tiep Tuc
        if(count($user) > 0){
            return back()->withInput()->with('error','Tài Khoản Bị Trùng!!!');
            
        }else{
            if($password == $repassword){
                $password = bcrypt($password);
                $user = new User;
                $user->username = $username;
                $user->fullname = $fullname;
                $user->password = $password;
                $user->address = $address;
                $user->phone = $phone;
                $user->email = $email;
                $user->country = $country;
                $user->save();
                return redirect()->intended(url('login'))->withInput()->with('message','Đăng Ký Thành Công!!!');
            }else{
                return back()->withInput()->with('error','Mật Khẩu không trùng Nhau!!!');
            }
        }
        
    }
    //Xu Ly Chuc Nang Cmt
    public function postComment($id,Request $request){
        $comment = new Comment;
        $content = $request->comment;
        $comment->product_id = $id;
        $comment->name = Auth::user()->fullname;
        $comment->comment = $content;
        $comment->save();
        return back();
    }
}
