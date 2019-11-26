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
					Sửa danh mục
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label>Tên danh mục:</label>
						<form action="{{url('mobile-admin/protype/edit/'.$type->type_id)}}" method="post">
							<input type="text" name="type_name" value="{{$type->type_name}}" class="form-control" placeholder="Tên danh mục...">
							<br><input class="btn btn-success form-control" type="submit" value="Sửa Danh Mục">
							@csrf
						</form>
					</div>
				</div>
			</div>
	</div>
</div><!--/.row-->
@endsection
	