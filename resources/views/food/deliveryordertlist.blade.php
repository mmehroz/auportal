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
					<h3 class="" ass="page-title">Awaiting To Deliver</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Order Report</li>
					</ul>
				</div>
			</div>
		</div>
    @if(session('message'))
      <div><p class="alert alert-success" >{{session('message')}}</p> </div>
    @endif
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 datatable dataTable no-footer" id="correctionatt">
						<thead >
							<tr>
                				@if(session()->get("role") <= 3)
                				<th class="text-right;" style="width: 10%!important;padding-left: 4%!important;">Action</th>
                				@endif
								<th>Department</th>
								<th>Employee Name</th>
								<th>Restaurant Name</th>
								<th>Product Name</th>
								<th>Unit</th>
								<th>Quantity</th>
								<th>Amount</th>
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
		                      <a class="dropdown-item" href="#" onclick="deliverd({{$val->order_id}})"><i class="fa fa-check m-r-5"></i> Deliverd</a>
		                      <a class="dropdown-item" href="#" onclick="canceled({{$val->order_id}})"><i class="fa fa-times m-r-5"></i> Cancel</a>
		                    </div>
		                  </div>
		                </td>
        					@endif
								<td>{{$val->dept_name}}</td>
								<td>{{$val->elsemployees_name}}</td>
								<td>{{$val->restaurant_name}}</td>
								<td>{{$val->product_name}}</td>
								<td>{{$val->product_unit}}</td>
								<td>{{$val->order_productquantity}}</td>
								<td>{{$val->order_productprice}}</td>
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
$('#correctionatt').dataTable( {
  "pageLength": 100
} );
function deliverd($id){
	$.get('{{ URL::to("/deliverd")}}/'+$id);
	window.location.reload();
}
function canceled($id){
	$.get('{{ URL::to("/canceled")}}/'+$id);
	window.location.reload();
}
</script>	
<style type="text/css">
	.table {
		position: relative;
		display:block;
		width: 100% !important;
		overflow-x: scroll;
		overflow-y: scroll;
		height: 400px;
	}
	thead {
		position:sticky;
		top:0;
	}
</style>		
@endsection
