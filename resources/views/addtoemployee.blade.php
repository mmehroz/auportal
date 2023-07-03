@extends('layout.apptheme')
@section('hr-HRM')

<style type="text/css">
	.form-control {
		color: #000000fc!important;
	}
	.card {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px !important;
    margin: 35px 30px;
    border-radius: 15px !important;
    border: none;
}
	.card-header {
    background-color: #ebebeb;
    text-align: center;
    border-radius: 5px !important;
}
.card-body {
    background: #edf2f5;
}
select.form-control:not([size]):not([multiple]) {
    height: calc(2.7rem + 2px);
    font-family: 'Raleway', sans-serif;
}
.form-control:focus,.form-control:active{
	background: #fff !important;
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
.form-control {

    color: black;
    box-shadow: none;
    font-size: 14px;
    font-weight: 700;
    height: 44px;
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
color:#4c4c4c
}
.card-header h4 {
    font-family: 'Raleway', sans-serif;
    color: #000;
    font-weight: 500;
    font-size: 25px;
    text-align: center;
}
::placeholder {
 font-weight:400;
}
.submitbtn {
    background-color: #5069e7;
    color: #fff;
    width: 15%;
    height: 50px;
    margin-top: 25px;
}
</style>
			
<!-- Page Wrapper -->
<!--overview start-->
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Employee Form</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{url('/employeelist')}}">Employee List</a></li>
						<li class="breadcrumb-item active">Add Employee</li>
					</ul>
				</div>
			</div>
		</div>
				<!-- <ul id="" class="alert alert-info mt-3" style="display : none">
					<p>{{session('message')}}</p>
				</ul> -->
		@if(session('message'))
			<div><p class="alert alert-info mt-3" >{{session('message')}}</p> </div>
		@endif
		<!-- /Page Header -->
		
		<form action="{{ URL::to('/saveemp')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
			{{ csrf_field() }} 
				<div class="row">
				<div class="col-md-12">
					<div class="card mb-0">
						<div class="card-header">
							<h4 class="card-title mb-0">Personal Details</h4>
						</div>
						<div class="card-body">
							<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Employee Batch ID</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
									<input type="text" name="emp_batch" placeholder="Please Enter Employee Batch ID" title="Please Enter your Full Name"  class="form-control required_colom" required="required" id="name" value="{{ old('emp_batch') }}" >
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Employee Name</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
									<input type="text" name="emp_name" placeholder="Please Enter Employee Name" title="Please Enter your Full Name"  class="form-control required_colom" required="required" id="name" value="{{$data['jobapplicant']->jobapplicant_name}}" >
									</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Employee Father Name</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
									<input type="text" name="emp_fname"  placeholder="Please Enter Employee  Father Name" title="Please Enter your Seven (7) Digit ADP Employee ID"  class="allownumericwithoutdecimala form-control required_colom"  required="required" id="name" value="{{$data['jobapplicant']->jobapplicant_fname}}">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Employee CNIC</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
									<input type="text" name="emp_cnic"  placeholder="Please Enter Employee  CNIC" title="Please Enter your Seven (7) Digit ADP Employee ID"  class="allownumericwithoutdecimala form-control required_colom"  required="required" id="name" value="{{$data['jobapplicant']->jobapplicant_cnic}}">
									</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Employee Contact No</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
									<input type="text" name="emp_contactno"  placeholder="Please Enter Employee  Contact No" title="Please Enter your Seven (7) Digit ADP Employee ID"  class="allownumericwithoutdecimala form-control required_colom"  required="required" id="name" value="{{$data['jobapplicant']->jobapplicant_contact}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Employee Company Email</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
									<input type="text" name="emp_com_email"  placeholder="Please Enter Employee  Company Email" title="Please Enter your Seven (7) Digit ADP Employee ID"  class="allownumericwithoutdecimala form-control required_colom"  required="required" id="name" value="{{$data['jobapplicant']->can_email}}">
									</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Date of Birth</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
										<div class="cal-icon"><input type="text" id="sales" max=<?php echo date('Y-m-d',strtotime("-1 days")); ?>  title="Please Enter Employee  Collection" name="emp_dob"   class="form-control datetimepicker required_colom" required="required"  value="{{ old('emp_dob') }}">
										</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Date of Joining</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
										<div class="cal-icon">
										<input type="text" id="sales" max=<?php echo date('Y-m-d',strtotime("-1 days")); ?>  title="Please Enter Employee " name="emp_doj"   class="form-control datetimepicker required_colom" required="required"  value="{{ old('emp_doj') }}">
										</div>
									</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Employee Department</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
									<select class="form-control "   placeholder="Enter TM Name" name="emp_dept"  required>
                                		<option selected="" disabled="" value="{{ old('emp_dept') }}">Select Employee Department</option>
                           				@foreach($data['depart'] as $depart)
                                		<option value={{$depart->dept_id}}>{{$depart->dept_name}}</option>
                            			@endforeach 
                                </select>
								</div>
							</div>
						</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-form-label">Employee Designation</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
										<select class="form-control "   placeholder="Enter TM Name" name="emp_desg"  required>
											<option selected="" disabled="" value="{{ old('emp_desg') }}">Select Employee Designation</option>
											@foreach($data['desg'] as $desig)
											<option value={{$desig->DESG_ID}}>{{$desig->DESG_NAME}}</option>
											@endforeach 
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-form-label">Employee Reporting To</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
										<select class="form-control "  placeholder="Enter TM Name" name="emp_report"  required>
											<option selected="" disabled="" value="{{ old('emp_report') }}">Select Employee Reporting To</option>
											@foreach($data['manager'] as $mnger)
											<option value={{$mnger->elsemployees_empid}}>{{$mnger->elsemployees_name}}</option>
											@endforeach 
											<option value="1">Admin</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-form-label">Employee Role</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
										<select class="form-control "  placeholder="Enter TM Name" name="emp_role"  required>
											<option selected="" disabled="" value="{{ old('emp_role') }}">Select Employee Role</option>
											@foreach($data['role'] as $role)
											<option value={{$role->roleid}}>{{$role->rolename}}</option>
											@endforeach 
										</select>
									</div>
								</div>
							</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Employee Sick Leave</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
									<input type="text" name="emp_sick_leave" title="Please Enter Store Name" placeholder="Please Enter Employee  " class="form-control required_colom"  required="required" id="name" value="{{ old('emp_sick_leave') }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Employee Annual Leave</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
									<input type="text" name="emp_annual_leave" title="Please Enter Store Name" placeholder="Please Enter Employee Annual Leave" class="form-control required_colom"  required="required" id="name" value="{{ old('emp_annual_leave') }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="name" class="col-form-label">Employee Status:</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
									<select class="form-control "   placeholder="Enter TM Name" name="emp_status"  required>
										<option selected="" disabled="">Select Status</option>
										<option value=2>Active</option>
										<option value=1>Not Active</option>
									</select>
								</div>
							  </div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-form-label">Employee Address</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
									<textarea class="form-control" rows="4" cols="5" id="comment" name="emp_address" placeholder="Enter Address">{{$data['jobapplicant']->jobapplicant_address}}</textarea>
									</div>
							</div>
						</div>
						
							
									<!-- <div class="col-md-3">
										<label class="col-form-label">Upload Picture</label>
											<input type="file" accept=".jpg, .jpeg, .png" class="form-control">
									</div> -->
								
						
								
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card flex-fill">
						<div class="card-header">
							<h4 class="card-title mb-0">Bank Account Details</h4>
						</div>
					<div class="card-body">
						<div class="row">
						    <div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Account Tittle</label>
										<input type="text" name="emp_acctitle" placeholder="Please Enter Employee Account Tittle" class="form-control" id="name" value="{{ old('emp_acctitle') }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Account No</label>
										<input type="number" name="emp_accno" placeholder="Please Enter Employee Account No" class="form-control" id="name" value="{{ old('emp_accno') }}">
									</div>
								</div>
								<div class="col-md-4">
										<label class="col-md-3 col-form-label">IBAN No</label>
											<input type="text" name="emp_ibanno" placeholder="Please Enter Employee IBAN No" class="form-control" id="name" value="{{ old('emp_ibanno') }}">
								</div>
							</div>
						<div class="row">
							<div class="col-md-4">
								<label class="col-md-3 col-form-label">Bank Branch</label>
								<input type="text" name="emp_bbranch" placeholder="Please Enter Employee Bank Branch" class="form-control" id="name" value="{{ old('emp_bbranch') }}">
							</div>
							<div class="col-md-4">
								<label class="col-md-3 col-form-label">Bank Name</label>
								<input type="text" name="emp_bname" placeholder="Please Enter Employee Bank Name" class="form-control" id="name" value="{{ old('emp_bname') }}">
							</div>
						</div>
						
							
						</div>

					</div>
				</div>
			</div>
			<div class="row">
			<div class="col-md-12">
				<div class="card flex-fill">
					<div class="card-header">
						<h4 class="card-title mb-0">Payroll Details</h4>
					</div>
					<div class="card-body">
						<div class="row">
						    <div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Salary</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
										<input type="number" name="salary" placeholder="Please Enter Salary" title="Please Enter Salary" required class="form-control" id="salary" value="{{ old('salary') }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Provident Fund</label>
										<input type="number" name="fund" placeholder="Please Enter Provident Funds" title="Please Enter Provident Fund" required class="form-control" id="fund" value="{{ old('fund') }}0">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Payroll Date</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
										<input type="date" name="payrolldate" placeholder="Please Enter Payroll Date" title="Please Enter Payroll Date" class="form-control" id="payrolldate" value="{{ old('payrolldate') }}">
								</div>
							</div>
							</div>
							<div class="row">
						    <div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Attendance Allowance</label>
										<input type="number" name="attendance_allowance" placeholder="Please Enter Attendance Allowance" title="Please Enter Attendance Allowance" required class="form-control" id="attendance_allowance" value="{{ old('attendance_allowance') }}0">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Punctuality Allowance</label>
										<input type="number" name="punctuality_allowance" placeholder="Please Enter Punctuality Allowance" title="Please Enter Punctuality Allowance" required class="form-control" id="punctuality_allowance" value="{{ old('punctuality_allowance') }}0">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Transport Allowance</label>
										<input type="number
										" name="transport_allowance" placeholder="Please Enter Transport Allowance" title="Please Enter Transport Allowance" required class="form-control" id="transport_allowance" value="{{ old('transport_allowance') }}0">
								</div>
							</div>
						
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-form-label">Fuel Allowance</label>
											<input type="number" name="fuel_allowance" placeholder="Please Enter Fuel Allowance" title="Please Enter Fuel Allowance" required class="form-control" id="fuel_allowance" value="{{ old('fuel_allowance') }}0">
									</div>
								</div>
						    <div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Is Eligible For Car?</label><br>
									<select class="form-control " name="elsemployees_careligibility" id="elsemployees_careligibility">
										<option selected value="No">No</option>
										<option value="Yes">Yes</option>
									</select>
								</div>
							</div>
							<div class="col-md-4" id="assign" style="display: none;">
								<div class="form-group">
									<label class="col-form-label">Assign Car Or Add Amount</label><br>
									<select class="form-control " name="elsemployees_assigncaroramount" id="elsemployees_assigncaroramount">
										<option value="" selected>Please Select</option>
										<option value="Assign">Assign</option>
										<option value="Add">Add Amount</option>
		                            </select>
								</div>
							</div>
							
							</div>
							<div class="row">
								<div class="col-md-4" id="car" style="display: none;">
									<div class="form-group">
										<label class="col-form-label">Select Car</label><br>
										<select class="form-control " name="car_id" id="elsemployees_car">
											<option value="">Please Select Car</option>
											@foreach($data['car'] as $cars)
											<option value="{{$cars->car_id}}">{{$cars->car_name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-4" id="amount" style="display: none;">
									<div class="form-group">
										<label class="col-form-label">Enter Amount</label><br>
										<input type="number" name="elsemployees_caramount" id="elsemployees_caramount" placeholder="Please Enter Car Rent Amount" title="Please Enter Car Rent Amount" class="form-control" id="caramount">
									</div>
								</div>
							</div>
							<script type="text/javascript">
							$(document).ready(function(){
							$("#elsemployees_careligibility").change(function(){
							    $(this).find("option:selected").each(function(){
							        var optionValue = $(this).attr("value");
							        if(optionValue == "Yes"){
							            // $(".box").not("." + optionValue).hide();
							            $("#assign").show();
							        } else{
							            $("#assign").hide();
							            $("#amount").hide();
							            $("#car").hide();
							        }
							    });
							}).change();
							$("#elsemployees_assigncaroramount").change(function(){
							    $(this).find("option:selected").each(function(){
							        var optionValue = $(this).attr("value");
							        if(optionValue == "Assign"){
							            // $(".box").not("." + optionValue).hide();
							            $("#car").show();
							             $("#amount").hide();
							        } else if(optionValue == "Add"){
							            // $(".box").not("." + optionValue).hide();
							            $("#amount").show();
							            $("#car").hide();
							        } else{
							            $("#amount").hide();
							            $("#car").hide();
							        }
							    });
							}).change();
							});
						</script>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
			<div class="col-md-12">
				<div class="card flex-fill">
					<div class="card-header">
						<h4 class="card-title mb-0">Set Timing</h4>
					</div>
					<div class="card-body">
						<div class="row">
						    <!-- <div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Phone (Ext)</label>
										<input type="number" name="ext" placeholder="Please Enter Extention" title="Please Enter Extention" required class="form-control" id="ext" value="{{ old('ext') }}">
								</div>
							</div> -->
							<!-- <div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Employement Type</label>
										<select class="form-control "   placeholder="Employement Type" name="emp_type"  required>
											<option selected="" disabled="">Select Type</option>
											<option value="Revenue">Revenue</option>
			                                <option value="Sales">Sales</option>
			                                <option value="Other">Other</option>
                                		</select>
									</div>
								</div> -->
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-form-label">Check-In Time</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
											<input type="time" name="checkintime" placeholder="Please Enter Check-In Time" title="Please Enter Check-In Time" class="form-control" id="checkintime" value="{{ old('checkintime') }}"  required>
									</div>
								</div>
								<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">Check-Out Time</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
										<input type="time" name="checkouttime" placeholder="Please Enter Check-Out Time" title="Please Enter Check-Out Time" class="form-control" id="checkouttime" value="{{ old('checkouttime') }}"  required>
								</div>
							</div>
							</div>
							<div class="row">
						
							
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">Start Date</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
										<input type="date" name="startdate" placeholder="Please Enter Start Date" title="Please Enter Start Date" class="form-control" id="startdate" value="<?php echo(date('Y-m-d'))?>"  required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">End Date</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
										<input type="date" name="enddate" placeholder="Please Enter End Date" title="Please Enter End Date" class="form-control" id="enddate" value="{{ old('enddate')}}"  required>
								</div>
							</div>
							</div>
						
						</div>
					</div>
				</div>
			</div>
				<div class="row">
			<div class="col-md-12">
				<div class="card flex-fill">
					<div class="card-header">
						<h4 class="card-title mb-0">Email Configuration</h4>
					</div>
					<div class="card-body">
						<div class="row">
						    <div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Email Address</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
										<input type="email" name="emailaddress" required placeholder="Please Enter Email" title="Please Enter Email" class="form-control" id="emailaddress" value="{{ old('emailaddress') }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Email Password</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
										<input type="password" name="emailpassword" required placeholder="Please Enter Email Password" title="Please Enter Email Password" class="form-control" id="emailpassword" value="{{ old('emailpassword') }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Email Host</label><span style="color:red;font-size:20px;padding-left:5px;font-weight:bold">*</span>
										<input type="text" name="emailhost" required placeholder="Please Enter Email Host" title="Please Enter Email Host" class="form-control" id="emailhost" value="{{ old('emailhost') }}">
								</div>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		
	
			<div class="row">
				<div class="col-md-12">
			<div class="text-right">
										<button type="submit" class="btn submitbtn">Submit</button>
									</div>
				</div></div>
		</div>		
							</form>	
</div>
<!-- /Main Wrapper -->
<br><br><br>
@endsection