

@if(empty($data))
	
	<h2>No Data Found Of This Month</h2>
	
@else 
<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Raleway&family=Roboto:wght@500&display=swap" rel="stylesheet">
<style>
	small{
    font-size: 75% !important;
    color: #777;
}
.dangertext{
	font-weight: bold;
    color: #fff !important;
    background: #f62d51;
    padding: 4px 24px;
    border-radius: 4px;
	display:block;
}
.sucesstext{
	font-weight: bold;
    color: #fff !important;
    background: #4caf50;
    padding: 4px 24px;
    border-radius: 4px;
	display:block;
}
.halfdaytext{
	font-weight: bold;
    color: #fff !important;
    background: #ffbc34;
    padding: 4px 24px;
    border-radius: 4px;
	display:block;
}
.latearrivaltext{
	font-weight: bold;
    color: #000 !important;
    background: #ffbc34;
    padding: 4px 24px;
    border-radius: 4px;
	display:block;
}

.missoutext{
	font-weight: bold;
    color: #000 !important;
    background: #FF8C00;
    padding: 4px 24px;
    border-radius: 4px;
	display:block;
	
}

.btn-group{
    position: relative;
    margin: 10px 1px;
    display: inline-flex;
    vertical-align: middle;
}
.btn-group .btn{
    padding: 6.5px 20px !important;
}
.btn.btn-round{
    border-radius: 30px !important;
}

.btn-group .btn.btn-round{
    border-radius: 30px !important;
}

 .btn-group>.btn:not(:last-child):not(.dropdown-toggle) {
    border-top-right-radius: 0 !important;
    border-bottom-right-radius: 0 !important;
}

.btn-group>.btn:not(:first-child) {
    border-top-left-radius: 0 !important;
    border-bottom-left-radius: 0 !important;
}
.btn{
    padding: 12px 30px !important;
    margin: 5px 1px;
    font-size: 12px !important;
    box-shadow: 0 2px 2px 0 hsla(0,0%,60%,.14), 0 3px 1px -2px hsla(0,0%,60%,.2), 0 1px 5px 0 hsla(0,0%,60%,.12);
}
.btn .material-icons{
    position: relative;
    display: inline-block;
    top: 0;
    margin-top: -1.2em;
    margin-bottom: -1em;
    font-size: 1.1rem;
    vertical-align: middle;
}
.btn.btn-sm{
    border-radius:3px !important;
}

.btn.btn-just-icon.btn-sm {
    height: 30px;
    min-width: 30px;
    width: 30px;
}

.btn.btn-just-icon {
    font-size: 24px;
    height: 41px;
    min-width: 41px;
    width: 41px;
    padding: 0 !important;
    overflow: hidden;
    position: relative;
    line-height: 41px;
}

.btn.btn-just-icon.btn-round {
    border-radius: 50% !important;
}

.btn.btn-link{
    background: transparent;
    box-shadow: none;
    color: #999;
}

.btn.btn-info {
    color: #fff !important;
    background-color: #00bcd4 !important;
    border-color: #00bcd4;
    box-shadow: 0 2px 2px 0 rgba(0,188,212,.14),
                0 3px 1px -2px rgba(0,188,212,.2),
                0 1px 5px 0 rgba(0,188,212,.12) !important;
}

.btn.btn-info:hover {
    box-shadow: 0 14px 26px -12px rgba(0,188,212,.42),
                0 4px 23px 0 rgba(0,0,0,.12),
                0 8px 10px -5px rgba(0,188,212,.2) !important;
    background: #00aec5 !important;
}

.btn.btn-info.btn-link{
    background-color: transparent !important;
    color: #00bcd4 !important;
    box-shadow:none !important;
}
.btn.btn-success {
    color: #fff !important;
    background-color: #4caf50 !important;
    border-color: #4caf50;
    box-shadow: 0 2px 2px 0 rgba(76,175,80,.14),
                0 3px 1px -2px rgba(76,175,80,.2), 
                0 1px 5px 0 rgba(76,175,80,.12) !important;
}

.btn.btn-success:hover {
    box-shadow: 0 14px 26px -12px rgba(76,175,80,.42), 
                0 4px 23px 0 rgba(0,0,0,.12),   
                0 8px 10px -5px rgba(76,175,80,.2) !important;
    background: #47a44b  !important;
}
.btn.btn-success.btn-link{
    background-color: transparent !important;
    color: #4caf50 !important;
    box-shadow: none !important;
}

.btn.btn-danger {
    color: #fff !important;
    background-color: #dc3545 !important;
    border-color: #dc3545;
    box-shadow: 0 2px 2px 0 rgba(244,67,54,.14), 
                0 3px 1px -2px rgba(244,67,54,.2), 
                0 1px 5px 0 rgba(244,67,54,.12) !important;
}

.btn.btn-danger:hover {
    box-shadow: 0 14px 26px -12px rgba(244,67,54,.42), 
                0 4px 23px 0 rgba(0,0,0,.12), 
                0 8px 10px -5px rgba(244,67,54,.2) !important;
    background-color: #dc3545 !important;            
    
}

.btn.btn-off {
    color: #fff !important;
    background-color: #FF0000 !important;
    border-color: #FF0000;
    box-shadow: 0 2px 2px 0 rgba(244,67,54,.14), 
                0 3px 1px -2px rgba(244,67,54,.2), 
                0 1px 5px 0 rgba(244,67,54,.12) !important;
}

.btn.btn-off:hover {
    box-shadow: 0 14px 26px -12px rgba(244,67,54,.42), 
                0 4px 23px 0 rgba(0,0,0,.12), 
                0 8px 10px -5px rgba(244,67,54,.2) !important;
    background-color: #FF0000 !important;            
    
}



.btn.btn-danger.btn-link{
    background-color: transparent !important;
    color: #dc3545 !important;
    box-shadow: none !important;
}
.btn.btn-just-icon .material-icons {
    margin-top: 0;
    position: absolute;
    width: 100%;
    transform: none;
    left: 0;
    top: 0;
    height: 100%;
    line-height: 41px;
    font-size: 20px;
}

.btn.btn-just-icon.btn-sm .material-icons {
     font-size: 17px; 
     line-height: 29px; 
}


.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 16px;
       background: #f9f9f9 !important;
    
}

.table thead tr th {
    font-size: 13px ;
    font-weight: 300;
}

.table>thead>tr>th{
    padding: 12px 8px;
    vertical-align: middle;
    border-color: #ddd;
    font-weight: bold;
    font-family: 'Raleway', sans-serif;
    color:#000;
}

.table>tbody>tr>td{
    padding: 12px 8px;
    vertical-align: middle;
    border-color: #ddd;
    font-weight: 300;
    font-size:13px;
    color: #3c4858;
    font-family: 'Raleway', sans-serif;
}

	</style>
<!-- <style type="text/css">
	.dt-buttons{
		margin-top: 1%;
		margin-bottom: 0.5%;
	}
</style> -->
<!-- Candidates Tab -->

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table" id="pad">
						<thead>
							<tr class="bg-light text-center">
								<th>S.no</th>
							  	<th>Batch id</th>
								<th>Name</th>
								<th>Start time</th>
								<th>End time</th>
								<th>Date</th>
								<th>Day</th>
								<th>Arrival</th>
								<th>Departure</th>
								<th>Duration</th>
								<th>Request Discrepancy</th>
							</tr>
						</thead>
						<tbody>
						<?php $dateindex=1;?>
						@foreach ($data as $val)
								<?php
									$dt = $val['emp_date'];
									$emptimeinfo = DB::connection('mysql')->table('elsemployeestiming')
					                ->where('elsemployeestiming.emptime_batchid','=',$val['emp_batchid'])
					                ->select('elsemployeestiming.*')
					                ->get();
					                $todaytime = $emptimeinfo->where('emptime_startdate', '<=', $dt)->sortByDesc('emptime_id')->first();
					                if($todaytime){
										$cout_date = date('Y-m-d', strtotime($val['emp_date'] . ' +1 day'));
										$time1 = strtotime($val['emp_date'].' '.$val['emp_checkin']);
										$time2 = strtotime($cout_date.' '.$val['emp_checkout']);
										$gettime = sprintf(round($hour = abs($time1 - $time2)/(60*60)));
										$getduration = $gettime;
                    					if($dt >= $todaytime->emptime_startdate){
			                                $checkintime = date("h:i:sa",strtotime($todaytime->emptime_start));
			                            }else{
			                                $checkintime = "09:05:59pm";
			                            }
			                            if ($val['emp_departid'] == 15) {
			                            if ($dateindex <= 9) {
			                            $checkdate = "2022-01-0".$dateindex;	
			                            }else{
			                            $checkdate = "2022-01-".$dateindex;
			                            }
			                            if ($val['emp_date'] == $checkdate) {
			                            $halfdaytime = date('h:i:sa',strtotime('+1 minutes',strtotime($checkintime)));
			                            }else{
			                            $halfdaytime = date('h:i:sa',strtotime('+1 hour +26 minutes',strtotime($checkintime)));
			                        	}
			                            $dateindex++;
			                            }else{
			                            $halfdaytime = date('h:i:sa',strtotime('+1 hour +26 minutes',strtotime($checkintime)));
			                        	}
			                            // dd($checkintime);
				                    }
								?>
								<tr>
									<td class="text-center">{{$val['s.no']}}</td>
									<td class="text-center">{{$val['emp_batchid']}}</td>
									<td class="text-center">{{$val['emp_name']}}</td>
									<td class="text-center">{{$val['emp_checkin']}}</td>
									<td class="text-center">{{$val['emp_checkout']}}</td>
									<td class="text-center">{{$val['emp_date']}}</td>
									<td class="text-center">{{$val['emp_day']}}</td>
									<td class="text-center">
									@if($val['emp_labelin'] == 1 )
									<?php $attresult = "Present"?>
									<span class="sucesstext">On Time</span>
									@elseif($val['emp_labelin'] == 0) 
									@if($val['emp_checkin'] >= $halfdaytime)
									<?php $attresult = "Half Day"?>
									<span class="halfdaytext">Half Day</span>
									@else
									<?php $attresult = "Late"?>
									<span class="latearrivaltext">Late Arrival</span>
									@endif
									@elseif($val['emp_labelout'] == 2)
									<?php $attresult = "Absent"?>
									<span class="dangertext">Off Day</span>
									@else
									<?php $attresult = "Absent"?>
										<h4><span class='badge badge-warning'>Miss In</span></h4>
									@endif
											
										<!-- @if($val['emp_batchid'] == 11599 && $val['emp_date'] == "2020-10-19" )
											<h4><span class='badge badge-danger'> Late Arrival</span></h4>
										@else -->
										<!-- @endif -->
									</td>
									<td class="text-center">
										@if($val['emp_labelout'] == 1)
										<span class="sucesstext">On Time</span>
										@elseif($val['emp_labelout'] == 0) 
										<span class="dangertext">Early Departure</span>
										@elseif($val['emp_labelout'] == 2) 
										<span class="dangertext">Off Day</span>
										@elseif($val['emp_labelout'] == 3) 
											<span class='missoutext'>Miss Out</span>
										@endif
									</td>
									@if($val['emp_labelout'] == 3)
									<td class="text-center">0</td>
									@else
									<td class="text-center">{{$getduration}}</td>
									@endif
									<?php
									if (isset($cmonth)) {
										$newdate = $cmonth;
									}else{
										$newdate = $year.'-'.$month;
										// $newdate = date("Y-m", strtotime ( '-1 month' , strtotime ($yearandmonth) ));
									}
									$getcorrection = DB::connection('mysql')->table('attendancecorrection')
									->where('created_by','=',$val['emp_batchid'])
									->where('attendancecorrection_affdate','=',$val['emp_date'])
									->where('status_id','=',2)
									->select('attendancecorrection_status','attendancecorrection_title')
									->first();
									$getleave = DB::connection('mysql')->table('elsleaverequests')
									->where('elsleaverequests_empid','=',$val['emp_id'])
									->where('elsleaverequests_leavestartdate','=',$val['emp_date'])
									->select('elsleaverequests_status')
									->first();
									$getholiday = DB::connection('mysql')->table('holidays')
									->where('HOLI_DATE','=',$val['emp_date'])
									->select('HOLI_DATE','HOLI_TITLE')
									->first();	
									$getacknowledged = DB::connection('mysql')->table('acknowledgedpay')
									->where('created_by','=',$val['emp_batchid'])
									->where('acknowledgedpay_month','=',$newdate)
									->select('acknowledgedpay_month')
									->first();	
									$getdepartid = DB::connection('mysql')->table('elsemployees')
									->where('elsemployees_batchid','=',$val['emp_batchid'])
									->select('elsemployees_departid')
									->first();
									$getonday = DB::connection('mysql')->table('onday')
									->where('DEPT_ID','=',$getdepartid->elsemployees_departid)
									->where('onday_date','=',$val['emp_date'])
									->where('onday_type','=',"OFF")
									->select('onday_date')
									->first();
									?>
									@if(isset($getcorrection))
									<td class="text-center">{{$getcorrection->attendancecorrection_status}} As {{$getcorrection->attendancecorrection_title}}</td>
									@elseif($val['emp_labelout'] == 0 && $val['emp_labelin'] == 1)
									<td  class="text-center">-</td>
									@elseif($val['emp_labelin'] == 1)
									<td class="text-center">-</td>
									@elseif($val['emp_day'] == "Sunday" || $val['emp_day'] == "Saturday")
									<td class="text-center">Holiday</td>
									@elseif(isset($getonday))
									<td class="text-center">Holiday</td>
									@else
									@if(isset($getholiday))
									<td class="text-center">{{$getholiday->HOLI_TITLE}}</td>
									@else
									@if(isset($getacknowledged))
									@if(isset($getleave->elsleaverequests_status))
									<td class="text-center">{{$getleave->elsleaverequests_status}}</td>
									@else
									<td class="text-center">-</td>
									@endif
									@else
									@if($attresult == "Absent")
									@if(isset($getleave->elsleaverequests_status))
									<td class="text-center">{{$getleave->elsleaverequests_status}}</td>
									@else
									@if($val['emp_departid'] == 15)
									<td class="text-center"><a href="#" class="text-center" title="Add Correction Request" id="{{$val['emp_date']}}_{{$attresult}}" onclick="addcorrection(this.id)" data-toggle="modal" data-target="#add_correction"><i class="fa fa-plus-square text-center"></i></a><label id="span_{{$val['emp_date']}}_{{$attresult}}" style="display: none;">Keep Submiting</label></td>
									@else
									<td class="text-center"><a href="#" title="Add Leave Request" class="text-center" id="{{$val['emp_date']}}~{{$val['emp_labelout']}}" onclick="addrequest(this.id)" data-toggle="modal" data-target="#add_correction"><i class="fa fa-plus-square text-center"></i></a><label id="span_{{$val['emp_date']}}" style="display: none;">Keep Submiting</label></td>
									@endif
									@endif
									@else
									<td class="text-center"><a href="#" class="text-center" title="Add Correction Request" id="{{$val['emp_date']}}_{{$attresult}}" onclick="addcorrection(this.id)" data-toggle="modal" data-target="#add_correction"><i class="fa fa-plus-square text-center"></i></a><label id="span_{{$val['emp_date']}}_{{$attresult}}" style="display: none;">Keep Submiting</label></td>
									@endif
									@endif
									@endif
									@endif
									
								</tr>
								
						@endforeach
						</tbody>
						
					</table>
				</div>
				<center>
						<div class="row">
							<div class="col-md-4">
								{{ $data->links() }}
							</div>
						</div>
						</center>
				<div id ='modals'></div>
			</div>
		</div>
<script>
function addrequest($date){
	$.get('{{ URL::to("/addrequest")}}/'+$date,function(data){
	$('#modals').empty().append(data);
	$('#addleaverequest').modal('show');
	$("#"+$date).remove();
	document.getElementById('span_'+$date).style.display = "block";
	});
}
function addcorrection($date){
	$.get('{{ URL::to("/addcorrectionmodal")}}/'+$date,function(data){
	$('#modals').empty().append(data);
	$('#addcorrection').modal('show');
	$("#"+$date).remove();
	document.getElementById('span_'+$date).style.display = "block";
	});
}
		var absentdays = {{ $absentday }} ; 
		$('#absdays').html(absentdays);
</script>

<script>

		var presentdays = {{ $presentday }} ; 
		$('#predays').html(presentdays);
</script>

<script>

		var leavesdays = {{ $empleavedays }} ; 
		$('#levdays').html(leavesdays);
</script>

<!-- <script type="text/javascript">
	$('document').ready(function(){
	
		$('#pad').DataTable( {
				
	        // dom: 'lBfrtip',
	        // buttons: [
	        //     'copy', 'csv', 'excel', 'pdf', 'print'
	        // ]
	        aLengthMenu: [
				[15,25, 50,100,500, 2800, -1],
				[15,25, 50,100,500, 2800 ,	"All"]
			],
			iDisplayLength: 31,
			dom: 'B',
			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			],
			responsive: {
				details: {
					type: 'column'
				}
			},
				order: [1, 'asc']
	    } );
    } );
</script> -->



@endif