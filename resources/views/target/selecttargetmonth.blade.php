@extends('layout.apptheme')
@section('hr-HRM')
			
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Employee Target</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Report</li>
					</ul>
				</div>
			</div>
		</div>
		<div>   <p class="alert alert-info" >Select Month For Employee Target Report</p> </div>
		<div class="text-right form-inline">

		</div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-lg-12">
					<form action="{{ URL::to('/employeetargetlist')}}"  method="post">
						{{csrf_field()}}
						<div class="row">
				        	<div class="col-md-8">
						        <label for="attmonth">Select Month</label>
						       <select id="attendancemonth" name="attendancemonth"   class="form-control" required >
								<option value="" selected="" disabled="">Select</option>
				                <option value="2021-01">January</option>
				                <option value="2021-02">February</option>
				                <option value="2021-03">March</option>
				                <option value="2021-04">April</option>
				                <option value="2021-05">May</option>
				                <option value="2021-06">June</option>
				                <option value="2021-07">July</option>
				                <option value="2021-08">August</option>
				                <option value="2021-09">September</option>
				                <option value="2021-10">October</option>
				                <option value="2021-11">November</option>
				                 <option value="2021-12">December</option>
				                </select>
					    	</div>
							<div class="col-md-4"><br><br>
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