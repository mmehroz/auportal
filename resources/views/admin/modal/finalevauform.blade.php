<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords"
		content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="robots" content="noindex, nofollow">
	<title>INTERVIEW ASSESSMENT FORM</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&amp;family=Raleway&amp;family=Roboto:wght@500&amp;display=swap" rel="stylesheet">
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="{!! asset('public/favicon/favicon.png') !!}">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{!! asset('public/assets/css/bootstrap.min.css') !!}">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="{!! asset('public/assets/css/font-awesome.min.css') !!}">

	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="{!! asset('public/assets/css/line-awesome.min.css') !!}">

	<!-- Datatable CSS -->
	<link rel="stylesheet" href="{!! asset('public/assets/css/dataTables.bootstrap4.min.css') !!}">

	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{!! asset('public/assets/css/select2.min.css') !!}">

	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="{!! asset('public/assets/css/bootstrap-datetimepicker.min.css') !!}">

	<!-- Main CSS -->
	<link rel="stylesheet" href="{!! asset('public/assets/css/style.css') !!}">

	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
		rel="stylesheet" />

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		<style>
			.card{
				box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px !important;
				margin: 35px 72px;
    border-radius: 15px !important;
	border: none;
			}
			select.form-control:not([size]):not([multiple]) {
    height: calc(2.25rem + 2px);
    height: 55px;
    font-family: 'Raleway', sans-serif;
	
}
.card-body{
	background: #edf2f5;
}
.card-header {
    background-color: #ebebeb;
    text-align: center;
    border-radius: 5px !important;
 
}
.card-header h4{
	font-family: 'Raleway', sans-serif;
    color: #000;
    font-weight: 800;
    font-size: 25px;
    text-align: center;
	letter-spacing: 2px;
}
			.form-control {
    /* border-color: #0f1431; */
    border: none;
    border-radius: 5px;
    color: black;
    background-color: white;
    box-shadow: none;
    font-size: 14px;
    font-weight: 700;
    height: 55px;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
.col-form-label {
    padding-top: calc(0.375rem + 1px);
    padding-bottom: calc(0.375rem + 1px);
    margin-bottom: 0;
    font-size: inherit;
    line-height: 1.5;
    color: #4c4c4c;
    font-size: 15px;
    
    font-family: 'Raleway', sans-serif;
    /* font-family: poppins; */
    /* font-weight: 500; */
}
.form-check-label{
	font-size: 16px;
    color: #121212;
    font-weight: 600;
    font-family: 'Raleway', sans-serif;
}
button.btn.mybtn {
    background: #5069e7;
    COLOR: #FFF;
    font-family: 'Raleway', sans-serif;
    font-size: 16px;
    font-weight: bold;
}
input[type="file"] {
    height: 65px;
    padding-top: 18px;
}
.form-control:disabled, .form-control[readonly] {
    background-color: #fff;
    opacity: 1;
}
.submitbtn{
	background-color: #5069e7;
    color: #fff;
    width: 15%;
    height: 50px;
    margin-top: 25px;
}
.table {
    color: #4c4c4c;
    text-transform: capitalize;
	font-family: 'Raleway', sans-serif;
}
.tablep{
	color: #121212;
    text-transform: capitalize;
    font-family: 'Raleway', sans-serif;
    font-size: 18px;
    font-weight: 600;
}
.page-title-box {
 text-align: center !important;
 float: none !important;
}
.headerheading{
	text-align: center !important;
	color: #fff;
	font-family: 'Raleway', sans-serif;
	padding-top:5px
}
.mainheader{
	background-image: linear-gradient(to right bottom, #6416ec, #33e0e0) !important;
	padding-top: 10px;
	padding-bottom: 10px;
	position: sticky;
    position: -webkit-sticky;
    top: 0;
	z-index: 999;
}
.maincontainer{
	margin-top: 20px;
}
.logo img{
	width:35%
}
.logouttext{
	font-size: 17px;
						
						font-family: 'Raleway', sans-serif;
}
@media only screen and (max-width: 720px) {
	.maincontainer{
	margin-top: 0px;
}
.card{
				
				margin: 5px 2px;
	
}
.headerheading{
	font-size: 14px;
	margin-top: 15px;
	text-align: left !important;
    font-weight: bold;
}
.logo img{
	width:30%
}
.logouttext{
	font-size: 15px;
	font-weight: bold;
}
.logoutcolum{
	margin-top: 12px;
}
.submitbtn {
    width: 100%;
}
.tablep{
	font-size: 12px;
}
}
			</style>
</head>

<body>
	<!-- Main Wrapper -->
	<div class="main-wrapper">
		<!-- Header -->
		<div class="mainheader">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-3 col-12">
						<a href="#" class="logo">
							<img src="{!! asset('public/images/logo.svg') !!}">
						</a>
					</div>
					<div class="col-lg-6 col-9 pt-1">
						<h3 class="headerheading">Human Resource Management</h3>
					</div>
					<!-- <div class="col-lg-3 text-right col-3 pt-1 logoutcolum">
						<a class="text-white logouttext" href="#">Logout</a>
					</div> -->
				</div>
				
			</div>
			<!-- Logo -->
		
			<!-- /Logo -->
			<!-- Header Title -->
	
		
			<!-- /Header Title -->
			<!-- Header Menu -->
			
			<!-- /Header Menu -->
			<!-- Mobile Menu -->
	
			<!-- /Mobile Menu -->
		</div>
			<!-- /Header -->			
            <div class="content container-fluid">
            	<div class="page-header">
					<div class="row">
						<div class="col">
							
							@if(session('message'))
								<div class="alert alert-success" ><h4>{!!session('message')!!}</h4></div> 
						  
							@endif
							
							@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<div><h4><li>{{ $error }}</li></h4> </div>
									@endforeach
								</ul>
							</div>
							@endif
						</div>
					</div>
				</div>
				<form class="user" action="{{ URL::to('/submithrevulastform')}}" id="" enctype="multipart/form-data" method="post">
					{{csrf_field()}}
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">	
									<input type="hidden" name="can_job_id" value="{{ $data->jobapplicant_id }}" />
									<input type="hidden" name="can_evu_id" value="{{ $data->can_evu_id }}" />
									<h4 class="card-title mb-0 text-center">Candidate Personal Data</h4></div>
								<div class="card-body">
									<div class="row">
									    <div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Name</label>
												<input type="text" class="form-control"  value="{{old('can_name', @$data->jobapplicant_name )  }}" readonly />
											</div>
										</div>
									    <div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Company</label>
												<input type="text" class="form-control" name="can_company" value="AU Telecom" readonly />
											</div>
										</div>
									    <div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Position Title</label>
												<select class="form-control selectpicker form-control" placeholder="Select Store Name" data-live-search ="true"  readonly >
												<option value="" >Select the Following</option>
											   <option value="hrheadus" @if( $data->jobapplicant_postionapppliedform == "hrheadus") {{ "selected"}} @endif >Head of HR (US Operation)</option>
											   <option value="manhrus" @if( $data->jobapplicant_postionapppliedform == "manhrus") {{ "selected"}} @endif >Manager HR (US Operation)</option>
											   <option value="shapoidev" @if( $data->jobapplicant_postionapppliedform == "shapoidev") {{ "selected"}} @endif >Share Point Developer</option>
											   <option value="dotnetdev" @if( $data->jobapplicant_postionapppliedform == "dotnetdev") {{ "selected"}} @endif >Dot Net Developer</option>
											   <option value="axdyndev" @if( $data->jobapplicant_postionapppliedform == "axdyndev") {{ "selected"}} @endif >AX Dynamic Developer</option>
											   <option value="fiexe" @if( $data->jobapplicant_postionapppliedform == "fiexe") {{ "selected"}} @endif >Finance Executive</option>
											   <option value="fiaman" @if( $data->jobapplicant_postionapppliedform == "fiaman") {{ "selected"}} @endif >Finance Manager</option>
											   <option value="treamana" @if( $data->jobapplicant_postionapppliedform == "treamana") {{ "selected"}} @endif >Treasury Manager</option>
											   <option value="intaudmana" @if( $data->jobapplicant_postionapppliedform == "intaudmana") {{ "selected"}} @endif >Internal Audit Manager</option>
											   <option value="hrexe" @if( $data->jobapplicant_postionapppliedform == "hrexe") {{ "selected"}} @endif >HR Executive</option>
											   <option value="recurus" @if( $data->jobapplicant_postionapppliedform == "recurus") {{ "selected"}} @endif >Recruiter (US Operation)</option>
											   <option value="mainsup" @if( $data->jobapplicant_postionapppliedform == "mainsup") {{ "selected"}} @endif >Maintenance & Support Executive</option>
											   <option value="hedsur" @if( $data->jobapplicant_postionapppliedform == "hedsur") {{ "selected"}} @endif >Head of Surveillance </option>
											   <option value="hdofad" @if( $data->jobapplicant_postionapppliedform == "hdofad") {{ "selected"}} @endif >Head of Administration</option>
											   <option value="genecvsub" @if( $data->jobapplicant_postionapppliedform == "genecvsub") {{ "selected"}} @endif >General/ CV Submission</option>
												</select>
											</div>
										</div>
									   
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Department</label>
												<input type="text" class="form-control"  value="{{old('can_dept', @$data->dept_name ) }}" readonly  />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Sub Department</label>
												<input type="text" class="form-control"  value="{{old('can_dept', @$data->sd_name ) }}" readonly  />
											</div>
										</div>
									    <div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Reports to</label>
												<input type="text" class="form-control" name="can_report" value="{{old('can_report', @$data->can_evu_reportsto ) }}" readonly  />
											</div>
										</div>
									   
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Location</label>
												<input type="text" class="form-control" name="can_loc" value="{{old('can_loc', @$data->can_evu_location ) }}" readonly  />
											</div>
										</div>
									    <div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Job Grade</label>
												<input type="number" min="0" class="form-control" name="can_grade" value="{{old('can_grade', @$data->can_evu_grade ) }}" readonly  />
											</div>
										</div>
									    <div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Reference</label>
												<input type="text" class="form-control" name="can_ref" value="{{old('can_ref', @$data->jobapplicant_reference ) }}" readonly  />
											</div>
										</div>									   
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Job Type</label>
												<select class="select form-control" name="can_job_type"  readonly >
													<option value="" selected="" disabled="">Select Job Type</option>
													<option value="1" @if(old('can_job_type', @$data->can_evu_job_type == 1 )) {{ "selected" }} @endif >Permanent</option>
													<option value="2" @if(old('can_job_type', @$data->can_evu_job_type == 2 )) {{ "selected" }} @endif >Contract</option>
													<option value="3" @if(old('can_job_type', @$data->can_evu_job_type == 3 )) {{ "selected" }} @endif >Consultant</option>
													<option value="4" @if(old('can_job_type', @$data->can_evu_job_type == 4 )) {{ "selected" }} @endif >Trainee</option>
													<option value="5" @if(old('can_job_type', @$data->can_evu_job_type == 5 )) {{ "selected" }} @endif >Internee</option>
													<option value="6" @if(old('can_job_type', @$data->can_evu_job_type == 6 )) {{ "selected" }} @endif >MTO</option>
												</select>
											</div>
										</div>
									    <div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Relative in AU Telecom </label>
												<input type="text" class="form-control" name="can_relative" value="{{old('can_relative', @$data->can_evu_relativename ) }}" readonly />
											</div>
										</div>
									
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">JOB SUMMARY</label>
												<textarea rows="4" cols="5" class="form-control" name="can_job_summary" placeholder="Enter message" readonly >{{old('can_job_summary', @$data->can_evu_job_sum ) }}</textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Dependents</label>
												<input type="number" min="0" class="form-control" name="can_depends" value="{{old('can_relative', @$data->can_evu_depends ) }}" readonly />
											</div>
										</div>
									    <div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Expected Salary</label>
												<input type="number" min="0" class="form-control" value="{{old('can_relative', @$data->jobapplicant_monthlyexpectedsalary ) }}" readonly />
											</div>
										</div>
									    <div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Expected Benefit</label>
												<input type="text" class="form-control" name="can_exp_benefit" value="{{old('can_exp_benefit', @$data->jobapplicant_remarksofleave ) }}" readonly />
											</div>
										</div>
									
									</div>
									<div class="row">
									    <div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">BUDGETED in Business Plan</label>
												<div class="col-lg-9">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="can_BPN" value="Yes" value="option1" readonly checked @if(old('can_BPN', @$data->can_evu_budget == "Yes")) checked @endif />
														<label class="form-check-label" for="Yes">
														Yes
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="can_BPN" value="No" readonly @if(old('can_BPN', @$data->can_evu_budget == "No")) checked @endif />
														<label class="form-check-label" for="No">
														No
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header">	<h4 class="card-title mb-0 text-center">HR Department Assessment</h4></div>
								<div class="card-body">
									<p style="color:#f90202;">Filled by HR Department</p>
									<div class="table-responsive">
							            <table class="table table-bordered">
											<p class="tablep">Total Marks: Qualification=3  Professional Training=4  Computer Skill=5 <br> AVG Marks Obtained=3.13</p>
							                <thead>
							                  <tr>
							                    <th  style="white-space: nowrap;"></th>
							                    <th  style="white-space: nowrap;">Qualification</th>
							                    <th  style="white-space: nowrap;">Professional Training</th>
							                    <th  style="white-space: nowrap;">Computer Skill</th>
							                    <th  style="white-space: nowrap;">Obtained Marks</th>
							                  </tr>
							                  <tr>
							                  </tr>
							                </thead>
							                <tbody>
							                	<td>Academic</td>
							                	<td><select class="select form-control" name="can_hr_qua"  readonly >
													<option value="0"  @if(old('can_hr_qua', @$data->can_evu_hr_qua == 0 )) {{ "selected" }} @endif >Satisfactory</option>
													<option value="1"  @if(old('can_hr_qua', @$data->can_evu_hr_qua == 1 )) {{ "selected" }} @endif >1</option>
													<option value="2"  @if(old('can_hr_qua', @$data->can_evu_hr_qua == 2 )) {{ "selected" }} @endif >2</option>
													<option value="3"  @if(old('can_hr_qua', @$data->can_evu_hr_qua == 3 )) {{ "selected" }} @endif >3</option>
													<option value="4"  @if(old('can_hr_qua', @$data->can_evu_hr_qua == 4 )) {{ "selected" }} @endif >4</option>
													<option value="5"  @if(old('can_hr_qua', @$data->can_evu_hr_qua == 5 )) {{ "selected" }} @endif >5</option>
												</select></td>
							                	<td><select class="select form-control" name="can_hr_per_tra"  readonly >
													<option value="0" @if(old('can_hr_per_tra',@$data->can_evu_hr_per_tra == 0 )) {{ "selected" }} @endif >Satisfactory</option>
													<option value="1" @if(old('can_hr_per_tra',@$data->can_evu_hr_per_tra == 1 )) {{ "selected" }} @endif >1</option>
													<option value="2" @if(old('can_hr_per_tra',@$data->can_evu_hr_per_tra == 2 )) {{ "selected" }} @endif >2</option>
													<option value="3" @if(old('can_hr_per_tra',@$data->can_evu_hr_per_tra == 3 )) {{ "selected" }} @endif >3</option>
													<option value="4" @if(old('can_hr_per_tra',@$data->can_evu_hr_per_tra == 4 )) {{ "selected" }} @endif >4</option>
													<option value="5" @if(old('can_hr_per_tra',@$data->can_evu_hr_per_tra == 5 )) {{ "selected" }} @endif >5</option>
												</select></td>
							                	<td><select class="select form-control" name="can_hr_com_ski"  readonly >
													<option value="0" @if(old('can_hr_com_ski',@$data->can_evu_hr_com_ski == 0 )) {{ "selected" }} @endif >Satisfactory</option>
													<option value="1" @if(old('can_hr_com_ski',@$data->can_evu_hr_com_ski == 1 )) {{ "selected" }} @endif >1</option>
													<option value="2" @if(old('can_hr_com_ski',@$data->can_evu_hr_com_ski == 2 )) {{ "selected" }} @endif >2</option>
													<option value="3" @if(old('can_hr_com_ski',@$data->can_evu_hr_com_ski == 3 )) {{ "selected" }} @endif >3</option>
													<option value="4" @if(old('can_hr_com_ski',@$data->can_evu_hr_com_ski == 4 )) {{ "selected" }} @endif >4</option>
													<option value="5" @if(old('can_hr_com_ski',@$data->can_evu_hr_com_ski == 5 )) {{ "selected" }} @endif >5</option>
												</select></td>
												<td><input class="form-control required_colom" type="number"  name="can_hr_obtai" value="{{old('can_hr_obtai', @$data->can_evu_hr_obtain ) }}" readonly ></td>
							              	</tbody>
							            </table>
						            </div>
									<div class="table-responsive">
							            <table class="table table-bordered">
												<p class="tablep">Total Marks: Presentation=3  Communication-Verbal=2  Behaviour/Body Language=5  Manner=2  Reasoning=1 <br> AVG Marks Obtained=3.13</p>
							                <thead>
							                  <tr>
							                    <th  style="white-space: nowrap;"></th>
							                    <th  style="white-space: nowrap;">Presentation</th>
							                    <th  style="white-space: nowrap;">Communication - Verbal</th>
							                    <th  style="white-space: nowrap;">Behaviour / Body Language</th>
							                    <th  style="white-space: nowrap;">Manner</th>
							                    <th  style="white-space: nowrap;">Reasoning</th>
							                    <th  style="white-space: nowrap;">Obtained Marks</th>
							                  </tr>
							                  <tr>
							                  </tr>
							                </thead>
							                <tbody>
							                	<td>Personal</td>
							                	<td><select class="select form-control"   readonly >
													<option value="0" @if(old('can_hr_pre',@$data->can_evu_hr_pre == 0 )) {{ "selected" }} @endif >Satisfactory</option>
													<option value="1" @if(old('can_hr_pre',@$data->can_evu_hr_pre == 1 )) {{ "selected" }} @endif >1</option>
													<option value="2" @if(old('can_hr_pre',@$data->can_evu_hr_pre == 2 )) {{ "selected" }} @endif >2</option>
													<option value="3" @if(old('can_hr_pre',@$data->can_evu_hr_pre == 3 )) {{ "selected" }} @endif >3</option>
													<option value="4" @if(old('can_hr_pre',@$data->can_evu_hr_pre == 4 )) {{ "selected" }} @endif >4</option>
													<option value="5" @if(old('can_hr_pre',@$data->can_evu_hr_pre == 5 )) {{ "selected" }} @endif >5</option>
												</select></td>
							                	<td><select class="select form-control"   readonly >
													<option value="0" @if(old('can_hr_verbal_ski',@$data->can_evu_hr_ver_ski == 0 )) {{ "selected" }} @endif >Satisfactory</option>
													<option value="1" @if(old('can_hr_verbal_ski',@$data->can_evu_hr_ver_ski == 1 )) {{ "selected" }} @endif >1</option>
													<option value="2" @if(old('can_hr_verbal_ski',@$data->can_evu_hr_ver_ski == 2 )) {{ "selected" }} @endif >2</option>
													<option value="3" @if(old('can_hr_verbal_ski',@$data->can_evu_hr_ver_ski == 3 )) {{ "selected" }} @endif >3</option>
													<option value="4" @if(old('can_hr_verbal_ski',@$data->can_evu_hr_ver_ski == 4 )) {{ "selected" }} @endif >4</option>
													<option value="5" @if(old('can_hr_verbal_ski',@$data->can_evu_hr_ver_ski == 5 )) {{ "selected" }} @endif >5</option>
												</select></td>
							                	<td><select class="select form-control"  readonly >
													<option value="0" @if(old('can_hr_body',@$data->can_evu_hr_body == 0 )) {{ "selected" }} @endif >Satisfactory</option>
													<option value="1" @if(old('can_hr_body',@$data->can_evu_hr_body == 1 )) {{ "selected" }} @endif >1</option>
													<option value="2" @if(old('can_hr_body',@$data->can_evu_hr_body == 2 )) {{ "selected" }} @endif >2</option>
													<option value="3" @if(old('can_hr_body',@$data->can_evu_hr_body == 3 )) {{ "selected" }} @endif >3</option>
													<option value="4" @if(old('can_hr_body',@$data->can_evu_hr_body == 4 )) {{ "selected" }} @endif >4</option>
													<option value="5" @if(old('can_hr_body',@$data->can_evu_hr_body == 5 )) {{ "selected" }} @endif >5</option>
												</select></td>
							                	<td><select class="select form-control"   readonly >
													<option value="0" @if(old('can_hr_manner',@$data->can_evu_hr_manner == 0 )) {{ "selected" }} @endif >Satisfactory</option>
													<option value="1" @if(old('can_hr_manner',@$data->can_evu_hr_manner == 1 )) {{ "selected" }} @endif >1</option>
													<option value="2" @if(old('can_hr_manner',@$data->can_evu_hr_manner == 2 )) {{ "selected" }} @endif >2</option>
													<option value="3" @if(old('can_hr_manner',@$data->can_evu_hr_manner == 3 )) {{ "selected" }} @endif >3</option>
													<option value="4" @if(old('can_hr_manner',@$data->can_evu_hr_manner == 4 )) {{ "selected" }} @endif >4</option>
													<option value="5" @if(old('can_hr_manner',@$data->can_evu_hr_manner == 5 )) {{ "selected" }} @endif >5</option>
												</select></td>
							                	<td><select class="select form-control"   readonly >
													<option value="0" @if(old('can_hr_rea',@$data->can_evu_hr_reson == 0 )) {{ "selected" }} @endif >Satisfactory</option>
													<option value="1" @if(old('can_hr_rea',@$data->can_evu_hr_reson == 1 )) {{ "selected" }} @endif >1</option>
													<option value="2" @if(old('can_hr_rea',@$data->can_evu_hr_reson == 2 )) {{ "selected" }} @endif >2</option>
													<option value="3" @if(old('can_hr_rea',@$data->can_evu_hr_reson == 3 )) {{ "selected" }} @endif >3</option>
													<option value="4" @if(old('can_hr_rea',@$data->can_evu_hr_reson == 4 )) {{ "selected" }} @endif >4</option>
													<option value="5" @if(old('can_hr_rea',@$data->can_evu_hr_reson == 5 )) {{ "selected" }} @endif >5</option>
												</select></td>
												<td><input class="form-control required_colom" type="number"  min='0' name="can_hr_obtainedmarks" value="{{old('can_hr_obtainedmarks', @$data->can_evu_hr_obtain_mark ) }}" readonly  /></td>
							              	</tbody>
							            </table>
						            </div>	
									<div class="row">
									    <div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Interviewer Name</label>
												<input type="text" class="form-control"  value="{{old('can_hr_intname', @$data->can_evu_hr_int_name ) }}" readonly />
											</div>
										</div>
									    <div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Date</label>
												<input type="date" class="form-control" name="can_hr_intdate" value="{{old('can_hr_intdate', @$data->can_evu_hr_int_date ) }}" readonly />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">HR Comments</label>
												<textarea rows="2" cols="5" class="form-control" placeholder="Enter Your Comment" name="can_hr_commets" readonly >{{old('can_hr_commets', @$data->can_evu_hr_comments ) }}</textarea>
											</div>
										</div>
									</div>
									
								</div>
							</div>
							<div class="card">
								<div class="card-header">	<h4 class="card-title mb-0 text-center">Departmental Head Assessment</h4></div>
								<div class="card-body">
									<p style="color:#f90202;">Filled by Departmental Head</p>
									<div class="table-responsive">
							            <table class="table table-bordered">
												<p class="tablep">Total Marks: Job Relevancy=3 Experience=5 Knowledge of Industry=5 Career Progression=5  Notable Achievement=2 Potential=2 <br> AVG Marks Obtained=3.67</p>
							                <thead>
							                  <tr>
							                    <th  style="white-space: nowrap;"></th>
							                    <th  style="white-space: nowrap;">Job Relevancy</th>
							                    <th  style="white-space: nowrap;">Experience : Yrs Local Foreign</th>
							                    <th  style="white-space: nowrap;">Knowledge of Industry</th>
							                    <th  style="white-space: nowrap;">Career Progression</th>
							                    <th  style="white-space: nowrap;">Notable Achievement</th>
							                    <th  style="white-space: nowrap;">Potential</th>
							                    <th  style="white-space: nowrap;">Obtained Marks</th>
							                  </tr>
							                  <tr>
							                  </tr>
							                </thead>
							                <tbody>
							                	<td>Personal</td>
							                	<td><select class="select form-control"   readonly >
													<option value="0" @if(old('can_hod_job_rel',@$data->can_evu_hod_job_rel == 0 )) {{ "selected" }} @endif >Satisfactory</option>
													<option value="1" @if(old('can_hod_job_rel',@$data->can_evu_hod_job_rel == 1 )) {{ "selected" }} @endif >1</option>
													<option value="2" @if(old('can_hod_job_rel',@$data->can_evu_hod_job_rel == 2 )) {{ "selected" }} @endif >2</option>
													<option value="3" @if(old('can_hod_job_rel',@$data->can_evu_hod_job_rel == 3 )) {{ "selected" }} @endif >3</option>
													<option value="4" @if(old('can_hod_job_rel',@$data->can_evu_hod_job_rel == 4 )) {{ "selected" }} @endif >4</option>
													<option value="5" @if(old('can_hod_job_rel',@$data->can_evu_hod_job_rel == 5 )) {{ "selected" }} @endif >5</option>
												</select></td>
							                	<td><select class="select form-control"   readonly >
													<option value="0" @if(old('can_hod_exp',@$data->can_evu_hod_exp == 0 )) {{ "selected" }} @endif >Satisfactory</option>
													<option value="1" @if(old('can_hod_exp',@$data->can_evu_hod_exp == 1 )) {{ "selected" }} @endif >1</option>
													<option value="2" @if(old('can_hod_exp',@$data->can_evu_hod_exp == 2 )) {{ "selected" }} @endif >2</option>
													<option value="3" @if(old('can_hod_exp',@$data->can_evu_hod_exp == 3 )) {{ "selected" }} @endif >3</option>
													<option value="4" @if(old('can_hod_exp',@$data->can_evu_hod_exp == 4 )) {{ "selected" }} @endif >4</option>
													<option value="5" @if(old('can_hod_exp',@$data->can_evu_hod_exp == 5 )) {{ "selected" }} @endif >5</option>
												</select></td>
							                	<td><select class="select form-control"   readonly >
													<option value="0" @if(old('can_hod_know',@$data->can_evu_hod_know == 0 )) {{ "selected" }} @endif >Satisfactory</option>
													<option value="1" @if(old('can_hod_know',@$data->can_evu_hod_know == 1 )) {{ "selected" }} @endif >1</option>
													<option value="2" @if(old('can_hod_know',@$data->can_evu_hod_know == 2 )) {{ "selected" }} @endif >2</option>
													<option value="3" @if(old('can_hod_know',@$data->can_evu_hod_know == 3 )) {{ "selected" }} @endif >3</option>
													<option value="4" @if(old('can_hod_know',@$data->can_evu_hod_know == 4 )) {{ "selected" }} @endif >4</option>
													<option value="5" @if(old('can_hod_know',@$data->can_evu_hod_know == 5 )) {{ "selected" }} @endif >5</option>
												</select></td>
							                	<td><select class="select form-control"   readonly >
													<option value="0" @if(old('can_hod_carpro',@$data->can_evu_hod_carpro == 0 )) {{ "selected" }} @endif >Satisfactory</option>
													<option value="1" @if(old('can_hod_carpro',@$data->can_evu_hod_carpro == 1 )) {{ "selected" }} @endif >1</option>
													<option value="2" @if(old('can_hod_carpro',@$data->can_evu_hod_carpro == 2 )) {{ "selected" }} @endif >2</option>
													<option value="3" @if(old('can_hod_carpro',@$data->can_evu_hod_carpro == 3 )) {{ "selected" }} @endif >3</option>
													<option value="4" @if(old('can_hod_carpro',@$data->can_evu_hod_carpro == 4 )) {{ "selected" }} @endif >4</option>
													<option value="5" @if(old('can_hod_carpro',@$data->can_evu_hod_carpro == 5 )) {{ "selected" }} @endif >5</option>
												</select></td>
							                	<td><select class="select form-control"   readonly >
													<option value="0" @if(old('can_hod_noble',@$data->can_evu_hod_noble == 0 )) {{ "selected" }} @endif >Satisfactory</option>
													<option value="1" @if(old('can_hod_noble',@$data->can_evu_hod_noble == 1 )) {{ "selected" }} @endif >1</option>
													<option value="2" @if(old('can_hod_noble',@$data->can_evu_hod_noble == 2 )) {{ "selected" }} @endif >2</option>
													<option value="3" @if(old('can_hod_noble',@$data->can_evu_hod_noble == 3 )) {{ "selected" }} @endif >3</option>
													<option value="4" @if(old('can_hod_noble',@$data->can_evu_hod_noble == 4 )) {{ "selected" }} @endif >4</option>
													<option value="5" @if(old('can_hod_noble',@$data->can_evu_hod_noble == 5 )) {{ "selected" }} @endif >5</option>
												</select></td>
							                	<td><select class="select form-control"   readonly >
													<option value="0" @if(old('can_hod_pot',@$data->can_evu_hod_pot == 0 )) {{ "selected" }} @endif >Satisfactory</option>
													<option value="1" @if(old('can_hod_pot',@$data->can_evu_hod_pot == 1 )) {{ "selected" }} @endif >1</option>
													<option value="2" @if(old('can_hod_pot',@$data->can_evu_hod_pot == 2 )) {{ "selected" }} @endif >2</option>
													<option value="3" @if(old('can_hod_pot',@$data->can_evu_hod_pot == 3 )) {{ "selected" }} @endif >3</option>
													<option value="4" @if(old('can_hod_pot',@$data->can_evu_hod_pot == 4 )) {{ "selected" }} @endif >4</option>
													<option value="5" @if(old('can_hod_pot',@$data->can_evu_hod_pot == 5 )) {{ "selected" }} @endif >5</option>
												</select></td>
												<td><input class="form-control required_colom" type="number"  min='0' name="can_hod_obtain" value="{{old('can_hod_obtain', @$data->can_evu_hod_obtain ) }}" readonly /></td>
							              	</tbody>
							            </table>
						            </div>
						            <div class="table-responsive">
							            <table class="table table-bordered">
												<p class="tablep">Piont from 0 to 1.5 = Unsatisfactory, 1.6 to 2.5 = Average, 2.6 to 3.5 = Satisfactory, 3.6 to 4.5 = Good, 4.6 to 5 = Excellent</p>
							                <thead>
							                  <tr>
							                    <th  style="white-space: nowrap;"></th>
							                    <th  style="white-space: nowrap;">HR Department</th>
							                    <th  style="white-space: nowrap;">Departmental Head</th>
							                  </tr>
							                  <tr>
							                  </tr>
							                </thead>
							                <tbody>
							                	<td>Candidate Results</td>
							                	<td><input class="form-control required_colom" type="text" name="can_hr_cand" value="{{old('can_hr_cand', @$data->can_evu_hr_cand ) }}" readonly /></td>
							                	<td><input class="form-control required_colom" type="text" name="can_hod_cand" value="{{old('can_hod_obtain', @$data->can_evu_hod_cand ) }}" readonly /></td>
							              	</tbody>
							            </table>
						            </div>
								</div>
							</div>
							<div class="card">
								<div class="card-header">	<h4 class="card-title mb-0 text-center">Approval Authority</h4></div>
								<div class="card-body">
									<div class="row">
							            <div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Proposed Salary By Coo</label>
												<input type="number" min="0" class="form-control"  value="{{old('can_rec_sal', @$data->can_evu_rec_sal ) }}" readonly />
											</div>
										</div>
							            <div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Proposed Designation By COO</label>
												<input type="text" class="form-control"  value="{{old('can_pro_desg', @$data->can_evu_pro_desg ) }}" readonly />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Recommended Salary By HR</label>
												<input type="number" min="0" class="form-control"  value="{{old('can_rec_sal', @$data->can_evu_off_salary ) }}" readonly />
											</div>
										</div>
									</div>
									<div class="row">
							           
							            <div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Proposed Designation By HR</label>
												<input type="text" class="form-control"  value="{{old('can_pro_desg', @$data->can_evu_off_desg ) }}" readonly />
											</div>
										</div>
										 <div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Candidate Expected Salary</label>
												<input type="text" class="form-control"  value="{{old('can_relative', @$data->jobapplicant_monthlyexpectedsalary ) }}" readonly />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label"  >Approval</label>
												<select class="select form-control"   readonly >
													<option value=""  >Select Action</option>
													<option value="1" @if(old('can_approval',@$data->can_evu_approval == 1 )) {{ "selected" }} @endif >Approved</option>
													<option value="2" @if(old('can_approval',@$data->can_evu_approval == 2 )) {{ "selected" }} @endif >Rejected</option>
													<option value="3" @if(old('can_approval',@$data->can_evu_approval == 3 )) {{ "selected" }} @endif >MTO</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
							          
							            <div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Name</label>
												<input type="text" class="form-control"  value="{{old('can_app_name', @$data->can_evu_app_name ) }}" readonly />
											</div>
										</div>
							            <div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Date</label>
												<input type="date" class="form-control"  value="{{old('can_app_date', @$data->can_evu_app_date ) }}" readonly />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Meeting Date</label>
												<input type="date" class="form-control" name="can_meet_date" value="{{old('can_meet_date') }}" required/>
											</div>
										</div>
									</div>
									<div class="row">
										
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Salary After Probition Period</label>
												<input type="number" class="form-control" name="can_sal_afpro" value="{{old('can_sal_afpro', @$data->can_evu_sal_afpro ) }}"  />
											</div>
										</div>
						            <br>
									
									<div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label"  >Final Status</label>
												<select class="select form-control" name="can_finalstatus"  required >
													<option value=""  >Select Action</option>
													<option value="nothired" @if(old('can_finalstatus',@$data->jobapplicant_status == "nothired" )) {{ "selected" }} @endif >Not Hired </option>
													<option value="hired" @if(old('can_finalstatus',@$data->jobapplicant_status == "hired" )) {{ "selected" }} @endif >Hired</option>
													<option value="evaluateByManager" @if(old('can_finalstatus',@$data->jobapplicant_status == "evaluateByManager" )) {{ "selected" }} @endif >Back To COO</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
							            <div class="col-md-12">
											<div class="form-group">
												<label class="col-form-label">COO Remarks</label>
												<textarea rows="3" cols="5" class="form-control" placeholder="Enter message"  readonly >{{old('can_coo_remark', @$data->can_evu_coo_remark ) }}</textarea>
											</div>
										</div>
									</div>
									<div class="">
										<button type="submit" class="btn submitbtn">Submit</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>



									
            </div>
              <!-- <div class="text-center">
                <div class="credits"> -->
                  <!--
                    All the links in the footer should remain intact.
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
                  -->
                  <!-- Designed by <a href="http://www.level3bos.com/">Level3BOS</a>
                </div>
              </div> -->
            <!--main content end-->
			<!-- /Page Wrapper -->
        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/jquery-3.2.1.min.js"></script>

		<!-- Bootstrap Core JS -->
        <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/popper.min.js"></script>
        <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/bootstrap.min.js"></script>

		<!-- Slimscroll JS -->
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/jquery.slimscroll.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/select2.min.js"></script>
		
		<!-- Datatable JS -->
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/jquery.dataTables.min.js"></script>
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/dataTables.bootstrap4.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/moment.min.js"></script>
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/bootstrap-datetimepicker.min.js"></script>

		<!-- Mask JS -->
		<script type="text/javascript" src="{{ URL::asset('public/js/jquery.maskedinput.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/js/mask.js') }}"></script>


		<!-- <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/jquery.maskedinput.min.js"></script>
        <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/mask.js"></script> -->
        
		<!-- Custom JS -->
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/app.js"></script>


		<script type="text/javascript">
			$('#datetimepicker-default').datetimepicker();
    	</script>
		
    </body>

</html>