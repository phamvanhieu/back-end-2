<?php 
$open = 'product';
?>
@include('error.note')
@extends('backend.master')
@section('title','Sửa Sản Phẩm')
@section('content')		
<div class="row">
	<div class="col-xs-12 col-md-12 col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">Sửa sản phẩm</div>
			<div class="panel-body">
				@include('error.note')
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Tên Sản Phẩm</label>
								<input type="text" value="{{$pro->name}}" name="name" class="form-control" placeholder="Tên Sản Phẩm"  required>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Sản Phẩm Hot </label>
								<select name="hot" id="" class="form-control">
								<option value="{{$pro->hot}}">{{$hot_name}}</option>
									<option value="0">Không</option>
									<option value="1">Hot</option>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>Hình Ảnh</label>
								<input type="file" name="img" class="form-control">
							</div>
						</div>
						<div class="col-md-1">
							<img width="100%" src="{{asset('lib/storage/app/avartar/'.$pro->image)}}" alt="">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Giá </label>
								<input value="{{$pro->price}}" type="text" name="price" class="form-control" required>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Giá Khuyến Mãi </label>
								<input value="{{$pro->sale}}" type="text" name="sale" class="form-control">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Hãng SX </label>
								<select name="manu_id" id="" class="form-control" required>
									<option value="{{$manu_id}}">{{$manu_name}}</option>
									@foreach ($manu as $item)
									<option value="{{$item->manu_id}}">{{$item->manu_name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Danh Mục </label>
								<select name="type_id" id="" class="form-control" required>
									<option value="{{$type_id}}">{{$type_name}}</option>
									@foreach ($protype as $item)
									<option value="{{$item->type_id}}">{{$item->type_name}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Mô Tả:   </label>
						<textarea name="description" id="description" class="form-control" rows="10">{{$pro->description}}</textarea>
						<script>
							CKEDITOR.replace('description');
						</script>
					</div>
					<input type="submit"value="Sửa Sản Phẩm" class="form-control btn btn-primary">
					@csrf
				</form>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div><!--/.row-->
@endsection
		
