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
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Test Server</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Test Server</li>
					</ul>
				</div>
				<!-- <div class="col-auto float-right ml-auto">
					@if( session()->get("role") <=	 2)
					<a href="{{url('/addemployeenos')}}" class="btn add-btn" data-toggle="" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
					@endif
					<div class="view-icons">
						<a href="{{url('/employee_list')}}" class="grid-view btn btn-link" title="Grid-view"><i class="fa fa-th"></i></a>
						<a href="{{url('/employeelist')}}" class="list-view btn btn-link active" title="List-view"><i class="fa fa-bars"></i></a>
					</div>
				</div> -->
			</div>
		</div>
		@if(session('message'))
			<div><p class="alert alert-success mt-3" >{{session('message')}}</p> </div>
		@endif
		<!-- /Page Header -->
		@if( session()->get("role") <=	 1)
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
		@endif
		
		<!-- /Page Header -->
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table id="example" class="table table-striped custom-table datatable" style="width:100%">
						<thead>
							<tr class="bg-teal-400" style="white-space : nowrap; color:#fff;">
				                <th>User Name</th>
				                <th>Batch Id</th>
				                <th>User Id</th>
								<th>Type</th>
				                <th>Check/Break (In/Out)</th>
				                <th>Date</th>
								
								
							</tr>
						</thead>
						<tbody>
						@foreach ($data as $val)							
								<tr>
									@foreach ($userdetail as $userdetails)
			                        <td>{{$userdetails->elsemployees_name}}</td>
			                        <td>{{$userdetails->elsemployees_batchid}}</td>
									@endforeach
			                        <td>{{$val->USERID}}</td>
									@if($val->CHECKTYPE == "I")
									<td>Check In</td>
									@elseif($val->CHECKTYPE == "O")
									<td>Check Out</td>
									@elseif($val->CHECKTYPE == "1")
									<td>Break In</td>
									@elseif($val->CHECKTYPE == "0")
									<td>Break Out</td>
									@else
									<td>No</td>
									@endif
									<?php 
									$punchingdate = explode(" ",$val->CHECKTIME); ?>

									<?php
										$emptime = strtotime($punchingdate[1]); 
                    					$employeetime = date("h:i:sa",$emptime); 
									?>
			                        <td>{{$employeetime}}</td>
									<td>{{$punchingdate[0]}}</td>
									
									
								</tr>
						@endforeach
						</tbody>
						
					</table>
				</div>
				<div id="loader"></div>	
			</div>
		</div>
    </div>
	<!-- /Page Content -->
</div>
<!-- /Page Wrapper -->	

<script type="text/javascript">
	
	$(document).ready(function() {

		$('#example').DataTable( {
				
	        dom: 'lfrtip',
	    } );
	} );
</script>

<script>

	$('document').ready(function(){	

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
			
			// $("#loader").show();
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

			window.location.replace('{{ URL::to("/testserversearchmonth")}}/'+dampa+'/'+vampa);

			// window.open('{{ URL::to("/testserversearchmonth")}}/'+dampa+'/'+vampa,'_blank');
			
			// $.get('{{ URL::to("/testserversearchmonth")}}/'+dampa+'/'+vampa,function(data){
				
			// 	$('#dynamicdata').empty().append(data);
				
			// 	$("#loader").hide();
				
			// })
		});
		
		// $("#dynamicdata").on('click','.pagination a ',function(e){
			// $("#loader").show();
			//e.preventDefault();
			//var url = $(this).attr('href');
			//$.get(url,function(data){
			//$('#dynamicdata').empty().append(data);
			// $("#loader").hide();
			// });
		// });
	});
</script>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection