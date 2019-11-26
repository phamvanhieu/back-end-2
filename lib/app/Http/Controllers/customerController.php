<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Bill;
use App\Billdetail;
use Illuminate\Http\Request;

class customerController extends Controller
{
    //Xem Danh Sach Khach Hang
    public function getCusShow(){
        $customer = Customer::Where('customer_id', '>',0)->orderBy('customer_id','desc')->get();
        $count_customer = Customer::all()->count();
        $arr = [
            'data'=>$customer,
            'count_customer'=>$count_customer
        ];
        return view('backend.customer',$arr);
    }
    //Xem Danh Sach Don Hang Cua Khach Hang
    public function getCusviewdetail($id){
        $cus_name = Customer::find($id)->fullname;
        $bill = Bill::Where('customer_id', '=',$id)->get();
        $count_bill = Bill::Where('customer_id', '=',$id)->count();
        $arr = [
            'data'=>$bill,
            'count_bill'=>$count_bill,
            'cus_name'=>$cus_name
        ];
        return view('backend.bill',$arr);
    }
    //Xac Nhan Don Hang
    public function getConfirmbill($id){
        $bill = Bill::find($id);
        $bill->status = 1;
        $bill->save();
        return back();
    }
    //Xoa Khach hang - Don Hang - Chi Tiet Don Hang Cua Khach Hang
    public function getCusDelete($id){
        $cus = Customer::find($id);
        $cus_id = $cus->customer_id;
        $bill = Bill::where('customer_id','=',$cus_id)->get();
        foreach ($bill as $item) {
            $bill_id = $item->bill_id;
            $billdetail = Billdetail::where('bill_id','=',$bill_id)->get();
            foreach ($billdetail as $item) {
                $billdetail_id = $item->billdetail_id;
                $detail_bill = Billdetail::find($billdetail_id);
                $detail_bill->delete();
            }
            $bill = Bill::find($bill_id);
            $bill->delete();
        }
        $cus->delete();
        return back();
    }
    //Xem Chi Tiet Don Hang
    public function getViewDetailBill($id){
        $id_bill = $id;  
        $bill = Bill::find($id_bill);
        $total_price = $bill->total_price;
        $bill_create_at = $bill->created_at;
        $id_cus = Bill::find($id_bill)->customer_id;
        $cus = Customer::find($id_cus);
        $bill_detail = Billdetail::where('bill_id','=',$id)->orderBy('billdetail_id','desc')->get();
        $arr = [
            'data'=>$bill_detail,
            'note'=>$bill->note,
            'total_price'=>$total_price,
            'customer'=>$cus,
            'created_at'=>$bill_create_at
        ];
        return view('backend.detailbill',$arr);
    }
    //Xoa Don Hang - Xoa Chi Tiet Cua Don Hang Do
    public function getDeleteBill($id){
        $billdetail = Billdetail::where('bill_id','=',$id)->get();
        foreach ($billdetail as $item) {
            $billdetail_id = $item->billdetail_id;
            $detail_bill = Billdetail::find($billdetail_id);
            $detail_bill->delete();
        }
        $bill = Bill::find($id);
        $bill->delete();
        return back();
    }
}
