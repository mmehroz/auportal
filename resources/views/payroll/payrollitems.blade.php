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
						<h3 class="page-title">Payroll Items</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
							<li class="breadcrumb-item active">Payroll Items</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->
			<div class="card-body">
				<form action="{{ URL::to('/monthwisepayrollitems')}}" method="POST" class="form-horizontal">
					{{ csrf_field() }} 
					<div class="form-group">
						<div class="row">
					    	<div class="col-md-6">
								<input type="month" name="payrollmonth" class="form-control" required>
							</div>
							<div class="col-md-6">
								<input type="submit" value="submit" class="btn btn-primary">
							</div>
						</div>
					</div>
				</form>
			</div>
			<!-- Page Tab -->
			<div class="page-menu">
				<div class="row">
					<div class="col-sm-12">
						<ul class="nav nav-tabs nav-tabs-bottom">
							@if(session()->get('role') != 4)
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tab_adjustment">Earnings</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab_alldata">Deduction</a>
							</li>
							@endif
							<!-- <li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab_deductions">Deductions</a>
							</li> -->
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Tab -->
			
			<!-- Tab Content -->
			<div class="tab-content">
			
				<!-- Adjustment Tab -->
				<div class="tab-pane show active" id="tab_adjustment">
				
					<!-- Add Adjustment Button -->
					@if(session()->get('role') != 4)
					<dir class="row" >
					<div class="text-right mb-4">
						<button class="btn btn-primary add-btn" type="button"  id="btnAddAjm"><i class="fa fa-plus"></i>Add Earning</button>
					</div>
					</dir>
					@endif
					<!-- /Add Adjustment Button -->

					<!-- Payroll Adjustment Table -->
					<div class="payroll-table card">
						<div class="table-responsive">
							<table class="table table-hover table-radius" id ="AdjustmentData">
								<thead>
									<tr>
									<th>Sno.</th>	
									<th>Batch id</th>
									<th>Name</th>
									<th>Month</th>
									<th>Referral Bonus</th>
									<th>Target Incentive</th>
									<th>Total Spiff</th>
									<th>Other Allowance</th>
									<th>Last Salary</th>
									<th>Comments</th>
									@if(session()->get('role') == 1)
										<th class="text-right">Action</th>
									@endif
									</tr>
								</thead>
								<tbody>
								<?php $Sno=1; ?>
									@if($data['task'])
									@foreach ($data['task'] as $key => $employee)
									<tr>
										<td>{{$Sno}}</td>
										<td>{{$employee->EMP_BADGE_ID}}</td>
										<td>{{$employee->name}}</td>
										<td>{{$employee->AdjMonth}}</td>
										<td>{{$employee->adjustment}}</td>
										<td>{{$employee->incentiveamount}}</td>
										<td>{{$employee->spiffamount}}</td>
										<td>{{$employee->otheramount}}</td>
										<td>{{$employee->lastamount}}</td>
										<td>{{$employee->AdjComment}}</td>
									
										@if(session()->get('role') == 1)
											<!-- <td><button type="button" onclick="getedit({{$employee->id}})" class="btn btn-info btn-xs btnManage"><i class="fa fa-pencil "></i></button></td> -->
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" onclick="geteditAdj({{$employee->id}})"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													</div>
												</div>
											</td>  

										@endif
								<?php $Sno++ ?>
								@endforeach
								@endif
								</tbody>
							</table>
						</div>
					</div>
					<!-- /Payroll Adjustment Table -->
					
				</div>
				<!-- Adjustment Tab -->
				
				<!-- All Data Tab -->
				<div class="tab-pane" id="tab_alldata">
				@if(session()->get('role') != 4)
					<dir class="row" >
					<div class="text-right mb-4">
						<button class="btn btn-primary add-btn" type="button"  id="btnAddDeduct"><i class="fa fa-plus"></i>Add Deduction</button>
					</div>
					</dir>
				@endif
				<!-- Add All Data Button -->
				<!-- <div class="text-right mb-4 clearfix">
					<button class="btn btn-primary add-btn" type="button" data-toggle="modal" data-target="#add_deduction"><i class="fa fa-plus"></i> Add Deduction</button>
				</div> -->
				<!-- /Add All Data Button -->

				<!-- Payroll Deduction Table -->
				<div class="payroll-table card">
					<div class="table-responsive">
						<table class="table table-hover table-radius">
							<thead>
								<tr>
									<th>Sno.</th>
									<th>Batch id</th>
									<th>Name</th>
									<th>Month</th>
									<th>Bizz Fund</th>
									<th>Tax</th>
									<th>Loan Installment</th>
									<th>Spiff Delivered</th>
									<th>Advance Salary</th>
									<th>Comment</th>
									@if(session()->get('role') == 1)
									<th class="text-right">Edit</th>
									@endif
								</tr>
							</thead>
							<tbody>
								<?php $Sno=1; ?>
								@if($data['dataa'])
								@foreach ($data['dataa'] as $key => $employee)
									<tr>
									<td>{{$Sno}}</td>
									<td>{{$employee->EMP_BADGE_ID}}</td>
										<td>{{$employee->name}}</td>
										<td>{{$employee->deductions_month}}</td>
										<td>{{$employee->deductions_bizzfund}}</td>
										<td>{{$employee->deductions_tax}}</td>
										<td>{{$employee->deductions_loan}}</td>
										<td>{{$employee->deductions_apiff}}</td>
										<td>{{$employee->deductions_advance}}</td>
										<td>{{$employee->deductions_comment}}</td>
									
										@if(session()->get('role') == 1)
											<!-- <td><button type="button" onclick="getedit({{$employee->deductions_id }})" class="btn btn-info btn-xs btnManage"><i class="fa fa-pencil "></i></button></td> -->
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" onclick="getedit({{$employee->deductions_id}})"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													</div>
												</div>
											</td>  

										@endif
								<?php $Sno++ ?>
								@endforeach
								@endif
								<!-- <tr>
									<td>11001</td>
									<td>M. Yaseen</td>
									<td>100</td>
									<td>2019-11-28</td>
									<td>Test</td>
									<td class="text-right">
										<div class="dropdown dropdown-action">
											<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_deduction"><i class="fa fa-pencil m-r-5"></i> Edit</a>
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_deduction"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr> -->
							</tbody>
						</table>
					</div>
				</div>
				<!-- /Payroll All Data Table -->
				
			</div>
			<!-- /All Data Tab -->
				
			</div>
			<!-- Tab Content -->
			
		</div>
		<!-- /Page Content -->
		<!-- <div class="col-md-12">
				<div id="container"></div>
		</div> -->
		
	</div>
	<!-- /Page Wrapper -->
	<div id ='modals'></div>

	<script type="text/javascript">

		function getedit($id){
			$.get('{{ URL::to("/editpaydata")}}/'+$id,function(data){
				
				$('#modals').empty().append(data);
				$('#editTask').modal('show');
			});
		}

		$('#exportLate').on('click',function(e){                        
			$.post('{{ URL::to("/exportLate")}}');
		});


		$('#modals').on('submit','#frmEditTask',function(e){
			e.preventDefault();
			var frmData = $(this).serialize();
			//$.post('{{ URL::to("/updatepaydata")}}',frmData,function(data,xhrStatus,xhr){
				//$('#todolist').empty().append(data);
			//	$(".modal-body").append('<p  class="alert alert-success">Task added successfully...! </p>');
			//});
			$.ajax({
				url:'{{ URL::to("/updatepaydata")}}',
				type:'POST',
				data: frmData,
				dataType: 'json',
				success : function (data){
					console.log(data);
					$("#loader").hide();
					$(".modal-body").append('<p  class="alert alert-success">Task added successfully...! </p>');
					// $("#errors").addClass("alert-success").text('Task added successfully...!');
					
					setTimeout(function(){$("#editTask").modal('hide')
										}, 2000);
					window.location.reload('{{ URL::to("/payrollitems")}}');

				},
				error : function(error){
					console.log("error");
					$("#loader").hide();
					var error = error.responseJSON;
					$("#modals #errors").empty();
					$(".modal-body").append('<p  class="alert alert-danger">Oops Something wrong...! </p>');
					
					setTimeout(function(){$("#editTask").modal('hide')
										}, 2000);
				}
			})
		});
	   
		$('#modals').on('click','#btnDelete',function(e){
			var id = $(this).data('task');                        
			$.get('{{ URL::to("destroy")}}/'+id,function(data){
				$('#todolist').empty().append(data);
				
			});
		});

		function geteditAdj($id){
			$.get('{{ URL::to("/editAdjustment")}}/'+$id,function(data){
			
				$('#modals').empty().append(data);
				$('#editAdjustment').modal('show');
			});
		}

		$('#modals').on('submit','#frmEditAdjustment',function(e){
			e.preventDefault();
			var frmData = $(this).serialize();
			//$.post('{{ URL::to("/update")}}',frmData,function(data,xhrStatus,xhr){
				//$('#todolist').empty().append(data);
			//	$(".modal-body").append('<p  class="alert alert-success">Task added successfully...! </p>');
			//});
			$.ajax({
				url:'{{ URL::to("/updateAdjustment")}}',
				type:'POST',
				data: frmData,
				dataType: 'json',
				success : function (data){
					$("#loader").hide();
					$(".modal-body").append('<p  class="alert alert-success">Task added successfully...! </p>');
				   // $("#errors").addClass("alert-success").text('Task added successfully...!');
					
					setTimeout(function(){$("#editAdjustment").modal('hide')
									 }, 2000);
					window.location.reload('{{ URL::to("/payrollitems")}}');

				 },
				 error : function(error){
					console.log("error");
					$("#loader").hide();
					var error = error.responseJSON;
					$("#modals #errors").empty();
					$(".modal-body").append('<p  class="alert alert-danger">Oops Something wrong...! </p>');
					
					setTimeout(function(){$("#editAdjustment").modal('hide')
									 }, 2000);
				 }
			})
		});

		$('#btnAddAjm').on('click',function(e){                        
			$.get('{{ URL::to("/Adjustmentcreate")}}',function(data){
				$('#modals').empty().append(data);
				$('#Addadjustment').modal('show');
			});
		});

		$('#btnAddDeduct').on('click',function(e){                        
			$.get('{{ URL::to("/Deductioncreate")}}',function(data){
				$('#modals').empty().append(data);
				$('#Adddeduction').modal('show');
			});
		});


		$('#modals').on('submit','#frmAddadjustment',function(e){
			e.preventDefault();
			var frmData = $(this).serialize();
			//	 $.post('{{ URL::to("/saveAdjustment")}}',frmData,function(data,xhrStatus,xhr){
			//		 $('#todolist').empty().append(data);
			// });
			$.ajax({
				url:'{{ URL::to("/saveAdjustment")}}',
				type:'POST',
				data: frmData,
				dataType: 'json',
				success : function (data){
					console.log(data);
					$("#loader").hide();
					$("#Addadjustment .modal-body #ajdMessage").html('<p  class="alert alert-success">Task added successfully...! </p>');
				// $("#errors").addClass("alert-success").text('Task added successfully...!');
					
					setTimeout(function(){$("#Addadjustment").modal('hide')
									}, 2000);
					window.location.reload('{{ URL::to("/payrollitems")}}');

				},
				error : function(error){
					console.log("error");
					$("#loader").hide();
					var error = error.responseJSON;
					$("#modals #errors").empty();
					$("#Addadjustment .modal-body #ajdMessage").html('<p  class="alert alert-danger">Oops Something wrong...!</p>');
					
					setTimeout(function(){$("#Addadjustment").modal('hide')
									}, 2000);
				}
			})

		});

		$('#modals').on('submit','#frmAdddeduction',function(e){
			e.preventDefault();
			var frmData = $(this).serialize();
			//	 $.post('{{ URL::to("/saveAdjustment")}}',frmData,function(data,xhrStatus,xhr){
			//		 $('#todolist').empty().append(data);
			// });
			$.ajax({
				url:'{{ URL::to("/saveDeduction")}}',
				type:'POST',
				data: frmData,
				dataType: 'json',
				success : function (data){
					console.log(data);
					$("#loader").hide();
					$("#Adddeduction .modal-body #ajdMessage").html('<p  class="alert alert-success">Task added successfully...! </p>');
				// $("#errors").addClass("alert-success").text('Task added successfully...!');
					
					setTimeout(function(){$("#Adddeduction").modal('hide')
									}, 2000);
					window.location.reload('{{ URL::to("/payrollitems")}}');

				},
				error : function(error){
					console.log("error");
					$("#loader").hide();
					var error = error.responseJSON;
					$("#modals #errors").empty();
					$("#Adddeduction .modal-body #ajdMessage").html('<p  class="alert alert-danger">Oops Something wrong...! </p>');
					
					setTimeout(function(){$("#Adddeduction").modal('hide')
									}, 2000);
				}
			})

		});
		$('#modals').on('click','#btnDelete',function(e){
			var id = $(this).data('task');                        
			$.get('{{ URL::to("/destroyAdjustment")}}/'+id,function(data){
				$('#editAdjustment').empty().append(data);
				
			});
		});

			

	</script>
			
@endsection