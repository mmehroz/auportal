@extends('layout.apptheme')
@section('hr-HRM')

<style>
	.card {
	    padding: 1.25rem;
	    flex: 1 1 auto;
	    background-color: #a29e9e47;
	}
	.row{
		display: block!important;
	}

	.view-icons .btn.active {
	    color: #333;
	}

        #loader{
            display:none;
            position: fixed;
            height: 100%;
            width: 100%;
            top: 10px;
            bottom: 80px;
            left: 80px;
            background:url("https://mobilelinkusa.com/callingtree/public/images/loader1.gif");
            background-size: 10%;
            z-index: 1;
            background-color: #ffffff5c;
            background-repeat: no-repeat;
            background-position: 60% 80%;
        }


</style>

<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Employee List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Employee List</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto" style="margin-top: -4%;">
				@if( session()->get("role") ==	 1)
					<a href="{{url('/addemployeenos')}}" class="btn add-btn" data-toggle="" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
					<div class="view-icons">
						<a href="{{url('/employee_list')}}" class="grid-view btn btn-link" title="Grid-view"><i class="fa fa-th"></i></a>
						<a href="{{url('/employeelist')}}" class="list-view btn btn-link active" title="List-view"><i class="fa fa-bars"></i></a>
					</div>
				@endif
				</div>
			</div>
		</div>
		@if(session('message'))
			<div><p class="alert alert-success" >{{session('message')}}</p> </div>
		@endif
		<!-- /Page Header -->
		<div class="row" id="modals">
			<div class="col-sm-12 col-md-12">
				<form id="frmeditstore" action="{{ URL::to('/searchemp')}}" >
					<div class="row filter-row" style="display: flex!important;">
						<div class="col-sm-6 col-md-4">  
							<label class="focus-label">Select category for search</label>
							<select class="select floating select2-hidden-accessible" name="mydata" id="searchdrop">
								<option value="" selected="" disabled="">Select from below</option>
								<option value="name">Name</option>
								<option value="department">Department</option>
								<option value="batch">Batch ID</option>
							</select>
						</div>
						<div id="field" class="col-sm-6 col-md-8">
							
						</div>
					</div>
				</form>
			</div>
		</div>
		<br>
		<div id="loader"></div>
		<div id="dynamicdata">
		
		</div>
    </div>
	<!-- /Page Content -->
</div>
<!-- /Page Wrapper -->	
<script>

    function getedit($id){
		window.location.replace('{{ URL::to("/editemployee")}}/'+$id);
	}

	function changepicture($id){
	  $.get('{{ URL::to("/changepicturemodal")}}/'+$id,function(data){
	  $('#modals').empty().append(data);
	  $('#changepicture').modal('show');
	  });
	}
    // function viewprofile ($id) {
    // 	window.open('{{ URL::to("/employeeprofile")}}/'+$id,'_blank');
    //     // return true or false, depending on whether you want to allow the `href` property to follow through or not
    // }
	
	$('document').ready(function(){
		
			$.ajaxSetup({
			  headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});
			
			$('#modals').on('submit','#frmeditstore',function(e){
				
				$("#loader").show();
				e.preventDefault();
				
				
				var $inputs = $('#frmeditstore :input');
				
				
				
				var values = {};
				$inputs.each(function() {
					values[this.name] = $(this).val();
				});
				
				console.log(values);
				
				vampa=values['myname'];
				
				dampa=values['mydata'];
				
				// console.log($(this).serialize());
				
				$.get('{{ URL::to("/searchemp")}}/'+vampa+'~'+dampa,function(data){
					
					$('#dynamicdata').empty().append(data);
					
					$("#loader").hide();
					
				})
			});


			function showdata(){
				$("#loader").show();
				
				$.get('{{ URL::to("/employee_listdata")}}',function(data){
					
					$('#dynamicdata').empty().append(data);
					
					$("#loader").hide();
					
					});
			}
				
				showdata();
			
			$("#dynamicdata").on('click','.pagination a ',function(e){
					$("#loader").show();
                    e.preventDefault();
                    var url = $(this).attr('href');
                    $.get(url,function(data){
                    $('#dynamicdata').empty().append(data);
					$("#loader").hide();
					});
				});
				
			$('#searchdrop').on('change',function(){
					var dropdown = $(this).attr('name');
					var dropdownval = $(this).val();
					
					if(dropdownval == "name" ){
						$("#field").html("<div class='row filter-row'style='display: flex!important;'><div class='col-sm-6 col-md-6'><label class='focus-label'>Name</label><input class='form-control floating' type='text' name='myname' ></div><div class='col-sm-6 col-md-2'></div><div class='col-sm-6 col-md-4'><label class='focus-label'></label><input class='btn btn-success btn-block' type='submit'></div></div>");
					}else if(dropdownval == "department"){
						$("#field").html("<div class='row filter-row'style='display: flex!important;'><div class='col-sm-6 col-md-6'><label class='focus-label'>Department</label><select class='form-control floating'  name='myname' > @foreach($data as $datas)<option value='{{ $datas->dept_id }}'>{{ $datas->dept_name }}</option>@endforeach </select></div><div class='col-sm-6 col-md-2'></div><div class='col-sm-6 col-md-4'><label class='focus-label'></label><input class='btn btn-success btn-block' type='submit'></div></div>");
					}else if(dropdownval == "batch"){
						$("#field").html("<div class='row filter-row'style='display: flex!important;'><div class='col-sm-6 col-md-6'><label class='focus-label'>Batch ID</label><input class='form-control floating' type='text' name='myname' ></div><div class='col-sm-6 col-md-2'></div><div class='col-sm-6 col-md-4'><label class='focus-label'></label><input class='btn btn-success btn-block' type='submit'></div></div>");
					}else{
						$("#field").html("<div><h2>Invalid Type</h2></div>");
					}
			});
		
		});

</script>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection