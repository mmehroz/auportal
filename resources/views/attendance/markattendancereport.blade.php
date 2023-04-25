@extends('layout.apptheme')
@section('hr-HRM')
			
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-10">
					<h3 class="page-title">Mark Attendance Report</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Report</li>
					</ul>
				</div>
				<div class="col-sm-2">
					<a href="#" class="btn add-btn" data-toggle="modal" onclick="markattendance()" data-target="#mark_attendance">Mark Attendance</a>
				</div>
			</div>
		</div>
		@if(session('message'))
      		<div><p class="alert alert-success" >{{session('message')}}</p> </div>
    	@endif
		<div class="panel-body">
	        <div class="row">
	            <div class="col-lg-12">
	            	<div class="table-responsive">
						<table class="table table-striped custom-table mb-0 datatable dataTable no-footer" id="sreq">
							<thead style="color: white; background-color: ##40c4f1">	
								<tr>
									<th>Name</th>
	                				<th>Date</th>
									<th>Type</th>
									<th>Add By</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $val)
								<tr>
		        					<td>{{$val->for}}</td>
									<td>{{$val->markattendance_date}}</td>
									@if($val->markattendance_type == 0)
									<td>In</td>
									@else
									<td>Out</td>
									@endif
									<td>{{$val->addby}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
	            </div>
	        </div>
        </div>
    </div>				
</div>
<div id ='modals'></div>
<script type="text/javascript">
function markattendance(){
	$.get('{{ URL::to("/markattendance")}}',function(data){
	$('#modals').empty().append(data);
	$('#mark_attendance').modal('show');
	});
}
</script>
@endsection