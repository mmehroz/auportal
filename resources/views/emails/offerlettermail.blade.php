<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>HRMS</title>
	    <link rel="shortcut icon" type="image/x-icon" href="{!! asset('public/assets/img/favicon.ico') !!}" />
	    <link rel="stylesheet" href="{!! asset('public/assets/css/bootstrap.min.css') !!}" />
	    <link rel="stylesheet" href="{!! asset('public/assets/css/font-awesome.min.css') !!}" />
	    <link rel="stylesheet" href="{!! asset('public/assets/css/style.css') !!}" />
		<style type="text/css">
			a:hover, a:active, a:focus {
			    text-decoration: none;
			    outline: none;
			    color: #4a4a4a!important;
			}
		</style>
    </head>
    <body class="account-page" >
	<div class="main-wrapper">
		<div class="account-content">
				<div class="container">
					<div class="account-wrapper">
							<div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;">
								Thank you for taking the time to submit your job application to Arc inventador
							</div>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
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
							    <tr>
							      <td align="center" bgcolor="#e9ecef">
							        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
							          <tr>
							            <td align="left" bgcolor="#ffffff" style="padding: 120px 24px 0; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;">
							              <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Dear <b>{{$datas['candidate']->jobapplicant_name}}<b></h1>
							            </td>
							          </tr>
							        </table>
							      </td>
							    </tr>
							    <tr>
							      <td align="center" bgcolor="#e9ecef">
							        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
							          <tr>
							            <td align="left" bgcolor="#ffffff" style="padding: 24px; padding-top:20px;  padding-bottom:0px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
							              	<p style="margin: 0; color: #000;">
                              We are pleased to inform you that based on your qualifications, experience, and interview performance, Arc Inventador has decided to offer you the position of {{$datas['candidate']->jobapplicant_postionapppliedform}}.
                              <br><br>
                              We believe that your skills and experience align with our organization's requirements, and we are confident that you will be a valuable addition to our team. Enclosed, you will find your appointment letter that outlines the terms and conditions of your employment with Arc Inventador.
                              <br><br>
                              Please take the time to read through the appointment letter carefully, including the job description, compensation, benefits, and start date, among other essential details. If you have any questions or concerns about the appointment letter, please do not hesitate to contact us.
                              <br><br>
                              To accept the offer, please sign and return the enclosed copy of the appointment letter to us within three business days. If you have any questions about the process or need additional information, please contact us.
                              <br><br>
                              Alternatively, if you decide not to accept the offer, please inform us as soon as possible, so we can focus our attention on other candidates.
                              <br><br>
                              We are excited to have you join our team and look forward to working with you.
                              <br><br>
                              Congratulations once again, and we wish you all the best for a successful career at Arc Inventador.
                              <br><br>
                              Best regards,
                              <br>
                              Team Recruitment
                              <br>
                              Arc Inventador
                              <p>
							            </td>
							          </tr>
							          <tr>
							            <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf">
							              <p style="margin: 0;"><b></b><br> </p>
							            </td>
							          </tr>
							        </table>
							      </td>
							    </tr>
							    <tr>
							      <td align="center" bgcolor="#e9ecef" style="padding: 24px;">
							        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
							          <tr>
							            <td align="center" bgcolor="#e9ecef" style="padding: 12px 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;">
							            <a href="https://www.arcinventador.com/" target="_blank" style="display: inline-block;">
										<p style="margin: 0;">&copy; <b>Arc-Inventador</b> <?php echo(date('Y'))?>. All Right Reserved. </p>
										</a>
							            </td>
							          </tr>
							        </table>
							      </td>
							    </tr>
							</table>
						</div>
				</div>
			</div>
        </div>
        <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/jquery-3.2.1.min.js"></script>
        <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/popper.min.js"></script>
        <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/bootstrap.min.js"></script>
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/app.js"></script>
    </body>
</html>