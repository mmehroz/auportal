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

<!-- Add Designation Modal -->
<div id="editholidays" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Holiday</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/editsubmitholidays')}}" id="editsubmitholi" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
			<input type="hidden"  name="hdnholiid" value="{{$data->HOLI_ID}}" class="form-control">
					<div class="form-group">
						<label>Holidays Title <span class="text-danger"></span></label>
						<input class="form-control" name=holititle value="{{$data->HOLI_TITLE}}" type="text">
					</div>
					<div class="form-group">
						<label>Holidays Date <span class="text-danger"></span></label>
						<div class="cal-icon">
							<input class="form-control datetimepicker required_colom" id="datetimepicker" name=holidate value="{{$data->HOLI_DATE}}" type="text">
						</div>
					</div>
					<div class="submit-section">
						<button type="button" data-task="{{$data->HOLI_ID}}" id="btnDelete"  data-dismiss="modal" aria-hidden="true"  class="btn btn-danger submit-btn">Delete</button>
						<button id="editbtnsubmit" class="btn btn-primary submit-btn">Submit</button>
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