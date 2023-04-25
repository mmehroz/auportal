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
					<h3 class="page-title">Fresh Candidate List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Fresh Candidate List</li>
					</ul>
					<a class=" btn btn-success btn-md"   style="float:Left; margin:1%;" href="{{ url('/downloadExcel') }}" >Export Excel </a>
				</div>
				<div class="col-auto float-right ml-auto">
					<div class="view-icons">
						<div class="dropdown profile-action" style="right: 0px!important;">
							<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false" title="Grid-view"><i class="fa fa-th"></i></a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="{{url('/candidate_list')}}" ><i class="fa fa-eye m-r-5"></i>Fresh Candidate List</a>
								<a class="dropdown-item" href="{{url('/screening_list')}}" ><i class="fa fa-eye m-r-5"></i>Screening List</a>
								<a class="dropdown-item" href="{{url('/irexperience_list')}}" ><i class="fa fa-eye m-r-5"></i>Inexperience List</a>
								<a class="dropdown-item" href="{{url('/irrelevent_list')}}" ><i class="fa fa-eye m-r-5"></i>Irrelevant List</a>
							</div>
						</div>
						<!-- <a href="{{url('/candidate_list')}}" class="grid-view btn btn-link" title="Grid-view"><i class="fa fa-th"></i></a> -->
						<!-- <a href="{{url('/candidatelist')}}" class="list-view btn btn-link active" title="List-view"><i class="fa fa-bars"></i></a> -->
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
							<a class="nav-link active" data-toggle="tab" href="#candidates_ist">Fresh Candidate List</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#screening_list">Screening</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#irexperience_list">inexperience</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#irrelevent_list">Irrelevant</a>
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
									<th>PDF</th>
									<th>Name</th>
								<!--	<th>Email</th>-->
									<th>Contact No</th>
								<!--<th>Department</th>-->
									<th>Postion Appplied for</th>
									@if( session()->get("role") ==	 1)
									<th>Gender</th>
									@endif
								</tr>
							</thead>
							<tbody>
								@foreach($data['Candidatelist'] as $datas)
									<tr style="text-align: center;">
										<td class="text-center">
											<select class="form-control" id="mySelect" onchange="getedit(this.value)">
												<!-- <option value="">New</option>-->
												<option value="candidatelist~{{$datas->jobapplicant_id}}">Candidate List</option>
												<option value="Screening~{{$datas->jobapplicant_id}}">Screening</option>
												<option value="inexperience~{{$datas->jobapplicant_id}}">Inexperience</option>
												<option value="Irrelevent~{{$datas->jobapplicant_id}}">Irrelevant</option>
												<option value="attend~{{$datas->jobapplicant_id}}">Attend Interview</option>
											</select>
										</td>
										<td><a href="{{ URL::to('public/file/')}}/{{$datas->jobapplicant_cv}}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> View Resume/CV</a></td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a style="color: #40c4f1 !important" href="{{ URL::to('/modalemployeeview/')}}/{{$datas->jobapplicant_id}}" target="_blank" ><i class="material-icons">more</i></a>
												<!---<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="URL::to('/modalemployeeview/')}}/{{$datas->jobapplicant_id}}" data-toggle="modal" data-target="#view_screening"><i class="fa fa-clock-o m-r-5"></i> View Details</a>
												</div>--->
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a style="color: #40c4f1 !important" href="{{ URL::to('/preemployementpdf')}}/{{$datas->jobapplicant_id}}" target="_blank" ><i class="material-icons">more</i></a>
												</div>
										</td>
										<td>{{$datas->jobapplicant_name}}</td>
										<!--<td>{{$datas->log_email}}</td>-->
										<td>{{$datas->jobapplicant_contact}}</td>
										<!--<td>{{$datas->dept_name}}</td>-->
										<td>{{$datas->jobapplicant_postionapppliedform}}</td>
										@if( session()->get("role") ==	 1)
										<td>{{$datas->jobapplicant_gender}}</td>
										@endif
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- /Candidates List Table -->
				
			</div>
			<!-- Candidates Tab -->
			
			<!-- Screening Tab -->
			<div class="tab-pane" id="screening_list">
				<!-- Screening Table -->
				<div class="payroll-table card">
					<div class="table-responsive">
						<table class="table table-hover custom-table datatable" id="s">
							<thead>
								<tr style="text-align: center;">
									<th>Resume</th>
									<th>View</th>
									<th>PDF</th>
									<th>Name</th>
									<!--<th>Email</th>-->
									<th>Contact No</th>
									<!--<th>Department</th>-->
									<th>Postion Appplied for</th>
									@if( session()->get("role") ==	 1)
									<th>Gender</th>
									@endif
								</tr>
							</thead>
							<tbody>
								@foreach($data['Screeninglist'] as $datas)
									<tr style="text-align: center;">
										<td><a href="{{ URL::to('public/file/')}}/{{$datas->jobapplicant_cv}}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a></td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a style="color: #40c4f1 !important" href="{{ URL::to('/modalemployeeview/')}}/{{$datas->jobapplicant_id}}" target="_blank" ><i class="material-icons">more</i></a>
												<!---<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="URL::to('/modalemployeeview/')}}/{{$datas->jobapplicant_id}}" data-toggle="modal" data-target="#view_screening"><i class="fa fa-clock-o m-r-5"></i> View Details</a>
												</div>-->
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a style="color: #40c4f1 !important" href="{{ URL::to('/preemployementpdf')}}/{{$datas->jobapplicant_id}}" target="_blank" ><i class="material-icons">more</i></a>
												</div>
										</td>
										<td>{{$datas->jobapplicant_name}}</td>
										<!--<td>{{$datas->log_email}}</td>-->
										<td>{{$datas->jobapplicant_contact}}</td>
										<!--<td>{{$datas->dept_name}}</td>-->
										<td>{{$datas->jobapplicant_postionapppliedform}}</td>
										@if( session()->get("role") ==	 1)
										<td>{{$datas->jobapplicant_gender}}</td>
										@endif
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- /Screening Table -->
				
			</div>
			<!-- /Screening Tab -->

			<!-- irexperience Tab -->
			<div class="tab-pane" id="irexperience_list">
				<!-- irexperience Table -->
				<div class="payroll-table card">
					<div class="table-responsive">
						<table class="table table-hover custom-table datatable" id="oh">
							<thead>
								<tr style="text-align: center;">
									<th>Action</th>
									<th>Resume</th>
									<th>View</th>
									<th>PDF</th>
									<th>Name</th>
									<!--<th>Email</th>-->
									<th>Contact No</th>
									<!--<th>Department</th>-->
									<th>Postion Appplied for</th>
									@if( session()->get("role") ==	 1)
									<th>Gender</th>
									@endif
								</tr>
							</thead>
							<tbody>
								@foreach($data['Irexperiencelist'] as $datas)
									<tr style="text-align: center;">
										<td class="text-center">
											<select class="form-control" id="mySelect" onchange="getedit(this.value)">
												<!-- <option value="">New</option>-->
												<option value="candidatelist~{{$datas->jobapplicant_id}}">Candidate List</option>
												<option value="Screening~{{$datas->jobapplicant_id}}">Screening</option>
												<option value="inexperience~{{$datas->jobapplicant_id}}">Inexperience</option>
												<option value="Irrelevent~{{$datas->jobapplicant_id}}">Irrelevant</option>
											</select>
										</td>
										<td><a href="{{ URL::to('public/file/')}}/{{$datas->jobapplicant_cv}}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a></td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a style="color: #40c4f1 !important" href="{{ URL::to('/modalemployeeview/')}}/{{$datas->jobapplicant_id}}" target="_blank" ><i class="material-icons">more</i></a>
												<!---<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="URL::to('/modalemployeeview/')}}/{{$datas->jobapplicant_id}}" data-toggle="modal" data-target="#view_screening"><i class="fa fa-clock-o m-r-5"></i> View Details</a>
												</div>-->
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a style="color: #40c4f1 !important" href="{{ URL::to('/preemployementpdf')}}/{{$datas->jobapplicant_id}}" target="_blank" ><i class="material-icons">more</i></a>
												</div>
										</td>
										<td>{{$datas->jobapplicant_name}}</td>
										<!--<td>{{$datas->log_email}}</td>-->
										<td>{{$datas->jobapplicant_contact}}</td>
										<!--<td>{{$datas->dept_name}}</td>-->
										<td>{{$datas->jobapplicant_postionapppliedform}}</td>
										@if( session()->get("role") ==	 1)
										<td>{{$datas->jobapplicant_gender}}</td>
										@endif
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- irexperience Table -->
				
			</div>
			<!-- irexperience Tab -->

			<!-- irrelevent Tab -->
			<div class="tab-pane" id="irrelevent_list">
				<!-- irrelevent Table -->
				<div class="payroll-table card">
					<div class="table-responsive">
						<table class="table table-hover custom-table datatable" id="r">
							<thead>
								<tr style="text-align: center;">
									<th>Resume</th>
									<th>View</th>
									<th>PDF</th>
									<th>Name</th>
									<!--<th>Email</th>-->
									<th>Contact No</th>
									<!--<th>Department</th>-->
									<th>Postion Appplied for</th>
									@if( session()->get("role") ==	 1)
									<th>Gender</th>
									@endif
								</tr>
							</thead>
							<tbody>
								@foreach($data['Irreleventlist'] as $datas)
									<tr style="text-align: center;">
										<td><a href="{{ URL::to('public/file/')}}/{{$datas->jobapplicant_cv}}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a></td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a style="color: #40c4f1 !important" href="{{ URL::to('/modalemployeeview/')}}/{{$datas->jobapplicant_id}}" target="_blank" ><i class="material-icons">more</i></a>
												<!---<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#view_screening"><i class="fa fa-clock-o m-r-5"></i> View Details</a>
												</div>-->
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a style="color: #40c4f1 !important" href="{{ URL::to('/preemployementpdf')}}/{{$datas->jobapplicant_id}}" target="_blank" ><i class="material-icons">more</i></a>
												</div>
										</td>
										<td>{{$datas->jobapplicant_name}}</td>
										<!--<td>{{$datas->log_email}}</td>-->
										<td>{{$datas->jobapplicant_contact}}</td>
										<!--<td>{{$datas->dept_name}}</td>-->
										<td>{{$datas->jobapplicant_postionapppliedform}}</td>
										@if( session()->get("role") ==	 1)
										<td>{{$datas->jobapplicant_gender}}</td>
										@endif
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- /irrelevent Table -->
				
			</div>
			<!-- /irrelevent Tab -->
			
		</div>
		<!-- Tab Content -->
		
    </div>
	<!-- /Page Content -->
	
	
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
		
		
		  $.get('{{ URL::to("/adamaction")}}/'+$value,function(data){
				
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