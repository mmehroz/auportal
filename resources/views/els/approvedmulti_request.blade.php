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
						<li class="breadcrumb-item active">Pending Request</li>
					</ul>
				</div>
			</div>
		</div>
		@if(session('message'))
			<div><p class="alert alert-success" >{{session('message')}}</p> </div>
		@endif
		<br />
		<div style="margin-top:-40px;">
			<p class="alert alert-danger" >You Are Not Able To Change The Request Again, Please Perform Carefully.</p>
		</div>
		<form action="{{ URL::to('/updatemultirequest')}}"  method="post">
			{{csrf_field()}}
			<div class="panel-body">					
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table table-nowrap mb-0" id="vreq">
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
										<th>Change Status</th>
										<th style="display: none;">Leave ID</th>
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
											<td @if($val->elsleaverequests_totalleavedays == 3) style="background-color: #678c40; color: #ffffff; @elseif($val->elsleaverequests_totalleavedays > 10) style="background-color: #ff0000; color: #ffffff; @elseif($val->elsleaverequests_totalleavedays > 3 OR $val->elsleaverequests_totalleavedays == 10) style="background-color: #17a2b8; color: #ffffff; @endif">{{$val->elsleaverequests_totalleavedays}}</td>
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
											<td>
												<select id="invsdreqstatus" name="invsdreqstatus[]"   class="form-control" required >
													<option value="" selected="" disabled="">Select</option>
						                            <option value="Done">Approved</option>
						                            <option value="Declined">Declined</option>
						                            <option value="Approved">Pending</option>
					                            </select>
					                        </td>
					                        <td style="display: none;">
												<input type="hidden" name="emp_batchid[]" class="form-control" id="emp_batchid" required="required" value="{{$val->elsleaverequests_id}}" readonly="true">
											</td>
											<td>
												<span>&nbsp;
													<i style="cursor: pointer;" onclick="emprequestshow({{'"'.$val->elsleaverequests_id.'"'}})"title="View Request" class="fa fa-eye"></i>
												</span>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
            </div><br><br>
			<div class="panel-footer text-right"><br>
				<span class="text-danger" style="float : left">Note : Please Check All Before Submitting</span>
				<button type="submit" style="margin-left: 45%;" class="btn btn-primary position-right">Submit <i class="icon-arrow-right14 position-right"></i></button>
			</div>	
		</form>
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
		}else if($("#start").val() == ""){
			alert("Please Select Start Date");
		}else if($("#end").val() == ""){
			alert("Please Select end Date");
		}else{
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
				window.location.reload();
			
				swal("Your request successfully approved!", {
					icon: "success",
				});

				setTimeout(function(){
					location.reload();
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
				window.location.reload();
		  
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
				window.location.reload();
					
				swal("Your request successfully approved!", {
					icon: "success",
				});

				setTimeout(function(){
					location.reload();
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
		  
			window.location.reload();
		});
	}
	
	function emprequestshow($id){
		$.get('{{ URL::to("/emprequestshow")}}/'+$id,function(data){
		$('#modals').empty().append(data);
		$('#requestview').modal('show');
		});
	}
	
	
</script>

<!-- <script type="text/javascript">
	$(document).ready(function(){
		function fetch_data()
		{
			$.ajax({
				url:"select.php",
				method:"POST",
				dataType:"json",
				success:function(data)
				{
					var html = '';
					for(var count = 0; count < data.lenght; count++)
					{
						html += '<tr>';
						html += '<td><input type="checkbox" id="'+data[count].id+'" data-batchid="'+data[count].batchid+'" data-empname="'+data[count].empname+'" data-empdept="'+data[count].empdept+'" data-empdofjoin="'+data[count].empdofjoin+'" data-empsubdate="'+data[count].empsubdate+'" data-emptotaldays="'+data[count].emptotaldays+'" data-empstdate="'+data[count].empstdate+'" data-empenddate="'+data[count].empenddate+'" data-empltypeid="'+data[count].empltypeid+'" data-emplstatus="'+data[count].emplstatus+'" class="check_box"/></td>'

						html += '<td>'+data[count].batchid+'</td>';
						html += '<td>'+data[count].empname+'</td>';
						html += '<td>'+data[count].empdept+'</td>';
						html += '<td>'+data[count].empdofjoin+'</td>';
						html += '<td>'+data[count].empsubdate+'</td>';
						html += '<td>'+data[count].emptotaldays+'</td>';
						html += '<td>'+data[count].empstdate+'</td>';
						html += '<td>'+data[count].empenddate+'</td>';
						html += '<td>'+data[count].empltypeid+'</td>';
						html += '<td>'+data[count].emplstatus+'</td>';
					}
					$(tbody).html(html);
				}
			});
		}
	});
</script> -->
@endsection