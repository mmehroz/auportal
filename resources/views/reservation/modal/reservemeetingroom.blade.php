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
<div id="reservemeetingroom" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Reserve Meeting Room</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/submitreservtion')}}" id="submitannou" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
			<div class="form-group">
				<label><span class="text-danger"></span>Enter Reservation Title</label>
				<input type="text" class="form-control" id="reserveroom_for" name="reserveroom_for" required>
			</div>	
		  	 <div class="form-group">
		  	 	<label><span class="text-danger"></span>Select Meeting Room</label>
		  	 	<select class="form-control "   placeholder="Enter" name="meetingroom_id"  required>
            		<option selected="" value="">Select</option>
       				@foreach($data as $data)
            		<option value={{$data->meetingroom_id}}>{{$data->meetingroom_name}}</option>
        			@endforeach 
            	</select>
			</div>
		    <div class="form-group">
				<label><span class="text-danger"></span>Select Date To Reserve</label>
				<input type="date" class="form-control" id="reserveroom_date" name="reserveroom_date" required>
			</div>
			<div class="form-group">
				<label><span class="text-danger"></span>Select Start Time</label>
				<input type="datetime-local" class="form-control" id="reserveroom_starttime" name="reserveroom_starttime" required>
			</div>
			<div class="form-group">
				<label><span class="text-danger"></span>Select End Time</label>
				<input type="datetime-local" class="form-control" id="reserveroom_endtime" name="reserveroom_endtime" required>
			</div>
			<div class="submit-section">
				<button id="btnsubmit" class="btn btn-primary submit-btn">Submit</button>
			</div>
			</form>
			</div>
		</div>
	</div>
</div>