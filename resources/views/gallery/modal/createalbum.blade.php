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
<div id="createalbum" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Create Album</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							<form action="{{ URL::to('/submitcreatealbum')}}" id="frmAdddeduction" method="POST"  enctype="multipart/form-data">
							{{ csrf_field() }} 
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Title <span class="text-danger"></span></label>
										<input class="form-control" name="title" id="title"   placeholder="Enter Album Title" type="text" required>
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Event Date <span class="text-danger"></span></label>
										<input class="form-control" name="eventdate" id="eventdate" placeholder="Select Event Date" type="date" required>
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Image <span class="text-danger"></span></label>
										<input class="form-control" name="input" id="input" placeholder="Upload Album Image" accept="image/x-png,image/gif,image/jpeg" type="file" required>
									</div> 
								</div>
							</div>
							<div class="submit-section">
								<button id="submit" class="btn btn-primary submit-btn">Create</button>
							</div>
								</form>
							</div>
						</div>
					</div>
				</div>