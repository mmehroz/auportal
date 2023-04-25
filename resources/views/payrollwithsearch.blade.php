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
		@if(session('message'))
			<div><p class="alert alert-success" >{{session('message')}}</p> </div>
		@endif
		<!-- /Page Header -->
		<div class="row" id="modals">
			<div class="col-sm-12 col-md-12">
				<form id="frmeditstore"  >
					<div class="row filter-row" style="display: flex!important;">
						<div class="col-sm-3 col-md-3">  
							<label class="focus-label">Select Month</label>
							<br>
							<select class="selectpicker show-tick" name="mydata" id="searchdrop">
								<option value="" selected="" disabled="">Select</option>
								<option value="01">January</option>
								<option value="02">Feburary</option>
								<option value="03">March</option>
								<option value="04">April</option>
								<option value="05">May</option>
								<option value="06">June</option>
								<option value="07">July</option>
								<option value="08">August</option>
								<option value="09">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
						</div>
						
						<?php
						if(session()->get("role") <= 2){
						$task =  DB::connection('mysql')->table('elsemployees')
						->where('elsemployees.elsemployees_status','=',2)
						->select('elsemployees.*')
						->get();
						// dd($task);
						}
						elseif(session()->get("role") == 4){
						$task =  DB::connection('mysql')->table('elsemployees')
						->where('elsemployees.elsemployees_status','=',2)
						->where('elsemployees.elsemployees_empid','=',session()->get("id"))
						->select('elsemployees.*')
						->get();
						// dd($task);
						}else{
						$task = DB::connection('mysql')->table('elsemployees')
						->where('elsemployees.elsemployees_status','=',2)
						->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
						->select('elsemployees.*')
						->get();
					
						}
						?>
								<div class="col-sm-4 col-md-4">
								<label class="focus-label">Select Employee</label>
								<br>
									<select class="selectpicker show-tick " data-width="fit" id="addtm1" data-live-search="true" placeholder="Enter TM Name" name="emp_report"  required>
										@if(session()->get('role') == 3)
		                            	<option value={{session()->get('batchid')}}>{{session()->get('name')}}-{{session()->get('batchid')}}</option>
		                            	@endif
		                            	@foreach($task as $mnger)
		                                <option value={{$mnger->elsemployees_batchid}}>{{$mnger->elsemployees_name}}-{{$mnger->elsemployees_batchid}}</option>
		                            	@endforeach 
	                                </select>
							</div>
						
						<div id="field" class="col-sm-5 col-md-5">
						</div>
					</div>
				</form>
			</div>
		</div>
		<br/>
		<div id="loader"></div>	
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 datatable" id="Userdatas">
						<thead>
							<tr class="bg-teal-400" style="white-space : nowrap; color:#fff;">
								<!-- <th>S.no</th> -->
							  	<th>Batch id</th>
								<th>Name</th>
								<th>Start time</th>
								<th>End time</th>
								<th>Date</th>
								<th>Day</th>
								<th>Arrival</th>
								<th>Departure</th>
								
								
							</tr>
						</thead>
						<tbody id="tbldata">

						</tbody>
						
					</table>
				</div>
			</div>
		</div>		
		</div>
		<!-- /Page Content -->

    </div>
	<!-- /Page Wrapper -->

</div>

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
	
	var mydatatable = $('#Userdatas').DataTable( {
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
			
			$.get('{{ URL::to("/payrolldashboarddata?page=")}}'+aupa,function(data){
				
				// $('#dynamicdata').empty().append(data);
					load += 5.882352941176471;
					
					console.log(aupa);
					console.log(load);
					
					loadvalue = load + "%";
					
					console.log(loadvalue);
						// console.log(data);
						var employee = data;
						// console.log(employee);
					Object.values(employee).forEach(val =>{ 
						Object.values(val).forEach(value =>{ 
							
							mydatatable.row.add( [ value.emp_batchid,value.emp_name,value.emp_checkin,value.emp_checkout,value.emp_date,value.emp_day,value.emp_labelin,value.emp_labelout ]).draw();
							
							// $('#tbldata').append('<tr><td>'+value.punch_emp_batchid+'</td><td>'+value.punch_emp_name+'</td><td>'+value.punch_emp_date+'</td><td>'+value.punch_emp_checkin+'</td><td>'+value.punch_emp_checkout+'</td></tr>');
						
						});
					});	
					
						
					$("#progress").attr("aria-valuenow",load);
					$("#progress").css("width",loadvalue);
					$("#progress").html(loadvalue);
					
					
					
					if(load == 100){
						$("#loader").hide();
					}else{
						
					}
				});
		}
		
		
	}
	
</script>	

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
		
		$('#searchdrop').on('change',function(){
					var dropdown = $(this).attr('name');
					var dropdownval = $(this).val();
					
					if(dropdownval){
						$("#field").html("<div class='row filter-row'><div class='col-sm-5 col-md-5' style='margin-top: 5%;'><input class='btn btn-success btn-block' type='submit'></div></div>");
					}else{
						$("#field").html("<div><h2>Invalid Type</h2></div>");
					}
			});
		
		$('#modals').on('submit','#frmeditstore',function(e){
				
				$("#loader").show();
				e.preventDefault();
				
				
				var $inputs = $('#frmeditstore :input');
				
				
				
				var values = {};
				$inputs.each(function() {
					values[this.name] = $(this).val();
				});
				
				console.log(values['emp_report']);
				
				
				dampa=values['mydata'];

				vampa=values['emp_report'];
				
				// console.log($(this).serialize());
				
				$.get('{{ URL::to("/payrolldashboardsearchmonth")}}/'+dampa+'/'+vampa,function(data){
					
					$('#dynamicdata').empty().append(data);
					
					$("#loader").hide();
					
				})
			});
		
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