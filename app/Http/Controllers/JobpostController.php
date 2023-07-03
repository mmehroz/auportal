<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;
use PDF;
use Excel;
use App\Exports\EmployeesExport;
use Image;

class JobpostController extends Controller
{
    public function jobpost_list(){
		$task = DB::connection('mysql')->table('jobpost')
		->where('status_id','=',2)
		->select('*')
		->get();
		return view('jobpost.list', ['data' => $task]);
	}
    public function addjobpost(){
        if(session()->get("email")){
            if(session()->get("role") <= 2){
                return view('jobpost.add');
            }else{
                return redirect('/')->with('message','You Are Not Allowed To Perform Action');
            }
        }else{
                return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    public function submitaddjobpost(Request $request){
        if(session()->get("email")){
            $jobpost_token = openssl_random_pseudo_bytes( 7 );
            $jobpost_token = bin2hex( $jobpost_token );
            $add[] = array(
                'jobpost_company' => $request->jobpost_company,
                'jobpost_title' => $request->jobpost_title,
                'jobpost_token' => $jobpost_token,
                'jobpost_date' => date('Y-m-d'),
                'status_id' => 2,
                'created_by' => session()->get('name'),
            );
            DB::connection('mysql')->table('jobpost')->insert($add);
            if($add){
                    return redirect('/jobpost_list')->with('message','Post Added Successfully');;
             }
        }else{
            return redirect('/jobpost_list')->with('message','Oops! Something went wrong');;
        }
    }
    public function closejob($id){
        if(session()->get("email")){
            $update =   DB::connection('mysql')->table('jobpost')
            ->where('jobpost_id', '=', $id)
            ->update(['status_id' => 1]);
            return redirect('/jobpost_list')->with('message','Successfully Deleted');
        }else{
            return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }

    }
}