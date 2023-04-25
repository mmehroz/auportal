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
					<h3 class="" ass="page-title">Complete Or Cancel</h3>
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
                				<th>Department</th>
								<th>Employee Name</th>
								<th>Restaurant Name</th>
								<th>Product Name</th>
								<th>Unit</th>
								<th>Quantity</th>
								<th>Amount</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $val)
							<tr>
        						<td>{{$val->dept_name}}</td>
								<td>{{$val->elsemployees_name}}</td>
								<td>{{$val->restaurant_name}}</td>
								<td>{{$val->product_name}}</td>
								<td>{{$val->product_unit}}</td>
								<td>{{$val->order_productquantity}}</td>
								<td>{{$val->order_productprice}}</td>
								<td>{{$val->order_status}}ed</td>
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
<!-- modal -->
<script type="text/javascript">
$('#correctionatt').dataTable( {
  "pageLength": 100
} );
</script>	
<!-- modal end -->
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
