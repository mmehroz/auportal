@extends('layout.apptheme')
@section('hr-HRM')
			
<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Attendance</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Attendance</li>
								</ul>
							</div>
						</div>
					</div>
					@if(session('message'))
            			<div><p class="alert alert-success" >{{session('message')}}</p> </div>
					@endif
					<br />
					<div style="margin-top:-40px;">
						<p class="alert alert-danger" >You Are Not Able To Change The Attendance, Please Mark Attendance Carefully.</p>
					</div>
		  			<form action="{{ URL::to('/submitattendance')}}"  method="post">
						{{csrf_field()}}
						<div class="panel-body">
							<div class="form-group" style="margin-bottom:0;">
								<div class="col-md-6" style="margin-left:-30px; padding-bottom:10px;">
									<label class="control-label text-bold col-lg-6">Select Attendance Date:</label>
									<input type="date" id="datepicker" name="attendancedate" required>
								</div>
							</div>
                    <div class="row">
                        <div class="col-lg-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table table-nowrap mb-0" id="att">
									<thead>
										<tr class="bg-teal-400" style="white-space : nowrap;">
										   @if( session()->get("role") ==	 1 || session()->get("role") ==	 2 )
											<!-- <th>Action</th> -->
											@endif
											<th>Attendance</th>
											
										   <th>BatchId</th>
											<th>Name</th>
											<th>Father Name</th>
											<th>CNIC No.</th>
											<th>Role</th>
											<th>Department</th>
											<th>Designation</th>
											<th>Reporting To</th>
											<th>Status</th>
											
										</tr>
									</thead>
									<tbody>
										@foreach ($data as $val)
											<tr>
												 	@if( session()->get("role") ==	 1 || session()->get("role") ==	 2 )
												<!-- <td ><span><i class="icon-pencil" onclick="getedit({{'"'.$val->elsemployees_empid.'"'}})" ></i>&nbsp;</span></td> -->
													@endif
												<td><select id="invsdreqstatus" name="invsdreqstatus[]"   class="form-control" required >
														<option value="" selected="" disabled="">Select</option>
							                            <option value="Present">Present</option>
							                            <option value="Absent">Absent</option>
							                            <option value="OFF">OFF</option>
							                            <option value="AL">AL</option>
							                            <option value="SL">SL</option>
							                             <option value="HD">Half Day</option>
							                            </select>
														
												</td>
											
												<td><input type="text" name="emp_batchid[]"   class="form-control" required="required" id="emp_batchid" value="{{$val->elsemployees_batchid}}" readonly="true" ></td>
												<td>{{$val->elsemployees_name}}</td>
												<td>{{$val->elsemployees_fname}}</td>
												<td>{{$val->elsemployees_cnic}}</td>
												<td>{{$val->rolename}}</td>
												<td>{{$val->dept_name}}</td>
												<td>{{$val->DESG_NAME}}</td>
												<td>
												
												<?php 
													
													// dd($val->elsemployees_batchid);
												
												$reportemail = DB::connection('mysql')->table('elsemployees')
												->where('elsemployees.elsemployees_empid','=',$val->elsemployees_reportingto)
												->select('elsemployees.*')
												->first();
												$reportingtoname;
												if (isset($reportemail->elsemployees_name)) {
													$reportingtoname = $reportemail->elsemployees_name;
												}else{
													$reportingtoname = "-";
												}
												?>{{$reportingtoname}}</td>
												@if ($val->elsemployees_status == 2)
												<td>Active</td>
												@else
												<td>Not Active</td>
												@endif
											
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
            </div>
			<!-- Page Wrapper -->
<script>

 //    function getedit($id){
	// 	window.location.replace('{{ URL::to("/editemployee")}}/'+$id);
	// }


function updateattendance($value,$d){
	var x = document.getElementById("datepicker").value;
	$d=x;
	// alert($d);
	if (x != "") {
	
	   $.get('{{ URL::to("/submitupdateattendance")}}/'+$value+'/'+$d,function(data){
                  
        });	
	
	}else{
		alert("Please Select Attendance Date");
	}
     
        }

	</script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection