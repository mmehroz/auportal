@extends('layout.apptheme')
@section('hr-HRM')
<div id="filteration">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<style>
	a {
		text-decoration: none !important;
	}
	.toast{
		max-width: 100% !important;
		margin-bottom: 10px
	}
	.highcharts-figure,
	.highcharts-data-table table {
	    min-width: 310px;
	    max-width: 800px;
	    margin: 1em auto;
	}

	#container {
	    height: 400px;
	}

	.highcharts-data-table table {
	    font-family: Verdana, sans-serif;
	    border-collapse: collapse;
	    border: 1px solid #ebebeb;
	    margin: 10px auto;
	    text-align: center;
	    width: 100%;
	    max-width: 500px;
	}

	.highcharts-data-table caption {
	    padding: 1em 0;
	    font-size: 1.2em;
	    color: #555;
	}

	.highcharts-data-table th {
	    font-weight: 600;
	    padding: 0.5em;
	}

	.highcharts-data-table td,
	.highcharts-data-table th,
	.highcharts-data-table caption {
	    padding: 0.5em;
	}

	.highcharts-data-table thead tr,
	.highcharts-data-table tr:nth-child(even) {
	    background: #f8f8f8;
	}

	.highcharts-data-table tr:hover {
	    background: #f1f7ff;
	}
	.media{
		
	}
	.media-body{
		padding-left: 15px;
		
	}
	.media-body h5{
		font-size: 14px;color:#000000; height: 9px; font-family: 'Montserrat', sans-serif; font-weight:600;
	}
	.media-body span{
	color: #98a6ad;
	text-transform: capitalize;
	font-family: 'Montserrat', sans-serif;
	font-size: 14px;
}
.headingtitle{
	margin-left: 0px;
    color: #000;
    font-size: 20px;
    font-family: 'Montserrat', sans-serif;
    text-transform: uppercase;
    font-weight: 600;
}
.abc{
	box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 30px; border-radius: 7px;
		
}
.table-responsive {
	background: #fff;
	box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
	border-radius: 5px;
}
.table {
    width: 100%;
    max-width: 100%;

}
.table>tbody>tr>td {
    padding: 12px 8px;
    vertical-align: middle;
    border-color: #ddd;
    font-weight: 300;
    font-size: 13px;
    color: #3c4858;
    font-family: 'Raleway', sans-serif;
}
.table td, .table th {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
.tableheading{
	text-align: center;
    font-size: 18px;
    padding-top: 15px;
    color: #000;
	font-family: 'Raleway', sans-serif;
    font-weight: 600;
}

table.table td h2.table-avatar{
	font-weight: 300;
    font-size: 13px;
    color: #3c4858;
    font-family: 'Raleway', sans-serif;
}
.submitbtn{
	background: #40c4f1 !important;
    color: #fff !important;
    font-weight: 600;
    width: 35%;
    margin-left: 10px;
}
.calendarbtn{
	width: 35%;
}
.scrolldiv{
	height: 490px;
	overflow-y: scroll;
}

</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
			




				<div class="container-fluid">
<div class="col-lg-12">
<div>

	<div class="row mt-2 abc">
		<div class="col-lg-12 mb-3">
			<h3 class="headingtitle">Personal Details</h3>
		</div>
		<div class="col-lg-4">
			<div class="media">
				<img src="{!! asset('public/dashboard-icons/user.png') !!}" style="width: 10%;">
				<div class="media-body">
				  <h5 class="mt-0">Name</h5>
				 <span>{{$data['empdata']->elsemployees_name}}</span> 
				</div>
			  </div>											
		</div>

		<div class="col-lg-4">
			
			  <div class="media">
				<img src="{!! asset('public/dashboard-icons/mail.png') !!}" style="width: 10%;">
				<div class="media-body">
				  <h5 class="mt-0">Email address</h5>
				  <span>{{$data['empdata']->elsemployees_email}}</span> 
				</div>
			  </div>
		</div>
		<div class="col-lg-4">
			<div class="media">
				<img src="{!! asset('public/dashboard-icons/userid.png') !!}" style="width: 10%;">
				<div class="media-body">
				  <h5 class="mt-0">User Id</h5>
				 <span>{{$data['empdata']->elsemployees_batchid}}</span> 
				</div>
			  </div>
	
		</div>
		<div class="col-lg-4 mt-5">
			<div class="media">
				<img src="{!! asset('public/dashboard-icons/company.png') !!}" style="width: 10%;">
				<div class="media-body">
				  <h5 class="mt-0">Company</h5>
				 <span>AU Telecom</span> 
				</div>
			  </div>
		
		</div>

		<div class="col-lg-4 mt-5">
			<div class="media">
				<img src="{!! asset('public/dashboard-icons/role.png') !!}" style="width: 10%;">
				<div class="media-body">
				  <h5 class="mt-0">Role</h5>
				 <span>{{$data['empdata']->rolename}}</span> 
				</div>
			  </div>
	
		</div>
		<div class="col-lg-4 mt-5">
			<div class="media">
				<img src="{!! asset('public/dashboard-icons/status.png') !!}" style="width: 10%;">
				<div class="media-body">
				  <h5 class="mt-0">Status</h5>
				 <span>Active</span> 
				</div>
			  </div>
		
		</div>
	</div>
	<div class="row mt-2 abc">
		<div class="col-lg-12 mb-3">
			<h3 class="headingtitle">Office Details</h3>
		</div>
		<div class="col-lg-4">
			<div class="media">
				<img src="{!! asset('public/dashboard-icons/employees.png') !!}" style="width: 10%;">
				<div class="media-body">
				  <h5 class="mt-0">No Of Employees</h5>
				 <span>{{$data['emptota']}}</span> 
				</div>
			  </div>
		</div>

		<div class="col-lg-4">
			<div class="media">
				<img src="{!! asset('public/dashboard-icons/departments.png') !!}" style="width: 10%;">
				<div class="media-body">
				  <h5 class="mt-0">No Of Departments</h5>
				 <span>{{$data['countdpt']}}</span> 
				</div>
		  </div>
		</div>


		<div class="col-lg-4">
			<div class="media">
				<img src="{!! asset('public/dashboard-icons/designation.png') !!}" style="width: 10%;">
				<div class="media-body">
				  <h5 class="mt-0">No Of Designations</h5>
				 <span>{{$data['desgc']}}</span> 
				</div>
			  </div>
		</div>



	
		
	</div>
</div>
</div>









				</div>

				<div class="container-fluid">
				<div class="row mt-3">
					<div class="col-lg-8">
						
						<div class="card">
							<div class="card-body">
								
								<div class="form-group d-flex">
									<input type="month" class="form-control calendarbtn" name="filter" id="filter">
									<input type="button" class="btn form-control submitbtn" name="btnfilter" value="Submit" onclick="filteradminDashboard();" style="color: #0c0c0c;background-color: #40c4f1; border-color: #40c4f1;">
								</div>
							
					<!-- <form> -->
			   

				

			
								<div class="form-group">
									<figure class="highcharts-figure">
										<div id="container"></div>
									</figure>
								</div>
				
					<div class="clearfix"></div>
				</div>
			</div>
		
				</div>
					<div class="col-lg-4">
						<div class="scrolldiv">
						<div class="table-responsive">
							<h3 class="tableheading">Up Comming Employee Birthday</h3>
							<table class="table" >
						<thead>
							<tr class="bg-light">
								<th>Name</th>
								<th class="text-center">Department</th>
								<th class="text-center">Dob</th>
						</thead>
						<tbody>
							@foreach ($data['bddata'] as $val)
								@if(isset($val->elsemployees_empid))
							<tr>
								
									<td class="">
										<h2 class="table-avatar">
											<a href="{{url('/employeeprofile')}}/{{$val->elsemployees_empid}}" target="_blank">
												<img  style="cursor: pointer;" alt="" title="Click To View Profile" class="avatar" src="{{URL::to('public/img/')}}/{{$val->elsemployees_image}}">
											</a>
									
											{{$val->elsemployees_name}}
										
										</h2></td>
									<td class="text-center">{{$val->dept_name}}</td>
									<td class="text-center">{{$val->elsemployees_dofbirth}}</td>
								</tr>			
												</tbody>
												@endif
												@endforeach
					</table>
						</div>
						<div class="table-responsive mt-3">
							<h3 class="tableheading">Up Comming Employee Anniversary</h3>
							<table class="table" >
						<thead>
							<tr class="bg-light">
								<th>Name</th>
								<th class="text-center">Department</th>
								<th class="text-center">Doj</th>
						</thead>
						<tbody>
							@foreach ($data['jdata'] as $val)
							@if(isset($val->elsemployees_empid))
							<tr>
								
									<td class="">
										<h2 class="table-avatar">
											<a href="{{url('/employeeprofile')}}/{{$val->elsemployees_empid}}" target="_blank">
												<img  style="cursor: pointer; border-radius: 35px;" alt="" title="Click To View Profile" class="avatar" src="{{URL::to('public/img/')}}/{{$val->elsemployees_image}}">
											</a>
									
											{{$val->elsemployees_name}}
										
										</h2></td>
									<td class="text-center">{{$val->dept_name}}</td>
									<td class="text-center">{{$val->elsemployees_dofjoining}}</td>
								</tr>			
												</tbody>
												@endif
												@endforeach
					</table>
						</div>
						<div class="table-responsive mt-3">
							<h3 class="tableheading">Up Comming Payroll Employee</h3>
							<table class="table" >
						<thead>
							<tr class="bg-light">
								<th>Name</th>
								<th class="text-center">Department</th>
								<th class="text-center">Doj</th>
						</thead>
						<tbody>
							@foreach ($data['pdata'] as $val)
							@if(isset($val->elsemployees_empid))
							<tr>
								
									<td class="">
										<h2 class="table-avatar">
											<a href="{{url('/employeeprofile')}}/{{$val->elsemployees_empid}}" target="_blank">
												<img  style="cursor: pointer; border-radius: 35px;" alt="" title="Click To View Profile" class="avatar" src="{{URL::to('public/img/')}}/{{$val->elsemployees_image}}">
											</a>
									
											{{$val->elsemployees_name}}
										
										</h2></td>
									<td class="text-center">{{$val->dept_name}}</td>
									<td class="text-center">{{$val->elsemployees_dofjoining}}</td>
								</tr>			
												</tbody>
												@endif
												@endforeach
					</table>
						</div>
						<div class="table-responsive mt-3">
							<h3 class="tableheading">Pending Complains</h3>
							<table class="table" >
						<thead>
							<tr class="bg-light">
								<th>Name</th>
								<th class="text-center">Date</th>
								<th class="text-center">Complain</th>
						</thead>
						<tbody>
							<?php $getcomplains = DB::connection('mysql')->table('complain')
							->join ('elsemployees','elsemployees.elsemployees_batchid', '=','complain.created_by')
							->where('complainstatus_id','=', 1) 
							->orderBy('complain_id','DESC') 
							->select('complain.*','elsemployees_empid','elsemployees_name','elsemployees_image')
							->get();?>
						
							@foreach ($getcomplains as $complains)
							@if(isset($complains->complain_id))
							<tr>
								
									<td class="">
										{{$complains->elsemployees_name}}</td>
									<td class="text-center">{{$complains->complain_date}}</td>
									<td class="text-center">{{$complains->complain_note}}</td>
								</tr>			
												</tbody>
												@endif
												@endforeach
					</table>
						</div>
					</div>
					</div>
				</div>
			
				</div>
                <div class="content container-fluid">
				
			
				
			
					

</div>				
		</div>
	</div>
</div>
<div id ='modals'></div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
	function filteradminDashboard(){
		var filter = document.getElementById('filter').value;
		$.get('{{ URL::to("/filteradminDashboard")}}/'+filter,function(data){
		$('#filteration').empty().append(data);
		});
	}
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Department Wise Attendance Correction'
    },
    subtitle: {
        text: 'Monthly Counts'
    },
    xAxis: {
        categories: [
        <?php 
        $filter = $data['filtermonth'];
        $depart = DB::connection('mysql')->table('hrm_Department')
		->select('dept_id','dept_name')
		->get();
		$nooflate = array();
		$noofhalf = array();
		$noofabsent = array();
		$sortemployees = array();
		$index=0;
		foreach ($depart as $departs) {
			$employee = DB::connection('mysql')->table('elsemployees')
	        ->where('elsemployees_departid','=',$departs->dept_id)
	        ->where('elsemployees_status','=',2)
	        ->select('elsemployees_empid','elsemployees_batchid')
	        ->get();	
			foreach ($employee as $employees) {
				$sortemployees[] = $employees->elsemployees_batchid;
			}
			$nooflate[$index] = DB::connection('mysql')->table('attendancecorrection')
	        ->whereIn('created_by',$sortemployees)
	        ->where('attendancecorrection_title','=',"Late")
	        ->where('attendancecorrection_affdate','like',"$filter".'%')
	        ->where('status_id','=',2)
	        ->select('attendancecorrection_id')
	        ->count();
	    	$noofhalf[$index] = DB::connection('mysql')->table('attendancecorrection')
	        ->whereIn('created_by',$sortemployees)
	        ->where('attendancecorrection_title','=',"Half Day")
	        ->where('attendancecorrection_affdate','like',"$filter".'%')
	        ->where('status_id','=',2)
	        ->select('attendancecorrection_id')
	        ->count();
	        $noofabsent[$index] = DB::connection('mysql')->table('attendancecorrection')
	        ->whereIn('created_by',$sortemployees)
	        ->where('attendancecorrection_title','=',"Absent")
	        ->where('attendancecorrection_affdate','like',"$filter".'%')
	        ->where('status_id','!=',1)
	        ->select('attendancecorrection_id')
	        ->count();
		?>
			'{{$departs->dept_name}}',
		<?php
		$index++;
		}
		?>
        
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'No. Of Days'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Late',
        data: [<?php foreach ($nooflate as $nooflates) {
        	print_r($nooflates)
        ?>,<?php } ?>]

    }, {
        name: 'Absent',
        data: [<?php foreach ($noofabsent as $noofabsents) {
        	print_r($noofabsents)
        ?>,<?php } ?>]

    },  {
        name: 'Half Day',
        data: [<?php foreach ($noofhalf as $noofhalfs) {
        	print_r($noofhalfs)
        ?>,<?php } ?>]

    }]
});
</script>
</div>
@endsection