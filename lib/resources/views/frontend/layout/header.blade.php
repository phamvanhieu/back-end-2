
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- =====  BASIC PAGE NEEDS  ===== -->
  <meta charset="utf-8">
  <title>Web Bán Hàng - Nhóm 4</title>
  <!-- =====  SEO MATE  ===== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="distribution" content="global">
  <meta name="revisit-after" content="2 Days">
  <meta name="robots" content="ALL">
  <meta name="rating" content="8 YEARS">
  <meta name="Language" content="en-us">
  <meta name="GOOGLEBOT" content="NOARCHIVE">
  <!-- =====  MOBILE SPECIFICATION  ===== -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="viewport" content="width=device-width">
  <!-- =====  CSS  ===== -->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/font-awesome.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/bootstrap.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/magnific-popup.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/owl.carousel.css') }}">
  <link rel="shortcut icon" href="{{ asset('lib/storage/app/avartar/logo/favicon.png') }}">
  <link rel="apple-touch-icon" href="{{ asset('lib/storage/app/avartar/logo/apple-touch-icon.png') }}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('lib/storage/app/avartar/logo/apple-touch-icon-72x72.png') }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('lib/storage/app/avartar/logo/apple-touch-icon-114x114.png') }}">
</head>

<body>
  <div class="wrapper">
    <!-- =====  HEADER START  ===== -->
    <header id="header">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12">
              <div class="header-top-left">
                  <?php 
                  $info = App\Info::find(1);
                  $site_phone = $info->phone;
                  $site_name_address = $info->name_address;
                  $site_name_address = $info->name_address;
                  $site_link_address = $info->link;
                  ?>
                <div class="contact"><a href="tel:{{ $site_phone }}">Gọi Ngay !</a> <span>{{$site_phone}}</span> || 
                  <a target="_blank" href="{{$site_link_address}}">
                  Địa Chỉ :</a> <span>{{$site_name_address}}.</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <div class="main-search mt_40">
                <form action="{{ url('search/')}}" method="get">
                  <input required id="search-input" name="search" placeholder="Tìm Kiếm" class="form-control input-lg" autocomplete="off" type="text">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
                </form>
              
              </span> </div>
            </div>
            <div class="navbar-header col-xs-6 col-sm-4"> <a class="navbar-brand" href="{{ url('index')}}"> <img width="229px" height="40px" alt="Logo" 
            src="{{ asset('lib/storage/app/avartar/logo/logo.png') }}"> </a> </div>
            <div class="col-xs-6 col-sm-4 shopcart">
              <a href="{{ url('cart/show')}}">
              <div id="cart" class="btn-group btn-block mtb_40">
                <button type="button" class="btn" data-target="#cart-dropdown" data-toggle="collapse" aria-expanded="true">
                  <span id="shippingcart">Giỏ Hàng</span><span id="cart-total">({{Cart::count()}}) Sản Phẩm </span> </button>
              </div></a>
            </div>
          </div>
        </div>
        <nav class="navbar">
          <div class="container">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"> <span class="i-bar"><i class="fa fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse js-navbar-collapse" style="left: 20px;height: 1px;">
              <ul id="menu" class="nav navbar-nav">
                <li> <a href="{{ url('index')}}">Trang Chủ</a></li>
                <?php 
                $category = App\Protype::all();
                ?>
                @foreach ($category as $item)
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $item->type_name}} </a>
                  <ul class="dropdown-menu">
                    <?php 
                    $manufacture = App\Manufacture::all();  
                    ?>
                    @foreach ($manufacture as $item_manu)
                  <li> <a href="{{ url('category')}}/{{$item->type_id}}/{{$item_manu->manu_id}}">{{ $item_manu->manu_name}}</a></li>
                    @endforeach
                  </ul>
                </li>
                @endforeach
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Trang </a>
                  <ul class="dropdown-menu">
                    <li> <a href="{{ url('contact')}}">Liên Hệ</a></li>
                  </ul>
                </li>
                @if (Auth::check())
                <li style="float:right" class="dropdown"> <a href="mobi-admin" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->username}}</a>
                  <ul class="dropdown-menu">
                    <li> <a href="{{ url('logout')}}">Đăng Xuất</a></li>
                  </ul>
                </li>
                @else
                <li style="float:right" class="dropdown"> <a href="" class="dropdown-toggle" data-toggle="dropdown">Tài Khoản </a>
                  <ul class="dropdown-menu">
                    <li> <a href="{{ url('login')}}">Đăng Nhập</a></li>
                    <li> <a href="{{ url('register')}}">Đăng Ký</a></li>
                  </ul>
                </li>    
                @endif
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>