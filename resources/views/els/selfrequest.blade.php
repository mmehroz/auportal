@extends('layout.apptheme')
@section('hr-HRM')
 
<style>

 .leaveStyle{
	position : relative;
	left : 10px;
	margin-bottom : 12px;
 }

 </style>

<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Self Request</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Self Request</li>
					</ul>
					<div class="col-auto float-right ml-auto">
				<!-- 	@if(session()->get('role') == 1 || session()->get('role') == 2)
						<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_requestemp" onclick="addrequest_emp()" style="margin-left: 10px;"><i class="fa fa-plus"></i> Add Employee Request</a>
						@endif -->
						<!-- <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_request" onclick="addrequest()"><i class="fa fa-plus"></i> Add Request</a> -->
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa fa-star"></i></span>
						<div class="dash-widget-info">
							<?php
								$thismonth = date('F');

								$currentmonth = date('m');
								$currentyear = date('Y');
								$empleavedays = DB::connection('mysql')->table('elsleaverequests')
								->where('elsleaverequests.elsleaverequests_empid','=',session()->get("id"))
								->where('elsleaverequests.elsleaverequests_leavestartdate','Like',$currentyear.'-'.$currentmonth.'-'.'%')
								->where('elsleaverequests.elsleaverequests_status','!=','Decline')
								->select('elsleaverequests.elsleaverequests_totalleavedays')
								// ->count();
								->sum('elsleaverequests.elsleaverequests_totalleavedays');
							?>
							<h4>{{$empleavedays}}</h4>
							<span>{{$thismonth}} Leave Days</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa fa-check-square-o"></i></span>
						<div class="dash-widget-info">
							<?php
								$joindate = DB::connection('mysql')->table('elsemployees')
								->where('elsemployees.elsemployees_empid','=',session()->get("id"))
								->select('elsemployees.*')
								->first();
								
								$pdate = $joindate->elsemployees_dofjoining;

								$probationdate =  date('Y-m-d', strtotime($pdate. ' + 92 days'));
								
								$yeardate =  date('Y-m-d', strtotime($pdate. ' + 365 days'));

								$today = date('Y-m-d');

								if($today > $yeardate){
									$remainingleaves = DB::connection('mysql')->table('elsemployees')
									->where('elsemployees.elsemployees_empid','=',session()->get("id"))
									->select('elsemployees.*')
									->first();

									$leaveremaining = $remainingleaves->elsemployees_annualleaves;
									$leavetype = "Annual";
								}else{
									$remainingleaves = DB::connection('mysql')->table('elsemployees')
									->where('elsemployees.elsemployees_empid','=',session()->get("id"))
									->select('elsemployees.*')
									->first();

									$leaveremaining = $remainingleaves->elsemployees_sickleaves;
									$leavetype = "Sick";
								}
							?>
							<h4>{{$leaveremaining}}</h4>
							<span>Remaining {{$leavetype}} Leaves Days</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa fa-window-close"></i></span>
						<div class="dash-widget-info">
							<?php
								$empdata = DB::connection('mysql')->table('elsemployees')
								->where('elsemployees.elsemployees_empid','=',session()->get("id"))
								->select('elsemployees.*')
								->first();

								$currentleavesyear = $empdata->elsemployees_leaveyear;
								$currentDate = explode('-', $empdata->elsemployees_dofjoining);
								$currentMonth = $currentDate[1];
								$currentdate = $currentDate[2];

								$leavestartdate = $currentleavesyear."-".$currentMonth."-".$currentdate;

								$leaveenddate = date('Y-m-d', strtotime($leavestartdate. ' + 365 days'));

								$empleavedays = DB::connection('mysql')->table('elsleaverequests')
								->where('elsleaverequests.elsleaverequests_empid','=',session()->get("id"))
								->where('elsleaverequests.elsleaverequests_leavestartdate','>',$leavestartdate)
								->where('elsleaverequests.elsleaverequests_leavestartdate','<',$leaveenddate)
								->where('elsleaverequests.elsleaverequests_status','=','Done')
								->select('elsleaverequests.elsleaverequests_totalleavedays')
								// ->count();
								->sum('elsleaverequests.elsleaverequests_totalleavedays');
							?>
							<h4>{{$empleavedays}}</h4>
							<span>Avail Leaves Days</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table datatable"  id="sreq">
						<thead>
							<tr>
								<th class="text-right no-sort">Action</th>
								<th>BatchId</th>
								<th>Name</th>
								<th>Submit Date</th>
								<th>Total Days Leave</th>
								<th>Date Of Joining</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Type</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($data['task'] as $val)
						<tr>
							<td ><span>&nbsp;<i style="cursor: pointer;" class="fa fa-eye" onclick="viewrequest({{$val->elsleaverequests_id}})" ></i></span></td>
							<td>{{$val->elsemployees_batchid}}</td>
							<td>{{$val->elsemployees_name}}</td>
							<td>{{$val->elsleaverequests_leavesubmitdate}}</td>
						<!--<td>{{$val->elsleaverequests_reamainingsickleave}}</td>
							<td>{{$val->elsleaverequests_remainingannualleave}}</td>-->
							<td>{{$val->elsleaverequests_totalleavedays}}</td>
							<td>{{$val->elsemployees_dofjoining}}</td>
							<td>{{$val->elsleaverequests_leavestartdate}}</td>
							<td>{{$val->elsleaverequests_leaveenddate}}</td>
							@if ($val->elsleaverequests_leavetypeid == 1)
							<td style="color: green">Annual</td>
							@elseif ($val->elsleaverequests_leavetypeid == 2)
							<td style="color: blue">Sick</td>
							@else
							<td style="color: red">Correction</td>
							@endif
							<td>{{$val->elsleaverequests_status}}</td>
						</tr>
			@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
	<!-- /Page Content -->
				
	<div id ='modals'></div>
		
</div>
<!-- /Page Wrapper -->	


<script>
 
	 
	$("#datepicker_end").on("change",function (){
		
    var date1 = new Date($("#datepicker_start").val());
	var date2 = new Date($(this).val());
	var timeDiff = Math.abs(date2.getTime() - date1.getTime());
	var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1 ; 
	
	
	$('#totaldays').val(diffDays);
	
	});

	$("#datepicker_start").on("change",function (){


        var d = new Date($(this).val());

        var show = d.setDate(d.getDate() + 9);

        var dc = new Date(show);
            
        var day = dc.getDate();
        var month = dc.getMonth() + 1;
        var year = dc.getFullYear();
    
        if (month < 10) {
            month = "0" + month;
        }

        if (day < 10) {
          day = "0" + day;
        }
        var bc = year + "-" + month  + "-" + day;
            
        $("#datepicker_end").attr('max', bc);
		$("#datepicker_end").attr('min', $(this).val());

        $("#datepicker_end").val(bc);
					

	}); 

		
		
		//New Code
		function addrequest_emp(){
			$.get('{{ URL::to("/addrequestemp")}}',function(data){
			$('#modals').empty().append(data);
			$('#addleaverequest').modal('show');
			});
		}

		//Submit Employee Request
		$('#modals').on('submit','#submitleaverequest_emp',function(e){
                    e.preventDefault();
                    $("#btnsubmit").attr("disabled", true);
                    var frmData = $(this).serialize();
                 
                    $.ajax({
                        url:'{{ URL::to("/submitrequestemp")}}',
                        type:'POST',
                        data: frmData,
                        dataType: 'json',
                        success : function (data){
							// console.log(data.no);
                            $("#loader").hide();
                            $(".modal-body").append('<p class="alert alert-success">'+(data.no)+ '</p>');
                         // $("#errors").addClass("alert-success").text('Task added successfully...!');
                            
                            setTimeout(function(){$("#addleaverequest").modal('hide');
											window.location = "{{ URL::to('/selfrequest')}}";
										  }, 5000);
        
                         },
                         error : function(error){
                            console.log(error);
                            // $("#loader").hide();
                            var error = error.responseJSON;
                            $("#modals #errors").empty();
                            $(".modal-body").append('<p class="alert alert-danger">Oops Somenthing went wrong</p>');
                            
                            setTimeout(function(){$("#addleaverequest").modal('hide');
							window.location = "{{ URL::to('/selfrequest')}}";
                                             }, 5000);
                         }
                    })
                });
		//End Code

			function viewrequest($id){
			$.get('{{ URL::to("/viewrequest")}}/'+$id,function(data){
			$('#modals').empty().append(data);
			$('#requestview').modal('show');
			});
		}
        
		function addrequest(){
			$.get('{{ URL::to("/addrequest")}}',function(data){
			$('#modals').empty().append(data);
			$('#addleaverequest').modal('show');
			});
		}
		//
		$('#modals').on('submit','#submitleaverequest',function(e){
            e.preventDefault();
            $("#btnsubmit").attr("disabled", true);
            var frmData = $(this).serialize();
            // console.log(frmData)+	
            //$.post('{{ URL::to("/update")}}',frmData,function(data,xhrStatus,xhr){
                //$('#todolist').empty().append(data);
            //  $(".modal-body").append('<p class="alert alert-success">Task added successfully...! </p>');
            //});
            $.ajax({
                url:'{{ URL::to("/submitrequest")}}',
                type:'POST',
                data: frmData,
                dataType: 'json',
                success : function (data){
					// console.log(data.no);
                    $("#loader").hide();
                    $(".modal-body").append('<p class="alert alert-success">'+(data.no)+ '</p>');
                 	// $("#errors").addClass("alert-success").text('Task added successfully...!');
                    
                    setTimeout(function(){$("#addleaverequest").modal('hide');
						window.location = "{{ URL::to('/selfrequest')}}";
					}, 5000);

                },
                error : function(error){
                    console.log(error);
                    // $("#loader").hide();
                    var error = error.responseJSON;
                    $("#modals #errors").empty();
                    $(".modal-body").append('<p class="alert alert-danger">Oops Somenthing went wrong</p>');
                    
                    setTimeout(function(){$("#addleaverequest").modal('hide');
						window.location = "{{ URL::to('/selfrequest')}}";
                	}, 5000);
            	}
        	});
    	});
	
</script>
			
		@endsection