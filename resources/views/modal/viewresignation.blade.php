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
<div id="viewresignation" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">View Resignation</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/viewsubmitresignation')}}" id="viewsubmitresig" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
			<input type="hidden"  name="hdnresigid" value="{{$data->resignation_id}}" class="form-control">
					<div class="form-group">
						<label>Batch Id<span class="text-danger"></span></label>
						<input class="form-control" name=empid value="{{$data->resig_empid}}" type="text" readonly="">
					</div>
					<div class="form-group">
						<label>Last Date <span class="text-danger"></span></label>
						<div class="cal-icon">
							<input class="form-control datetimepicker" name=lastdate value="{{$data->resig_lastdate}}" type="text" readonly="">
						</div>
					</div>
					<div class="form-group">
						<label>Submit Date<span class="text-danger"></span></label>
						<div class="cal-icon">
							<input class="form-control datetimepicker" name=submitdate value="{{$data->resig_submitdate}}" type="text" readonly="">
						</div>
					</div>
					<div class="form-group">
						<label>Reason of Resignation<span class="text-danger"></span></label>
						<textarea class="form-control" id="txtnote" name="txtnote" value="" rows="25" required>{{$data->resig_reason}}</textarea>
                        <!-- <div id="summernote" class="summernote" data-plugin-summernote data-plugin-options='{ "height": 200, "dialogsInBody": true, "dialogsFade": true, "displayReadonly":false, "codemirror": { "theme": "ambiance" } }' >{{$data->resig_reason}}</div> -->
					</div>
                    @if(session()->get("role") <= 2)
					<div class="form-group">
						<label for="name">Resignation Status</label>
						<select class="form-control selectpicker" name="resigstatus"  required>
                            <option value="{{$data->resig_status}}" selected="" disabled="">{{$data->resig_status}}</option>
                            <option value="Approved">Approved</option>
							<option value="Decliend">Decliend</option>
                		</select>
					</div>
					<div class="submit-section">
						<button id="viewbtnsubmit" class="btn btn-primary submit-btn">Submit</button>
					</div>
					@endif
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Add Department Modal -->
		<!-- <script src="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/gauge/gauge.js"></script>
		<script src="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/snap-svg/snap.svg.js"></script>
		<script src="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/liquid-meter/liquid.meter.js"></script>
		<script src="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/summernote/summernote.js"></script> -->
		<!-- Theme Base, Components and Settings -->
		<!-- <script src="http://mobilelinkusa.com/mobilelinkrecap/public/javascripts/theme.js"></script> -->
		<!-- Theme Initialization Files -->
		<!-- <script src="http://mobilelinkusa.com/mobilelinkrecap/public/javascripts/theme.init.js"></script> -->