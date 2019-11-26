<?php 
$open = 'cmt';
?>
@extends('backend.master')
@section('title','Bình Luận')
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-12 col-lg-12">
		<div class="panel panel-primary">
		@if($count_comment != 0)
		<div class="panel-heading">Danh sách Bình Luận - {{$count_comment}}</div>
			<div class="panel-body">
				<div class="bootstrap-table">
					<div class="table-responsive">
						<table class="table table-bordered" style="margin-top:20px;">				
							<thead>
								<tr class="bg-primary">
									<th>Họ Tên</th>
									<th>Nội Dung</th>
									<th>Ngày Bình Luận</th>
									<th width="18%">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $item)
								<tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->comment}}</td>
                                    <td>{{$item->created_at}}</td>
									<td>
										<a href="{{url('mobile-admin/comment/delete/'.$item->comment_id)}}" 
										onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger">
										<i class="fa fa-trash" aria-hidden="true"></i> Xóa Bình Luận</a>
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
		<center><b style="color:red">Không Có Bình Luận Nào!!!</b></center>
		@endif
	</div>
</div><!--/.row-->
@endsection
	