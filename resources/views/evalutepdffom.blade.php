<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<!-- style -->
<style type="text/css">
    *{
        
        font-size: 14px;
    }
    .logo{
        
        text-align: center;
    }
    .logo .hor{
        width: 100%;
        border-bottom:3px solid rgb(82, 86, 89);
        margin-bottom: 5px;
        margin-top: -5px;
    }
    .main{
        border:2px solid rgb(82, 86, 89);
        padding-bottom: 20px;
        
       
    }
.main .head h2{
    background-color: #40c4f1;
    color: white;
    width: 100%;
    height: 30px;
    text-align: center;
padding-top: 10px;

}
    .main .head{
        margin-top: -12px;

       
    }

    .main .img{
        text-align: center;
    }
    table, th, td {
  border: 1px solid lightgray;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
#t01 tr:nth-child(even) {
  background-color: #eee;
}
#t01 tr:nth-child(odd) {
 background-color: #fff;
}
#t01 th {
  background-color: darkgray;
  color: black;
  font-size: 10px;
  text-align: center;
}
    

</style>
<body>
    <section class="logo">
        <img width="30%;" src="https://bizzworldcommunications.com/public/bwc-logo.png"/>
        <div class="hor"></div>
    </section>
    <section class="main">
        <div class="head">
            <h2>
                PRE-EMPLOYMENT APPLICATION FORM
            </h2>
        </div>
        <div class="img"><img height="100px;" width="100px;" src="{{ URL::to('public/img/')}}/{{$datas->jobapplicant_picture}}"/></div>
        <div>
            <label style="color: #000; font-weight: bold; padding-left: 50px;padding-top: 15px; text-decoration: underline;">Position Applied For:</label><span> <label>{{ $datas->jobapplicant_postionapppliedform }}</label></span>
        </div>
        <div style="margin-left: 400px; margin-top: -20px; padding-bottom: 10px">
            <label style="color: #000; font-weight: bold; text-decoration: underline;">Career Level:</label><span> <label>@if($datas->jobapplicant_careerlevel == "stusclcol" ) Student (School/College)
                                                            @elseif( $datas->jobapplicant_careerlevel == "undgra" ) Student (Undergrad./Grad.)
                                                            @elseif( $datas->jobapplicant_careerlevel == "entlev" ) Entry Level
                                                            @elseif( $datas->jobapplicant_careerlevel == "expnomana" ) Experienced (Non-Managerial)
                                                            @elseif( $datas->jobapplicant_careerlevel == "manasup" ) Manager/Supervisor
                                                            @elseif( $datas->jobapplicant_careerlevel == "hod" ) Head of Department
                                                            @elseif( $datas->jobapplicant_careerlevel == "srexe" ) Sr. Executive (CEO/President)    
                                                            @endif</label></span>
        </div>
        
        <div>
            <label style="color: #000; font-weight: bold; padding-left: 50px;  text-decoration: underline;">Department:</label><span> <label>{{ $datas->dept_name }}</label></span>
        </div>
        <div style="margin-left: 400px; margin-top: -20px; padding-bottom: 10px">
            <label style="color: #000; font-weight: bold; text-decoration: underline;">Current Salary RS.</label><span> <label>{{ $datas->jobapplicant_currentsalary }}</label></span>
        </div>
        
        <div>
            <label style="color: #000; font-weight: bold; padding-left: 50px; text-decoration: underline;">Monthly Expected Salary RS.</label><span> <label>{{ $datas->jobapplicant_monthlyexpectedsalary }}</label></span>
        </div>
        <div style="margin-left: 400px; margin-top: -20px; padding-bottom: 10px">
            <label style="color: #000; font-weight: bold; text-decoration: underline;">Negotiable / Not Negotiable:</label><span> <label>{{ $datas->jobapplicant_negotiablesalary }}</label></span>
        </div>
      
        <div>
            <label style="color: #000; font-weight: bold; padding-left: 50px; text-decoration: underline;">Reason To Left Last Job.</label><span> <label>{{ $datas->jobapplicant_reasonofleave }}</label></span>
        </div>
        <div style="margin-left: 400px; margin-top: -20px; padding-bottom: 10px">
            <label style="color: #000; font-weight: bold; text-decoration: underline;">Current Benefits:</label><span> <label>{{ $datas->jobapplicant_remarksofleave }}</label></span>
        </div>
       
        <div>
            <label style="color: #000; font-weight: bold; padding-left: 50px; text-decoration: underline;">Comfortable / Agreed for Night Shift?</label><span> <label>{{ $datas->jobapplicant_nightshift }}</label></span>
        </div>
        <div style="margin-left: 400px; margin-top: -20px; padding-bottom: 10px">
            <label style="color: #000; font-weight: bold; text-decoration: underline;">Communication Skills:</label><span> <label>{{ $datas->jobapplicant_communicationskills }}</label></span>
        </div>
        
        <div>
            <label style="color: #000; font-weight: bold; padding-left: 50px;  text-decoration:  underline;">Period Required For Joining:</label><span> <label>{{ $datas->jobapplicant_periodjoining }}</label></span>
        </div>
    </section>
    <!-- Personal detail -->
     <section class="main" style="margin-top: 50px;">
        <div class="head">
            <h2>
                PERSONAL DETAILS
            </h2>
        </div>
        
        <div>
            <label style="color: #000; font-weight: bold; padding-left: 50px;padding-top: 15px; text-decoration: underline;">Name:</label><span> <label>{{ $datas->jobapplicant_name }}</label></span>
        </div>
        <div style="margin-left: 400px; margin-top: -20px; padding-bottom: 10px">
            <label style="color: #000; font-weight: bold; text-decoration: underline;">FATHER'S/HUSBAND'S Name:</label><span> <label>{{ $datas->jobapplicant_fname }}</label></span>
        </div>
        
        <div>
            <label style="color: #000; font-weight: bold; padding-left: 50px;  text-decoration: underline;">EMAIL:</label><span> {{ $datas->log_email }}<label></label></span>
        </div>
        <div style="margin-left: 400px; margin-top: -20px; padding-bottom: 10px">
            <label style="color: #000; font-weight: bold; text-decoration: underline;">Gender:</label><span> <label>{{ $datas->jobapplicant_gender }}</label></span>
        </div>
        
        <div>
            <label style="color: #000; font-weight: bold; padding-left: 50px; text-decoration: underline;">MOBILE #:</label><span> <label>@if( $datas->jobapplicant_contact == "") -
                          @elseif($datas->jobapplicant_contact != "") {{$datas->jobapplicant_contact}}
                          @endif</label></span>
        </div>
        <div style="margin-left: 400px; margin-top: -20px; padding-bottom: 10px">
            <label style="color: #000; font-weight: bold; text-decoration: underline;">RES/OFFICE #:</label><span> <label>@if( $datas->jobapplicant_officeno == "") -
                          @elseif($datas->jobapplicant_officeno != "") {{$datas->jobapplicant_officeno}}
                          @endif</label></span>
        </div>
      
        <div>
            <label style="color: #000; font-weight: bold; padding-left: 50px; text-decoration: underline;">DATE OF BIRTH:</label><span> <label>{{ $datas->jobapplicant_dob }}</label></span>
        </div>
        <div style="margin-left: 400px; margin-top: -20px; padding-bottom: 10px">
            <label style="color: #000; font-weight: bold; text-decoration: underline;">AGE:</label><span> <label> @if( $datas->jobapplicant_age == "") -
                          @elseif($datas->jobapplicant_age != "") {{$datas->jobapplicant_age}}
                          @endif</label></span>
        </div>
       
        <div>
            <label style="color: #000; font-weight: bold; padding-left: 50px; text-decoration: underline;">PLACE OF BIRTH:</label><span> <label>@if( $datas->jobapplicant_placeob == "") -
                          @elseif($datas->jobapplicant_placeob != "") {{$datas->jobapplicant_placeob}}
                          @endif</label></span>
        </div>
        <div style="margin-left: 400px; margin-top: -20px; padding-bottom: 10px">
            <label style="color: #000; font-weight: bold; text-decoration: underline;">N.I.C NO:</label><span> <label> @if( $datas->jobapplicant_cnic == "") -
                          @elseif($datas->jobapplicant_cnic != "") {{$datas->jobapplicant_cnic}}
                          @endif</label></span>
        </div>
        <div>
            <label style="color: #000; font-weight: bold; padding-left: 50px; text-decoration: underline;">Reference:</label><span> <label>@if( $datas->jobapplicant_reference == "") -
                          @elseif($datas->jobapplicant_reference != "") {{$datas->jobapplicant_reference}}
                          @endif</label></span>
        </div>
        <div style="margin-left: 400px; margin-top: -20px; padding-bottom: 10px">
            <label style="color: #000; font-weight: bold; text-decoration: underline;">NATIONALITY:</label><span> <label>@if( $datas->jobapplicant_nationality == "") -
                          @elseif($datas->jobapplicant_nationality != "") {{$datas->jobapplicant_nationality}}
                          @endif</label></span>
        </div>
        <div>
            <label style="color: #000; font-weight: bold; padding-left: 50px; text-decoration: underline;">RELIGION:</label><span> <label> @if( $datas->jobapplicant_religion == "") -
                          @elseif($datas->jobapplicant_religion != "") {{$datas->jobapplicant_religion}}
                          @endif</label></span>
        </div>
        <div style="margin-left: 400px; margin-top: -20px; padding-bottom: 10px">
            <label style="color: #000; font-weight: bold; text-decoration: underline;">MARITAL STATUS:</label><span> <label>  @if( $datas->jobapplicant_martialstatus == "") -
                          @elseif($datas->jobapplicant_martialstatus != "") {{$datas->jobapplicant_martialstatus}}
                          @endif</label></span>
        </div>
        <div style="padding-bottom: 10px;">
            <label style="color: #000; font-weight: bold; padding-left: 50px; padding-bottom: 10px; text-decoration: underline;">OCCUPATION:</label><span> <label>@if( $datas->jobapplicant_occupation == "") -
                          @elseif($datas->jobapplicant_occupation != "") {{$datas->jobapplicant_occupation}}
                          @endif</label></span>
        </div>
        <div style="padding-bottom: 10px;">
            <label style="color: #000; font-weight: bold; padding-left: 50px; ;  text-decoration:  underline;">ADDRESS (Permanent):</label><span> <label> @if( $datas->jobapplicant_address == "") -
                          @elseif($datas->jobapplicant_address != "") {{$datas->jobapplicant_address}}
                          @endif</label></span>
        </div>
        <div style="padding-bottom: 0px;">
            <label style="color: #000; font-weight: bold; padding-left: 50px;  text-decoration:  underline;">ADDRESS (Temporary):</label><span> <label>@if( $datas->jobapplicant_addresstemporaray == "") -
                          @elseif($datas->jobapplicant_addresstemporaray != "") {{$datas->jobapplicant_addresstemporaray}}
                          @endif</label></span>
        </div>
        
    </section>
    <!-- Table -->
     <section class="main" style="margin-top: 50px;">
        <div class="head">
            <h2>
                EDUCATIONAL RECORD
            </h2>
        </div>
        <h3 style="text-align: center; color: #000;">EDUCATIONAL / PROFESSIONAL QUALIFICATIONS: (LIST THE LAST ONE FIRST)</h3>
        <div>
            <table id="t01" style="width: 100%;">
  <tr>
    <th>S.NO.</th>
                                            <th>CERTIFICATE/DEGREE</th>
                                            <th>Year</th>
                                            <th>REGULAR/ PRIVATE</th>
                                            <th>MAJOR SUBJECTS</th>
                                            <th>DIVISION/GRADE</th>
                                            <th>NAME OF INSTITUTION</th>
  </tr>
<?php
                                                
                                                
                                                
                
                                                $edu_edu_cerdeg = explode("~",$datas->jobapplicant_edu_cerdeg);
                                                
                                                $edu_sno = explode("~",$datas->jobapplicant_edu_sno);
                                                
                                                $edu_year = explode("~",$datas->jobapplicant_edu_year);
                                                
                                                $edu_regpri = explode("~",$datas->jobapplicant_edu_regpri);
                                                
                                                $edu_majsub = explode("~",$datas->jobapplicant_edu_majsub);
                                                
                                                $edu_divgra = explode("~",$datas->jobapplicant_edu_divgra);
                                                
                                                $edu_institute = explode("~",$datas->jobapplicant_edu_institute);
                                                
                                                $sjhd = 0 ; 
                                                
                                                $vals = count($edu_edu_cerdeg);
                                                
                                                
                                            ?>

  @if($edu_edu_cerdeg)
                                            
                                            @for($cnt = 1; $cnt <= $vals; $cnt++)
                                            <tr>
                                            <td>{{$cnt}}</td>
                                            <td>{{ old('can_edu_cerdeg[$sjhd]', @$edu_edu_cerdeg[$sjhd] ) }}</td>
                                            <td>{{ old('can_edu_year[$sjhd]', @$edu_year[$sjhd] ) }}</td>
                                            <td>{{ old('can_edu_regpri[$sjhd]', @$edu_regpri[$sjhd] ) }}</td>
                                            <td>{{ old('can_edu_majsub[$sjhd]', @$edu_majsub[$sjhd] ) }}</td>
                                            <td>{{ old('can_edu_divgrass[$sjhd]', @$edu_divgra[$sjhd] ) }}</td>
                                            <td>{{old('can_edu_institute[$sjhd]', @$edu_institute[$sjhd] ) }}</td>
                                            
                                            @if($cnt != 1)
                                            
                                            @endif
                                            </tr>
                                            <?php  $sjhd++ ; ?>
                                            @endfor
                                        @else
                                        @endif
 
</table>
        </div>
  </section>

  <section class="main" style="margin-top: 50px;">
        <div class="head">
            <h2>
                EMPLOYMENT RECORD
            </h2>
        </div>
        <h3 style="text-align: center; color: #000;">(LIST THE LAST ONE FIRST)</h3>
        <div>
            <table id="t01" style="width: 100%">
  <tr>
    <th>S.NO.</th>
                                            <th >NAME OF ORGANIZATION</th>
                                            <th >PERIOD FROM</th>
                                            <th >PERIOD TO</th>
                                            <th >POSITION START</th>
                                            <th >POSITION LAST</th>
                                            <th >GROSS SALARY START</th>
                                            <th >GROSS SALARY LAST</th>
                                            <th >REASON(S) FOR LEAVING</th>
  </tr>
 <?php
                                                
                                                
                                                
                
                                                $empreport_org = explode("~",$datas->jobapplicant_empreport_org);
                                                
                                                $empreport_sno = explode("~",$datas->jobapplicant_empreport_sno);
                                                
                                                $empreport_perfrom = explode("~",$datas->jobapplicant_empreport_perfrom);
                                                
                                                $empreport_perto = explode("~",$datas->jobapplicant_empreport_perto);
                                                
                                                $empreport_posstart = explode("~",$datas->jobapplicant_posstart);
                                                
                                                $empreport_last = explode("~",$datas->jobapplicant_last);
                                                
                                                $empreport_grossalarystart = explode("~",$datas->jobapplicant_grossalarystart);
                                                
                                                $empreport_grossalarylast = explode("~",$datas->jobapplicant_grossalarylast);
                                                
                                                $empreport_reasoleave = explode("~",$datas->jobapplicant_reasoleave);
                                                
                                                $sjhsdd = 0 ; 
                                                
                                                $val = count($empreport_org);
                                                
                                                
                                            ?>
                                            
                                        
                                            @if($empreport_org)
                                            
                                            @for($cnt = 1; $cnt <= $val ; $cnt++)
                                            <tr>
                                            <td>{{$cnt}}</td>
                                            <td>{{ old('can_empreport_org[$sjhsdd]', @$empreport_org[$sjhsdd] ) }}</td>
                                            <td>{{ old('can_empreport_perfrom[$sjhsdd]', @$empreport_perfrom[$sjhsdd] ) }}</td>
                                            <td>{{ old('can_empreport_perto[$sjhsdd]', @$empreport_perto[$sjhsdd] ) }}</td>
                                            <td>{{ old('can_empreport_posstart[$sjhsdd]', @$empreport_posstart[$sjhsdd] ) }}</td>
                                            <td>{{ old('can_empreport_last[$sjhsdd]', @$empreport_last[$sjhsdd] ) }}</td>
                                            <td>{{ old('can_empreport_grossalarystart[$sjhsdd]', @$empreport_grossalarystart[$sjhsdd] ) }}</td>
                                            <td>{{ old('can_empreport_grossalarylast[$sjhsdd]', @$empreport_grossalarylast[$sjhsdd] ) }}</td>
                                            <td>{{ old('can_empreport_reasoleave[$sjhsdd]', @$empreport_reasoleave[$sjhsdd] ) }}</td>
                                            @if($cnt != 1)
                                            
                                            @endif
                                            </tr>
                                            <?php  $sjhsdd++ ; ?>
                                            @endfor
                                        @else
                                        @endif
 
</table>
        </div>
  </section>



</body>

</html>