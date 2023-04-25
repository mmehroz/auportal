<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;
use PDF;
use Excel;
use App\Exports\EmployeesExport;
use Image;

class ExpenseController extends Controller
{
    public function selectexpensemonth(){
		if(session()->get("email")){
			return view('expense.selectmonth');
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submitselectexpense($year, $month){
		if(session()->get("email")){
			$yearandmonth = $year.'-'.$month;
			$checkopeningbalance = DB::connection('mysql')->table('expenseopening')
			->where('expenseopening_month','=',$yearandmonth)
			->where('status_id','=',2)
			->select('expenseopening_balance')
			->first();
			if ($checkopeningbalance == null) {
				return view('expense.addopeningbalance',['yearandmonth' => $yearandmonth]);	
			}else{
				$openingbalance = $checkopeningbalance->expenseopening_balance;
				$task = DB::connection('mysql')->table('expense')
				->join('expensetype','expensetype.expensetype_id','=','expense.expensetype_id')
				->where('expense.expense_yearandmonth','=',$yearandmonth)
				->where('expense.expensetype_id','=',5)
				->where('expense.status_id','=',2)
				->select('expense.*','expensetype_name')
				->get();
				return view('expense.report',['data' => $task, 'yearandmonth' => $yearandmonth, 'openingbalance' => $openingbalance]);
			}
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function recuringexpenselist(){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('expense')
			->join('expensetype','expensetype.expensetype_id','=','expense.expensetype_id')
			->where('expense.status_id','=',2)
			->where('expense.expensetype_id','!=',5)
			->select('expense.*','expensetype_name')
			->get();
			return view('expense.recuringexpenselist',['data' => $task]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function addexpense($id){
		if(session()->get("email")){
			$depart = DB::connection('mysql')->table('hrm_department')
			->select('*')
			->get();
			return view('expense.modals.add',['yearandmonth' => $id, 'depart' => $depart]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function addmorebalance($id){
		if (session()->get('email')) {
			$split = explode('~', $id);
			return view('expense.modals.addmorebalance',['yearandmonth' => $split[0], 'expense_id' => $split[1]]);
		}else{
			return redirect('/')->width('essage', 'You Are Not Allowed To Visit Portal Without Login');
		}
	}
	public function submitaddmorebalance(Request $request){
		if(session()->get("email")){
			$splitmonth = explode('-', $request->expenseopening_month);
			$add[] = array(
				'expenseopening_moretitle' 		=> $request->expenseopening_moretitle,
				'expenseopening_morebalance'	=> $request->expenseopening_morebalance,
				'expense_id'					=> $request->expense_id,
				'expenseopening_month' 			=> $request->expenseopening_month,
				'expenseopening_date' 			=> date('Y-m-d'),
				'status_id' 					=> 2,
				);
			$save = DB::connection('mysql')->table('expenseopening')->insert($add);
			if($save){
				return redirect('/submitselectexpense/'.$splitmonth[0].'/'.$splitmonth[1])->with('message','Additional Balance Added Successfully');;
			}else{
				return redirect('/recuringexpenselist')->with('message','Oops! Something went wrong');;
			}
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
		} 
	}
	public function addrecuringexpense(){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('expensetype')
			->where('status_id','=',2)
			->select('expensetype_id','expensetype_name')
			->get();
			return view('expense.modals.addrecuring',['data' => $task]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submitexpense(Request $request){
		// dd($request);
		if(session()->get("email")){
			$index=0;
			foreach ($request->expense_title as $expenseid) {
			// $mergedepart = implode(',', $request->expense_for[$index]);
			$add = array(
				'expense_title' 		=> $request->expense_title[$index],
				'expense_amount' 		=> $request->expense_amount[$index],
				'expense_for'	 		=> $request->expense_for[$index],
				'expense_comment' 		=> $request->expense_comment[$index],
				'expense_yearandmonth' 	=> $request->expense_yearandmonth[$index],
				'expense_day' 			=> $request->expense_day[$index],
				'expense_isrecuring' 	=> 0,
				'expense_ismonthly' 	=> 1,
				'expensetype_id' 		=> 5,
				'status_id' 			=> 2,
				'created_by' 			=> session()->get('id'),
				'created_at' 			=> date('Y-m-d h:i:s')
				);
			$save = DB::connection('mysql')->table('expense')->insert($add);
			$index++;
			}
			$forredirection = explode('-', $request->expense_yearandmonth[0]);
			if($save){
				return redirect('/submitselectexpense/'.$forredirection[0].'/'.$forredirection[1])->with('message','Expense Added Successfully');;
			}else{
				return redirect('/submitselectexpense/'.$forredirection[0].'/'.$forredirection[1])->with('message','Oops! Something went wrong');;
			}
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
		} 
	}
	public function submitrecuringexpense(Request $request){
		if(session()->get("email")){
			$add[] = array(
				'expense_title' 		=> $request->expense_title,
				'expense_amount' 		=> $request->expense_amount,
				'expensetype_id' 		=> $request->expensetype_id,
				'expense_comment' 		=> $request->expense_comment,
				'expense_isrecuring' 	=> 1,
				'expense_ismonthly' 	=> 0,
				'status_id' 			=> 2,
				'created_by' 			=> session()->get('id'),
				'created_at' 			=> date('Y-m-d h:i:s')
				);
			$save = DB::connection('mysql')->table('expense')->insert($add);
			$forredirection = explode('-', $request->expense_yearandmonth);
			if($save){
				return redirect('/recuringexpenselist')->with('message','Expense Added Successfully');;
			}else{
				return redirect('/recuringexpenselist')->with('message','Oops! Something went wrong');;
			}
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
		} 
	}
	public function editexpense($id){
		if(session()->get("email")){
			$type = DB::connection('mysql')->table('expensetype')
			->where('status_id','=',2)
			->select('expensetype_id','expensetype_name')
			->get();
			$depart = DB::connection('mysql')->table('hrm_department')
			->select('*')
			->get();
			$task = DB::connection('mysql')->table('expense')
			->where('expense_id','=',$id)
			->select('*')
			->first();
			return view('expense.modals.edit',['data' => $task, 'type' => $type, 'depart' => $depart]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function editrecuringexpense($id){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('expense')
			->where('expense_id','=',$id)
			->select('*')
			->first();
			return view('expense.modals.editrecuring',['data' => $task]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submiteditexpense(Request $request){
		if(session()->get("email")){
			$data = array(
				'expense_title' 		=> $request->expense_title,
				'expense_amount' 		=> $request->expense_amount,
				'expense_comment' 		=> $request->expense_comment,
				'expense_yearandmonth' 	=> $request->expense_yearandmonth,
				'updated_by' 			=> session()->get('id'),
				'updated_at' 			=> date('Y-m-d h:i:s')
				);
			$save = DB::connection('mysql')->table('expense')
			->where('expense_id', $request->expense_id)
			->update($data);
			$forredirection = explode('-', $request->expense_yearandmonth);
			if($save){
				return redirect('/submitselectexpense/'.$forredirection[0].'/'.$forredirection[1])->with('message','Expense Updated Successfully');;
			}else{
				return redirect('/submitselectexpense/'.$forredirection[0].'/'.$forredirection[1])->with('message','Oops! Something went wrong');;
			}
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
		} 
	}
	public function submiteditrecuringexpense(Request $request){
		if(session()->get("email")){
			$data = array(
				'expense_title' 		=> $request->expense_title,
				'expense_amount' 		=> $request->expense_amount,
				'expense_comment' 		=> $request->expense_comment,
				'updated_by' 			=> session()->get('id'),
				'updated_at' 			=> date('Y-m-d h:i:s')
				);
			$save = DB::connection('mysql')->table('expense')
			->where('expense_id', $request->expense_id)
			->update($data);
			if($save){
				return redirect('/recuringexpenselist/')->with('message','Expense Updated Successfully');;
			}else{
				return redirect('/recuringexpenselist/')->with('message','Oops! Something went wrong');;
			}
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
		} 
	}
	public function submitopeningbalance(Request $request){
		if(session()->get("email")){
			$splitmonth = explode('-', $request->expenseopening_month);
			$add[] = array(
				'expenseopening_balance'	=> $request->expenseopening_balance,
				'expenseopening_month' 		=> $request->expenseopening_month,
				'status_id' 				=> 2,
				);
			$save = DB::connection('mysql')->table('expenseopening')->insert($add);
			if($save){
				return redirect('/submitselectexpense/'.$splitmonth[0].'/'.$splitmonth[1])->with('message','Opening Balance Added Successfully');;
			}else{
				return redirect('/recuringexpenselist')->with('message','Oops! Something went wrong');;
			}
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
		} 
	}
}