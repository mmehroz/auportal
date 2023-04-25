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
</style>
<div id="mark_attendance" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Attendance</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/submitmarkattendance')}}" id="submitexpense" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }}
					<div class="form-group">
						<div class="row">
							<div class="col-lg-6">
								<label class="col-form-label">Employee Name<span class="text-danger"></span></label>
								<select name="markattendance_for" class="form-control selectpicker" data-live-search="true" required>
									<option selected="" value="">Select Employee</option>
									@foreach($data as $val)
									<option value="{{$val->elsemployees_batchid }}">{{$val->elsemployees_name}} - {{$val->elsemployees_batchid }}</option>
									@endforeach
		                        </select>
	                    	</div>
	                    	<div class="col-lg-6">
								<div class="form-group">
									<label class="col-form-label">Type<span class="text-danger"></span></label>
									<select name="markattendance_type" class="form-control selectpicker" data-live-search="true" required>
										<option selected="" value="">Select Check Type</option>
										<option value="0">In</option>
										<option value="1">Out</option>
			                        </select>
								</div> 
							</div>
	                    </div>
					</div> 
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Date<span class="text-danger"></span></label>
								<input class="form-control" name="markattendance_date" type="date" required>
							</div> 
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Time<span class="text-danger"></span></label>
								<input class="form-control" name="markattendance_time" type="time" required>
							</div> 
						</div>
					</div>
					<div class="submit-section">
						<button id="btnsubmit" class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('select').selectpicker();
	});			
</script>