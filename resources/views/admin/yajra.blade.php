@extends('layout.apptheme')
@section('hr-HRM')

<style type="text/css">
	.card {
	    padding: 1.25rem;
	    flex: 1 1 auto;
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
					<h3 class="page-title">Candidates List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Candidates List</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<!-- Page Tab -->
		<div class="page-menu">
			<div class="row">
				<div class="col-sm-12">
					<ul class="nav nav-tabs nav-tabs-bottom">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#candidates_ist">Candidates List</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#screening_list">Screening</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#irexperience_list">irexperience</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#irrelevent_list">Irrelevent</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Tab -->
		
		<!-- Tab Content -->
		<div class="tab-content">
		
			<!-- Candidates Tab -->
			<div class="tab-pane show active" id="candidates_ist">
				<!-- Candidates List Table -->
				<div class="payroll-table card">
					<div class="table-responsive">
						<table class="table table-hover custom-table datatable" id="cl">
							<thead>
								<tr style="text-align: center;">
									<th>Action</th>
									<th>Resume</th>
									<th>View</th>
									<th>Name</th>
									<th>Email</th>
									<th>Contact No</th>
									<th>Experience</th>
									<th>Designation</th>
									<th>Department</th>
									
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
				<!-- /Candidates List Table -->
				
			</div>
			<!-- Candidates Tab -->
			
			<!-- Screening Tab -->
		
			<!-- /Screening Tab -->

			<!-- irexperience Tab -->
			
			<!-- irexperience Tab -->

			<!-- irrelevent Tab -->
			
		<!-- Tab Content -->
		
    </div>
	<!-- /Page Content -->
	
	<!-- View Employee Modal -->
		
		<!-- /View irrelevent Modal -->	

	
</div>
<!-- /Page Wrapper -->	
<script>



 $(function() {
				
			var table = $('#cl').DataTable({	
              processing: true,
              serverSide: true,
              ajax: '{!! route('datatable.empdata') !!}',
              columns: [
					{ data: 'action', name: 'action' },
					{ data: 'resume', name: 'resume' },
					{ data: 'view', name: 'view' },
					{ data: 'jobapplicant_name', name: 'jobapplicant_name' },
					{ data: 'jobapplicant_email', name: 'jobapplicant_email' },
					{ data: 'jobapplicant_contact', name: 'jobapplicant_contact' },
					{ data: 'jobapplicant_experience', name: 'jobapplicant_experience' },
					{ data: 'DESG_NAME', name: 'DESG_NAME' },
					{ data: 'DEPT_NAME', name: 'DEPT_NAME' },
					
				],
                "searching": true,
                "bInfo": true,
                "bPaginate": true,
                "stateSave": true,
				"paging": false,
                "bFilter": true,
                "scrollX": false,
              order: [3, 'asc'],
              iDisplayLength: 25,
          });

          // setInterval( function () {
                    // table.ajax.reload(null , false);
                    // }, 8000);
			
          });

function getedit($value){
		
		// console.log($value);
	
		  $.get('{{ URL::to("/adamaction")}}/'+$value,function(data){
					
				console.log("true");
				$('#cl').DataTable().ajax.reload();
			 // $('#modals').empty();
			 // $('#modals').append(data)
		   // $('#Editemployee').modal('show');
		  });
}

</script>		
			
@endsection