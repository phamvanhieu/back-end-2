<?php 
$open = 'type';
?>
@extends('backend.master')
@section('title','Sửa Danh Mục')
@section('content')
		
<div class="row">
	<div class="col-xs-12 col-md-5 col-lg-5">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Sửa hãng sản xuất
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label>Tên hãng sản xuất:</label>
						<form action="{{url('mobile-admin/manufacture/edit/'.$manu->manu_id)}}" method="post">
							<input type="text" name="manu_name" value="{{$manu->manu_name}}" class="form-control" placeholder="Tên hãng sản xuất...">
							<br><input class="btn btn-success form-control" type="submit" value="Sửa hãng sản xuất">
							@csrf
						</form>
					</div>
				</div>
			</div>
	</div>
</div><!--/.row-->
@endsection
	