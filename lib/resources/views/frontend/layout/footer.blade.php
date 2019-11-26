<div class="container">
      
    <div class="row">
        <div class="col-md-12">
            <div id="product-tab" class="">
                <div class="heading-part">
                  <h2 class="main_title">4 Sản Phẩm Mới</h2>
                </div>
                <div class="tab-content clearfix box">
                  <div class="tab-pane active" id="nArrivals">
                    <div class="nArrivals owl-carousel">
                      <!-- San Pham --><?php
                      $product_limit = App\Product::orderBy('product_id','desc')->take(4)->get();
                         ?>
                        @foreach ($product_limit as $item)
                      <div class="product col-md-12">
                        
                          <div class="item mb_20 boder">
                              <a  href="{{ url('detail') }}/{{$item->product_id}}/{{str_slug($item->name)}}.html">
                                <img class="mt_10" width="100%" src="{{ asset('lib/storage/app/avartar')}}/{{$item->image}}" class="img-responsive"></a>
                              <div class="caption product-detail text-center">
                              {{-- <div class="rating">
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> 
                              </div> --}}
                              <marquee>
                                <h6 data-name="product_name" class="product-name"><a href="{{ url('detail') }}/{{$item->product_id}}/{{str_slug($item->name)}}.html" title="">{{$item->name}}</a></h6>
                              </marquee>
                              @if($item->sale != 0)
                              <span class="price"><span class="amount"><span class="currencySymbol"></span><s>{{number_format($item->price)}} đ</s></span> <br>
                              <span class="price" style="color:red"><span class="amount"><span class="currencySymbol"></span>{{number_format($item->sale)}} đ</span>
                              @else
                              <span class="price" style="color:red" ><span class="amount"><span class="currencySymbol"></span>{{number_format($item->price)}} đ</span><br><br>
                              @endif
                              <a href="{{url('cart/add/'.$item->product_id)}}" style="margin-bottom: -2px!important;" class="btn form-control">Thêm Vào Giỏ Hàng</a>
                            </div>
                          </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
</div>
</div>
<div class="footer pt_60 mt_30">
<div class="container">
<div class="row">
  <div class="col-md-3 footer-block">
    <h6 class="footer-title ptb_20 mb_20">Thông Tin</h6>
    <ul>
      <?php 
      $info = App\Info::find(1); 
      $site_name = $info->name;
      $site_phone = $info->phone;
      $site_name_address = $info->name_address;
      ?>
      <li><a href="{{ asset('index') }}">{{$site_name}}</a></li>
      <li><a href="{{ asset('contact') }}">Liên Hệ</a></li>
      <li><a href="{{ asset('contact') }}"><i class="fa fa-facebook"></i></a>
      <a href="{{ asset('contact') }}"><i class="fa fa-google"></i></a>
      <a href="{{ asset('contact') }}"><i class="fa fa-linkedin"></i></a>
      <a href="{{ asset('contact') }}"><i class="fa fa-twitter"></i></a>
      <a href="{{ asset('contact') }}"><i class="fa fa-rss"></i></a></li>
    </ul>
  </div>
  <div class="col-md-3 footer-block">
    <h6 class="footer-title ptb_20 mb_20">Hãng Sản Xuất</h6>
    <ul>
      <?php
      $manufacture = App\Manufacture::all();  
      ?>
      @foreach ($manufacture as $item)
    <li><a href="{{ asset('manufacture/'.$item->manu_id) }}">{{$item->manu_name}}</a></li>
      @endforeach
    </ul>
  </div>
  <div class="col-md-3 footer-block">
    <h6 class="footer-title ptb_20 mb_20">Tác Giả</h6>
    <ul>
      <?php $author = App\Author::all(); ?>
      @foreach ($author as $item)
        <li><a>{{$item->name}}</a></li>
        <li><a>- {{$item->masv}}</a></li>
      @endforeach
    </ul>
  </div>
  <div class="col-md-3 footer-block">
    <h6 class="footer-title ptb_20 mb_20 mb_20">Liên Hệ</h6>
    <ul>
      <li>
      <a target="_blank" href="https://www.google.com/maps/place/53+V%C3%B5+V%C4%83n+Ng%C3%A2n,+Linh+Chi%E1%BB%83u,+Th%E1%BB%A7+%C4%90%E1%BB%A9c,+H%E1%BB%93+Ch%C3%AD+Minh,+Vi%E1%BB%87t+Nam/@10.8522102,106.7563593,17z/data=!3m1!4b1!4m5!3m4!1s0x317527779c9143b7:0x31b5e72b963c25ed!8m2!3d10.8522102!4d106.758548?hl=vi-VN">Địa Chỉ :</a> <span>{{$site_name_address}}</span>
      </li> 
      <li>
      <a href="tel:0359003130">{{$site_phone}}</a>
      </li>
    </ul>
  </div>
</div>
</div>
<div class="footer-bottom mt_60 ">
<div class="container">
  <div class="row">
  <div class="text-center">&copy; Sản Phẩm Thuộc Về <a href="{{ url('index') }}" title="">{{$site_name}}</a></div>
  </div>
</div>
</div>
</div>
<!-- =====  FOOTER END  ===== -->
</div>
<a id="scrollup"></a>
<script src="{{ asset('public/frontend/js/jQuery_v3.1.1.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('public/frontend/js/jquery.firstVisitPopup.js') }}"></script>
<script src="{{ asset('public/frontend/js/custom.js') }}"></script>
<script src="{{ asset('public/frontend/js/script.js') }}"></script>
</body>
</html>