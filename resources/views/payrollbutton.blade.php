@extends('layout.apptheme')
@section('hr-HRM')



<style>
	input, button, a {
    	color: #4a4a4a;
	}
	a:hover, a:active, a:focus {
		color: #678c40;
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
		
		<!-- /Page Header -->
		<div class="row">
			<div class="col-md-12">			
				<div class="card">
					<center>
					<div class="card-card-title">
						<h2>Button to upload data of payroll</h2>
					</div>
					<div class="card-body">
						<div class="progress">
						  <div class="progress-bar" id="progress" role="progressbar"  style="width:0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
						</div>
						<br/>
						<button class="btn btn-md btn-primary" id="payrollbutton" onclick="datapayroll();" />Click me to Upload Data</button>
					</div>
					</center>
				</div>	
				<div id="loader">				
				</div>	
			</div>
		</div>
		<div class="card-heading">
			<h6 class="card-title" style="color: #678c40!important;"><i class="icon-laptop position-left"></i>All Employees Data</h6>					
		</div>		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 datatable" id ="Userdata">
					    <thead>	
							<tr>
								<!--<th>S.no</th>-->
								<th>Batch_id</th>
								<th>Name</th>
								<th>Start_time</th>
								<th>End_time</th>
								<th>Date</th>
								<th>Day</th>
								<!--<th>Arrival</th>
								<th>Departure</th>-->
							</tr>
					    </thead>
						<tbody id="tbldata">
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- Page Content -->
</div>	
<!-- /Page Wrapper -->

<script src="{!! asset('public/assets/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('public/assets/js/dataTables.bootstrap4.min.js') !!}"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<!-- <script src="{!! asset('public/assets/js/buttons.flash.min.js') !!}"></script> -->
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<!-- <script src="{!! asset('public/assets/js/jszip.min.js') !!}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<!-- <script src="{!! asset('public/assets/js/pdfmake.min.js') !!}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<!-- <script src="{!! asset('public/assets/js/vfs_fonts.js') !!}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<!-- <script src="{!! asset('public/assets/js/buttons.html5.min.js') !!}"></script> -->
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<!-- <script src="{!! asset('public/assets/js/buttons.print.min.js') !!}"></script> -->
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script>
	
 var mydatatable = $('#Userdata').DataTable( {
        "processing": true,
		dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
		} );
	

	function datapayroll(){
		
		$("#payrollbutton").hide();
		
		
		$("#loader").show();
		
		load = 0;
		
		loadend = {{$datacount}};
		
		for(aupa = 1 ;aupa <= loadend;aupa++){
			
			$.get('{{ URL::to("/payrolldashboarddatabutton?page=")}}'+aupa,function(data){
				
				// $('#dynamicdata').empty().append(data);
					load += 14.286;
					
					console.log(aupa);
					console.log(load);
					
					loadvalue = load + "%";
					
					console.log(loadvalue);
						// console.log(data);
						var employee = data;
						// console.log(employee);
					Object.values(employee).forEach(val =>{ 
						Object.values(val).forEach(value =>{ 
							
							mydatatable.row.add( [ value.punch_emp_batchid,value.punch_emp_name,value.punch_emp_checkin,value.punch_emp_checkout,value.punch_emp_date,value.punch_emp_day ]).draw();
							
							// $('#tbldata').append('<tr><td>'+value.punch_emp_batchid+'</td><td>'+value.punch_emp_name+'</td><td>'+value.punch_emp_date+'</td><td>'+value.punch_emp_checkin+'</td><td>'+value.punch_emp_checkout+'</td></tr>');
						
						});
					});	
					
						
					$("#progress").attr("aria-valuenow",load);
					$("#progress").css("width",loadvalue);
					$("#progress").html(loadvalue);
					
					
					
					if(load == 100.002){
						$("#loader").hide();
					}else{
						
					}
				});
		}
		
		
	}
	
</script>	

@endsection