@extends('layout.apptheme')
@section('hr-HRM')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
			
<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Employee Attendance</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li><li class="breadcrumb-item"><a href="{{url('/viewattendnce')}}">View Attendance</a></li>
									<li class="breadcrumb-item active">Time Out</li>
								</ul>
							</div>
						</div>
					</div>
					@if(session('message'))
		            <div>   <p class="alert alert-danger" >{{session('message')}}</p> </div>
		        	  @endif
					<div class="text-right form-inline">

					</div>
			<!-- 		<form method="get">
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
				            	<button style="margin-top: 30px; padding:9px 20px;" class="btn btn-success pull-right" onClick="jump(start,end)"  id="btnProceed">Proceed</button>
							</div>
							</div>
						</div>
					<form> -->
					<div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table table-nowrap mb-0" id="veatt">
									<thead>
										<tr class="bg-teal-400" style="white-space : nowrap;">
											@if(session()->get('batchid') == 11337 || session()->get('batchid') == 10861 || session()->get('batchid') == 11728 || session()->get('batchid') == 11163 ||session()->get('batchid') == 11340)
											<th>Action</th>
											@endif
											<th>BatchId</th>
											<th>Name</th>
											<th>Father Name</th>
											<th>Department</th>
											<th>Reporting To</th>
											<th>Attendance Date</th>
											<th>Attendance Month</th>
											<th>Attendance</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($data as $val)
										<tr>
											@if(session()->get('batchid') == 11337 || session()->get('batchid') == 10861 || session()->get('batchid') == 11728 || session()->get('batchid') == 11163 || session()->get('batchid') == 11340)
											<td ><span>&nbsp;<i class="fa fa-pencil" onclick="editattendance({{$val->attendance_id}})" ></i></span></td>
											@endif
											<td>{{$val->elsemployees_empid}}</td>
											<td>{{$val->elsemployees_name}}</td>
											<td>{{$val->elsemployees_fname}}</td>
											<td>{{$val->dept_name}}</td>
											<td>
											<?php 
											$reportemail = DB::connection('mysql')->table('elsemployees')
											->where('elsemployees.elsemployees_empid','=',$val->elsemployees_reportingto)
											->select('elsemployees.*')
											->first();
											?>{{$reportemail->elsemployees_name}}</td>
											<td>{{$val->attendance_date}}</td>
											<td>{{$val->attendance_month}}</td>
											<td>{{$val->attendance_mark}}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
                        </div>
                    </div>
                    </div>
                </div>
                <div id ='modals'></div>				
            </div>
			<!-- Page Wrapper -->
<script>
		
		//New Code
		function editattendance($id){
			$.get('{{ URL::to("/editattendance")}}/'+$id,function(data){
			$('#modals').empty().append(data);
			$('#editattendancerequest').modal('show');
			});
		}

		$('#modals').on('submit','#submitattendancerequest',function(e){
                    e.preventDefault();
                    $("#btnsubmit").attr("disabled", true);
                    var frmData = $(this).serialize();
                 
                    $.ajax({
                        url:'{{ URL::to("/submiteditattendancerequest")}}',
                        type:'POST',
                        data: frmData,
                        dataType: 'json',
                        success : function (data){
							// console.log(data.no);
                            $("#loader").hide();
                            $(".modal-body").append('<p class="alert alert-success">Successfully Updated </p>');
                         // $("#errors").addClass("alert-success").text('Task added successfully...!');
                            
                            setTimeout(function(){$("#editattendancerequest").modal('hide');
											// window.location = "{{ URL::to('/selfrequest')}}";
										  }, 5000);
        
                         },
                         error : function(error){
                            console.log(error);
                            // $("#loader").hide();
                            var error = error.responseJSON;
                            $("#modals #errors").empty();
                            $(".modal-body").append('<p class="alert alert-danger">Oops Somenthing went wrong</p>');
                            
                            setTimeout(function(){$("#editattendancerequest").modal('hide');
							// window.location = "{{ URL::to('/selfrequest')}}";
                                             }, 5000);
                         }
                    })
                });

		function jump(start,end){
      if ($("#start").val() == "" & $("#end").val() == "")
	{
	alert("Please Select Date")
	  }
	   else if($("#start").val() == ""){
	    alert("Please Select Start Date")
	 }
	  else if($("#end").val() == ""){
	    alert("Please Select end Date")
	 }

	 else{
	    var to = $("#start").val();
	    var from = $("#end").val();

	     window.location.replace('{{ URL::to("/viewempattendancedw") }}/'+ to + '/' + from);
	 }
	}

</script>
@endsection