@extends('layout.apptheme')
@section('hr-HRM')

<style type="text/css">
  input, button, a {
      color: #4a4a4a;
  }
  a:hover, a:active, a:focus {
      color: #678c40;
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
					<h3 class="page-title">Job Post List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">List</li>
					</ul>
				</div>
		        @if(session()->get("role") <= 2)
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" onclick="addjobpost()" data-toggle="modal" data-target="#add_department"><i class="fa fa-plus"></i> Add Job</a>
				</div>
				@endif
             
			</div>
		</div>
		<!-- /Page Header -->	
		<div class="row">
            @if(session('message'))
                <div><p class="alert alert-success mt-3" >{{session('message')}}</p> </div>
            @endif
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 datatable" id="depl">
						<thead>
							<tr>
					        @if(session()->get("role") <= 2)
							<th class="text-right" style="width: 10%!important;">Action</th>
							@endif
							<th>Company</th>
							<th>Title</th>
							<th>Post Date</th>
							<th>Copy Link</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $val)
                                <?php
                                    if($val->jobpost_company == "Arc Inventador"){
                                        $posturl = "http://employee.arcinventador.com/careers/{$val->jobpost_token}";
                                    }elseif($val->jobpost_company == "AU Telecom"){
                                        $posturl = "http://employee.autelecom.net/auapply/{$val->jobpost_token}";
                                    }else{
                                        $posturl = "http://employee.cyberxify.com/cyberapply/{$val->jobpost_token}";
                                    }
                                ?>
								<tr>
                                    <td class="text-center" >
                                        <a href="{{ URL::to("/closejob")}}/{{$val->jobpost_id}}"> <i class="fa fa-trash"></i></a>
                                    </td>
									<td>{{$val->jobpost_company}}</td>
									<td>{{$val->jobpost_title}}</td>
									<td>{{$val->jobpost_date}}</td>
									<td>
                                    <div onclick="copylink({{$val->jobpost_id}})">
                                        <input type="text" class="alert" id="link-{{$val->jobpost_id}}" value="{{$posturl}}" style="float:left;min-width: 100%; margin-top: 10px; margin-bottom: 10px;"> <i class="fa fa-copy copy-class" aria-hidden="true"></i> 
                                    </div>
                                    <!-- <button class="btn add-btn" style="float:left;min-width: 90px; margin-top: 10px; margin-bottom: 10px;"><i class="fa fa-plus"></i>add</button> -->
                                    </td>
								</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- /Page Content -->
</div>
<!-- /Page Wrapper -->	
<div id ='modals'></div>

<script>
    $(document).ready(function(){
        $("#generate-link").modal('show');
    });
    function copylink(id) {
        console.log(id);
      var copyText = document.getElementById("link-"+id);
      copyText.select();
      copyText.setSelectionRange(0, 99999); /* For mobile devices */
    //   navigator.clipboard.writeText(copyText.value);
    document.execCommand('copy');
    }
</script>
<script type="text/javascript">
function addjobpost(){
	$.get('{{ URL::to("/addjobpost")}}',function(data){
	$('#modals').empty().append(data);
	$('#addjobpost').modal('show');
	});
}
	$('#modals').on('submit','#submitdept',function(e){
           e.preventDefault();
		   $("#btnsubmit").attr("disabled", true);
           var frmData = $(this).serialize();
           console.log(frmData)
           //$.post('{{ URL::to("/update")}}',frmData,function(data,xhrStatus,xhr){
               //$('#todolist').empty().append(data);
           //  $(".modal-body").append('<p class="alert alert-success">Task added successfully...! </p>');
           //});
           $.ajax({
               url:'{{ URL::to("/adddepartment")}}',
               type:'POST',
               data: frmData,
               dataType: 'json',
               success : function (data){
                   $("#loader").hide();
                   $(".modal-body").append('<p class="alert alert-success">Department Added Successfully...! </p>');
                // $("#errors").addClass("alert-success").text('Task added successfully...!');
                   
                   setTimeout(function(){$("#adddepartment").modal('hide')
                    window.location = "{{ URL::to('/departmentlist')}}";
                                    }, 2000);

                },
                error : function(error){
                   console.log("error");
                   // $("#loader").hide();
                   var error = error.responseJSON;
                   $("#modals #errors").empty();
                   $(".modal-body").append('<p class="alert alert-danger">Oops Something wrong...!</p>');
                   
                   setTimeout(function(){$("#adddepartment").modal('hide')
					window.location = "{{ URL::to('/departmentlist')}}";
                                    }, 2000);
                }
           })
       });



function editdepartment($id){
	$.get('{{ URL::to("/editdepartmentmodal")}}/'+$id,function(data){
	$('#modals').empty().append(data);
	$('#editdepartment').modal('show');
	});
}
function deletedepartment($id){
	$.get('{{ URL::to("/deletedepartment")}}/'+$id);
	window.location.reload();
}

$('#modals').on('submit','#editsubmitdept',function(e){
           e.preventDefault();
		   $("#editbtnsubmit").attr("disabled", true);
           var frmData = $(this).serialize();
           console.log(frmData)
           //$.post('{{ URL::to("/update")}}',frmData,function(data,xhrStatus,xhr){
               //$('#todolist').empty().append(data);
           //  $(".modal-body").append('<p class="alert alert-success">Task added successfully...! </p>');
           //});
           $.ajax({
               url:'{{ URL::to("/editsubmitdepartment")}}',
               type:'POST',
               data: frmData,
               dataType: 'json',
               success : function (data){
                   $("#loader").hide();
                   $(".modal-body").append('<p class="alert alert-success">Department Edit Successfully...! </p>');
                // $("#errors").addClass("alert-success").text('Task added successfully...!');
                   
                   setTimeout(function(){$("#editdepartment").modal('hide')
                    window.location = "{{ URL::to('/departmentlist')}}";
                                    }, 2000);

                },
                error : function(error){
                   console.log("error");
                   // $("#loader").hide();
                   var error = error.responseJSON;
                   $("#modals #errors").empty();
                   $(".modal-body").append('<p class="alert alert-danger">Oops Something wrong...!</p>');
                   
                   setTimeout(function(){$("#editdepartment").modal('hide')
					window.location = "{{ URL::to('/departmentlist')}}";
                                    }, 2000);
                }
           })
       });



</script>


@endsection