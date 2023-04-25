<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="robots" content="noindex, nofollow">
        <title>INTERVIEW EVALUTION FORM - HRMS</title>
		
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
                    <a href="{{url('/adminDashboard')}}" class="logo">
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
						<a class="nav-link" href="{{url('/')}}">LogOut</a>
					</li>
				</ul>
				<!-- /Header Menu -->
				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="{{url('/')}}">LogOut</a>
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
								<h4 class="card-title mb-0 text-center">INTERVIEW ASSESSMENT</h4>
							</div>
							<div class="card-body">
								<form class="user" action="{{ URL::to('/submithrevucanform')}}" id="" enctype="multipart/form-data" method="post">
		                            {{csrf_field()}}
									
									<input type="hidden" name="can_job_id" value="{{ $data->jobapplicant_id }}" />
									<input type="hidden" name="can_evu_id" value="{{ $data->can_evu_id }}" />
									
									<div class="row">
									    <div class="col-md-12">
											<div class="form-group">
												<label class="col-form-label"> Name Of Applicant:</label>
												<input type="text" class="form-control" name="can_name" value="{{$data->jobapplicant_name}}" />
											</div>
										</div>
									</div>									
									<div class="row">
									    <div class="col-md-12">
											<div class="form-group">
												<label class="col-form-label">Position Applied / Recommended For:</label>
												<input type="text" class="form-control" name="can_desg" value="{{old('can_desg', @$data->jobapplicant_postionapppliedform )  }}" required />
											</div>
										</div>
									</div>
									<br>
									<h4 class="card-title mb-0 text-left" style="color: #000000;">HR Assessment:</h4>											
									<div class="row">
									    <div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Assessor Name:</label>
												<input type="text" class="form-control" name="can_asrname" value="{{old('can_asrname', @$data->jobapplicant_postionapppliedform )  }}" required >
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group pmd-textfield pmd-textfield-floating-label">
												<label class="col-form-label" for="datetimepicker-default">Interview Date & Time:</label>
												<input type="text" id="datetimepicker-default" class="form-control" name="can_intDT" value="{{old('can_intDT', @$data->can_evu_intdatetime )  }}" required  />
											</div>
										</div>
									</div>
									<div class="row">
									    <div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Current / Last Salary?</label>
												<input type="number"  min='1' class="form-control" name="can_lstSal" value="{{old('can_lstSal', @$data->jobapplicant_currentsalary )  }}" required />
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Expected Salary?</label>
												<input type="number"  min='1' class="form-control" name="can_exSal" value="{{old('can_exSal', @$data->jobapplicant_monthlyexpectedsalary )  }}" required />
											</div>
										</div>
									</div>									
									<div class="row">
									    <div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Reason to Leave:</label>
												<input type="text" class="form-control" name="can_releave" value="{{old('can_releave', @$data->jobapplicant_reasonofleave )  }}" required />
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Notice for Joining?</label>
												<input type="text" class="form-control" name="can_notJoi" value="{{old('can_notJoi', @$data->jobapplicant_periodjoining )  }}" required />
											</div>
										</div>
									</div>							
									<div class="row">
									    <div class="col-md-6">
											<div class="form-group">
												<label class=" col-form-label">Comfortable / Agreed for Night Shift?</label>
												<div class="col-lg-9">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="can_nightcondition" id="Yes" value="Yes" required @if(old('can_nightcondition', @$data->jobapplicant_nightshift == "Yes")) checked @endif />
														<label class="form-check-label" for="Yes">
														Yes
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="can_nightcondition" id="No" value="No" required @if(old('can_nightshift', @$data->jobapplicant_nightshift == "No")) checked @endif />
														<label class="form-check-label" for="No">
														No
														</label>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class=" col-form-label">Communication Skills</label>
												<div class="col-lg-12">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="can_comskillcon" id="Poor" value="Poor" required @if(old('can_comskillcon', @$data->jobapplicant_communicationskills == "Poor")) checked @endif />
														<label class="form-check-label" for="Poor">
														Poor
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="can_comskillcon" id="Average" value="Average" required @if(old('can_comskillcon', @$data->jobapplicant_communicationskills == "Average")) checked @endif />
														<label class="form-check-label" for="Average">
														Average
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="can_comskillcon" id="Above Average" value="Above_Average" required @if(old('can_comskillcon', @$data->jobapplicant_communicationskills == "Above_Average")) checked @endif />
														<label class="form-check-label" for="Above Average">
														Above Average
														</label>
													</div>
													<br>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="can_comskillcon" id="Good" value="Good" required @if(old('can_comskillcon', @$data->jobapplicant_communicationskills == "Good")) checked @endif />
														<label class="form-check-label" for="Good">
														Good
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="can_comskillcon" id="V.Good" value="V_Good" required @if(old('can_comskillcon', @$data->jobapplicant_communicationskills == "V_Good")) checked @endif />
														<label class="form-check-label" for="V.Good">
														V.Good
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="can_comskillcon" id="Excellent" value="Excellent" required @if(old('can_comskillcon', @$data->jobapplicant_communicationskills == "Excellent")) checked @endif />
														<label class="form-check-label" for="Excellent">
														Excellent
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
							            <div class="col-md-12">
											<div class="form-group">
												<label class="col-form-label">Other Remarks/ Recommendation:</label>
												<textarea rows="3" cols="5" class="form-control" name="can_remark" placeholder="Enter message">{{old('can_remark', @$data->can_evu_com_ass ) }}</textarea>
											</div>
										</div>
									</div>
									<br>
									<h4 class="card-title mb-0 text-left" style="color: #000000;">Technical Assessment:</h4>
									<div class="row">
									    <div class="col-md-12">
											<div class="form-group">
												<label class="col-form-label">Assessor Name:</label>
												<input type="text" class="form-control" name="can_techass" value="{{old('can_techass', @$data->can_evu_techass )  }}" required />
											</div>
										</div>
									</div>
									<div class="row">
									    <div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Designation& Department:</label>
												<input type="text" class="form-control" name="can_DesgDept" value="{{old('can_DesgDept', @$data->can_evu_DesgDept )  }}" required />
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
											
												<label class="col-form-label">Rating Scale: 1-4</label>
												<select class="select" name="can_rate">
													<option value=""  >Select Rating Scale</option>
													<option value="1" @if(old('can_rate', @$data->can_evu_rate == 1 )) {{ "selected" }} @endif >1= Not according to expectations (NA)</option>
													<option value="2" @if(old('can_rate', @$data->can_evu_rate == 2 )) {{ "selected" }} @endif >2= Partially according to expectations (PA)</option>
													<option value="3" @if(old('can_rate', @$data->can_evu_rate == 3 )) {{ "selected" }} @endif >3= Achieves Expectations</option>
													<option value="4" @if(old('can_rate', @$data->can_evu_rate == 4 )) {{ "selected" }} @endif >4= Exceeds Expectations</option>
												</select>
											</div>
										</div>
									</div>
									<div class="text-right" style="margin-bottom : 2%">
					                	<button type="button" onclick="addtecdetails()" class="btn btn-primary">+ Add Technical Record</button>
						            </div>
									<div class="table-responsive">
							             <table class="table table-bordered" id="intevaform">
							                <thead>
							                  <tr>
							                    <th  style="white-space: nowrap;">Technical Competencies</th>
							                    <th  style="white-space: nowrap;">Examples of successful application</th>
							                    <th  style="white-space: nowrap;">Rating 1 - 4</th>
							                    <th  style="white-space: nowrap;">Remarks</th>
							                    <th>Action</th>
							                  </tr>
							                  
							                </thead>
							                <tbody>
											<?php
												
												
												
				
												$can_evut_techname = explode("~",$data->can_evu_techname);
												
												$can_evut_exam = explode("~",$data->can_evu_exam);
												
												$can_evut_techrate = explode("~",$data->can_evu_techrate);
												
												$can_evut_rem = explode("~",$data->can_evu_rem);
												
												$sjhd = 0 ; 
												
												$vals = count($can_evut_techname);
												
												
											?>
											
											@if($can_evut_techname)
											
											@for($cnt = 1; $cnt <= $vals; $cnt++)
											
											<tr>
											  
												<td><input type='text' step='any' name='can_tc[]' class='form-control required_colom' required='required' value="{{ old('can_tc[$sjhd]', @$can_evut_techname[$sjhd] ) }}" /></td>
												<td><input type='text' step='any' name='can_examsucapp[]'   placeholder='' class='form-control required_colom' required='required' value="{{ old('can_examsucapp[$sjhd]', @$can_evut_exam[$sjhd] ) }}" /></td>
												<td><input type='number' min='1' max='4' step='any' name='can_rat[]'   placeholder='' class='form-control required_colom' required='required' value="{{ old('can_rat[$sjhd]', @$can_evut_techrate[$sjhd] ) }}" /></td>
												<td><input type='text' id='' step='any' name='can_rem[]'   placeholder='' class='form-control required_colom' required='required' value="{{ old('can_rem[$sjhd]', @$can_evut_rem[$sjhd] ) }}" /></td>
												
							                
											
												@if($cnt != 1)
												<td><button onclick="removeRow(1)"  type='button' class='btn btn-danger remove' >remove</button></td>
												@endif
												</tr>
												<?php  $sjhd++ ; ?>
											@endfor
											@else
											@endif
							              </tbody>
							            </table>
						            </div>
									<div class="row">
							            <div class="col-md-12">
											<div class="form-group">
												<label class="col-form-label">DATE</label>
												<input class="form-control " type="date" name ="can_date" value="{{old('can_date', @$data->can_evu_date )  }}" required />
											</div>
										</div>
									</div>
									<div class="row">
									    <div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">1st Interviewer Name:</label>
												<input type="text" class="form-control" name="can_inter1Name" value="{{old('can_releave', @$data->can_evu_inter1Name )  }}" required />
											</div>
										</div>
									    <div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Date</label>
												<input type="date" class="form-control" name = "can_int1date" value="{{old('can_releave', @$data->can_evu_int1date )  }}" required />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">2nd Interviewer Name:</label>
												<input type='text'  id="date" class='form-control' required='required' name="can_inter2Name" value="{{old('can_releave', @$data->can_evu_inter2Nam )  }}" required />
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Date:</label>
												<input type="date" class="form-control" name="can_int2date" value="{{old('can_releave', @$data->can_evu_int2date )  }}" required />
											</div>
										</div>
									</div>
									<br>
									<h4 class="card-title mb-0 text-left" style="color: #000000;">RECOMMENDATIONS:</h4>
									<div class="row">
							            <div class="col-md-12">
											<div class="form-group">
												<label class="col-form-label">Human Resource:</label>
												<textarea rows="4" cols="5" class="form-control" placeholder="Enter message" name="can_hr" >{{old('can_hr', @$data->can_evu_com_hr ) }}</textarea>
											</div>
										</div>
									</div>
									<div class="row">
							            <div class="col-md-12">
											<div class="form-group">
												<label class="col-form-label">Concerned HOD/ Manager:</label>
												<textarea rows="4" cols="5" class="form-control" placeholder="Enter message" name="can_hod" >{{old('can_hod', @$data->can_evu_com_hod ) }}</textarea>
											</div>
										</div>
									</div>
									<div class="row">
							            <div class="col-md-12">
											<div class="form-group">
												<label class="col-form-label">G.M Operations:</label>
												<textarea rows="4" cols="5" class="form-control" placeholder="Enter message" name="can_GM" >{{old('can_GM', @$data->can_evu_com_GM ) }}</textarea>
											</div>
										</div>
									</div>
									<br>
									<h4 class="card-title mb-0 text-left" style="color: #000000; padding-bottom: 10px;">Finalised Position Grade & Salary:</h4>
									<div class="table-responsive">
							            <table class="table table-bordered">
							                <thead>
							                  <tr>
							                    <th  style="white-space: nowrap;">Position</th>
							                    <th  style="white-space: nowrap;">Grade</th>
							                    <th  style="white-space: nowrap;">Salary</th>
							                    <th  style="white-space: nowrap;">Upon Confirmation</th>
							                  </tr>
							                  <tr>
							                  </tr>
							                </thead>
							                <tbody>
							                	<td><input class="form-control required_colom" type="text" name="can_Fpos" value="{{old('can_Fpos', @$data->can_evu_Fpos )  }}" required /></td>
							                	<td><input class="form-control required_colom" type="text" name="can_Fgra" value="{{old('can_Fgra', @$data->can_evu_Fgra )  }}" required /></td>
							                	<td><input class="form-control required_colom" type="number"  min='1' name="can_Fsal" value="{{old('can_Fsal', @$data->can_evu_Fsal )  }}" required /></td>
							                	<td><input class="form-control required_colom" type="text" name="can_FupConfi" value="{{old('can_FupConfi', @$data->can_evu_FupConfi )  }}" required /></td>
							              	</tbody>
							            </table>
						            </div>
						            <br>
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

		<!-- Mask JS -->
		<script type="text/javascript" src="{{ URL::asset('public/js/jquery.maskedinput.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/js/mask.js') }}"></script>


		<!-- <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/jquery.maskedinput.min.js"></script>
        <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/mask.js"></script> -->
        
		<!-- Custom JS -->
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/app.js"></script>


		<script type="text/javascript">
			function addtecdetails(){
              var table = document.getElementById("intevaform");
              var rowCount = $('#intevaform tr').length;
              var row = table.insertRow(rowCount);
              // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
              var hotelLocationId = "HotelLocation"+rowCount;

              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              var cell4 = row.insertCell(3);
              var cell5 = row.insertCell(4);

              cell1.innerHTML = "<input type='text' step='any' name='can_tc[]' class='form-control required_colom' required='required' placeholder='' >";
              cell2.innerHTML = "<input type='text' step='any' name='can_examsucapp[]'   placeholder='' class='form-control required_colom' required='required'>";
              cell3.innerHTML = "<input type='number' min='1' max='4' step='any' name='can_rat[]'   placeholder='' class='form-control required_colom' required='required'>";
              cell4.innerHTML = "<input type='text' id='' step='any' name='can_rem[]'   placeholder='' class='form-control required_colom' required='required'>";
              cell5.innerHTML = "<button  type='button' class='btn btn-danger remove' >remove</button>";
              initAutocomplete(hotelLocationId);
            }

            $('#intevaform').on('click', '.remove', function(e){
			   $(this).closest('tr').remove();
			})

			$('#datetimepicker-default').datetimepicker();


    	</script>
		
    </body>

</html>