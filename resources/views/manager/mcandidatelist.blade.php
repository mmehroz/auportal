@extends('layout.apptheme')
@section('hr-HRM')

<style type="text/css">
	.card {
	    padding: 1.25rem;
	    flex: 1 1 auto;
	}

    .action-icon {
	    background-color: #fff;
	    border: 1px solid #e3e3e3;
	    color: #777;
	    font-size: 18px;
	    display: inline-block;
	    margin-right: 30px;
	    margin-top: -10px;
	    min-width: 40px;
	    padding: 4px;
	    padding-right: 10px;
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
				<div class="col-auto float-right ml-auto">
					<div class="view-icons">
						<div class="dropdown profile-action" style="right: 0px!important;">
							<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false" title="Grid-view"><i class="fa fa-th"></i></a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="{{url('/mcandidate_list')}}" ><i class="fa fa-eye m-r-5"></i>Candidates List</a>
								<a class="dropdown-item" href="{{url('/callforinterview_list')}}" ><i class="fa fa-eye m-r-5"></i>Call For Interview</a>
								<a class="dropdown-item" href="{{url('/mirrelevent_list')}}" ><i class="fa fa-eye m-r-5"></i>Irrelevent List</a>
								<a class="dropdown-item" href="{{url('/rejected_list')}}" ><i class="fa fa-eye m-r-5"></i>Rejected</a>
							</div>
						</div>
					</div>
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
							<a class="nav-link" data-toggle="tab" href="#callforinterview_list">Call For Interview</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#irrelevent_list">Irrelevent</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#rejected_list">Rejected</a>
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
						<table class="table table-hover custom-table datatable" id="mcl">
							<thead>
								<tr style="text-align: center;">
									<th>Action</th>
									<th>Resume</th>
									<th>Name</th>
									<th>Email</th>
									<th>Contact No</th>
									<th>Postion Appplied for</th>
								</tr>
							</thead>
							<tbody>
							@foreach($data['screeninglist'] as $datas)
									<tr style="text-align: center;">
										<!--<td class="text-center">
											<select id="mySelect" onchange="getedit(this.value)">
												 <option value="">New</option> 
												<option value="Screening~{{$datas->jobapplicant_id}}">Candidate List</option>
												<option value="callforinterview~{{$datas->jobapplicant_id}}">Call For Interview</option>
												<option value="irrelevent~{{$datas->jobapplicant_id}}">Irrelevent</option>
												<option value="rejected~{{$datas->jobapplicant_id}}">Rejected</option>
											</select>
										</td>-->
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="{{ URL::to('/modviewmng/')}}/{{$datas->jobapplicant_id}}" class="fa fa-ellipsis-v dropdown-toggle" ></i></a>
												<!--<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#view_screening"><i class="fa fa-clock-o m-r-5"></i> View Details</a>
												</div>--->
											</div>
										</td>
										<td><a href="{{ URL::to('public/file/')}}/{{$datas->jobapplicant_cv}}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a></td>
										<td>{{$datas->jobapplicant_name}}</td>
										<td>{{$datas->can_email}}</td>
										<td>{{$datas->jobapplicant_contact}}</td>
									<td>{{$datas->jobapplicant_postionapppliedform}}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- /Candidates List Table -->		
			</div>
			<!-- Candidates Tab -->


			<!--Call For Interview Candidates Tab -->
			<div class="tab-pane" id="callforinterview_list">
				<!--Call For Interview Candidates List Table -->
				<div class="payroll-table card">
					<div class="table-responsive">
						<table class="table table-hover custom-table datatable" id="macl">
							<thead>
								<tr style="text-align: center;">
									<th>Action</th>
									<th>Resume</th>
									<th>Name</th>
									<th>Email</th>
									<th>Contact No</th>
									<th>Postion Appplied for</th>
								</tr>
							</thead>
							<tbody>
							@foreach($data['callforinter'] as $datas)
									<tr style="text-align: center;">
									<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="{{ URL::to('/modviewmng/')}}/{{$datas->jobapplicant_id}}" class="fa fa-ellipsis-v dropdown-toggle" ></i></a>
												<!--<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#view_screening"><i class="fa fa-clock-o m-r-5"></i> View Details</a>
												</div>--->
											</div>
										</td>
										<td><a href="{{ URL::to('public/file/')}}/{{$datas->jobapplicant_cv}}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a></td>
										<td>{{$datas->jobapplicant_name}}</td>
										<td>{{$datas->can_email}}</td>
										<td>{{$datas->jobapplicant_contact}}</td>
										<td>{{$datas->jobapplicant_postionapppliedform}}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- /Call For InterviewCandidates List Table -->		
			</div>
			<!-- Call For InterviewCandidates Tab -->
			
			<!-- irrelevent Tab -->
			<div class="tab-pane" id="irrelevent_list">
				<!-- irrelevent Table -->
				<div class="payroll-table card">
					<div class="table-responsive">
						<table class="table table-hover custom-table datatable" id="moh">
							<thead>
								<tr style="text-align: center;">
									<th>Action</th>
									<th>Resume</th>
									<th>Name</th>
									<th>Email</th>
									<th>Contact No</th>
									<th>Postion Appplied for</th>
								</tr>
							</thead>
							<tbody>
							@foreach($data['irreleventlist'] as $datas)
									<tr style="text-align: center;">
										<!--<td class="text-center">
											<select id="mySelect" onchange="getedit(this.value)">
												 <option value="">New</option> 
												<option value="irrelevent~{{$datas->jobapplicant_id}}">Irrelevent</option>
												<option value="Screening~{{$datas->jobapplicant_id}}">Candidate List</option>
												<option value="callforinterview~{{$datas->jobapplicant_id}}">Call For Interview</option>
												<option value="rejected~{{$datas->jobapplicant_id}}">Rejected</option>
											</select>
										</td>-->
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="{{ URL::to('/modviewmng/')}}/{{$datas->jobapplicant_id}}" class="fa fa-ellipsis-v dropdown-toggle" ></i></a>
												<!--<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#view_screening"><i class="fa fa-clock-o m-r-5"></i> View Details</a>
												</div>-->
											</div>
										</td>
										<td><a href="{{ URL::to('public/file/')}}/{{$datas->jobapplicant_cv}}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a></td>
										<td>{{$datas->jobapplicant_name}}</td>
										<td>{{$datas->can_email}}</td>
										<td>{{$datas->jobapplicant_contact}}</td>
										<td>{{$datas->jobapplicant_postionapppliedform}}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- irrelevent Table -->
				
			</div>
			<!-- irrelevent Tab -->

			<!-- rejected Tab -->
			<div class="tab-pane" id="rejected_list">
				<!-- rejected Table -->
				<div class="payroll-table card">
					<div class="table-responsive">
						<table class="table table-hover custom-table datatable" id="mr">
							<thead>
								<tr style="text-align: center;">
									<th>Action</th>
									<th>Resume</th>
									<th>Name</th>
									<th>Email</th>
									<th>Contact No</th>
									<th>Postion Appplied for</th>
								</tr>
							</thead>
							<tbody>
							@foreach($data['rejected'] as $datas)
									<tr style="text-align: center;">
									<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="{{ URL::to('/modviewmng/')}}/{{$datas->jobapplicant_id}}" class="fa fa-ellipsis-v dropdown-toggle" ></i></a>
												<!--<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#view_screening"><i class="fa fa-clock-o m-r-5"></i> View Details</a>
												</div>--->
											</div>
										</td>
										<td><a href="{{ URL::to('public/file/')}}/{{$datas->jobapplicant_cv}}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i>Download</a></td>
										<td>{{$datas->jobapplicant_name}}</td>
										<td>{{$datas->can_email}}</td>
										<td>{{$datas->jobapplicant_contact}}</td>
										<td>{{$datas->jobapplicant_postionapppliedform}}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- /rejected Table -->
				
			</div>
			<!-- /rejected Tab -->
			
		</div>
		<!-- Tab Content -->
		
    </div>
	<!-- /Page Content -->
	
	

	
</div>
<!-- /Page Wrapper -->
<script>

function getedit($value){
		
		// console.log($value);
	
		  $.get('{{ URL::to("/mngeaction")}}/'+$value,function(data){
				
				console.log("true");
			 // $('#modals').empty();
			 // $('#modals').append(data)
		   // $('#Editemployee').modal('show');
		  });
}

</script>			
			
@endsection