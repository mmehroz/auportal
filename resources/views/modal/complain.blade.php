<link rel="stylesheet" href="{!! asset('public/assets/css/bizzstyle.css') !!}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<div id="complain" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Submit Complain To HR</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/addcomplain')}}" id="submitannou" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
				    <div class="form-group">
						<label><span class="text-danger"></span>Note</label>
						<input type="text"  class="form-control mod-inp" id="complain_note" name="complain_note" required>
					</div>
					<div class="submit-section" style="text-align: right;">
						<button id="btnsubmit" class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form><br>
				<table class="table table-striped custom-table mb-0 datatable dataTable no-footer" id="announcement">
						<thead>
							<tr>
                				<th>Notes</th>
                				<th>Complain Date</th>
                				<th>Comment</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $val)
							<?php
							$commentcount = DB::connection('mysql')->table('complaincomment')
							->join ('elsemployees','elsemployees.elsemployees_batchid', '=','complaincomment.created_by')
							->where('complain_id','=',$val->complain_id)
							->select('complaincomment.complaincomment_id')
							->count('complaincomment.complaincomment_id');
							?>
							<tr>
								<td>{{$val->complain_note}}</td>
								<td>{{$val->complainstatus_name}}</td>
								<td><a data-dismiss="modal" class="dropdown-item" href="#" onclick="viewcomment({{$val->complain_id}})"><i class="fa fa-eye mr-5"> <span> {{$commentcount}}</span></i></a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
			</div>
		</div>
	</div>
</div>
<script>
function viewcomment($id){
    $.get('{{ URL::to("/viewcomment")}}/'+$id,function(data){
    $('#modals').empty().append(data);
    $('#viewcomment').modal('show');
    });
}
</script>