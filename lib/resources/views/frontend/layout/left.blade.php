<div id="category-menu" class="navbar collapse in mb_40" aria-expanded="true" role="button">
    <div class="nav-responsive">
      <div class="heading-part">
        <h2 class="main_title">Danh Mục</h2>
      </div>
      <ul class="nav  main-navigation collapse in">
        <?php 
        $product_type = App\Protype::all();
        ?>
        @foreach ($product_type as $item)
      <li><a href="{{ url('category') }}/{{$item->type_id}}">{{ $item->type_name}}</a></li>
        @endforeach
      </ul>
    </div>
  </div>
  <div class="left-special left-sidebar-widget mb_50">
    <div class="heading-part mb_10 ">
      <h2 class="main_title">Sản Phẩm Hot</h2>
    </div>
    <div id="left-special" class="owl-carousel">
      <ul class="row ">
        <?php 
        $hot_product = App\Product::where('hot', '=',1)->take(3)->orderBy('product_id','desc')->get(); 
        ?>
        @foreach ($hot_product as $item)
            
        <li class="itemss product-layout-left mb_20">
          <div class="product-list col-xs-4">
              <a href="{{ url('detail') }}/{{$item->product_id}}/{{str_slug($item->name)}}.html"><img src="{{ asset('lib/storage/app/avartar')}}/{{$item->image}}" class="img-responsive"></a>
          </div>
          <div class="col-xs-8">
            <div class="caption product-detail">
            <h6 class="product-name"><a href="{{ asset('detail') }}/{{$item->product_id}}/{{str_slug($item->name)}}.html">{{$item->name}}</a></h6>
              {{-- <div class="rating">
                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
              </div> --}}
              @if($item->sale != 0)
              <span class="price"><span class="amount"><span class="currencySymbol"></span><s>{{number_format($item->price)}} đ</s></span> <br>
              <span class="price" style="color:red"><span class="amount"><span class="currencySymbol"></span>{{number_format($item->sale)}} đ</span>
              @else
              <span class="price" style="color:red" ><span class="amount"><span class="currencySymbol"></span>{{number_format($item->price)}} đ</span><br><br>
              @endif
            </div>
          </div>
        </li>
        
        @endforeach
      </ul>
    </div>
  </div>