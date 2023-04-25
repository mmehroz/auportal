<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;
use DataTables;
use Carbon\Carbon;
use Image;

class vendorController extends Controller
{
	public function vendorlist(){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('vendor')
			->join('vendortype','vendortype.vendortype_id', '=','vendor.vendortype_id')
			->join('elsemployees','elsemployees.elsemployees_batchid', '=','vendor.created_by')
			->where('vendor.status_id','=',2)
			->select('vendor.*','vendortype.vendortype_name','elsemployees.elsemployees_name')
			->get();
			return view('vendor.list', ['data' => $task]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function addvendor(){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('vendortype')
			->where('status_id','=',2)
			->select('*')
			->get();
			return view('vendor.modal.add', ['data' => $task]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submitaddvendor(Request $request){
		if(session()->get("email")){
			$this->validate($request, [
        		'vendor_name'		=>'required',
        		'vendor_phone'		=>'required',
        		'vendortype_id'		=>'required',
        	]);
        	$this->validate($request, [
        		'vendor_picture'=>'mimes:jpeg,bmp,png|max:20024'
        	]);
			if($request->hasFile('vendor_picture') && $request->vendor_picture->isValid()){
	            $number = rand(1,999);
	            $numb = $number / 7 ;
	            $extension = $request->vendor_picture->extension();
	            $vendor_picture  = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
	            $vendor_picture = $request->vendor_picture->move(public_path('vendor_picture'),$vendor_picture);
            	$img = Image::make($vendor_picture)->resize(800,800, function($constraint) {
                	$constraint->aspectRatio();
            	});
            	$img->save($vendor_picture);
            	$vendor_picture = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
        	}else{
       			 $vendor_picture = 'no_image.jpg';    
        	}
			$insert = array(
                'vendor_name' 			=> $request->vendor_name,
                'vendor_email' 			=> $request->vendor_email,
                'vendor_phone' 			=> $request->vendor_phone,
                'vendor_picture' 		=> $vendor_picture,
                'vendor_address' 		=> $request->vendor_address,
                'vendor_otherdetails' 	=> $request->vendor_otherdetails,
                'vendortype_id' 		=> $request->vendortype_id,
                'status_id' 			=> 2,
                'created_by' 			=> session()->get('batchid'),
                'created_at' 			=> date('Y-m-d h:i;s'),
            );
            $created = DB::connection('mysql')->table('vendor')->insert($insert);
            if ($created) {
            	return redirect('/vendorlist')->with('message','Vendor Added Successfully');	
            }else{
				return redirect('/vendorlist')->with('message','Oops! Something Went Wrong');
            }
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function editvendor($id){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('vendor')
			->join('vendortype','vendortype.vendortype_id', '=','vendor.vendortype_id')
			->join('elsemployees','elsemployees.elsemployees_batchid', '=','vendor.created_by')
			->where('vendor.vendor_id','=',$id)
			->select('vendor.*','vendortype.vendortype_name','elsemployees.elsemployees_name')
			->first();
			$type = DB::connection('mysql')->table('vendortype')
			->where('status_id','=',2)
			->select('*')
			->get();
			return view('vendor.modal.edit', ['data' => $task, 'type' => $type]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submiteditvendor(Request $request){
		if(session()->get("email")){
			if($request->hasFile('vendor_picture') && $request->vendor_picture->isValid()){
	            $number = rand(1,999);
	            $numb = $number / 7 ;
	            $extension = $request->vendor_picture->extension();
	            $vendor_picture  = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
	            $vendor_picture = $request->vendor_picture->move(public_path('vendor_picture'),$vendor_picture);
            	$img = Image::make($vendor_picture)->resize(800,800, function($constraint) {
                	$constraint->aspectRatio();
            	});
            	$img->save($vendor_picture);
            	$vendor_picture = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
        	}else{
       			 $vendor_picture = 'no_image.jpg';    
        	}
        	if ($vendor_picture != 'no_image.jpg') {
				DB::connection('mysql')->table('vendor')
				->where('vendor_id','=',$request->vendor_id)
				->update([
					'vendor_picture'	=> $vendor_picture,
				]); 
			}
			$dataa = array(
				'vendor_name' 			=> $request->vendor_name,
                'vendor_email' 			=> $request->vendor_email,
                'vendor_phone' 			=> $request->vendor_phone,
                'vendor_address' 		=> $request->vendor_address,
                'vendor_otherdetails' 	=> $request->vendor_otherdetails,
                'vendortype_id' 		=> $request->vendortype_id,
                'updated_by' 			=> session()->get('batchid'),
                'updated_at' 			=> date('Y-m-d h:i;s'),
			);
			$updated = DB::connection('mysql')->table('vendor')
			->where('vendor_id', $request->vendor_id)
			->update($dataa);
			if ($updated) {
				return redirect('/vendorlist')->with('message','Vendor Updated Successfully');		
			}else{
				return redirect('/vendorlist')->with('message','Oops! Something Went Wrong');
			}
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function deletevendor($id){
		if(session()->get("email")){
			$dataa = array(
			'status_id' 	=> 1,
			'updated_by' 	=> session()->get('batchid'),
	        'updated_at' 	=> date('Y-m-d h:i;s'),
			);
			$updated = DB::connection('mysql')->table('vendor')
			->where('vendortype_id', $id)
			->update($dataa);
			 if ($updated) {
            	return redirect('/vendorlist')->with('message','Vendor Deleted Successfully');	
            }else{
				return redirect('/vendorlist')->with('message','Oops! Something Went Wrong');
            }
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
}
