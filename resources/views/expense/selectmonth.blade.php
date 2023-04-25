@extends('layout.apptheme')
@section('hr-HRM')
			
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Expense Report</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Expense</li>
					</ul>
				</div>
			</div>
		</div>
		<div>   <p class="alert alert-info" >Select Month For Expense Report</p> </div>
		<div class="text-right form-inline">

		</div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-lg-12">
					<form action="{{ URL::to('/submitselectexpense')}}"  method="post">
						{{csrf_field()}}
						<div class="row">
				        	<div class="col-md-5">
				        		<label for="attyear">Select Year</label>
				        		<select id="expenseyear" name="expenseyear"   class="form-control" required >
									<option value="" disabled="">Select Year</option>
									<option value="2021">2021</option>
									<option selected value="2022">2022</option>
									<option value="2023">2023</option>
									<option value="2024">2024</option>
									<option value="2025">2025</option>
									<option value="2026">2026</option>
									<option value="2027">2027</option>
									<option value="2028">2028</option>
									<option value="2029">2029</option>
									<option value="2030">2030</option>
								</select>
				        	</div>
				        	<div class="col-md-5">
						        <label for="attmonth">Select Month</label>
						       	<select id="expensemonth" name="expensemonth"   class="form-control" required >
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
							<div class="col-md-2"><br><br>
				        		<button type="button" onclick="submitselectexpense()" style="margin-left: 45%;" class="btn btn-primary position-right">Proceed<i class="icon-arrow-right14 position-right"></i></button>
							</div>
						</div>
					</form>
	            </div>
	        </div>
        </div>
    </div>				
</div>
<!-- Page Wrapper -->
<script>
	function submitselectexpense(){
		var year = document.getElementById("expenseyear");
		var yearvalue = year.options[year.selectedIndex].value;
		var month = document.getElementById("expensemonth");
		var monthvalue = month.options[month.selectedIndex].value;
		if(yearvalue == "" && monthvalue == ""){
			alert("Please Select Year And Month");
		}else if(yearvalue == ""){
			alert("Please Select Year");
		}else if(monthvalue == ""){
			alert("Please Select Month");
		}else{
		window.location.replace('{{ URL::to("/submitselectexpense")}}/'+yearvalue+'/'+monthvalue);
		}
	}
</script>
@endsection