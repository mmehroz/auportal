@extends('layout.apptheme')
@section('hr-HRM')

<style type="text/css">
  input, button, a {
      color: #4a4a4a;
  }
  a:hover, a:active, a:focus {
      color: #678c40;
  }
</style>
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Employee Target List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Target</li>
					</ul>
				</div>
				@if(session()->get("role") <= 3)
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" onclick="addtarget()" data-toggle="modal" data-target="#add_target"><i class="fa fa-plus"></i> Add Target</a>
				</div>
				@endif
			</div>
		</div>
    @if(session('message'))
      <div><p class="alert alert-success" >{{session('message')}}</p> </div>
    @endif
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 datatable dataTable no-footer" id="sreq">
						<thead style="color: white; background-color: ##5069e7">	
							<tr>
                				@if(session()->get("role") <= 3)
                				<th class="text-right;" style="width: 10%!important;padding-left: 4%!important;">Action</th>
                				<th class="text-right;" style="width: 10%!important;padding-left: 4%!important;">Achieved</th>
                				@endif
								<th>Batch Id</th>
								<th>Name</th>
								<th>Month</th>
								<th>Target Type</th>
								<th>Target</th>
								<th>Achieved</th>
								<th>Remaining</th>
								<th>Per Day</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $val)
							<tr>
	        				@if(session()->get("role") <= 3)
			                <td class="text-right">
			                  <div class="dropdown dropdown-action">
			                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
			                    <div class="dropdown-menu dropdown-menu-right">
			                      <a class="dropdown-item" href="#" onclick="edittarget({{$val->employeetarget_id}})"><i class="fa fa-pencil m-r-5"></i> Edit</a>
			                      <a class="dropdown-item" href="{{url('/deletetarget')}}/{{$val->employeetarget_id}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
			                    </div>
			                  </div>
			                </td>
			                <td class="text-right">
			                  <div class="dropdown dropdown-action">
			                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
			                    <div class="dropdown-menu dropdown-menu-right">
			                      <a class="dropdown-item" href="#" id="{{$val->elsemployees_batchid}}~{{$val->employeetarget_month}}" onclick="addachieved(this.id)"><i class="fa fa-add m-r-5"></i> Add</a>
			                      <a class="dropdown-item" href="#" id="{{$val->elsemployees_batchid}}~{{$val->employeetarget_month}}" onclick="achievedlist(this.id)"><i class="fa fa-add m-r-5"></i> List</a>
			                    </div>
			                  </div>
			                </td>
        					@endif
        					<?php
        						$empachieved = DB::connection('mysql')->table('employeeachieved')
										->where('employeeachieved.employeeachieved_month','=',$val->employeetarget_month)
										->where('employeeachieved.elsemployees_batchid','=',$val->elsemployees_batchid)
										->where('employeeachieved.status_id','=',2)
										->select('employeeachieved.employeeachieved_achieved')
										->sum('employeeachieved.employeeachieved_achieved');
								$achieved = $empachieved;
								$remaining = $val->employeetarget_target - $empachieved;
								$timestamp = strtotime(date('Y-m-d'));
								$daysRemaining = (int)date('t', $timestamp) - (int)date('j', $timestamp);
								if ($daysRemaining == 0) {
									$daysRemaining = 1;
								}
								$perday = $remaining / $daysRemaining;
        					?>
								<td>{{$val->elsemployees_batchid}}</td>
								<td>{{$val->elsemployees_name}}</td>
								<td>{{$val->employeetarget_month}}</td>
								<td>{{$val->employeetarget_type}}</td>
								<td>{{$val->employeetarget_target}}</td>
								<td><?php echo(round($achieved))?></td>
								<td><?php echo(round($remaining))?></td>
								<td><?php echo(round($perday))?></td>
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
<script type="text/javascript">
function addtarget(){
	$.get('{{ URL::to("/addtargetmodal")}}',function(data){
	$('#modals').empty().append(data);
	$('#addtarget').modal('show');
	});
}
function edittarget($id){
	$.get('{{ URL::to("/edittargetmodal")}}/'+$id,function(data){
	$('#modals').empty().append(data);
	$('#edittarget').modal('show');
	});
}
function addachieved($id){
	$.get('{{ URL::to("/addachievedmodal")}}/'+$id,function(data){
	$('#modals').empty().append(data);
	$('#addachieved').modal('show');
	});
}
function achievedlist($id){
	window.open('{{ URL::to("/employeeachievedlist")}}/'+$id);
}
</script>						
@endsection