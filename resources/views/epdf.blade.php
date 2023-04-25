<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf</title>
</head>
<style>
    body {
        margin-top: px;
        /*margin-left: 200px;
        margin-right: 200px;*/
        /* padding: 0; */
        box-sizing: border-box;
        /* justify-content: center; */
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .logo img {
        width: 250px;

    }

    .logo .img {
        text-align: center;
    }

    .logo .line {
        border-bottom: 3px solid gray;
        margin-top: 10px;

    }

    /*Int*/
    .int {
        text-align: center;

    }

    .int h2 {
        background-color: #85152d;
        color: white;
        margin-top: 10px;
        padding-top: 10px;
        width: 100%;
        height: 40px;
    }

    /*Cand*/
    .cand {
        margin-top: -20px;
    }

    .cand h3 {
        padding-top: 1px;
        background-color: lightgray;
        text-align: center;

    }

    table {
        width: 100%;
    }

    table,
    th,
    td {
        border: 1px solid gray;
        box-shadow: 0px 1px 5px 0px rgb(6 63 111 / 30%);
        border-collapse: collapse;
    }

    th,
    td {
        padding: 5px;
        text-align: ;
    }

    #t01 tr:nth-child(even) {
        background-color: white;
    }

    #t01 tr:nth-child(odd) {
        background-color: #85152d;
    }

    #t01 th {
        background-color: #333;
        color: white;
    }
    .label label{
        padding-top: 100px;
        margin-bottom: 100px;
    }
    .dep{
        margin-top: 10px;
    }
    .dep h3{
         padding-top: 1px;
        background-color: lightgray;
        text-align: center;

    }
    .app h3{
        padding-top: 1px;
        background-color: lightgray;
        text-align: center;
    }
</style>

<body>
    <!-- logo -->
    <section class="logo">
        <div class="img" style="width: 100%;">
            <img src="http://hrm.bizzworldcommunications.com/hrm/public/assets/img/final-logo.png" alt="">
        </div>
        <div class="line">
        </div>
    </section>
    <!-- INTERVIEW ASSESSMENT & RECOMMENDATION FORM -->
    <section>
        <div class="int">

            <h2>INTERVIEW ASSESSMENT & RECOMMENDATION FORM</h2>
        </div>
    </section>
    <!-- Candidate Personal Data -->
    <section>
        <div class="cand">
            <h3>Candidate Personal Data</h3>
        </div>
    </section>
    <!-- form
     -->
    
    <section style="position: relative;" >
        <div style="margin-bottom: 10px;">
            <label style="font-weight: 700; color: #85152d;">Name :</label>
            <label>{{$datas->jobapplicant_name}}</label>
        </div>
        <div style="position: absolute; top: -5px; left: 300px;">
            <label style="font-weight: 700; color: #85152d;">Company :</label>
            <label>AU Telecom</label>
        </div>
        <div style="margin-bottom: 10px;">
            <label style="font-weight: 700; color: #85152d;">Position Title :</label>
            <label>{{$datas->jobapplicant_postionapppliedform}}</label>
        </div>
        <div style="position: absolute; top: 25px; left: 300px;">
            <label style="font-weight: 700; color: #85152d;">Department :</label>
            <label>{{$datas->dept_name}}</label>
        </div>
        <div style="margin-bottom: 10px;">
            <label style="font-weight: 700; color: #85152d;">Sub Department:</label>
            <label>{{$datas->sd_name}}</label>
        </div>
        <div style="position: absolute; top: 55px; left: 300px;">
            <label style="font-weight: 700; color: #85152d;">Report to :</label>
            <label>{{$datas->can_evu_reportsto}}</label>
        </div>
        <div style="margin-bottom: 10px;">
            <label style="font-weight: 700; color: #85152d;">Location :</label>
            <label>{{$datas->can_evu_location}}</label>
        </div>
        <div style="position: absolute; top: 85px; left: 300px;">
            <label style="font-weight: 700; color: #85152d;">Job Grade :</label>
            <label>{{$datas->can_evu_grade}}</label>
        </div>
        <div style="margin-bottom: 10px;">
            <label style="font-weight: 700; color: #85152d;">Reference :</label>
            <label>{{$datas->jobapplicant_reference}}</label>
        </div>
        <div style="position: absolute; top: 115px; left: 300px;">
            <label style="font-weight: 700; color: #85152d;">Job Type :</label>
            <label>@if($datas->can_evu_job_type == "1" )   Permanent
                                                                                    @elseif( $datas->can_evu_job_type == "2" )  Contract
                                                                                    @elseif( $datas->can_evu_job_type == "3" )   Consultant
                                                                                    @elseif( $datas->can_evu_job_type == "4" )  Trainee
                                                                                    @elseif( $datas->can_evu_job_type == "5" )  Internee
                                                                                    @elseif( $datas->can_evu_job_type == "6" )  MTO  
                                                                                    @endif</label>
        </div>
        <div style="margin-bottom: 10px;">
            <label style="font-weight: 700; color: #85152d;">Relative in BWC
                :</label>
            <label>{{$datas->can_evu_relativename}}</label>
        </div>
        <div style="position: absolute; top: 143px; left: 300px;">
            <label style="font-weight: 700; color: #85152d;">Dependents :</label>
            <label>{{$datas->can_evu_depends}}</label>
        </div>
        <div style="margin-bottom: 10px;">
            <label style="font-weight: 700; color: #85152d;">BUDGETED in Business Plan :</label>
            <label>{{$datas->can_evu_budget}}</label>
        </div>
        <div style="position: absolute; top: 173px; left: 300px;">
            <label style="font-weight: 700; color: #85152d;">Expected Salary :</label>
            <label>{{$datas->jobapplicant_monthlyexpectedsalary}}</label>
        </div>
        <div style="margin-bottom: 10px;">
            <label style="font-weight: 700; color: #85152d;">Expected Benefit:</label>
            <label>{{$datas->jobapplicant_remarksofleave}}</label>
        </div>
        <div style="margin-top: 25px;">
            <label style="font-weight: 700; color: #85152d; margin-top: -50px;">JOB SUMMARY :</label>
            <textarea
            style="height : 40px;  width: 550px; position: absolute; left: 130px; padding-top: 8px; padding-left: 5px; top: 220px; margin-top: 15px; margin-bottom: 30px; border: 1px solid gray; border-radius: 5px;">{{$datas->can_evu_job_sum}}</textarea>

        </div>
        

    </section>
    <section>
        <div class="cand">
            <h3>HR Department Assessment</h3>
        </div>
    </section>
    <section>
        <p style="color: red;">Filled by HR Department</p>
        <p style="color: #85152d;">Total Marks(Example): Qualification=3 Professional Training=4 Computer Skill=5
            AVG Marks Obtained=3.13</p>
        <div>
            <table id="t01">
                <tr>
                    <th></th>
                    <th style="font-size: 13px;">Qualification</th>
                    <th style="font-size: 13px;">Professional Training</th>
                    <th style="font-size: 13px;">Computer Skill</th>
                    <th style="font-size: 13px;">Obtained Marks</th>

                </tr>
                <tr>
                    <td>Academic</td>
                    <td>{{$datas->can_evu_hr_qua}}</td>
                    <td>{{$datas->can_evu_hr_per_tra}}</td>
                    <td>{{$datas->can_evu_hr_com_ski}}</td>
                    <td>{{$datas->can_evu_hr_obtain}}</td>
                </tr>
            </table>
        </div>
    </section>
     <section >
        <p style="color: #85152d;">Total Marks(Example): Presentation=3 Communication-Verbal=2 Behaviour/Body Language=5 Manner=2 Reasoning=1
            AVG Marks Obtained=3.13</p>
        <div>
            <table id="t01">
                <tr>
                    <th></th>
                    <th style="font-size: 13px;">Presentation</th>
                    <th style="font-size: 13px;">Communication - Verbal</th>
                    <th style="font-size: 13px;">Behaviour / Body Language</th>
                    <th style="font-size: 13px;">Manner</th>
                    <th style="font-size: 13px;">Reasoning</th>
                    <th style="font-size: 13px;">Obtained Marks</th>

                </tr>
                <tr>
                   <td>Personal</td>
                   <td>{{$datas->can_evu_hr_pre}}</td>
                   <td>{{$datas->can_evu_hr_ver_ski}}</td>
                   <td>{{$datas->can_evu_hr_body}}</td>
                   <td>{{$datas->can_evu_hr_manner}}</td>
                   <td>{{$datas->can_evu_hr_reson}}</td>
                   <td>{{$datas->can_evu_hr_obtain_mark}}</td>
                </tr>
            </table>
        </div>

    </section>
    <section>
        <div style="padding-top: 23px;">
            <label style="font-weight: 700; color: #85152d;">Interviewer Name :</label>
            <label>{{$datas->can_evu_hr_int_name}}</label>
        </div>
        <div style="position: absolute; top: 22px; left: 300px;">
            <label style="font-weight: 700; color: #85152d;">Interview Date :</label>
            <label>{{$datas->can_evu_hr_int_date}}</label>
        </div>
         <div style="margin-top: 30px;">
            <label style="font-weight: 700; color: #85152d; margin-top: px;">HR Comments :</label>
            <textarea
            style="height : 25px;  width: 550px; position: absolute; left: 130px; top: 60px; padding-top: 10px; padding-left: 5px; margin-top: px; margin-bottom: px; border: 1px solid gray; border-radius: 5px;">{{$datas->can_evu_hr_comments}}</textarea>

        </div>
    </section>
<section>
        <div class="dep">

            <h3>Departmental Head Assessment</h3>
        </div>
    </section>
    <section>
        <p style="color: red;">Filled by Departmental Head</p>
        <p style="color: #85152d;">Total Marks(Example): Job Relevancy=3 Experience=5 Knowledge of Industry=5 Career Progression=5 Notable Achievement=2
Potential=2<br>
AVG Marks Obtained=3.67</p>
 <div>
            <table id="t01">
                <tr>
                    <th></th>
                    <th style="font-size: 13px;">Job Relevancy</th>
                    <th style="font-size: 13px;">Experience : Yrs Local Foreign </th>
                    <th style="font-size: 13px;">Knowledge of Industry</th>
                    <th style="font-size: 13px;">Career Progression</th>
                    <th style="font-size: 13px;">Notable Achievement </th>
                    <th style="font-size: 13px;">Potential</th>
                    <th style="font-size: 13px;">Obtained Marks</th>

                </tr>
                <tr>
                   <td>Personal</td>
                                                <td>{{$datas->can_evu_hod_job_rel}}</td>
                                                <td>{{$datas->can_evu_hod_exp}}</td>
                                                <td>{{$datas->can_evu_hod_know}}</td>
                                                <td>{{$datas->can_evu_hod_carpro}}</td>
                                                <td>{{$datas->can_evu_hod_noble}}</td>
                                                <td>{{$datas->can_evu_hod_pot}}</td>
                                                <td>{{$datas->can_evu_hod_obtain}}</td>
                </tr>
            </table>
        </div>
        <p style="color: #85152d;">Piont from 0 to 1.5 = Unsatisfactory, 1.6 to 2.5 = Average, 2.6 to 3.5 = Satisfactory, 3.6 to 4.5 = Good, 4.6 to 5 = Excellent</p>
         <div>
            <table id="t01">
                <tr>
                    <th></th>
                                            <th style="font-size: 13px;">HR Department</th>
                                            <th style="font-size: 13px;">Departmental Head</th>

                </tr>
                <tr>
                   <td>Candidate Results</td>
                                                <td>{{$datas->can_evu_hr_cand}}</td>
                                                <td>{{$datas->can_evu_hod_cand}}</td>
                </tr>
            </table>
        </div>
    </section>
    <section>
        <div class="app">

            <h3>Approval Authority</h3>
        </div>
    </section>
    <section style="position: relative;">
        <div style="margin-bottom: 10px;">
            <label style="font-weight: 700; color: #85152d;">Proposed Salary By Coo
 :</label>
            <label>{{$datas->can_evu_rec_sal}}</label>
        </div>
        <div style="position: absolute; top: -2px; left: 300px;">
            <label style="font-weight: 700; color: #85152d;">Proposed Designation By COO :</label>
            <label>{{$datas->can_evu_pro_desg}}</label>
        </div>
        <div style="margin-bottom: 10px;">
            <label style="font-weight: 700; color: #85152d;">Recommended Salary By HR :</label>
            <label>{{$datas->can_evu_off_salary}}</label>
        </div>
        <div style="position: absolute; top: 27px; left: 300px;">
            <label style="font-weight: 700; color: #85152d;">Proposed Designation By HR :</label>
            <label>{{$datas->can_evu_off_desg}}</label>
        </div>
        <div style="margin-bottom: 10px;">
            <label style="font-weight: 700; color: #85152d;">Candidate Expected Salary:</label>
            <label>{{$datas->jobapplicant_monthlyexpectedsalary}}</label>
        </div>
        <div style="position: absolute; top: 58px; left: 300px;">
            <label style="font-weight: 700; color: #85152d;">Approval :</label>
            <label>@if($datas->can_evu_approval == "1" )   Approved
                                                                                    @elseif( $datas->can_evu_approval == "2" )  Rejected
                                                                                    @elseif( $datas->can_evu_approval == "3" )  MTO  
                                                                                    @endif</label>
        </div>

        <div style="margin-bottom: 10px;">
            <label style="font-weight: 700; color: #85152d;">Name
 :</label>
            <label>{{$datas->can_evu_app_name}}</label>
        </div>
        <div style="position: absolute; top: 87px; left: 300px;">
            <label style="font-weight: 700; color: #85152d;">Date :</label>
            <label>{{$datas->can_evu_app_date}}</label>
        </div>
        <div style="margin-bottom: 10px;">
            <label style="font-weight: 700; color: #85152d;">Salary After Probition Period :</label>
            <label>{{$datas->can_evu_sal_afpro}}</label>
        </div>
        <div style="position: absolute; top: 117px; left: 300px;">
            <label style="font-weight: 700; color: #85152d;">Final Status :</label>
            <label>@if($datas->jobapplicant_status == "nothired" )  Not Hired
                                                                                    @elseif( $datas->jobapplicant_status == "hired" )  Hired
                                                                                    @elseif( $datas->jobapplicant_status == "evaluateByManager" )  Back To COO   
                                                                                    @endif</label>
        </div>     
         <div style="margin-top: 10px;">
            <label style="font-weight: 700; color: #85152d; margin-top: px;">COO Remarks :</label>
            <textarea
            style="height : 25px;  width: 550px; position: absolute; left: 130px; top: 150px; padding-top: 10px; padding-left: 5px; margin-top: px; margin-bottom: px; border: 1px solid gray; border-radius: 5px;">{{$datas->can_evu_coo_remark}}</textarea>

        </div>   
    </section>
 
</body>

</html>