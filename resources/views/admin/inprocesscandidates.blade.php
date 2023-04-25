@extends('layout.apptheme')
@section('hr-HRM')

<style type="text/css">
	.card {
	    padding: 1.25rem;
	    flex: 1 1 auto;
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
					<h3 class="page-title">In Process Candidates List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">In Process Candidates</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<!-- Page Tab -->
		<div class="page-menu">
			<div class="row">
				<div class="col-sm-12">
					<ul class="nav nav-tabs nav-tabs-bottom">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#inprocess_candidates">In Process</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#awaiting_list">Awaiting</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Tab -->
		
		<!-- Tab Content -->
		<div class="tab-content">
		
			<!--In Process Candidates Tab -->
			<div class="tab-pane show active" id="inprocess_candidates">
				<!--In Process Candidates List Table -->
				<div class="payroll-table card">
					<div class="table-responsive">
						<table class="table table-hover custom-table datatable" id="ic">
							<thead>
							<tr style="text-align: center;">
									<th>Resume</th>
									<th>View</th>
									<th>Action</th>
									<th>Name</th>
									<th>Email</th>
									<th>Contact No</th>
									<th>Department</th>
									<th>Postion Appplied for</th>
								</tr>
							</thead>
							<tbody>
							@foreach($data['inprocess'] as $datas)
									<tr style="text-align: center;">
										<td><a href="{{ URL::to('public/file/')}}/{{$datas->jobapplicant_cv}}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a></td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a style="color: #40c4f1" href="{{ URL::to('/modalademployeeviewol/')}}/{{$datas->jobapplicant_id}}" target="_blank" ><i class="material-icons">more</i></a>
												<!---<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="URL::to('/modalemployeeview/')}}/{{$datas->jobapplicant_id}}" data-toggle="modal" data-target="#view_screening"><i class="fa fa-clock-o m-r-5"></i> View Details</a>
												</div>--->
											</div>
										</td>
										<td>
											<div class="dropdown dropdown-action">
											<a href="#" style="color: #40c4f1" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" onclick="getedit({{$datas->jobapplicant_id}})" data-toggle="modal" data-target="#view_irrelevent"><i class="fa fa-clock-o m-r-5"></i> View Details</a>
												</div>
											</div>
										</td>
										<td>{{$datas->jobapplicant_name}}</td>
										<td>{{$datas->log_email}}</td>
										<td>{{$datas->jobapplicant_contact}}</td>
										<td>{{$datas->dept_name}}</td>
										<td>{{$datas->jobapplicant_postionapppliedform}}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- In ProcessCandidates List Table -->
				
			</div>
			<!--In Process Candidates Tab -->
			
			<!-- Awaiting Tab -->
			<div class="tab-pane" id="awaiting_list">
				<!-- Awaiting Table -->
				<div class="payroll-table card">
					<div class="table-responsive">
						<table class="table table-hover custom-table datatable" id="acl">
							<thead>
							<tr style="text-align: center;">
									<th>Resume</th>
									<th>View</th>
									<th>Action</th>
									<th>Name</th>
									<th>Email</th>
									<th>Contact No</th>
									<th>Department</th>
									<th>Postion Appplied for</th>
								</tr>
							</thead>
							<tbody>
							@foreach($data['awaiting'] as $datas)
									<tr style="text-align: center;">
										<td><a href="{{ URL::to('public/file/')}}/{{$datas->jobapplicant_cv}}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a></td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="{{ URL::to('/modalademployeeviewol/')}}/{{$datas->jobapplicant_id}}" target="_blank" ><i class="material-icons">more</i></a>
												<!---<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="URL::to('/modalemployeeview/')}}/{{$datas->jobapplicant_id}}" data-toggle="modal" data-target="#view_screening"><i class="fa fa-clock-o m-r-5"></i> View Details</a>
												</div>--->
											</div>
										</td>
										<td>
											<div class="dropdown dropdown-action">
											<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" onclick="getedit({{$datas->jobapplicant_id}})" data-toggle="modal" data-target="#view_irrelevent"><i class="fa fa-clock-o m-r-5"></i> View Details</a>
												</div>
											</div>
										</td>
										<td>{{$datas->jobapplicant_name}}</td>
										<td>{{$datas->log_email}}</td>
										<td>{{$datas->jobapplicant_contact}}</td>
										<td>{{$datas->dept_name}}</td>
										<td>{{$datas->jobapplicant_postionapppliedform}}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- Awaiting Table -->
				
			</div>
			<!-- Awaiting Tab -->
			
		</div>
		<!-- Tab Content -->
		
    </div>
	<!-- /Page Content -->
	
	<!-- View inprocess Modal -->
		<div id="modald"></div>
		<!-- /View Employee Modal -->
	
	<!-- View Awaiting Modal -->
		<div id="view_awaiting" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">View Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label class="col-form-label">Manager Comment <span class="text-danger">*</span></label>
										<textarea rows="4" cols="5" class="form-control" name="managercomment" placeholder="XYZ" readonly=""></textarea>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<label class="radio-inline">
											<input type="radio" name="optradio">Call For Interview
										</label>
									</div>
								</div>
								<div class="col-sm-6 select_dt_div">
									<div class="form-group">
										<label class="col-form-label" for="datetimepicker-default">Interview Date & Time</label>
										<input class="form-control" type="text" id="datetimepicker2" />
									</div>
								</div>
								<div class="col-sm-6">
								</div>
								<div class="submit-section">
								    <button class="btn btn-primary submit-btn">Save</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<!-- /View Awaiting Modal -->	

</div>
<!-- /Page Wrapper -->	



<script type="text/javascript">

	
		
	function getedit($id){
            $.get('{{ URL::to("/emailtocallfiorawait")}}/'+$id,function(data){
				  
				 // console.log(data);
				  
            $('#modald').empty().append(data);
            $('#view_inprocess').modal('show');
        });
    };

    $('#modald').on('submit','#frmeditcand',function(e){
      e.preventDefault();
      var frmData = $(this).serialize();
      //	 $.post('{{ URL::to("/saveAdjustment")}}',frmData,function(data,xhrStatus,xhr){
      //		 $('#todolist').empty().append(data);
      // });
       $.ajax({
        url:'{{ URL::to("/submicallfiorawait")}}',
        type:'POST',
        data: frmData,
       })
        .done(function(data){
        $("#modald #errors").show();
        $("#modald #errors").empty().append('<li class="alert alert-success" >Task added successfully...!</li>');
        setTimeout(function(){$("#view_inprocess").modal('hide')
		location.reload();
                 }, 2000);
      })
      .fail(function(error){
        var errors = error.responseJSON;
       // console.log(errors);
        $("#modald #errors").empty();
        if(errors){
			console.log(errors);
			console.log(errors.interTime);
			// console.log(error);
         errors.interTime.forEach(function(element,index){
          $("#modald #errors").show();
          $("#modald #errors").append('<li class="alert alert-danger" >'+ element + '</li>');
          setTimeout(function(){$("#view_inprocess").modal('hide')
          			 }, 3000);
                 
          });    
        } 
      }); 
    }); 
	
</script>	
			
@endsection