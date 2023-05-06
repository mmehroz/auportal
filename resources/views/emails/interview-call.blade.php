<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/smarthr/maroon/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Mar 2020 18:49:56 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Interview Call - HRMS</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{!! asset('public/assets/img/favicon.png') !!}" />
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{!! asset('public/assets/css/bootstrap.min.css') !!}" />
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{!! asset('public/assets/css/font-awesome.min.css') !!}" />
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{!! asset('public/assets/css/style.css') !!}" />
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
			a:hover, a:active, a:focus {
			    text-decoration: none;
			    outline: none;
			    color: #4a4a4a!important;
			}
		</style>
    </head>
    <!-- <body class="account-page"  style="background-color: #e9ecef;"> -->
    <body class="account-page" >
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<div class="account-content">
				<div class="container">
					<!-- <div class="account-box"> -->
						<div class="account-wrapper">
							<!-- start preheader -->
							<div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;">
							Invitation to Interview - Arc Inventador
							</div>
							<!-- end preheader -->
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<!-- start logo -->
							    <tr>
						      		<td align="center" bgcolor="#e9ecef">
							        	<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
								          	<tr>
								            	<td align="center" valign="top" style="padding: 20px 150px;position: absolute;">
								            		<a href="https://www.arcinventador.com/" target="_blank" style="display: inline-block;">
								                		<img src="https://avidhaus.com/images/arclogo.png" alt="" border="0" width="48" style="display: block; width: 278px; max-width: 100%; min-width: 48px;">
								            		</a>
								            	</td>
								          	</tr>
							        	</table>
							    	</td>
							    </tr>
							    <!-- end logo -->
							    <!-- start hero -->
							    <tr>
							      <td align="center" bgcolor="#e9ecef">
							        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
							          <tr>
							            <td align="left" bgcolor="#ffffff" style="padding: 120px 24px 0; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;">
							              <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Dear {{$datas['candidatedata']->jobapplicant_name }}</h1>
							            </td>
							          </tr>
							        </table>
							      </td>
							    </tr>
							    <!-- end hero -->
							    <!-- start copy block -->
							    <tr>
							      <td align="center" bgcolor="#e9ecef">
							        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
							          <!-- start copy -->
							          <tr>
							            <td align="left" bgcolor="#ffffff" style="padding: 24px;  padding-bottom:0px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
							              <p style="margin: 0; color: #000;">We are pleased to inform you that your application for the <b>{{$datas['candidatedata']->jobapplicant_postionapppliedform }}.</b> position at Arc Inventador has been reviewed, and we are impressed with your qualifications and experience. As a result, we would like to invite you for an interview with our team.<br><br>
											The interview is scheduled for <b>{{$datas['request']->interTime }}.</b>, and it will take place at 3rd Floor, Building B&H House Gulshan e Iqbal Block 15 Karachi. Please arrive at least 10 minutes before the scheduled time to allow for parking and check-in procedures.
											<br><br>
											During the interview, you will have the opportunity to meet with members of our hiring team and discuss your skills, experience, and qualifications in further detail. You will also have the opportunity to learn more about Arc Inventador and the role that you have applied for.
											<br><br>
											To confirm your attendance at the interview, please reply to this email with your availability for the given date and time. We would appreciate it if you could respond within 24 hours to confirm your attendance.
											<br><br>
											If the provided date and time are not suitable, please let us know, and we will try our best to accommodate your schedule.
											<br><br>
											We are looking forward to meeting you in person and learning more about your qualifications and experience.
											<br><br>
											Thank you for considering Arc Inventador as your potential employer, and we look forward to hearing back from you soon.
											</p>
							            </td>
							          </tr>
							        </table>
							      </td>
							    </tr>
							    <!-- end copy block -->
							    <!-- start footer -->
							    <tr>
							      <td align="center" bgcolor="#e9ecef" style="padding: 24px;">
							        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
							          <!-- start unsubscribe -->
							          <tr>
							            <td align="center" bgcolor="#e9ecef" style="padding: 12px 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;">
							              <!-- <p style="margin: 0;">To stop receiving these emails, you can <a href="https://sendgrid.com" target="_blank">unsubscribe</a> at any time.</p> -->
							              <p style="margin: 0;">&copy; <b>Arc-Inventador</b> <?php echo(date('Y'))?>. All Right Reserved. </p>
							            </td>
							          </tr>
							          <!-- end unsubscribe -->
							        </table>
							      </td>
							    </tr>
							    <!-- end footer -->
							</table>
						</div>
					<!-- </div> -->
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/popper.min.js"></script>
        <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/app.js"></script>
		
    </body>

<!-- Mirrored from dreamguys.co.in/smarthr/maroon/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Mar 2020 18:49:56 GMT -->
</html>