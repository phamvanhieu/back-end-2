<?php 
$open = 'cus';
?>
@extends('backend.master')
@section('title','Khách Hàng')
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-12 col-lg-12">
		<div class="panel panel-primary">
		@if($count_customer != 0)
		<div class="panel-heading">Danh sách Khách Hàng - {{$count_customer}}</div>
			<div class="panel-body">
				<div class="bootstrap-table">
					<div class="table-responsive">
						<table class="table table-bordered" style="margin-top:20px;">				
							<thead>
								<tr class="bg-primary">
									<th >Fullname</th>
									<th>Phone</th>
									<th>Email</th>
									<th>Address</th>
									<th>Country</th>
									<th width="18%">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $item)
								<tr>
                                    <td>{{$item->fullname}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>{{$item->country}}</td>
									
									<td>
                                        <a href="{{url('mobile-admin/customer/viewdetail/'.$item->customer_id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Xem chi tiết</a>
                                        <a href="{{url('mobile-admin/customer/delete/'.$item->customer_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
									</td>
								</tr>
								@endforeach
								
							</tbody>
						</table>
						{{-- <center>{{ $data->links()}}	</center> --}}
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		@else
		<center><b style="color:red">Không Có Khách Hàng Nào!!!</b></center>
		@endif
	</div>
</div><!--/.row-->
@endsection
	