@extends('layout.apptheme')
@section('hr-HRM')
			
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-10">
					<h3 class="page-title">Expense Report</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Expense</li>
					</ul>
				</div>
				<div class="col-sm-2">
					<a href="#" class="btn add-btn" onclick="addrecuringexpense()" data-toggle="modal" data-target="#add_expense"><i class="fa fa-plus"></i> Add Expense</a>
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
							<thead style="color: white; background-color: #640d1d">	
								<tr>
	                				<th style="width: 10%!important;">Action</th>
	                				<th>Type</th>
									<th>Title</th>
									<th>Amount</th>
									<th>Month</th>
									<th>Comment</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $val)
								<tr>
		        					<td class="text-right">
					                  	<div class="dropdown dropdown-action">
					                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
					                    <div class="dropdown-menu dropdown-menu-right">
					                      <a class="dropdown-item" href="#" onclick="editrecuringexpense({{$val->expense_id}})"><i class="fa fa-pencil m-r-5"></i> Edit</a>
					                    </div>
					                  	</div>
				                	</td>
				                	<td>{{$val->expensetype_name}}</td>
									<td>{{$val->expense_title}}</td>
									<td>PKR {{$val->expense_amount}}</td>
									<td>{{$val->expense_yearandmonth}}</td>
									<td>{{$val->expense_comment}}</td>
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
function addrecuringexpense(){
	$.get('{{ URL::to("/addrecuringexpense")}}',function(data){
	$('#modals').empty().append(data);
	$('#addexpense').modal('show');
	});
}
function editrecuringexpense($id){
	$.get('{{ URL::to("/editrecuringexpense")}}/'+$id,function(data){
	$('#modals').empty().append(data);
	$('#editexpense').modal('show');
	});
}
</script>
@endsection