<form id="frmeditstore"  action="{{ URL::to('/searchemp')}}" method="post">
			{{csrf_field()}}
				<div class="col-md-4">
					<label>Select category for search</label>
					<select name="mydata" id="searchdrop">
						<option value="">Select from below</option>
						<option value="name">Name</option>
						<option value="department">Department</option>
						<option value="batch">Batch ID</option>
						<option value="role">Role</option>
						<option value="email">Email</option>
					</select>
				</div>
				<div id="field" class="col-md-4">
					<label>Name</label><input type='text' name='myname' ><input type='submit'>
				</div>
</form>