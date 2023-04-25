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
					<h3 class="page-title">Employee Salaries</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Employee Salaries</li>
					</ul>
				</div>
				@if(session()->get('role') <= 2)
				<div class="col-auto float-right ml-auto">
					<button class="btn add-btn" type="button" data-toggle="modal" id="btnAddAjm"><i class="fa fa-plus"></i> Add Employee Salary</button>
				</div>
				@endif
			</div>
		</div>
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
				<div class="form-group form-focus">
					<input type="text" class="form-control floating">
					<label class="focus-label">Employee Name</label>
				</div>
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
					<table id="emps" class="table table-striped custom-table datatable">
						<thead>
							<tr>
								<th>Sno.</th>
								<th>Batch ID</th>
								<th>Name</th>
								<th>Bank Account No</th>
								<th>Salary</th>
								<th>Provident Fund</th>
								<th>Salary Comment</th>
								<th>Date</th>
								@if(session()->get('role') <= 2)
								<th class="text-right no-sort">Action</th>
								<th class="text-right no-sort">Delete</th>
								@endif
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
	<!-- /Page Content -->

		
	<div id="modals">
	</div>
	
</div>
<!-- /Page Wrapper -->	
			
<script type="text/javascript">

	var table = $('#emps').DataTable( {
		ajax:"{{URL::to('/payrollSalariesdata')}}",
		dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
	} );

			
			
	setInterval( function () {
	table.ajax.reload(null , false);
	}, 5000);

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});


	function getdata($batch_no){
	   $.get('{{ URL::to("/payrollsalarieshistory")}}/'+$batch_no,function(data){
		  	$('#modals').empty().append(data);
			$('#salaryhistory').modal('show');
	   });
   }
   function deletesalary($batch_no){
	   $.get('{{ URL::to("/deleteemployeesalary")}}/'+$batch_no,function(data){
		 //  	$('#modals').empty().append(data);
			// $('#salaryhistory').modal('show');
	   });
   }

	function getedit($id){
		$.get('{{ URL::to("/editSalaries")}}/'+$id,function(data){
			   $('#modals').empty().append(data);
			 $('#editSalaries').modal('show');
		});
	}

	$('#btnAddAjm').on('click',function(e){                        
	    $.get('{{ URL::to("/payrollSalariescreate")}}',function(data){
		  
		  $('#modals').empty().append(data);
	      $('#AddSalaries').modal('show');
	    });
	});
			

	$('#modals').on('submit','#frmAddSalaries',function(e){
		e.preventDefault();
		var frmData = $(this).serialize();

		$.ajax({
			url:'{{ URL::to("/savepayrollSalaries")}}',
			type:'POST',
			data: frmData,
			dataType: 'json',
		})
		.done(function(data){
			$("#modals #errors").show();
			$("#modals #errors").empty().append('<li class="alert alert-success" >Task added successfully...!</li>');
			setTimeout(function(){$("#AddSalaries").modal('hide')
							 }, 1000);
		})
		.fail(function(error){
			var errors = error.responseJSON;
			console.log(errors);
			$("#modals #errors").empty();
			if(errors){
			 errors.addBatchId.forEach(function(element,index){
				$("#modals #errors").show();
				$("#modals #errors").append('<li class="alert alert-danger" >'+ element + '</li>');
				//setTimeout(function(){$("#AddEmployeeTiming").modal('hide')
				//			 }, 5000);
							 
			  });    
			} 
		});
	});

	$('#exportLate').on('click',function(e){                        
		$.post('{{ URL::to("/exportLate")}}');
	});


	$('#modals').on('submit','#frmEditSalaries',function(e){
		e.preventDefault();
		var frmData = $(this).serialize();
		//$.post('{{ URL::to("/update")}}',frmData,function(data,xhrStatus,xhr){
			//$('#todolist').empty().append(data);
		//	$(".modal-body").append('<p  class="alert alert-success">Task added successfully...! </p>');
		//});
		$.ajax({
			url:'{{ URL::to("/SalariesUpdate")}}',
			type:'POST',
			data: frmData,
			dataType: 'json',
			success : function (data){
				$("#loader").hide();
				$(".modal-body").append('<p  class="alert alert-success">Task added successfully...! </p>');
			   // $("#errors").addClass("alert-success").text('Task added successfully...!');
				
				setTimeout(function(){$("#editSalaries").modal('hide')
								 }, 2000);
				setTimeout(function(){$("#salaryhistory").modal('hide')
								}, 2000);

				 window.location.href = "{{URL::to('/employeesalaries')}}";
			 },
			 error : function(error){
				console.log("error");
				$("#loader").hide();
				var error = error.responseJSON;
				$("#modals #errors").empty();
				$(".modal-body").append('<p  class="alert alert-danger">Oops Something wrong...! you have to put CSV File </p>');
				
				setTimeout(function(){$("#editSalaries").modal('hide')
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