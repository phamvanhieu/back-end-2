@extends('frontend.master')
@section('content')
<!-- Product-Detail -->
<div class="col-sm-8 col-lg-9 mtb_20">
  <div class="row mt_10 ">
    <div class="col-md-6">
      <div><a class="thumbnails"> <img data-name="product_image" src="{{ asset('lib/storage/app/avartar')}}/{{$data->image}}" alt="" /></a></div>
      {{-- <div id="product-thumbnail" class="owl-carousel">
        <div class="item">
          <div class="image-additional"><a class="thumbnail" href="{{ asset('public/frontend/images/products/')}}/{{$item->image}}" data-fancybox="group1"> <img src="{{ asset('public/frontend/images/product/product3.jpg') }}" alt="" /></a></div>
        </div>
        <div class="item">
          <div class="image-additional"><a class="thumbnail" href="{{ asset('public/frontend/images/products/')}}/{{$item->image}}" data-fancybox="group1"> <img src="{{ asset('public/frontend/images/product/product3.jpg') }}" alt="" /></a></div>
        </div>
      </div> --}}
    </div>
    <div class="col-md-6 prodetail caption product-thumb">
    <h4 data-name="product_name" class="product-detail-name"><a href="" title="Tên Sản Phẩm">{{ $data->name}}</a></h4>
      {{-- <div class="rating">
        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
      </div>
       --}}
       @if($data->sale != 0)
      <span class="price mb_20" style="margin-top:20px"><span class="amount"><span class="currencySymbol"><s>{{ number_format($data->price)}}</s></span> đ</span>
      </span>  <br>
      <span class="price mb_20" style="color:red"><span class="amount"><span class="currencySymbol">{{number_format($data->sale)}}</span> đ</span>
      </span>
      @else
      <span class="price mb_20" style="color:red;margin-top:20px"><span class="amount"><span class="currencySymbol">{{ number_format($data->price)}}</span> đ</span>
      </span>  <br>
      @endif
      <hr>
      <ul class="list-unstyled product_info mtb_20">
        <li>
          <label>Danh Mục: </label>
          <span><a href="{{ url('category') }}/{{$data->type_id}}">{{$type_name}}</a></span>
        </li>
        <li>
          <label>Hãng Sản Xuất: </label>
        <span><a href="{{ url('category') }}/{{$data->type_id}}/{{$data->manu_id}}">{{$manu_name}}</a></span>
        </li>
        {{-- <li>
          <label>Tình Trạng:</label>
          <span> Mới</span>
        </li>
        <li>
          <label>Số Lượng:</label>
          <span> Còn Hàng</span>
        </li> --}}
      </ul>
      <hr>
      {{-- <p class="product-desc mtb_30"> Mô Tả Ngắn ...</p> --}}
      <form action="{{url('cart/add/'.$data->product_id)}}" method="GET">
      <div id="product">
        <div class="form-group">
          <div class="row">
            <br>
              <div class="Sort-by col-md-12"> 
                <label>Số Lượng</label> <br>
                <input name="qty" min="1" class="form-control" value="1" type="number">
                @csrf
              </div>
            <!-- <div class="Color col-md-12">
              <label>Màu</label>
              <select name="product_color" id="select-by-color" class="selectpicker form-control">
                <option>Đen(Lịch Lãm)</option>
                <option>Nâu(Sang Trọng)</option>
              </select>
            </div> -->
          </div>
        </div>
      <button class="btn btn-md btn-link form-control">Thêm Vào Giỏ Hàng</button>
      </form>
        <!-- <div class="col-md-6 mt_30">
          <div class="btn btn-warning">
            <a href="#"><span>Mua Ngay</span></a>
          </div>
        </div> -->
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div id="exTab5" class="mtb_30">
        <ul class="nav nav-tabs">
          <li class="active"> <a href="#1c" data-toggle="tab">Mô Tả Chi Tiết</a></li>
          @if(Auth::check())
          <li><a href="#2c" data-toggle="tab">Bình Luận</a> </li>
          @endif
          <li><a href="#3c" data-toggle="tab">Sản Phẩm Liên Quan</a> </li>
        </ul>
        <div class="tab-content ">
          <div class="tab-pane active" id="1c">
            <p><?php echo $data->description ?></p>
          </div>
          <div class="tab-pane" id="2c">
            <form class="form-horizontal" action="{{url('comment/'.$id)}}" method="post">
              <div class="form-group required">
                <div class="col-sm-12">
                  <label class="control-label" for="input-review">Bình Luận</label>
                  <textarea required name="comment" rows="5" id="input-review" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group required">
                <div class="col-md-6">
                  {{-- <label class="control-label">Đánh Giá: </label> <br> <br>
                  <div class="rates">
                    <span> Chưa Tốt</span>
                    <div class="stars">
                      <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                      <label class="star star-5" for="star-5"></label>
                      <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                      <label class="star star-4" for="star-4"></label>
                      <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                      <label class="star star-3" for="star-3"></label>
                      <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                      <label class="star star-2" for="star-2"></label>
                      <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                      <label class="star star-1" for="star-1"></label>
                    </div>
                    <span>Tốt</span></div> <br> --}}
                  <div class="buttons">
                      <input type="submit" class="btn btn-md btn-link" value="Đánh Giá">
                  </div>
                </div>
              </div>
              @csrf
            </form>
            <div id="comments" class="comments-area mt_20">
              <h3 class="comment-title">{{$count_cmt}} Bình Luận</h3>
              <ul class="comment-list mt_20">
                @foreach ($cmt as $item)
                <li class="comment">
                  <hr>
                  <article class="comment-body mtb_20"> 
                    {{-- <div class="comment-avatar"> <img alt="" height="100px" width="100px" src="{{ asset('public/frontend/images/user2.jpg') }}"> </div> --}}
                    <div class="comment-main">
                    <h5 class="author-name"> <span class="comment-name">{{$item->name}}</span ><small class="comment-date" style="color: blue"> {{$item->created_at}}</small> </h5>
                        <div class="comment-content mt_10">{{$item->comment}}.</div>
                    </div>
                  </article>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="tab-pane" id="3c">
            <div class="row">
                <div class="col-md-12">
                  <div class="heading-part mb_10 ">
                    <h2 class="main_title">Sản Phẩm Liên Quan</h2>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="row">
                    <?php 
                    $type_id = $data->type_id;
                    $products = App\Product::where('type_id', '=',$type_id)->take(4)->get();
                    ?>
                    @foreach ($products as $item)
                    <div class="product-layout  product-grid  col-md-3 col-sm-6 col-xs-6 ">
                        <div class="items mb_20 boder">
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
<!-- End Product-Detail -->
@endsection