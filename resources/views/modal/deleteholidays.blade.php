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
<div id="deleteholidays" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Delete Holiday</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="#" id="editsubmitholi" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
				<p style="margin-top: -20px; font-size: 15px; text-align: center; margin-bottom: 1rem; color: #929292; font-family: 'CircularStd', sans-serif;">Are you sure want to delete?</p>
				<input type="hidden"  name="hdnholiid" value="{{$data->HOLI_ID}}" class="form-control">
					<div class="form-group">
						<div class="row">
							<div class="col-6">
								<a href="{{url('/delete_holiday')}}/{{$data->HOLI_ID}}" class="btn btn-primary continue-btn">Delete</a>
							</div>
							<div class="col-6">
								<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
							</div>
						</div>
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