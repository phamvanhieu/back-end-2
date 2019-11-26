
@extends('frontend.master')
@section('content')
<!-- Cart -->
<div class="col-sm-8 col-lg-9 mtb_5">
    <div class="heading-part">
      <h2 class="main_title">Giỏ Hàng</h2> 
    </div><br><br>
  @if (count($product) > 0)
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead> 
          <tr>
            <td class="text-center">Hình Ảnh</td>
            <td class="text-left">Sản Phẩm</td>
            <td class="text-left">Số Lượng</td>
            <td class="text-right">Giá</td>
            <td class="text-right">Thành Tiền</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($product as $item)
              
          
          <tr>
            <td class="text-center"><a href="{{ url('detail') }}/{{$item->id}}/{{str_slug($item->name)}}.html"><img src="{{ asset('lib/storage/app/avartar/'.$item->options->img) }}" width="100px" alt="iPod Classic" title="iPod Classic"></a></td>
          <td class="text-left"><a href="{{ url('detail') }}/{{$item->id}}/{{str_slug($item->name)}}.html">{{$item->name}}</a></td>
            <td class="text-left">
              <div style="max-width: 200px;" class="input-group btn-block">
            <form action="{{ url('cart/update/'.$item->rowId) }}" method="get">
                <input type="text" class="form-control quantity" size="1" value="{{$item->qty}}" name="qty">
                <span class="input-group-btn">
              <button style="height: 37px;line-height: 18px" class="btn" title="" data-toggle="tooltip" type="submit" data-original-title="Update"><i class="fa fa-refresh"></i></button>
            </form>
              <a href="{{ url('cart/delete/'.$item->rowId) }}" style="height: 37px;line-height: 18px"  class="btn btn-danger" title="" data-toggle="tooltip" type="button" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
              </span></div>
            </td>
            <td class="text-right">{{number_format($item->price,0,',','.')}} đ</td>
            <td class="text-right">{{number_format($item->price * $item->qty,0,',','.')}} đ</td>
          </tr>
          
          @endforeach
          <a class="btn pull-left " href="{{ url('cart/delete/all') }}">Xóa Giỏ Hàng</a> <br><br>
        </tbody>
      </table>
    </div>
  <h3 class="mtb_10">Bạn Có Muốn Tiếp Tục</h3>
  <div class="panel-group mt_20" id="accordion">
    <div class="panel panel-default pull-left">
      <div class="panel-heading">
        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Nhập Thông Tin &amp; Thanh Toán <i class="fa fa-caret-down"></i></a> </h4>
      </div>
      <div id="collapseThree" class="panel-collapse collapse">
        <div class="panel-body">
          <p>Nhập Chính Xác Thông Tin Để Giao Hàng Đúng Cho Bạn!!!.</p>
        <form class="form-horizontal" action="{{ url('order') }}" method="get">
            <div class="form-group required">
              <label for="input-postcode" class="col-sm-2 control-label">Họ Và Tên *</label>
              <div class="col-sm-10">
              <input type="text" value="@if(Auth::check()){{Auth::user()->fullname}}@endif" required class="form-control" id="input-postcode" placeholder="Tên Của Bạn"  name="fullname">
              </div>
            </div>
            <div class="form-group required">
              <label for="input-postcode" class="col-sm-2 control-label">Số Điện Thoại *</label>
              <div class="col-sm-10">
                <input type="text" value="@if(Auth::check()){{Auth::user()->phone}}@endif" required class="form-control" id="input-postcode" placeholder="Số Điện Thoại" name="phone">
              </div>
            </div>
            <div class="form-group required">
              <label for="input-postcode" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" value="@if(Auth::check()){{Auth::user()->email}}@endif" class="form-control" id="input-postcode" placeholder="Email" value="" name="email">
              </div>
            </div>
            
            <div class="form-group required">
              <label for="input-country" class="col-sm-2 control-label">Tỉnh/Thành Phố *</label>
              <div class="col-sm-10">
                <select required class="form-control" id="input-country" name="country" onchange="validateSelectBox(this)">
                  <option value="@if(Auth::check()){{Auth::user()->country}}@endif"> @if(Auth::check()){{Auth::user()->country}}@else --- Mời Chọn --- @endif </option>
                  <option value="Hà Nội">Hà Nội</option>
                  <option value="TP Hồ Chí Minh">TP Hồ Chí Minh</option>
                  <option value="Cần Thơ">Cần Thơ</option>
                  <option value="Đà Nẵng">Đà Nẵng</option>
                  <option value="Hải Phòng">Hải Phòng</option>
                  <option value="An Giang">An Giang</option>
                  <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
                  <option value="Bắc Giang">Bắc Giang</option>
                  <option value="Bắc Kạn">Bắc Kạn</option>
                  <option value="Bạc Liêu">Bạc Liêu</option>
                  <option value="Bắc Ninh">Bắc Ninh</option>
                  <option value="Bến Tre">Bến Tre</option>
                  <option value="Bình Định">Bình Định</option>
                  <option value="Bình Dương">Bình Dương</option>
                  <option value="Bình Phước">Bình Phước</option>
                  <option value="Bình Thuận">Bình Thuận</option>
                  <option value="Cà Mau">Cà Mau</option>
                  <option value="Cao Bằng">Cao Bằng</option>
                  <option value="Đắk Lắk">Đắk Lắk</option>
                  <option value="Đắk Nông">Đắk Nông</option>
                  <option value="Điện Biên">Điện Biên</option>
                  <option value="Đồng Nai">Đồng Nai</option>
                  <option value="Đồng Tháp">Đồng Tháp</option>
                  <option value="Gia Lai">Gia Lai</option>
                  <option value="Hà Giang">Hà Giang</option>
                  <option value="Hà Nam">Hà Nam</option>
                  <option value="Hà Tĩnh">Hà Tĩnh</option>
                  <option value="Hải Dương">Hải Dương</option>
                  <option value="Hậu Giang">Hậu Giang</option>
                  <option value="Hòa Bình">Hòa Bình</option>
                  <option value="Hưng Yên">Hưng Yên</option>
                  <option value="Khánh Hòa">Khánh Hòa</option>
                  <option value="Kiên Giang">Kiên Giang</option>
                  <option value="Kon Tum">Kon Tum</option>
                  <option value="Lai Châu">Lai Châu</option>
                  <option value="Lâm Đồng">Lâm Đồng</option>
                  <option value="Lạng Sơn">Lạng Sơn</option>
                  <option value="Lào Cai">Lào Cai</option>
                  <option value="Long An">Long An</option>
                  <option value="Nam Định">Nam Định</option>
                  <option value="Nghệ An">Nghệ An</option>
                  <option value="Ninh Bình">Ninh Bình</option>
                  <option value="Ninh Thuận">Ninh Thuận</option>
                  <option value="Phú Thọ">Phú Thọ</option>
                  <option value="Quảng Bình">Quảng Bình</option>
                  <option value="Quảng Nam">Quảng Nam</option>
                  <option value="Quảng Ngãi">Quảng Ngãi</option>
                  <option value="Quảng Ninh">Quảng Ninh</option>
                  <option value="Quảng Trị">Quảng Trị</option>
                  <option value="Sóc Trăng">Sóc Trăng</option>
                  <option value="Sơn La">Sơn La</option>
                  <option value="Tây Ninh">Tây Ninh</option>
                  <option value="Thái Bình">Thái Bình</option>
                  <option value="Thái Nguyên">Thái Nguyên</option>
                  <option value="Thanh Hóa">Thanh Hóa</option>
                  <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                  <option value="Tiền Giang">Tiền Giang</option>
                  <option value="Trà Vinh">Trà Vinh</option>
                  <option value="Tuyên Quang">Tuyên Quang</option>
                  <option value="Vĩnh Long">Vĩnh Long</option>
                  <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                  <option value="Yên Bái">Yên Bái</option>
                  <option value="Phú Yên">Phú Yên</option>
                </select>
              </div>
            </div>
            <div class="form-group required">
              <label for="input-postcode" class="col-sm-2 control-label">Địa Chỉ Cụ Thể *</label>
              <div class="col-sm-10">
                <input value="@if(Auth::check()){{Auth::user()->address}}@endif" type="text" required class="form-control" id="input-postcode" 
                placeholder="Nhập Chính Xác Địa Chỉ ...." value="" name="address">
              </div>
            </div>
            <div class="form-group required">
              <label for="input-postcode" class="col-sm-2 control-label">Ghi Chú</label>
              <div class="col-sm-10">
                <textarea required name="note" placeholder="Nhập Ghi Chú ..." id="" class="form-control" rows="5"></textarea>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 pull-right">
        <table class="table table-bordered">
            <tbody>
              <tr>
                <td class="text-right"><strong>Tổng Sản Phẩm:</strong></td>
              <td class="text-right">{{$count_product_cart}}</td>
              </tr>
              {{-- <tr>
                <td class="text-right"><strong>Phí Vận Chuyển:</strong></td>
                <td class="text-right" id="shipping">Free</td>
              </tr>
              <tr>
                <td class="text-right"><strong>VAT (10%):</strong></td>
                <td class="text-right">100.000</td>
              </tr> --}}
              <tr>
                <td class="text-right"><strong>Tổng Thanh Toán:</strong></td>
              <td class="text-right">{{ $total_cart}} đ</td>
              </tr>
            </tbody>
          </table>
    </div>
  </div>
  <input class="btn pull-right mt_30" type="submit" value="Thanh Toán" />
  @else
  <center style="color:red"><b>Giỏ Hàng Trống !!!</b></center>
  
  @endif
    <a class="btn pull-left mt_30" href="{{ url('index') }}">Tiếp Tục Mua Hàng </a>
    @csrf
  </form>
</div>
<!-- End Cart -->
@endsection
      