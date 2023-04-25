<style>
	.modal-dialog{

	}
.custom-modal .modal-content {
    border: 0;
    border-radius: 10px;
    width: 1048px;
}
.titleinput,.amountinput{
	width: 143px;
    height: 35px;
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<div id="addexpense" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document" style="display: flex;
    justify-content: center;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Expense</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div style="display: flex;
    justify-content: end;
    margin-right: 25px;
    margin-top: 10px;">
			<button class="btn btn-md btn-primary" 
		      id="addBtn" type="button" ttle="Add More">
		        Add More
		    </button>
			</div>
	
			<div class="modal-body">
			<form action="{{ URL::to('/submitexpense')}}" id="submitexpense" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }}
					<div class="form-group">
						<div class="row">
							<div class="col-lg-12">
								<div class="table-responsive">
								<table class="table table-striped custom-table mb-0 datatable dataTable no-footer" id="correctionatt">
									<thead>
										<tr>
										<th>For</th>
										<th>Title</th>
										<th>Amount</th>
										<th>Month</th>
										<th>Day</th>
										<th>Comment</th>
										<th>Remove</th>
										</tr>
									</thead>
									<tbody id="tbody">
										<tr>
										<td>
										<select class="form-control selectpicker" name="expense_for[]" data-live-search="true" required>
											<option value="All">All</option>
											@foreach($depart as $departs)
				                            <option value="{{$departs->dept_name}}">{{$departs->dept_name}}</option>
				                        	@endforeach 
				                        </select>
	                    				</td>
										<td>
										<input class="form-control titleinput" name="expense_title[]"  type="text" required>
										</td>
										<td>
										<input class="form-control amountinput" name="expense_amount[]"  type="number" required>
										</td>
										<td>
										<input type="text" name="expense_yearandmonth[]" style="width: 150px; height: 35px;" class="form-control" value="{{$yearandmonth}}" required readonly>
										</td>
										<td>
										<select name="expense_day[]" class="form-control" data-live-search="true" required>
										 	<option selected="" value="">Select Day</option>
										    <option value="01">01</option>
										    <option value="02">02</option>
										    <option value="03">03</option>
										    <option value="04">04</option>
										    <option value="05">05</option>
										    <option value="06">06</option>
										    <option value="07">07</option>
										    <option value="08">08</option>
										    <option value="09">09</option>
										    <option value="10">10</option>
										    <option value="11">11</option>
										    <option value="12">12</option>
										    <option value="13">13</option>
										    <option value="14">14</option>
										    <option value="15">15</option>
										    <option value="16">16</option>
										    <option value="17">17</option>
										    <option value="18">18</option>
										    <option value="19">19</option>
										    <option value="20">20</option>
										    <option value="21">21</option>
										    <option value="22">22</option>
										    <option value="23">23</option>
										    <option value="24">24</option>
										    <option value="25">25</option>
										    <option value="26">26</option>
										    <option value="27">27</option>
										    <option value="28">28</option>
										    <option value="29">29</option>
										    <option value="30">30</option>
										    <option value="31">31</option>
										</select>
										</td>
										<td>
										<textarea name="expense_comment[]" style="width: 273px; height: 35px;" class="form-control" type="text" rows="2"></textarea>
										</td>
										<td>
										<button class="btn btn-danger remove" type="button">Remove</button>
										</td>
										</tr>
									</tbody>
								</table>
								<div class="submit-section">
									<button id="btnsubmit" class="btn btn-primary submit-btn">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
<script>
	$(document).ready(function() {
		$('select').selectpicker();
	});
	var rowIdx = 0;
	$('#addBtn').on('click', function () {
  	$('#tbody').append(`<tr id="R${++rowIdx}">
        <td>
		<select class="form-control" name="expense_for[]" data-live-search="true" required>
			<option value="All">All</option>
			@foreach($depart as $departs)
            <option value="{{$departs->dept_name}}">{{$departs->dept_name}}</option>
        	@endforeach 
        </select>
		</td>
		<td>
		<input class="form-control titleinput" name="expense_title[]"  type="text" required>
		</td>
		<td>
		<input class="form-control amountinput" name="expense_amount[]"  type="number" required>
		</td>
		<td>
		<input type="text" name="expense_yearandmonth[]" style="  width: 150px; height: 35px;" class="form-control" value="{{$yearandmonth}}" required readonly>
		</td>
		<td>
		<select name="expense_day[]" class="form-control" data-live-search="true" required>
		 	<option selected="" value="">Select Day</option>
		    <option value="01">01</option>
		    <option value="02">02</option>
		    <option value="03">03</option>
		    <option value="04">04</option>
		    <option value="05">05</option>
		    <option value="06">06</option>
		    <option value="07">07</option>
		    <option value="08">08</option>
		    <option value="09">09</option>
		    <option value="10">10</option>
		    <option value="11">11</option>
		    <option value="12">12</option>
		    <option value="13">13</option>
		    <option value="14">14</option>
		    <option value="15">15</option>
		    <option value="16">16</option>
		    <option value="17">17</option>
		    <option value="18">18</option>
		    <option value="19">19</option>
		    <option value="20">20</option>
		    <option value="21">21</option>
		    <option value="22">22</option>
		    <option value="23">23</option>
		    <option value="24">24</option>
		    <option value="25">25</option>
		    <option value="26">26</option>
		    <option value="27">27</option>
		    <option value="28">28</option>
		    <option value="29">29</option>
		    <option value="30">30</option>
		    <option value="31">31</option>
		</select>
		</td>
		<td>
		<textarea name="expense_comment[]" style="width: 273px; height: 35px;" class="form-control" type="text" rows="2"></textarea>
		</td>
		<td>
		<button class="btn btn-danger remove" type="button">Remove</button>
		</td>
          </tr>`);
  	});
  	$('#tbody').on('click', '.remove', function () {
  		var child = $(this).closest('tr').nextAll();
  		child.each(function () {
  		  var id = $(this).attr('id');
  		  var idx = $(this).children('.row-index').children('p');
  		  var dig = parseInt(id.substring(1));
  		  idx.html(`Row ${dig - 1}`);
  		  $(this).attr('id', `R${dig - 1}`);
        });
  		$(this).closest('tr').remove();
  		rowIdx--;
    });
</script>