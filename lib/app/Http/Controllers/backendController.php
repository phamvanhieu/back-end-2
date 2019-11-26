<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Author;
use App\Protype;
use App\Manufacture;
use App\Comment;
use App\Bill;
use App\User;
use App\Customer;
use Auth;

class backendController extends Controller
{
    //hien thi trang dashboard
    public function index(){
        if(Auth::check()){
            $count_product = Product::all()->count();
            $count_comment = Comment::all()->count(); 
            $count_protype = Protype::all()->count();
            $count_manufacture = Manufacture::all()->count();
            $count_bill = Bill::all()->count();
            $count_user = User::all()->count();
            $count_customer = Customer::all()->count();
            $arr = [
                'count_product'=>$count_product,
                'count_comment'=>$count_comment,
                'count_protype'=>$count_protype,   
                'count_manufacture'=>$count_manufacture,
                'count_bill'=>$count_bill,
                'count_user'=>$count_user,
                'count_customer'=>$count_customer
            ];
            return view('backend.index',$arr);
        }else{
            return redirect(url('mobile-admin'));
        }
        
    }
    //Hien Thi Trang Dang Nhap
    public function getlogin(){
        if(Auth::check()){
            return redirect(url('mobile-admin/dashboard'));
        }else{
            return view('backend.login');
        }
        
    }
    //Xu Ly Dang Nhap
    public function postlogin(Request $request){
        $username = $request->username;
        $password = $request->password;
        $arr = [
            'username'=>$username,
            'password'=>$password
        ];
        if(Auth::attempt($arr)){
            return redirect()->intended(url('mobile-admin/dashboard'))->withInput()->with('message','Đăng Nhập Thành Công');
        }else{
            return back()->withInput()->with('error','Tài Khoản Hoặc Mật Khẩu Chưa Đúng!!!');
        }
    }
    //Xu Ly Dang Xuat
    public function getlogout(){
        Auth::logout();
        return redirect()->intended(url('mobile-admin'))->withInput()->with('message','Đăng Xuất Thành Công');
    }
}
