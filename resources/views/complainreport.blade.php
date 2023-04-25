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
					<h3 class="page-title">Complain Report</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Complain</li>
					</ul>
				</div>
			</div>
		</div>
    @if(session('message'))
      <div><p class="alert alert-success" >{{session('message')}}</p> </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <div><h4><li>{{ $error }}</li></h4> </div>
            @endforeach
          </ul>
        </div>
    @endif
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 datatable dataTable no-footer" id="announcement">
						<thead>
							<tr>
                				@if(session()->get("role") <= 2)
                				<th>Action</th>
                				@endif
								<th>Note</th>
								<th>Status</th>
								<th>Complain By</th>
								<th>Complain Date</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $val)
							<tr>
        				@if(session()->get("role") <= 2)
		                <td class="text-right">
		                  <div class="dropdown dropdown-action">
		                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
		                    <div class="dropdown-menu dropdown-menu-right">
		                      <a class="dropdown-item" href="#" onclick="processcomplain({{$val->complain_id}})"><i class="fa fa-spinner m-r-5"></i>In Process</a>
		                      <a class="dropdown-item" href="#" onclick="resolvecomplain({{$val->complain_id}})"><i class="fa fa-check m-r-5"></i>Resolve</a>
		                      <a class="dropdown-item" href="#" onclick="rejectcomplain({{$val->complain_id}})"><i class="fa fa-close m-r-5"></i> Reject</a>
		                      <a class="dropdown-item" href="#" onclick="submitcomplaincomment({{$val->complain_id}})"><i class="fa fa-plus m-r-5"></i>Add Comment</a>
		                      <a class="dropdown-item" href="#" onclick="viewcomment({{$val->complain_id}})"><i class="fa fa-eye m-r-5"></i>View Comment</a>
		                    </div>
		                  </div>
		                </td>
        					@endif
								<td>{{$val->complain_note}}</td>
								<td>{{$val->complainstatus_name}}</td>
								<td>{{$val->elsemployees_name}}</td>
								<td>{{$val->complain_date}}</td>
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
function submitcomplaincomment($id){
		swal("Comment:", {
		  content: "input",
		  buttons: true,
		  
		})
		.then((value) => {
		if(value != null){
		  $comment = value;
		  $.get('{{ URL::to("/submitcomplaincomment")}}/'+$id+'/'+$comment);
		  swal("Send", "Comment Submited Successfully!", "success");
		  	}else{
				swal("No Action Applied");
			}
	});
}
function processcomplain($id){
	$.get('{{ URL::to("/processcomplain")}}/'+$id);
	window.location.reload();
}
function resolvecomplain($id){
	$.get('{{ URL::to("/resolvecomplain")}}/'+$id);
	window.location.reload();
}
function rejectcomplain($id){
	$.get('{{ URL::to("/rejectcomplain")}}/'+$id);
	window.location.reload();
}
function viewcomment($id){
    $.get('{{ URL::to("/viewcomment")}}/'+$id,function(data){
    $('#modals').empty().append(data);
    $('#viewcomment').modal('show');
    });
}
</script>	
@endsection