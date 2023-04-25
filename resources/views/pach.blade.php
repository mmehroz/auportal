@extends('layout.apptheme')
@section('hr-HRM')
		
<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Change Password</h3>
								@if ($errors->any())
			                    <div class="alert alert-danger">
			                        <ul>
			                            @foreach ($errors->all() as $error)
			                                <li>{{ $error }}</li>
			                            @endforeach
			                        </ul>
			                    </div>
			                	@endif
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Change Password</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="text-right form-inline">

					</div>
                    <div class="row">
                        <div class="col-lg-12">
							<div class="account-box">
								<div class="account-wrapper">
									@if(session('message'))
							            <div>   <div class="alert alert-info" >{!!session('message')!!}</div> </div>
							          @endif
									<h3 class="account-title">Change Password?</h3>
									<p class="account-subtitle">Please fullfill the following requirements to change your password</p>
									
									<!-- Account Form -->
									<!-- <form action="{{URL::to('/passwordchange')}}" id="frmimage" method="post"> -->
									<form action="{{URL::to('/passwordchange')}}" id="resetpassForm" method="post"  enctype="multipart/form-data">
										{{ csrf_field() }}
										<!-- <ul id="errors" class="list-unstyled" >
				                        </ul> -->
										<!-- <input type="hidden" name="editreqid" value="{{session()->get('id')}}" />
										<div class="form-group">
											<label for="activeStatus">Old Password</label>
											<input type="Text" name="oldpass"  class="form-control required_colom"  enctype="multipart/form-data">
										</div> -->
										<div class="form-group">
											<label for="activeStatus">New Password</label>
											<!-- <input type="password" name="newpass"  class="form-control required_colom" required="required"  > -->
											<input type="password" id="password" name="password"  class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
										</div>
										<div class="form-group">
											<label for="activeStatus">Confirm Password</label>
											<!-- <input type="password" name="connewpas"  class="form-control required_colom" required="required"  > -->
											<input type="password" id="password_confirm" name="password_confirm"  class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
										</div>
										<div class="form-group text-center">
											<button class="btn btn-primary account-btn" type="submit">Reset</button>
										</div>
									</form>
									<!-- /Account Form -->
									
								</div>
							</div>
                        </div>
                    </div>
                </div>
                <!-- <div id ='modal'></div>				 -->
            </div>
			<!-- Page Wrapper -->
<!-- <script>
		  $('.account-wrapper').on('submit','#frmimage',function(e){
							e.preventDefault();
							var frmData = $(this).serialize();
							
							$.ajax({
								url:'{{ URL::to("/passwordchange")}}',
								type:'POST',
								data: frmData,
								dataType: 'json',
								success : function (data){
									// console.log(data.no);
									
									// dd(data);
									if(data.yes){
										$(".account-wrapper #errors").empty();
										$(".account-wrapper #errors").append('<p class="alert alert-success">'+(data.yes)+ '</p>');
										
										setTimeout(function(){
											window.location = "{{ URL::to('/')}}";
										  }, 1500);
										
										
									}else{
										$(".account-wrapper #errors").empty();
										
									$(".account-wrapper #errors").append('<p class="alert alert-warning">'+(data.no)+ '</p>');
								 // $("#errors").addClass("alert-success").text('Task added successfully...!');
									}
				
								 },
								 error : function(error){
									
									// $("#loader").hide();
									var error = error.responseJSON;
									$(".account-wrapper").append('<p class="alert alert-danger">Oops Somenthing went wrong</p>');
									
								 }
							})
						});
	</script> -->

	 <script type="text/javascript">
$('#resetpassForm').validate(
                {

                    errorElement: 'div',
                    errorClass: 'help-block',
                    focusInvalid: false,
                    rules:
                    {
                        password: {    required: true  },
                        password_confirm : {
                                   required : true,
                                   equalTo : "#password",
                              }
                    },

                    messages: {
                        //name_fname: " Please enter name father name",
                    },
                    /*invalidHandler: function (event, validator) { //display error alert on form submit
                        $('.alert-danger', $('.add_new_ajeer')).show();
                    },

                    highlight: function (e) {
                        $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
                    },

                    success: function (e) {
                        $(e).closest('.form-group').removeClass('has-error').addClass('has-info');
                        $(e).remove();
                    },
                    errorPlacement: function (error, element) {
                        error.insertAfter(element.parent());
                    },*/

                });
</script>

@endsection