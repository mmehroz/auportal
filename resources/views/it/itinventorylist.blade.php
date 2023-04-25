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
					<h3 class="page-title">IT Inventory</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Intentory List</li>
					</ul>
				</div>
				 <div class="col-auto float-right ml-auto">
		          <a href="#" class="btn add-btn" onclick="addtoinventory()"> Add To Inventory</a>
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
                				<th>Vendor Name</th>
							   	<th>Product Name</th>
                				<th>Type</th>
                				<th>Total Qty</th>
                				<th>Use Qty</th>
                				<th>Remaining Qty</th>
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
				                      <a class="dropdown-item" href="#" onclick="editinventory({{$val->itinventory_id}})"><i class="fa fa-pencil m-r-5"></i>Edit</a>
				                      <a class="dropdown-item" href="#" onclick="removefrominventory({{$val->itinventory_id}})"><i class="fa fa-trash m-r-5"></i>Delete</a>
				                    </div>
				                  </div>
				                </td>
								<td>{{$val->vendor_name}}</td>
								<td>{{$val->itinventory_name}}</td>
								<td>{{$val->itinventory_type}}</td>
								<td>{{$val->itinventory_qty}}</td>
								<td>{{$val->itinventory_qtyuse}}</td>
								<td>{{$val->itinventory_qtyremaining}}</td>
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
function addtoinventory(){
  $.get('{{ URL::to("/addtoinventory")}}',function(data){
  $('#modals').empty().append(data);
  $('#addtoinventory').modal('show');
  });
}
function editinventory($id){
  $.get('{{ URL::to("/editinventory")}}/'+$id,function(data){
  $('#modals').empty().append(data);
  $('#editinventory').modal('show');
  });
}
function removefrominventory($id){
  $.get('{{ URL::to("/removefrominventory")}}/'+$id);
  location.reload(true);
}
</script>
@endsection