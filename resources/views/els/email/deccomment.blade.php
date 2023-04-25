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
        <title>Forgot Password - HRMS</title>
		
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
							Employee Leave System.
							</div>
							
							<!-- end preheader -->
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<!-- start logo -->
							    <tr>
						      		<td align="center" bgcolor="#e9ecef">
							        	<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
								          	<tr>
								            	<td align="center" valign="top" style="padding: 20px 24px;">
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
							            <td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;">
							              <h1 style="text-align: center; font-size: 45px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Cancelled</h1>
							            </td>
							          </tr>
							        </table>
							      </td>
							    </tr>
							    <!-- end hero -->


								
								<tr><td align="center" bgcolor="#fbfcfd">
		<table width="90%" border="0" cellspacing="0" cellpadding="0">
			<tr><td align="center">
				<div style="line-height: 24px;">
					<font face="Arial, Helvetica, sans-serif" size="4" color="#000000" style="font-size: 15px;">
					<span style="font-family: Arial, Helvetica, sans-serif;font-size: 17px;color: rgba(0, 0, 0, 0.99);font-variant: small-caps;">
						{{ $datas['data']->elsemployees_name }} request for @if($datas['data']->elsleaverequests_leavetypeid == 1) Annual @elseif ($datas['data']->elsleaverequests_leavetypeid == 2) Sick @else Unpaid @endif , Date : <b style="color: red;">{{$datas['data']->elsleaverequests_leavestartdate}} to {{$datas['data']->elsleaverequests_leaveenddate}}</b> has been declined, <h4 style="color: red;">Decline Comment :- </h4><p>{{$datas['comment']}}</p>for more detail kindly visit the below link.
					</span>
					</font>
				</div>
				<!-- padding --><!--<div style="height: 40px; line-height: 40px; font-size: 10px;"> </div>-->
			</td></tr>
		</table>		
	</td></tr>

						
						          <!-- start button -->
							          <tr>
							            <td align="left" bgcolor="#ffffff">
							              <table border="0" cellpadding="0" cellspacing="0" width="100%">
							                <tr>
							                  <td align="center" bgcolor="#ffffff" style="padding: 12px;">
							                    <table border="0" cellpadding="0" cellspacing="0">
							                      <tr>
							                        <td align="center" bgcolor="#1a82e2" style="border-radius: 6px;">
							                          <a href="http://209.182.216.71/hrm" target="_blank" style="display: inline-block; padding: 16px 36px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; background-color: #85152d;text-decoration: none; border-radius: 6px;">Click to visit the portal</a>
							                        </td>
							                      </tr>
							                    </table>
							                  </td>
							                </tr>
							              </table>
							            </td>
							          </tr>
							          <!-- end button -->
							          
							          <!-- start copy -->
							          <tr>
							            <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf">
							              <p style="margin: 0;"><b>Thank you!</b><br> </p>
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