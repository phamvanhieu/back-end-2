@extends('frontend.master')
@section('content')
<!-- Category -->
<div class="col-sm-8 col-lg-9 mtb_5">
  <div class="row">
    <div class="col-md-12">
      <div class="heading-part mb_10 ">
      <h2 class="main_title">Tìm Kiếm {{$result}}</h2>
      </div>
    </div>
  </div>
  <div class="row">
    @if(count($product_search))
    @foreach ($product_search as $item)
    <div class="product-layout  product-grid  col-md-3 col-sm-6 col-xs-6 ">
        <div class="items mb_20 boder">
            <a  href="{{ url('detail') }}/{{$item->product_id}}/{{str_slug($item->name)}}.html"><img class="mt_10" width="100%" src="{{ asset('lib/storage/app/avartar')}}/{{$item->image}}" class="img-responsive"></a>
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
    
    @else
    <center style="color:red">
      {{ "Không Tìm Thấy sản Phẩm nào!!!"}}
    </center>
      
    @endif
  </div>
  <center>
  {{$product_search->appends(['search'=>$result])->links('vendor.pagination.default',['foo'=>'bar'])}}
  </center>
</div>
<!-- End Category -->
@endsection