<?php 
$open = 'manu';
?>
@extends('backend.master')
@section('title','Danh Mục')
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-5 col-lg-5">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Thêm Hãng Sản Xuất
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label>Tên hãng sản xuất:</label>
						<form action="{{url('mobile-admin/manufacture/add')}}" method="post">
							<input type="text" name="manu_name" class="form-control" placeholder="Hãng Sản Xuất..."> <br>
							<input type="submit" class="btn btn-success form-control" value="Thêm Danh Mục">
							{{ csrf_field() }}
						</form>
					</div>
				</div>
			</div>
	</div>
	<div class="col-xs-12 col-md-7 col-lg-7">
		<div class="panel panel-primary">
		<div class="panel-heading">Danh sách Hãng Sản Xuất - {{$count_manu}}</div>
			<div class="panel-body">
				<div class="bootstrap-table">
					<table class="table table-bordered">
						<thead>
							<tr class="bg-primary">
								<th>Tên Hãng Sản Xuất</th>
								<th style="width:30%">Tùy chọn</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($manu as $item)
						<tr>
							<td>{{$item->manu_name}}</td>
							<td>
							<a href="{{url('mobile-admin/manufacture/edit/'.$item->manu_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
								<a href="{{url('mobile-admin/manufacture/delete/'.$item->manu_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
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
	