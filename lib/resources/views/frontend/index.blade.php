
@include('frontend.layout.header')
    <!-- =====  HEADER END  ===== -->
    <!-- =====  BANNER STRAT  ===== -->
 <!--    <div class="container banner mt_20">
      <div class="main-banner owl-carousel">
        <div class="item"><a href="#"><img src="images/sub1.jpg" alt="Main Banner" class="img-responsive" /></a></div>
        <div class="item"><a href="#"><img src="images/sub2.jpg" alt="Main Banner" class="img-responsive" /></a></div>
      </div>
    </div> -->
    <!-- =====  BANNER END  ===== -->
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
      <!-- =====  SUB BANNER  STRAT ===== -->
      <div class="row">
        @include('frontend.layout.banner')
      </div>
      <!-- =====  SUB BANNER END  ===== -->
      <div class="row">
        <div class="col-sm-12 ">
          <!-- =====  PRODUCT TAB  ===== -->
          <div id="product-tab" class="">
            <div class="heading-part mb_10 ">
              <h2 class="main_title">Tất Cả Sản Phẩm</h2>
            </div>
            <div class="tab-content clearfix box">
              <div class="tab-pane active" id="nArrivals">
                <div class="nArrivals owl-carousel">
                  <!-- San Pham -->
                  @foreach ($data as $item)
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
          <!-- =====  PRODUCT TAB  END ===== -->
          
        </div>
      </div>
      
    </div>
    <!-- =====  CONTAINER END  ===== -->
    <!-- =====  FOOTER START  ===== -->
@include('frontend.layout.footer')
