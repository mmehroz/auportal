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
					<h3 class="page-title">IT Tickets</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">{{$status}}</li>
					</ul>
				</div>
			</div>
		</div>
		@if(session('message'))
			<div><p class="alert alert-success mt-3" >{{session('message')}}</p> </div>
		@endif
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table datatable" id="el">
						<thead>
							<tr class="bg-teal-400" style="white-space : nowrap;">
								@if($ticketstatus_id <= 2)
								<th>Action</th>
								@endif
							   	<th>Request Note</th>
                				<th>Request Depart</th>
                				<th>Request By</th>
                				<th>Request At</th>
                				@if($ticketstatus_id >= 3)
                				<th>Comment</th>
                				@endif
                				@if($ticketstatus_id >= 4)
                				<th>Inventory</th>
                				@endif
                				<th>Statuse</th>
							</tr>
						</thead>
						<tbody id="dynamicitticketrequest">
							@include('it.dynamicitticketrequest')
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
</div>
<div id ='modals'></div>
<script>
function rejectitticket($id){
	swal("Reject And Comment:", {
		  content: "input",
		  buttons: true,	  
		})
		.then((value) => {
		if(value != null){
		  	$comment = value;
		  	$status = 3;
		  	$.get('{{ URL::to("/updateitticket")}}/'+$id+'/'+$comment+'/'+$status,function(data){
            	swal("Reject", "Successfully!", "success");
            	$('#dynamicitticketrequest').empty().append(data);
        	});
		 	}else{
				swal("No Action Applied");
			}
	});
}
function inprogressitticket($id){
	$comment = "In Progress";
	$status = 2;
	$.get('{{ URL::to("/updateitticket")}}/'+$id+'/'+$comment+'/'+$status,function(data){
    	swal("In Progress", "Successfully!", "success");
    	$('#dynamicitticketrequest').empty().append(data);
	});
}
function troubleshoottoresolveitticket($id){		
	swal("Resolve And Comment:", {
		  content: "input",
		  buttons: true,	  
		})
		.then((value) => {
		if(value != null){
		  	$comment = value;
		  	$status = 4;
		  	$.get('{{ URL::to("/updateitticket")}}/'+$id+'/'+$comment+'/'+$status,function(data){
            	swal("Resolve", "Successfully!", "success");
            	$('#dynamicitticketrequest').empty().append(data);
        	});
		 	}else{
				swal("No Action Applied");
			}
	});
}
function useinventorytoresolveitticket($id) {
	$comment = "In Progress";
	$status = 5;
	$.get('{{ URL::to("/updateitticket")}}/'+$id+'/'+$comment+'/'+$status,function(data){
		$('#modals').empty().append(data);
    	$('#resolve').modal('show');
	});
}
</script>	
@endsection