<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;
use DataTables;
use Carbon\Carbon;

class ItController extends Controller
{
	public function itticket(){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('itticket')
			->join('itticketstatus','itticketstatus.itticketstatus_id', '=','itticket.itticketstatus_id')
			->where('itticket.created_by','=',session()->get('batchid'))
			->where('itticket.status_id','=',2)
			->select('itticket.itticket_request','itticketstatus.itticketstatus_name','itticketstatus.itticketstatus_id')
			->get();
			$checkreview = DB::connection('mysql')->table('itticket')
			->where('itticket_isreviewsubmited','=',0)
			->where('itticketstatus_id','>=',4)
			->where('created_by','=',session()->get('batchid'))
			->where('status_id','=',2)
			->select('itticket_id')
			->first();
			$checkpendingticket = DB::connection('mysql')->table('itticket')
			->where('itticket_isreviewsubmited','=',0)
			->where('itticketstatus_id','<=',2)
			->where('created_by','=',session()->get('batchid'))
			->where('status_id','=',2)
			->select('itticket_id')
			->count();
			return view('it.modal.itticket', ['data' => $task, 'checkreview' => $checkreview, 'checkpendingticket' => $checkpendingticket]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submititticket(Request $request){
		if(session()->get("email")){
			$this->validate($request, [
        		'itticket_request'		=>'required',
        	]);
			$insert = array(
                'itticket_request' 	=> $request->itticket_request,
                'itticketstatus_id' => 1,
                'status_id' 		=> 2,
                'created_by' 		=> session()->get('batchid'),
                'created_at' 		=> date('Y-m-d h:i;s'),
            );
            $created = DB::connection('mysql')->table('itticket')->insert($insert);
            if ($created) {
            	return redirect('/maindashboard')->with('message','Ticket Submited Successfully');	
            }else{
				return redirect('/maindashboard')->with('message','Oops! Something Went Wrong');
            }
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function itticketrequest(){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('itticket')
			->join('itticketstatus','itticketstatus.itticketstatus_id', '=','itticket.itticketstatus_id')
			->join('elsemployees','elsemployees.elsemployees_batchid', '=','itticket.created_by')
			->join('hrm_department','hrm_department.dept_id', '=','elsemployees.elsemployees_departid')
			->leftjoin('itinventory','itinventory.itinventory_id', '=','itticket.itinventory_id')
			->where('itticket.itticketstatus_id','<=',2)
			->where('itticket.status_id','=',2)
			->select('itticket.itticket_id','itticket.itticket_request','itticket.itticket_comment','itticket.created_at','itticketstatus.itticketstatus_id','itticketstatus.itticketstatus_name','elsemployees.elsemployees_name','itinventory.itinventory_name','hrm_department.dept_name')
			->get();
			return view('it.itticketrequest', ['data' => $task, 'status' => "Pending It Ticket Request" , 'ticketstatus_id' => "2"]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function itticketresolverequest(){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('itticket')
			->join('itticketstatus','itticketstatus.itticketstatus_id', '=','itticket.itticketstatus_id')
			->join('elsemployees','elsemployees.elsemployees_batchid', '=','itticket.created_by')
			->join('hrm_department','hrm_department.dept_id', '=','elsemployees.elsemployees_departid')
			->leftjoin('itinventory','itinventory.itinventory_id', '=','itticket.itinventory_id')
			->where('itticket.itticketstatus_id','>=',4)
			->where('itticket.status_id','=',2)
			->select('itticket.itticket_id','itticket.itticket_request','itticket.itticket_comment','itticket.created_at','itticketstatus.itticketstatus_id','itticketstatus.itticketstatus_name','elsemployees.elsemployees_name','itinventory.itinventory_name','hrm_department.dept_name')
			->get();
			return view('it.itticketrequest', ['data' => $task, 'status' => "Resolve It Ticket Request" , 'ticketstatus_id' => "4"]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function itticketrejectrequest(){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('itticket')
			->join('itticketstatus','itticketstatus.itticketstatus_id', '=','itticket.itticketstatus_id')
			->join('elsemployees','elsemployees.elsemployees_batchid', '=','itticket.created_by')
			->join('hrm_department','hrm_department.dept_id', '=','elsemployees.elsemployees_departid')
			->leftjoin('itinventory','itinventory.itinventory_id', '=','itticket.itinventory_id')
			->where('itticket.itticketstatus_id','=',3)
			->where('itticket.status_id','=',2)
			->select('itticket.itticket_id','itticket.itticket_request','itticket.itticket_comment','itticket.created_at','itticketstatus.itticketstatus_id','itticketstatus.itticketstatus_name','elsemployees.elsemployees_name','itinventory.itinventory_name','hrm_department.dept_name')
			->get();
			return view('it.itticketrequest', ['data' => $task, 'status' => "Reject It Ticket Request" , 'ticketstatus_id' => "3"]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function updateitticket($id,$comment,$status){
		if(session()->get("email")){
			if ($status == 5) {
				$task = DB::connection('mysql')->table('itinventory')
				->where('itinventory_qtyremaining','!=',0)
				->where('status_id','=',2)
				->select('itinventory_id','itinventory_name')
				->get();
				return view('it.modal.resolve', ['data' => $task, 'id' => $id]);
			}
			$dataa = array(
			'itticket_comment' 		=> $comment,
			'itticketstatus_id'	 	=> $status,
			'updated_by' 			=> session()->get('batchid'),
            'updated_at' 			=> date('Y-m-d h:i;s'),
			);
			$updated = DB::connection('mysql')->table('itticket')
			->where('itticket_id', $id)
			->update($dataa);
			if ($updated) {
            	$task = DB::connection('mysql')->table('itticket')
				->join('itticketstatus','itticketstatus.itticketstatus_id', '=','itticket.itticketstatus_id')
				->join('elsemployees','elsemployees.elsemployees_batchid', '=','itticket.created_by')
				->join('hrm_department','hrm_department.dept_id', '=','elsemployees.elsemployees_departid')
				->leftjoin('itinventory','itinventory.itinventory_id', '=','itticket.itinventory_id')
				->where('itticket.itticketstatus_id','<=',2)
				->where('itticket.status_id','=',2)
				->select('itticket.itticket_id','itticket.itticket_request','itticket.itticket_comment','itticket.created_at','itticketstatus.itticketstatus_id','itticketstatus.itticketstatus_name','elsemployees.elsemployees_name','itinventory.itinventory_name','hrm_department.dept_name')
				->get();
				return view('it.dynamicitticketrequest', ['data' => $task, 'ticketstatus_id' => $status]);
            }else{
				return redirect('/maindashboard')->with('message','Oops! Something Went Wrong');
            }
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submitresolveitticket(Request $request){
		if(session()->get("email")){
			$checkinventory = DB::connection('mysql')->table('itinventory')
			->where('itinventory_id','=',$request->itinventory_id)
			->where('status_id','=',2)
			->select('itinventory_qty','itinventory_qtyuse')
			->first();
			$useinventory = $checkinventory->itinventory_qtyuse+1;
			$remaininginventory = $checkinventory->itinventory_qty-$useinventory;
			if ($useinventory > $checkinventory->itinventory_qty) {
				return redirect('/itticketrequest')->with('message','Inventory! Out Of Stock');	
			}else{
				$this->validate($request, [
		    		'itinventory_id'	=>'required',
		    		'itticket_id'		=>'required',
		    		'itticket_comment'	=>'required',
		    	]);
				$dataa = array(
				'itticket_comment' 		=> $request->itticket_comment,
				'itticketstatus_id'	 	=> 5,
				'itinventory_id' 		=> $request->itinventory_id,
				'updated_by' 			=> session()->get('batchid'),
		        'updated_at' 			=> date('Y-m-d h:i;s'),
				);
				$updated = DB::connection('mysql')->table('itticket')
				->where('itticket_id', $request->itticket_id)
				->update($dataa);
				$set = array(
				'itinventory_qtyuse' 		=> $useinventory,
				'itinventory_qtyremaining' 	=> $remaininginventory,
				);
				DB::connection('mysql')->table('itinventory')
				->where('itinventory_id', $request->itinventory_id)
				->update($set);
			}
            if ($updated) {
            	return redirect('/itticketrequest')->with('message','Ticket Resolved Successfully');	
            }else{
				return redirect('/itticketrequest')->with('message','Oops! Something Went Wrong');
            }
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function itinventorylist(){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('itinventory')
			->join('vendor','vendor.vendor_id', '=', 'itinventory.vendor_id')
			->join('elsemployees','elsemployees.elsemployees_batchid', '=','itinventory.created_by')
			->where('itinventory.status_id','=',2)
			->select('itinventory.*','elsemployees.elsemployees_name','vendor.vendor_name')
			->get();
			return view('it.itinventorylist', ['data' => $task]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function addtoinventory(){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('vendor')
			->where('vendortype_id','=',2)
			->where('status_id','=',2)
			->select('*')
			->get();
			return view('it.modal.addtoinventory', ['data' => $task]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submitaddtoinventory(Request $request){
		if(session()->get("email")){
			$this->validate($request, [
        		'itinventory_name'			=>'required',
        		'itinventory_qty'			=>'required',
        		'itinventory_type'			=>'required',
        		'itinventory_description'	=>'required',
        		'vendor_id'					=>'required',
        	]);
			$insert = array(
                'itinventory_name' 			=> $request->itinventory_name,
                'itinventory_qty' 			=> $request->itinventory_qty,
                'itinventory_type' 			=> $request->itinventory_type,
                'itinventory_description' 	=> $request->itinventory_description,
                'vendor_id' 				=> $request->vendor_id,
                'itinventory_qtyuse' 		=> $request->itinventory_type == "Use" ? $request->itinventory_qty : 0,
                'itinventory_qtyremaining' 	=> $request->itinventory_type == "Use" ? 0 : $request->itinventory_qty,
                'status_id' 				=> 2,
                'created_by' 				=> session()->get('batchid'),
                'created_at' 				=> date('Y-m-d h:i;s'),
            );
            $created = DB::connection('mysql')->table('itinventory')->insert($insert);
            if ($created) {
            	return redirect('/itinventorylist')->with('message','Product Added To Inventory Successfully');	
            }else{
				return redirect('/itinventorylist')->with('message','Oops! Something Went Wrong');
            }
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function editinventory($id){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('itinventory')
			->where('itinventory_id','=',$id)
			->where('status_id','=',2)
			->select('*')
			->first();
			$vendor = DB::connection('mysql')->table('vendor')
			->where('vendortype_id','=',2)
			->where('status_id','=',2)
			->select('*')
			->get();
			return view('it.modal.editinventory', ['data' => $task, 'vendor' => $vendor]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submiteditinventory(Request $request){
		if(session()->get("email")){
			$this->validate($request, [
	    		'itinventory_id'			=>'required',
	    		'itinventory_name'			=>'required',
	    		'itinventory_qty'			=>'required',
	    		'itinventory_type'			=>'required',
        		'itinventory_description'	=>'required',
        		'vendor_id'					=>'required',
	    	]);
			$dataa = array(
			'itinventory_name' 			=> $request->itinventory_name,
			'itinventory_qty' 			=> $request->itinventory_qty,
			'itinventory_type' 			=> $request->itinventory_type,
            'itinventory_description' 	=> $request->itinventory_description,
            'vendor_id' 				=> $request->vendor_id,
            'itinventory_qtyuse' 		=> $request->itinventory_type == "Use" ? $request->itinventory_qty : 0,
            'itinventory_qtyremaining' 	=> $request->itinventory_type == "Use" ? 0 : $request->itinventory_qty,
			'updated_by' 				=> session()->get('batchid'),
	        'updated_at' 				=> date('Y-m-d h:i;s'),
			);
			$updated = DB::connection('mysql')->table('itinventory')
			->where('itinventory_id', $request->itinventory_id)
			->update($dataa);
			 if ($updated) {
            	return redirect('/itinventorylist')->with('message','Product Updated Successfully');	
            }else{
				return redirect('/itinventorylist')->with('message','Oops! Something Went Wrong');
            }
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function removefrominventory($id){
		if(session()->get("email")){
			$dataa = array(
			'status_id' 	=> 1,
			'deleted_by' 	=> session()->get('batchid'),
	        'deleted_at' 	=> date('Y-m-d h:i;s'),
			);
			$updated = DB::connection('mysql')->table('itinventory')
			->where('itinventory_id', $id)
			->update($dataa);
			 if ($updated) {
            	return redirect('/itinventorylist')->with('message','Product Removed Successfully');	
            }else{
				return redirect('/itinventorylist')->with('message','Oops! Something Went Wrong');
            }
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submititreview(Request $request){
		if(session()->get("email")){
			$this->validate($request, [
        		'itticket_id'		=>'required',
        		'itreview_star'		=>'required',
        		'itreview_remarks'	=>'required',
        	]);
			$insert = array(
                'itreview_star' 	=> $request->itreview_star,
                'itreview_remarks' 	=> $request->itreview_remarks,
                'itticket_id' 		=> $request->itticket_id,
                'status_id' 		=> 2,
                'created_by' 		=> session()->get('batchid'),
                'created_at' 		=> date('Y-m-d h:i;s'),
            );
            $created = DB::connection('mysql')->table('itreview')->insert($insert);
            $dataa = array(
				'itticket_isreviewsubmited' 	=> 1,
			);
			$updated = DB::connection('mysql')->table('itticket')
			->where('itticket_id', $request->itticket_id)
			->update($dataa);
            if ($created) {
            	return redirect('/maindashboard')->with('message','Thank You For Your Review');	
            }else{
				return redirect('/maindashboard')->with('message','Oops! Something Went Wrong');
            }
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function itreviewreport(){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('itreview')
			->join('elsemployees','elsemployees.elsemployees_batchid', '=','itreview.created_by')
			->where('itreview.status_id','=',2)
			->select('itreview.itreview_id','itreview.itreview_star','itreview.itreview_remarks','itreview.created_at','elsemployees.elsemployees_name')
			->get();
			return view('it.itreviewreport', ['data' => $task]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
}
