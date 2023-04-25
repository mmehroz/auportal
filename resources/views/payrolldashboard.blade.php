@extends('layout.apptheme')
@section('hr-HRM')



<style>

        #loader{
            display:none;
            position: fixed;
            height: 100%;
            width: 100%;
            top: 10px;
            bottom: 80px;
            left: 80px;
            background:url("https://mobilelinkusa.com/callingtree/public/images/loader1.gif");
            background-size: 10%;
            z-index: 1;
            background-color: #ffffff5c;
            background-repeat: no-repeat;
            background-position: 60% 80%;
        }


</style>
<!-- Page Wrapper -->
<div class="page-wrapper">
	<!-- Page Content -->
    <div class="content container-fluid">

				<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">BioMetric</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Monthly Attendance Log</li>
					</ul>
				</div>
 			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa fa-check-square-o"></i></span>
						<div class="dash-widget-info">
							<h4 id='predays'>0</h4>
							<span>Present Days</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa fa-window-close"></i></span>
						<div class="dash-widget-info">
							<h4 id="absdays">0
								<!-- <script>
									var d = new Date();
									var getTot = daysInMonth(d.getMonth(),d.getFullYear()); //Get total days in a month
									var sat = new Array();   //Declaring array for inserting Saturdays
									var sun = new Array();   //Declaring array for inserting Sundays

									for(var i=1;i<=getTot;i++){    //looping through days in month
									    var newDate = new Date(d.getFullYear(),d.getMonth(),i)
									    if(newDate.getDay()==0){   //if Sunday
									        sun.push(i);
									    }
									    if(newDate.getDay()==6){   //if Saturday
									        sat.push(i);
									    }

									}
									// console.log(sat);
									// console.log(sun);
									var totalsat = Object.keys(sat).length;
									var totalsun = Object.keys(sun).length;
									var totalsatandsun = totalsat+totalsun;
									// console.log(totalsat);
									// console.log(totalsun);
									// console.log(totalsatandsun);
									function daysInMonth(month,year) {
									    return new Date(year, month, 0).getDate();
									}
											document.write(totalsatandsun);
								</script> -->
							</h4>
							<span>OFF Days</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa fa-star"></i></span>
						<div class="dash-widget-info">
						<?php
							$currentmonth = date('m');
							$currentyear = date('Y');
							$task = DB::connection('mysql')->table('elsleaverequests')
							->where('elsleaverequests.elsleaverequests_empid','=',session()->get("id"))
							->where('elsleaverequests.elsleaverequests_leavestartdate','Like',$currentyear.'-'.$currentmonth.'-'.'%')
							->where('elsleaverequests.elsleaverequests_status','=','Done')
							->select('elsleaverequests.*')
							->count(); 
						?>
							<h4>{{$task}}</h4>
							<span>Leaves</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		@if(session('message'))
			<div><p class="alert alert-success" >{{session('message')}}</p> </div>
		@endif
		<!-- /Page Header -->
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<div id="loader"></div>		
					<div id="dynamicdata">
						
					</div>
				</div>
			</div>
		</div>
		<!-- /Page Content -->

    </div>
	<!-- /Page Wrapper -->

</div>
<script>
	
	$('document').ready(function(){
		function showdata(){
					$("#loader").show();
					
					$.get('{{ URL::to("/payrolldashboarddata")}}',function(data){
						
						$('#dynamicdata').empty().append(data);
						
						$("#loader").hide();
						
						});
				}
				
		showdata();
		
		$("#dynamicdata").on('click','.pagination a ',function(e){
					$("#loader").show();
                    e.preventDefault();
                    var url = $(this).attr('href');
                    $.get(url,function(data){
                    $('#dynamicdata').empty().append(data);
					$("#loader").hide();
					});
				});
		
	});
</script>	
<!-- /Main Wrapper -->

@endsection