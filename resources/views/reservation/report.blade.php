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
					<h3 class="page-title">Meeting Room</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Reservation Report</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
		          <a href="#" class="btn add-btn" onclick="reservemeetingroom()"> Reserve Meeting Room</a>
		        </div>
			</div>
		</div>
		@if(session('message'))
			<div><p class="alert alert-success mt-3" >{{session('message')}}</p> </div>
		@endif
		@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <div>   <p><li>{{ $error }}</li></p> </div>
                    @endforeach
                </ul>
            </div>
        @endif
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table datatable" id="el">
						<thead>
							<tr class="bg-teal-400" style="white-space : nowrap;">
							   	<th>Reserve For</th>
							   	<th>Date</th>
                				<th>Start Time</th>
                				<th>End Time</th>
                				<th>Room Name</th>
                				<th>Reserve By</th>
                				<th>Status</th>
                			</tr>
						</thead>
						<tbody>
							@foreach ($data as $val)
							<tr>
								<td>{{$val->reserveroom_for}}</td>
								<td>{{$val->reserveroom_date}}</td>
								<td>{{$val->reserveroom_starttime}}</td>
								<td>{{$val->reserveroom_endtime}}</td>
								<td>{{$val->meetingroom_name}}</td>
								<td>{{$val->elsemployees_name}}</td>
								<td>{{$val->reservertionstatus_name}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
</div>
<div id ='modals'></div>
<script>
function reservemeetingroom(){
  $.get('{{ URL::to("/reservemeetingroom")}}',function(data){
  $('#modals').empty().append(data);
  $('#reservemeetingroom').modal('show');
  });
}
</script>
@endsection