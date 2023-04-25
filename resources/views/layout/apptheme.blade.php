<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Register Your Self In Our Recruitment Portal For Your Dream Job | AU Telecom">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Register Your Self In Our Recruitment Portal For Your Dream Job | AU Telecom">
		<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Open+Sans:wght@500&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Open+Sans:wght@500&family=Raleway:wght@500&display=swap" rel="stylesheet">
<meta name="robots" content="noindex, nofollow">
        <title>HRMS</title>
		<script src="https://cdn.tiny.cloud/1/0x3tdic9crkvey6ukojhz2xq52p85wkzbmuke9acab2c7m85/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{!! asset('public/favicon/favicon.png') !!}" />
        <!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{!! asset('public/assets/css/bootstrap.min.css') !!}" />
		<link rel="stylesheet" href="{!! asset('public/assets/css/buttons.dataTables.min.css') !!}"/>
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{!! asset('public/assets/css/font-awesome.min.css') !!}" />
		
		<!-- Lineawesome CSS -->
		<link rel="stylesheet" href="{!! asset('public/assets/css/line-awesome.min.css') !!}">
		
		<!-- Chart CSS -->
		<link rel="stylesheet" href="{!! asset('public/assets/plugins/morris/morris.css') !!}" />

		<!-- Datatable CSS -->
		<link rel="stylesheet" href="{!! asset('public/assets/css/dataTables.bootstrap4.min.css') !!}" />

		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{!! asset('public/assets/css/select2.min.css') !!}">
		
		<!-- SelectPicker CSS -->
		<link rel="stylesheet" href="{!! asset('public/assets/css/selectpicker.css') !!}">
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{!! asset('public/assets/css/bootstrap-datetimepicker.min.css') !!}">

		<!-- Main CSS -->
		<link rel="stylesheet" href="{!! asset('public/assets/css/style.css') !!}" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		
		<!-- <link rel="stylesheet" href="{!! asset('public/assets/css/buttons.dataTables.min.css') !!}">
		<link rel="stylesheet" href="{!! asset('public/assets/css/buttons/buttons.dataTables.min.css') !!}"> -->
		
				<!-- jQuery --> 
        <script src="{!! asset('public/assets/js/jquery-3.2.1.min.js') !!}" ></script>

		<!-- Datatable JS -->
		<script src="{!! asset('public/assets/js/jquery.dataTables.min.js') !!}"></script>		
		<script src="{!! asset('public/assets/js/dataTables.bootstrap4.min.js') !!}"></script>

<style type="text/css">
	

button.dt-button
{
background: #3c99dc;
color: white;
}  
button.dt-button:hover:not(.disabled), div.dt-button:hover:not(.disabled), a.dt-button:hover:not(.disabled) {
	    border: 1px solid #666;
background: #40c4f1;
background-image: linear-gradient(to bottom, #40c4f1 0%, #40c4f1 100%);
}

</style>
    </head>
	
    <body class="mini-sidebar">
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <!-- <div class="header-left">
                    <a href="#" class="logo">
						<img src="{!! asset('public/assets/img/final-logo.png') !!}" height="55" alt="">
					</a>
                </div> -->
                 <div class="header-left">
                    <a href="{{URL('maindashboard')}}" class="logo">
						<img src="{!! asset('public/assets/img/logo--nav-collapse.png') !!}"  width="100%" height="5" alt="">
						<img src="{!! asset('public/assets/img/logo-nav.png') !!}" width="200px"  style="display:none" alt="">
					</a>
					<script>
        $(document).ready(function() {
            $("#toggle_btn").click(function() {
                $("img").toggle();
            });
        });
    </script>
                </div>
                @if(session()->get('role') != 4)
				<a id="backbutton" title="Click to go back">
					<i class="fa fa-arrow-left" style="font-size:18px; color: #fff !importantfff;margin-top: 22px; cursor: pointer;"></i>
				</a>
				@endif
				<!-- /Logo -->
				@if(session()->get('role') != 4)
				<a id="toggle_btn" href="javascript:void(0);">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>
				@elseif(session()->get("dptid") == 4 AND session()->get("role") == 4)
				<a id="toggle_btn" href="javascript:void(0);">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>
				@endif
				<!-- Header Title -->
                <div class="page-title-box">
                	<a href="{{URL('maindashboard')}}" style="cursor: pointer;">
					<h3>AU Portal</h3>
                	</a>
                </div>
				<!-- /Header Title -->
				
				<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
				<!-- Header Menu -->
				<ul class="nav user-menu">
					<li class="nav-item active" >
                            <a class="nav-link active text-center" style="    font-size: 13px;
    display: flex;
    padding-top: 14px;
    font-weight: bold;" href="index.html">Time <p class="ctime" style="padding-left:10px"></p><span
                            class="sr-only">(current)</span></a>
                            <li class="vl"></li>
                        </li>
                        

                        <li class="nav-item text-center">
                            <a class="nav-link" style="    font-size: 13px;
    display: flex;
    padding-top: 14px;
    font-weight: bold;" href="./Contact/contact.html">Date <p style="padding-left:10px"><?php echo(date('Y-m-d'))?></p></a>
							<li class="vl"></li>
                        </li>
						
					<li class="nav-item dropdown has-arrow main-drop">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img">
								<!-- <img src="{!! asset('public/assets/img/profiles/avatar-00.jpg') !!}" alt=""> -->
								<img src="{{URL::to('public/img/')}}/{{session()->get("image")}}" alt="">
							<span class="status online"></span></span>
							<span>{{session()->get("name")}}</span>
						</a>
						<div class="dropdown-menu">
							<!--<a class="dropdown-item" href="{{url('/employeeprofile')}}">My Profile</a>-->
							<a class="dropdown-item" href="#" onclick="return viewprofile({{session()->get("id")}});" ><i class="fa fa-user" style="padding-right: 7px;"></i>My Profile</a>
							@if(session()->get('batchid') == 1406)
							<a class="dropdown-item" href="{{url('/addemployeenos')}}"><i class="fa fa-plus" style="padding-right: 7px;"></i>Add Employee</a>
							<a class="dropdown-item" href="{{url('/candidate_list')}}"><i class="fa fa-list" style="padding-right: 7px;"></i>Recruitment</a>
							@endif
							<a class="dropdown-item" href="{{url('/chapass')}}"><i class="fa fa-key" style="padding-right: 7px;"></i>Change Password</a>
							<a class="dropdown-item" href="{{url('/')}}"><i class="fa fa-power-off" style="padding-right: 7px;"></i>Logout</a>
							<!-- <a class="dropdown-item" href="{{url('/getimage')}}">Select Image</a> -->
						</div>
					</li>
				</ul>
				<!-- /Header Menu -->
				
				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="#" onclick="return viewprofile({{session()->get("id")}});" >My Profile</a>
						<a class="dropdown-item" href="{{url('/')}}">Logout</a>
						<a class="dropdown-item" href="{{url('/chapass')}}">Change Password</a>
					</div>
				</div>
				<!-- /Mobile Menu -->
				
            </div>
			<!-- /Header -->
			
			<!-- Sidebar -->
			@if(session()->get('role') != 4)
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<!--<li class="menu-title"> 
								<span>Main</span>
							</li>-->
							<!--Dashboards -->
							<li class="submenu">
								<a href="#"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
								@if( session()->get("role") == 3 )
								<li><a href="{{url('/managerDashboard')}}">Manager Dashboard</a></li>
								<li><a href="{{url('/maindashboard')}}">Main Dashboard</a></li>
								@elseif(session()->get("role") == 1 || session()->get("role") == 2)
								<li><a href="{{url('/adminDashboard')}}">HR Dashboard</a></li>
								<li><a href="{{url('/maindashboard')}}">Main Dashboard</a></li>
								@else
								<li><a href="{{url('/userDashboard')}}">User Dashboard</a></li>
								@endif
								</ul>
							</li>
							<!-- End Dashboards -->
							<!-- DataTables -->
							<li class="submenu">
							@if( session()->get("role") < 4 )
								<a href="#"><i class="la la-cube"></i> <span> Recruiting</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
								@if( session()->get("role") == 2 )
									<li class="submenu">
										<a href="#"><span> HR </span> <span class="menu-arrow"></span></a>
										<ul style="display: none;">
											<!-- <li><a href="{{url('/screening')}}">Screening</a></li> -->
											<li><a href="{{url('/candidate_list')}}">Fresh Candidate List</a></li>
											<li><a href="{{url('/inprocesscandidates')}}">In Process Candidates </a></li>
											<li><a href="{{url('/callforinterview')}}">Call For Interview </a></li>
											<li><a href="{{url('/evalutioncandidate')}}"> Evalution Candidate</a></li>
											<li><a href="{{url('/hiredcandidates')}}">Hired Candidates </a></li>
											<li><a href="{{url('/allrequest')}}">All Request Status</a></li>
											<li><a href="{{url('/rejandhol')}}">Reject and Hold</a></li>
											
											<!-- <li><a href="{{url('/onhold')}}">Onhold </a></li> -->
											<!-- <li><a href="{{url('/awaiting')}}">Awaiting</a></li> -->
											<!-- <li><a href="{{url('/rejected')}}">Rejected </a></li> -->
										</ul>
									</li>
									@elseif(session()->get("role") == 3 )
									
										@if(session()->get('email') == "salman.khairi@bizzworld.com" )
											<li class="submenu">
												<a href="#"><span> COO</span> <span class="menu-arrow"></span></a>
												<ul style="display: none;">
													<li><a href="{{url('/cevalutioncandidate')}}">Evalution Candidate</a></li>
													<li><a href="{{url('/approved')}}">Approved</a></li>
													<li><a href="{{url('/declined')}}">Declined</a></li>
													<li><a href="{{url('/candidatelistcoo')}}">Candidate List</a></li>
												</ul>
											</li>
										@else
											
										<li class="submenu">
											<a href="#"></i> <span> Manager</span> <span class="menu-arrow"></span></a>
											<ul style="display: none;">
												<li><a href="{{url('/mcandidatelist')}}">Candidate List</a></li>
												<!-- <li><a href="{{url('/mcallforinterview')}}">Call For Interview</a></li> -->
												<li><a href="{{url('/mevalutioncandidate')}}"> Evalution Candidate</a></li>
												<!-- <li><a href="{{url('/mirrelevent')}}">Irrelevent</a></li> -->
												<!-- <li><a href="{{url('/mreject')}}">Rejected</a></li> -->
											</ul>
										</li>
										@endif
									
									
									@elseif(session()->get("role") == 1 )
										
									<li class="submenu">
										<a href="#"><span> HR </span> <span class="menu-arrow"></span></a>
										<ul style="display: none;">
											<li><a href="{{url('/candidate_list')}}">Fresh Candidate List</a></li>
											<!-- <li><a href="{{url('/screening')}}">Screening</a></li> -->
											<li><a href="{{url('/inprocesscandidates')}}">In Process Candidates </a></li>
											<li><a href="{{url('/callforinterview')}}">Call For Interview </a></li>
											<li><a href="{{url('/evalutioncandidate')}}"> Evalution Candidate</a></li>
											<li><a href="{{url('/hiredcandidates')}}">Hired Candidates </a></li>
											<li><a href="{{url('/allrequest')}}">All Request Status</a></li>
											<li><a href="{{url('/rejandhol')}}">Reject and Hold</a></li>
											<!-- <li><a href="{{url('/onhold')}}">Onhold </a></li> -->
											<!-- <li><a href="{{url('/awaiting')}}">Awaiting</a></li> -->
											<!-- <li><a href="{{url('/rejected')}}">Rejected </a></li> -->
										</ul>
									</li>
									<li class="submenu">
										<a href="#"></i> <span> Manager</span> <span class="menu-arrow"></span></a>
										<ul style="display: none;">
											<li><a href="{{url('/mcandidatelist')}}">Candidate List</a></li>
											<!-- <li><a href="{{url('/mcallforinterview')}}">Call For Interview</a></li> -->
											<li><a href="{{url('/mevalutioncandidate')}}"> Evalution Candidate</a></li>
											<!-- <li><a href="{{url('/mirrelevent')}}">Irrelevent</a></li> -->
											<!-- <li><a href="{{url('/mreject')}}">Rejected</a></li> -->
										</ul>
									</li>
									
									<li class="submenu">
										<a href="#"><span> COO</span> <span class="menu-arrow"></span></a>
										<ul style="display: none;">
											<li><a href="{{url('/cevalutioncandidate')}}">Evalution Candidate</a></li>
											<li><a href="{{url('/approved')}}">Approved</a></li>
											<li><a href="{{url('/declined')}}">Declined</a></li>
											<li><a href="{{url('/candidatelistcoo')}}">Candidate List</a></li>
										</ul>
									</li>
								@endif
									
								</ul>
							</li>
							
							@endif

							
							
							<!-- End DataTables -->
							
							<!-- <li class="menu-title"> 
								<span>Admin</span>
							</li> -->

							@if( session()->get("role") <=	 3 )
							<li class="submenu">
								<a href="#"><i class="la la-users"></i> <span> Employee</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('/employeelist')}}">Employee List</a></li>
									<li><a href="{{url('/notactiveemployeelist')}}">Not Active Employee List</a></li>
									<li><a href="{{url('/selecttargetmonth')}}">Employee Target</a></li>
								</ul>
							</li>
							@endif
							
							@if( session()->get("role") <=	 2 )
							<li class="submenu">
								<a href="#"><i class="la la-briefcase"></i> <span> Depart & Designation</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('/departmentlist')}}">Department List</a></li>
									<li><a href="{{url('/designationlist')}}">Designation List</a></li>
								</ul>
							</li>
							@endif

							<li class="submenu">
								<a href="#"><i class="la la-rocket"></i> <span> Leave System</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('/selfrequest')}}">Self Request</a></li>
									@if(session()->get('role') <= 3)
										<li><a href="{{url('/emprequest')}}">Employee Request</a></li>
										<li><a href="{{url('/viewemprequest')}}">Pending Employee Request</a></li>
									@endif
									<?php
										$task = DB::connection('mysql')->table('elsemployees')
										->select('elsemployees.*')
										->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
										->first();
										if(isset($task)){
									?>
									<!-- <li><a href="{{url('/viewemprequest')}}">Pending Employee Request</a></li> -->
									<?php }?>
								</ul>
							</li>
							
							<li class="submenu">
								<a href="#"><i class="fas fa-fingerprint"></i> <span> Biomatric Attendance</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('/selectmonthforattendance')}}">Monthly Bio Attendance</a></li>
									<li><a href="{{url('/dailyattendance')}}">Daily Attendance</a></li>
									@if(session()->get('role') < 2)
									<li><a href="{{url('/monthlydepartbiomatric')}}">Download Attendance</a></li>
									<li><a href="{{url('/selectattendance')}}">Upload Attendance</a></li>
									<li><a href="{{url('/markattendancereport')}}">Mark Attendance Report</a></li>
									@endif
								</ul>
							</li>
							@if(session()->get('role') != 4)
							<li class="submenu">
								<a href="#"><i class="fa fa-check"></i> <span> Portal Attendance</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<!-- <li><a href="{{url('/attendance')}}">Mark Attendance</a></li> -->
									<li><a href="{{url('/viewattendnce')}}">Timein Cont</a></li>
									<li><a href="{{url('/selectattendancemonth')}}">Monthly Timein Report</a></li>
									<li><a href="{{url('/viewattendnceout')}}">Timeout Cont</a></li>
									<li><a href="{{url('/selectattendanceoutmonth')}}">Monthly Timeout Report</a></li>
								</ul>
							</li>
							@endif
							<li class="submenu">
								<a href="#"><i class="la la-edit"></i> <span> Attendance Correctrion</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('/attendancecorrectionlist')}}">Pending Request</a></li>
									<li><a href="{{url('/correctionreport')}}">All Request</a></li>
								</ul>
							</li>

							<li class="submenu">
								<a href="#"><i class="la la-file-text"></i> <span>Employee Feedback</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
										<li><a href="{{url('/hrmform')}}">Feedback Form</a></li>
									@if(session()->get('role') <= 2||(session()->get('email') == "salman.khairi@bizzworld.com" ))
										<li><a href="{{url('/hrmreport')}}">Feedback Report</a></li>
									@endif
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="fas fa-hamburger"></i> <span>Food Portal</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
										<li><a href="{{url('/restaurantlist')}}">Restaurant List</a></li>
										<li><a href="{{url('/deliveryordertlist')}}">Awaiting To Deliver</a></li>
										<li><a href="{{url('/cancelorcompleteorderlist')}}">Order Report</a></li>
								</ul>
							</li>
							@if( session()->get("role") !=	 4)
							<li class="menu-title" style="color: #0f1431 !important; font-weight: bold"> 
								<span>Meeting Room</span>
							</li>
							<li class="submenu">
								<a href="#"><i class="fas fa-clipboard"></i> <span> Reservations </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('/reservationreport')}}">Report</a></li>
								</ul>
							</li>
							@endif
							<!--<li class="submenu">
								<a href="#"><i class="la la-rocket"></i> <span> ELS</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('/viewrequest')}}">View Request</a></li>
									<li><a href="{{url('/selfrequest')}}">Self Request</a></li>
								</ul>
							</li>
							<li class="menu-title"> 
								<span>Attendance</span>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-user-secret"></i> <span> Admin</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('#')}}">View Daily Attendance</a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-user-plus"></i> <span> Manager</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('#')}}">Mark Daily Attendance</a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-user"></i> <span> User</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('#')}}">Daily Attendance</a></li>
								</ul>
							</li> -->
							@if( session()->get("role") !=	 4 )
							<li class="menu-title" style="color: #0f1431 !important; font-weight: bold"> 
								<span>HR</span>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('/selectbioattendancemonth')}}">Monthly Payroll Salaries</a></li>
									<li><a href="{{url('/ondaylist')}}"> On Day</a></li>
									@if( session()->get("role") <=	 2 )
									<!-- <li><a href="{{url('/payrolldashboard')}}"> Payroll Dashboard</a></li> -->
									<!-- <li><a href="{{url('/payroll')}}"> Payroll</a></li> -->
									<!-- <li><a href="{{url('/uploadsheet')}}"> Upload Sheet</a></li> -->
									<li><a href="{{url('/payrollitems')}}"> Payroll Items</a></li>
									<li><a href="{{url('/misreportmonth')}}">MIS Report</a></li>
									<li><a href="{{url('/employeesalaries')}}"> Employee Salaries</a></li>
									<li><a href="{{url('/incrementlist')}}"> Employee Increments</a></li>
									<li><a href="{{url('/decrementlist')}}"> Employee Decrements</a></li>
									<li><a href="{{url('/loanlist')}}"> Employee Loan</a></li>
									@endif
									<li><a href="{{url('/employeetimings')}}"> Employee Timings</a></li>
								</ul>
							</li>
							@endif
							@if( session()->get("role") <=	 2 )
							<li class="submenu">
								<a href="#"><i class="fa fa-money"></i> <span> Vendor Registration </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('/vendorlist')}}">Report</a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="fa fa-money"></i> <span> Car Registration </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('/carlist')}}">Report</a></li>
								</ul>
							</li>
							@endif
							<li class="submenu">
								<a href="#"><i class="fa fa-money"></i> <span> Expense </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('/selectexpensemonth')}}">Petty Cash Report</a></li>
									<li><a href="{{url('/recuringexpenselist')}}">Expense Report</a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-bullhorn"></i> <span> Announcement</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">	
									<li class="submenu">
										<li><a href="{{url('/announcementlist')}}">Announcement List</a></li>
										<li><a href="{{url('/selectannouncementforcomment')}}">Announcement Comment List</a></li>
									</li>
								</ul>
							</li>

							<li class="submenu">
								<a href="#"><i class="la la-bullhorn"></i> <span> Complain</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">	
									<li class="submenu">
										<li><a href="{{url('/complainreport')}}">Report</a></li>
									</li>
								</ul>
							</li>
							
							<li class="submenu">
								<a href="#"><i class="fa fa-image"></i> <span> Gallery</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">	
									<li class="submenu">
										<li><a href="{{url('/albumlist')}}">Album List</a></li>
									</li>
								</ul>
							</li>

							<li class="submenu">
								<a href="#"><i class="la la-send"></i> <span> Holidays</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">	
									<li class="submenu">
										<li><a href="{{url('/holidayslist')}}">Holidays List</a></li>
									</li>
								</ul>	
							</li>

							<li class="submenu">
								<a href="#"><i class="fa fa-sign-out"></i> <span> Resignation</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">	
									<li class="submenu">
										<li><a href="{{url('/resignationlist')}}">Resignation List</a></li>
									</li>
								</ul>	
							</li>

							<!--<li class="submenu">
								<a href="#"><i class="la la-external-link-square"></i> <span> Resignation</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">	
									<li class="submenu">
										<li><a href="{{url('/resignationlist')}}">Resignation List</a></li>
									</li>
								</ul>	
							</li>-->
							
							

							@if( session()->get("role") <= 3)
							<li class="submenu">
								<a href="#"><i class="la la-bar-chart"></i> <span>Charts</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">	
									<li class="submenu">										
										<li><a href="{{url('/empleavechart')}}">Employee Leave Count</a></li>
										@if( session()->get("role") <= 2 || session()->get("email") == "salman.khairi@bizzworld.com"  )
										<li><a href="{{url('/depleavechart')}}">Department Leave Count</a></li>
										@endif
									</li>
								</ul>	
							</li>
							
							@endif

							
							<li class="submenu">
								<a href="#"><i class="la la-file-text"></i> <span>Probationary Form</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('/probationaryformlist')}}">Probationary Form List</a></li>
									@if( session()->get("role") <= 3 )
									<li><a href="{{url('/probationaryreport')}}">Probationary Report</a></li>
									@endif
								</ul>
							</li>
							<!--<li class="submenu">
								<a href="#"><i class="la la-object-group"></i> <span> Forms</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('/pre_employment_application_form')}}"  target="_blank">Pre Employment Form</a></li>
									<li><a href="{{url('/interview_evalution_form')}}"  target="_blank">Interview Evalution Form</a></li>
									<li><a href="{{url('/interview_assessment_form')}}"  target="_blank">Interview Assessment Form</a></li>
								</ul>
							</li>-->
							@if(session()->get("dptid") == 4 AND session()->get("role") == 3)
							<li class="menu-title" style="color: #0f1431 !important; font-weight: bold"> 
								<span>IT</span>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-file-text"></i> <span>IT Support</span> <span class="menu-arrow"></span></a>
								<ul>
									<li><a href="{{url('/itticketrequest')}}">Pending Tickets</a></li>
									<li><a href="{{url('/itticketresolverequest')}}">Resolve Tickets</a></li>
									<li><a href="{{url('/itticketrejectrequest')}}">Reject Tickets</a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-file-text"></i> <span>IT Inventory</span> <span class="menu-arrow"></span></a>
								<ul>
									<li><a href="{{url('/itinventorylist')}}">Inventory List</a></li>
								</ul>
							</li>
							@endif
							@if(session()->get("role") <= 2)
							<li class="menu-title" style="color: #0f1431 !important; font-weight: bold"> 
								<span>IT</span>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-file-text"></i> <span>IT Support</span> <span class="menu-arrow"></span></a>
								<ul>
									<li><a href="{{url('/itticketrequest')}}">Pending Tickets</a></li>
									<li><a href="{{url('/itticketresolverequest')}}">Resolve Tickets</a></li>
									<li><a href="{{url('/itticketrejectrequest')}}">Reject Tickets</a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-file-text"></i> <span>IT Inventory</span> <span class="menu-arrow"></span></a>
								<ul>
									<li><a href="{{url('/itinventorylist')}}">Inventory List</a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-file-text"></i> <span>IT Review</span> <span class="menu-arrow"></span></a>
								<ul>
									<li><a href="{{url('/itreviewreport')}}">Review List</a></li>
								</ul>
							</li>
							@endif
						</ul>
						
					</div>
                </div>
            </div>
            @elseif(session()->get("dptid") == 4 AND session()->get("role") >= 3)
            <li class="menu-title" style="color: #0f1431 !important; font-weight: bold"> 
				<span>IT</span>
			</li>
            <div class="sidebar" id="sidebar">
			    <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="submenu">
								<a href="#"><i class="la la-file-text"></i> <span>IT Support</span> <span class="menu-arrow"></span></a>
								<ul>
									<li><a href="{{url('/itticketrequest')}}">Pending Tickets</a></li>
									<li><a href="{{url('/itticketresolverequest')}}">Resolve Tickets</a></li>
									<li><a href="{{url('/itticketrejectrequest')}}">Reject Tickets</a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-file-text"></i> <span>IT Inventory</span> <span class="menu-arrow"></span></a>
								<ul>
									<li><a href="{{url('/itinventorylist')}}">Inventory List</a></li>
								</ul>
							</li>
						</ul>
					</div>
			    </div>
			</div>
            @endif
			<script type="text/javascript">
			function timeout(){
				$.get('{{ URL::to("/usertimeout")}}');
				window.location.reload();
			}
			</script>
			<script type="text/javascript">
				function viewprofile ($id) {
	    	window.location.replace('{{ URL::to("/employeeprofile")}}/'+$id);
	        // return true or false, depending on whether you want to allow the `href` property to follow through or not
	    	}
	    	$(document).ready(function () {
	    	    currenttime();
			    function currenttime() {
			        var date = new Date
			        var hours = date.getHours();
			        var minutes = date.getMinutes();
			        var ampm = hours >= 12 ? 'PM' : 'AM';
			        hours = hours % 12;
			        hours = hours ? hours : 12; // the hour '0' should be '12'
			        minutes = minutes < 10 ? '0' + minutes : minutes;
			        var strTime = hours + ':' + minutes + ' ' + ampm;

			        var weekday = new Array(7);
			        weekday[0] = "Sunday";
			        weekday[1] = "Monday";
			        weekday[2] = "Tuesday";
			        weekday[3] = "Wednesday";
			        weekday[4] = "Thursday";
			        weekday[5] = "Friday";
			        weekday[6] = "Saturday";

			        var day = weekday[date.getDay()];
			        strTime += ' ' + day;

			        $('.ctime').html(strTime);
			    }
			      $(function () {
			        setInterval(currenttime, 1000);
			    });
		    $("#backbutton").click(function () { window.history.back() })
		    });
			</script>
			@yield('hr-HRM')
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            
			<!-- /Page Wrapper -->
        </div>
		<!-- /Main Wrapper -->
		
		<!-- Bootstrap Core JS -->
        <script src="{!! asset('public/assets/js/popper.min.js') !!}"></script>
        <script src="{!! asset('public/assets/js/bootstrap.min.js') !!}"></script>
		
		<!-- Slimscroll JS -->
		<script src="{!! asset('public/assets/js/jquery.slimscroll.min.js') !!}"></script>
		
		<!-- Select2 JS -->
		<script src="{!! asset('public/assets/js/select2.min.js') !!}"></script>
		
		<!-- Chart JS -->
		<script src="{!! asset('public/assets/plugins/morris/morris.min.js') !!}"></script>
		<script src="{!! asset('public/assets/plugins/raphael/raphael.min.js') !!}"></script>		
		<script src="{!! asset('public/assets/js/chart.js') !!}"></script>

		<!-- Datetimepicker JS -->		
		<script src="{!! asset('public/assets/js/moment.min.js') !!}"></script>		
		<script src="{!! asset('public/assets/js/bootstrap-datetimepicker.min.js') !!}"></script>
		
		<!-- Custom JS -->
		<script src="{!! asset('public/assets/js/app.js') !!}"></script>
		<script src="{!! asset('public/assets/js/data-table-custom.js') !!}"></script>
		
		<script src="{!! asset('public/assets/js/sweetalert.js') !!}"></script>

		
		<!-- <script src="{!! asset('public/assets/js/dataTables.buttons.min.js') !!}"></script> -->
		<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
		<!-- <script src="{!! asset('public/assets/js/buttons.flash.min.js') !!}"></script> -->
		<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
		<!-- <script src="{!! asset('public/assets/js/jszip.min.js') !!}"></script> -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<!-- <script src="{!! asset('public/assets/js/pdfmake.min.js') !!}"></script> -->
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> -->
		<!-- <script src="{!! asset('public/assets/js/vfs_fonts.js') !!}"></script> -->
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> -->
		<!-- <script src="{!! asset('public/assets/js/buttons.html5.min.js') !!}"></script> -->
		<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
		<!-- <script src="{!! asset('public/assets/js/buttons.print.min.js') !!}"></script> -->
		<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
		<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
		<!-- SelectPicker JS -->
		<script src="{!! asset('public/assets/js/selectpicker.js') !!}"></script>
		
		<!-- {!! asset('public/assets/js/chart.js') !!} -->
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script> -->
		<!-- {!! asset('public/assets/js/chart.js') !!} -->
		<!-- <script src="https://www.jqueryscript.net/demo/Date-Time-Picker-Bootstrap-4/build/js/bootstrap-datetimepicker.min.js"></script> -->
<script type="text/javascript">	
	
</script>
<footer class="text-center" style="background:#0f1431 !important" >
					© COPYRIGHT <?php echo(date('Y'));?> AU Telecom ALL RIGHTS RESERVED.
			</footer>
    </body>
</html>