
@extends('frontend.master')
@section('content')
<!-- Cart -->
<div class="col-sm-8 col-lg-9 mtb_5">
    <div class="heading-part">
      <h2 class="main_title">Đặt Hàng Thành Công</h2> 
    </div><br><br>
    <div id="complete">
        <p class="info">Quý khách đã đặt hàng thành công!</p>
        {{-- <p>• Hóa đơn mua hàng của Quý khách đã được chuyển đến Địa chỉ Email có trong phần Thông tin Khách hàng của chúng Tôi</p> --}}
        <p>• Sản phẩm của Quý khách sẽ được chuyển đến Địa có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.</p>
        <p>• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng</p>
        {{-- <p>• Trụ sở chính: B8A Võ Văn Dũng - Hoàng Cầu Đống Đa - Hà Nội</p> --}}
        <p>Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</p>
    </div>
    <a class="btn pull-left mt_30" href="{{ url('index') }}">Tiếp Tục Mua Hàng </a>
    
  </form>
</div>
<!-- End Cart -->
@endsection
      