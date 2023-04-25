		<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" /> -->
		<!-- Specific Page Vendor CSS -->
		<!-- <link rel="stylesheet" href="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/dropzone/css/dropzone.css" />
		<link rel="stylesheet" href="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/summernote/summernote.css" /> -->

		<!-- <link rel="stylesheet" href="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/codemirror/lib/codemirror.css" />
		<link rel="stylesheet" href="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/codemirror/theme/monokai.css" /> -->
		<!-- Head Libs -->
		<!-- <script src="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/modernizr/modernizr.js"></script> -->
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

<!-- Add Designation Modal -->
<div id="editincrement" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Increment</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/editsubmitincrement')}}" id="editsubmitinc" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
			<input type="hidden"  name="hdnincrementid" value="{{$data->increment_id}}" class="form-control">
					<div class="form-group">
						<label>Amount<span class="text-danger"></span></label>
						<input class="form-control" name="amount" value="{{$data->increment_amount}}" type="number">
					</div>
					<div class="form-group">
					<label>Month:<span class="text-danger"></span></label><br>
					  	<select name="month" class="form-control" required>
							<option value="">Select Month</option>
							<option value="January">January</option>
							<option value="February">February</option>
							<option value="March">March</option>
							<option value="April">April</option>
							<option value="May">May</option>
							<option value="June">June</option>
							<option value="July">July</option>
							<option value="August">August</option>
							<option value="September">September</option>
							<option value="October">October</option>
							<option value="November">November</option>
							<option value="December">December</option>
						</select>
                    </div>
                  	<div class="submit-section">
						<button id="editbtnsubmit" class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit Department Modal -->
		<!-- <script src="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/gauge/gauge.js"></script>
		<script src="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/snap-svg/snap.svg.js"></script>
		<script src="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/liquid-meter/liquid.meter.js"></script>
		<script src="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/summernote/summernote.js"></script> -->
		<!-- Theme Base, Components and Settings -->
		<!-- <script src="http://mobilelinkusa.com/mobilelinkrecap/public/javascripts/theme.js"></script> -->
		<!-- Theme Initialization Files -->
		<!-- <script src="http://mobilelinkusa.com/mobilelinkrecap/public/javascripts/theme.init.js"></script> -->
	