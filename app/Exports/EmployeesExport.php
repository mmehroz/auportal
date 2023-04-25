<?php

namespace App\Exports;

use App\Exports\EmployeesExport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

use DB;

class EmployeesExport implements FromCollection, WithHeadings,ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    public function collection()
    {

			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->select('jobapplicant.*','hrm_login.*','hrm_Department.*')
			->get();


				foreach($task as $arraydatas){


					$data[] = array(
						'jobapplicant_id' => $arraydatas->jobapplicant_id,
						'jobapplicant_name' => $arraydatas->jobapplicant_name,
						'jobapplicant_fname' => $arraydatas->jobapplicant_fname,
						'jobapplicant_gender' => $arraydatas->jobapplicant_gender,
						'jobapplicant_address' => $arraydatas->jobapplicant_address,
						'jobapplicant_addresstemporaray' => $arraydatas->jobapplicant_addresstemporaray,
						'jobapplicant_contact' => $arraydatas->jobapplicant_contact,
						'jobapplicant_officeno' => $arraydatas->jobapplicant_officeno,
						'jobapplicant_dob' => $arraydatas->jobapplicant_dob,
						'jobapplicant_age' => $arraydatas->jobapplicant_age,
						'jobapplicant_placeob' => $arraydatas->jobapplicant_placeob,
						'jobapplicant_cnic' => $arraydatas->jobapplicant_cnic,
						'log_email' => $arraydatas->log_email,
						'jobapplicant_reference' => $arraydatas->jobapplicant_reference,
						'jobapplicant_nationality' => $arraydatas->jobapplicant_nationality,
						'jobapplicant_religion' => $arraydatas->jobapplicant_religion,
						'jobapplicant_martialstatus' => $arraydatas->jobapplicant_martialstatus,
						'jobapplicant_occupation' => $arraydatas->jobapplicant_occupation,
						'jobapplicant_postionapppliedform' => $arraydatas->jobapplicant_postionapppliedform,
						'jobapplicant_careerlevel' => $arraydatas->jobapplicant_careerlevel,
						'jobapplicant_department' => $arraydatas->jobapplicant_department,
						'jobapplicant_currentsalary' => $arraydatas->jobapplicant_currentsalary,
						'jobapplicant_monthlyexpectedsalary' => $arraydatas->jobapplicant_monthlyexpectedsalary,
						'jobapplicant_negotiablesalary' => $arraydatas->jobapplicant_negotiablesalary,
						'jobapplicant_reasonofleave' => $arraydatas->jobapplicant_reasonofleave,
						'jobapplicant_remarksofleave' => $arraydatas->jobapplicant_remarksofleave,
						'jobapplicant_nightshift' => $arraydatas->jobapplicant_nightshift,
						'jobapplicant_communicationskills' => $arraydatas->jobapplicant_communicationskills,
						'jobapplicant_periodjoining' => $arraydatas->jobapplicant_periodjoining,
						'jobapplicant_careerlevel' => $arraydatas->jobapplicant_careerlevel,
						'jobapplicant_edu_sno' => $arraydatas->jobapplicant_edu_sno,
						'jobapplicant_edu_cerdeg' => $arraydatas->jobapplicant_edu_cerdeg,
						'jobapplicant_edu_year' => $arraydatas->jobapplicant_edu_year,
						'jobapplicant_edu_regpri' => $arraydatas->jobapplicant_edu_regpri,
						'jobapplicant_edu_majsub' => $arraydatas->jobapplicant_edu_majsub,
						'jobapplicant_edu_divgra' => $arraydatas->jobapplicant_edu_divgra,
						'jobapplicant_edu_institute' => $arraydatas->jobapplicant_edu_institute,
						'jobapplicant_empreport_sno' => $arraydatas->jobapplicant_empreport_sno,
						'jobapplicant_empreport_org' => $arraydatas->jobapplicant_empreport_org,
						'jobapplicant_empreport_perfrom' => $arraydatas->jobapplicant_empreport_perfrom,
						'jobapplicant_empreport_perto' => $arraydatas->jobapplicant_empreport_perto,
						'jobapplicant_posstart' => $arraydatas->jobapplicant_posstart,
						'jobapplicant_last' => $arraydatas->jobapplicant_last,
						'jobapplicant_grossalarystart' => $arraydatas->jobapplicant_grossalarystart,
						'jobapplicant_grossalarylast' => $arraydatas->jobapplicant_grossalarylast,
						'jobapplicant_reasoleave' => $arraydatas->jobapplicant_reasoleave,

					);
					
				}

			// dd($task)
	
            
            return collect($data);

    }

    public function headings(): array
    {
			return [
				'Applicant ID',
				'Name',
				'FATHER/HUSBAND Name',
				'Gender',
				'ADDRESS (Permanent)',
				'ADDRESS (Temporary)',
				'MOBILE #',
				'RES/OFFICE #',
				'DATE OF BIRTH',
				'AGE',
				'PLACE OF BIRTH',
				'N.I.C NO',
				'EMAIL',
				'Reference',
				'NATIONALITY',
				'RELIGION',
				'MARITAL STATUS',
				'OCCUPATION',
                'Position Applied For',
                'Career Level',
                'Department',
                'Current  Salary RS',
                'Monthly Expected Salary RS',
                'Condition',
                'Reason To Left Last Job',
                'Current Benefits',
                'Agreed for Night Shift',
                'Communication Skills',
                'Period Required For Joining',
                'EDUCATIONAL S.NO',
				'CERTIFICATE/DEGREE',
				'Year',
				'REGULAR',
				'MAJOR SUBJECTS',
				'DIVISION/GRADE',
				'NAME OF INSTITUTION',
				'EMPLOYMENT S.NO',
				'NAME OF ORGANIZATION',
				'PERIOD FROM',
				'PERIOD TO',
				'POSITION START',
				'POSITION LAST',
				'GROSS SALARY START',
				'GROSS SALARY LAST',
				'REASON(S) FOR LEAVING',
           
            ];

    }

    	/**
	     * @return array
	     */
	    public function registerEvents(): array
	    {
	        return [
	            AfterSheet::class    => function(AfterSheet $event) {
	                $cellRange = 'A1:AS1'; // All headers
	                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Bodoni MT Black');
	                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(11);

	                $styleArray = [
					    'borders' => [
					        'outline' => [
					            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					            'color' => ['argb' => '#212529'],
					        ],
					    ],
					];

					$event->sheet->getStyle('A1:AS1')->applyFromArray($styleArray);
	            },
	        ];
	    }

}
