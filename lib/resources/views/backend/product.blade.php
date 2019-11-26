<?php 
$open = 'product';
?>
@extends('backend.master')
@section('title','Sản Phẩm')
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-12 col-lg-12">
		<div class="panel panel-primary">
		<div class="panel-heading">Danh sách sản phẩm - {{$count_product}}</div>
			<div class="panel-body">
				<div class="bootstrap-table">
					<div class="table-responsive">
						<a href="{{url('mobile-admin/product/add')}}" class="btn btn-primary">Thêm sản phẩm</a>
						<table class="table table-bordered" style="margin-top:20px;">				
							<thead>
								<tr class="bg-primary">
									<th>Ảnh sản phẩm</th>
									<th width="30%">Tên Sản phẩm</th>
									<th>Giá sản phẩm</th>
									<th>Giá KM</th>
									
									<th>Loại</th>
									<th>Tùy chọn</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $item)
								<tr>
									<td>
									<img width="100px" height="100" src="{{asset('lib/storage/app/avartar/'.$item->image)}}" class="thumbnail">
									</td>
									<td>{{$item->name}}</td>
									<td>{{number_format($item->price)}} đ</td>
									<td>{{number_format($item->sale)}} đ</td>
									
									<?php 
										$type_id = $item->type_id;
										$manu_id = $item->manu_id;
										$type_name = App\Protype::find($type_id)->type_name;
										$manu_name = App\Manufacture::find($manu_id)->manu_name;
									?>
									<td>{{$type_name. ' - ' .$manu_name }}</td>
									<td>
									<a href="{{url('mobile-admin/product/edit/'.$item->product_id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
									<a href="{{url('mobile-admin/product/delete/'.$item->product_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
									</td>
								</tr>
								@endforeach
								
							</tbody>
						</table>
						<center>{{ $data->links()}}	</center>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div><!--/.row-->
@endsection
	