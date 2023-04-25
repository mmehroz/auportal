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
					<h3 class="page-title">Car</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">List</li>
					</ul>
				</div>
				 <div class="col-auto float-right ml-auto">
		          <a href="#" class="btn add-btn" onclick="addcar()"> Add Car</a>
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
							   	<th>Action</th>
							   	<th>Image</th>
							   	<th>Name</th>
                				<th>Model</th>
                				<th>Rent</th>
                				<th>Vendor Name</th>
                				<th>Created By</th>
                				<th>Created At</th>
                			</tr>
						</thead>
						<tbody>
							@foreach ($data as $val)
							<tr>
								<td class="text-right" style="width: 20px">
				                  <div class="dropdown dropdown-action">
				                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
				                    <div class="dropdown-menu dropdown-menu-right">
				                      <a class="dropdown-item" href="#" onclick="rentaddition({{$val->car_id}})"><i class="fa fa-plus m-r-5"></i>Add Rent Addition</a>
				                      <a class="dropdown-item" href="#" onclick="viewrentadditionlog({{$val->car_id}})"><i class="fa fa-eye m-r-5"></i>View Rent Addition Log</a>
				                      <a class="dropdown-item" href="#" onclick="editcar({{$val->car_id}})"><i class="fa fa-pencil m-r-5"></i>Edit</a>
				                      <a class="dropdown-item" href="#" onclick="deletecar({{$val->car_id}})"><i class="fa fa-trash m-r-5"></i>Delete</a>
				                    </div>
				                  </div>
				                </td>
								<td><img class="avatar" src="{{URL::to('public/car_picture/')}}/{{$val->car_picture}}"  alt=""></td>
								<td>{{$val->car_name}}</td>
								<td>{{$val->car_model}}</td>
								<td>{{$val->car_rent}}</td>
								<td>{{$val->vendor_name}}</td>
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
<div id ='modals'></div>
<script>
function addcar(){
  $.get('{{ URL::to("/addcar")}}',function(data){
  $('#modals').empty().append(data);
  $('#addcar').modal('show');	
  });
}
function rentaddition($id){
  $.get('{{ URL::to("/rentaddition")}}/'+$id,function(data){
  $('#modals').empty().append(data);
  $('#rentaddition').modal('show');
  });
}
function viewrentadditionlog($id){
  $.get('{{ URL::to("/viewrentadditionlog")}}/'+$id,function(data){
  $('#modals').empty().append(data);
  $('#viewrentadditionlog').modal('show');
  });
}
function editcar($id){
  $.get('{{ URL::to("/editcar")}}/'+$id,function(data){
  $('#modals').empty().append(data);
  $('#editcar').modal('show');
  });
}
function deletecar($id){
$.get('{{ URL::to("/deletecar")}}/'+$id);
swal("Deleted", "Successfully!", "success");
setTimeout(function(){
	location.reload(true);
}, 3000);
}
</script>
@endsection