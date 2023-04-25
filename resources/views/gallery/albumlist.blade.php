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
					<h3 class="page-title">Album List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/maindashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Album List</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto" style="margin-top: -4%;">
				@if( session()->get("role") ==	 1)
					<a href="#" onclick="createalbummodal()" class="btn add-btn" data-toggle="" data-target="#add_employee"><i class="fa fa-plus"></i>Create Album</a>
				@endif
				</div>
			</div>
		</div>
		@if(session('message'))
			<div><p class="alert alert-success" >{{session('message')}}</p> </div>
		@endif
		@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <div>   <p><li>{{ $error }}</li></p> </div>
                    @endforeach
                </ul>
            </div>
        @endif
		<br>
		<div id="loader"></div>
		<div id="dynamicdata">
		</div>
    </div>
</div>
<div id ='modals'></div>
<script>
	function createalbummodal(){
		$.get('{{ URL::to("/createalbummodal")}}',function(data){
		$('#modals').empty().append(data);
		$('#createalbum').modal('show');
		});
	}
	function getedit($id){
		$.get('{{ URL::to("/editalbummodal")}}/'+$id,function(data){
		$('#modals').empty().append(data);
		$('#editalbum').modal('show');
		});
	}
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
				
			
			});


			function showdata(){
				$("#loader").show();
				
				$.get('{{ URL::to("/albumlistdata")}}',function(data){
					
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
		
		});

</script>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection