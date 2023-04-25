@extends('layout.apptheme')
@section('hr-HRM')
<!-- <body>
	

<div class="row">
	<div class="col-md-12">
		<h1 >Preface</h1>0000
	</div>
</div>
</body> -->
<div class="page-wrapper policy">
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title text-center">HR Policy</h3>
					<ul class="breadcrumb">
						<!-- <li class="breadcrumb-item active">Add Employee</li> -->
					</ul>
				</div>
			</div>
		</div>
				<!-- <ul id="" class="alert alert-info mt-3" style="display : none">
					<p>{{session('message')}}</p>
				</ul> -->
		@if(session('message'))
			<div><p class="alert alert-info mt-3" >{{session('message')}}</p> </div>
		@endif
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-md-12">
				<h1 Class="">Preface</h1>
			</div>
			<div class="col-md-12">
				<p>
				Personnel Supervision is highly concerned with obtaining, developing, motivating of human resources maintained by AU Telecom to achieve its goals regarding human resource management. This manual is intended to provide the basic human resources procedures, practices and guidelines by higher management, thus ensuring consistency and equity as well. 
				</p>
				<p>
				AU Telecom believes in integrity, intelligence and ability of its people and performance at an affordable level. AU Telecom’s Policies establishes the framework for administering human resource requirements fairly and effectively and is reference for member of management responsible for personnel management and observance with employment regulations. Its objective is to provide systematic approach for administering an effective tool for training of management and human resources staff, to ensure that employees perform and render a consistently good service. Where policies are implemented rigidly, they divest employees of the authority to act quickly in difficult and varying situations.
				</p>
				<p>
				It is necessary for employees of AU Telecom to understand the hierarchy, procedures, and working environment that one cannot empower without first enabling. This is the reason that Human Resource Manual is compiled. This HR Manual is the first building block of this journey.
				</p>
				<p>
				This HR Manual provides all information and guidelines but is not a contract and the information contained herein is not to be considered contractual promises. The Management reserves the right to modify the provisions of this manual as and when required.
				</p>
			</div>
			<div class="col-md-12 pt-5 ">
				
				<h3 class="page-title text-center">MESSAGES FROM DIRECTORS</h3>
			</div>
			<div class="col-md-2 mt-5">
				<div>
			      <img src="{{ url('public/images/salman.jpg') }}" alt="">
			   </div>
			</div>
			<div class="col-md-10 mt-5">
				<h4>Salman Nadir Khairi </h4>
				<p>
				I find progress a never ending vision, the instance I achieve a goal is when I realize another challenge to conquer, another vacuum to fill. I do not relish the success; I relish the pursuit of the path that leads me to it. It is with this mindset, I have given my all in creating and running relentlessly AU Telecom since last five years. Our business with time has significantly grown and now seven department services fall under our umbrella. We have always met the needs and demands of our clientele and for that I applaud my team and staff for it. It is with their unwithering courage and unshakable trust in us, even in these tough times of global pandemic that we have strived to keep our business at surface in local and global market. I for one could not ask for more, the support our employees have given us in reaching a collective success speaks volumes of their efforts and I am sure it will help us serve our clients in future also. 
				</p>
			</div>
			<!-- b2 -->
			<div class="col-md-2 mt-5">
				<div>
			      <img src="{{ url('public/images/nadir.jpg') }}" alt="">
			   </div>
			</div>
			<div class="col-md-10 mt-5">
				<h4 class="">Syed Nadir Shah</h4>
				<p>
				Throughout the journey of my life I have learned that there are no secrets to success. Success is the result of preparation, hard work and learning from failure. Over the course of last five years, I have dedicated myself to this sole ideology and as a result AU Telecom Company is the product of my principles. I cherish and instill the same level of motivation to my employees also and our success story is a cumulative result of their efforts in satisfying our clients. It is their unwavering and resolute support in recent times of global business crisis that we have stood tall and kept on persuading and prioritizing the services required by our clients. 
				</p>
			</div>
			<!-- b3 -->
			<div class="col-md-2 mt-5">
				<div>
			      <img src="{{ url('public/images/sameel.jpg') }}" alt="">
			   </div>
			</div>
			<div class="col-md-10 mt-5">
				<h4>Syed Sameel Naqvi</h4>
				<p>
				I am a strong believer that opportunities do not happen, you must create them. The Bizz World
Communications platform that I with my fellows created is the one which many saw as an
opportunity, the one to climb, grow and not to falter. What started as a pet project has now
become a business corporate machine. From us many clients have successfully established
their business models and they continue to do so. It is not my singular win but a collective
achievement of my employees who have shown resilient dedication in their work over years.
Even in these challenging times throughout the entire global business world, our objectives and
goals of my employees remain the same; to serve our clients. 
				</p>
			</div>
			<!-- b4 -->
			<div class="col-md-2 mt-5">
				<div>
			      <img src="{{ url('public/images/own.jpg') }}" alt="">
			   </div>
			</div>
			<div class="col-md-10 mt-5">
				<h4> Syed Aun Bukhari</h4>
				<p>
				Many see AU Telecom as an overnight success; if you look closely it was a long night. Growing a business company one that obligates their employees to prefer clientele needs above all takes a never quitting approach. The hardships that we faced in recent times, where most business models of the world crashed, we managed to bypass the inevitable. I for one ask for continued support from our staff and employees of the company to keep setting out a high bar when it comes down to client’s satisfaction. 
				</p>
			</div>
			<div class="col-md-12 mt-5">
			<h3 class="page-title ml-md-5 mb-3">COPORATE MISSION</h3>
			<ul>
				<li>Provide High-Quality, Affordable IT solutions</li>
				<li>Create and cultivate long-term relationships with clients</li>
				<li>Respond immediately to the changing needs of our clients</li>
				<li>Achieve complete customer satisfaction</li>
				<li>Improve our services continuously</li>
				<li>Maintain professional relationships with our dedicated staff by encouraging ongoing communication to achieve the highest standard of performance.</li>
			</ul>
			</div>
			<div class="col-md-12 mt-4">
			<h3 class="page-title ml-md-5 mb-3">OUR VALUES</h3>
			<ul>
				<li>Honesty, Integrity & Fairness in all dealings</li>
				<li>Be passionate and determined</li>
				<li>Following the highest standard of professionalism</li>
				<li>Relentlessly strive to get better</li>
				<li>Deliver 100% client satisfaction</li>
			</ul>
			</div>
			<div class="col-md-12 mt-4">
			<h3 class="page-title ml-md-5 mb-3">HR MISSION</h3>
			<p>
			Our mission is to support and provide equal opportunity to our Corporate Leadership, Department Heads, employees and competent applicants in achieving their personal and strategic goals. We intend to achieve this by attracting, recruiting, training, developing and retaining high caliber staff and constantly revitalizing the employee’s of the company through Benchmark policies and practices.s
			</p>
			</div>
			<div class="col-md-12 mt-4">
				<h3 class="page-title ml-md-5 mb-3">HR QUALITY OBJECTIVE</h3>
				<ul>
					<li>Demonstrate a compelling modesty and act with quiet & calm determination to create an atmosphere of self-motivation across all levels.</li>
				<li>Facilitate people to build a congenial working environment</li>
				<li>Promote a culture of Team work among employees</li>
				<li>Strive for continuous improvement in upgrading the competencies of employees through focused initiatives</li>
				<li>Focus on defined Values and Principles</li>
				<li>Facilitate people towards a multi-skilled and multi-tasking approach</li>
			    </ul>
			</div>
			<div class="col-md-12 mt-4">
			<h3 class="page-title text-center mb-4">OBJECTIVE OF POLICY MANUAL</h3>
			<h4 class="ml-md-5">Introduction</h4>
			<p>
			The purpose of this Policy Manual is to make the policies and procedures of AU Telecom as clear and useful as possible. It is made to provide trainers from different angles with direction and guidance in connection with provision, procedures, and reports that should be uniform throughout the organization.
			</p>
			<p>
			This policy manual is an official directive of AU Telecom and as part of the general responsibility it will also serve as an official document for training directorate and the respective coordinators which will be assigned by different departments within AU Telecom.
			</p>
			<p>
			Below mention are some major parts and objective of the policy manual and it is to provide support to its employees through:
			</p>
			<ul>
				<li>Provide authority and direction in the day-to-day administration of human resources.</li>
				<li>Recruit the best qualified professionals and to maintain a pool of human resources according to the manpower requirement and planning of AU Telecom. This is to assist in new member recruitment that policy and procedures clearly point the interested people what are you looking for.</li>
			    <li>Provide continuity and consistency of services in decision making. They ensure the organization will stay on working track even when the management changes.</li>
				<li>Provide a standard path for managers and employees in understanding their rights and their responsibilities.</li>
				<li>Set a positive and useful direction for the organization</li>
				<li>Provide a way to review existing schedule, programs and services to ensure needs are fulfilled or not.</li>
				<li>Provide equal opportunities of employment irrespective of their age, sex, marital status, family status, disability, race, nationality or religion (provided that these do not obstruct the abilities of the prospective appointees to carry out normal job duties)</li>
				<li>Avoid conflict and the potential for misunderstanding.</li>
				
			</ul>
			<p>
				Development is an ongoing process and it is so for AU Telecom too. The attempt of putting together this Policy Manual is part of this initiative keeping in perspective the size that we have grown to. It is important that we are all in tandem and on a common page.
				</p>
				<p>
				The privileges and Amenities mentioned in the Manual are the current set and obviously will undergo changes as we progress in our journey. Amendments in the policy will be communicated to all colleagues from time to time.
				</p>
			</div>
			<div class="col-md-12 mt-5">
			<h3 class="page-title text-center mb-4">1. STANDARD OF BUSINESS CONDUCT</h3>
			<h4 class="ml-md-5">1.1 Introduction</h4>
			<p>
			What is the Standards of Business Conduct?
			</p>
			<p>
			AU Telecom is committed to conduct business with the highest integrity and in compliance with applicable laws. The Standards of Business Conduct embodies the fundamental principles that govern our ethical and legal obligations at AU Telecom. It describes, summarizes and supplements policies, some of which have been in place at AU Telecom for years.
			</p>
			<p>
			No policy or manual, however detailed, can possibly anticipate all of the situations or challenges we might face on the job. The Standards of Business Conduct serves as a road map and is not intended to be an exhaustive description of the Company’s policies or the law.
			</p>
			<p>
			All AU Telecom employees are expected to read and understand this Code of Business Conduct and Ethics. Violating the Standard of <b> Business Conduct may result in very serious consequences for the Company and you.</b>
			</p>
		</div>
		<div class="col-md-12 mt-3">
		<h4 class="ml-md-5 mb-2">1.2 Standard of Business Conduct by the Company:</h4>
		<p>
		Standard of Business Conduct and Ethics is intended to comply with the applicable requirements, as needed, and to promote AU Telecom’s standards of business conduct. All AU Telecom employees are expected to read and understand this Standard of Business Conduct and Ethics, uphold these standards in day-to-day activities, comply with all applicable policies and procedures, and ensure that all agents and contractors are aware of, understand and adhere to these standards.
		</p>
		<p>
		The purpose of this Standard of Business Conduct and Ethics is to deter wrongdoing and to promote;
		</p>
		<ul>
			<li>Honest and ethical conduct, including the ethical handling of actual or apparent conflicts of interest between personal and professional relationships.</li>
			<li>Full, fair, accurate, timely and understandable disclosure in reports and documents that AU Telecom files with any concerned regulatory authority.</li>
			<li>Compliance with applicable governmental laws, rules and regulations.</li>
			<li>The prompt internal reporting to an appropriate person or persons of violations of this Standard of Business Conduct and Ethics and accountability for adherence to this Code of Business Conduct and Ethics.</li>
			<li>Since the principles described in this Standard of Business Conduct and Ethics are general in nature, you should also be aware of all applicable AU Telecom policies and procedures for more specific instruction, and contact the Human Resources Department or Training and Organizational Development Department if you have any questions.</li>
		</ul>
		<p>
		Ethical business conduct is critical to our business. As an employee, your responsibility is to respect and adhere to the practices in this document. Many of these practices reflect legal or regulatory requirements. Violations of these laws and regulations can create significant liability for you, AU Telecom, its directors, HOD’s, and other employees.
		</p>
		<p>
		Violations of law, this Standard of Business Conduct and Ethics or other company policies or procedures by AU Telecom employees can lead to disciplinary action, up to and including termination. Part of your job and ethical responsibility is to help enforce this Standard of Business Conduct and Ethics
		</p>
		<p>
		You should be alert to possible violations and report possible violations to the Human Resources Department. You must cooperate in any/all internal or external investigations of possible violations.

Reprisal, threats, retribution or retaliation against any person who has in good faith reported a violation or a suspected violation of law, this Standard of Business Conduct and Ethics or other AU Telecom policies, or against any person who is assisting in any investigation or process with respect to such a violation, is prohibited.

In all cases, if you are unsure about the appropriateness of an event or action, please seek assistance in interpreting the requirements of these practices.
		</p>
		</div>
		<div class="col-md-12 mt-3">
		<h4 class="ml-md-5 mb-2">1.3 Code of Conduct for Directors/ Team Core:</h4>
	<ul>
		<li>MEMBERS OF CORE TEAM/Directors HAVE COMPLETE OVERSIGHT AND AUTHORITY OVER THE ENTIRE ORGANIZATION UP TO AND INCLUDING SENIOR MANAGEMENT.</li>
	    <li>CORE DECISIONS CAN ONLY BE REVERT BY OTHER CORE MEMBER.</li>
	</ul>
		</div>
		<div class="col-md-12 mt-4">
		<h3 class="page-title text-center mb-4">2. RECRUITMENT AND SELECTIONS</h3>
		<h4 class="ml-md-5 mb-2">2.1 Introduction:</h4>
		<p>
		Welcome to the AU Telecom Recruitment & Appointment section. This section provides much of the information about types of employment/appointments, opportunities and the way in which AU Telecom undertakes the recruitment and selection of talent.</p>

<p> You will find at your ‘fingertips’ a wide variety of policies, procedural instructions, pro forma/templates and guidance notes on a wide variety of recruitment related topics that will both educate those involved in recruitment activities and assist in facilitating the acquisition of staff, in the AU Telecom way!.

A commitment to acquiring high performing, quality candidates who match the requirements of the AU Telecom, the work area and the job;
		</p>
		<ul>
			<li>
			Conducting recruitment and related practices, with due regard for the principles of AU Telecom that remain free from any form of favoritism, nepotism or biases.
			</li>
			<li>
			Seeking to achieve a workforce that is diverse in its profile.
			</li>
			<li>Ensuring its employees are made aware of vacancies for which it is conducting a recruitment process and Conducting all related activities with due regard to confidentiality.</li>
		</ul>
		</div>
		<div class="col-md-12 mt-3">
		<h4 class="ml-md-5 mb-2">2.2 Recruitment for Vacant Positions:</h4>
		<ul>
			<li>
			Recruitment to a vacant position, either on an ongoing basis or a fixed-term employment contract greater than 1 year, will be as a result of a competitive merit based process in accordance with the policies and relevant guidelines.
			</li>
			<li>
			All the department heads will forward the requirement for new staff to HR (Recruitment Manager) and approval to establish positions and recruit for vacancies will be in accordance with the HR Delegations, CEO, COO or Directors.
			</li>
			<li>
			Fixed-term employment contracts of 1 year and more or less and recruitment of casuals will be based on merit and may be made by direct appointment. To satisfy the merit selection requirement a candidate must demonstrate that they meet the capabilities defined for the position.
			</li>
			<li>
			Recruitment activities will involve any methodology, approach or tools required to acquire a competitive pool of candidates that is free from any form of favoritism and adheres to the principles of Equity, Equal Employment Opportunity.
			</li>
			<li>
			Selection activities will involve any methodology, approach or tools that ensure merit based assessment free from bias, patronage and nepotism. The same methodology is to be used for each candidate to ensure transparency across the process
			</li>
			<li>
			Composition of selection concerned people will be in accordance with the requirements of concerned departments.
			</li>
			<li>
			It is mandatory that at least few people from management have been formally trained and maintain proficiency policies, guidelines and processes and techniques associated with recruitment and selection.
			</li>
			<li>
			The assessment of candidates and the recommendation for appointment decisions will be documented to accurately according to the record.
			</li>
			<li>
			The Selection Report recommendation will be approved in accordance with the HR Delegations.
			</li>
			<li>
			All successful appointees to the AU Telecom will sign a contract of employment prior to commencement.
			</li>
			<li>
			In exceptional circumstances, AU Telecom reserves the right to appoint by invitation a candidate who demonstrates the ability to meet or exceed the required capabilities. This must be approved in accordance with the HR Delegations.
			</li>
			<li>
			AU Telecom reserves the right not to make an appointment if there are no suitable applicants, or if circumstances change making it inappropriate to offer a contract.
			</li>
		</ul>
		</div>
		<div class="col-md-12">
			<h5 class= "ml-md-5 mb-3">2.2.1 Preparation:</h5>
			<p>
			Step-1 Identification of a Vacancy <br>
			Step-2 Review the need for the position 
			</p>
			<p>
			Step-3 Create or modify a position
			</p>
			<p>
			Step-4 Determine the most effective recruitment strategy to acquire a pool of quality candidates<br> Step-5 Establish Selection Committee and determine appropriate selection methodology
			</p>
			<p>
			Step-6 Prepare a “Request to Recruit”, provide associated documentation to secure authorizations and maintaining of Requisition Form duly signed by respective department.
			</p>
			<p>
			Step-7 Initiate recruitment
			</p>
			<p>
			Step-8 Arrange and undertake the recruitment activity
			</p>
			<p>
			Step-9 Receive and collate applications
			</p>
			<p>
			Step-10 Hold discussion with a view to appointment with the preferred candidate and discuss/negotiate terms and conditions of employment.
			</p>
		</div>
		<div class="col-md-12">
		<h5 class= "ml-md-5 mb-3">Step 1: Identification of a Vacancy</h5>
		<ul>
		The Line Manager identifies a vacancy for reasons that may include but not be limited to:
			<li>
			Staffing changes, resignation, termination, retirement, leave; and/or
			</li>
			<li>
			Work requirement changes – e.g. Creation of a new position, temporary additional workload.
			</li>
		</ul>
		<h5 class= "ml-md-5 mb-3">Step 2: Review the need for the position</h5>
		<ul>
		The Line Manager reviews the short/long term requirement for the position and the need to fill the vacancy. In so doing consideration is given to:
		<li>Faculty/Centre Operations Plan</li>
		<li>Staffing Plan/profile for the work area</li>
		<li>
		Opportunity to restructure
		</li>
		<li>
		Budget
		</li>
		<li>
		Current / Future Requirements
		</li>
		<li>Competency Requirements</li>
		<li>Relevancy required meeting need (e.g. ongoing, fixed term)</li>
		<li>Adequacy and accuracy of position description / role statement</li>
		<li>Whether the position is approved and established</li>
		</ul>
		<p>
		Note: This review may involve other managers within the faculty/service center.
		</p>
		<h5 class= "ml-md-5 mb-3">Step 4: Determine the most effective recruitment strategy to acquire a pool of quality candidates</h5>
	<p>
	In accordance with the Recruitment Selection and Appointments Policy, consider and assess the best way of attracting a pool of suitably qualified candidates, who will meet the needs of your business.
	</p>	
	<h5 class= "ml-md-5 mb-3">Step-5 : Establish Selection Committee and determine appropriate selection methodology</h5>
	<p>
	For short-listing or pre-selection method(s), sequencing & timing of assessment for short-listed candidates, for example:
	</p>
	<ul>
		<li>Interview</li>
		<li>Reference check (mandatory for the recommended applicant)</li>
		<li>Skills/aptitude/simulation test</li>
		<li>Psychological testing</li>
		<li>Work samples</li>
		<li>Presentation</li>
		<li>Assessment center</li>
		<li>Meeting the work group</li>
	</ul>
	<h5 class= "ml-md-5 mb-3">Step 6: Receive and collate applications</h5>
	<ul>
		<li>The HR Officer receives and collates the applications.</li>
		<li>The HR personal receives the Vacancy from the concerned department, containing the following</li>
	    <li>Review applications and determine a shortlist of candidates</li>
		<li>A short-listing process is to identify the most competitive candidates.</li>
		<li>The Committee analyses all applicant information available to them and assesses the candidates against the selection capabilities.</li>
	    <li>It may be necessary at this stage to consider assessment tools such as pre-selection interviews to identify a manageable shortlist. The Committee may also conduct a pre-selection interview where candidates have not thoroughly responded to the capabilities.</li>
	    <li>The HR and the concerned department head (or representative sub-group) compiles a summary assessment and ranking of the candidates against the capabilities statement for inclusion in the selection report.</li>
	</ul>
	<h5 class= "ml-md-5 mb-3">Step 7: Advice applicants who were not short-listed</h5>
	<p>
	Advice short-listed candidates so that the non-shortlisted candidates can be notified that they were unsuccessful.
	</p>
	<h5 class= "ml-md-5 mb-3">Step 8: Invite and assess short-listed candidates</h5>
	<p>
	The HR Department ensures that short-listed candidates are advised of the next selection phase and attends to all necessary arrangements.
	</p>
	<p>
	Following the collation of information from the various sources, including the candidate’s application/resume, the HR and concerned department head reviews all the information and determines a ranking of the candidates. The ranking identifies those candidates who are appointing able in order of merit and those not appoint able.
	</p>
	<h5 class= "ml-md-5 mb-3">Step 9: Obtain endorsements of recommendation in accordance with the HR Delegations</h5>
 <p>
 The head of department obtains endorsement and approval of the recommendation in accordance with

the HR Delegations. This should be obtained within 1 day of submitting the Selection Report.
 </p>    
 <h5 class="ml-md-5 mb-3">Step 10: Hold discussion with a view to appointment with the preferred candidate and discuss/negotiate terms and conditions of employment.</h5>
<p>
The HR Department makes contact with the recommended candidate and informs them of the offer subject to relevant conditions. The following may be discussed:
</p> 
<ul>
	<li>Employment benefits/Remuneration package details</li>
	<li>This will ensure that an informed decision is made and both the appointee and Faculty/Centre are aware of what will be included/excluded.</li>
	<li>Availability for commencement</li>
	<li>Clarification of terms and conditions of appointment including tenure, probation, medical</li>
	<li>This should be undertaken immediately on receiving approval of the recommendation</li>
</ul>
</div>
<div class="col-md-12">
<h5 class="ml-md-5 mb-3">2.2.2 Interview:</h5>
<p>
A behavioral based interview will provide an opportunity to hear what the applicant has actually done in relation to the capabilities, rather than what they might do. Applicants who can address the capabilities will be able to recount from Actual experiences.
</p>

</div>
<div class="col-md-12">
<h5 class="ml-md-5 mb-3">2.2.3 Reference Checking:</h5>
<p>
Reference Checks allows the HR Department the opportunity to obtain, review or validate aspects of a candidate’s skill and work experience with one or two previous employers. Referee reports may be verbal or requested to be in writing. They may seek clarification on the applicant's skills and abilities for all, or only particular capabilities. Not all short-listed applicants need to be reference checked. It is recommended that the interview questions be used as a basis for the referee questions to validate or expand on information given by the applicant.
</p>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">2.3 Vacancies Announcement’s:</h4>
<ul>
	<li>
	Identification of a Vacancy.
	</li>
	<li>First of all Concerned department has to identify for which post the hiring process will occur.</li>
	<li>
	Concerned Managers will first get an Approval from Directors.
	</li>
	<li>
	Soft / Hard copy of approved Requisition form must be submitted to HR 7-10 working days prior to position closure deadline.
	</li>
	<li>
	HR will Review the need for the position.
	</li>
	<li>
	It has to be defined particularly by the Head of department and HR concisely that why and where the need has been created in department and what will be the resources required to fulfill the need.
	</li>
	<li>
	Create or modify a position.
	</li>
	<li>
	Determine the most effective recruitment strategy to acquire a pool of quality candidates
	</li>
	<li>
	It can be determined in this way that whether it can be full filled internally or externally. And the HR department has to see, if it’s external, what kind of resources will be required to full fill the vacancy.
	</li>
	<li>
	Establish committee (HR & Head of Department) and determine appropriate selection methodology.
	</li>
	<li>
	Prepare a “Request to Recruit”, provide associated documentation to secure authorizations and initiate recruitment activity.
	</li>
</ul>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">2.4 Application Method:</h4>
<ul>
	<li>The HR Officer receives and collates the applications</li>
	<li>
	The HR personal receives the Vacancy from the concerned department, containing the following:
	</li>
	
		<ul class="dot">
			<li>Review applications and determine a shortlist of candidates</li>
			<li>A short-listing process is to identify the most competitive candidates.</li>
			<li>The Committee analyses all applicant information available to them and assesses the candidates against the selection capabilities</li>
		    <li>It may be necessary at this stage to consider assessment tools such as pre-selection interviews to identify a manageable shortlist. The Committee may also conduct a pre- selection interview where candidates have not thoroughly responded to the capabilities</li>
		    <li>
			The HR and the concerned department head (or representative sub-group) compiles a summary assessment and ranking of the candidates against the capabilities statement for inclusion in the selection report.
			</li>
		</ul>
	
</ul>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">2.5 Short listing Criteria:</h4>
<ul>
	<li>Selection activities will involve any methodology, approach or tools that ensure merit based assessment free from bias, investment and preference. The same methodology is to be used for each candidate to ensure transparency across the process.</li>
	<li>Composition of selection concerned people will be in accordance with the requirements of concerned departments.</li>	
	<li>It is mandatory that at least few people from management have been formally trained and maintain proficiency policies, guidelines and processes and techniques associated with recruitment and selection.</li>
	<li>
	The assessment of candidates and the recommendation for appointment decisions will be documented to accurately according to the record.
	</li>
	<li>
	The Selection Report recommendation will be approved in accordance with the HR Delegations.
	</li>

</ul>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">2.6 Final Interviews:</h4>
<p>
The final interviews will be conducted by the concern committee for example; Department heads, Shift Managers, Directors, HR, COO and CEO.
</p>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">2.7 Submission of Documents:</h4>
<p>
The documents will be submitted by the new inductee to HR before he/she will join AU Telecom (Even on probation or trial basis). It should include following things;
</p>
<ul>
	<li>
	The photocopies of all educational certificates.
	</li>
	<li>
	02 copies of CNIC copies.
	</li>
	<li>
	02 passport size photographs
	</li>
	<li>
	Experience certificates
	</li>
	<li>
	Last pay slip
	</li>
	<li>
	Paid utility bill of last month
	</li>
</ul>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">2.8 Verification Method:</h4>
<p>
Reference Checks allows the HR Department the opportunity to obtain, review or validate aspects of a candidate’s skill and work experience with one or two previous employers. Referee reports may be verbal or requested to be in writing. They may seek clarification on the applicant's skills and abilities for all, or only particular capabilities. Not all short-listed applicants need to be reference checked. It is recommended that the interview questions be used as a basis for the referee questions to validate or expand on information given by the applicant.HR depart must send in the clause of verification at time of sending in interview invitation email to prospects for interview.
</p>
</div>
<div class="col-md-12">
	<h5 class="ml-md-5 mb-2">2.8.1 Distribution and Acknowledgment of Company Policies:</h5>
	<p>
	New inductees have to sign the policies before he/she start training or join the floor to make environment more secure and free. AU Telecom wants every employee to feel good and secure while working in the office environment.
	</p>
	<h5 class="ml-md-5 mb-2">2.8.2 Signing of Undertaking</h5>
	<p>
	All new employees must sign the undertaking on stamp paper for HR record and in accordance data protection act.
	</p>
</div>
<div class="col-md-12">
	<h4 class="ml-md-5 mb-2">2.9 Distribution of Offer Letters:</h4>
	<p>
	Offer letters will be given to new employee once they submit all the necessary documents to HR on the very first day of joining. AU Telecom wants to make it sure that every employee should feel the environment in a more professional way on a very first step he enters into the office.
	</p>
</div>
<div class="col-md-12">
	<h4 class="ml-md-5 mb-2">2.10 Briefing/Orientation to New Inductee’s:</h4>
	<p>
	It is the responsibility of a new staff member’s supervisor and HR to ensure that their new staff member is ’inducted’ – to their Role and with their work area.
	</p>
	<p>
	The HR & supervisor may provide all of the information, or they may have other key people assist with this. However the induction is ‘delivered’ to the new staff member, the supervisor must monitor and ensure it has been provided.
	</p>
	<p>
	HR coordinates and delivers a range of initiatives to introduce new staff. Supervisors should let their new staff know about such opportunities and encourage attendance.
	</p>
	<p>
	It provides a broad range of information to help staff understand the AU Telecom context and to settle in to their new roles, working as part of the AU Telecom community.
	</p>
</div>
<div class="col-md-12">
	<h4 class="ml-md-5 mb-2">2.11 Training and Probation Period:</h4>
	<p>
	The purpose of Probationary period is:
	</p>
	<ul>
		<li>
		The usual probation period for all new employees will be three (3) Months
		</li>
		<li>For Senior Management Positions the Probation period is 1 month.</li>
		<li>
		Help the employee achieve training goals and performance objectives
		</li>
		<li>Ensure that the employee has all the tools to perform the job successfully</li>
		<li>Help the employee develop the skills needed to perform the job</li>
		<li>Confirm that the best qualified person was chosen for the position</li>
		<li>Foster a mutual understanding of expectations, standards of performance, and the evaluation process</li>
		<li>Help the employee achieve regular status</li>
		<li>During the probationary period the new employee needs as much support as possible. This is a very crucial time for you and the employee so set aside plenty of time to:</li>
		<ul class="dot">
			<li>
			Provide the employee with a clear job description.
			</li>
			<li>Provide clear performance standards so the employee understands what is expected and how they will be measured.</li>
			<li>Acquaint the employee with office procedures and practices.</li>
			<li>Schedule the employee for the New Employee Orientation through the Development and Training Unit in HR and in training.</li>
			<li>Provide a good systematic departmental orientation for the new employee</li>
			<li>Explain how and when the employee will be evaluated.</li>

		</ul>
		<li>Provide follow-up sessions as often as necessary so the employee can adjust to their new working environment.</li>
		<li>Provide a desk manual (if available).</li>
		<li>Tell the employee in advance when their probationary period will be over and explain what it means to become a regular status employee.</li>
		<li>Evaluate the employee's performance in accordance with applicable policies, procedures, and contracts.</li>
		<li>Show a continuing interest in the new employee (it's not enough to explain terms and conditions of employment and leave the employee to make it from there alone).</li>
	</ul>
	<h5 class="ml-md-5 mb-2">
	2.11.1 Internship Programs:
	</h5>
	<p>
	Internship programs will be from 6-8 weeks. The employment will confirmed if there will be project, work need and requirement of the resource in future. Employment of an intern will purely be confirmed (if in case) after his / her detail performance evaluation.
	</p>
	<h5 class="ml-md-5 mb-2">2.11.2 Extending the Probationary Period:</h5>
	<p>
	Under extraordinary circumstances, the employee's probationary period may be extended. Extensions can be the result of a significant change in responsibilities or supervision without benefit of adequate time to assess the incumbent. There are usually notice requirements before the period would normally end. Consult the appropriate contract or policy for implementation.
	</p>
	<h5 class="ml-md-5 mb-2">2.11.3 Release during the Probationary Period:</h5>
	<p>
	Unsatisfactory performers and unsuitable employees should be released during the probationary period without delay. Delaying a release action does little to help the campus or the employee.
	</p>
	<h5 class="ml-md-5 mb-2">2.11.4 Evaluation Process:</h5>
<p>
Probation is the most critical period to assess your employee. At the end of the probationary period, you should have complete confidence that your employee meets or exceeds performance standards; to know that, you must evaluate job performance.
</p>

</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">2.12 Responsibilities and Task Assignment:</h4>
<p>
It is the responsibility of the department head to make sure that all the work should be assign to the new employee in a proper manner through verbal and written communication and make sure that he/she understands the nature of the work.
</p>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">2.13 Appointment Letter Distribution:</h4>
<p>
Appointment letters distribution will occur on the day they submit their documents with clauses of terms and conditions. New inductee will have to go through the terms and conditions, If he/ She will be satisfy with all terms and conditions, he/she has to sign the documents. And after that he/she completes the probationary period.
</p>
</div>
<div class="col-md-12">
	<h4 class="ml-md-5 mb-2">2.14 Distribution of Employment Id Card’s:</h4>
	<p>
	All the new inductees will get their employment ID cards after the first month. In-case any employee resigned or get terminated he/she has to return the ID card to HR.
	</p>
</div>
<div class="col-md-12">
	<h4 class="ml-md-5 mb-3">
	2.15 Final Confirmation after Probationary period:
	</h4>
	<p>
	All the employees will receive the final confirmation letter from HR, once their complete their probationary period with AU Telecom.
	</p>
</div>
<div class="col-md-12">
	<h4 class="ml-md-5 mb-3">
	2.16 Contract Base Employee’s:
	</h4>
	<p>
	In rear cases AU Telecom hire few employees on contract base for the limited tenure. All those employees cannot resign until their tenure is over. They could be on free-lance or on full shifts. But only Directors can decide and confirm about their full time and part time employment.</p>
</div>
<div class="col-md-12">
<h3 class="page-title text-center mb-4">3. TRAINING AND DEVELOPMENT</h3>
<p>
The purpose of this training introduction is to make the training and procedures of AU Telecom as clear and useful as possible. It is made to provide employees from different angles with direction and guidance in connection with provision, procedures, and reports that should be uniform throughout the organization.
</p>
<p>
This training is an official instruction for employees and as part of the general responsibility it will also serve as an official document for training directorate and the respective coordinators which will be assigned by different departments within AU Telecom.
</p>
</div>
<div class="col-md-12">
	<h4 class="ml-md-5 mb-2">
	3.1 The Rationale of this Policy:
	</h4>
	<p>
	Pakistan is nowadays found in the state of continuous changes and highly demanding trained and active work force. AU Telecom in this regard is contributing its share in the process of producing skilled employees and strived to bring and lead the development agenda through capacity building. Unless and otherwise we have a well-structured training policy which can enrich to the community at large, we will not be able to fight poverty and inequality. It is due to this fact that this policy necessitates to come in to being. Also it is a must rather than a choice to find alternative schemes for AU Telecom in order to run programs which go in line with the changing world. Besides, it is the central agenda of this policy to contribute to its staffs in their career development.
	</p>

</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">
3.2 Policy Statement:
	</h4>
	<p>
	It is the policy of AU Telecom to provide continuous high quality training and development services to improve the skills and competences of its community that will contribute to the development endeavors. In this regard, AU Telecom is committed itself to provide up to the standard trainings and to continually improve its training services to be in line with the different development agenda. Hence, this document is prepared to explain the basic training guidelines, procedures and responsibilities of concerned departments i.e. units within AU Telecom.
	</p>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">
3.3 Definitions of Training:
	</h4>
	<p>
	In this policy, training is broadly defined as any form of professional or technical services rendered through the appropriate channel [department] to any organization or group of individuals. It may consist of the following features:
	</p>
	<ul>
		<li>
		Training is an organized procedure for developing skills, knowledge, abilities to perform a job. It will be undertaken by the AU Telecom staff in their field of expertise and experience and by other associate members.
		</li>
		<li>
		Training is a learning process that involves the acquisition of knowledge, sharpening of skills, concepts and rules.
		</li>
		<li>
		Training provided by AU Telecom can be either tailor-made.
		</li>
		<li>
		n a nutshell, training is a short term contractual agreement which makes use of Bizz World
Communication’s resources and brings extra work for AU Telecom staff and other stakeholders.
		</li>
	</ul>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">
3.4 Policy Guidelines:
</h4>
<p>
This training policy of AU Telecom therefore will have the following brief guidelines
</p>
<ul class="roman">
	<li>Trainees could be both from inside and outside the departments.</li>
	<li>This can be done through public announcement.</li>
	<li>Selection of trainees should be done based on relevance to the training theme.</li>
	<li> Expert selection should be based on relevance of expertise and experience in relation to the training on a competition base in consultation with respective departments.</li>
	<li>
	Trainings should be provided on modular approach. As much as possible it should be team- based, a combination of senior and junior experts.
	</li>	
	<li>
	Both the training and the trainees should be evaluated for each program.
	</li>
	<li>
	Only successful trainees will receive confirmations.
	</li>
	<li>
	Trainees should attend at least 85% of the total time allotted to get certified.
	</li>
</ul>
</div>
<div class="col-md-12">
	<h4 class="ml-md-5 mb-2">3.5 Policy Procedures</h4>
	<p>
	Every training program that will be provided by AU Telecom should be in line with AU Telecom training objectives and policies. To do this, the following important procedures must be incorporated.
	</p>
	<ul>
		<li><h5><b> Part-I, Before Training Delivery </b></h5></li>
		<ul class="dot">
			<li><h5><b> Service Initiation</b></h5></li>
			<li>Service initiation should make social development, organizational development and career development agenda for training provision.</li>
	     	<li><b><h5>Expert Identification</h5></b></li>
		    <li>Expert identification for trainings should be advertised sufficiently by all means and selection should be made on a merit basis.</li>
			<li>
				<b><h5>Syllabus</h5></b>
			</li>
			<li>
			Training syllabus is an important training part. For every training syllabus should be prepared as per the contract and must get approved. Syllabi should include content, objectives, method, required resources and minimum admission requirement and level of certification.
			</li>
			<li>
				<b>
					<h5>Module Development and Evaluation</h5>
				</b>
			</li>
			<li>
			From the AU Telecom’s database, selection of Training experts should be done. An expert or group of experts will be responsible for the preparation of training module. The prepared training module will be evaluated.
			</li>
			<li>
				<b><h5>Site Selection</h5></b>
			</li>
			<li>
			The place where trainings should be provided must be relaxed. All the visual aids should be made available with comforting sitting arrangements.
			</li>
			<li>
				<b><h5>Trainee Recruitment and Admission</h5></b>
			</li>
			<li>
			Based on potential candidate trainee’s educational background and work experience, trainings’ requirement and availability of space training applicants will selected and the result will be communicated.
			</li>
			<li>
				<b><h5>Orientation</h5></b>
			</li>
			<li>
			Those selected trainees will get a maximum of two hours orientation about the training program.
			</li>
	  </ul>
	  <li><b><h5>Part II, During Training Period</h5></b></li>
	  <ul class="dot">
		  <li>Distribution of Materials</li>
		  <li>All the training materials (schedules, modules and other supplementary equipment’s) will be supplied to trainees at spot. Training will continue as per the schedule and using the appropriate methodology.</li>
		  <li>Training Evaluation</li>
		  <li>
		  The entire training should be evaluated twice during the training period. One should be made in the middle another will be made at the end.
		  </li>
		</ul>
		<li><b><h5>Part III, After Training Period</h5></b></li>
		<ul class="dot">
			<li>
			Trainee Evaluation
			</li>
			<li>
			At the end of the training programs trainees will be evaluated as to their performance, attendance, participation and fulfillment of the stated training objectives and requirements.
			</li>
		</ul>
	</ul>
</div>
<div class="col-md-12 mt-5">
<h3 class="page-title text-center">4. GENERAL POLICIES</h3>
<h4 class="ml-md-5 mb-2">4.1 Dress Code</h4>
<p>
This Policy has been scheduled as a guideline for our employees. An employee is expected to exhibit a professional, well-groomed appearance during working hours.
</p>
<p>
In a formal business environment, the standard of dressing for men and women is a suit, a jacket and pants or a dress paired with appropriate accessories.
</p>
<p>
Clothing that reveals body parts or provoking in any manner is not appropriate for a place of business. In our work environment, clothing should be pressed and never wrinkled. Torn, dirty, or frayed clothing is unacceptable. All seams must be finished. Any clothing that has words, terms, or pictures that may be offensive to other employees is unacceptable in a professional environment.
</p>
<p>
(Note: This Policy is applicable for all the shifts and staff members)
</p>
<p>
The following schedule is particularly to serve as a guide to help define appropriate business Outfit for Monday through Thursday operations and for Casual Friday and Saturday operations.
</p>
<ul>
	<li>
	Individual business units may vary on specific dress expectations depending on job responsibilities; the immediate manager will have the responsibility to determine the appropriate solutions.
	</li>
	<li>
	Accessories and Jewelry; Tasteful, professional ties, scarves, belts, and jewelry are encouraged. Jewelry should be worn in good taste, with limited visible body piercing.
	</li>
	<li>
	Makeup, Perfume, and Cologne; A professional appearance is encouraged and excessive makeup is unprofessional. Remember that some employees are allergic to the chemicals in perfumes and makeup, so wear these substances with restraint
	</li>
	<li>
	Hats and Head Covering; Hats are not appropriate in the office. Head Covers that are required for religious purposes or to honor cultural tradition are allowed.
	</li>
</ul>
</div>
<div class=" imp">
	<div class="row no-gutters">
<div class="col-md-6 imp2">
<h4 class="ml-md-5 mb-">
4.2 Business Casual Dress Code</h4>
</div>
<div class="col-md-6 imp2">
<h4 class="ml-md-5 mb-">Acceptable Attire</h4>
</div>
<div class="col-md-6">
	<div class="imp1">
		<h4 class="ml-md-5 mb-">FORMAL (MON-THU)</h4>

	</div>
</div>
<div class="col-md-6">
	<div class="imp1">
		<h4 class="ml-md-5 mb-">CASUAL (FRI AND SAT)</h4>

	</div>
</div>
<div class="col-md-6 imp2">
<h4 class="ml-md-5 mb-">shirts and Jeans</h4>
</div>
<div class="col-md-6 imp2">
<h4 class="ml-md-5 mb-">Golf shirts, Polo Shirts and Plain T-shirts</h4>
</div>
<div class="col-md-6">
	<div class="imp1">
		<h4 class="ml-md-5 mb-">Sweaters</h4>

	</div>
</div>
<div class="col-md-6">
	<div class="imp1">
		<h4 class="ml-md-5 mb-">Long tops for females, Sweaters and Half Coats.</h4>

	</div>
</div>
<div class="col-md-6 imp2">
<h4 class="ml-md-5 mb-">Khaki’s, Corduroy, Cotton Slakes</h4>
</div>
<div class="col-md-6 imp2">
<h4 class="ml-md-5 mb-">Jeans with no holes, neither bleached</h4>
</div>
<div class="col-md-6">
	<div class="imp1">
		<h4 class="ml-md-5 mb-">For females proper respectable our national dress code will be required with appropriate fashion trend accordingly.</h4>

	</div>
</div>
<div class="col-md-6 ">
	<div class="imp1 ">
		<h4 class="ml-md-5 mb-">Shalwar suit is allowed but only shoes no sandals or toe open shoes</h4>

	</div>
</div>
<div class="col-md-12 imp2">
<h4 class="ml-md-5">Dress with a length at which you can sit comfortably in public</h4>
</div>
<div class="col-md-12 imp1">
<h4 class="ml-md-5">Footwear could include loafers, flats, dress shoes and deck type shoes. Athletic shoes are discouraged however may be acceptable under some conditions</h4>
</div>
<div class="col-md-12 imp2">
	<h4 class="ml-md-5">Clothing must be clean and neat in appearance and free of holes, tears, stains and wrinkles</h4>
</div>
<div class="col-md-12 imp1">
	<h4 class="ml-md-5">
	UNACCEPTABLE ATTIRE
	</h4>

</div>
<div class="col-md-12 imp2">
	<h4 class="ml-md-5">
	Clothing that has words, terms, logos, cartoons or pictures that may be offensive to other employees
	</h4>
</div>
<div class="col-md-12 imp1">
<h4 class="ml-md-5">Clothing worn for beach , exercise sessions , dance clubs</h4>
</div>
<div class="col-md-12 imp2">
	<h4 class="ml-md-5">
	Clothing that reveals too much cleavage, back, chest, stomach or under wear
	</h4>
</div>
<div class="col-md-12 imp1">
	<h4 class="ml-md-5">
	Clothing that is torn , dirty or frayed
	</h4>
</div>
<div class="col-md-12 imp2">
	<h4 class="ml-md-5">
	Sweatpants, overalls, shorts, from fitted cloths, short, tight skirts that ride half way up the thight, tank tops, midriff toff, halter-tops, flip shoes, slippers, hat or ball caps
	</h4>

</div>
</div>
</div>
<div class="col-md-12 mt-4">
	<h4 class="ml-md-5 mb-2">4.3 Personal Grooming and Hygiene:</h4>
	<p>
	Good personal hygiene, including cleanness is important on the job.
	</p>
	<ul>
		<li>It helps prevent illness</li>
		<li>It keeps your co-workers healthy, bacteria and other germs are easily spread from person to person by contact.</li>
		<li>For male staff members if have long hairs then properly tied back and jelled.</li>
		<li>For females long hairs must be tied neatly and properly.</li>
		<li>It makes the work site more pleasant for everyone</li>
		<li>Wash your hands several times a day</li>
		<li>Wash your hands before and after you eat , drink</li>
		<li>Wash your hands after using the toilet</li>
		<li>Shower daily (Before coming to work)</li>
		<li>Use deodorants or perfumes every day to prevent body odor</li>
		<li>Hairs must be neatly brushed /Combed</li>
		<li>Men (Finger Nails must be short , clipped and clean)</li>
		<li>Women (if Long nails than must be well maintained and presentable)</li>
	</ul>
</div>
<div class="col-md-12 mt-2">
	<h4 class="ml-md-5 mb-3"> 4.4 Working Days:</h4>
	<p>
	Working days at AU Telecom are from Monday to Saturday. Alternate Saturdays are off
<b> (“DEPENDING ON WORK LOAD/Policy Changes).</b>
	</p>
</div>
<div class="col-md-12">
	<h5 class="ml-md-5 mb-2">4.4.1 Intemperate Weather:</h5>
	<p>
	When places of work remain open during periods of intemperate weather, employees should possible effort to report to work. Some employees may find it difficult to report for work during intemperate weather due to family responsibilities, transportation problems or road conditions but as AU Telecom offers transport facilities to most of the employees it is mandatory for all to must show- up to work, In other hand AU Telecom will make every effort to accommodate employee’s requests for leave depending on the conditions and scenarios.
	</p>
</div>
<div class="col-md-12">
	<h5 class="ml-md-5 mb-2">
	4.4.2 Accident/Illness:
	</h5>
	<p>
	In case of any accident or illness, employees are required to inform their immediate supervisors/Managers or HR Department. Sick leaves will be adjusted if required after completing the formalities as mention in Leaves Policy section.
	</p>
</div>
<div class="col-md-12">
<h5 class="ml-md-5 mb-2">
4.4.3 Working Hours:
	</h5>
	<ul class="roman">
		<li>All employees must have to follow working hour’s strategy.</li>
		<li>The normal office hours of AU Telecom are following</li>
	</ul>
</div>
<div class="col-md-12">
<div class="imp">
	<div class="row no-gutters">
		<div class="col-md-12 imp2">
		 <h4 class="ml-md-5 text-center">SHIFTING TIMING</h4>
		</div>
		<div class="col-md-6 imp1">
			<h4 class="">Technical Team</h4>
		</div>
		<div class="col-md-6 imp1"> 
			<h4 class="">Mon-Fri 09:00pm till 05:00am *(Or Depends)</h4>
		</div>
		<div class="col-md-6 imp2">
			<h4>Sales/Support/Admin Teams </h4>
		</div>
		<div class="col-md-6 imp2">
			<h4>Mon-Saturday 09:00 pm till 05:00 am *(Or Depends) </h4>
		</div>
	</div>
</div>
</div>
<div class="col-md-12 mt-3">
	<p>
	<b> NOTE:</b> In case day light change system in US Night shifts Hours will be 8:00 pm till 4:00 am. Moreover if there is work requirement so employees are meant to sit late.
	</p>
	<p>
	No Time restriction for Prayers with respect to each employee’s religion. But that supposed to done within premises.
	</p>
	<ul>
		<li>Employees might be required to work additional hours when needed because of workload.</li>
		<li>
		Sunday shall be the normal Weekly Off days
		</li>
		<li>
		Owing to work emergency or demand, an employee may be expected to work either on Sunday or a public holiday.
		</li>
		<li>
		In above case, after obtaining due approval from his or her immediate manager, the Employee is entitled to take any of the following weekdays as a compensatory off in lieu of the day of the weekly off/ public holiday
		</li>
		<li>
		Compensatory off or holiday can be availed of with mutual convenience
		</li>
		<li>
		Any change in Shifts or Weekly offs after mutual dealings or departmental convenience must be communicated to HR Department and Admin Department immediately
		</li>
		<li>
		Such compensatory off cannot be clubbed with any other weekly off or holiday. Not more than one compensatory off is allowed in a week
		</li>
		<li>
		No accumulation of compensatory off at the end of year is carried forward
		</li>
	</ul>
</div>
<div class="col-md-12">
	<h5 class="ml-md-5 mb-2">4.4.4 On-Call Obligations</h5>
	<p>
	There may be a need for employees to be on-call outside normal working hours to handle contingency or operational matters but only in exceptional cases. If the matters cannot be contend with over the telephone, AU Telecom may require the employees to return to the workplace for emergency action and such action will be rewarded and appreciated.
	</p>
</div>
<div class="col-md-12">
	<h4 class="ml-md-5 mb-3">4.5 Official/Federal Holidays</h4>
	<div class="row imp no-gutters">
	<div class="col-md-6 imp2">
			<h4>New Year’s Day</h4>
    </div>
	<div class="col-md-6 imp2">
			<h4>December 31 st, January 1st</h4>
    </div>
	<div class="col-md-6 imp1">
		<h4>Martin Luther King, Jr. Day</h4>
	</div>
	<div class="col-md-6 imp1">
		<h4>January 20 th</h4>
	</div>
	<div class="col-md-6 imp2">
			<h4>Memorial Day</h4>
    </div>
	<div class="col-md-6 imp2">
			<h4>May 26 th</h4>
    </div>
	<div class="col-md-6 imp1">
		<h4>Independence Day</h4>
	</div>
	<div class="col-md-6 imp1">
		<h4>July 4 th</h4>
	</div>
	<div class="col-md-6 imp2">
			<h4>Labor Day</h4>
    </div>
	<div class="col-md-6 imp2">
			<h4>1 st Monday September</h4>
    </div>
	<div class="col-md-6 imp1">
		<h4>Christmas</h4>
	</div>
	<div class="col-md-6 imp1">
		<h4>December 25th</h4>
	</div>
	<div class="col-md-6 imp2">
			<h4>Eid-ul-Fitr</h4>
    </div>
	<div class="col-md-6 imp2">
			<h4>1 st Day</h4>
    </div>
	<div class="col-md-6 imp1">
		<h4>Eid-ul-Azha</h4>
	</div>
	<div class="col-md-6 imp1">
		<h4>1 st Day</h4>
	</div>
	<div class="col-md-6 imp2">
			<h4>Ashura</h4>
    </div>
	<div class="col-md-6 imp2">
			<h4>9 th & 10 th Moharram</h4>
    </div>
		


	</div>
</div>
<div class="col-md-12 mt-3">
	<h4 class="ml-md-5 mb-2">4.6 Leave Policy:
</h4>
<ul>
	<li>
	Recommending authority – Team Managers
	</li>
	<li>
	Sanctioning authority – Department Heads/HR Head
	</li>
	<li>
	Other Activities – Corporate HR or COO
	</li>
</ul>
</div>
<div class="col-md-12">
	<div class="imp">
		<div class="row no-gutters text-center">
			<div class="col-md-4 col-4 imp2">
				<h4>Casual</h4>
			</div>
			<div class="col-md-4 col-4 imp2">
				<h4>Sick</h4>
			</div>
			<div class="col-md-4 col-4 imp2">
				<h4>Total</h4>
			</div>
			<div class="col-md-4 col-4 imp1">
			<h4>5</h4>
			</div>
			<div class="col-md-4 col-4 imp1">
			<h4>7</h4>
			</div>
			<div class="col-md-4 col-4 imp1">
			<h4>12</h4>
			</div>
		</div>
	</div>
	<p class="mt-3">
	Every employee must fill the leave form and submit it to HR whether paid or un-paid. If any employee did not avail the complete paid leaves in one year they will not be carry forward to the next coming year. Remaining leaves at the end of the year will be considered under leave encashment policy.
	</p>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">4.7 Punctuality:
</h4>
<p>
Punctuality is key to success. Biz World Communications always prefer to have disciplined and well organized people onboard. All the employees are required to follow the rules of punctuality during office hours.
</p>
<ul>
		<li>No employee Junior or senior in Company is allowed to change his/her working shift hours other than Higher Management includes (CEO, COO, CFO, Directors)</li>
		<li>All employees must be punctual for work on their official working hours and after lunch, tea or smoke breaks</li>
		<li>
		Employees who attend office late without justified reasons or have a poor attendance record, disciplinary action will be taken against them.
		</li>
		<li>
		If an employee anticipates late arrival within 15 minutes of the start of the normal duty hours, the concerned must inform his or her Reporting officer
		</li>
		<li>
		Three such occasions in month would account for one day leave or one day without pay in case of non-availability of leave in credit
		</li>
		<li>
		In case of coming 01 or 02 hours late or leaving early from the regular timings that would be considered as half day in records and there will be deductions in basic salary for these half days and will not be considered for any leave
		</li>
		<li>
		All the employees must report their late arrivals or half day to their department heads in time. In-case of giving this notification after the incident, will not be considered and a write-up will be given to the employee
		</li>
		<li>
		Any employee having an urgent reason for leaving work must obtain permission from respective department head prior to leaving the designated duty station
		</li>
		<li>
		If employee goes out during Office hours on account of Office Work, shall fill-in prescribed
‘Out Door Duty’ slip duly approved by the department head and submit with the HR.
		</li>
		<li>
		For employees posted on certain types of jobs, such as Dispatch, House Keeping, Maintenance, admin. Flexible working hours has been prescribed, but in any case the total working hours will not be less than eight hours a day (excluding half an hour or an hour for lunch break). Salary of extra working hours will be paid to support staff (Office Boys, Driver, Cleaning Staff) in case of working axtra hours other than duty hours.
		</li>
		<li>
		If anyone from the female staff wants to leave early from the office or need the drop to any other place from company’s transport, it’s mandatory for her to give this in writing to the department head and HR. Also someone from the immediate family member has to call on office landline number to confirm.
		</li>
</ul>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">4.8 Fire Exits:</h4>
<p>
It is the responsibility of the training department to brief all the new inductees about the fire exits and how to react in these kinds of the situation. All fire exits of all obstacles should be kept clear. All staff has a responsibility to make sure that chairs, empty boxes, bags, or any other type of obstacle are not placed in or near fire exit doorways. For all corridors; equipment’s must be stored on one side only to ensure that there is a clear exit in case of any emergency. Also a practice should be held by the training manager for all the employees by the mid of every month.
</p>
</div>
<div class="col-md-12">
<h4 class=" ml-md-5 mb-2">4.9 Non-smoking on Company Premises:</h4>
<p>
AU Telecom is committed to provide a healthy workplace and environment for its employees. Some harmful effects that are caused by smoking as well as passive smoke, it is considered necessary to have a smoke-free workplace policy to work in AU Telecom. No-one is allowed to smoke within the office premise that includes cafeteria, kitchen, restrooms, Operational floors etc. AU Telecom has dedicated smoking zone for smokers. Anyone using smoker’s zone is supposed to through all cigarette buds in ash tray or dustbin placed there. Raping paper, empty packets or any other trash should not be thrown on the floor. Anyone failed to comply will be issued a warning and other actions can also be taken against them. 
</p>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">4.10 Salary Policy:</h4>
<ul>
<li>
AU Telecom issues salaries on second week of every month.
</li>
<li>
There is a possibility that employee can get his / her first month salary via cheque in case of delay in bank account opening process due to some unavoidable circumstances.
</li>
<li>
AU Telecom doesn't have any policy to issue salaries via check, cash or draft's across the board for any senior or junior position.
</li>
<li>
In worst scenario if any employee is having problems with <b>United Bank Limited (UBL)</b>  in order to open their bank account they can always let Finance and HR know and it's Finance responsibility to help that individual to open his account with <b>United Bank Limited (UBL)</b> .
</li>
<li>
HR needs to make sure any new candidate we bring on board, he/she have to submit their account details within 10 working days of his/her joining at max.
</li>
<li>
In-case the candidate fails to submit the account details to HR as per given time his/her services with AU Telecom will be suspended till HR receives the account details.
</li>
<li>
AU Telecom doesn't allow candidates to submit any irrelevant account details like Cousin's, Friend’s, any colleague or etc.
</li>
<li>
Only when an individual join AU Telecom in last 05-10 working days of the month and he/she requests then he/she can submit the account details of their immediate family member (Father, Mother, Sister and Brother only) with a written acknowledgment and copy of NIC of account holder.
</li>
<li>
Even if Finance accepts the account details of their immediate family member (Father, Mother, Sister and Brother only) those details will be valid for one month at max. After that Finance won't follow this practice for the same candidate.
</li>
<li>
It’s employee’s responsibility after resignation or termination to collect your dues after 45 calendar days. Otherwise Company will not be responsible to cater after due days.
</li>
<li>
Company will not be liable to clear or revert dues, if incase employee provides incorrect or invalid account details.
</li>
</ul>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">4.11 Clearance Policy</h4>
<p>
In case of resignation/termination, employee will be submitting his clearance certificate after getting it signed by immediate supervisor, department manager (HOD), Accounts and HR. Before signing clearance certificate form, these concerns will make sure;
</p>
<ul>
<li>
In case of resignation, employee has served his 30 days notice period starting from the date his resignation was approved by the authorities.
</li>
<li>
He has returned all the company holdings e.g. Company’s ID Card, Mobile Phone/SIM Card (If given), Company’s vehicle or any other gadget (Laptop, Internet device, tablet pc etc.)
</li>
<li>
He has delivered all the information related to his work to immediate supervisor.
</li>
<li>
He doesn’t owe anything or amount from company (any loan, bank guarantee, earnest money etc)
</li>
<li>
In case of termination, employee will be required to hand over all above mention things to his immediate supervisor and it’s supervisor’s responsibility to collect all the holdings before giving him his terminations orders.
</li>
<li>
HR will conduct an exit interview of the employee leaving the company on his last working day before signing the clearance certificate and will make sure that he has gone through with all above mention processes.
</li>
</ul>
<p>
After 45 days of completing above mention process, company will release his final settlement cheque. This cheque will be handed over to the employee only and no one else would be able to collect this cheque on his behalf.
</p>
</div>
<div class="col-md-12">
<h3 class="page-title text-center mt-3">5. OFFICIAL FACILITIES</h3>
<h4 class="ml-md-5 mb-2">5.1 Tea on Operational Floor:</h4>
<ul>
<li>
Everyone will be provided 2 tea servings every day. Depending upon the shift they are working inn.
</li>
<li>
Employees can take tea on the floor but if spilled, they have to clean it themselves and incase of any damage to property, it will be deducted from their monthly salary, depending upon the nature of damage and company have the rights to deduct that amount anytime they want.
</li>
<li>
In order to maintain discipline if someone spills over the tea on the operational floor, that person will be responsible to mop the spill and clean the floor.
</li>
<li>
Also it is the responsibility of the department head to take care of this and report to Admin in case of damages.
</li>
</ul>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">5.2 Transportation:</h4>
<ul>
<li>
With respect to transportation, no employee will have any direct liaison with the van drivers. If there is complaint or suggestion it should be routed through the Admin Department.
</li>
<li>
Employees have to report the issue to their department heads and department will co- ordinate with Admin/HR and solve the issue.
</li>
<li>
Drivers will drop the female staff at their door-step, as for the male stop, a common point will be negotiated not more than 1.5 K.M/15 minutes to his residence.
</li>
<li>
In-case any employee found arguing with drivers and misbehaving, admin holds the rights to take serious actions against him/her on immediate basis. But the department manager should keep in loop before finalizing any decision.
</li>
<li>
No one is allowed to smoke in office van including senior managers. Even the van drivers.
</li>
<li>
Listening and singing songs in van on speakers are not allowed. Even on cell phone speakers.
</li>
</ul>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">5.3 Visitors:</h4>
<ul>
<li>
In order to promote the brand equity and image of AU Telecom, we will encourage that the employees can invite visitors, such as parents or siblings (Only blood relative or immediate family members) so that they may feel at ease that how friendly and comfortable is the working environment is in AU Telecom. However, in doing so the employee should pre-inform the concerned HOD, HR and Admin of the visit 1 week in advance, so that all the preliminary chores could be catered to.
</li>
<li>
Employees are not allowed to call their friends or Cousins in office premises.
</li>
</ul>
</div>
<div class="col-md-12">
<h4 class="ml-4 mb-2">
5.4 Birthday Celebrations:
</h4>
<ul>
<li>
AU Telecom celebrate the birthdays for all the employees falling on their respective months with a cake cutting ceremony. And the cake would be given by the management.
</li>
<li>
Company will send out Birthday Greeting Cards to all employees accordingly.
</li>
</ul>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">5.5 Company ID Cards:</h4>
<p>
All employees must receive their ID cards within one month of their working tenure with company.HR will be needing one passport size photograph, current residential address and CNIC number in this regard to process accordingly.
</p>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">5.6 Medical Insurance & Provident Fund or Gratuity:</h4>
<div class="hea">
<p class="text-center">
Under Consideration
</p>
</div>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">5.7 Visiting Cards:</h4>
<p>
The objective of Visiting Cards is to assist Company employees in their business dealings with external clients only (If needed). The eligibility for Visiting Cards per annum for the upper grades of Employees (department heads) in all the departments shall be confirmed and approved by the COO/CEO. Visiting cards will be given to those only, dealing with local external or internal customers
</p>
</div>
<div class="col-md-12">
<h3 class="page-title text-center mt-3">6. OFFICE EQUIPMENT USAGE</h3>
<h4 class="ml-md-5 mb-2">6.1 Stationery Usage:</h4>
<p>
Employees and Team Managers will forward their request of stationery to the department Head by the 10 th/25 th of every month and the department Head will forward it to Administration Department no later than 13 th/27 th of every month. So the Admin can issue the stationary by 01 st and 15 th of every month depending upon the needs.
</p>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">6.2 First Aid Box:</h4>
<ul>
<li>
All emergency medicines (except antibiotics and morphine derivatives) will be available at all times at the HR/Admin desk.
</li>
<li>
Every department Head will have a document regarding usage of medication (case wise), which any member of that department can go and avail.
</li>
<li>
All Department Heads and Team managers will be given CPR and emergency treatment training in every 02 months
</li>
</ul>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">6.3 Office Chairs and Headsets:</h4>
<ul>
<li>
Office Chairs and Headsets are property of AU Telecom and each employee must ensure that the utility of chairs and headsets are completely accounted for by the concerned employee.
</li>
<li>
If an employee feels or observes that the chair, headset or any other equipment is somewhat broken or replaced, the concerned should immediately notify their immediate supervisor, so that appropriate action could be taken.
</li>
<li>
If any of the office equipment is broken or damage accidently it is the responsibility of the employee or their department heads to report on urgent basis to the Admin and there will be no charges for that. In case of any breakage, the assignee will be charged full for either the headset/chair.
</li>
</ul>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">6.4 Cubical Assignment:</h4>
<p>
Each employee will be pre-assigned a cubicle in a proper working order. Details of vacant cubicles shall always be readily available with head of department and shall provide to HR and Admin in timely manner. At that particular point in time, it is the duty and responsibility that the employee should ensure that the PC, Cubicle and related paraphernalia is intact and in working order.
</p>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">6.5 Penalties In-case of Breakage of Equipment’s:</h4>
<ul>
<li>
In this particular clause, there are two scenarios; breakage of AU Telecom’ property (intentionally or unintentionally). If there is damage and the intentions of the employee were clear and not deliberate, then the employee will be given a benefit of doubt, though a thorough investigation will be carried out by a pre-designated panel.
</li>
<li>
However, if the motives of employee were intentional and the investigation leads to prove, then the employee will have to pay depending upon the verdict of the pre-designated panel.
</li>
<li>
It may also result in write-ups or SUSPENSION, in case of intentional loss.
</li>
<li>
If proven that misuse resulting in breakage was deliberate and intentional, the maximum penalty could raise up to 50% of the total damage.
</li>
</ul>
</div>	
<div class="col-md-12">
<h3 class="page-title text-center mt-3">7. COMMUNICATION CHANNELS</h3>
<h4 class="ml-md-5 mb-2">7.1 Introduction:</h4>
<p>
AU Telecom encourages candidates and open two-way communications between
employees at all levels. It believes that effective communication is helpful to build mutual understanding and trust between all employees and higher management, and contributes to a constructive and cheerful working environment, Quality performance and organizational success.
</p>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">7.2 Hierarchy:</h4>
<ul>
<li>
All employees are required to support the communication perspectives implemented by AU Telecom.
</li>
<li>
It is mandatory for all to first contact their team manager for any/all the issues, if there is no response, individual have the right to go to their department heads directly.
</li>
<li>
It is recommended that HOD’s first communicate among each other on any issue without involving the core members.
</li>
<li>
In-case if the department head is not giving the appropriate response the issue is supposed to report to HR Department.
</li>
<li>
All the employees have the right to contact any available Core Team member but they have to keep their department manager in loop and this option can only be used as last option.
</li>
<li>
Employees must follow the rules for communicating other departments through proper channel keeping their immediate manager in loop.
</li>
<li>
All employees have rights and obligations to express their views to their superiors about AU Telecom activities and vice versa.
</li>
<li>
Suggestions & Views raised by employees should be well respected, will be listened and considered carefully by all the Team Managers, Department Heads and Core Team Members.
</li>
<li>
Questions raised by employees should be attended to by the management in an effective and efficient manner and be treated in strict confidence.
</li>
<li>
There should not be any prejudice against individuals due to differences in opinions.
</li>
<li>
Employees should be well informed of the development and major events of AU Telecom, in particular those that may have an impact on their jobs and/or welfare.
</li>
</ul>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">7.3 Communications via Call:</h4>
<ul>
<li>
In-case any employee wants to communicate with their departments through text, it will be counted as zero and all the conversation become null and void. Only in case of emergency employee can call the concerns.
</li>
<li>
All Employees are required to communicate via Call then make sure that more than one higher management is informed by your suggestions, views or particular action.
</li>
<li>
If an employee will not inform through proper hierarchy then a strict action will be taken against your unprofessional behavior.
</li>
</ul>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">
7.4 Communication via Email:
</h4>
<ul>
<li>
First of all it is the responsibility of the department head to provide the official email accounts to all the employees working under them.
</li>
<li>
All Employees are required to use their official email addresses under AU Telecom.
</li>
<li>
All the employees are allowed to use these email accounts only for official purpose.
</li>
<li>
If an employee sending official email regarding suggestion, view, leaves or any other official task then it will be obligatory for them to send that email to all your concerned management rather than sending individuals.
</li>
<li>
Employee’s email will not be accepted if their concerned higher management is not informed.
</li>
<li>
None of the employees are allowed to configure outlook services without the permission of higher management.
</li>
</ul>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">7.5 Verbal Communication:</h4>
<ul>
<li>
Sometimes, verbal communication can resolve many hidden issues regarding human resource management.
</li>
<li>
Employees can also use the way of verbal communication in order to communicate with other employees to make their point clear and effective.
</li>
<li>
All Employees should talk ethically to their higher management directly about their organizational issues.
</li>
</ul>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">
7.6 Penalties for Improper Communication:
</h4>
<ul>
<li>
Employees are encouraged to discuss their views of AU Telecom with their immediate supervisors, Head of Department, the Human Resources Department and/or the Core Team Members.
</li>
<li>
If employees have followed the improper Communication then penalties will be implemented on them and strict action will be taken against the employee.
</li>
<li>
Penalty can be dependent on the nature of the case or scenario, and may result in write - up, suspensions or the termination from the employment.
</li>
</ul>
</div>
<div class="col-md-12">
<h3 class="page-title text-center mt-3">8. PERFOMANCE EVALUATION POLICY</h3>
<h4 class="ml-md-5 mb-2">8.1 Introduction:</h4>
<p>
AU Telecom is committed to support every employee to reach their potential and achieve their personal goals in line with their job description, which in turn will assist the organization to achieve its objectives.
</p>
<p>
The performance evaluation policy supports the performance evaluation scheme. The scheme is a formal process centered on an annual meeting of each employee and their line manager to discuss
his/her work. The purpose of the meeting is to review the previous evaluated performance achievements and to set objectives for the forthcoming period. These should align individual employees’ goals and objectives with organizational goals and objectives.
</p>
<p>
The Performance Evaluation System shall primarily consist of:
</p>
<ul>
<li>
Annual Performance Planning/ Target Setting latest by second week of January every year.
</li>
<li>
Self-Appraisal & Review by Reporting Officer end of every quarter.
</li>
<li>
Review of employee by the Department Head/ Functional Head at the end of the financial year.
</li>
</ul>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">
8.2 Training and Monitoring:
</h4>
<p>
Department heads are responsible for the appraisal process, and he/she shall ensure that appraisers and appraise person are adequately equipped and trained to undertake the performance appraisal.
</p>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">8.3 Core Principles of the Performance Evaluation Policy:</h4>
<ul class="num">
<li>
The evaluation process aims to improve the effectiveness of the organization by contributing to achieve a well-motivated and competent workforce.
</li>
<li>
Appraisal is an on-going process with an annual formal meeting to review progress.
</li>
<li>
The evaluation discussion is a two way communication exercise to ensure that both the needs of the individual and of the organization are being met, and will be met in the next year.
</li>
<li>
The evaluation discussion will review the previous year’s achievement, and will set an agreed 
Personal Development Plan for the coming year for each member of staff.
</li>
<li>
All directly employed employees who have completed their probationary period are required to participate in the evaluation process.
</li>
<li>
The evaluation process will be used to identify the individual’s development needs and support the objectives of the Training and Development Policy
</li>
<li>
All staff will receive appraisal training as an appraiser, and where appropriate as an appraiser.
</li>
<li>
The evaluation process will provide management with valuable data to assist succession planning.
</li>
<li>
The appraisal process will be a fair and equitable process in line with our Equality Policy.
</li>
</ul>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">8.4 Quarterly Performance Evaluation:</h4>
<p>
Performance evaluation discussions will be held over a designated 2-week period on a quarterly basis. They will be arranged by the appraiser’s line manager along one representative from HR Department preferably HR Head. In this way there will be 4 –evaluations in a year and best 3 would be considered and counted in final employee appraisals on yearly basis.
</p>
<p>
The discussion will be held in private. Information shared during the appraisal will be shared only with senior management. The exception is training needs, which will be provided to the HR / administration for action. Confidentiality of evaluation will be respected.
</p>
<p>
The evaluator (usually the employee’s line manager) will be expected to have successfully completed appraiser training, and to be familiar with the appraiser’s work.
</p>
<p>
All evaluation documents should be issued to both parties prior to the discussion, in order to allow time for both parties to reflect and prepare. These will provide a framework and focus for the discussion.
</p>
<p>
A time and venue for the discussion will be advised at least one week before the meeting takes place.
</p>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">8.5 Final Confirmation after Probation Period:</h4>
<p>
After three months’ of probation from the date of joining, the employee will be issued a final confirmation letter, depending upon the feedback and comments of the line manager. In this regard, HR will forward a confirmation sheet to the line manager, two day prior to the end of the probation period.
The line manager after assessing and formal discussion with the employee will forward the confirmation sheet to the HR.
</p>
<p>
In addition to the above-mentioned process, there will be three options, which the line manager, if deem necessary will provide on the confirmation sheet, which are:
</p>
<ul>
<li>
Confirmed
</li>
<li>
Extend confirmation for one month
</li>
<li>
Extend confirmation for two to three months
</li>
</ul>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">8.6 Promotions:</h4>
<p>
The promotion policy is based on the recognition that in the course of meeting institutional objectives, the duties and functions of an employee may change in complexity and responsibility. Promotions therefore, are based on status changes that involve increasing responsibility levels (if needed). Also depends and may be the added benefits of promotion serve as an incentive for better work performance, enhance morale and create a sense of individual achievement and recognition. Promotions will be purely on merit basis and as per the past performance record where salary raises is not promise- able. Senior Managers promotions will be confirmed after final approval from Higher Management.
</p>
</div>
<div class="col-md-12">
<h3 class="page-title text-center mt-3">9. PERFORMANCE APPRAISAL POLICY</h3>
<h4 class="ml-md-5 mb-2">
9.1 Introduction
</h4>
<p>
The reason for doing this appraisal is not only to integrate growth opportunities, motivate employees for better performance and ensure continuity in promotions. It is also important for the employee to understand that at what point he is standing right now with the organization.
</p>
<p>
Employees must have to understand that appraisal does not only mean the salary raise. It can be for promotions or either to give more responsibilities to the individual to monitor his/her skill set and pressure handling.
</p>
<p>
If there is a change in salary amount or raise, so operations should inform HR and finance before the 15 th of every month, else that appraisal will be considered in next month’s pay-roll.
</p>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">9.2 Core Principles of the Appraisal Policy:</h4>
<ul>
<li>
Appraisals will be held on Annual Basis from 5% to 10 % from Minimum Point to Mid-Point salary range mentioned in the salary structure accordingly.
</li>
<li>
The Max –Point mentioned in the salary structure will be for start performance and will cap the position .The raise in percentage in this regard will vary from 8%-10% Max .
</li>
<li>
There will be 4 evaluations in one year for each respective employee after every three months in 12 months, out of 4 best three Performance evaluations will be considered and ads on value towards the annual appraisal.
</li>
<li>
Annuals Appraisals must be in adherence to defined salary structure of company for operations and Technical Resources.
</li>
<li>
Appraisal form should be given to the department head on the basis of request received from COO.
</li>
<li>
The employee and the department head should sit together and discuss it first and then fill the form.
</li>
<li>
The appraisal form is not just the form it shows the attitude, performance and skill set of the employee according to him/her- self and according to his/her department head.
</li>
</ul>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">9.3 The Appraisal Discussion:</h4>
<p>
The appraisal discussion should be in a way that the employee understands the good and bad points about him/her, also carries the positive impact on his/her performance for future.
</p>

</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">9.4 Final Confirmation:</h4>
<p>
Once the form is filled by both the parties’ employee and Department head it comes to HR and HR will sit with COO and discuss, if COO agrees with the comments or evaluation done by department head he will sign the form and confirm HR about the raise amount or promotion. HR will submit that form to Finance with all the necessary signatures on it.
</p>
</div>
<div class="col-md-12">
<h4 class="ml-md-5 mb-2">9.5 Performance Appraisal and Personal Development Policy:</h4>
<p>
Department heads are supposed to provide the development plan for the individual in order to confirm that he/she is eligible for the appraisal or promotion. If department head want, so he
can avail the services from training manager to maintain the development plan.
</p>
</div>
<div class="col-md-12">
<h3 class="page-title text-center mt-3 mb-3">10. REWARDS AND RECOGNITION</h3>
<p>
In AU Telecom, Every employee will be rewarded according to his/her performance. A strong link requires maximum effectiveness in planning, leading, and reviewing individual performance. Reward is based on merit. High performers are given priority to take up more responsible positions.
</p>
<h4 class="ml-md-5 mb-2">10.1 Appreciation Certificates:</h4>
<p>
AU Telecom will provide Appreciation Certificates for employees at the end of every month. Appreciation Certificate will be given on criteria of performance throughout the month or some efforts done for the organization by going an extra mile. Department heads will provide the names to HR after concerning with COO by the 01 st of every month and HR will issue the certificates to the department heads as they will distribute it among their teams.
</p>
<h4 class="ml-md-5 mb-2">10.2 Monthly Performance Certificates:</h4>
<p>
Every employee is required to work hard to get the performance Certificate every quarter that can be asset to your career development. These certificates would be based on the highest achievement in the team.
</p>
<h4 class="ml-md-5 mb-2">10.3 Monthly Cash Incentives:</h4>
<ul>
<li>
Monthly Cash Incentives (depending on the task).
</li>
<li>
Incentives and Bonuses according to Job Rank. (Variable).
</li>
<li>
Weekly cash incentives for the overall teams (depending on the task)
</li>
</ul>
</div>
<div class="col-md-12">
<h3 class="page-title text-center mt-3 mb-3">11. CAREER GROWTH WITH ORGANIZTION</h3>
<h4 class="ml-md-5 mb-2">11.1 Promotion within Department:</h4>
<p>
The promotion policy is based on the recognition that in the course of meeting institutional objectives, the duties and functions of an employee may change in complexity and responsibility. Promotions therefore, are based on status changes that involve increasing responsibility levels. The added benefits of promotion serve as an incentive for better work performance, enhance morale and create a sense of individual achievement and recognition. Promotions within the company and department will be 100% on performance basis and on merit.
</p>
<h4 class="ml-md-5 mb-2">11.2 Internal Vacancies Policy:</h4>
<p>
If there is a vacancy available in any of the departments, prior to advertising and recruiting from outside the organization, an existing permanent employee of the company may apply internally to HR. However, the transfer will only be allowed with the consensus of the line managers of both the departments.
</p>
</div>
<div class="col-md-12">
<h3 class="page-title text-center mt-3 mb-3">12. EQUALITY POLICY</h3>
<h4 class="ml-md-5 mb-2">12.1 Introduction:</h4>
<p>
AU Telecom has been committed to equality of opportunity and to create and sustain an environment that values and appreciate the diversity of staff and consequence of principle of equality of opportunity in which was preserved in AU Telecom. It is to developing and maintaining an organization where all employees from all backgrounds can thrive, and so we recognize the importance of taking a proactive stance in creating equality of opportunity.
</p>
<h4 class="ml-md-5 mb-2">12.2 Responsibilities of Management:</h4>
<p>
Higher management is committed to the development and the implementation of a Management System which ensures Quality without negatively impacting the Environment. Management system is committed to the continuous improvement by;
</p>
<ul>
<li>
Ensuring the establishment of both Environmental and Quality Policies and Objectives.
</li>
<li>
Management Reviews must be considered at least once a year to review our Management System and the effectiveness of implemented Management System.
</li>
<li>
Ensuring the availability of resources for office requirements.
</li>
<li>
The core concern of the management to carry out to meet the general and In-general requirements.
</li>
<li>
Ensuring that overtime work is only performed when necessary. Perpetual or regular overtime is considered inappropriate. Management should review the circumstances and reasons leading to regular overtime and should notice to alleviate the situation.
</li>
<li>
Ensure all processes and criteria are implemented to the Management System, correctly maintained and established.
</li>
<li>
Reporting to the higher management for monitoring and reviewing the Management System for improvement.
</li>
<li>
Ensuring the awareness of customer requirements and workflow throughout the organization.
</li>
<li>
Higher Management needs to review the organization's Management system to ensure its effectiveness, suitability and adequacy.
</li>
<li>
Being appropriate to the organization’s objectives rather than attempting some unrelated and unwanted activities in organization’s premises.
</li>
<li>
Ensuring the safety and security of employees and the facilities in AU Telecom. Only authorized visitors are allowed in the work areas of the buildings. Restricting unauthorized visitors helps maintain safety standards, protects against theft, ensures security of equipment, protects confidential information, safeguards employee welfare, and avoids potential distractions.
</li>
</ul>
<h4 class="ml-md-5 mb-3">12.3 Responsibilities of Staff:</h4>
<p>
In order for Conveniences to run Department effectively, each employee must contribute to our success. To ensure this, Utilities expects each employee;
</p>
<ul>
<li>
Responsible for safeguard the company property being used by them from damage and loss.
</li>
<li>
Should be aware of the IT security standards and guidelines established and communicated by Information Technology Division, especially those relevant to their daily work on PC and various computer application systems.
</li>
<li>
Required to use co-operate email addresses rather than their personal.
</li>
<li>
Must aware of what is said in the e-mail by higher management. Improper statements may expose the employee and the Company to liabilities and result in disciplinary action being taken against the employee.
</li>
<li>
E-mails will be treated as a formal communication and analyzed thoroughly when there are challenges. They should be careful in the wordings when communicating via e-mail.
</li>
<li>
Must avoid sending confidential or sensitive message through e-mail.
</li>
<li>
Must use public internet and the corporate internet should be used for Job purposes and in a manner that is consistent with AU Telecom’s standards of research & development conduct.
</li>
<li>
Know the standards of work performance for their job. These requirements will be explained by the supervisor. They include accepting responsibility for timely and accurate completion of assigned tasks and assisting a co-worker when needed.
</li>
<li>
Must not bring in any illegal/unauthorized software and/or hardware.
</li>
<li>
Must not install or attach any special PC software/hardware for testing or evaluation purposes without obtaining prior approval from their senior management in writing.
</li>
<li>
Must not make unauthorized copies of AU Telecom’s software by whatever means.
</li>
<li>
Should have responsibility for protecting and maintaining integrity of AU Telecom’s information and data resided on their desktop PCs.
</li>
<li>
Should ensure that their passwords are confidential and not known to others
</li>
<li>
Should activate a screen saver with password protection when he/she is away from the machine for a long time (more than 15 minutes).
</li>
<li>
Should report for your daily work at the end of the day to you manager or supervisor.
</li>
<li>
Guidelines of using Internet in Office:
</li>
<li>
Employees are not allowed to display, download or distribute defamatory, discriminatory, offensive, abusive or obscene materials.
</li>
<li>
AU Telecom’s Internet access must not be utilized to communicate information that may infringe any intellectual property rights or violate the terms of any applicable laws or regulatory requirements.
</li>
<li>
Visiting inappropriate or unlawful web sites and chat rooms are strictly prohibited.
</li>
</ul>
<h4 class="ml-md-5 mb-3">12.4 Related Policies and Arrangements:</h4>
<ul>
<li>
The arrangement must be advantageous and cost effective for the management/board compared to other possible arrangements.
</li>
<li>
The arrangement shall comply with any guidelines issued by higher authorities
</li>
<li>
The AU Telecom provides flexible working arrangements in order to attract and retain staff members, to provide flexibility in meeting business needs, and to assist staff members in managing their work and personal responsibilities.
</li>
<li>
Working hour’s arrangements are designed to allow work to meet work flow and business needs in an easiest way.
</li>
<li>
Staff members cannot request a change in their employment fraction like full-time and part- time.
</li>
<li>
There can be possible arrangements for employees for those who want to reduce their working hours for a day but they must ensure that their work and performance will not be affected.
</li>
</ul>
<h4 class="ml-md-5 mb-3">12.5 Employee Right:</h4>
<p>
All employees have a right to work in an environment free from mistreatment intended to demean, abusive or harass. The AU Telecom prohibits mistreatment of its employees by supervisors, administrators, faculty, and coworkers.
</p>
<ul>
<li>
Employees violating this policy are subject to disciplinary action ranging from a written warning to termination of employment depending on the serious attitude of the offense.
</li>
<li>
Employees should first attempt to resolve problems involving exploitation within their own areas by meeting with the appropriate administrator, who can effectively determine and take action.
</li>
<li>
If an employee does not feel comfortable in contacting the administrator(s), the employee may contact the management team who will meet with the employee and then initiate an appropriate informal process to determine the nature of the problem.
</li>
</ul>
<h4 class="ml-md-5 mb-3">12.6 Equality Policy:</h4>
<ul>
<li>
Our workforce will be truly representative of all sections of society and each employee feels respected and able to give of their best.
</li>
<li>
All employees of all shifts whether full-time or part-time (free-lance), will be treated fairly and with respect. Selection for employment, promotion, training or any other benefit will be on the basis of skills and ability.
</li>
<li>
Regular briefing and training sessions will be held for staff on equality issues by the trained management. These will be repeated as necessary.
</li>
<li>
Training will be provided for managers on this policy and the associated arrangements. All managers who have an involvement in the recruitment and selection process will receive specialist training.
</li>
</ul>
<h4 class="ml-md-5 mb-3">12.7 Monitoring:</h4>
<ul>
<li>
Monitoring system will be introduced to measure the effectiveness of the policy and arrangements within organization.
</li>
<li>
The system will involve the routine collection and analysis of information on employees by gender, marital status, racial origin, sexual orientation, religion, beliefs and grade. Monitoring of disable employees will be maintained as well. There will be a confidential team to monitor the activities of all employees within Organization premises.
</li>
<li>
Regular assessments to measure which recruitment to first appointment, internal promotion and access to training and development opportunities affect equal opportunities for all groups.
</li>
<li>
If monitoring results are showing that the Company is not representative, or that sections of our workforce are not progressing properly within the Company, then an action will be planned to resolve these issues. This will include selection procedures and a review of recruitment, Organization policies and practices.
</li>
</ul>
<h4 class="ml-md-5 mb-2">12.8 Grievance:</h4>
<p>
AU Telecom’s policy for the Grievance for employees should:
</p>
<ul>
<li>
Be provided an ethical treatment on their grievances by the management of the Company;
</li>
<li>
Have the right to appeal to the COO against a decision made by other members of higher management.
</li>
<li>
Have the right to channel their grievances to the higher management or CEO and in the case of grievances against the COO to the CEO.
</li>
</ul>
<h4 class="ml-md-5 mb-2">12.9 Review:</h4>
<p>
AU Telecom will review all our employment practices quarterly and procedures to ensure impartiality.
</p>
</div>
<div class="col-md-12">
<h3 class="page-title text-center mt-3 mb-3">13. DATA SECURITY POLICY</h3>
<h4 class="ml-md-5 mb-3">13.1 Introduction:</h4>
<p>
AU Telecom processes the personal data of individuals such as its all employees and customers. This processing is regulated by the Data security policy.
</p>
<h4 class="ml-md-5 mb-2">13.2 Software & Internet Usage:</h4>
<ul>
<li>
Employees are not allowed to display, download or distribute defamatory, discriminatory, offensive, abusive or obscene materials.
</li>
<li>
AU Telecom’s Internet access must not be utilized to communicate information that may interfere with any intellectual property rights or violation of any applicable laws or regulatory requirements.
</li>
<li>
Visiting inappropriate or unlawful web sites and chat rooms are strictly prohibited in AU Telecom.
</li>
<li>
Employees are not allowed to use their personal profiles for official tasks and emails. Do not use the AU Telecom licensed software for your personal use.
</li>
</ul>
<h4 class="ml-md-5 mb-3">13.3 Data Security:</h4>
<p>
It is the duty of data controllers, such as AU Telecom to comply with the data protection principles with respect to personal data. This policy describes how AU Telecom will assign and manage its duties in order to ensure continuing compliance and the data security rules and rights of data in particular. It is also the responsibility of an employee to keep confidential the personal data and secret information of the intended organization. If any employee is found to leak the confidential information of the organization then a serious action will be taken against him immediately.
</p>
<h4 class="ml-md-5 mb-3">13.4 Personal Laptops or Computer Usage:</h4>
<p>
Employees cannot use and bring their personal machines in office. Like laptops, USB or iPads etc. Unethical to the PC usage policies and standards may result in disciplinary action such as rebuke, warning, suspension or summary dismissal as circumstances. 
</p>
<h4 class="ml-md-5 mb-2">13.5 Privacy Clause:</h4>
<p>
AU Telecom will collect the relevant personal data with organizational standards of their all employees only for lawful purposes. We are responsible for privacy and personal data protection.
</p>
<ul>
<li>
Each employee must be notified about the individual concern when it collects personal information at the time of collection.
</li>
<li>
Privacy Policy aims to safeguard the privacy of individual’s personal data provides the individual with rights of access to personal information held by others. Personal information or any chunk of data will only be used for the purpose for which they are collected or for a directly relevant purpose.
</li>
<li>
For Staff evaluation; personal data gathering for the purpose of staff evaluation are exempt from data access requests until the process is completed.
</li>
<li>
The Personal Data will be kept confidential of AU Telecom’s employees except we can share your information to:
<ul class="dot">
<li>
Associate offices, company, any agent, contactor, third party and service providers who provide any kind of services to our organization;
</li>
<li>
Any other organization that provide benefits to our employees, coworkers and administrators.
</li>
</ul>
</li>
</ul>
<h4 class="ml-md-5 mb-2">13.6 Monitoring:</h4>
<p>
Data owners establishing and monitoring measures, in accordance with this data security policy, to protect any holdings of personal data for which they are responsible.
</p>
<p>
This is sometimes obligatory for AU Telecom to monitor communications and information. This may include personal data. There may be circumstances of sharing and monitoring your personal data within the organization.
</p>
<h4 class="ml-md-5 mb-2">13.7 Penalties for Improper Usage:</h4>
<p>
Improper usage and violation of procedures and Policies by AU Telecom, a serious disciplinary action will be taken against the intended employee.
</p>
<p>
Suspension termination and legal actions in court will be processed depending upon the seriousness of matters and the level of unethical act.
</p>

</div>
<div class="col-md-12">
<h3 class="page-title text-center mt-3 mb-3">14. DISCLIPINARY PROCEDURE</h3>
<p>
AU Telecom is concerned to the violation of any of its policy or rule can subject to an employee to disciplinary action. Disciplinary procedure can be taken for any failure in job, crime, physical abuse, mentally abuse, continuous unethical behavior, violation of drug alcohol, weapon possession and Insubordination.
</p>
<h4 class="ml-md-5 mb-2">14.1 Code of Conduct:</h4>
<p>
AU Telecom believes in professionalism, high ethical standards, integrity and honesty so the employees are crucial for any organization in maintaining and pursuing its standards of rules and regulations. The basic purpose of this Code of conduct is to set down the employees' legal obligations while under the employment of AU Telecom. This Code also provides guidelines to assist employees in understanding and complying with such obligations.
</p>
<ul>
<li>
Employees must conform to all the requirements in this Code of conduct in addition to the terms and conditions of employment written in their contracts of employment. If any inconsistency and disobedience exists, this Code shall triumph. The employees who are involved in infringe of any provision of this Code may be subject to dismissal.
</li>
<li>
Employees who have any queries and doubts about any provision specified in this particular Code should consult the Human Resources Department / COO. Employees must be devoted to their work with extreme dedication, enthusiasm and professionalism.
</li>
</ul>
<h4 class="ml-md-5 mb-2">14.2 Counseling:</h4>
<p>
Counseling is basically to provide a professional and confidential setting for the psychological, emotional, and developmental support of employees as they pursue official goals and explore personal growth, and act confidently to all the staff and Management.
</p>
<ul>
<li>
AU Telecom’s objectives for Counseling Services are to establish their employees for each and every aspect. We want to promote the psychological, emotional wellbeing, physical of our Employees and to enhance employees’ career and personal development.
</li>
<li>
Counseling does not reflect that employee will be terminated .if needed then employee will get 15-days prior notice before his/her release or termination in worse situations.
</li>
</ul>
<h4 class="ml-md-5 mb-3">14.3 Harassment Policy:</h4>
<p>
Victimization or Harassment of a genuine will be treated as gross misconduct, which if proven right, results may be a dismissal of particular employee.
</p>
<ul>
<li>
The application of the harassment policy aims to eliminate discrimination and harassment in employment for age, sex, marital status, pregnancy, family status, disability, race, color, descent, national or ethnic origins, nationality or religion.
</li>
<li>
Anyone in the workplace or in vans might commit this type of harassment .A management official, co-worker, non-employee such as a contractor, vendor or guest. The victim can be
anyone affected by the conduct, not just the individual at whom the offensive conduct is directed. We all have to give respect to every male & specially the females. AU Telecom want to retain the strength of the females up to 33%. The policy is made & everyone has to follow the policy. In any case of harassment proven, straight termination will be done by higher management.w
</li>
<li>
Following would be considered harassment in the premises of AU Telecom. (If we find anybody involve in these kinds of activities, that individual would be terminated then & there)
</li>
</ul>
<h5 class="ml-md-5 mb-2">14.3.1 Physical Harassment:</h5>
<ul>
<li>
Pulling leg (Making fun of them)
</li>
<li>
Leering, i.e., staring in a sexually suggestive manner
</li>
<li>
Making offensive remarks about looks, clothing, body parts
</li>
<li>
Touching in a way that may make an employee feel uncomfortable, such as patting, pinching or intentional brushing against another’s body
</li>
<li>
Telling sexual or lewd jokes, keeping sexual pictures, making sexual gestures, etc.
</li>
<li>
Sending, forwarding or soliciting sexually suggestive letters, notes, emails, or images
</li>
</ul>
<h5 class="ml-md-5 mb-2">14.3.2 Emotional Harassment:</h5>
<p>
Nobody is allowed to do any kind of emotional harassment in the working environment such as
</p>
<ul>
<li>
Comments about an individual’s skin color or other racial/ethnic characteristics.
</li>
<li>
Making disparaging remarks about an individual’s gender that are not sexual in nature.
</li>
<li>
Negative comments about an employee’s religious beliefs (or lack of religious beliefs).
</li>
<li>
Expressing negative stereotypes regarding an employee’s birthplace or ancestry.
</li>
<li>
Derogatory or intimidating references to an employee’s mental or physical impairment.
</li>
</ul>
<h4 class="ml-md-5 mb-3">14.4 Hostile Work Environment Policy:</h4>
<p>
Hostile work environment policy harassment is where speech or conduct is severe or persistent to create a hostile or abusive work environment. Examples of inappropriate conduct of a sexual nature include sexually oriented jokes, sexually explicit e-mail, screen savers, posters, cartoons, and unwanted verbal and physical contact.
</p>
<p>
If employees’ involvements in such activities are proven, then suspensions and terminations can be acted by the HR and COO directly.
</p>
<h4 class="ml-md-5 mb-3">14.5 Taking Drugs and Alcohol</h4>
<p>
We acknowledge that drugs and alcohol in the workplace is strictly prohibited. AU Telecom have a strict plan against the unlawful acts and decided the straight termination for individual who found drugs and alcohol addicted. There is a guideline for employees and coworkers about the harms and effects of drugs and alcoholic beverages.
</p>
<p>
Drug and alcohol usage can affect a person’s ability to work safely. It creates a risk and problems to personal and workplace environment and safety.
</p>
<h4 class="ml-md-5 mb-3">14.6 Mis-Commitment with Management:</h4>
<p>
Successful organizational environment requires management and employee commitment to each other, effective Interaction and accurate requirements of resources and a high level of employee participation is required.
</p>
<ul>
<li>
For Safety and healthy office environment and Management System to be effective, management must show leadership and commitment for every task and program.
</li>
<li>
An employee commitment is necessary for the taking care of the safety of management especially while they are communicating to the lower management to higher management.
</li>
<li>
Your statements regarding work must be consistent and accurate. Miss-commitment will be considered in carelessness and imprecision.
</li>
</ul>
<h4 class="ml-md-5 mb-3">14.7 Using Lewd Language:</h4>
<p>
This is an excellent act not to use foul language or swearing at all as it can help to avoid the risk of being embarrassed in workplace. Foul language is prohibited in workplaces but, it also can create harassment issues if the swearing is particularly to the gender like women. AU Telecom environment allow you to use the ethical language to communicate to other employees, coworkers, contractors and management to fulfill the professional requirements.
</p>
<h4 class="ml-md-5 mb-3">14.8 Mis-behave with Colleagues or Management:</h4>
<p>
Your behavior during working hours or outside the office must be polite and calm to all the other colleagues and management. All employees are expected to behave in an orderly and responsible manner at all times. Appreciation will be given to maintain the consistent gracious behavior.
</p>
<p>
It is strictly disallow to shout at your colleagues and management and often same rule is implemented for the management. Misbehave with junior or senior member could lead to straight terminations of both parties after detail investigations carry forward by HR Department.
</p>
<h4 class="ml-md-5 mb-3">14.9 Issuance of Warning Letter:</h4>
<p>
A warning letter can be about the correspondence that notifies the unethical behavior and violation of terms and conditions discussed in employment policy or for not meeting the targets. The purpose of warning letter is to warn an employee for continuous and regular violations of the AU Telecom provisions of the Workers Compensation.
</p>
<ul>
<li>
When an administrative penalty could be imposed, higher management may issue a warning letter according to circumstances.
</li>
<li>
The warning letter issuance policy is that a warning letter may be issued when multiple penalties concluded by management. Otherwise warning letters themselves cannot be appealed or reviewed. However, the decision not to impose an administrative penalty can be reviewed.
</li>
</ul>
<h4 class="ml-md-5 mb-2">14.10 Suspension from the Services:</h4>
<p>
Suspension is a strict action by AU Telecom that temporarily prevention of something from continuing any job services. An employee can be suspended by the following situations:
</p>
<ul>
<li>
AU Telecom can suspend an employee at any time, if he/she failed to comply with the terms and conditions by the policy manual.
</li>
<li>
Minimum suspension time period will be 1 day of your services and it can exceed up to 15 days.
</li>
<li>
The time period and manner of the suspension will depend on the depth of the misconduct and action.
</li>
<li>
Managers and supervisors have the authority to report or recommend to the COO for 
suspension time period according to its severity.
</li>
</ul>
<p>
<b>NOTE:</b> In case of 3 warning and suspensions in consecutive 3-months would lead to further harsh actions against the respective employee which could lead to termination also.
</p>
<h4 class="ml-md-5 mb-3">
14.11 Appeal:
</h4>
<p>
Each employee can appeal to CEO, COO or to the HR Head of the organization for any misconduct of other coworker to take action against him/her.
</p>
<p>
Action appeal committee will be responsible to respond to any written discrimination and harassment grievance appeal in a timely manner and to review the issues being appealed.
</p>
</div>
<div class="col-md-12">
<h3 class="page-title text-center mt-3 mb-4">
15. FINAL SETTLEMENT PROCESS
</h3>
<p>
<b>Note: AU Telecom does not re-hire any terminated employee again</b>
</p>
<h4 class="ml-md-5 mb-3">15.1 Releases from Service:</h4>
<p>
In case of downsizing of any project or over staffed AU Telecom holds the right to release any employee or department head with one week notice.
</p>
<h4 class="ml-md-5 mb-2">15.2 Resignation:</h4>
<ul>
<li>
An employee who wishes to resign from the services of the Company will be required to give the notice of resignation with one month notice period. If the person is still under probationary tenure he/she still has to serve 15 days’ notice.
</li>
<li>
When the resignation has been accepted by Department Head, but requires final discussions with the Resigned Employee, HR shall undertake the Final Talks.
</li>
<li>
Resignation Acceptance Letter shall indicate the date of relieving and advising him or her to return and handover the Company properties or document(s) if any.
</li>
</ul>
<h4 class="ml-md-5 mb-3">15.3 Termination:</h4>
<ul>
<li>
AU Telecom holds the right to terminate any employee or department head without any prior notice. But a detail reason will be brief to him/her through HR.
</li>
<li>
In case of Termination due to any disciplinary action, the concerned Employee is relieved on the very same day. All the following are processes undertaken after the final exit interview.
<ul class="dot">
<li>
Full & Final Settlement dues cleared
</li>
<li>
Full & Final Settlement cheque hand over
</li>
</ul>
</li>
</ul>
<p>
<b> NOTE:</b> All the Notices as per applicable Standing Orders shall be sent in the name of the concerned Employee through the HR head.
</p>
<h4 class="ml-md-5 mb-3">15.4 Exit Interview Process:</h4>
<ul>
<li>
All the employees must have to go through with the exit interview process before any final confirmation of resignation, termination and releasing from the services.
</li>
<li>
Exit interview will be conducted by the HR officer in person.
</li>
<li>
In-case if any employee won’t show-up for the exit interview, all the dues will be put on hold by AU Telecom. Until the exit interview process is done.
</li>
<li>
All leaving employees will submit Medical Insurance cards / Forms and ID-Cards back to HR department before the last working day.
</li>
</ul>
<h4 class="ml-md-5 mb-3" >15.5 Full and Final Settlement:</h4>
<p>
For processing Full & Final Settlement, following aspects are thoroughly checked & calculated
</p>
<ul>
<li>
Accumulated Leave as on date for calculating Leave Encashment
</li>
<li>
Information in No Dues Clearance Form for any Loan Recovery or Salary Payable.
</li>
<li>
n case, an Employee wants to be relieved early before completion of his or her specified Notice Period, Notice Pay is recovered from his or her Settlement Amount. Other than that all legal dues as per the normal resignations are given to the Employee.
</li>
<li>
Final settlement cheque will be issued after 45 days of receiving a clearance certificate signed by all concerns (Note: As mentioned in Salary Policy)
</li>
</ul>
<h4 class="ml-md-5 mb-3">15.6 Amnesty Policy:</h4>
<p>
As being a human we all do some mistakes several times, and as per our culture we believe in human potential.
</p>
<ul class="roman">
<li>
AU Telecom will give all resigned employees for any reason an opportunity to join the team back.
</li>
<li>
Terminated on the basis of performance employees will also get this opportunity only on a condition if not found guilty or convicted in violation of company policy and procedures includes, fraudulence policy, Harassment policy, Hostile working environment policy and so forth.
</li>
<li>
The final word of approval on any re-hiring will be given by CEO, COO, HR Head (AU Telecom) only.
</li>
</ul>
<h4 class="ml-md-5 mb-3">15.7 Retirement Policy:</h4>
<ul>
<li>
The retirement age of any employee up to CEO (excluding Core team members) from the services is 50 years of age.
</li>
<li>
Cases of existing employees over the age of superannuation shall be dealt with case-to-case basis.
</li>
<li>
The management may at its sole discretion grant annual extension beyond the age of superannuation in case of the company desires to avail the services of the retired employee. Alternatively he can be engaged on annual contract basis either on per diem allowance or fixed monthly remuneration on mutually agreed terms and conditions. The person will not be entitled to any long-term benefits.
</li>
</ul>
<p>
HR will inform to the concerned retiring employee three months in advance through respective Reporting department head.
</p>
</div>



	
</div>			
</div>
@endsection