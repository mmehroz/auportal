<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords"
		content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="robots" content="noindex, nofollow">
	<title>PRE EMPLOYMENT APPLICATION FORM - HRMS</title>
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
						<h3 class="headerheading">PRE EMPLOYMENT APPLICATION FORM</h3>
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
		<div class="content container-fluid maincontainer">
			<div class="page-header">
				<div class="row">
					<div class="col">
						<!-- <h3 class="page-title"
							style="padding-top: 70px; font-size: 36px; font-weight: 900; text-align: center;">Bizz World
							Communication</h3> -->

						@if(session('message'))
						<div class="alert alert-success">
							<h4>{!!session('message')!!}</h4>
						</div>

						@endif

						@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
								<div>
									<h4>
										<li>{{ $error }}</li>
									</h4>
								</div>
								@endforeach
							</ul>
						</div>
						@endif
					</div>
				</div>
			</div>
			<form action="{{ URL::to('/submitjobapplicant')}}" method="POST" class="form-horizontal"
				enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="jobpost_token" value="{{$data->jobpost_token}}"/>
				<div class="row">
					<div class="col-md-12">
						<div class="card flex-fill">
							<div class="card-header">
								<h4 class="card-title mb-0">Initial Information</h4>
							</div>
							<div class="card-body" >
							
								<div class="row">
								
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Position Applied For.*</label>
											<!-- <input type="text" class="form-control" 
												name="can_postionapppliedform"
												value="{{old('can_postionapppliedform')  }}" /> -->
											<select class="form-control selectpicker form-control" readonly required placeholder="Select Store Name" data-live-search ="true" id name="can_postionapppliedform"   >
												<option value="{{$data->jobpost_title}}" selected  >{{$data->jobpost_title}}</option>
											</select> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Career Level.</label>
											<select class="form-control selectpicker form-control"
												placeholder="Select Store Name" data-live-search="true" name="carlev"
												>
												<option value="">Select the Following</option>
												<option value="stusclcol">Student (School/College)</option>
												<option value="undgra">Student (Undergrad./Grad.)</option>
												<option value="entlev">Entry Level</option>
												<option value="expnomana">Experienced (Non-Managerial)</option>
												<option value="manasup">Manager/Supervisor</option>
												<option value="hod">Head of Department</option>
												<option value="srexe">Sr. Executive (CEO/President)</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Period Required For Joining.</label>
											<select class="form-control selectpicker form-control"
												placeholder="Select Store Name" data-live-search="true" id="storeId"
												name="can_periodjoining" >
												<option value="">Select the Following</option>
												<option value="imme">Immediate</option>
												<option value="twodays">Two Days</option>
												<option value="threedays">Three Days</option>
												<option value="fourday">Four Days</option>
												<option value="fiveday">Five Days</option>
												<option value="sixday">Six Days</option>
												<option value="oneweek">One Week</option>
												<option value="twoweek">Two Weeks</option>
												<option value="threeweek">Three Weeks</option>
												<option value="onemon">One Month</option>
												<option value="onehalf">One & Half Month</option>
												<option value="twomon">Two Months</option>
											</select>
										</div>
									</div>
								
									
								</div>
								<div class="row mt-1">
									
									
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Current Salary RS.*</label>
											<input type="number" min='1' required  class="form-control"
												name="can_currentsalary" value="{{old('can_currentsalary')  }}"
												 />
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Monthly Expected Salary RS.*</label>
											<input type="number" min='1' required class="form-control"
												name="can_monthlyexpectedsalary"
												value="{{old('can_monthlyexpectedsalary')  }}"  />
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Reason To Left Last Job.</label>
											<input type="text" class="form-control" name="can_reasonofleave"
												value="{{old('can_reasonofleave')  }}"  />
										</div>
									</div>
									
								</div>
								<div class="row mt-1">
							
								
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Current Benefits.</label>
											<input type="text" class="form-control" name="can_remarksofleave"
												value="{{old('can_remarksofleave')  }}"  />
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class=" col-form-label">Comfortable / Agreed for Night
												Shift?</label>
											<div class="col-lg-9">
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio" name="can_nightshift"
														id="Yes" value="Yes" checked=""  />
													<label class="form-check-label" for="Yes">
														Yes
													</label>
												</div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio" name="can_nightshift"
														id="No" value="No"  />
													<label class="form-check-label" for="No">
														No
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class=" col-form-label">Communication Skills.</label>
											<div class="col-lg-12">
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio"
														name="can_communicationskills" id="Poor" value="Poor"
														 />
													<label class="form-check-label" for="Poor">
														Poor
													</label>
												</div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio"
														name="can_communicationskills" id="Average" value="Average"
														 />
													<label class="form-check-label" for="Average">
														Average
													</label>
												</div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio"
														name="can_communicationskills" id="Above Average"
														value="Above_Average"  />
													<label class="form-check-label" for="Above Average">
														Above Average
													</label>
												</div>
												<br>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio"
														name="can_communicationskills" id="Good" value="Good"
														 />
													<label class="form-check-label" for="Good">
														Good
													</label>
												</div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio"
														name="can_communicationskills" id="V.Good" value="V_Good"
														 />
													<label class="form-check-label" for="V.Good">
														V.Good
													</label>
												</div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio"
														name="can_communicationskills" id="Excellent" value="Excellent"
														 />
													<label class="form-check-label" for="Excellent">
														Excellent
													</label>
												</div>
											</div>
										</div>
									</div>
								
								</div>
								<div class="row mt-1">
									
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Salary Negotiable?</label>
											<div class="col-lg-9">
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio"
														name="can_negotiablesalary" id="Negotiable" value="Negotiable"
														checked=""  />
													<label class="form-check-label" for="Negotiable">
														Yes
													</label>
												</div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio"
														name="can_negotiablesalary" id="Not Negotiable"
														value="NotNegotiable"  />
													<label class="form-check-label" for="Not Negotiable">
														No
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Photograph(if available)</label>
											<input type="file" name="input" accept=".jpg, .jpeg, .png"
												class="form-control" />
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Drop Your CV.</label>
											<input type="file" accept=".doc,.pdf" class="form-control" name="input1">
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<div class="card mb-0">
							<div class="card-header">
								<h4 class="card-title mb-0">Educational Record</h4>
							</div>
							<div class="card-body">
								<div id="msg5">
									<p class="msg4 alert"></p>
								</div>
								<div class="row pb-5">
									<div class="col-lg-8 col-9">
										<p class="tablep">EDUCATIONAL / PROFESSIONAL QUALIFICATIONS: (LIST THE LAST ONE FIRST)</p>
									</div>
									<div class="col-lg-4 col-3 text-right">
										<button type="button" onclick="addedudetails()" class="btn mybtn">+ Add
											</button>
									</div>
								</div>
							
								<div class="table-responsive">
									<table class="table table-bordered" id="preempform">
										<thead>
											
											<tr>
												<th style="white-space: nowrap;">S.NO.</th>
												<th style="white-space: nowrap;">CERTIFICATE/DEGREE</th>
												<th style="white-space: nowrap;">Year</th>
												<th style="white-space: nowrap;">REGULAR/ PRIVATE</th>
												<th style="white-space: nowrap;">MAJOR SUBJECTS</th>
												<th style="white-space: nowrap;">DIVISION/GRADE</th>
												<th style="white-space: nowrap;">NAME OF INSTITUTION</th>
												<th>Action</th>
											</tr>
											<tr>
											</tr>
										</thead>
										<tbody>

											<?php $cnt=1; ?>


											<tr>
												<td><input type='number' step='any' class='form-control required_colom'
														 placeholder='' value="{{$cnt}}" readonly />
												</td>
												<td><input type='text' step='any' name='can_edu_cerdeg[]'
														class='form-control required_colom'></td>
												<td><input type='text' step='any' name='can_edu_year[]'
														id="can_edu_year" class='form-control required_colom datepick'
														placeholder="year"></td>
												<td><input type='text' step='any' name='can_edu_regpri[]'
														class='form-control required_colom address'>
												</td>
												<td><input type='text' step='any' name='can_edu_majsub[]'
														class='form-control required_colom'></td>
												<td><input type='text' step='any' name='can_edu_divgra[]'
														class='form-control required_colom'></td>
												<td><textarea name='can_edu_institute[]' class='form-control'
														></textarea></td>
												<td>
													@if($cnt != 1)
													<button onclick="removeRow(1)" type='button'
														class='btn btn-danger remove'>remove</button>
													@endif
											</tr>



										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<div class="card mb-0">
							<div class="card-header">
								<h4 class="card-title mb-0">Employment Record</h4>
							</div>
							<div class="card-body">
								<div id="msg5">
									<p class="msg4 alert"></p>
								</div>
								<div class="row pb-5">
									<div class="col-lg-8 col-9">
										<p class="tablep">(LIST THE LAST ONE FIRST)</p>
									</div>
									<div class="col-lg-4 col-3 text-right">
										<button type="button" onclick="addempdetails()" class="btn mybtn">+ Add
										</button>
									</div>
								</div>
								<div class="table-responsive">
									<table class="table table-bordered" id="preempformj">
										<thead>
											
											<tr>
												<th style="white-space: nowrap;">S.NO.</th>
												<th style="white-space: nowrap;">NAME OF ORGANIZATION</th>
												<th style="white-space: nowrap;">PERIOD FROM</th>
												<th style="white-space: nowrap;">PERIOD TO</th>
												<th style="white-space: nowrap;">POSITION START</th>
												<th style="white-space: nowrap;">POSITION LAST</th>
												<th style="white-space: nowrap;">GROSS SALARY START</th>
												<th style="white-space: nowrap;">GROSS SALARY LAST</th>
												<th style="white-space: nowrap;">REASON(S) FOR LEAVING</th>
												<th>Action</th>
											</tr>
											<tr>
											</tr>
										</thead>
										<tbody>

											<tr>
												<td><input type='number' step='any' class='form-control required_colom'
														 placeholder='' value="{{$cnt}}" readonly />
												</td>
												<td><input type='text' step='any' name='can_empreport_org[]'
														class='form-control required_colom'  /></td>
												<td><input type='text' step='any' name='can_empreport_perfrom[]'
														id='can_empreport_perfrom'
														class='form-control required_colom datepicker'
														placeholder="year"  /></td>
												<td><input type='text' step='any' name='can_empreport_perto[]'
														id='can_empreport_perto'
														class='form-control required_colom datepicker'
														placeholder="year"  /></td>
												<td><input type='text' step='any' name='can_empreport_posstart[]'
														class='form-control required_colom'  /></td>
												<td><input type='text' step='any' name='can_empreport_last[]'
														class='form-control required_colom'  /></td>
												<td><input type='number' step='any'
														name='can_empreport_grossalarystart[]'
														class='form-control required_colom'  /></td>
												<td><input type='number' step='any'
														name='can_empreport_grossalarylast[]'
														class='form-control required_colom'  /></td>
												<td><textarea name='can_empreport_reasoleave[]' class='form-control'
														></textarea></td>
												@if($cnt != 1)
												<td><button type='button' class='btn btn-danger remove'>remove</button>
												</td>
												@endif
											</tr>



										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<div class="card flex-fill">
							<div class="card-header">
								<h4 class="card-title mb-0">Personal Details</h4>
							</div>
							<div class="card-body" >
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Name.*</label>
											<input type="text" class="form-control" required name="can_name"
												value="{{old('can_name')  }}" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Father/Husband Name</label>
											<input type="text" class="form-control" name="can_fathername"
												value="{{old('can_fathername')  }}" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Gender.</label>
											<select class="form-control selectpicker form-control"
												placeholder="Select Store Name" data-live-search="true" id="storeId"
												name="can_gender" >
												<option value="">Select the Following</option>
												<option value="female">Female</option>
												<option value="male">Male</option>
												<option value="other">Other</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">ADDRESS (Permanent).</label>
											<input type="text" class="form-control" name="can_address"
												value="{{old('can_address')  }}" >
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">ADDRESS (Temporary)</label>
											<input type="text" class="form-control" name="can_addresstemporaray"
												value="{{old('can_addresstemporaray')  }}">
										</div>
									</div>
								</div>
								<div class="row mt-1">
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Mobile</label>
											<input type="tel" class="form-control" minlength="11" maxlength="11" min="0"
												name="can_mobileno" value="{{old('can_mobileno') }}" placeholder="e.g(03001234567)" >
											
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Res/Office</label>
											<input type="tel" class="form-control" minlength="11" maxlength="11" min="0"
												name="can_officeno" value="{{old('can_officeno') }}" placeholder="e.g(02131234567)" >
											
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Date of Birth.</label>
											<input class="form-control " type="date" name="can_dob"
												value="{{old('can_dob') }}" >
										</div>
									</div>
									
								</div>
								<div class="row mt-1">
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Age</label>
											<input class="form-control" type="tel" minlength="2" maxlength="2" min="0"
												name="can_age" value="{{old('can_age' ) }}" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Place of Birth</label>
											<input class="form-control " type="text" name="can_placeob"
												value="{{old('can_placeob') }}" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">N.I.C NO.</label>
											<input class="form-control " type="tel" maxlength="13" minlength="13"
												min="0" name="can_nic" value="{{old('can_nic') }}" placeholder="e.g(4210112345671)" >
											
										</div>
									</div>
								
								</div>
								<div class="row mt-1">
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Email</label>
											<input class="form-control " type="email" name="can_email" required
												
												>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Reference</label>
											<input type="text" class="form-control" name="can_reference"
												value="{{old('can_reference') }}" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Nationality</label>
											<input class="form-control" type="text" name="can_nationality"
												value="{{old('can_nationality') }}" >
										</div>
									</div>
									
								</div>
								<div class="row mt-1">
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Religion</label>
											<input class="form-control" type="text" name="can_religion"
												value="{{old('can_religion')  }}" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Martial Status</label>
											<input class="form-control" type="text" name="can_martialstatus"
												value="{{old('can_martialstatus') }}" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Occupation</label>
											<input type="text" class="form-control" name="can_occupation"
												value="{{old('can_occupation') }}" >
										</div>
									</div>
								</div>
								<div class="row mt-1">
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">Social Media Links</label>
											<input type="text" class="form-control" name="socialmedialinks"
												value="{{old('jobapplicant_socialmedialinks') }}" >
										</div>
									</div>
								</div>
								<div>
									<button type="submit" class="btn submitbtn"
										>Submit</button>
								</div>
			</form>
		</div>
	</div>
</div>
</div>
</div>

	<br>
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

	<!-- Custom JS -->
	<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/app.js"></script>

	<!-- for add rows -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

	<script type="text/javascript">
		$(".datepick").datepicker({
			format: " yyyy", // Notice the Extra space at the beginning
			viewMode: "years",
			minViewMode: "years"
		});
		$(".datepicker").datepicker({
			format: " yyyy", // Notice the Extra space at the beginning
			viewMode: "years",
			minViewMode: "years"
		});
		function addedudetails() {
			var table = document.getElementById("preempform");
			var rowCount = $('#preempform tr').length;
			var row = table.insertRow(rowCount);
			// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
			var hotelLocationId = "HotelLocation" + rowCount;


			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
			var cell5 = row.insertCell(4);
			var cell6 = row.insertCell(5);
			var cell7 = row.insertCell(6);
			var cell8 = row.insertCell(7);

			var jaja = 1;
			var pappu = rowCount;
			var jhama = pappu - jaja;

			console.log(jhama);

			cell1.innerHTML = "<input type='number' step='any'  class='form-control required_colom' required='required' placeholder='' value=" + jhama + " readonly />";
			cell2.innerHTML = "<input type='text' step='any' name='can_edu_cerdeg[]'    class='form-control required_colom' required='required' />";
			cell3.innerHTML = "<input type='text' step='any' name='can_edu_year[]' id='can_edu_year'  class='form-control required_colom datepick' required='required' placeholder='year' />";
			cell4.innerHTML = "<input type='text' step='any' name='can_edu_regpri[]'   class='form-control required_colom address' required='required' />";
			cell5.innerHTML = "<input type='text' step='any' name='can_edu_majsub[]'     class='form-control required_colom' required='required' />";
			cell6.innerHTML = "<input type='text' step='any' name='can_edu_divgra[]'     class='form-control required_colom' required='required' />";
			cell7.innerHTML = "<textarea name='can_edu_institute[]'    class='form-control'></textarea>";
			$("#can_edu_year").each(function () {
				$(".datepick").datepicker({
					format: " yyyy", // Notice the Extra space at the beginning
					viewMode: "years",
					minViewMode: "years"
				});
			});
			if (jhama == 1) {
				cell8.innerHTML = "<button  type='button' class='btn btn-danger ' >remove</button>";
			} else {
				cell8.innerHTML = "<button  type='button' class='btn btn-danger remove' >remove</button>";
			}

		}

		function addempdetails() {
			var table = document.getElementById("preempformj");
			var rowCount = $('#preempformj tr').length;
			var row = table.insertRow(rowCount);
			// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
			var hotelLocationId = "HotelLocation" + rowCount;

			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
			var cell5 = row.insertCell(4);
			var cell6 = row.insertCell(5);
			var cell7 = row.insertCell(6);
			var cell8 = row.insertCell(7);
			var cell9 = row.insertCell(8);
			var cell10 = row.insertCell(9);

			var jaja = 1;
			var pappu = rowCount;
			var jhama = pappu - jaja;

			cell1.innerHTML = "<input type='number' step='any'  class='form-control required_colom' required='required' placeholder='' value=" + jhama + " readonly />";
			cell2.innerHTML = "<input type='text' step='any' name='can_empreport_org[]'  class='form-control required_colom' required='required' />";
			cell3.innerHTML = "<input type='text' step='any' name='can_empreport_perfrom[]' id='can_empreport_perfrom'   class='form-control required_colom datepicker' placeholder='year' required='required' />";
			cell4.innerHTML = "<input type='text'  step='any' name='can_empreport_perto[]' id='can_empreport_perto'   class='form-control required_colom datepicker' placeholder='year' required='required' />";
			cell5.innerHTML = "<input type='text' step='any' name='can_empreport_posstart[]'  class='form-control required_colom' required='required' />";
			cell6.innerHTML = "<input type='text' step='any' name='can_empreport_last[]'  class='form-control required_colom' required='required' />";
			cell7.innerHTML = "<input type='number' step='any' name='can_empreport_grossalarystart[]'  class='form-control required_colom' required='required' />";
			cell8.innerHTML = "<input type='number' step='any' name='can_empreport_grossalarylast[]'  class='form-control required_colom' required='required' />";
			cell9.innerHTML = "<textarea name='can_empreport_reasoleave[]'  class='form-control'></textarea>";
			$("#can_empreport_perfrom").each(function () {
				$(".datepicker").datepicker({
					format: " yyyy", // Notice the Extra space at the beginning
					viewMode: "years",
					minViewMode: "years"
				});
			});
			$("#can_empreport_perto").each(function () {
				$(".datepicker").datepicker({
					format: " yyyy", // Notice the Extra space at the beginning
					viewMode: "years",
					minViewMode: "years"
				});
			});
			if (jhama == 1) {
				cell10.innerHTML = "<button  type='button' class='btn btn-danger ' >remove</button>";
			} else {
				cell10.innerHTML = "<button  type='button' class='btn btn-danger remove' >remove</button>";
			}

		}

		$('#preempform').on('click', '.remove', function (e) {
			$(this).closest('tr').remove();
		})

		$('#preempformj').on('click', '.remove', function (e) {
			$(this).closest('tr').remove();
		})


		function getedit($id) {

			$.get('{{ URL::to("/subdept")}}/' + $id, function (data) {

				$('#p').empty().append(data);

			});

		}

	</script>

	<!-- for add rows -->
	<!--	<script>
		$(".datepick").datepicker( {
				format: " yyyy", // Notice the Extra space at the beginning
				viewMode: "years", 
				minViewMode: "years"
			});	
			$('.datepick').change(function(){
     var val = $(this).val();
    $('#changeyear').text(val);
});
		</script>
		-->
		<footer class="text-center mt-3" style="background:#5069e7 !important">
		© Copyright <?php echo date('Y')?> Arc-Inventador. All rights reserved  
	</footer>
</body>

</html>