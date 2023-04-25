<html>
<head>

<style>
.button {
  background-color: #85152d;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</head>
<body>
<p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp;</p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";text-align:center;'><strong><u><span style="font-size:19px;line-height:107%;"><img height="100px;" width="350px;" src="http://209.182.216.71/public/assets/img/logo22.png"/></span></u></strong></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";'><span style="font-size:7px;line-height:107%;">&nbsp;</span></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";text-align:right;'><span style="font-size:13px;line-height:107%;"><?php echo date('Y-M-d'); ?></span></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";'><strong>@if($datas['candidate']->jobapplicant_gender == "male" ) MR. @elseif( $datas['candidate']->jobapplicant_gender == "female" ) MS. @else Candidate @endif {{$datas['candidate']->jobapplicant_name}} {{$datas['candidate']->jobapplicant_fname}}</strong></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";'><strong>Cell Number : {{$datas['candidate']->jobapplicant_contact}} </strong></p><br>
<p style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";text-align:justify;'>The purpose of this letter is to inform you that your candidature has been selected for the position of {{$datas['candidate']->can_evu_pro_desg }} in AU Telecom.</p>
<p>We are excited to have you as a part of our organization. As you know, the interview was conducted across many candidates and there were many rounds allocated.</p>
<p>We take the privilege to inform you that your employment will start from {{$datas['candidate']->can_evu_hr_expdate }}.</p>
<p>The benefits and salary offered to you has been discussed in our meeting on {{$datas['req']->can_meet_date }}.</p>
<p>Our company’s rules and regulations will be made familiar to you during the orientation. Please revert with a return reply via email confirming your acceptance for this offer.</p>
<p>Below mention are the documents which you’ll have to submit at the time of your joining.</p>
<ul>
  <li>Copy of CNIC/B-form</li>
  <li>Updated CV</li>
  <li>Copy of last paid utility bill</li>
  <li>Copy of educational certificates</li>
  <li>Experience Letters</li>
  <li>Last salary slip</li>
  <li>2 Passport size photographs</li>
</ul>
<p>Looking forward to have you on board as a part of our organization!</p>
<p>Regards</p>
<p>Human Resource Development</p>
<p>AU Telecom</p>
</body>
</html> 