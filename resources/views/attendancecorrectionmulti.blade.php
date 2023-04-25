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
					<h3 class="page-title">Multiple Attandance Correction</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Pending Request</li>
					</ul>
				</div>
			</div>
		</div>
		@if(session('message'))
			<div><p class="alert alert-success" >{{session('message')}}</p> </div>
		@endif
		<br />
		<div style="margin-top:-40px;">
			<p class="alert alert-danger" >You Are Not Able To Change The Request Again, Please Perform Carefully.</p>
		</div>
		<form action="{{ URL::to('/updatemulticorrection')}}"  method="post">
			{{csrf_field()}}
			<div class="panel-body">					
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table mb-0 datatable dataTable no-footer" id="correctionatt">
								<thead>
									<tr>
									<th>Action</th>
									<th>Name</th>
									<th>Image</th>
									<th style="width: 30px;">Title</th>
									<th>Description</th>
									<th>Affected Dater</th>
									<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($data as $val)
										<tr>
											<td>
												<select id="reqstatus" name="reqstatus[]"   class="form-control">
													<option value="" selected="" disabled="">Select</option>
													@if(session()->get('role') == 3)
													<option value="Proceed~{{$val->attendancecorrection_id}}">Proceed</option>
						                            <option value="Declined By Manager~{{$val->attendancecorrection_id}}">Declined</option>
													@else
						                            <option value="Approved~{{$val->attendancecorrection_id}}">Approved</option>
						                            <option value="Declined~{{$val->attendancecorrection_id}}">Declined</option>
						                            @endif
						                        </select>
					                        </td>
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
								<textarea rows="1" readonly style="width: 100%; height: 70px; border: none;">	{{$val->attendancecorrection_desc}}</textarea></td>
											<td>{{$val->attendancecorrection_affdate}}</td>
											<td>{{$val->attendancecorrection_status}}</td>
					                    </tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
            </div><br><br>
			<div class="panel-footer text-right"><br>
				<span class="text-danger" style="float : left">Note : Please Check All Before Submitting</span>
				<button type="submit" style="margin-left: 45%; margin-bottom: 30px" class="btn btn-primary position-right">Submit <i class="icon-arrow-right14 position-right"></i></button>
			</div>	
		</form>
    </div>	
	<!-- /Vie Request Modal -->
	<div id ='modals'></div>
</div>
<!-- /Page Wrapper -->
<script type="text/javascript">
$('#correctionatt').dataTable( {
  "pageLength": 100,
  "order": [[ 5, "desc" ]]
} );
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