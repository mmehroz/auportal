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
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="" ass="page-title">Attendance Correction List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Correction</li>
					</ul>
				</div>
				@if(session()->get('role') <= 3)
					<a href="{{url('/approvedmulti_correction')}}" class="btn add-btn"><i class="fa fa-check-square"></i> Approved Multiple Request</a>&nbsp
				@endif
				@if(session()->get('role') <= 2)
					<a href="{{url('/attendancecorrectionforadmin')}}" class="btn add-btn"><i class="fa fa-check"></i> Correction Request | Manager</a>
				@endif
			</div>
		</div>
	    @if(session('message'))
	      <div><p class="alert alert-success" >{{session('message')}}</p> </div>
	    @endif
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 datatable dataTable no-footer" id="correctionatt">
						<thead >
							<tr>
                				@if(session()->get("role") <= 3)
                				<th class="text-right;" style="width: 10%!important;padding-left: 4%!important;">Action</th>
                				@endif
								<th>Name</th>
								<th>Image</th>
								<th style="width: 30px;">Title</th>
								<th>Description</th>
								<th>Affected Dater</th>
								@if(session()->get("role") <= 2)
								<th>Manager Comment</th>
								<th>HR Comment</th>
								@endif
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $val)
							<tr>
	        				@if(session()->get("role") <= 3)
			                <td class="text-right">
			                  <div class="dropdown dropdown-action">
			                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
			                    <div class="dropdown-menu dropdown-menu-right">
			                    @if(session()->get("role") == 3 || session()->get("id") == 27)
			                      <a class="dropdown-item" href="#" onclick="proceedcorrection({{$val->attendancecorrection_id}})"><i class="fa fa-check m-r-5"></i> Proceed</a>
			                      <a class="dropdown-item" href="#" onclick="managerdeclinecorrection({{$val->attendancecorrection_id}})"><i class="fa fa-check m-r-5"></i> Declined</a>
			                      @if($val->attendancecorrection_title != "Late")
			                      <a class="dropdown-item" href="#" onclick="editcorrectionmodal({{$val->attendancecorrection_id}})"><i class="fa fa-pencil m-r-5"></i> Edit</a>
			                      @endif
			                    @endif  
			                    @if(session()->get("role") <= 2)
			                      <a class="dropdown-item" href="#" onclick="approvecorrection({{$val->attendancecorrection_id}})"><i class="fa fa-check m-r-5"></i> Approved</a>
			                      <a class="dropdown-item" href="#" onclick="declinecorrection({{$val->attendancecorrection_id}})"><i class="fa fa-times m-r-5"></i> Declined</a>
			                      <a class="dropdown-item" href="{{url('/deletecorrection')}}/{{$val->attendancecorrection_id}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
			                      @endif 
			                    </div>
			                  </div>
			                </td>
	        					@endif
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
								@if(session()->get("role") <= 2)
								<td>{{$val->attendancecorrection_managercomment}}</td>
								<td>{{$val->attendancecorrection_admincomment}}</td>
								@endif
								<td>{{$val->attendancecorrection_status}}</td>
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
<script type="text/javascript">
$('#correctionatt').dataTable( {
  "pageLength": 100,
  "order": [[ 5, "desc" ]]
} );
function addcorrection(){
	$.get('{{ URL::to("/addcorrectionmodal")}}',function(data){
	$('#modals').empty().append(data);
	$('#addcorrection').modal('show');
	});
}
function proceedcorrection($id){
	swal("Comment And Proceed:", {
		  content: "input",
		  buttons: true,
		})
		.then((value) => {
		if(value != null){
		  $comment = value;
		  $.get('{{ URL::to("/proceedcorrection")}}/'+$id+'/'+$comment);
		  location.reload(true);
			}else{
				swal("No Action Applied");
			}
	});
}
function managerdeclinecorrection($id){
	swal("Comment And Proceed:", {
		  content: "input",
		  buttons: true,
		})
		.then((value) => {
		if(value != null){
		  $comment = value;
		  $.get('{{ URL::to("/managerdeclinecorrection")}}/'+$id+'/'+$comment);
		  location.reload(true);
			}else{
				swal("No Action Applied");
			}
	});
}
function approvecorrection($id){
		swal("Approved:", {
		  content: "input",
		  buttons: true,
		})
		.then((value) => {
		if(value != null){
		  $comment = value;
		  $.get('{{ URL::to("/approvecorrection")}}/'+$id+'/'+$comment);
		  location.reload(true);
			}else{
				swal("No Action Applied");
			}
	});
}
function declinecorrection($id){
	swal("Proceed And Comment:", {
		  content: "input",
		  buttons: true,
		})
		.then((value) => {
		if(value != null){
		  $comment = value;
		  $.get('{{ URL::to("/declinecorrection")}}/'+$id+'/'+$comment);
		  location.reload(true);
			}else{
				swal("No Action Applied");
			}
	});
}
function editcorrectionmodal($id){
	$.get('{{ URL::to("/editcorrectionmodal")}}/'+$id,function(data){
	$('#modals').empty().append(data);
	$('#editcorrection').modal('show');
	});
}
</script>	
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
