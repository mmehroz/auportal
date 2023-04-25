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
<div id="addholidays" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Holiday</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/addholidays')}}" id="submitholi" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
					<div class="form-group">
						<label>Holiday TITLE <span class="text-danger"></span></label>
						<input class="form-control" name=holititle type="text">
					</div>
					<div class="form-group">
						<label>Holiday Date <span class="text-danger"></span></label>
						<div class="cal-icon">
							<input class="form-control datetimepicker required_colom"  id="datetimepicker" name=holidate type="text">
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
