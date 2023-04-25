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
			
<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Increment List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Increment</li>
					</ul>
				</div>
				@if(session()->get("role") <= 2)
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" onclick="addincrement()" data-toggle="modal" data-target="#add_increment"><i class="fa fa-plus"></i> Add Increment</a>
				</div>
				@endif
			</div>
		</div>
    @if(session('message'))
      <div><p class="alert alert-success" >{{session('message')}}</p> </div>
    @endif
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 datatable dataTable no-footer" id="el">
						<thead>
							<tr>
                				@if(session()->get("role") <= 2)
                				<th class="text-right;" style="width: 10%!important;padding-left: 4%!important;">Action</th>
                				@endif
								<th>Batch Id</th>
								<th>Name</th>
								<th>Amount</th>
								<th>Year</th>
								<th>Month</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $val)
							<tr>
        				@if(session()->get("role") <= 2)
                <td class="text-right">
                  <div class="dropdown dropdown-action">
                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="#" onclick="editincrement({{$val->increment_id}})"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                      <a class="dropdown-item" href="{{url('/deleteincrement')}}/{{$val->increment_id}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                    </div>
                  </div>
                </td>
        					@endif
								<td>{{$val->elsemployees_batchid}}</td>
								<td>{{$val->elsemployees_name}}</td>
								<td>{{$val->increment_amount}}</td>
								<td>{{$val->increment_year}}</td>
								<td>{{$val->increment_month}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- /Page Content -->
</div>
<!-- /Page Wrapper -->
<div id ='modals'></div>
	
<script type="text/javascript">

function addincrement(){
	$.get('{{ URL::to("/addincrementmodal")}}',function(data){
	$('#modals').empty().append(data);
	$('#addincrement').modal('show');
	});
}
	
function editincrement($id){
	$.get('{{ URL::to("/editincrementmodal")}}/'+$id,function(data){
	$('#modals').empty().append(data);
	$('#editincrement').modal('show');
	});
}

</script>	
					
@endsection