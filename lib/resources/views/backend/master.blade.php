@include('error.note')
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin | @yield('title')</title>
<link href="{{ asset('public/backend/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/backend/css/datepicker3.css') }}" rel="stylesheet">
<link href="{{ asset('public/backend/css/styles.css') }}" rel="stylesheet">
<link rel="shortcut icon" href="{{ asset('lib/storage/app/avartar/logo/favicon.png') }}">
<link rel="apple-touch-icon" href="{{ asset('lib/storage/app/avartar/logo/apple-touch-icon.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('lib/storage/app/avartar/logo/apple-touch-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('lib/storage/app/avartar/logo/apple-touch-icon-114x114.png') }}">
<script type="text/javascript" src="{{ asset('public/backend/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('public/backend/js/lumino.glyphs.js') }}"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{url('mobile-admin/dashboard')}}"> Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use>
						</svg>{{ Auth::user()->username}}<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
						<li><a href="{{url('mobile-admin/logout')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li role="presentation" class="divider"></li>
			<li class="<?php if($open == 'index') echo 'active' ?>">
				<a href="{{url('mobile-admin/dashboard')}}">
					<svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> 
					Trang chủ
				</a>
			</li>
			<li class="<?php if($open == 'product') echo 'active' ?>">
				<a href="{{url('mobile-admin/product/show')}}">
					<svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> 
					Sản phẩm
				</a>
			</li>
			<li class="<?php if($open == 'type') echo 'active' ?>">
				<a href="{{url('mobile-admin/protype/show')}}">
					<svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> 
					Danh mục
				</a>
			</li>
			<li class="<?php if($open == 'manu') echo 'active' ?>">
				<a href="{{url('mobile-admin/manufacture/show')}}">
					<svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> 
					Hãng Sản Xuất
				</a>
			</li>
			<li class="<?php if($open == 'cus') echo 'active' ?>">
				<a href="{{url('mobile-admin/customer/show')}}">
					<svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> 
					Khách Hàng
				</a>
			</li>
			<li class="<?php if($open == 'cmt') echo 'active' ?>">
				<a href="{{url('mobile-admin/comment/show')}}">
					<svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> 
					Bình Luận
				</a>
			</li>
			<li role="presentation" class="divider"></li>
		</ul>
		
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">@yield('title')</h1>
			</div>
		</div><!--/.row-->
        @yield('content')
	</div>
		  

	<script src="{{ asset('public/backend/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('public/backend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('public/backend/js/chart.min.js') }}"></script>
	<script src="{{ asset('public/backend/js/easypiechart.js') }}"></script>
	<script src="{{ asset('public/backend/js/easypiechart-data.js') }}"></script>
	<script src="{{ asset('public/backend/js/bootstrap-datepicker.js') }}"></script>
</body>

</html>
