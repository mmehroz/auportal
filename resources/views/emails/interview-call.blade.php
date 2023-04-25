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
							Interview Invitation | AU Telecom
							</div>
							<!-- end preheader -->
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<!-- start logo -->
							    <tr>
						      		<td align="center" bgcolor="#e9ecef">
							        	<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
								          	<tr>
								            	<td align="center" valign="top" style="padding: 20px 150px;position: absolute;">
								            		<a href="https://autelecom.net/" target="_blank" style="display: inline-block;">
								                		<img src="http://209.182.216.71/public/assets/img/logo22.png" alt="BWC" border="0" width="48" style="display: block; width: 278px; max-width: 100%; min-width: 48px;">
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
							              <p style="margin: 0; color: #000;">Thank you for your application for the position of <b>{{$datas['candidatedata']->jobapplicant_postionapppliedform }}</b> at AU Telecom. I would like to invite you to a face-to-face interview at our office.
During the interview, you will have the chance to learn more about the role and to develop a deeper understanding of our company’s objectives. On our end, we want to understand your career goals and professional experience more so.</p>
							            </td>
							          </tr>
							          <!-- end copy -->
							          <tr>
							            <td align="left" bgcolor="#ffffff" style="padding: 24px; padding-top:20px;  padding-bottom:0px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
							              <p style="margin: 0; color: #000;">
							              	Our office is located at PLOT #2, STREET #5, Block 6 Gulshan-e-Iqbal, Karachi, Karachi City, Sindh 75300 at sharp <b>{{$datas['request']->interTime }}.</b></p>
							            </td>
							          </tr>
							          <!-- start button -->
							          <tr>
							            <td align="left" bgcolor="#ffffff" style="padding: 24px; padding-top:20px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
							              <p style="margin: 0; color: #000;">
							              	Please bring a copy of your resume to the interview, Looking forward to meeting you.</p>
							            </td>
							          </tr>
							          <!-- end button -->
							          <!-- start copy -->
							          <tr>
							            <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf">
							              <p style="margin: 0;"><b>Human Resources Manager</b></p>
							              <p style="margin: 0;"><b>Rafia Naz</b></p>
							              <p style="margin: 0;"><b>Bizz Wolrd Communications</b></p>
							            </td>
							          </tr>
							          <!-- end copy -->
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
							              <p style="margin: 0;">&copy; <b>AU Telecom</b> 2021. All Right Reserved. </p>
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