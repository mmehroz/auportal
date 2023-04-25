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
<div id="changepicture" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Update Employee</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@if ($errors->any())
	            <div class="alert alert-danger">
	                <ul>
	                    @foreach ($errors->all() as $error)
	                        <li>{{ $error }}</li>
	                    @endforeach
	                </ul>
	            </div>
	        @endif
			@if(session('message'))
	        <div>   <p class="alert alert-danger" >{{session('message')}}</p> </div>
	    	@endif
			<div class="modal-body">
			<form action="{{URL::to('submitchangeemployeepicture')}}" id="frmimage" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<ul id="errors" class="list-unstyled" >
                </ul>
				<input type="hidden" name="editreqid" value="{{$data}}" />
				<div class="form-group">
					<label for="activeStatus">Select Image To Upload</label>
					<input type="file" name="input" id="files" class="form-control" accept=".jpg, .jpeg, .png" required="required" >
					<i style="color:red;">Note:Please upload only one image of size less than 5MB!</i>
				</div>
				<div class="card-body">
	              <img  class="img-fluid img-thumbnail" id="image" />
            	</div>
				<div class="form-group text-center">
					<button class="btn btn-primary account-btn" type="submit">Upload</button>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
<script>
	document.getElementById("files").onchange = function () {
          	var reader = new FileReader();
			reader.onload = function (e) {
            document.getElementById("image").src = e.target.result;
          };
			reader.readAsDataURL(this.files[0]);
        };
</script>
