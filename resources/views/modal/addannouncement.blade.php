
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
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> -->
<!-- Add Department Modal -->
<div id="addannouncement" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Announcement</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/addannouncement')}}" id="submitannou" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
					<div class="form-group">
						<label>Title<span class="text-danger"></span></label>
						<input class="form-control" name=annoutitle type="text">
					</div>
					<div class="form-group">
						<label>Description:<span class="text-danger"></span></label>
                        <textarea class="form-control" id="annoudesc" name="annoudesc"  rows="25"></textarea>
					</div>
                    <div class="form-group">
						<label>Announcement For<span class="text-danger"></span></label>
						<select class="selectpicker" name="announcementfor[]"  multiple data-live-search="true" required>
						  	<option>All</option>
						 	<option value="BD">Birth Day/Anniversary</option>
						 	@foreach($depart as $departs)
	                			<option value={{$departs->dept_name}}>{{$departs->dept_name}}</option>
	            			@endforeach
						</select>
					</div>
                    <!-- <div class="form-group"> -->
						<label>Image<span class="text-danger"></span></label>
						<input class="form-control" name="image" type="file">
					<!-- </div> -->
					<div class="submit-section">
						<button id="btnsubmit" class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$('select').selectpicker();
</script>

<script>
  tinymce.init({
    selector: 'textarea#annoudesc',
    menubar: false
  });
</script>
	