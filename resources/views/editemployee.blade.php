@extends('layout.apptheme')
@section('hr-HRM')
<div class="page-wrapper">
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Edit Employee Form</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{url('/employeelist')}}">Employee List</a></li>
						<li class="breadcrumb-item active">Edit Employee</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		@if(session('message'))
			<div><p class="alert alert-success mt-3" >{{session('message')}}</p> </div>
		@endif
		<form action="{{ URL::to('/updateemployee')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
		{{ csrf_field() }} 
			<div class="row">
				<div class="col-md-12">
					<div class="card mb-0">
						<div class="card-header">
							<h4 class="card-title mb-0">Personal Details</h4>
						</div>
						<div class="card-body">
							<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="hidden" name="hdnempid" id="hdnempid" value="{{$data['user']->elsemployees_empid}}" class="form-control"/>
									<label class="col-form-label">Employee Batch ID</label>
									<input type="text" name="emp_batch" placeholder="Please Enter Employee Batch ID" title="Please Enter your Full Name"  class="form-control required_colom" required="required" id="name" value="{{$data['user']->elsemployees_batchid}}" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">Employee Name</label>
									<input type="text" name="emp_name" placeholder="Please Enter Employee Name" title="Please Enter your Full Name"  class="form-control required_colom" required="required" id="name" value="{{$data['user']->elsemployees_name}}" >
									</div>
								</div>
									<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">Employee Father Name</label>
									<input type="text" name="emp_fname"  placeholder="Please Enter Employee  Father Name" title="Please Enter your Seven (7) Digit ADP Employee ID"  class="allownumericwithoutdecimala form-control required_colom"  required="required" id="name" value="{{$data['user']->elsemployees_fname}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">Employee CNIC</label>
									<input type="text" name="emp_cnic"  placeholder="Please Enter Employee  CNIC" title="Please Enter your Seven (7) Digit ADP Employee ID"  class="allownumericwithoutdecimala form-control required_colom"  required="required" id="name" value="{{$data['user']->elsemployees_cnic}}">
									</div>
								</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">Employee Contact No</label>
									<input type="text" name="emp_contactno"  placeholder="Please Enter Employee  Contact No" title="Please Enter your Seven (7) Digit ADP Employee ID"  class="allownumericwithoutdecimala form-control required_colom"  required="required" id="name" value="{{$data['user']->elsemployees_cno}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">Employee Company Email</label>
									<input type="text" name="emp_com_email"  placeholder="Please Enter Employee  Company Email" title="Please Enter your Seven (7) Digit ADP Employee ID"  class="allownumericwithoutdecimala form-control required_colom"  required="required" id="name" value="{{$data['user']->elsemployees_email}}">
									</div>
								</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">Date of Birth</label>
										<div class="cal-icon"><input type="text" name="emp_dob"   class="form-control datetimepicker required_colom" required="required" value="{{ $data['user']->elsemployees_dofbirth }}">
										</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">Date of Joining</label>
										<div class="cal-icon">
										<input type="text" name="emp_doj"   class="form-control datetimepicker required_colom" required="required" value="{{ $data['user']->elsemployees_dofjoining }}">
										</div>
									</div>
								</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Employee Department</label>
									<select class="form-control "  data-live-search="true" name="emp_dept"  required>
                           				@foreach($data['depart'] as $depart)
                                        <option @if ($data["user"]->elsemployees_departid == $depart->dept_id ) {{"selected"}} @endif value={{$depart->dept_id}}>{{$depart->dept_name}}</option>
                                    	@endforeach  
                                	</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Employee Designation</label>
									<select class="form-control "  data-live-search="true" name="emp_desg"  required>
		                            	@foreach($data['desg'] as $desig)
                                        <option @if ($data["user"]->elsemployees_desgid == $desig->DESG_ID ) {{"selected"}} @endif value={{$desig->DESG_ID}}>{{$desig->DESG_NAME}}</option>
                                    	@endforeach
	                                </select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Employee Reporting To</label>
									<select class="form-control "  data-live-search="true" placeholder="Enter TM Name" name="emp_report"  required>
		                            	@foreach($data['manager'] as $mnger)
                                        <option @if ($data["user"]->elsemployees_reportingto == $mnger->elsemployees_empid ) {{"selected"}} @endif value={{$mnger->elsemployees_empid}}>{{$mnger->elsemployees_name}}</option>
                                    	@endforeach
                                    	<!-- <option value="27">Salman Nadir Khairi</option> -->
	                                </select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Employee Role</label>
									<select class="form-control "  data-live-search="true" placeholder="Enter TM Name" name="emp_role"  required>
		                            	@foreach($data['role'] as $role)
                                        <option @if ($data["user"]->elsemployees_roleid == $role->roleid ) {{"selected"}} @endif value={{$role->roleid}}>{{$role->rolename}}</option>
                                    	@endforeach
	                                </select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Employee Sick Leave</label>
									<input type="text" name="emp_sick_leave" title="Please Enter Store Name" placeholder="Please Enter Employee  " class="form-control required_colom"  required="required" id="name" value="{{ $data["user"]->elsemployees_sickleaves }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Employee Annual Leave</label>
									<input type="text" name="emp_annual_leave" title="Please Enter Store Name" placeholder="Please Enter Employee Annual Leave" class="form-control required_colom"  required="required" id="name" value="{{ $data["user"]->elsemployees_annualleaves }}">
								</div>
							</div>
							<div class="col-md-8">
								<div class="form-group">
									<label class="col-form-label">Employee Address</label>
									<textarea class="form-control" rows="4" cols="5" id="comment" name="emp_address" placeholder="Enter Address">{{ $data["user"]->elsemployees_address }}</textarea>
									</div>
								</div>
									<!-- <div class="col-md-3">
										<label class="col-form-label">Upload Picture</label>
											<input type="file" accept=".jpg, .jpeg, .png" class="form-control">
									</div> -->
								<div class="col-md-4">
									<div class="form-group">
										<label for="name">Employee Status:</label>
										<select class="form-control " name="emp_status"  required>
											@foreach($data['empstatus'] as $empstatus)
											<option @if ($data["user"]->elsemployees_status == $empstatus->status_id ) {{"selected"}} @endif value={{$empstatus->status_id}}>{{$empstatus->status_name}}</option>
											@endforeach
                                		</select>
                                	</div>
						  		</div>
						  		<div class="col-md-4">
									<div class="form-group">
										<label for="name">Date Of Leaving:</label>
										<input type="date" name="dol" id="dol" class="form-control" value="{{ $data["user"]->elsemployees_dofleaving }}">
                                	</div>
						  		</div>
						  	</div>
						</div>
					</div>
				</div>
			</div><br>
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
									<label class="col-form-label">Salary</label>
										<input type="number" name="salary" placeholder="Please Enter Salary" title="Please Enter Salary" required class="form-control" id="salary" value="{{$data['salary'][0]}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Provident Fund</label>
										<input type="number" name="fund" placeholder="Please Enter Provident Funds" title="Please Enter Provident Fund" required class="form-control" id="fund" value="{{$data['salary'][1]}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Payroll Date</label>
										<input type="text" name="payrolldate" placeholder="Please Enter Payroll date" title="Please Enter Payroll date" required class="form-control datetimepicker" id="payrolldate" value="{{$data["user"]->elsemployees_dofpayroll}}">
								</div>
							</div>
							</div>
							<div class="row">
						    <div class="col-md-3">
								<div class="form-group">
									<label class="col-form-label">Attendance Allowance</label>
										<input type="number" name="attendance_allowance" placeholder="Please Enter Attendance Allowance" title="Please Enter Attendance Allowance" required class="form-control" id="attendance_allowance" value="{{$data['salary'][2]}}">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label class="col-form-label">Punctuality Allowance</label>
										<input type="number" name="punctuality_allowance" placeholder="Please Enter Punctuality Allowance" title="Please Enter Punctuality Allowance" required class="form-control" id="punctuality_allowance" value="{{$data['salary'][3]}}">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label class="col-form-label">Transport Allowance</label>
										<input type="number" name="transport_allowance" placeholder="Please Enter Transport Allowance" title="Please Enter Transport Allowance" required class="form-control" id="transport_allowance" value="{{$data['salary'][4]}}">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label class="col-form-label">Fuel Allowance</label>
										<input type="number" name="fuel_allowance" placeholder="Please Enter Fuel Allowance" title="Please Enter Fuel Allowance" required class="form-control" id="fuel_allowance" value="{{$data['salary'][5]}}">
								</div>
							</div>
							</div>
							<div class="row">
						    <div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Is Eligible For Car?</label><br>
									<select class="form-control " name="elsemployees_careligibility" id="elsemployees_careligibility">
										@if($data["user"]->elsemployees_careligibility == "Yes")
		                                <option selected value="{{ $data["user"]->elsemployees_careligibility }}">{{ $data["user"]->elsemployees_careligibility }}</option>
		                                <option value="No">No</option>
										@elseif($data["user"]->elsemployees_careligibility == "No")
										<option selected value="{{ $data["user"]->elsemployees_careligibility }}">{{ $data["user"]->elsemployees_careligibility }}</option>
										<option value="Yes">Yes</option>
										@else
										<option value="" selected>Please Select</option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
										@endif
		                            </select>
								</div>
							</div>
							<div class="col-md-4" id="assign" style="display: none;">
								<div class="form-group">
									<label class="col-form-label">Assign Car Or Add Amount</label><br>
									<select class="form-control " name="elsemployees_assigncaroramount" id="elsemployees_assigncaroramount">
										@if($data["user"]->elsemployees_assigncaroramount == "Assign")
		                                <option selected value="{{ $data["user"]->elsemployees_assigncaroramount }}">{{ $data["user"]->elsemployees_assigncaroramount }}</option>
		                                <option value="Add">Add Amount</option>
										@elseif($data["user"]->elsemployees_assigncaroramount == "Add")
										<option selected value="{{ $data["user"]->elsemployees_assigncaroramount }}">{{ $data["user"]->elsemployees_assigncaroramount }}</option>
										<option value="Assign">Assign</option>
										@else
										<option value="" selected>Please Select</option>
										<option value="Assign">Assign</option>
										<option value="Add">Add Amount</option>
		                                @endif
		                            </select>
								</div>
							</div>
							<div class="col-md-4" id="car" style="display: none;">
								<div class="form-group">
									<label class="col-form-label">Select Car</label><br>
									<select class="form-control " name="car_id" id="elsemployees_car">
										<option value="" selected>Please Select</option>
										@foreach($data['car'] as $cars)
										<option @if ($data["user"]->car_id == $cars->car_id ) {{"selected"}} @endif <option value={{$cars->car_id}}>{{$cars->car_name}}</option>
										@endforeach
		                            </select>
								</div>
							</div>
							<div class="col-md-4" id="amount" style="display: none;">
								<div class="form-group">
									<label class="col-form-label">Enter Amount</label><br>
									<input type="number" name="elsemployees_caramount" id="elsemployees_caramount" placeholder="Please Enter Car Rent Amount" title="Please Enter Car Rent Amount"  class="form-control" id="caramount" value="{{ $data["user"]->elsemployees_ext }}">
								</div>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div><br>
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
			<div class="row">
			<div class="col-md-12">
				<div class="card flex-fill">
					<div class="card-header">
						<h4 class="card-title mb-0">Office Details</h4>
					</div>
					<div class="card-body">
						<div class="row">
						    <div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">Phone (Ext)</label>
										<input type="number" name="ext" placeholder="Please Enter Extention" title="Please Enter Extention" required class="form-control" id="ext" value="{{ $data["user"]->elsemployees_ext }}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">Employement Type</label>
										<select class="form-control "   placeholder="Employement Type" name="emp_type" >
											<option selected="" value="{{ $data["user"]->elsemployees_type }}">{{ $data["user"]->elsemployees_type }}</option>
											@if($data["user"]->elsemployees_type == "Revenue")
			                                <option value="Sales">Sales</option>
			                                <option value="Other">Other</option>
											@elseif($data["user"]->elsemployees_type == "Sales")
											<option value="Revenue">Revenue</option>
											<option value="Other">Other</option>
											@elseif($data["user"]->elsemployees_type == "Other")
											<option value="Revenue">Revenue</option>
											<option value="Sales">Sales</option>
											@else
											<option value="Revenue">Revenue</option>
											<option value="Sales">Sales</option>
											<option value="Other">Other</option>
											@endif
                                		</select>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><br>
			<div class="row">
			<div class="col-md-12">
				<div class="card flex-fill">
					<div class="card-header">
						<h4 class="card-title mb-0">Bank Account Details</h4>
					</div>
					
					<div class="card-body">
						<div class="row">
						    <div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">Account Tittle</label>
										<input type="text" name="emp_acctitle" placeholder="Please Enter Employee Account Tittle" class="form-control" id="name" value="{{$data['user']->account_title}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">Account No</label>
										<input type="number" name="emp_accno" placeholder="Please Enter Employee Account No" class="form-control" id="name" value="{{$data['user']->account_no}}">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 col-form-label">IBAN No</label>
								<div class="col-md-9">
									<input type="text" name="emp_ibanno" placeholder="Please Enter Employee IBAN No" class="form-control" id="name" value="{{$data['user']->iban_no}}">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 col-form-label">Bank Branch</label>
								<div class="col-md-9">
									<input type="text" name="emp_bbranch" placeholder="Please Enter Employee Bank Branch" class="form-control" id="name" value="{{$data['user']->bank_branch}}">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 col-form-label">Bank Name</label>
								<div class="col-md-9">
									<input type="text" name="emp_bname" placeholder="Please Enter Employee Bank Name" class="form-control" id="name" value="{{$data['user']->bank_name}}">
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
									<label class="col-form-label">Email Address</label>
										<input type="email" name="emailaddress" placeholder="Please Enter Email" title="Please Enter Email" required class="form-control" id="emailaddress" value="{{$data['user']->elsemployees_emailaddress}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Email Password</label>
										<input type="password" name="emailpassword" placeholder="Please Enter Email Password" title="Please Enter Email Password" required class="form-control" id="emailpassword" value="{{$data['user']->elsemployees_emailpassword}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-form-label">Email Host</label>
									<input type="text" name="emailhost" placeholder="Please Enter Email Host" title="Please Enter Email Host" required class="form-control" id="emailhost" value="{{$data['user']->elsemployees_emailhost}}">
								</div>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div><br>
			<div class="text-right">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
							</form>
						</div>
					</div>

<!-- /Main Wrapper -->
<script>

	function getimage(){
		$("#loader").show();
              $.get('{{ URL::to("/getimage")}}',function(data){
        
                 $('#modals').empty();
                 $('#modals').append(data)
				 
               $('#getmeImage').modal('show');
              });
			  $("#loader").hide();
            }



		$('#modals').on('submit','#frmimage',function(e){
			alert("badar");
		e.preventDefault();
		var frmData = $(this).serialize();
      //	 $.post('{{ URL::to("/saveAdjustment")}}',frmData,function(data,xhrStatus,xhr){
      //		 $('#todolist').empty().append(data);
      // });
       $.ajax({
        url:'{{ URL::to("/loadimage")}}',
        type:'POST',
        data: frmData,
       })
        .done(function(data){
        $("#modals #errors").show();
        $("#modals #errors").empty().append('<li class="alert alert-success" >Task added successfully...!</li>');
        setTimeout(function(){$("#AddStore").modal('hide')
                 }, 1000);
      })
      .fail(function(error){
        var errors = error.responseJSON;
        console.log(errors)
        $("#modals #errors").empty();
        if(errors){
         errors.addStoreUId.forEach(function(element,index){
          $("#modals #errors").show();
          $("#modals #errors").append('<li class="alert alert-danger" >'+ element + '</li>');
          setTimeout(function(){$("#AddStore").modal('hide')
          			 }, 3000);
                 
          });    
        } 
      }); 
    });

</script>
@endsection