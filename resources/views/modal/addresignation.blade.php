		<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" /> -->
		<!-- Specific Page Vendor CSS -->
		<!-- <link rel="stylesheet" href="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/dropzone/css/dropzone.css" />
		<link rel="stylesheet" href="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/summernote/summernote.css" /> -->

		<!-- <link rel="stylesheet" href="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/codemirror/lib/codemirror.css" />
		<link rel="stylesheet" href="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/codemirror/theme/monokai.css" /> -->
		<!-- Head Libs -->
		<!-- <script src="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/modernizr/modernizr.js"></script> -->
<style>

.bootstrap-datetimepicker-widget table td.active{
    background-color: #678c40!important;
}
 .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #678c40!important;
}

.bootstrap-datetimepicker-widget table td.today:before {
    border-bottom-color: #678c40!important;
}

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

<!-- Add Department Modal -->
<div id="addresignation" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Resignation</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/addresignation')}}" id="submitresig" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
					<div class="form-group">
						<label>Batch Id<span class="text-danger"></span></label>
						<input class="form-control" name=empid type="text" readonly="" value="{{session()->get("batchid")}}">
					</div>
					<div class="form-group">
						<label>Last Date<span class="text-danger"></span></label>
						<div class="cal-icon">
							<input class="form-control datetimepicker" id="datetimepicker" name=lastdate type="text">
						</div>
					</div>
					<div class="form-group">
						<label>Submit Date<span class="text-danger"></span></label>
						<div class="cal-icon">
							<input class="form-control datetimepicker" id="datetimepicker1" name=submitdate type="text">
						</div>
					</div>
					<div class="form-group">
						<label>Reason of Resignation<span class="text-danger"></span></label>
						<textarea class="form-control" id="txtnote" name="txtnote" value="" rows="25" required></textarea>
                        <!-- <div id="summernote" class="summernote" data-plugin-summernote data-plugin-options='{ "height": 200, "dialogsInBody": true, "dialogsFade": false, "codemirror": { "theme": "ambiance" } }' ></div> -->
					</div>
					<div class="submit-section">
						<button id="btnsubmit" class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Add Department Modal -->

<script type="text/javascript">

	if($('#datetimepicker').length > 0) {
		$('#datetimepicker').datetimepicker({
				format: 'YYYY/MM/DD',
				icons: {
					up: "fa fa-angle-up",
					down: "fa fa-angle-down",
					next: 'fa fa-angle-right',
					previous: 'fa fa-angle-left'
				}
			}
			);
	}

</script>

<script type="text/javascript">

	if($('#datetimepicker1').length > 0) {
		$('#datetimepicker1').datetimepicker({
				format: 'YYYY/MM/DD',
				icons: {
					up: "fa fa-angle-up",
					down: "fa fa-angle-down",
					next: 'fa fa-angle-right',
					previous: 'fa fa-angle-left'
				}
			}
			);
	}

</script>
		<!-- <script src="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/gauge/gauge.js"></script>
		<script src="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/snap-svg/snap.svg.js"></script>
		<script src="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/liquid-meter/liquid.meter.js"></script>
		<script src="http://mobilelinkusa.com/mobilelinkrecap/public/vendor/summernote/summernote.js"></script> -->
		<!-- Theme Base, Components and Settings -->
		<!-- <script src="http://mobilelinkusa.com/mobilelinkrecap/public/javascripts/theme.js"></script> -->
		<!-- Theme Initialization Files -->
		<!-- <script src="http://mobilelinkusa.com/mobilelinkrecap/public/javascripts/theme.init.js"></script> -->