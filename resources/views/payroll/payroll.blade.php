@extends('layout.apptheme')
@section('hr-HRM')

<style type="text/css">
td.details-control {
    background: url('../resources/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('../resources/details_close.png') no-repeat center center;
}
</style>

<!-- Page Wrapper -->
<div class="page-wrapper">


		
	<div id="modals">


			
	</div>

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">All Employees Data</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Payroll</li>
					</ul>
				</div>
				<!-- <div class="col-auto float-right ml-auto">
					<button class="btn add-btn" type="button" data-toggle="modal" data-target="#add_employeetimings"><i class="fa fa-plus"></i> Add Employee Timings</button>
				</div> -->
			</div>
		</div>
		<!-- /Page Header -->
					
		<!-- Search Filter -->
		<!-- /Search Filter -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 datatable dataTable no-footer" id="epayroll1">
						<thead>	
							<tr>
							<th>Sno.</th>	
							<th>Batch id</th>
							<th>Month Name</th>
							<th>Name</th>
							<th>Department</th>
							<th>Presents</th>
							<th>Annual Leaves</th>
							<th>Sick Leaves</th>
							<th>WOPLeaves</th>
							<th>WOP Days</th>
							<th>Lates</th>
							<th>Lates Deduction</th>
							<th>Adjustments</th>
							<th>Salary</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $dataa)
							<tr>
								<td>{{$dataa[0]}}</td>
								<td>{{$dataa[1]}}</td>
								<td>{{$dataa[2]}}</td>
								<td>{{$dataa[3]}}</td>
								<td>{{$dataa[4]}}</td>
								<td>{{$dataa[5]}}</td>
								<td>{{$dataa[6]}}</td>
								<td>{{$dataa[7]}}</td>
								<td>{{$dataa[8]}}</td>
								<td>{{$dataa[9]}}</td>
								<td>{{$dataa[10]}}</td>
								<td>{{$dataa[11]}}</td>
								<td>{{$dataa[12]}}</td>
								<td>{{$dataa[13]}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
	<!-- /Page Content -->
	
	<div class="col-md-12">
			<div id="container"></div>
	</div>
	
</div>
<!-- /Page Wrapper -->

<script type="text/javascript">
	var table = $('#epayroll11').DataTable( {
			ajax:"{{URL::to('/mainPayrollData')}}",
			aLengthMenu: [
				[15,25, 50,100,500, 2800, -1],
				[15,25, 50,100,500, 2800 ,	"All"]
			],
			iDisplayLength: 15,
			dom: 'Bfrtip',
			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			],
			responsive: {
				details: {
					type: 'column'
				}
			},
			columnDefs: [
					{
						className: 'control',
						orderable: false,
						targets:   0
					},
					{ 
						width: "100px",
						targets: [4]
					},
					{ 
						orderable: false,
						targets: [4]
					}
				],
				order: [1, 'asc']
			} );
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

</script>
			
		@endsection