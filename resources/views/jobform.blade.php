<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="robots" content="noindex, nofollow">
        <title>Jobs - HRMS</title>
		
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
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>	
		<!-- Main Wrapper -->
        <div class="main-wrapper">		
			<!-- Header -->
            <div class="header">	
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="{{url('/')}}" class="logo">
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
            	<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title" style="padding-top: 70px; font-size: 36px; font-weight: 900; text-align: center;">AU Telecom</h3>
							
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
				<div class="row">
					<div class="col-xl-12">
						<div class="card flex-fill">
							<div class="card-header">
								
								<h4 class="card-title mb-0 text-center">Job Application Form</h4>
							</div>
							<div class="card-body">
			
								<form class="user" action="{{ URL::to('/submitjobapplicant')}}" id="" enctype="multipart/form-data" method="post">
		                            <!-- {{csrf_field()}} -->
									@csrf
									<div class="row">
									    <div class="col-md-6">
											<div class="form-group">
												<input type="hidden" name="editid" value="{{ $data['userdata']->jobapplicant_id }}" />
											
												<label class="col-form-label">Name</label>
												<input type="text" name="name" class="form-control" value="{{$data['user']->jobapplicant_name }} " required >
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Father Name</label>
												<input type="text" name="fname" class="form-control" value="{{$data['userdata']->jobapplicant_fname }}" required >
											</div>
										</div>
									</div>									
									<div class="row">
									    <div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Email Address</label>
												<input type="email" name="email" class="form-control" value="{{$data['userdata']->jobapplicant_email }}" readonly >
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">CNIC NO</label>
												<input type="number" name="cnic" class="form-control" value="{{$data['userdata']->jobapplicant_cnic }}" required >
											</div>
										</div>
									</div>											
									<div class="row">
									    <div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Address</label>
												<input type="text" name="address" class="form-control" value="{{$data['userdata']->jobapplicant_address}}" required >
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Qualification</label>
												<select class="select" name="qualification" required>
													<option value="" selected="" disabled="">Select Qualification</option>
													<option @if( $data['userdata']->jobapplicant_qualification == "Matriculation") {{ "selected"}} @endif value="Matriculation" >Matriculation</option>
													<option @if( $data['userdata']->jobapplicant_qualification == "Diploma") {{ "selected"}} @endif value="Diploma">Diploma</option>
													<option @if( $data['userdata']->jobapplicant_qualification == "Intermediate") {{ "selected"}} @endif value="Intermediate">Intermediate</option>
													<option @if( $data['userdata']->jobapplicant_qualification == "Graduate") {{ "selected"}} @endif value="Graduate">Graduate</option>
													<option @if( $data['userdata']->jobapplicant_qualification == "Master's") {{ "selected"}} @endif value="Master's">Master's</option>
													 
												</select>
											</div>
										</div>
									</div>
									<div class="row">
									    <div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Department</label>
												<select class="form-control selectpicker form-control" placeholder="Select Store Name" data-live-search ="true" id="storeId" name="deptname"  required >
											   @foreach($data['department'] as $val) 
												   <option value="{{ $val->DEPT_ID }} "  @if( $data['userdata']->jobapplicant_department == $val->DEPT_ID) {{ "selected"}} @endif >{{ $val->DEPT_NAME }}</option>
											   @endforeach
												</select> 
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Designation</label>
												<select class="form-control selectpicker form-control" placeholder="Select Store Name" data-live-search ="true" id="storeId" name="designame"  required >
												@foreach($data['designation'] as $val) 
													<option value="{{ $val->DESG_ID }} " @if( $data['userdata']->jobapplicant_designation == $val->DESG_ID) {{ "selected" }} @endif >{{ $val->DESG_NAME }}</option>
                                      			@endforeach
                                       </select> 
											</div>
										</div>
									</div>									
									<div class="row">
									    <div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Experience</label>
												<input type="number" name="experience" class="form-control" value ="{{$data['userdata']->jobapplicant_experience}}" required >
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Contact</label>
												<input type="number" name="contact" class="form-control" value ="{{$data['userdata']->jobapplicant_contact}}" required >
											</div>
										</div>
									</div>							
									<div class="row">
									    <div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Drop Your CV</label>
												<input type="file" accept=".doc,.pdf" class="form-control" name="input1" required >
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Upload Picture</label>
												<input type="file" id="file" accept=".jpg, .jpeg, .png" class="form-control" name="input" >
											</div>
										</div>
									</div>
									<div class="text-right">
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>						
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

		<!-- Custom JS -->
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/app.js"></script>
		<script>
$(document).ready(function() {
$('.selectpicker').selectpicker('refresh');
 });
       </script>
    </body>

</html>