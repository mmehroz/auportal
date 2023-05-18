@extends('layout.apptheme')
@section('hr-HRM')

<style type="text/css">
	.dropdown-menu {
		max-width: 27rem!important;
		font-size: 11px;
	}
	.btn-primary {
	    background-color: #4a4a4a;
	}

    .form-control {
    	padding-top: 1.2%;
    }
	.text-muted {
    	color: #4a4a4a !important;
	}
	/* p {
	    margin-left: 5%;
	} */
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

		.view-icons .btn {
			margin-right: 50px;
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
					<h3 class="page-title">Candidates List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Candidates List</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<div class="view-icons">
						<!-- <a href="{{url('/candidate_list')}}" class="grid-view btn btn-link" title="Grid-view"><i class="fa fa-th"></i></a> -->
						<a href="{{url('/candidatelist')}}" class="list-view btn btn-link active" style="background: #fff ; color: #777 !important; border: 1px solid #e3e3e3" title="List-view"><i class="fa fa-bars"></i></a>
						<div class="dropdown profile-action" style="right: 0px!important;">
							<a href="#" class=" dropdown-toggle" style=" border: 1px solid #e3e3e3;  font-size: 18px;display: inline-block; margin-right: 30px; margin-top: -10px; min-width: 40px; padding: 4px; padding-right: 10px;" data-toggle="dropdown" aria-expanded="false" title="Grid-view"><i class="fa fa-th"></i></a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="{{url('/candidate_list')}}" ><i class="fa fa-eye m-r-5"></i>Candidates List</a>
								<a class="dropdown-item" href="{{url('/screening_list')}}" ><i class="fa fa-eye m-r-5"></i>Screening List</a>
								<a class="dropdown-item" href="{{url('/irexperience_list')}}" ><i class="fa fa-eye m-r-5"></i>Inexperience List</a>
								<!-- <a class="dropdown-item" href="{{url('/irrelevent_list')}}" ><i class="fa fa-eye m-r-5"></i>Irrelevant List</a> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<!-- Page Tab -->
		<div class="page-menu">
		<div class="row">
		<div class="col-sm-12">
		<ul class="nav nav-tabs nav-tabs-bottom">
		<li class="nav-item">
		<a class="nav-link active" data-toggle="tab" href="#irrelevent_list">Irrelevant List</a>
		</li>
		</ul>
		</div>
		</div>
		</div><br>
		<div class="page-menu">
		<div class="row">
		<div class="col-sm-12">
		<ul class="nav nav-tabs nav-tabs-bottom">
		<li class="nav-item">
		<a class="" href="{{url('/candidate_list')}}" ><i class="fa fa-eye m-r-5"></i>Fresh Candidate List</a>&nbsp&nbsp
		<a class="" href="{{url('/screening_list')}}" ><i class="fa fa-eye m-r-5"></i>Screening List</a>&nbsp&nbsp
		<a class="" href="{{url('/irexperience_list')}}" ><i class="fa fa-eye m-r-5"></i>Inexperience List</a>
		</li>
		</ul>
		</div>
		</div>
		</div>
		<!-- /Page Tab -->
		
		<!-- Tab Content -->
		<div class="tab-content">
		
			<!-- <div class="row" id="modals">
				<div class="col-sm-12 col-md-12">
					<form id="frmeditstore" action="{{ URL::to('/searchirr')}}" >
						<div class="row filter-row" style="display: flex!important;">
							<div class="col-sm-6 col-md-4">  
								<label class="focus-label">Select category for search</label>
								<select class="select floating select2-hidden-accessible" name="mydata" id="searchdrop">
									<option value="" selected="" disabled="">Select from below</option>
									<option value="name">Name</option>
									<option value="department">Department</option>
									<option value="position">Postion Appplied for</option>
								</select>
							</div>
							<div id="field" class="col-sm-6 col-md-8">
								
							</div>
						</div>
					</form>
				</div>
			</div> -->
			<br>
			<div id="loader"></div>
			<div id="dynamicdata">
			
			</div>
		</div>
		<!-- Tab Content -->
		
    </div>
	<!-- /Page Content -->
	
	
</div>
<!-- /Page Wrapper -->			

<script>
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
			
			vampa=values['myname'] ;
			
			dampa=values['mydata'];
			
			// console.log($(this).serialize());
			
			$.get('{{ URL::to("/searchcan")}}/'+vampa+'~'+dampa,function(data){
				
				$('#dynamicdata').empty().append(data);
				
				$("#loader").hide();
				
			})
		});


		function showdata(){
			$("#loader").show();
			
			$.get('{{ URL::to("/irrelevent_listdata")}}',function(data){
				
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
				}else if(dropdownval == "position"){
					$("#field").html("<div class='row filter-row'style='display: flex!important;'><div class='col-sm-6 col-md-6'><label class='focus-label'>Postion Appplied for</label><input class='form-control floating' type='text' name='myname' ></div><div class='col-sm-6 col-md-2'></div><div class='col-sm-6 col-md-4'><label class='focus-label'></label><input class='btn btn-success btn-block' type='submit'></div></div>");
				}else{
					alert("kutti");
				}
		});
	
	});

</script>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


@endsection