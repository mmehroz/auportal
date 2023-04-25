@extends('layout.apptheme')
@section('hr-HRM')

<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Employee Request</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">View Request</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
					
					<!-- Search Filter -->
					<!-- <div class="row filter-row">
						<div class="col-sm-6 col-md-3">  
							<div class="form-group form-focus">
								<input type="number" class="form-control floating">
								<label class="focus-label">Batch ID</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">  
							<div class="form-group form-focus">
								<input type="text" class="form-control floating">
								<label class="focus-label">Name</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-4">  
							<a href="#" class=""></a>  
						</div>
						<div class="col-sm-6 col-md-2">  
							<a href="#" class="btn btn-success btn-block"> Search </a>  
						</div>     
                    </div> -->

					<form method="get">
						<div class="row">
					        	<div class="col-md-5">
								<div class="form-group">
							        <label for="start">To</label>
							        <input type="date" class="form-control" id="start" name="trip"/>
						    	</div>
								</div>
							    <div class="col-md-5">
								<div class="form-group">
							        <label for="end">From</label>
							        <input type="date" class="form-control" id="end" name="trip"/>
							    </div>
								</div>
							<div class="col-md-2">
							<div class="form-group">
				            	<button type="button" style="margin-top: 30px; padding:9px 20px;" class="btn btn-success pull-right" onClick="jump(start,end)"  id="btnProceed">Proceed</button>
							</div>
							</div>
						</div>
					<form>

					<!-- /Search Filter -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable" id="vreq">
									<thead>
										<tr>
											<th>Batch ID</th>
											<th>Name</th>
											<th>Department</th>
											<th>Joining Date</th>
											<th>Submit Date</th>
											<th>Total Leave Day</th>
											<th>Leave From</th>
											<th>Leave To</th>
											<th>Type</th>
											<th>Status</th>
											<th class="text-right no-sort">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($data as $val)
										<?php
											$deptname = DB::connection('mysql')->table('hrm_Department')
											->where('hrm_Department.dept_id','=',$val->elsemployees_departid)
											->select('hrm_Department.dept_name')
											->first();
											
											$departmentname = $deptname->dept_name;
												if($departmentname != null){
												$finaldepartment = $departmentname;
											}else{
												$finaldepartment = "Not Available";
											}
										?>
											<tr>
												<td>{{$val->elsemployees_batchid}}</td>
												<td>{{$val->elsemployees_name}}</td>
												<td>{{$finaldepartment}}</td>
												<td>{{$val->elsemployees_dofjoining}}</td>
												<td>{{$val->elsleaverequests_leavesubmitdate}}</td>
											<!--<td>{{$val->elsleaverequests_reamainingsickleave}}</td>
												<td>{{$val->elsleaverequests_remainingannualleave}}</td>-->
												@if( session()->get("role") <=	 2)
												<td @if($val->elsleaverequests_totalleavedays == 3) style="background-color: #678c40; color: #ffffff; @elseif($val->elsleaverequests_totalleavedays > 10) style="background-color: #ff0000; color: #ffffff; @elseif($val->elsleaverequests_totalleavedays > 3 OR $val->elsleaverequests_totalleavedays == 10) style="background-color: #17a2b8; color: #ffffff; @endif">{{$val->elsleaverequests_totalleavedays}}</td>
												@else
												<td>{{$val->elsleaverequests_totalleavedays}}</td>
												@endif
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
												<td >
													@if ( session()->get("role") == 1 )
													<span>
														<i style="cursor: pointer;" onclick="edit({{'"'.$val->elsleaverequests_id.'"'}})" title="Edit request" class="fa fa-pencil-square-o"></i>&nbsp;
													</span>
													@endif
													@if ( $val->elsleaverequests_status == "Approved" AND session()->get("role") <= 2   )
													&nbsp;&nbsp;
													<span>
														<i style="cursor: pointer;" onclick="done({{'"'.$val->elsleaverequests_id.'"'}})" title="HR DONE request" class="fa fa-check-square-o"></i>&nbsp;
													</span>
													@endif
													@if ( $val->elsleaverequests_status != "Pending" AND session()->get("role") <= 2   )
													&nbsp;&nbsp;<span>
														<i style="cursor: pointer;" onclick="decline({{'"'.$val->elsleaverequests_id.'"'}})" title="Decline Request"  class="fa fa-close"></i>&nbsp;
													</span>&nbsp;
														@elseif( $val->elsleaverequests_status == "Pending" AND session()->get("role") == 3 )
													&nbsp;<span>
														<i style="cursor: pointer;" onclick="approve({{'"'.$val->elsleaverequests_id.'"'}})" title="Approve request" class="fa fa-check text-success"></i>
													&nbsp;</span>
													&nbsp;&nbsp;<span>
														<i style="cursor: pointer;" onclick="decline({{'"'.$val->elsleaverequests_id.'"'}})" title="Decline Request"  class="fa fa-close"></i>&nbsp;
													</span>&nbsp;
													&nbsp;<span>
														<i style="cursor: pointer;" onclick="declinecomment({{'"'.$val->elsleaverequests_id.'"'}})" title="Decline with Comment Request"  class="fa fa-times-circle-o"></i>&nbsp;
													</span>
													@endif
													@if(session()->get("email") == "salman.khairi@bizzworld.com")
														@if( $val->elsleaverequests_status == "COO Approval Required" AND session()->get("role") == 3 )
														&nbsp;
														<span>
															<i style="cursor: pointer;" onclick="approve({{'"'.$val->elsleaverequests_id.'"'}})" title="Approve request" class="fa fa-check text-success"></i>&nbsp;
														</span>
													&nbsp;&nbsp;
													<span>
														<i style="cursor: pointer;" onclick="decline({{'"'.$val->elsleaverequests_id.'"'}})" title="Decline Request"  class="fa fa-close"></i>&nbsp;
													</span>&nbsp;
													&nbsp;<span>
														<i style="cursor: pointer;" onclick="declinecomment({{'"'.$val->elsleaverequests_id.'"'}})" title="Decline with Comment Request"  class="fa fa-times-circle-o"></i>
													</span>
													@endif
													@endif
													<span>&nbsp;
														<i style="cursor: pointer;" onclick="emprequestshow({{'"'.$val->elsleaverequests_id.'"'}})"title="View Request" class="fa fa-eye"></i>
													</span></td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->
				
				<!-- Add Request Modal -->
				
				<!-- /Add Request Modal -->
				
				<!-- Vie Request Modal -->
				<div id="view_request" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">view Request</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Batch Id <span class="text-danger"></span></label>
												<input class="form-control" value="11234" type="number" readonly="">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Name</label>
												<input class="form-control" value="M. Yaseen" type="text" readonly="">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Remaining Sick <span class="text-danger"></span></label>
												<input class="form-control" value="1" type="number" readonly="">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Remaining Annual <span class="text-danger"></span></label>
												<input class="form-control" value="12" type="number" readonly="">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="col-form-label">Date of Joining</label>
												<div class="col-lg-14">
													<input type="Text"  name="" value="2019-06-11" class="form-control" readonly >
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="col-form-label">Date of Submit</label>
												<div class="col-lg-14">
													<input type="Text"  name="" value="2019-06-11" class="form-control" readonly >
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="col-form-label">Start Date</label>
												<div class="col-lg-14">
													<input type="Text"  name="" value="2019-06-11" class="form-control" readonly >
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="col-form-label">End Date</label>
												<div class="col-lg-14">
													<input type="Text"  name="" value="2019-06-11" class="form-control" readonly >
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
											<label class="col-form-label">Total Days of leave</label>
											
														<input id=""  name=""  placeholder="" value="1"  class="form-control" readonly >
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="col-lg-6 text-bold">Status</label>
												<input type="text" id="batchid"  value="Done" class="form-control" readonly>
											</div>
										</div>
										<div class="col-md-6 leaveStyle form-horizontal">
											<p class="text-bold">Leave Type:</p>
											<label class="btn btn-primary" style="width :300px" >
												<input type="radio" id="" disabled checked = "checked" class="" name="" readonly >&nbsp;Annual Leave
											</label>
											 <br />
											<label class="btn bg-success" style="width :300px">
												<input type="radio" id="" disabled checked ="checked" class="" name="" readonly >&nbsp;Sick Leave
											</label>
											 <br />
											<label class="btn btn-info" style="width :300px">
												<input type="radio" id="" disabled checked = "checked" class="" name="" readonly >&nbsp;Unpaid Leave
											</label>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="col-form-label">User Reason</label>
												<div class="col-lg-14">
													<textarea rows="3" cols="3" class="form-control" placeholder="Enter Reason" id=""  name="" style="height: 125px"  readonly></textarea>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="col-form-label">Approver Comment</label>
												<div class="col-lg-14">
													<textarea rows="3" cols="3" class="form-control" placeholder="Enter Reason" id=""  name="" style="height: 125px"  readonly></textarea>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="col-form-label">HR Comment</label>
												<div class="col-lg-14">
													<textarea rows="3" cols="3" class="form-control" placeholder="Enter Reason" id=""  name="" style="height: 125px"  readonly></textarea>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Vie Request Modal -->
				<div id ='modals'></div>
            </div>
			<!-- /Page Wrapper -->	
			<script>

			function jump(start,end){
				  if ($("#start").val() == "" & $("#end").val() == "")
			{
			alert("Please Select Date");
			  }
			   else if($("#start").val() == ""){
				alert("Please Select Start Date");
			 }
			  else if($("#end").val() == ""){
				alert("Please Select end Date");
			 }

			 else{
				var to = $("#start").val();
				var from = $("#end").val();
				
			window.location.replace('{{ URL::to("/viewdatewisereport") }}/'+ to + '/' + from);
				 
			 }
			}
		function done($id){
			
			swal({
                title: "Are you sure ?",
                text: "Once Approved, you will not be able to change the status of this request!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
			
			
			
						$.get('{{ URL::to("/done")}}/'+$id);
						location.reload(true);
			
			 swal("Your request successfully approved!", {
						icon: "success",
					  });

					  setTimeout(function(){
						location.reload(true);
					   }, 800);

					} else {
					  swal("Your request is unchanged!");
					}
				  });
	
	
	}
	
	function approve($id){
		
		
		swal("Approve Comment:", {
		  content: "input",
		  buttons: true,
		  
		})
		.then((value) => {
			
			if(value != null){
			
		  swal(`You typed: ${value}`);
		  
		  $comment = value;
		  $.get('{{ URL::to("/approve")}}/'+$id+'/'+$comment);
		  location.reload(true);
		  
			}else{
				
				swal("Your request is unchanged!");
			}
		  
		  // window.location.reload();
		});
		
		
		
	}

		function decline($id){
			
			swal({
                title: "Are you sure ?",
                text: "Once Decline, you will not be able to change the status of this request!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
			
			
			
						$.get('{{ URL::to("/decline")}}/'+$id);
						location.reload(true);
						
			swal("Your request successfully approved!", {
						icon: "success",
					  });

					  setTimeout(function(){
						location.reload(true);
					   }, 800);

					} else {
					  swal("Your request is unchanged!");
					}
				  });
	}
	
	
	function declinecomment($id){
		
		
		swal("Decline Comment:", {
		  content: "input",
		  buttons: true,
		  
		})
		.then((value) => {
			
			if(value != null){
			
		  swal(`You typed: ${value}`);
		  
		  $comment = value;
		  $.get('{{ URL::to("/declinecomment")}}/'+$id+'/'+$comment);
		  
			}else{
				
				swal("Your request is unchanged!");
			}
		  
		  location.reload(true);
		});
		
		
		
	}
	
	function emprequestshow($id){
		$.get('{{ URL::to("/emprequestshow")}}/'+$id,function(data){
		$('#modals').empty().append(data);
		$('#requestview').modal('show');
		});
	}

	function edit($id){
		$.get('{{ URL::to("/emprequestedit")}}/'+$id,function(data){
		$('#modals').empty().append(data);
		$('#requestedit').modal('show');
		});
	}
	
	//Submit Edit Request

	$('#modals').on('submit','#submiteditleaverequest',function(e){
            e.preventDefault();
            $("#btnsubmit").attr("disabled", true);
            var frmData = $(this).serialize();
            // console.log(frmData)+	
            //$.post('{{ URL::to("/update")}}',frmData,function(data,xhrStatus,xhr){
                //$('#todolist').empty().append(data);
            //  $(".modal-body").append('<p class="alert alert-success">Task added successfully...! </p>');
            //});
            $.ajax({
                url:'{{ URL::to("/updateeditrequest")}}',
                type:'POST',
                data: frmData,
                dataType: 'json',
                success : function (data){
					// console.log(data.no);
                    $("#loader").hide();
                    $(".modal-body").append('<p class="alert alert-success">'+(data.no)+ '</p>');
                 // $("#errors").addClass("alert-success").text('Task added successfully...!');
                    
                    setTimeout(function(){$("#requestedit").modal('hide');
						window.location = "{{ URL::to('/emprequest')}}";
					}, 5000);

                 },
                 error : function(error){
                    console.log(error);
                    // $("#loader").hide();
                    var error = error.responseJSON;
                    $("#modals #errors").empty();
                    $(".modal-body").append('<p class="alert alert-danger">Oops Somenthing went wrong</p>');
                    
                    setTimeout(function(){$("#requestedit").modal('hide');
						window.location = "{{ URL::to('/emprequest')}}";
                    }, 5000);
                 }
            })
        });
	
	
	</script>
		@endsection