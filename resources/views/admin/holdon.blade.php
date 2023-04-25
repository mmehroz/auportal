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
					<h3 class="page-title">Call For Interview Candidates List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Call For Interview</li>
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
							<a class="nav-link active" data-toggle="tab" href="#interview_candidates">Hold and Reject</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Tab -->
		
		<!-- Tab Content -->
		<div class="tab-content">
		
			<!--interview Candidates Tab -->
			<div class="tab-pane show active" id="interview_candidates">
				<!--interview Candidates List Table -->
				<div class="payroll-table card">
					<div class="table-responsive">
						<table class="table table-hover custom-table datatable" id="cfi">
							<thead>
								<tr style="text-align: center;">
									<th>Action</th>
									<th>Status</th>
									<th>Received End</th>
									<th>Resume</th>
									<th>View</th>
									<th>Name</th>
									<th>Email</th>
									<th>Contact No</th>
									<th>Department</th>
									<th>Postion Appplied for</th>
								</tr>
							</thead>
							<tbody>
							@foreach($data as $datas)
									<tr style="text-align: center;">
										<td class="text-center">
											<select class="form-control" id="mySelect" onchange="getedit(this.value)">
												<!-- <option value="">New</option>-->
												<option value="2~{{$datas->jobapplicant_id}}" @if(@$datas->jobapplicant_channel == "2" ) {{ "selected" }} @endif >Hold</option>
												<option value="1~{{$datas->jobapplicant_id}}" @if(@$datas->jobapplicant_channel == "1" ) {{ "selected" }} @endif >Process</option>
												<option value="3~{{$datas->jobapplicant_id}}" @if(@$datas->jobapplicant_channel == "3" ) {{ "selected" }} @endif >Reject</option>
											</select>
										</td>
										<td>{{$datas->jobapplicant_status}}</td>
										<td>
										@if ($datas->jobapplicant_status == "candidatelist")
											Admin 
										@elseif($datas->jobapplicant_status == "Screening")
											Manager
										@elseif($datas->jobapplicant_status == "inexperience")
											Admin
										@elseif($datas->jobapplicant_status == "Irrelevent")
											Admin
										@elseif($datas->jobapplicant_status == "irreleventByManager")
											Manager
										@elseif($datas->jobapplicant_status == "rejectedByManager")
											Manager
										@elseif($datas->jobapplicant_status == "inprocess")
											Admin
										@elseif($datas->jobapplicant_status == "awaiting")
											Admin	
										@elseif($datas->jobapplicant_status == "callforinterview")
											Admin
										@elseif($datas->jobapplicant_status == "attend")
											Admin
										@elseif($datas->jobapplicant_status == "notattend")
											Admin
										@elseif($datas->jobapplicant_status == "evaluateByAdmin")
											Manager
										@elseif($datas->jobapplicant_status == "evaluateByManager")
											Coo
										@elseif($datas->jobapplicant_status == "rejectBycoo")
											Coo
										@elseif($datas->jobapplicant_status == "evaluateByCoo")
											Admin
										@elseif($datas->jobapplicant_status == "hired")
											Admin
										@elseif($datas->jobapplicant_status == "nothired")
											Admin
										@elseif($datas->jobapplicant_status == "joined")
											Admin
										@elseif($datas->jobapplicant_status == "notinterested")
											Admin
										@endif
										</td>
										<td><a href="{{ URL::to('public/file/')}}/{{$datas->jobapplicant_cv}}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a></td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="{{ URL::to('/modalademployeeviewol/')}}/{{$datas->jobapplicant_id}}" target="_blank" ><i class="material-icons">more</i></a>
												<!---<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="URL::to('/modalemployeeview/')}}/{{$datas->jobapplicant_id}}" data-toggle="modal" data-target="#view_screening"><i class="fa fa-clock-o m-r-5"></i> View Details</a>
												</div>--->
											</div>
										</td>
										<td>{{$datas->jobapplicant_name}}</td>
										<td>{{$datas->log_email}}</td>
										<td>{{$datas->jobapplicant_contact}}</td>
										<td>{{$datas->DEPT_NAME}}</td>
										<td>{{$datas->jobapplicant_postionapppliedform}}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- interview List Table -->
				
			</div>
			<!--interview Candidates Tab -->

			
		</div>
		<!-- Tab Content -->
		
    </div>
	<!-- /Page Content -->
	
	<!-- View Interview Modal -->
		
		<!-- /Delete notattend Interview Modal -->	
	
</div>
<!-- /Page Wrapper -->	

<script>

function getedit($value){
		
		// console.log($value);
		
		swal({
                title: "Are you sure ?",
                text: "Once Approved, you will not be able to change the status of this request!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
		
		
		  $.get('{{ URL::to("/changechannel")}}/'+$value,function(data){
				
				console.log("true");
				
				location.reload();
				// $('#cl').DataTable().ajax.reload();
				 // $('#modals').empty();
				 // $('#modals').append(data)
				// $('#Editemployee').modal('show');
				});
                  swal("Your request successfully approved!", {
                    icon: "success",
                  });


                } else {
                  swal("Your request is unchanged!");
                }
              });
}

</script>
			
@endsection