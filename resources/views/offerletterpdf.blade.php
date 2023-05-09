<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Offer Letter</title>
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

    .dn .line {
        border-bottom: 3px solid gray;
        margin-top: 10px;

    }

    .offer {
        width: 100%;
        text-align: center;
        margin-top: px;

    }

    .offer h2 {
        padding-top: 8px;
        text-transform: uppercase;
        width: 100%;
        height: 40px;
        background-color: #5069e7;
        color: white;

    }

    .offer1 {
        width: 100%;
        margin-top: 10px;
        
        

    }

    .offer1 h2 {
        padding-top: 8px;
        text-transform: uppercase;
        text-align: center;
        width: 100%;
        height: 40px;
        color: white;
        background-color: #5069e7;
        /*margin-bottom: 30px;*/
    }

    .pkg {
        width: 100%;
        padding-bottom: 40px;
        margin-bottom: 40px;
        margin-top: 80px;
    }

    .pkg h2 {
        padding-top: 8px;
        width: 100%;
        height: 40px;
        background-color: #5069e7;
        color: white;
        text-transform: uppercase;
        text-align: center;
    }

    .acc {
        width: 100%;
        
        
        margin-top: 120px;

    }

    .acc h2 {
        padding-top: 8px;
        color: white;
        background-color: #5069e7;
        text-transform: uppercase;
        text-align: center;
        width: 100%;
        height: 40px;

    }
</style>

<body>
    <!-- logo -->
    <section class="logo">
        <div class="img" style="width: 100%;">
            <img src="https://avidhaus.com/images/arclogo.png" alt="">
        </div>
    </section>
    <!-- Name & Date -->
    <section class="dn" style="font-weight: 700;">
        <div>
            <div>
                <p style="margin-bottom: -10px;">{{$datas->jobapplicant_name}}</p>
                <p>Cell Number : {{$datas->jobapplicant_contact}}</p>
            </div>
            <div style="text-align: right; margin-top: -58px;">
                <p><?php echo(date('Y-m-d'))?></p>
            </div>
        </div>
        <div class="line">

        </div>
    </section>
    <!-- Offer Letter -->
    <section class="offer">
        <div>
            <h2>Offer Letter</h2>
        </div>

    </section>
    <section>
        <div>
            <p>Dear {{$datas->jobapplicant_name}},</p>
            <p>Congratulations!</p>
            <p>
                It gives us an incredible satisfaction in offering you to join the team of Arc Inventador as <span
                    style="color: red;">“{{$datas->can_evu_pro_desg}}"</span>, now that you have effectively cleared all our enrollment stages. We would
                like to
                congratulate you on this honorable accomplishment, since you are among the 5.0% effective competitors
                who have experienced all of the stages and are being offered a position at Arc Inventador, from all
                candidates who at first registered.
            </p>
            <p>
                It would be ideal if you read and sign the enclosed "offer details", demonstrating your conformity with
                the specifics stated and furthermore present the required certificates said there. Conditional of your
                acknowledgment of this offer, finish check of your qualifications will be directed.
            </p>
            <p>
                We sincerely hope that you’ll accept our presented job offer, the details and other specifics of which
                are mentioned in the subsequent pages.
            </p>
            <p>
                We look forward to have you in our energetic team with an aspiration that will find your work experience
                with Arc Inventador professionally challenging and rewarding.
            </p>
            <p>
                Awaiting to welcome you on board!
            </p>
            <p>
                Regards,
            </p>
            <p style="margin-top: 30px">
                ________________________<br>
                <span style="font-weight: 700;">Head of Human Resource</span><br>
                AU Telecom

            </p>
        </div>
    </section>
    <section class="offer1" style="; ">
        <div>
            <h2>Position Offered</h2>
        </div>
        <p>Details of position we are offering you are as follow.</p>
        <div>
            <p>
                <span style="font-weight: 700; margin-right: 30px;">Position Offered</span> <span>: {{$datas->can_evu_pro_desg}}</span>
            </p>
        </div>
        <div>
            <p>
                <span style="font-weight: 700; margin-right: 35px;">Job Description</span> <span>: {{$datas->can_evu_job_sum}} </span>
            </p>
        </div>
        <div>
            <p>
                <span style="font-weight: 700; margin-right: 35px;">Date of Joining </span> <span>: {{$datas->can_evu_hr_expdate}} </span>
            </p>
        </div>
        <div>
            <p>
                <span style="font-weight: 700; margin-right: 15px;">Job Working Days</span> <span>: 6 days in a week –
                    Monday to Saturday</span>
            </p>
        </div>
        <div >
            <p>
                <span style="font-weight: 700; margin-right: 35px;">Working Hours</span> <span>: 09:00 pm to 05:00 am
                    PST Note: Can be fluctuated (Work from Home)</span>
            </p>
        </div>
         <div>
            <p>
                <span style="font-weight: 700; margin-right: 9px; padding-bottom: 20px;">Employment Status</span> <span>: On probation for a
                    minimum of 3 months (confirmation is subject to satisfactory<span style="padding-left: 150px;"> performance and credential’s
                    verification).</span></span>
            </p>
        </div>
      <!--  <div>
            <p>
                <span style="font-weight: 700; margin-right: 70px;">Notice Period</span> <span>: During probation, a
                    notice period of at least 15 day and after probation, a notice period of at least 1 Month is to be
                    served or an equivalent amount of salary shall be deducted for the notice period.</span>
            </p>
        </div> -->
        <!-- <div>
            <h4>Employment Status</h4>
            <p style="text-align: center; margin-top: -38px; margin-left: 160px;">
                : On probation for a minimum of 3 months (confirmation is subject to satisfactory 
                 <span style="margin-left: -69px;">performance and credential’s verification).</span>

            </p>
        </div> -->
        

            <p style="margin-top: 35px; ">
                <span style="font-weight: 700; padding-right: 51px;">Notice Period</span> <span>: During probation, a
                    notice period of at least 15 day and after probation, a notice<span style="margin-left: 151px;"> period of at least 1 Month is to be
                    served or an equivalent amount of salary shall be<span style="margin-left: 151px;"> deducted for the notice period.</span></span></span>
            </p>
        
    </section>
    <!-- pkg -->
    <section class="pkg">
        <div>
            <h2>Package Offered</h2>
            <p>Details of the package are as follows:</p>
            <p>
                <span style="font-weight: 700; margin-right: 50px;">Basic Salary Package per Month</span> <span>: Rs.
                    {{$datas->can_evu_rec_sal}}/=(Attendance
                    deduction as per basic salary)</span>
            </p>
        </div>

    </section>
    <!-- ACCEPTANCE  -->
    <section class="acc">
        <div>
            <h2>ACCEPTANCE</h2>
        </div>
        <div>
            <p>
                I ___________________, (s/o) ___________________ , bearing CNIC # ____________________________
                Accept the offer of employment in the position described, and also furnish the required credentials and
                I agree that:

            </p>
            <p>
                <ul>
                    <li>My employment will be governed by service rules of the company now in force, or those that may
                        be brought into force from time to time.</li>
                    <li>Not with standing anything else, my services can be terminated without notice for dishonesty,
                        negligence, indiscipline or breach of trust.</li>
                </ul>
            </p>
            <p>
                I affirm to be loyal and work hard and earnestly purely and target oriented for the Employer. In
                addition to this, all business and trade secrets, scripts, contracts, management information will be
                kept hidden from others during and after services. Failed to comply with will be required to be
                compensated by termination without pay/payout of reserved salary, security deposits and
                bonuses/incentives as per damages suffer by Employer.
            </p>
            <p>
                <ol>
                    <li>I understand that, if the Employee wishes to resign the job. He/She is required to submit the
                        hand written Resignation before 30 days. The ‘Employer’ has right to claim the remaining salary
                        and bonuses/incentives in compensation of the damages.</li>
                    <li>
                        The ‘Employee’ has to work diligently, earnestly, honestly, and hardworking, result oriented,
                        productive and initiative. If the performance of ‘Employee’ is not as per requirement, low,
                        damaging to employer, any malicious, and any outstanding salary remaining will not be paid.
                    </li>
                </ol>
            </p>
            <p>
                I also understand and agree that during the term of employment and after its termination, no matter how
                the termination is brought about, I shall:
            </p>
            <p>
                <ol>
                    <li>
                        Not take/ carry/ send/ transfer/ share in any form the data, software and/ or any other
                        information related to my assignment and/ or the company to anybody within the company and/ or
                        outside the company, during and after my employment period.
                    </li>
                    <li>
                        Not use or attempt to use my personal knowledge of any suppliers or customers of the employer
                        for my personal benefit.
                    </li>
                    <li>
                        Not use any confidential information of my own benefit or which may cause loss or injury,
                        whether directly or indirectly to the employer.
                    </li>
                    <li>
                        Not other than in the course of my duties, divulge to or discuss any confidential information
                        to any person other than someone whom the employer authorized to use it.
                    </li>
                </ol>
            </p>
            <p style="padding-top: 20px; padding-bottom: 10px;">
                Date: ____________
                   
            </p>
            <p style="padding-top: 50px;"> ___________________<br>Authorized Signatory</p>
            <p style="text-align: right; margin-top: -50px">____________________<br>Signature Of Applicant</p>
        </div>
    </section>



</body>

</html>