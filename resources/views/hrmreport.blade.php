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
					<h3 class="page-title">Employee Feedback</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Report</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table datatable dataTable no-footer" id="hrmrep" style="white-space: normal;">
						<thead>
							<tr>
								<th>Images</th>
				                <th>No of Images</th>
				                <th>Video</th>
				                <th>Description</th>
				                <th>Employee Name</th>
				                <th>Department</th>
				                <th>Submitted Date</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $val)
							<tr>
								<td style="width: 30px;" class="text-center"><button type="button" onclick="getedit({{'"'.$val->deptpic_id.'"'}})" class="btn btn-info btn-s add-tooltip" id="btnstatus"  style="background-color:#678c40; border-color: #4a4a4a;"><i class="fa fa-image"></i></button></td>
								<td><?php
                    $noofimages = explode("|", $val->dept_picture);
                     $result = count($noofimages);
                    print_r($result)
                    ?>
                </td>
								<td><a target="_blank" href="{{ URL::to('public/video/')}}/{{$val->dept_video}}" download >Download video</a></td>
								<td>{{$val->dept_description}}</td>
								<td>{{$val->elsemployees_name}}</td>
								<td>{{$val->DEPT_NAME}}</td>
								<td>{{$val->dept_date}}</td>
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

<script>

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      function getedit($id){
        $.get('{{ URL::to("/viewpicture")}}/'+$id,function(data){
        $('#modals').empty();
        $('#modals').append(data);
        $('#getmeImage').modal('show');
        });
      }
      //    function auditimage($id){
      //   $.get('{{ URL::to("/auditimage")}}/'+$id);
      //   window.location.reload('{{ URL::to("/ctreport")}}');
      // }
</script>
			
@endsection