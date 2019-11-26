<?php 
$open = 'type';
?>
@extends('backend.master')
@section('title','Danh Mục')
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-5 col-lg-5">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Thêm danh mục
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label>Tên danh mục:</label>
						<form action="{{url('mobile-admin/protype/add')}}" method="post">
							<input type="text" name="type_name" class="form-control" placeholder="Tên danh mục..."> <br>
							<input type="submit" class="btn btn-success form-control" value="Thêm Danh Mục">
							{{ csrf_field() }}
						</form>
					</div>
				</div>
			</div>
	</div>
	<div class="col-xs-12 col-md-7 col-lg-7">
		<div class="panel panel-primary">
		<div class="panel-heading">Danh sách danh mục - {{$count_protype}}</div>
			<div class="panel-body">
				<div class="bootstrap-table">
					<table class="table table-bordered">
						<thead>
							<tr class="bg-primary">
								<th>Tên danh mục</th>
								<th style="width:30%">Tùy chọn</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($protype as $item)
						<tr>
							<td>{{$item->type_name}}</td>
							<td>
							<a href="{{url('mobile-admin/protype/edit/'.$item->type_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
								<a href="{{url('mobile-admin/protype/delete/'.$item->type_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
							</td>
						</tr>
						@endforeach
						</tbody>
					</table>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div><!--/.row-->
@endsection
	