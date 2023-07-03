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
<div id="addjobpost" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Job</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ URL::to('/submitaddjobpost')}}" id="submitjob" method="POST"  enctype="multipart/form-data">
            {{ csrf_field() }} 
                    <div class="form-group">
                        <label>Company Name <span class="text-danger"></span></label>
                        <select class="form-control "   name="jobpost_company"  required>
                            <option selected="" value="{{ old('jobpost_company') }}">Select Company</option>
                            <option value="Arc Inventador">Arc Inventador</option>
                            <option value="AU Telecom">AU Telecom</option>
                            <option value="Cyberxify">Cyberxify</option>
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label>Job Title <span class="text-danger"></span></label>
                        <input class="form-control" name=jobpost_title type="text" title="Enter Job Title" placeholder="Enter Job Title" required>
                    </div>
                    <div class="submit-section">
                        <button id="btnsubmit" type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Department Modal -->