<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="robots" content="noindex, nofollow">
        <title>EMPLOYMENT APPLICATION FORM - HRMS</title>
		
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
					
				</ul>
				<!-- /Header Menu -->
				<!-- Mobile Menu -->
				
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
					<div class="col-md-12">
						<div class="card flex-fill">
							<div class="card-header">
								<h3 class="card-title mb-0 text-center">EMPLOYMENT APPLICATION FORM</h3>
							</div>
							<form action="{{ URL::to('')}}" method="POST" class="form-horizontal"enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="row">
									<input type="hidden" name="can_id" value="{{ $data['userdata']->jobapplicant_id }}" />
									<!---<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Position Applied For</label>
												<input type="text" class="form-control" value="{{old('can_postionapppliedform', @$data['userdata']->jobapplicant_postionapppliedform )  }}"  readonly />
										</div>
									</div>
									<div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Department</label>
												<select class="form-control selectpicker form-control" placeholder="Select Store Name" data-live-search ="true" id="storeId" name="deptname"  readonly >
											   @foreach($data['department'] as $val) 
												   <option value="{{ $val->dept_id }} "  @if( $data['userdata']->jobapplicant_department == $val->dept_id) {{ "selected"}} @endif >{{ $val->dept_name }}</option>
											   @endforeach
												</select> 
											</div>
										</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Current  Salary RS.</label>
											<input type="number"  min='1' class="form-control"  value="{{old('can_currentsalary', @$data['userdata']->jobapplicant_currentsalary)  }}" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Monthly Expected Salary RS.</label>
												<input type="number"  min='1' class="form-control"  value="{{old('can_monthlyexpectedsalary', @$data['userdata']->jobapplicant_monthlyexpectedsalary)  }}" readonly />
											</div>
										</div>
									<div class="col-md-6">
										<div class="form-group">
										    <label class="col-lg-3 col-form-label">Select Condition</label>
											<div class="col-lg-9">
												<p style="color:black;" >{{ $data['userdata']->jobapplicant_negotiablesalary }} </p>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Reason To Left Last Job</label>
												<input type="text" class="form-control"  value="{{old('can_reasonofleave', @$data['userdata']->jobapplicant_reasonofleave)  }}" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Comment/Remarks</label>
											<input type="text" class="form-control"  value="{{old('can_remarksofleave', @$data['userdata']->jobapplicant_remarksofleave)  }}" readonly />
										</div>
									</div>
								    <div class="col-md-6">
										<div class="form-group">
											<label class=" col-form-label">Comfortable / Agreed for Night Shift?</label>
											<div class="col-lg-9">
												<div class="form-check form-check-inline">
													
												<p style="color:black;">{{ $data['userdata']->jobapplicant_nightshift }} </p>
													
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class=" col-form-label">Communication Skills</label>
											<div class="col-lg-12">
												<p style="color:black;">{{ $data['userdata']->jobapplicant_communicationskills }} </p>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Period Required For Joining</label>
											<input type="text" class="form-control"  value="{{old('can_periodjoining', @$data['userdata']->jobapplicant_periodjoining ) }}" readonly />
										</div>
									</div>-->
									<div class="col-md-4">
										<label class="col-form-label">Candidate C.V</label><br/>
										<a href="{{ URL::to('public/file/')}}/{{$data['userdata']->jobapplicant_cv}}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a>
									</div>
									<!--<div class="col-md-4">
										<label class="col-form-label">Candidate Picture</label><br/>
										<img src="{{ URL::to('public/img/')}}/{{$data['userdata']->jobapplicant_picture}}" style="height:200px; width:auto;" />
									</div>-->
								</div>
							</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<div class="card mb-0">
							<div class="card-header">
								<h4 class="card-title mb-0">EDUCATIONAL RECORD</h4>
							</div>
							<div class="card-body">
								<div id="msg5">
					                   <p class="msg4 alert"></p>
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
						                    
						                  </tr>
						                  <tr>
						                  </tr>
						                </thead>
						                <tbody>
											
										<?php
												
												
												
				
												$edu_edu_cerdeg = explode("~",$data['userdata']->jobapplicant_edu_cerdeg);
												
												$edu_sno = explode("~",$data['userdata']->jobapplicant_edu_sno);
												
												$edu_year = explode("~",$data['userdata']->jobapplicant_edu_year);
												
												$edu_regpri = explode("~",$data['userdata']->jobapplicant_edu_regpri);
												
												$edu_majsub = explode("~",$data['userdata']->jobapplicant_edu_majsub);
												
												$edu_divgra = explode("~",$data['userdata']->jobapplicant_edu_divgra);
												
												$edu_institute = explode("~",$data['userdata']->jobapplicant_edu_institute);
												
												$sjhd = 0 ; 
												
												$vals = count($edu_edu_cerdeg);
												
												
											?>
											
										
											@if($edu_edu_cerdeg)
											
											@for($cnt = 1; $cnt <= $vals; $cnt++)
											<tr>
											<td><input type='number' step='any' class='form-control required_colom' required='required' placeholder='' value="{{$cnt}}" readonly /></td>
											<td><input type='text' step='any'     class='form-control required_colom' value="{{ old('can_edu_cerdeg[$sjhd]', @$edu_edu_cerdeg[$sjhd] ) }}" readonly /></td>
											<td><input type='date' step='any'   class='form-control required_colom' value="{{ old('can_edu_year[$sjhd]', @$edu_year[$sjhd] ) }}" readonly /></td>
											<td><input type='text' id='' step='any'   class='form-control required_colom address' value="{{ old('can_edu_regpri[$sjhd]', @$edu_regpri[$sjhd] ) }}" readonly /></td>
											<td><input type='text' step='any'     class='form-control required_colom' value="{{ old('can_edu_majsub[$sjhd]', @$edu_majsub[$sjhd] ) }}" readonly /></td>
											<td><input type='text' step='any'      class='form-control required_colom' value="{{ old('can_edu_divgrass[$sjhd]', @$edu_divgra[$sjhd] ) }}" readonly /></td>
											<td><textarea   class='form-control' readonly >{{old('can_edu_institute[$sjhd]', @$edu_institute[$sjhd] ) }}</textarea></td>
											
											@if($cnt != 1)
											
											@endif
											</tr>
											<?php  $sjhd++ ; ?>
											@endfor
										@else
										@endif
										
						              	</tbody>
						            </table>
					            </div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<!---<div class="row">
					<div class="col-md-12">
						<div class="card mb-0">
							<div class="card-header">
								<h4 class="card-title mb-0">EMPLOYMENT RECORD</h4>
							</div>
							<div class="card-body">
								<div id="msg5">
					                   <p class="msg4 alert"></p>
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
						                    
						                  </tr>
						                  <tr>
						                  </tr>
						                </thead>
						                <tbody>
										<?php
												
												
												
				
												$empreport_org = explode("~",$data['userdata']->jobapplicant_empreport_org);
												
												$empreport_sno = explode("~",$data['userdata']->jobapplicant_empreport_sno);
												
												$empreport_perfrom = explode("~",$data['userdata']->jobapplicant_empreport_perfrom);
												
												$empreport_perto = explode("~",$data['userdata']->jobapplicant_empreport_perto);
												
												$empreport_posstart = explode("~",$data['userdata']->jobapplicant_posstart);
												
												$empreport_last = explode("~",$data['userdata']->jobapplicant_last);
												
												$empreport_grossalarystart = explode("~",$data['userdata']->jobapplicant_grossalarystart);
												
												$empreport_grossalarylast = explode("~",$data['userdata']->jobapplicant_grossalarylast);
												
												$empreport_reasoleave = explode("~",$data['userdata']->jobapplicant_reasoleave);
												
												$sjhsdd = 0 ; 
												
												$val = count($empreport_org);
												
												
											?>
											
										
											@if($empreport_org)
											
											@for($cnt = 1; $cnt <= $val ; $cnt++)
											<tr>
											<td><input type='number' step='any' class='form-control required_colom' required='required' placeholder='' value="{{$cnt}}" readonly /></td>
											<td><input type='text' step='any'   class='form-control required_colom' value="{{ old('can_empreport_org[$sjhsdd]', @$empreport_org[$sjhsdd] ) }}" readonly /></td>
											<td><input type='date' step='any'    class='form-control required_colom' value="{{ old('can_empreport_perfrom[$sjhsdd]', @$empreport_perfrom[$sjhsdd] ) }}" readonly /></td>
											<td><input type='date' id='' step='any'    class='form-control required_colom address' value="{{ old('can_empreport_perto[$sjhsdd]', @$empreport_perto[$sjhsdd] ) }}" readonly /></td>
											<td><input type='text' step='any'   class='form-control required_colom' value="{{ old('can_empreport_posstart[$sjhsdd]', @$empreport_posstart[$sjhsdd] ) }}" readonly /></td>
											<td><input type='text' step='any'   class='form-control required_colom' value="{{ old('can_empreport_last[$sjhsdd]', @$empreport_last[$sjhsdd] ) }}" readonly /></td>
											<td><input type='number' step='any'   class='form-control required_colom' value="{{ old('can_empreport_grossalarystart[$sjhsdd]', @$empreport_grossalarystart[$sjhsdd] ) }}" readonly /></td>
											<td><input type='number' step='any'   class='form-control required_colom' value="{{ old('can_empreport_grossalarylast[$sjhsdd]', @$empreport_grossalarylast[$sjhsdd] ) }}" readonly /></td>
											<td><textarea  class='form-control' readonly >{{ old('can_empreport_reasoleave[$sjhsdd]', @$empreport_reasoleave[$sjhsdd] ) }}</textarea></td>
											@if($cnt != 1)
											
											@endif
											</tr>
											<?php  $sjhsdd++ ; ?>
											@endfor
										@else
										@endif
										
						              </tbody>
						            </table>
					            </div>
							</div>
						</div>
					</div>
				</div>-->
				<br>
				<div class="row">
					<div class="col-md-12">
						<div class="card flex-fill">
							<div class="card-header">
								<h4 class="card-title mb-0">Personal Details</h4>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Name</label>
											<input type="text" class="form-control"  value="{{old('can_name', @$data['userdata']->jobapplicant_name)  }}" readonly  />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">FATHER'S/HUSBAND'S Name</label>
											<input type="text" class="form-control"  value="{{old('can_fathername', @$data['userdata']->jobapplicant_fname)  }}" readonly />
										</div>
									</div>
									<!---<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">ADDRESS (Permanent)</label>
											<input type="text" class="form-control"  value="{{old('can_address', @$data['userdata']->jobapplicant_address)  }}" readonly />
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">ADDRESS (Temporary)</label>
											<input type="text" class="form-control"  value="{{old('can_addresstemporaray', @$data['userdata']->jobapplicant_addresstemporaray)  }}" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">MOBILE #</label>
											<input type="tel" class="form-control" minlength="11" maxlength="11" min="0"  value="{{old('can_mobileno', @$data['userdata']->jobapplicant_contact ) }}" readonly />
											<span class="form-text text-muted">e.g(03001234567)</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">RES/OFFICE #</label>
											<input type="tel" class="form-control" minlength="11" maxlength="11" min="0"  value="{{old('can_officeno', @$data['userdata']->jobapplicant_officeno ) }}" readonly />
											<span class="form-text text-muted">e.g(02131234567)</span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">DATE OF BIRTH</label>
											<input class="form-control " type="date"  value="{{old('can_dob', @$data['userdata']->jobapplicant_dob ) }}" readonly >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">AGE</label>
											<input class="form-control " type="number" min="1"  value="{{old('can_age', @$data['userdata']->jobapplicant_age ) }}" readonly >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">PLACE OF BIRTH</label>
											<input class="form-control " type="text"  value="{{old('can_placeob', @$data['userdata']->jobapplicant_placeob ) }}" readonly >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">N.I.C NO</label>
											<input class="form-control " type="number" minlength="13" maxlength="13" min="13"  value="{{old('can_nic', @$data['userdata']->jobapplicant_cnic ) }}" readonly>
											<span class="form-text text-muted">e.g(4210112345671)</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">EMAIL</label>
											<input class="form-control " type="email"  value="{{old('can_email', @$data['userdata']->jobapplicant_email ) }}" readonly   >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">NATIONALITY</label>
											<input class="form-control" type="text"  value="{{old('can_nationality', @$data['userdata']->jobapplicant_nationality  ) }}" readonly >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">RELIGION</label> 
											<input class="form-control" type="text" value="{{old('can_religion', @$data['userdata']->jobapplicant_religion)  }}" readonly >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">MARITAL STATUS</label>
											<input class="form-control" type="text"  value="{{old('can_martialstatus', @$data['userdata']->jobapplicant_martialstatus ) }}" readonly >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">OCCUPATION</label>
											<input type="text" class="form-control"  value="{{old('can_occupation', @$data['userdata']->jobapplicant_occupation ) }}" readonly >
										</div>
									</div>
									<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Employee Status</label>
												<input type="text" class="form-control"  value="{{old('can_occupation', @$data['userdata']->jobapplicant_status ) }}" readonly >
											</div>
										</div>--->
								</form>
								</div>
							</div>
						</div>
					</div>					
	            </div>
	            <br>
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

		

		<!-- for add rows -->
		
    </body>


</html>