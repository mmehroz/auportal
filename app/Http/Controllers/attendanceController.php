<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Image;
use DB;
use Input;
use App\Item;
use Session;
use Response;
use Validator;

class attendanceController extends Controller
{
	public function selectattendance()
	{
		return view('attendance.selectattendance');
	}
	public function uploadeattendance(Request $request)
	{
		$file = $request->file('attendancefile');
		if ($file) {
			$filename = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension(); //Get extension of uploaded file
			$tempPath = $file->getRealPath();
			$fileSize = $file->getSize(); //Get size of uploaded file in bytes
			//Check for file extension and size
			// $this->checkUploadedFileProperties($extension, $fileSize);
			$valid_extension = "csv"; //Only want csv and excel files
			$maxFileSize = 2097152; // Uploaded file size limit is 2mb
			if ($extension == $valid_extension) {
				if ($fileSize <= $maxFileSize) {
				//Where uploaded file will be stored on the server 
				$location = 'attendanceupload'; //Created an "uploads" folder for that
				// Upload file
				$file->move(public_path('attendanceupload/'),$filename);
				// In case the uploaded file path is to be stored in the database 
				$filepath = public_path($location . "/" . $filename);
				// Reading file
				$file = fopen($filepath, "r");
				$importData_arr = array(); // Read through the file and store the contents as an array
				$i = 0;
				//Read the contents of the uploaded file 
				while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
					$num = count($filedata);
					// Skip first row (Remove below comment if you want to skip the first row)
					if ($i == 0) {
						$i++;
						continue;
					}
					for ($c = 0; $c < $num; $c++) {
						$importData_arr[$i][] = $filedata[$c];
					}
						$i++;
				}
				fclose($file); //Close after reading
				$j = 0;
				foreach ($importData_arr as $importData) {
					try {
						$adds = array(
							'attendance_date'		=> $importData[0],
							'attendance_month'		=> $importData[1],
							'attendance_mark'		=> $importData[2],
							'elsemployees_empid'	=> $importData[3],
							'attendance_submitby'	=> $importData[4],
						);
						$save = DB::connection('mysql')->table('bioattendance')->insert($adds);
					} catch (\Exception $e) {
						DB::rollBack();
					}
				}
					return redirect('/selectattendance')->with('message', 'Successfully Uploaded');
				} else {
					return redirect('/selectattendance')->with('message', 'File Size Too Large');
				}
			} else {
					return redirect('/selectattendance')->with('message', 'Invalid Format');
			}
		} else {
				return redirect('/selectattendance')->with('message', '"No file was uploaded Invalid Upload');
		}
	}
	public function markattendancereport()
	{
		$data = DB::connection('mysql')->table('markattendance')
		->join('elsemployees as emp','emp.elsemployees_batchid','=', 'markattendance.markattendance_for')
		->join('elsemployees as add','add.elsemployees_batchid', '=', 'markattendance.created_by')
		->select('markattendance.markattendance_date','markattendance.markattendance_type','emp.elsemployees_name as for','add.elsemployees_name as addby')
		->where('status_id','=',2)
		->get();
		return view('attendance.markattendancereport', ['data' => $data]);
	}
	public function markattendance()
	{
		$data = DB::connection('mysql')->table('elsemployees')
		->select('elsemployees_name','elsemployees_batchid')
		->where('elsemployees_status','=',2)
		->get();
		return view('attendance.modals.add', ['data' => $data]);
	}
	public function submitmarkattendance(Request $request)
	{
		$settime = date("H:i:s", strtotime($request->markattendance_time));
		$setdatetime = $request->markattendance_date.' '.$settime;
		// dd($setdatetime);
		$adds = array(
			'Userid'		=> $request->markattendance_for,
			'CheckTime'		=> $setdatetime,
			'CheckType'		=> $request->markattendance_type,
			'Sensorid'		=> 1,
			'WorkType'		=> 0,
			'AttFlag'		=> 1,
			'Checked'		=> 0,
			'Exported' 		=> 0,
			'OpenDoorFlag'	=> 0,
			'temperature'	=> 0,
			'whynoopen' 	=> 0,
			'mask' 			=> 2
		);
		$save = DB::connection('sqlsrv')->table('Checkinout')->insert($adds);
		$addmy = array(
			'markattendance_for'	=> $request->markattendance_for,
			'markattendance_date'	=> $setdatetime,
			'markattendance_type'	=> $request->markattendance_type,
			'status_id' 			=> 2,
			'created_by' 			=> session()->get('batchid'),
			'created_at' 			=> date('Y-m-d h:i:s')
		);
		DB::connection('mysql')->table('markattendance')->insert($addmy);
		if ($save) {
			return redirect('/markattendancereport')->with('message', 'Attendance Marked Successfully');
		}else{
			return redirect('/markattendancereport')->with('message', 'Oops! Something Went Wrong');
		}
	}
}