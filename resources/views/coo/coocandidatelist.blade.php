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
						<li class="breadcrumb-item active">Call For Interview</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<div class="view-icons">
						<a href="{{url('/candidate_listcoo')}}" class="Grid-view btn btn-link active" title="Grid-view"><i class="fa fa-th"></i></a>
						<!-- <a href="{{url('/candidate_listcoo')}}" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false" title="Grid-view"><i class="fa fa-th"></i></a> -->
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
							<a class="nav-link active" data-toggle="tab" href="#interview_candidates">All Request Status</a>
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
										<td><a href="{{ URL::to('public/file/')}}/{{$datas->jobapplicant_cv}}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a></td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="{{ URL::to('/modalemployeeviewol/')}}/{{$datas->jobapplicant_id}}" target="_blank" ><i class="material-icons">more</i></a>
												<!---<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="URL::to('/modalemployeeview/')}}/{{$datas->jobapplicant_id}}" data-toggle="modal" data-target="#view_screening"><i class="fa fa-clock-o m-r-5"></i> View Details</a>
												</div>--->
											</div>
										</td>
										<td>{{$datas->jobapplicant_name}}</td>
										<td>{{$datas->log_email}}</td>
										<td>{{$datas->jobapplicant_contact}}</td>
										<td>{{$datas->dept_name}}</td>
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

			
@endsection