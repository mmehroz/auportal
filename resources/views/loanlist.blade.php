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
					<h3 class="page-title">Loan List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Employee Loan</li>
					</ul>
				</div>
				@if(session()->get("role") <= 2)
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" onclick="addloan()" data-toggle="modal" data-target="#add_loan"><i class="fa fa-plus"></i> Add Employee Loan</a>
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
                				<th>Edit</th>
                				<th>Name</th>
								<th>Batch Id</th>
								<th>Total Amount</th>
								<th>Paid Amount</th>
								<th>Balance Amount</th>
								<th>Remaining Instalment</th>
								<th>Reason</th>
								<th>Created At</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $val)
							<tr>
								<td class="text-center" >
	                    			<a href="#" onclick="editloan({{$val->loan_id}})"> <i class="fa fa-pencil"></i></a>
								</td>
        						<td>{{$val->elsemployees_name}}</td>
								<td>{{$val->elsemployees_batchid}}</td>
								<td>{{$val->loan_amount}}</td>
								<td>{{$val->loan_paid}}</td>
								<td><?php echo($val->loan_amount - $val->loan_paid)?></td>
								<td>{{$val->loan_instalments}}</td>
								<td>{{$val->loan_reason}}</td>
								<td>{{$val->created_at}}</td>
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
function addloan(){
	$.get('{{ URL::to("/addloan")}}',function(data){
	$('#modals').empty().append(data);
	$('#addloan').modal('show');
	});
}
function editloan($id){
	$.get('{{ URL::to("/editloan")}}/'+$id,function(data){
	$('#modals').empty().append(data);
	$('#editloan').modal('show');
	});
}
</script>	
					
@endsection