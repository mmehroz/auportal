@extends('layout.apptheme')
@section('hr-HRM')

<style>
.highcharts-figure, .highcharts-data-table table {
    min-width: 310px; 
    max-width: 800px;
    margin: 0.5em auto;
}

#container {
    height: 400px;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
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
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}
</style>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<!-- Page Wrapper -->
<div class="page-wrapper">
	<!-- Page Content -->
    <div class="content container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="welcome-box">
					<div class="welcome-img">
						<!-- <img alt="" src="{!! asset('public/assets/img/profiles/avatar-00.jpg') !!}" onclick="return viewprofile({{'"'.$data['dataa']->elsemployees_empid.'"'}});"> -->
						<a href="{{URL::to('/getimage') }}">
						<img alt="" title="Click To Change Image" src="{{URL::to('public/img/')}}/{{$data['dataa']->elsemployees_image}}"></a>
					</div>
					<div class="welcome-det">
						<h3>Welcome, {{$data['dataa']->elsemployees_name}}</h3>
						<p>{{$data['dataa']->elsemployees_email}}</p>
					</div>
				</div>
				<br>
				@if(session('message'))
					<div><p class="alert alert-success" >{{session('message')}}</p> </div>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa fa-user"></i></span>
						<div class="dash-widget-info">
							<h4>{{$data['dataa']->elsemployees_batchid}}</h4>
							<span>Employees Batch Id</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa fa-cube"></i></span>
						<div class="dash-widget-info">
							<h4>{{$data['dataa']->dept_name}}</h4>
							<span>Name Of Department</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
						<div class="dash-widget-info">
							<h4>{{$data['dataa']->DESG_NAME}}</h4>
							<span>Name Of Designation</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
				            	<!-- <form> -->
				                <div class="row">
				                    <div class="col-md-6">
				                        <div class="form-group">
				                            <label>Company</label>
				                            <input type="text" class="form-control" disabled placeholder="Company" value="AU Telecom">
				                        </div>
				                    </div>
				               
				                    <div class="col-md-6">
				                        <div class="form-group">
				                            <label for="exampleInputEmail1">Email address</label>
				                            <input type="email" class="form-control" disabled placeholder="email" value="{{$data['dataa']->elsemployees_email}}">
				                        </div>
				                    </div>
				                </div>
			                    <div class="row">
			                        <div class="col-md-6">
			                             <div class="form-group">
			                                <label>User Id</label>
			                                <input type="text" class="form-control" disabled placeholder="Username" value="{{$data['dataa']->elsemployees_batchid}}">
			                            </div>
			                        </div>
			                        <div class="col-md-6">
			                       <div class="form-group">
			                                <label>Employee Name</label>
			                                <input type="text" class="form-control" disabled placeholder="Company" value="{{$data['dataa']->elsemployees_name}}">
			                            </div>
			                        </div>
			                    </div>
			                    <div class="row">
			                        <div class="col-md-6">
			                            <div class="form-group">
			                                <label>Role</label>
			                                <input type="text" class="form-control" disabled placeholder="HomeAddress" value ="{{$data['dataa']->rolename}}" >
			                            </div>
			                        </div>
			                             <div class="col-md-6">
			                            <div class="form-group">
			                                <label>Status</label>
			                                <input type="text" class="form-control" disabled placeholder="Home Address" value="{{$data['dataa']->status_name}}"> 
			                            </div>
			                        </div>
			                    </div>
	                    		<div class="clearfix"></div>
	              				<!--   </form> -->
	            			</div>
	        			</div>
	        		</div>
				</div>
			</div>
		</div>	

		<!-- /Page Content -->

		<!-- <div class="row" style="padding-left: 5.5%;padding-right: -5.5%;max-width: 100%; margin-top: -5%;"> -->
		<div class="row">
			<!-- <div class="col-md-1">
			</div> -->
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="text-right form-inline">

								</div>
								<!-- Page Header -->
								<figure class="highcharts-figure">
									<div id="container"></div>
									<!-- <p class="highcharts-description">
										Chart showing browser market shares. Clicking on individual columns
										brings up more detailed data. This chart makes use of the drilldown
										feature in Highcharts to easily switch between datasets.
									</p> -->
								</figure>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="col-md-1">
			</div> -->
		</div>
    </div>

	<!-- /Page Wrapper -->
	
</div>
<!-- /Main Wrapper -->
	<script>
			<?php
			$gettodaysattendance = DB::connection('mysql')->table('attendance')
			->where('attendance.elsemployees_empid','=', session()->get('batchid')) 
			->where('attendance.attendance_date','=', date('Y-m-d')) 
			->select('attendance.*')
			->first();
			// dd($gettodaysattendance);
			if (isset($gettodaysattendance) == null) {
			?>
			// $( document ).ready(function() {
			// 	    swal({
			// 	  title: "Time In?",
			// 	  text: "Once Time In, you will not be able to change!",
			// 	  icon: "warning",
			// 	  buttons: true,
			// 	  dangerMode: false,
			// 	})
			// 	.then((willDelete) => {
			// 	  if (willDelete) {
			// 	    $.get('{{ URL::to("/usertimein")}}');
			// 	    swal("Time In Successfully", {
			// 	      icon: "success",
			// 	    });
			// 	  } else {
			// 	    swal("No action applied");
			// 	  }
			// 	});
			// });
		</script>
		<?php
		}
		?>
		<script>
// Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Month Wise Employee Leaves Chart'
    },
    // subtitle: {
    //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
    // },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total Number Of Leave Count'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:1f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:2f}</b> Leaves<br/>'
    },

    series: [
        {
            name: "Month",
            colorByPoint: true,
            data: [
				{
					<?php
					$leavemonths = $data['leavedata'][0][1];
						if($leavemonths == 01){
							$emplmnt = 'January';
						}elseif($leavemonths == 02){
							$emplmnt = 'February';
						}elseif($leavemonths == 03){
							$emplmnt = 'March';
						}elseif($leavemonths == 04){
							$emplmnt = 'April';
						}elseif($leavemonths == 05){
							$emplmnt = 'May';
						}elseif($leavemonths == 06){
							$emplmnt = 'June';
						}elseif($leavemonths == 07){
							$emplmnt = 'July';
						}elseif($leavemonths == '08'){
							$emplmnt = 'August';
						}elseif($leavemonths == '09'){
							$emplmnt = 'September';
						}elseif($leavemonths == 10){
							$emplmnt = 'October';
						}elseif($leavemonths == 11){
							$emplmnt = 'November';
						}else{
							$emplmnt = 'December';
						}
					?>
					
                    name: "{{$emplmnt}}",
                    y: {{$data['leavedata'][0][0]}}
                },
                {
					<?php
						$leavemonths = $data['leavedata'][1][1];
						if($leavemonths == 01){
							$emplmnt = 'January';
						}elseif($leavemonths == 02){
							$emplmnt = 'February';
						}elseif($leavemonths == 03){
							$emplmnt = 'March';
						}elseif($leavemonths == 04){
							$emplmnt = 'April';
						}elseif($leavemonths == 05){
							$emplmnt = 'May';
						}elseif($leavemonths == 06){
							$emplmnt = 'June';
						}elseif($leavemonths == 07){
							$emplmnt = 'July';
						}elseif($leavemonths == '08'){
							$emplmnt = 'August';
						}elseif($leavemonths == '09'){
							$emplmnt = 'September';
						}elseif($leavemonths == 10){
							$emplmnt = 'October';
						}elseif($leavemonths == 11){
							$emplmnt = 'November';
						}else{
							$emplmnt = 'December';
						}
					?>
					
                    name: "{{$emplmnt}}",
                    y: {{$data['leavedata'][1][0]}}
                },
                {
					<?php
					$leavemonths = $data['leavedata'][2][1];
						if($leavemonths == 01){
							$emplmnt = 'January';
						}elseif($leavemonths == 02){
							$emplmnt = 'February';
						}elseif($leavemonths == 03){
							$emplmnt = 'March';
						}elseif($leavemonths == 04){
							$emplmnt = 'April';
						}elseif($leavemonths == 05){
							$emplmnt = 'May';
						}elseif($leavemonths == 06){
							$emplmnt = 'June';
						}elseif($leavemonths == 07){
							$emplmnt = 'July';
						}elseif($leavemonths == '08'){
							$emplmnt = 'August';
						}elseif($leavemonths == '09'){
							$emplmnt = 'September';
						}elseif($leavemonths == 10){
							$emplmnt = 'October';
						}elseif($leavemonths == 11){
							$emplmnt = 'November';
						}else{
							$emplmnt = 'December';
						}
					?>
					
                    name: "{{$emplmnt}}",
                    y: {{$data['leavedata'][2][0]}}
                },
                {
					<?php
					$leavemonths = $data['leavedata'][3][1];
						if($leavemonths == 01){
							$emplmnt = 'January';
						}elseif($leavemonths == 02){
							$emplmnt = 'February';
						}elseif($leavemonths == 03){
							$emplmnt = 'March';
						}elseif($leavemonths == 04){
							$emplmnt = 'April';
						}elseif($leavemonths == 05){
							$emplmnt = 'May';
						}elseif($leavemonths == 06){
							$emplmnt = 'June';
						}elseif($leavemonths == 07){
							$emplmnt = 'July';
						}elseif($leavemonths == '08'){
							$emplmnt = 'August';
						}elseif($leavemonths == '09'){
							$emplmnt = 'September';
						}elseif($leavemonths == 10){
							$emplmnt = 'October';
						}elseif($leavemonths == 11){
							$emplmnt = 'November';
						}else{
							$emplmnt = 'December';
						}
					?>
					
                    name: "{{$emplmnt}}",
                    y: {{$data['leavedata'][3][0]}}
                },
                {
					<?php
					$leavemonths = $data['leavedata'][4][1];
						if($leavemonths == 01){
							$emplmnt = 'January';
						}elseif($leavemonths == 02){
							$emplmnt = 'February';
						}elseif($leavemonths == 03){
							$emplmnt = 'March';
						}elseif($leavemonths == 04){
							$emplmnt = 'April';
						}elseif($leavemonths == 05){
							$emplmnt = 'May';
						}elseif($leavemonths == 06){
							$emplmnt = 'June';
						}elseif($leavemonths == 07){
							$emplmnt = 'July';
						}elseif($leavemonths == '08'){
							$emplmnt = 'August';
						}elseif($leavemonths == '09'){
							$emplmnt = 'September';
						}elseif($leavemonths == 10){
							$emplmnt = 'October';
						}elseif($leavemonths == 11){
							$emplmnt = 'November';
						}else{
							$emplmnt = 'December';
						}
					?>
					
                    name: "{{$emplmnt}}",
                    y: {{$data['leavedata'][4][0]}}
                },
                {
					<?php
					$leavemonths = $data['leavedata'][5][1];
						if($leavemonths == 01){
							$emplmnt = 'January';
						}elseif($leavemonths == 02){
							$emplmnt = 'February';
						}elseif($leavemonths == 03){
							$emplmnt = 'March';
						}elseif($leavemonths == 04){
							$emplmnt = 'April';
						}elseif($leavemonths == 05){
							$emplmnt = 'May';
						}elseif($leavemonths == 06){
							$emplmnt = 'June';
						}elseif($leavemonths == 07){
							$emplmnt = 'July';
						}elseif($leavemonths == '08'){
							$emplmnt = 'August';
						}elseif($leavemonths == '09'){
							$emplmnt = 'September';
						}elseif($leavemonths == 10){
							$emplmnt = 'October';
						}elseif($leavemonths == 11){
							$emplmnt = 'November';
						}else{
							$emplmnt = 'December';
						}
					?>
					
                    name: "{{$emplmnt}}",
                    y: {{$data['leavedata'][5][0]}}
                },
                {
					<?php
					$leavemonths = $data['leavedata'][6][1];
						if($leavemonths == 01){
							$emplmnt = 'January';
						}elseif($leavemonths == 02){
							$emplmnt = 'February';
						}elseif($leavemonths == 03){
							$emplmnt = 'March';
						}elseif($leavemonths == 04){
							$emplmnt = 'April';
						}elseif($leavemonths == 05){
							$emplmnt = 'May';
						}elseif($leavemonths == 06){
							$emplmnt = 'June';
						}elseif($leavemonths == 07){
							$emplmnt = 'July';
						}elseif($leavemonths == '08'){
							$emplmnt = 'August';
						}elseif($leavemonths == '09'){
							$emplmnt = 'September';
						}elseif($leavemonths == 10){
							$emplmnt = 'October';
						}elseif($leavemonths == 11){
							$emplmnt = 'November';
						}else{
							$emplmnt = 'December';
						}
					?>
					
                    name: "{{$emplmnt}}",
                    y: {{$data['leavedata'][6][0]}}
                },
				{
					<?php
					$leavemonths = $data['leavedata'][7][1];
						if($leavemonths == 01){
							$emplmnt = 'January';
						}elseif($leavemonths == 02){
							$emplmnt = 'February';
						}elseif($leavemonths == 03){
							$emplmnt = 'March';
						}elseif($leavemonths == 04){
							$emplmnt = 'April';
						}elseif($leavemonths == 05){
							$emplmnt = 'May';
						}elseif($leavemonths == 06){
							$emplmnt = 'June';
						}elseif($leavemonths == 07){
							$emplmnt = 'July';
						}elseif($leavemonths == '08'){
							$emplmnt = 'August';
						}elseif($leavemonths == '09'){
							$emplmnt = 'September';
						}elseif($leavemonths == 10){
							$emplmnt = 'October';
						}elseif($leavemonths == 11){
							$emplmnt = 'November';
						}else{
							$emplmnt = 'December';
						}
					?>
					
                    name: "{{$emplmnt}}",
                    y: {{$data['leavedata'][7][0]}}
                },
                {
					<?php
					$leavemonths = $data['leavedata'][8][1];
						if($leavemonths == 01){
							$emplmnt = 'January';
						}elseif($leavemonths == 02){
							$emplmnt = 'February';
						}elseif($leavemonths == 03){
							$emplmnt = 'March';
						}elseif($leavemonths == 04){
							$emplmnt = 'April';
						}elseif($leavemonths == 05){
							$emplmnt = 'May';
						}elseif($leavemonths == 06){
							$emplmnt = 'June';
						}elseif($leavemonths == 07){
							$emplmnt = 'July';
						}elseif($leavemonths == '08'){
							$emplmnt = 'August';
						}elseif($leavemonths == '09'){
							$emplmnt = 'September';
						}elseif($leavemonths == 10){
							$emplmnt = 'October';
						}elseif($leavemonths == 11){
							$emplmnt = 'November';
						}else{
							$emplmnt = 'December';
						}
					?>
					
                    name: "{{$emplmnt}}",
                    y: {{$data['leavedata'][8][0]}}
                },
                {
					<?php
					$leavemonths = $data['leavedata'][9][1];
						if($leavemonths == 01){
							$emplmnt = 'January';
						}elseif($leavemonths == 02){
							$emplmnt = 'February';
						}elseif($leavemonths == 03){
							$emplmnt = 'March';
						}elseif($leavemonths == 04){
							$emplmnt = 'April';
						}elseif($leavemonths == 05){
							$emplmnt = 'May';
						}elseif($leavemonths == 06){
							$emplmnt = 'June';
						}elseif($leavemonths == 07){
							$emplmnt = 'July';
						}elseif($leavemonths == '08'){
							$emplmnt = 'August';
						}elseif($leavemonths == '09'){
							$emplmnt = 'September';
						}elseif($leavemonths == 10){
							$emplmnt = 'October';
						}elseif($leavemonths == 11){
							$emplmnt = 'November';
						}else{
							$emplmnt = 'December';
						}
					?>
					
                    name: "{{$emplmnt}}",
                    y: {{$data['leavedata'][9][0]}}
                },
                {
					<?php
					$leavemonths = $data['leavedata'][10][1];
						if($leavemonths == 01){
							$emplmnt = 'January';
						}elseif($leavemonths == 02){
							$emplmnt = 'February';
						}elseif($leavemonths == 03){
							$emplmnt = 'March';
						}elseif($leavemonths == 04){
							$emplmnt = 'April';
						}elseif($leavemonths == 05){
							$emplmnt = 'May';
						}elseif($leavemonths == 06){
							$emplmnt = 'June';
						}elseif($leavemonths == 07){
							$emplmnt = 'July';
						}elseif($leavemonths == '08'){
							$emplmnt = 'August';
						}elseif($leavemonths == '09'){
							$emplmnt = 'September';
						}elseif($leavemonths == 10){
							$emplmnt = 'October';
						}elseif($leavemonths == 11){
							$emplmnt = 'November';
						}else{
							$emplmnt = 'December';
						}
					?>
					
                    name: "{{$emplmnt}}",
                    y: {{$data['leavedata'][10][0]}}
                },
                {
					<?php
					$leavemonths = $data['leavedata'][11][1];
						if($leavemonths == 01){
							$emplmnt = 'January';
						}elseif($leavemonths == 02){
							$emplmnt = 'February';
						}elseif($leavemonths == 03){
							$emplmnt = 'March';
						}elseif($leavemonths == 04){
							$emplmnt = 'April';
						}elseif($leavemonths == 05){
							$emplmnt = 'May';
						}elseif($leavemonths == 06){
							$emplmnt = 'June';
						}elseif($leavemonths == 07){
							$emplmnt = 'July';
						}elseif($leavemonths == '08'){
							$emplmnt = 'August';
						}elseif($leavemonths == '09'){
							$emplmnt = 'September';
						}elseif($leavemonths == 10){
							$emplmnt = 'October';
						}elseif($leavemonths == 11){
							$emplmnt = 'November';
						}else{
							$emplmnt = 'December';
						}
					?>
					
                    name: "{{$emplmnt}}",
                    y: {{$data['leavedata'][11][0]}}
                },
                {
					<?php
					$leavemonths = $data['leavedata'][12][1];
						if($leavemonths == 01){
							$emplmnt = 'January';
						}elseif($leavemonths == 02){
							$emplmnt = 'February';
						}elseif($leavemonths == 03){
							$emplmnt = 'March';
						}elseif($leavemonths == 04){
							$emplmnt = 'April';
						}elseif($leavemonths == 05){
							$emplmnt = 'May';
						}elseif($leavemonths == 06){
							$emplmnt = 'June';
						}elseif($leavemonths == 07){
							$emplmnt = 'July';
						}elseif($leavemonths == '08'){
							$emplmnt = 'August';
						}elseif($leavemonths == '09'){
							$emplmnt = 'September';
						}elseif($leavemonths == 10){
							$emplmnt = 'October';
						}elseif($leavemonths == 11){
							$emplmnt = 'November';
						}else{
							$emplmnt = 'December';
						}
					?>
					
                    name: "{{$emplmnt}}",
                    y: {{$data['leavedata'][12][0]}}
                },
            ]
        }
    ]
});
</script>

@endsection