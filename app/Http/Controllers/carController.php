<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;
use DataTables;
use Carbon\Carbon;
use Image;

class carController extends Controller
{
	public function carlist(){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('car')
			->join('vendor','vendor.vendor_id', '=','car.vendor_id')
			->join('elsemployees','elsemployees.elsemployees_batchid', '=','car.created_by')
			->where('car.status_id','=',2)
			->select('car.*','vendor.vendor_name','elsemployees.elsemployees_name')
			->get();
			return view('car.list', ['data' => $task]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function addcar(){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('vendor')
			->where('vendortype_id','=',1)
			->where('status_id','=',2)
			->select('vendor_id','vendor_name')
			->get();
			return view('car.modal.add', ['data' => $task]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submitaddcar(Request $request){
		if(session()->get("email")){
			$this->validate($request, [
        		'car_name'		=>'required',
        		'car_model'		=>'required',
        		'car_rent'		=>'required',
        		'vendor_id'		=>'required',
        	]);
        	$this->validate($request, [
        		'car_picture'=>'mimes:jpeg,bmp,png|max:20024'
        	]);
			if($request->hasFile('car_picture') && $request->car_picture->isValid()){
	            $number = rand(1,999);
	            $numb = $number / 7 ;
	            $extension = $request->car_picture->extension();
	            $car_picture  = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
	            $car_picture = $request->car_picture->move(public_path('car_picture'),$car_picture);
            	$img = Image::make($car_picture)->resize(800,800, function($constraint) {
                	$constraint->aspectRatio();
            	});
            	$img->save($car_picture);
            	$car_picture = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
        	}else{
       			 $car_picture = 'no_image.jpg';    
        	}
			$insert = array(
                'car_name' 			=> $request->car_name,
                'car_model' 		=> $request->car_model,
                'car_rent' 			=> $request->car_rent,
                'car_picture' 		=> $car_picture,
                'car_otherdetails' 	=> $request->car_otherdetails,
                'vendor_id' 		=> $request->vendor_id,
                'status_id' 		=> 2,
                'created_by' 		=> session()->get('batchid'),
                'created_at' 		=> date('Y-m-d h:i;s'),
            );
            $created = DB::connection('mysql')->table('car')->insert($insert);
            if ($created) {
            	return redirect('/carlist')->with('message','Car Added Successfully');	
            }else{
				return redirect('/carlist')->with('message','Oops! Something Went Wrong');
            }
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function editcar($id){
		if(session()->get("email")){
			$type = DB::connection('mysql')->table('vendor')
			->where('vendortype_id','=',1)
			->where('status_id','=',2)
			->select('vendor_id','vendor_name')
			->get();
			$task = DB::connection('mysql')->table('car')
			->join('vendor','vendor.vendor_id', '=','car.vendor_id')
			->join('elsemployees','elsemployees.elsemployees_batchid', '=','car.created_by')
			->where('car.car_id','=',$id)
			->where('car.status_id','=',2)
			->select('car.*','vendor.vendor_name','elsemployees.elsemployees_name')
			->first();
			return view('car.modal.edit', ['data' => $task, 'type' => $type]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submiteditcar(Request $request){
		if(session()->get("email")){
			$this->validate($request, [
        		'car_name'		=>'required',
        		'car_model'		=>'required',
        		'car_rent'		=>'required',
        		'vendor_id'		=>'required',
        	]);
        	$this->validate($request, [
        		'car_picture'=>'mimes:jpeg,bmp,png|max:20024'
        	]);
			if($request->hasFile('car_picture') && $request->car_picture->isValid()){
	            $number = rand(1,999);
	            $numb = $number / 7 ;
	            $extension = $request->car_picture->extension();
	            $car_picture  = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
	            $car_picture = $request->car_picture->move(public_path('car_picture'),$car_picture);
            	$img = Image::make($car_picture)->resize(800,800, function($constraint) {
                	$constraint->aspectRatio();
            	});
            	$img->save($car_picture);
            	$car_picture = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
        	}else{
       			 $car_picture = 'no_image.jpg';    
        	}
        	if ($car_picture != 'no_image.jpg') {
				DB::connection('mysql')->table('car')
				->where('car_id','=',$request->car_id)
				->update([
					'car_picture'	=> $car_picture,
				]); 
			}
			$dataa = array(
				'car_name' 			=> $request->car_name,
                'car_model' 		=> $request->car_model,
                'car_rent' 			=> $request->car_rent,
                'car_picture' 		=> $car_picture,
                'car_otherdetails' 	=> $request->car_otherdetails,
                'updated_by' 		=> session()->get('batchid'),
                'updated_at' 		=> date('Y-m-d h:i;s'),
			);
			$updated = DB::connection('mysql')->table('car')
			->where('car_id', $request->car_id)
			->update($dataa);
			if ($updated) {
				return redirect('/carlist')->with('message','Car Updated Successfully');		
			}else{
				return redirect('/carlist')->with('message','Oops! Something Went Wrong');
			}
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function deletecar($id){
		if(session()->get("email")){
			$dataa = array(
			'status_id' 	=> 1,
			'updated_by' 	=> session()->get('batchid'),
	        'updated_at' 	=> date('Y-m-d h:i;s'),
			);
			$updated = DB::connection('mysql')->table('car')
			->where('car_id', $id)
			->update($dataa);
			 if ($updated) {
            	return redirect('/carlist')->with('message','Car Deleted Successfully');	
            }else{
				return redirect('/carlist')->with('message','Oops! Something Went Wrong');
            }
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function rentaddition($id){
		if(session()->get("email")){
			return view('car.modal.rentaddition', ['id' => $id]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submitrentaddition(Request $request){
		if(session()->get("email")){
			$this->validate($request, [
        		'caraddition_rent'		=>'required',
        		'caraddition_comment'	=>'required',
        	]);
        	$insert = array(
                'caraddition_rent' 		=> $request->caraddition_rent,
                'caraddition_comment' 	=> $request->caraddition_comment,
                'caraddition_date' 		=> date('Y-m'),
                'car_id' 				=> $request->car_id,
                'status_id' 			=> 2,
                'created_by' 			=> session()->get('batchid'),
                'created_at' 			=> date('Y-m-d h:i;s'),
            );
            $created = DB::connection('mysql')->table('caraddition')->insert($insert);
            if ($created) {
            	return redirect('/carlist')->with('message','Additional Rent Added Successfully');	
            }else{
				return redirect('/carlist')->with('message','Oops! Something Went Wrong');
            }
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function viewrentadditionlog($id){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('caraddition')
			->join('elsemployees','elsemployees.elsemployees_batchid', '=','caraddition.created_by')
			->where('caraddition.car_id','=',$id)
			->where('caraddition.status_id','=',2)
			->select('caraddition.*','elsemployees.elsemployees_name')
			->get();
			return view('car.modal.viewrentadditionlog', ['data' => $task]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
}
