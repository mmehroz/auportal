@extends('layout.apptheme')
@section('hr-HRM')
			
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">MIS</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/maindashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">MIS Report</li>
					</ul>
				</div>
			</div>
		</div>
		<div>   <p class="alert alert-info" >Select Year And Month For MIS Report</p> </div>
		<div class="text-right form-inline">

		</div>
		@if(session('message'))
			<!-- <div class="account-title">{{session('message')}}</div> -->
			<div class="account-title">   <p class="alert alert-danger" >{{session('message')}}</p>
			
			</div>
		@endif
		<div class="panel-body">
	        <div class="row">
	            <div class="col-lg-12">
					<form action="{{ URL::to('/submitmisreportmonth')}}"  method="post">
						{{csrf_field()}}
						<div class="row">
							<div class="col-md-2">
				        		<label for="attyear">Select Year</label>
				        		<select id="attendanceyear" name="attendanceyear"   class="form-control" required >
									<option value="" selected="" disabled="">Select Year</option>
									<option value="2021">2021</option>
									<option value="2022">2022</option>
									<option value="2023" selected>2023</option>
									<option value="2024">2024</option>
									<option value="2025">2025</option>
									<option value="2026">2026</option>
									<option value="2027">2027</option>
									<option value="2028">2028</option>
									<option value="2029">2029</option>
									<option value="2030">2030</option>
								</select>
				        	</div>
				        	<div class="col-md-2">
						        <label for="attmonth">Select Month</label>
						       <select id="attendancemonth" name="attendancemonth"   class="form-control" required >
								<option value="" selected="" disabled="">Select</option>
				                <option value="01">January</option>
				                <option value="02">February</option>
				                <option value="03">March</option>
				                <option value="04">April</option>
				                <option value="05">May</option>
				                <option value="06">June</option>
				                <option value="07">July</option>
				                <option value="08">August</option>
				                <option value="09">September</option>
				                <option value="10">October</option>
				                <option value="11">November</option>
				                 <option value="12">December</option>
				                </select>
					    	</div>
					    	<div class="col-md-2">
						        <label for="attmonth">Select Department</label>
						      	<select class="form-control "  name="emp_dept"  required>
                                		<option selected="" disabled="" value="{{ old('emp_dept') }}">Select Employee Department</option>
                           				@foreach($data as $depart)
                                		<option value={{$depart->dept_id}}>{{$depart->dept_name}}</option>
                            			@endforeach 
                            			<option value="all">All</option>
                                </select>
					    	</div>
					    	<div class="col-md-2">
						        <label for="attmonth">Select Type</label>
						      	<select class="form-control " name="misstatus"  required>
                                		<option selected=""  value="Active">Active</option>
                           				<option value="Hold">Hold</option>
                           				<option value="Print">Print</option>
                            	</select>
					    	</div>
							<div class="col-md-2"><br><br>
				        		<button type="submit" style="margin-left: 45%;" class="btn btn-primary position-right">Proceed<i class="icon-arrow-right14 position-right"></i></button>
							</div>
						</div>
					</form>
	            </div>
	        </div>
        </div>
    </div>				
</div>
<!-- Page Wrapper -->

@endsection