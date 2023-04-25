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
					<h3 class="page-title">Announcement Comment List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Comments</li>
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
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 datatable dataTable no-footer" id="announcement">
						<thead>
							<tr>
                				@if(session()->get("role") <= 2)
                				<th>Action</th>
                				@endif
								<th>Comment</th>
								<th>Comment By</th>
								<th>Status</th>
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
		                      <a class="dropdown-item" href="#" onclick="approvedcomment({{$val->commentpost_id }})"><i class="fa fa-check m-r-5"></i> Approved</a>
		                      <a class="dropdown-item" href="#" onclick="declinedcomment({{$val->commentpost_id }})"><i class="fa fa-close m-r-5"></i> Declined</a>
		                    </div>
		                  </div>
		                </td>
        					@endif
								<td>{{$val->commentpost_comment}}</td>
								<td>{{$val->elsemployees_name}}</td>
								<td>{{$val->commentpost_status}}</td>
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
<div id ='modals'></div>
	
<script type="text/javascript">

function approvedcomment($id){
	$.get('{{ URL::to("/approvedcomment")}}/'+$id);
	window.location.reload();
}
function declinedcomment($id){
	$.get('{{ URL::to("/declinedcomment")}}/'+$id);
	window.location.reload();
}

</script>	
					
@endsection