@extends('layout.apptheme')
@section('hr-HRM')

<style>
	.view-icons .btn.active {
	    color: #333;
	}

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

</style>>

<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Employee Timings</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Employee Timings</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
				@if( session()->get("role") <=	 3)
					<a href="#" onclick="addemployeetimings()" class="btn add-btn" data-toggle="" data-target="#addemployeetimings"><i class="fa fa-plus"></i> Add Employee Timing</a>
				@endif
					<!-- <button class="btn add-btn" type="button" data-toggle="modal" data-target="#add_employeetimings"><i class="fa fa-plus"></i> Add Employee Timings</button> -->
				</div>
			</div>
		</div>
		@if(session('message'))
			<div><p class="alert alert-success" >{{session('message')}}</p> </div>
		@endif
		<!-- /Page Header -->
					
		<!-- Search Filter -->
		<!-- <div class="row filter-row">
			<div class="col-sm-6 col-md-3">  
				<div class="form-group form-focus">
					<input type="text" class="form-control floating">
					<label class="focus-label">Batch ID</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">  
				
			</div>
			<div class="col-sm-6 col-md-3">  
				
			</div>
			<div class="col-sm-6 col-md-3">  
				<a href="#" class="btn btn-success btn-block"> Search </a>  
			</div>     
        </div> -->
        <!-- <div class="dt-buttons">          
			<button class="dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="SalaryData">
				<span>Copy</span>
			</button>
			<button class="dt-button buttons-csv buttons-html5" tabindex="0" aria-controls="SalaryData">
				<span>CSV</span>
			</button> 
			<button class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="SalaryData">
				<span>Excel</span>
			</button>
			<button class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="SalaryData">
				<span>PDF</span>
			</button>
			<button class="dt-button buttons-print" tabindex="0" aria-controls="SalaryData">
				<span>Print</span>
			</button>
		 </div> -->
		 <br>
		<!-- /Search Filter -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table id="empt" class="table table-striped custom-table datatable">
						<thead>
							<tr class="bg-teal-400" style="white-space : nowrap;">
							   	@if( session()->get("role") <= 3)
								<th>Action</th>
								@endif
								<th>Name</th>
								<th>Batch ID</th>
								<th>Arrival Time</th>
								<th>Departure Time</th>
								<th>Start Date</th>
								<th>End Date</th>
								@if( session()->get("role") <= 2)
								<th>Department</th>
								@endif
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $val)
							<tr>
							   	@if( session()->get("role") <= 3)
								<td ><span><i style="cursor: pointer;" class="fa fa-pencil" onclick="editemployeetiming({{'"'.$val->emptime_id.'"'}})" ></i>&nbsp;</span></td>
								@endif
								<td>{{$val->elsemployees_name}}</td>
								<td>{{$val->emptime_batchid}}</td>
								<td>
									<?php
										$starttime = $val->emptime_start; 
										echo date('h:i:s a', strtotime($starttime));
									?>
								</td>
								<td>
									<?php
										$endtime = $val->emptime_end; 
										echo date('h:i:s a', strtotime($endtime));
									?>
								</td>
								<td>
									<?php
										$startdate=date_create($val->emptime_startdate);
										echo date_format($startdate,"d-M-Y");
									?>
								</td>
								<td>
									<?php
										$enddate=date_create($val->emptime_enddate);
										echo date_format($enddate,"d-M-Y");
									?>
								</td>
								@if( session()->get("role") <= 2)
								<td>{{$val->dept_name}}</td>
								@endif
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
	<!-- /Page Content -->
	
	<!-- Add Employee Modal -->
	
</div>
<!-- /Page Wrapper -->
<div id ='modals'></div>

<script type="text/javascript">
	function addemployeetimings(){
		$.get('{{ URL::to("/addemployeetimingsmodal")}}',function(data){
		$('#modals').empty().append(data);
		$('#addemployeetimings').modal('show');
		});
	}
	$('#modals').on('submit','#submitemptime',function(e){
    	e.preventDefault();
		$("#btnsubmit").attr("disabled", true);
    	var frmData = $(this).serialize();
    	$.ajax({
        	url:'{{ URL::to("/addemployeetimings")}}',
        	type:'POST',
        	data: frmData,
        	dataType: 'json',
        	success : function (data){
            	$("#loader").hide();
            	$(".modal-body").append('<p class="alert alert-success">Employee Timings Added Successfully...! </p>');               
            	setTimeout(function(){
            		$("#addemployeetimings").modal('hide')
                	window.location = "{{ URL::to('/employeetimings')}}";
                }, 2000);

            },
            error : function(error){
            	console.log("error");
            	var error = error.responseJSON;
            	$("#modals #errors").empty();
            	$(".modal-body").append('<p class="alert alert-danger">Oops Something wrong...!</p>');               
            	setTimeout(function(){
               		$("#addemployeetimings").modal('hide')
					window.location = "{{ URL::to('/employeetimings')}}";
                }, 2000);
            }
    	})
   	});
	function editemployeetiming($id){
		$.get('{{ URL::to("/editemployeetiming")}}/'+$id,function(data){
		$('#modals').empty().append(data);
		$('#editemployeetiming').modal('show');
		});
	}
	$('#modals').on('submit','#editsubmitemptime',function(e){
       e.preventDefault();
	   $("#editbtnsubmit").attr("disabled", true);
       var frmData = $(this).serialize();
       	$.ajax({
           url:'{{ URL::to("/submiteditemployeetiming")}}',
           type:'POST',
           data: frmData,
           dataType: 'json',
           success : function (data){
               $("#loader").hide();
               $(".modal-body").append('<p class="alert alert-success">Updated Successfully...! </p>');
            setTimeout(function(){$("#editemployeetiming").modal('hide')
                window.location = "{{ URL::to('/employeetimings')}}";
                                }, 2000);

            },
            error : function(error){
               console.log("error");
               // $("#loader").hide();
               var error = error.responseJSON;
               $("#modals #errors").empty();
               $(".modal-body").append('<p class="alert alert-danger">Oops Something wrong...!</p>');
               
               setTimeout(function(){$("#editemployeetiming").modal('hide')
				window.location = "{{ URL::to('/employeetimings')}}";
                                }, 2000);
            }
       	})
   	});
</script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection