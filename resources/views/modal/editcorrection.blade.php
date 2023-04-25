<style>
 .leaveStyle{
	position : relative;
	left : 10px;
	margin-bottom : 12px;
 }
 #message {
   position :relative;
   font-size : 20px;
 }
  .redborder{border:1px solid red;}
   #loader-ajax2 {
			display:    none;
			position:   fixed;
			z-index:    1000;
			top:        0;
			left:       0;
			height:     100%;
			width:      100%;
			background: rgba( 255, 255, 255, .8 ) 
						url('http://zaradevelopment.com/els/assets/images/loading_bar.gif') 
						50% 50% 
						no-repeat;
		}
		.bootstrap-select .dropdown-toggle{
			height: 40px;
			margin-left: 10px;
		}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<div id="editcorrection" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Attendance Correction</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/submiteditcorrection')}}" id="submitannou" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
			<input type="hidden" name="hdncorrectionid" value="{{$data->attendancecorrection_id}}">
			<input type="hidden" name="hdnempbatchid" value="{{$data->created_by}}">
					<div class="form-group">
						<label>Correction From<span class="text-danger"></span></label>
						<input type="text" class="form-control" value="{{$data->attendancecorrection_title}}" readonly>
					</div>
					<div class="form-group">
						<label>Correction To<span class="text-danger"></span></label>
						<select name="edittitle" class="form-control" required>
							<option value="">Select</option>
							@if($data->attendancecorrection_title == "Absent")
							<option value="Late" title="Dedut Quarter">Late</option>
							<option value="Half Day" title="Dedut Half Day">Half Day</option>
							<option value="Quarter Day" title="Dedut Late">Quarter Day</option>
							@elseif($data->attendancecorrection_title == "Half Day")
							<option value="Late" title="Dedut Late">Late</option>
							@else
							<option>Half Day</option>
							<option value="Absent">Absent</option>
							@endif
						</select>
					</div>
					<div class="form-group">
                    	<label>Approvad/Decline<span class="text-danger"></span></label>
						<select class="form-control" name="approvedecline" required>
							<option value="">Select</option>
							<option value="Proceed">Proceed</option>
							<option value="Declined By Manager">Declined</option>
						</select>
					</div>
					<div class="submit-section">
						<button id="btnsubmit" name="btnsubmitcorrection" class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>