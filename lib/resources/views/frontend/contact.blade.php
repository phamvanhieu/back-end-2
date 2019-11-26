@extends('frontend.master')
@section('content')
<!-- Contact -->
<div class="col-sm-8 col-lg-9 mtb_20">
  <!-- contact  -->
  <div class="row">
    <div class="col-md-4 col-xs-12 contact">
      @foreach ($data as $item)
      <div class="location mb_50">
      <h5 class="capitalize mb_20"><strong>{{$item->name}}</strong></h5>
        <div class="address">Mã Số SV: <br>- {{$item->masv}}</div>
        <div class="address">Số Điện Thoại: <br>- {{$item->phone}}</div>
        
      </div>
      @endforeach
    </div>
    
    <div class="col-md-8 col-xs-12 contact-form mb_50">
      <!-- Contact FORM -->
      <div id="contact_form">
        @if(Auth::check())
        <form id="contact_body" method="post" action="{{url('contact')}}">
          <input required value="{{Auth::user()->fullname}}" class="full-with-form " type="text" name="name" placeholder="Tên" data-required="true" />
          <input required value="{{Auth::user()->email}}" class="full-with-form  mt_30" type="email" name="email" placeholder="Email" data-required="true" />
          <input required value="{{Auth::user()->phone}}" class="full-with-form  mt_30" type="text" name="phone" placeholder="Số Điện Thoại" maxlength="15" data-required="true" />
          <input required class="full-with-form  mt_30" type="text" name="subject" placeholder="Vấn Đề" data-required="true">
          <textarea required class="full-with-form  mt_30" name="message" placeholder="Nội Dung Tin Nhắn" data-required="true"></textarea>
          <input class="btn mt_30" type="submit" value="Gửi Tin Nhắn">
          @csrf
        </form>
        @else
        <b style="color: red">Đăng Nhập Để Gửi Thông Tin Cần Liên Hệ!!!</b>
        @endif
      </div>
      <!-- END Contact FORM -->
    </div>
   
  </div>
  <!-- map  -->
  <div class="row">
    <div class="col-xs-12 map mb_80">
      <div id="map">
        <?php 
        $site_map_address = App\Info::find(1)->address;  
          
        ?>
          <iframe src="{{$site_map_address}}" 
          width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </div>
    </div>
  </div>
</div>
<!-- End Contact -->
@endsection