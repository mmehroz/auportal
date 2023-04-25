@extends('layout.apptheme')
@section('hr-HRM')

<style type="text/css">
td.details-control {
    background: url('../public/assets/img/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('../public/assets/img/details_close.png') no-repeat center center;
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
								<th class="details-control sorting_disabled">Sno</th>
								<th>Batch ID</th>
								<th>Month Name</th>
								<th>Name</th>
								<th>Department</th>
								<th>Presents</th>
								<th>Annual Leaves</th>
								<th>Sick Leaves</th>
								<th>WOPLeaves</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class=" details-control">1
									<img src="{!! asset('public/assets/img/details_open.png') !!}" alt="">
								</td>
								<td>11728</td>
								<td>April</td>
								<td>Arqum Siddiqui</td>
								<td>Web Development</td>
								<td>22</td>
								<td>0</td>
								<td>4</td>
								<td>0</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
	<!-- /Page Content -->
	
	<!-- Add Employee Modal -->
	
	<!-- /Add Employee Timings Modal -->
	<div id="add_employeetimings" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Employee Timings</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="col-sm-12">
							<div class="form-group">
								<label class="col-form-label">Batch ID <span class="text-danger"></span></label>
								<input class="form-control" type="number">
							</div>
						</div>
						<div class="col-sm-12">  
							<div class="form-group">
								<label class="col-form-label">Arrival Time<span class="text-danger"></span></label>
								<input type="time" class="form-control" value="" required="">
							</div>
						</div>
						<div class="col-sm-12">  
							<div class="form-group">
								<label class="col-form-label">Departure Time<span class="text-danger"></span></label>
								<input type="time" class="form-control" value="" required="">
							</div>
						</div>
						<div class="col-sm-12">  
							<div class="form-group">
								<label class="col-form-label">Date of implementation<span class="text-danger"></span></label>
								<div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
							</div>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Edit Employee Timings Modal -->
	<div id="edit_employeetimings" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Employee Timings</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="row">
							<div class="col-sm-12">
							<div class="form-group">
								<label class="col-form-label">Batch ID <span class="text-danger"></span></label>
								<input class="form-control" type="number" value="11340">
							</div>
						</div>
						<div class="col-sm-12">  
							<div class="form-group">
								<label class="col-form-label">Arrival Time<span class="text-danger"></span></label>
								<input type="time" class="form-control" value="08:00:PM" required="">
							</div>
						</div>
						<div class="col-sm-12">  
							<div class="form-group">
								<label class="col-form-label">Departure Time<span class="text-danger"></span></label>
								<input type="time" class="form-control" value="05:00:AM" required="">
							</div>
						</div>
						<div class="col-sm-12">  
							<div class="form-group">
								<label class="col-form-label">Date of implementation<span class="text-danger"></span></label>
								<div class="cal-icon"><input class="form-control datetimepicker" type="text"
									value="2019-12-01"></div>
							</div>
						</div>										
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit Employee Timings Modal -->
	
	<!-- Delete Employee Timings Modal -->
	<div class="modal custom-modal fade" id="delete_employeetimings" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						<h3>Delete Employee Timings</h3>
						<p>Are you sure want to delete?</p>
					</div>
					<div class="modal-btn delete-action">
						<div class="row">
							<div class="col-6">
								<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
							</div>
							<div class="col-6">
								<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Delete Employee Timings Modal -->
	
</div>
<!-- /Page Wrapper -->	
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    var table = $('.epayroll').DataTable( {
        "ajax": "../ajax/data/objects.txt",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "name" },
            { "data": "position" },
            { "data": "office" },
            { "data": "salary" }
        ],
        "order": [[1, 'asc']]
    } );
     
    // Add event listener for opening and closing details
    $('.epayroll tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
} );
</script>
			
		@endsection