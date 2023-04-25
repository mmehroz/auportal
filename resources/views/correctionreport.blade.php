@extends('layout.apptheme')
@section('hr-HRM')

<style type="text/css">
  input, button, a {
      color: #4a4a4a;
  }
  a:hover, a:active, a:focus {
      color: #678c40;
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
					<h3 class="" ass="page-title">Attendance Correction Report</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Correction</li>
					</ul>
				</div>
				<!-- @if(session()->get('role') == 1 || session()->get('role') == 2)
						<a href="{{url('/approvedmulti_correction')}}" class="btn add-btn"><i class="fa fa-check"></i> Approved Multiple Request</a>
						@endif -->
			</div>
		</div>
    @if(session('message'))
      <div><p class="alert alert-success" >{{session('message')}}</p> </div>
    @endif
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 datatable dataTable no-footer" id="el">
						<thead >
							<tr>
                				<th>Action</th>
                				<th>Batch Id</th>
                				<th>Name</th>
								<th>Image</th>
								<th style="width: 30px;">Title</th>
								<th>Description</th>
								<th>Affected Dater</th>
								<th>Manager Comment</th>
								<th>HR Comment</th>
								<th>Status</th>
								<th>Last Updated By</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $val)
							<tr>
								<td class="text-right">
				                  <div class="dropdown dropdown-action">
				                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
				                    <div class="dropdown-menu dropdown-menu-right">
				                      <a class="dropdown-item" href="{{url('/deletecorrection')}}/{{$val->attendancecorrection_id}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
				                       <a class="dropdown-item" href="#" onclick="declinecorrection({{$val->attendancecorrection_id}})"><i class="fa fa-times m-r-5"></i> Declined</a>
				                    </div>
				                  </div>
				                </td>
        						<?php
								if ($val->updated_by != null) {
								$getupdatedempname = DB::connection('mysql')->table('elsemployees')
								->where('elsemployees_empid','=',$val->updated_by)
								->select('elsemployees_name')
								->first();
								$getupdatedby = $getupdatedempname->elsemployees_name;
								}else{
								$getupdatedby = "-";
								}
        						?>
        						<td>{{$val->elsemployees_batchid}}</td>
        						<td>{{$val->elsemployees_name}}</td>
								<td style="width: 20px">
								@if($val->attendancecorrection_image)
								<a href="{{URL::to('public/attendancecorrection/')}}/{{$val->attendancecorrection_image}}" target="_blank">
								<img  alt=""  class="avatar" src="{{URL::to('public/attendancecorrection/')}}/{{$val->attendancecorrection_image}}"></a>
								@else
								<a href="{{URL::to('public/attendancecorrection/')}}/no_image.jpg" target="_blank">
								<img  alt=""  class="avatar" src="{{URL::to('public/attendancecorrection/')}}/no_image.jpg"></a>
								@endif
								</td>
								<td class="text-center">{{$val->attendancecorrection_title}}</td>
								<td>
								<textarea readonly style="width: 100%; height: 70px; border: none;">{{$val->attendancecorrection_desc}}</textarea></td>
								<td>{{$val->attendancecorrection_affdate}}</td>
								<td>{{$val->attendancecorrection_managercomment}}</td>
								<td>{{$val->attendancecorrection_admincomment}}</td>
								<td>{{$val->attendancecorrection_status}}</td>
								<td>{{$getupdatedby}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- /Page Content -->
</div>
<!-- /Page Wrapper -->
<script type="text/javascript">
$('#correctionatt').dataTable( {
  "pageLength": 100
} );
function declinecorrection($id){
	swal("Proceed And Comment:", {
		  content: "input",
		  buttons: true,
		  
		})
		.then((value) => {
		if(value != null){
		  $comment = value;
		  $.get('{{ URL::to("/declinecorrection")}}/'+$id+'/'+$comment);
		  window.location.reload();
			}else{
				swal("No Action Applied");
			}
	});
}
</script>	
<!-- modal end -->
<style type="text/css">
	.table {
		position: relative;
		display:block;
		width: 100% !important;
		overflow-x: scroll;
		overflow-y: scroll;
		height: 400px;
	}
	thead {
		position:sticky;
		top:0;
	}
</style>

@endsection