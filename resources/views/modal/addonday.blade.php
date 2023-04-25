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

<!-- Add Department Modal -->
<div id="addonday" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Day</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<br>
                <ul id="errors" class="list-unstyled" style="display : none">
				</ul>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/submitonday')}}" id="frmAddSalaries" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
					<div class="form-group">
						<label>Department <span class="text-danger"></span></label>
						<input type="hidden" name="departid" value="{{$data->DEPT_ID}}">
						<input class="form-control" value="{{$data->DEPT_NAME}}" name="department" id="department" type="text" readonly>
					</div> 
					<div class="form-group">
						<label>Date <span class="text-danger"></span></label>
						<input class="form-control" name="date" id="date" type="date" required>
					</div>
					<div class="form-group">
						<label>Type<span class="text-danger"></span></label>
						<select class="form-control" required name="type">
							<option value="">Please Select</option>
							<option value="ON">ON</option>
							<option value="OFF">OFF</option>
						</select>
					</div>
					<div class="submit-section">
						<button id="submit" class="btn btn-primary submit-btn">Add Day</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>