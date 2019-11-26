<?php 
$open = 'product';
?>
@include('error.note')
@extends('backend.master')
@section('title','Thêm Sản Phẩm')
@section('content')		
<div class="row">
	<div class="col-xs-12 col-md-12 col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">Thêm sản phẩm</div>
			<div class="panel-body">
				@include('error.note')
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Tên Sản Phẩm</label>
								<input type="text" name="name" class="form-control" placeholder="Tên Sản Phẩm" value="" required>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Sản Phẩm Hot </label>
								<select name="hot" id="" class="form-control">
									<option value="0">Không</option>
									<option value="1">Hot</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Hình Ảnh</label>
								<input type="file" name="img" class="form-control"required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Giá </label>
								<input type="text" name="price" class="form-control" value="" required>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Giá Khuyến Mãi </label>
								<input type="text" name="sale" class="form-control" value="">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Hãng SX </label>
								<select name="manu_id" id="" class="form-control" required>
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
									@foreach ($protype as $item)
									<option value="{{$item->type_id}}">{{$item->type_name}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Mô Tả:   </label>
						<textarea name="description" id="" class="form-control" rows="10"></textarea>
						<script>
							CKEDITOR.replace('description');
						</script>
					</div>
					<input type="submit"value="Thêm Sản Phẩm" class="form-control btn btn-primary">
					@csrf
				</form>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div><!--/.row-->
@endsection
		
