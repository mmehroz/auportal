<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="robots" content="noindex, nofollow">
        <title>PRE EMPLOYMENT APPLICATION FORM - HRMS</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{!! asset('public/assets/img/favicon.png') !!}">
		
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
		
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		<style>
		
		.form-control{
			
			padding-top: 0.00001px;
			padding-bottom: 0.00001px;
			font-size: 12px;
			height: 30px;
			color:black;
		}
		
		.row{
			padding-top : 1px;
			padding-bottom:1px;
		}
		
		.card-body{
			padding-bottom:1px;
			padding-top:1px;
		}
		
		</style>
		
    </head>
    <body>	
		<!-- Main Wrapper -->
        <div class="main-wrapper">		
			<!-- Header -->
            <div class="header">			
				<!-- Logo -->
                <div class="header-left">
                    <a href="#"class="logo">
						<img src="{!! asset('public/assets/img/final-logo.png') !!}" width="120" height="60" alt="">
					</a>
                </div>
				<!-- /Logo -->				
				<!-- Header Title -->
                <div class="page-title-box float-left">
					<h3>Human Resource Management</h3>
                </div>
				<!-- /Header Title -->				
				<!-- Header Menu -->
				<ul class="nav user-menu">				
					<!-- Search -->					
					<!-- /Search -->				
					<!-- Flag -->					
					<!-- /Flag -->					
					<li class="nav-item">
						<a class="nav-link" href="#">Logout</a>
					</li>
				</ul>
				<!-- /Header Menu -->
				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="#">Logout</a>
					</div>
				</div>
				<!-- /Mobile Menu -->				
            </div>
			<!-- /Header -->

		
			
            <div class="content container-fluid">
            	<div class="page-header" style=" margin-bottom:0.01px;">
					<div class="row">
						<div class="col">
							<h3 class="page-title" style="padding-top: 80px; font-size: 28px; font-weight: 800; text-align: center; ">AU Telecom</h3>
							
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
				<br>
				
				<div class="row">
					<div class="col-md-12">
						<div class="card flex-fill" style="margin-bottom:1px; margin-top:1px;">
							<div class="card-header">
								<h3 class="card-title  text-center" style="margin-bottom:1px; padding-bottom:0px;">PRE-EMPLOYMENT APPLICATION FORM</h3>
							</div>
						</div>
					</div>
				</div>
							
				<form action="{{ URL::to('/submitjobapplicant')}}" method="POST" class="form-horizontal"enctype="multipart/form-data">
				@csrf
							
							
		<div class="page-menu">
			<div class="row">
				<div class="col-md-12">
					<ul class="nav nav-tabs nav-tabs-bottom">
						<li class="nav-item col-md-4">
							<a class="nav-link active" data-toggle="tab" href="#candidates_ist"><center>CAREER RECORD</center></a>
						</li>
						<li class="nav-item col-md-4">
							<a class="nav-link" data-toggle="tab" href="#screening_list"><center>EDUCATION AND EMPLOYEEMENT RECORD</center></a>
						</li>
						<li class="nav-item col-md-4">
							<a class="nav-link" data-toggle="tab" href="#irexperience_list"><center>PERSONAL RECORD</center></a>
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
					
						<div class="card-header">
								<h4 class="card-title mb-0">CAREER RECORD</h4>
							</div>
					
						<div class="card-body"  >
								<div class="row"  >
									<input type="hidden" name="can_log_id" value="{{ $data['userdata']->log_id }}" />
									<div class="col-md-3">
										<div class="form-group">
											<label class="col-form-label">Position Applied For.*</label>
											<select class="form-control selectpicker form-control" placeholder="Select Store Name" data-live-search ="true" id name="can_postionapppliedform"  required >
												<option value="" >Select the Following</option>
											   <option value="hrheadus"  >Head of HR (US Operation)</option>
											   <option value="manhrus" >Manager HR (US Operation)</option>
											   <option value="shapoidev"  >Share Point Developer</option>
											   <option value="dotnetdev"  >Dot Net Developer</option>
											   <option value="axdyndev"  >AX Dynamic Developer</option>
											   <option value="fiexe"  >Finance Executive</option>
											   <option value="fiaman" >Finance Manager</option>
											   <option value="treamana"  >Treasury Manager</option>
											   <option value="intaudmana"  >Internal Audit Manager</option>
											   <option value="hrexe"  >HR Executive</option>
											   <option value="recurus"  >Recruiter (US Operation)</option>
											   <option value="mainsup"  >Maintenance & Support Executive</option>
											   <option value="hedsur" >Head of Surveillance </option>
											   <option value="hdofad" >Head of Administration</option>
											   <option value="genecvsub"  >General/ CV Submission</option>
											   <option value="ushrpayspea"  >US HR Payroll Specialist</option>
											</select> 
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="col-form-label">Career Level.*</label>
											<select class="form-control selectpicker form-control" placeholder="Select Store Name" data-live-search ="true"  name="carlev"  required >
											   <option value="" >Select the Following</option>
											   <option value="stusclcol" >Student (School/College)</option>
											   <option value="undgra" >Student (Undergrad./Grad.)</option>
											   <option value="entlev" >Entry Level</option>
											   <option value="expnomana"  >Experienced (Non-Managerial)</option>
											   <option value="manasup" >Manager/Supervisor</option>
											   <option value="hod"  >Head of Department</option>
											   <option value="srexe"  >Sr. Executive (CEO/President)</option>
											</select> 
										</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-group">
											<label class="col-form-label">Department.*</label>
											<select class="form-control selectpicker form-control" onChange="getedit(this.value);" placeholder="Select Store Name" data-live-search ="true"  name="deptname"  >
											<option value="" >Select the Following</option>
											@foreach($data['department'] as $val) 
												   <option value="{{ $val->dept_id }} "  >{{ $val->dept_name }}</option>
											@endforeach
											
											   <!--<option value="f&i" @{{---if( $data['userdata']->jobapplicant_sub_department == "f&i") {{ "selected"}} @endif >Finance & Accounts</option>
											   <option value="hrm" @if( $data['userdata']->jobapplicant_sub_department == "hrm") {{ "selected"}} @endif >Human Resources Management</option>
											   <option value="admin" @if( $data['userdata']->jobapplicant_sub_department == "admin") {{ "selected"}} @endif >Administration</option>
											   <option value="surv" @if( $data['userdata']->jobapplicant_sub_department == "surv") {{ "selected"}} @endif >Surveillance</option>
											   <option value="mis" @if( $data['userdata']->jobapplicant_sub_department == "mis") {{ "selected"}} @endif >MIS</option>
											   <option value="m&s" @if( $data['userdata']->jobapplicant_sub_department == "m&s") {{ "selected"}} @endif >Maintenance & Support</option>
											   <option value="opr" @if( $data['userdata']->jobapplicant_sub_department == "opr") {{ "selected"}} @endif >Operations</option>
											   <option value="scm" @if( $data['userdata']->jobapplicant_sub_department == "scm") {{ "selected"}} @endif >Supply Chain Management</option>
											   <option value="web" @if( $data['userdata']->jobapplicant_sub_department == "web") {{ "selected"}} @endif >Web Development </option>
											   <option value="it" @if( $data['userdata']->jobapplicant_sub_department == "it") {{ "selected"}} @endif >Information Technology </option>
											   <option value="sales" @if( $data['userdata']->jobapplicant_sub_department == "sales") {{ "selected"}} @endif >Sales </option>
											   <option value="intaud" @if( $data['userdata']->jobapplicant_sub_department == "intaud") {{ "selected"}} @endif >Internal Audit</option>
											   <option value="mark" @if( $data['userdata']->jobapplicant_sub_department == "mark") {{ "selected"}} @endif >Marketing</option>
											   <option value="legal" @if( $data['userdata']->jobapplicant_sub_department == "legal") {{ "selected"}} @endif >Legal</option>
											   <option value="qc" @if( $data['userdata']->jobapplicant_sub_department == "qc") {{ "selected"}} @endif >Quality Control</option>
											   <option value="bd" @if( $data['userdata']->jobapplicant_sub_department == "bd") {{ "selected"}} @endif >Business Development</option>
											   <option value="r&d" @if( $data['userdata']->jobapplicant_sub_department == "r&d") {{ "selected"}} @endif---}} >Research & Development</option>--->
											</select> 
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<div class='form-group' id="p">

											</div>
										
											<!--<label class="col-form-label">Sub Department.*</label>
											<select class="form-control selectpicker form-control" placeholder="Select Store Name" data-live-search ="true"  name="deptname"  required >
											
											
											  <option value="" >Select the Following</option>
											   <option value="tax" @{{---if( $data['userdata']->jobapplicant_department == "tax") {{ "selected"}} @endif >Taxation</option>
											   <option value="pay" @if( $data['userdata']->jobapplicant_department == "pay") {{ "selected"}} @endif >Payable </option>
											   <option value="receive" @if( $data['userdata']->jobapplicant_department == "receive") {{ "selected"}} @endif >Receivable</option>
											   <option value="treasure" @if( $data['userdata']->jobapplicant_department == "treasure") {{ "selected"}} @endif >Treasury</option>
											   <option value="ficialrep" @if( $data['userdata']->jobapplicant_department == "ficialrep") {{ "selected"}} @endif >Financial Reporting</option>
											   <option value="fiana" @if( $data['userdata']->jobapplicant_department == "fiana") {{ "selected"}} @endif >Finance Analyst</option>
											   <option value="impexp" @if( $data['userdata']->jobapplicant_department == "impexp") {{ "selected"}} @endif >Export & Import</option>
											   <option value="proper" @if( $data['userdata']->jobapplicant_department == "proper") {{ "selected"}} @endif >Property</option>
											   <option value="rec&sel" @if( $data['userdata']->jobapplicant_department == "rec&sel") {{ "selected"}} @endif >Recruitment & Selection</option>
											   <option value="compbene" @if( $data['userdata']->jobapplicant_department == "compbene") {{ "selected"}} @endif >Compensation & Benefit</option>
											   <option value="tra&dev" @if( $data['userdata']->jobapplicant_department == "tra&dev") {{ "selected"}} @endif >Training & Development</option>
											   <option value="orgdev" @if( $data['userdata']->jobapplicant_department == "orgdev") {{ "selected"}} @endif >Organizational Development</option>
											   <option value="payman" @if( $data['userdata']->jobapplicant_department == "payman") {{ "selected"}} @endif >Payroll Management</option>
											   <option value="hrop" @if( $data['userdata']->jobapplicant_department == "hrop") {{ "selected"}} @endif >HR Operations</option>
											   <option value="secur" @if( $data['userdata']->jobapplicant_department == "secur") {{ "selected"}} @endif >Security</option>
											   <option value="geneadm" @if( $data['userdata']->jobapplicant_department == "geneadm") {{ "selected"}} @endif >General Administration</option>
											   <option value="ofcadm" @if( $data['userdata']->jobapplicant_department == "ofcadm") {{ "selected"}} @endif >Office Administration</option>
											   <option value="cctvop" @if( $data['userdata']->jobapplicant_department == "cctvop") {{ "selected"}} @endif >CCTV Operations</option>
											   <option value="cctvtech" @if( $data['userdata']->jobapplicant_department == "cctvtech") {{ "selected"}} @endif >CCTV Technicians</option>
											   <option value="inve" @if( $data['userdata']->jobapplicant_department == "inve") {{ "selected"}} @endif >Investigation</option>
											   <option value="dotnet" @if( $data['userdata']->jobapplicant_department == "dotnet") {{ "selected"}} @endif >DOT Net</option>
											   <option value="pyt" @if( $data['userdata']->jobapplicant_department == "pyt") {{ "selected"}} @endif >Python</option>
											   <option value="axdy" @if( $data['userdata']->jobapplicant_department == "axdy") {{ "selected"}} @endif >AX Dynamics</option>
											   <option value="share" @if( $data['userdata']->jobapplicant_department == "share") {{ "selected"}} @endif >Sharepoint</option>
											   <option value="sofeng" @if( $data['userdata']->jobapplicant_department == "sofeng") {{ "selected"}} @endif >Software Engineering</option>
											   <option value="ofcmaint" @if( $data['userdata']->jobapplicant_department == "ofcmaint") {{ "selected"}} @endif >Office Maintenance</option>
											   <option value="genmain" @if( $data['userdata']->jobapplicant_department == "genmain") {{ "selected"}} @endif >General Maintenance</option>
											   <option value="supser" @if( $data['userdata']->jobapplicant_department == "supser") {{ "selected"}} @endif >Support & Services</option>
											   <option value="genopera" @if( $data['userdata']->jobapplicant_department == "genopera") {{ "selected"}} @endif >General Operations</option>
											   <option value="genesupchan" @if( $data['userdata']->jobapplicant_department == "genesupchan") {{ "selected"}} @endif >General Supply Chain</option>
											   <option value="logis" @if( $data['userdata']->jobapplicant_department == "logis") {{ "selected"}} @endif >Logistics</option>
											   <option value="procu" @if( $data['userdata']->jobapplicant_department == "procu") {{ "selected"}} @endif >Procurements</option>
											   <option value="purcha" @if( $data['userdata']->jobapplicant_department == "purcha") {{ "selected"}} @endif >Purchase</option>
											   <option value="webdev" @if( $data['userdata']->jobapplicant_department == "webdev") {{ "selected"}} @endif >Web development General</option>
											   <option value="netwo" @if( $data['userdata']->jobapplicant_department == "netwo") {{ "selected"}} @endif >Network</option>
											   <option value="hard" @if( $data['userdata']->jobapplicant_department == "hard") {{ "selected"}} @endif >Hardware</option>
											   <option value="suppor" @if( $data['userdata']->jobapplicant_department == "suppor") {{ "selected"}} @endif >Support</option>
											   <option value="infra" @if( $data['userdata']->jobapplicant_department == "infra") {{ "selected"}} @endif >Infrastructure</option>
											   <option value="genesal" @if( $data['userdata']->jobapplicant_department == "genesal") {{ "selected"}} @endif >General Sales</option>
											   <option value="preaud" @if( $data['userdata']->jobapplicant_department == "preaud") {{ "selected"}} @endif >Pre Audit</option>
											   <option value="posaud" @if( $data['userdata']->jobapplicant_department == "posaud") {{ "selected"}} @endif >Post Audit</option>
											   <option value="genintaud" @if( $data['userdata']->jobapplicant_department == "genintaud") {{ "selected"}} @endif >General Internal Audit</option>
											   <option value="primark" @if( $data['userdata']->jobapplicant_department == "primark") {{ "selected"}} @endif >Print Marketing</option>
											   <option value="socia" @if( $data['userdata']->jobapplicant_department == "socia") {{ "selected"}} @endif >Social Marketing</option>
											   <option value="genemark" @if( $data['userdata']->jobapplicant_department == "genemark") {{ "selected"}} @endif >General Marketing</option>
											   <option value="genelegop" @if( $data['userdata']->jobapplicant_department == "genelegop") {{ "selected"}} @endif >General Legal Operations</option>
											   <option value="genepro" @if( $data['userdata']->jobapplicant_department == "genepro") {{ "selected"}} @endif >General Productions</option>
											   <option value="qualass" @if( $data['userdata']->jobapplicant_department == "qualass") {{ "selected"}} @endif >Quality Assurance</option>
											   <option value="qcaler" @if( $data['userdata']->jobapplicant_department == "qcaler") {{ "selected"}} @endif >Quality Control</option>
											   <option value="genebusidev" @if( $data['userdata']->jobapplicant_department == "genebusidev") {{ "selected"}} @endif >General Business Development</option>
											   <option value="r&dsub" @if( $data['userdata']->jobapplicant_department == "r&dsub") {{ "selected"}} @endif >R&D</option>
											   <option value="analys" @if( $data['userdata']->jobapplicant_department == "analys") {{ "selected"}} @endif--}} >Analyst</option>
											</select>--->
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label class="col-form-label">Current  Salary RS.*</label>
											<input type="number"  min='1' class="form-control" name="can_currentsalary" value="{{old('can_currentsalary')  }}" required />
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="col-form-label">Monthly Expected Salary RS.*</label>
												<input type="number"  min='1' class="form-control" name="can_monthlyexpectedsalary" value="{{old('can_monthlyexpectedsalary')  }}" required />
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										    <label class="col-form-label">Select Condition.*</label>
											<div class="col-lg-9">
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio" name="can_negotiablesalary" id="Negotiable" value="Negotiable" checked=""  required />
													<label class="form-check-label" for="Negotiable">
													Negotiable
													</label>
												</div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio" name="can_negotiablesalary" id="Not Negotiable" value="NotNegotiable"  required />
													<label class="form-check-label" for="Not Negotiable">
													Not Negotiable
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="col-form-label">Reason To Left Last Job.*</label>
												<input type="text" class="form-control" name="can_reasonofleave" value="{{old('can_reasonofleave')  }}" required />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Current Benefits.*</label>
											<input type="text" class="form-control" name="can_remarksofleave" value="{{old('can_remarksofleave')  }}" required />
										</div>
									</div>
								    <div class="col-md-4">
										<div class="form-group">
											<label class=" col-form-label">Comfortable / Agreed for Night Shift?*</label>
											<div class="col-lg-9">
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio" name="can_nightshift" id="Yes" value="Yes" checked="" required />
													<label class="form-check-label" for="Yes">
													Yes
													</label>
												</div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio" name="can_nightshift" id="No" value="No" required  />
													<label class="form-check-label" for="No">
													No
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class=" col-form-label">Communication Skills.*</label>
											<div class="col-lg-12">
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio" name="can_communicationskills" id="Poor" value="Poor"  required  />
													<label class="form-check-label" for="Poor">
													Poor
													</label>
												</div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio" name="can_communicationskills" id="Average" value="Average" required   />
													<label class="form-check-label" for="Average">
													Average
													</label>
												</div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio" name="can_communicationskills" id="Above Average" value="Above_Average"  required   />
													<label class="form-check-label" for="Above Average">
													Above Average
													</label>
												</div>
												<br>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio" name="can_communicationskills" id="Good" value="Good" required  />
													<label class="form-check-label" for="Good">
													Good
													</label>
												</div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio" name="can_communicationskills" id="V.Good" value="V_Good" required  />
													<label class="form-check-label" for="V.Good">
													V.Good
													</label>
												</div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio" name="can_communicationskills" id="Excellent" value="Excellent" required   />
													<label class="form-check-label" for="Excellent">
													Excellent
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Period Required For Joining.*</label>
											<select class="form-control selectpicker form-control" placeholder="Select Store Name" data-live-search ="true" id="storeId" name="can_periodjoining"  required >
											   <option value="" >Select the Following</option>
											   <option value="imme" >Immediate</option>
											   <option value="twodays" >Two Days</option>
											   <option value="threedays">Three Days</option>
											   <option value="fourday">Four Days</option>
											   <option value="fiveday">Five Days</option>
											   <option value="sixday">Six Days</option>
											   <option value="oneweek">One Week</option>
											   <option value="twoweek">Two Weeks</option>
											   <option value="threeweek" >Three Weeks</option>
											   <option value="onemon" >One Month</option>
											   <option value="onehalf" >One & Half Month</option>
											   <option value="twomon" >Two Months</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Photograph(if available)</label>
											<input type="file" name="input" accept=".jpg, .jpeg, .png" class="form-control" />
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Drop Your CV.*</label>
											<input type="file" accept=".doc,.pdf" class="form-control" name="input1" required >
										</div>
									</div>
								</div>
							</div>
						
						
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
						
						<div class="row">
						<div class="col-md-12">
						<div class="card mb-0">
							<div class="card-header">
								<h4 class="card-title mb-0">EDUCATIONAL RECORD</h4>
							</div>
						</div>
						</div>
						</div>
							<div class="card-body">
								
					            <div class="text-right" style="margin-bottom : 2%">
					                <button type="button" onclick="addedudetails()" class="btn btn-primary">+ Add Education Record</button>
					             <br />
					            </div>
								<div class="table-responsive">
						            <table class="table table-bordered" id="preempform">
						                <thead>
				            			<p>EDUCATIONAL / PROFESSIONAL QUALIFICATIONS: (LIST THE LAST ONE FIRST)</p>
						                  <tr>
						                    <th  style="white-space: nowrap;">S.NO.</th>
						                    <th  style="white-space: nowrap;">CERTIFICATE/DEGREE</th>
						                    <th  style="white-space: nowrap;">Year</th>
						                    <th  style="white-space: nowrap;">REGULAR/ PRIVATE</th>
						                    <th  style="white-space: nowrap;">MAJOR SUBJECTS</th>
						                    <th  style="white-space: nowrap;">DIVISION/GRADE</th>
						                    <th  style="white-space: nowrap;">NAME OF INSTITUTION</th>
						                    <th>Action</th>
						                  </tr>
						                  <tr>
						                  </tr>
						                </thead>
						                <tbody>
											
											<?php $cnt=1; ?>
										
									
											<tr>
											<td><input type='number' step='any' class='form-control required_colom' required='required' placeholder='' value="{{$cnt}}" readonly /></td>
											<td><input type='text' step='any' name='can_edu_cerdeg[]'    class='form-control required_colom' required='required'></td>
											<td><input type='text' step='any' name='can_edu_year[]' id="can_edu_year"   class='form-control required_colom datepick'  placeholder="year" required='required'></td>
											<td><input type='text'  step='any' name='can_edu_regpri[]'   class='form-control required_colom address' required='required'></td>
											<td><input type='text' step='any' name='can_edu_majsub[]'     class='form-control required_colom'  required='required'></td>
											<td><input type='text' step='any' name='can_edu_divgra[]'     class='form-control required_colom'  required='required'></td>
											<td><textarea name='can_edu_institute[]'  class='form-control' required ></textarea></td>
											<td>
											@if($cnt != 1)
											<button onclick="removeRow(1)"  type='button' class='btn btn-danger remove' >remove</button>
											@endif
											</tr>
											
											
										
						              	</tbody>
						            </table>
					            </div>
							</div>
						</div>
					</div>
					<div class="payroll-table card">
					<div class="table-responsive">
						
							<div class="row">
								<div class="col-md-12">
									<div class="card mb-0">
										<div class="card-header">
											<h4 class="card-title mb-0">EMPLOYMENT RECORD</h4>
										</div>
									</div>
								</div>
							</div>
							
							<div class="card-body">
								 
					            <div class="text-right" style="margin-bottom : 2%">
					                <button type="button" onclick="addempdetails()" class="btn btn-primary">+ Add Employment Record</button>
					             <br />
					            </div>
								<div class="table-responsive">
						             <table class="table table-bordered" id="preempformj">
						                <thead>
				            			<p>(LIST THE LAST ONE FIRST)</p>
						                  <tr>
						                    <th  style="white-space: nowrap;">S.NO.</th>
						                    <th  style="white-space: nowrap;">NAME OF ORGANIZATION</th>
						                    <th  style="white-space: nowrap;">PERIOD FROM</th>
						                    <th  style="white-space: nowrap;">PERIOD TO</th>
						                    <th  style="white-space: nowrap;">POSITION START</th>
						                    <th  style="white-space: nowrap;">POSITION LAST</th>
						                    <th  style="white-space: nowrap;">GROSS SALARY START</th>
						                    <th  style="white-space: nowrap;">GROSS SALARY LAST</th>
						                    <th  style="white-space: nowrap;">REASON(S) FOR LEAVING</th>
						                    <th>Action</th>
						                  </tr>
						                  <tr>
						                  </tr>
						                </thead>
						                <tbody>
										
											<tr>
											<td><input type='number' step='any' class='form-control required_colom' required='required' placeholder='' value="{{$cnt}}" readonly /></td>
											<td><input type='text' step='any' name='can_empreport_org[]'  class='form-control required_colom'  required='required' /></td>
											<td><input type='text' step='any' name='can_empreport_perfrom[]' id='can_empreport_perfrom'   class='form-control required_colom datepicker'  placeholder="year" required='required' /></td>
											<td><input type='text'  step='any' name='can_empreport_perto[]' id='can_empreport_perto'   class='form-control required_colom datepicker' placeholder="year" required='required' /></td>
											<td><input type='text' step='any' name='can_empreport_posstart[]'  class='form-control required_colom' required='required' /></td>
											<td><input type='text' step='any' name='can_empreport_last[]'  class='form-control required_colom' required='required' /></td>
											<td><input type='number' step='any' name='can_empreport_grossalarystart[]'  class='form-control required_colom'  required='required' /></td>
											<td><input type='number' step='any' name='can_empreport_grossalarylast[]'  class='form-control required_colom'  required='required' /></td>
											<td><textarea name='can_empreport_reasoleave[]'  class='form-control' required ></textarea></td>
											@if($cnt != 1)
											<td><button  type='button' class='btn btn-danger remove' >remove</button></td>
											@endif
											</tr>
											
											
										
						              </tbody>
						            </table>
					            </div>
							</div>
					</div>
				</div>
				<!-- /Screening Table -->
				
			</div>
			<!-- /Screening Tab -->

			<!-- irexperience Tab -->
			<div class="tab-pane" id="irexperience_list">
				<!-- irexperience Table -->
						<div class="row">
									<div class="col-md-12">
										<div class="card flex-fill">
											<div class="card-header">
												<h4 class="card-title mb-0">Personal Details</h4>
											</div>
											<div class="card-body">
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="col-form-label">Name.*</label>
															<input type="text" class="form-control" name="can_name" value="{{old('can_name')  }}" required  >
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="col-form-label">FATHER'S/HUSBAND'S Name.*</label>
															<input type="text" class="form-control" name="can_fathername" value="{{old('can_fathername')  }}" required >
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="col-form-label">Gender.*</label>
															<select class="form-control selectpicker form-control" placeholder="Select Store Name" data-live-search ="true" id="storeId" name="can_gender"  required >
															   <option value="" >Select the Following</option>
															   <option value="female" >Female</option>
															   <option value="male"  >Male</option>
															   <option value="other" >Other</option>
															</select>
														</div>
													</div>
												</div>	
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="col-form-label">ADDRESS (Permanent).*</label>
															<input type="text" class="form-control" name="can_address" value="{{old('can_address')  }}" required>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label class="col-form-label">ADDRESS (Temporary)</label>
															<input type="text" class="form-control" name="can_addresstemporaray" value="{{old('can_addresstemporaray')  }}"  >
														</div>
													</div>
												</div>	
												<div class="row">
													<div class="col-md-3">
														<div class="form-group">
															<label class="col-form-label">MOBILE #.*</label>
															<input type="tel" class="form-control" minlength="11" maxlength="11" min="0" name="can_mobileno" value="{{old('can_mobileno') }}" required>
															<span class="form-text text-muted">e.g(03001234567)</span>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label class="col-form-label">RES/OFFICE #</label>
															<input type="tel" class="form-control" minlength="11" maxlength="11" min="0" name="can_officeno" value="{{old('can_officeno') }}" >
															<span class="form-text text-muted">e.g(02131234567)</span>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label class="col-form-label">DATE OF BIRTH.*</label>
															<input class="form-control " type="date" name="can_dob" value="{{old('can_dob') }}" required >
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label class="col-form-label">AGE.*</label>
															<input class="form-control" type="tel" minlength="2" maxlength="2" min="0" name="can_age" value="{{old('can_age' ) }}" required >
														</div>
													</div>
												</div>	
												<div class="row">
													<div class="col-md-2">
														<div class="form-group">
															<label class="col-form-label">PLACE OF BIRTH.*</label>
															<input class="form-control " type="text" name="can_placeob" value="{{old('can_placeob') }}" required >
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label class="col-form-label">N.I.C NO.*</label>
															<input class="form-control " type="tel"  maxlength="13" minlength="13" min="0" name="can_nic" value="{{old('can_nic') }}" required>
															<span class="form-text text-muted">e.g(4210112345671)</span>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="col-form-label">EMAIL.*</label>
															<input class="form-control " type="email" name="can_email" value="{{old('can_email', @$data['userdata']->log_email ) }}" required  readonly >
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label class="col-form-label">Reference</label>
															<input type="text" class="form-control" name="can_reference" value="{{old('can_reference') }}"  >
														</div>
													</div>
												</div>	
												<div class="row">
													<div class="col-md-3">
														<div class="form-group">
															<label class="col-form-label">NATIONALITY.*</label>
															<input class="form-control" type="text" name="can_nationality" value="{{old('can_nationality') }}" required >
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label class="col-form-label">RELIGION.*</label> 
															<input class="form-control" type="text" name="can_religion" value="{{old('can_religion')  }}" required >
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label class="col-form-label">MARITAL STATUS.*</label>
															<input class="form-control" type="text" name="can_martialstatus" value="{{old('can_martialstatus') }}" required >
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label class="col-form-label">OCCUPATION.*</label>
															<input type="text" class="form-control" name="can_occupation" value="{{old('can_occupation') }}" required >
														</div>
													</div>
												</div>	
													<div class="text-center">
														<button type="submit" class="btn btn-primary" style="margin-left: 700px;">Submit</button>
													</div>
										
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>					
	            
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

		<!-- Custom JS -->
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/app.js"></script>

		<!-- for add rows -->
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

		<script type="text/javascript">
		$(".datepick").datepicker( {
				format: " yyyy", // Notice the Extra space at the beginning
				viewMode: "years", 
				minViewMode: "years"
			});
			$(".datepicker").datepicker( {
				format: " yyyy", // Notice the Extra space at the beginning
				viewMode: "years", 
				minViewMode: "years"
			});
			function addedudetails(){
              var table = document.getElementById("preempform");
              var rowCount = $('#preempform tr').length;
              var row = table.insertRow(rowCount);
              // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
              var hotelLocationId = "HotelLocation"+rowCount;
				
				
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              var cell4 = row.insertCell(3);
              var cell5 = row.insertCell(4);
              var cell6 = row.insertCell(5);
              var cell7 = row.insertCell(6);
              var cell8 = row.insertCell(7);
			  
			  var jaja = 1 ;
			  var pappu =  rowCount;
				var jhama = pappu -  jaja ;
					
					console.log(jhama) ;

              cell1.innerHTML = "<input type='number' step='any'  class='form-control required_colom' required='required' placeholder='' value="+ jhama +" readonly />";
              cell2.innerHTML = "<input type='text' step='any' name='can_edu_cerdeg[]'    class='form-control required_colom' required='required' />";
              cell3.innerHTML = "<input type='text' step='any' name='can_edu_year[]' id='can_edu_year'  class='form-control required_colom datepick' required='required' placeholder='year' />";
              cell4.innerHTML = "<input type='text' step='any' name='can_edu_regpri[]'   class='form-control required_colom address' required='required' />";
              cell5.innerHTML = "<input type='text' step='any' name='can_edu_majsub[]'     class='form-control required_colom' required='required' />";
              cell6.innerHTML = "<input type='text' step='any' name='can_edu_divgra[]'     class='form-control required_colom' required='required' />";
              cell7.innerHTML = "<textarea name='can_edu_institute[]'    class='form-control'></textarea>";
			    $("#can_edu_year").each(function() {
				$(".datepick").datepicker( {
				format: " yyyy", // Notice the Extra space at the beginning
				viewMode: "years", 
				minViewMode: "years"
			});
		});
			  if(jhama == 1){
					cell8.innerHTML = "<button  type='button' class='btn btn-danger ' >remove</button>";
			  }else{
				  cell8.innerHTML = "<button  type='button' class='btn btn-danger remove' >remove</button>";
			  }

            }

            function addempdetails(){
              var table = document.getElementById("preempformj");
              var rowCount = $('#preempformj tr').length;
              var row = table.insertRow(rowCount);
              // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
              var hotelLocationId = "HotelLocation"+rowCount;  

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
				
				var jaja = 1 ;
				var pappu =  rowCount;
				var jhama = pappu - jaja ;	
					
              cell1.innerHTML = "<input type='number' step='any'  class='form-control required_colom' required='required' placeholder='' value="+ jhama +" readonly />";
              cell2.innerHTML = "<input type='text' step='any' name='can_empreport_org[]'  class='form-control required_colom' required='required' />";
              cell3.innerHTML = "<input type='text' step='any' name='can_empreport_perfrom[]' id='can_empreport_perfrom'   class='form-control required_colom datepicker' placeholder='year' required='required' />";
              cell4.innerHTML = "<input type='text'  step='any' name='can_empreport_perto[]' id='can_empreport_perto'   class='form-control required_colom datepicker' placeholder='year' required='required' />";
              cell5.innerHTML = "<input type='text' step='any' name='can_empreport_posstart[]'  class='form-control required_colom' required='required' />";
              cell6.innerHTML = "<input type='text' step='any' name='can_empreport_last[]'  class='form-control required_colom' required='required' />";
              cell7.innerHTML = "<input type='number' step='any' name='can_empreport_grossalarystart[]'  class='form-control required_colom' required='required' />";
              cell8.innerHTML = "<input type='number' step='any' name='can_empreport_grossalarylast[]'  class='form-control required_colom' required='required' />";
              cell9.innerHTML = "<textarea name='can_empreport_reasoleave[]'  class='form-control'></textarea>";
			   $("#can_empreport_perfrom").each(function() {
				$(".datepicker").datepicker( {
				format: " yyyy", // Notice the Extra space at the beginning
				viewMode: "years", 
				minViewMode: "years"
			});
		});
				 $("#can_empreport_perto").each(function() {
				$(".datepicker").datepicker( {
				format: " yyyy", // Notice the Extra space at the beginning
				viewMode: "years", 
				minViewMode: "years"
			});
		});
			  if(jhama == 1){
				cell10.innerHTML = "<button  type='button' class='btn btn-danger ' >remove</button>";
			  }else{
				  cell10.innerHTML = "<button  type='button' class='btn btn-danger remove' >remove</button>";
			  }

            }

            $('#preempform').on('click', '.remove', function(e){
			   $(this).closest('tr').remove();
			})

			$('#preempformj').on('click', '.remove', function(e){
			   $(this).closest('tr').remove();
			})
			
			
		function getedit($id){

			$.get('{{ URL::to("/subdept")}}/'+$id,function(data){
					
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
    </body>
</html>