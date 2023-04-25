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
					<h3 class="page-title">ON/OFF</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Day List</li>
					</ul>
				</div>
				@if(session()->get("role") <= 3)
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" onclick="addonday()" data-toggle="modal" data-target="#add_loan"><i class="fa fa-plus"></i> Add Day To Work/Holiday</a>
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
					<table class="table table-striped custom-table mb-0 datatable dataTable no-footer" id="announcement">
						<thead>
							<tr>
                				<th>Date</th>
                				<th>Type</th>
								<th>Department</th>
								<th>Add By</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $val)
							<tr>
								<td>{{$val->onday_date}}</td>
								<td>{{$val->onday_type}}</td>
								<td>{{$val->DEPT_NAME}}</td>
        						<td>{{$val->elsemployees_name}}</td>
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
function addonday(){
	$.get('{{ URL::to("/addonday")}}',function(data){
	$('#modals').empty().append(data);
	$('#addonday').modal('show');
	});
}
</script>	
					
@endsection