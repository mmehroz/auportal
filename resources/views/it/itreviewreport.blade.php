@extends('layout.apptheme')
@section('hr-HRM')
<style>
	.view-icons .btn.active {
	    color: #333;
	}
</style>
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">IT Review</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Review Report</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table datatable" id="el">
						<thead>
							<tr class="bg-teal-400" style="white-space : nowrap;">
							   	<th>Review</th>
							   	<th>Remarks</th>
                				<th>Review By</th>
                				<th>Review At</th>
                			</tr>
						</thead>
						<tbody>
							@foreach ($data as $val)
							<tr>
								<td>
								@for($i=1;$i<=$val->itreview_star;$i++)  
								<i class="fa fa-star"></i>
								@endfor
								</td>
								<td>{{$val->itreview_remarks}}</td>
								<td>{{$val->elsemployees_name}}</td>
								<td>{{$val->created_at}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
</div>
@endsection