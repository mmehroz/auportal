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
		.modal-header{
			background-color: ##5069e7;
			color: white;
		}
		.modal-header h5{
			text-align: center;
			margin: 0 auto;
			padding-left: 105px;
		}
		.modal-header button span{
			color: white;
		}
		.form-control{
			border: 2px solid ##5069e7;
			outline: none;
			height: 50px;
		}
		.form-control:focus{
			border-color: ##5069e7;
			outline: none !important;
			

		}
		label{
			color: black !important;
			font-weight: 600;
			font-size: 14px;
			text-align: center;
			margin: 0 auto;
			padding-bottom: 5px
		}
		.submit-section{
			width: 100%;
		}
		.submit-section button{
			width: 100%;
			border: 2px solid ##5069e7;
			outline: none !important;
			background-color: ##5069e7;
			color: white;
		}
		.submit-section button:hover{
			background-color: white;
			color: ##5069e7;
			font-weight: 700;
			border: 2px solid ##5069e7;
		}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<div id="addachieved" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Achieved</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/submitaddachieved')}}" id="submitproduct" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
					<div class="form-group">
						<label>Batch Id<span class="text-danger"></span></label>
						<input class="form-control" name="batchid" value="{{$data['batchid']}}" type="number" required readonly>
					</div>
					<div class="form-group">
						<label>Month<span class="text-danger"></span></label>
						<input class="form-control" name="month" value="{{$data['month']}}" type="month" required readonly>
					</div>
					<div class="form-group">
						<label>Date<span class="text-danger"></span></label>
						<input class="form-control" name="acieveddate" type="date" value="<?php echo(date('Y-m-d'))?>" required>
                    </div>
					<div class="form-group">
						<label>Achived<span class="text-danger"></span></label>
						<input class="form-control" name="achieved" type="number" required>
                    </div>
                   	<div class="submit-section">
						<button id="btnsubmit" class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>