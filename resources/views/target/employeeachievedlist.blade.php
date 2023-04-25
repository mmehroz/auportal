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
					<h3 class="page-title">Employee Achieved List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Achieved</li>
					</ul>
				</div>
			</div>
		</div>
    @if(session('message'))
      <div><p class="alert alert-success" >{{session('message')}}</p> </div>
    @endif
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 datatable dataTable no-footer" id="acieved">
						<thead>
							<tr>
								<th class="text-right;" style="width: 10%!important;padding-left: 4%!important;">Action</th>
                				<th>Batch Id</th>
								<th>Name</th>
								<th>Month</th>
								<th>Date</th>
								<th>Achieved</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $val)
							<tr>
								<td class="text-right">
				                  <div class="dropdown dropdown-action">
				                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
				                    <div class="dropdown-menu dropdown-menu-right">
				                      <a class="dropdown-item" href="#" onclick="editachieved({{$val->employeeachieved_id}})"><i class="fa fa-pencil m-r-5"></i> Edit</a>
				                      <a class="dropdown-item" href="{{url('/deleteachived')}}/{{$val->employeeachieved_id}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
				                    </div>
				                  </div>
				                </td>
	        					<td>{{$val->elsemployees_batchid}}</td>
								<td>{{$val->elsemployees_name}}</td>
								<td>{{$val->employeeachieved_month}}</td>
								<td>{{$val->employeeachieved_date}}</td>
								<td>{{$val->employeeachieved_achieved}}</td>
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
	function editachieved($id){
		$.get('{{ URL::to("/editachievedmodal")}}/'+$id,function(data){
		$('#modals').empty().append(data);
		$('#editachieved').modal('show');
		});
	}
</script>
@endsection