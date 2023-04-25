@extends('layout.apptheme')
@section('hr-HRM')
			
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-10">
					<h3 class="page-title">Monthly Opening Balance</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Opening Blance</li>
					</ul>
				</div>
			</div>
		</div>
		@if(session('message'))
      		<div><p class="alert alert-success" >{{session('message')}}</p> </div>
    	@endif
		<div class="panel-body">
	        <div class="row">
	            <div class="col-lg-12">
	            	<form action="{{ URL::to('/submitopeningbalance')}}" id="submitexpense" method="POST"  enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="hidden" name="expenseopening_month" value="{{$yearandmonth}}">
					<div class="row">
						<div class="col-lg-10">
							<div class="form-group">
								<label>Enter Amount<span class="text-danger"></span></label>
								<input type="number" class="form-control" name="expenseopening_balance">
							</div> 
							<button id="btnsubmit" type="submit" class="btn btn-primary">Next To Add Expense</button>
						</div>
					</div>
					</div>
					</form>
	            </div>
	        </div>
        </div>
    </div>				
</div>
@endsection