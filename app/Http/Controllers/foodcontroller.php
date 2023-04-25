<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Input;
use App\Item;
use \App\holidays;
use Session;
use Image;
use Config;
use App\elsemployee;
use App\elsleaverequest;
use Illuminate\Support\Facades\Mail;
use Excel;
use App\Exports\EmployeesExport;

class foodcontroller extends Controller
{
	public function foodapp($restaurantid){
		if(session()->get("email")){
			$taskres = DB::connection('mysql')->table('restaurant')
			->where('restaurant.restaurant_id','=',$restaurantid)
			->where('restaurant.status_id','=',2)
			->select('restaurant.*')
			->first();
			$task = DB::connection('mysql')->table('product')
			->join('restaurant','restaurant.restaurant_id','=','product.restaurant_id')
			->where('product.restaurant_id','=',$restaurantid)
			->where('product.status_id','=',2)
			->select('product.*','restaurant.*')
			->get();
			return view('food.foodapp',['datares'=>$taskres,'data'=>$task,'id'=>$restaurantid]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function restaurantlist(){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('restaurant')
			->where('restaurant.status_id','=',2)
			->select('restaurant.*')
			->get();
			// dd($task);
			return view('food.restaurantlist',['data'=>$task]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function addrestaurantmodal(){
		if(session()->get("email")){
			if(session()->get("role") <= 2){
				return view('food.modal.addrestaurant');
			}else{
				return redirect('/restaurantlist')->with('message','You Are Not Allowed To Add Restaurant');
			}
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}

	public function submitaddrestaurant(Request $request){
		if(session()->get("email")){
			if(session()->get("role") <= 2){
			$this->validate($request, [
        	    'image'=>'mimes:jpeg,bmp,png|max:5120|required',
        	    'name'=>'required'
    	    ]);
			if($request->hasFile('image') && $request->image->isValid()){
                    $number = rand(1,999);
			        $numb = $number / 7 ;
			        $extension = $request->image->extension();
                    $filename  = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
                    $filename = $request->image->move(public_path('restaurant'),$filename);
			        $img = Image::make($filename)->resize(800,800, function($constraint) {
                        $constraint->aspectRatio();
                    });
			        $img->save($filename);
			        $filename = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
    	    }else{
                $filename = 'no_image.jpg';    
            }
     		$addannou[] = array(
				'restaurant_name' => $request->name,
				'restaurant_picture' => $filename,
				'restaurant_otherdetails' => $request->details,
				'status_id' => 2,
				'created_by' => session()->get('id'),
				'created_at' => date('Y-m-d h:i:s')
				);
			DB::connection('mysql')->table('restaurant')->insert($addannou);
			if($addannou){
					return redirect('/restaurantlist')->with('message','Restaurant Added Successfully');;
			}
			else{
				return redirect('/restaurantlist')->with('message','Oops! Something went wrong');;
			}
			}
			else{
				return redirect('/')->with('message','Reach HR For Access');
				}
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
			} 
	}

	public function editrestaurantmodal($id){
		if(session()->get("email")){
			if(session()->get("role") <= 2){
				$task = DB::connection('mysql')->table('restaurant')
					->where('restaurant.restaurant_id','=',$id)
					->select('restaurant.*')
					->first();
				return view('food.modal.editrestaurant',['data' => $task ]);
			}else{
				return redirect('/restaurantlist')->with('message','You Are Not Allowed To Edit Restaurant');
			}
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submiteditretaurant(Request $request){
		if(session()->get("email")){
			if(session()->get("role") <= 2){
				$this->validate($request, [
        	    'image'=>'mimes:jpeg,bmp,png|max:5120',
        	    'name'=>'required'
        	    ]);
			if($request->hasFile('image') && $request->image->isValid()){
	                    $number = rand(1,999);
	                    $numb = $number / 7 ;
	                    $extension = $request->image->extension();
	                    $filename  = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
	                    $filename = $request->image->move(public_path('restaurant'),$filename);
	                    $img = Image::make($filename)->resize(800,800, function($constraint) {
	                        $constraint->aspectRatio();
	                    });
	                    $img->save($filename);
						$filename = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
					}else{
	                $filename = 'no_image.jpg';    
	                }
	                if ($filename == 'no_image.jpg') {
	                	$addrestaurant =   DB::connection('mysql')->table('restaurant')
						->where('restaurant.restaurant_id', '=', $request->hdnrestaurantid)
						->update(['restaurant_name' => $request->name,'restaurant_otherdetails' => $request->details]);
	                }else{
				$addrestaurant =   DB::connection('mysql')->table('restaurant')
				->where('restaurant.restaurant_id', '=', $request->hdnrestaurantid)
				->update(['restaurant_name' => $request->name,
					'restaurant_picture' => $filename,
					'restaurant_otherdetails' => $request->details,
					'updated_at' => date('Y-m-d h:i:s'),
					'updated_by' => session()->get('id')]);
				}
				if($addrestaurant){
						return redirect('/restaurantlist')->with('message','Restaurant Updated Successfully');;
							}
				else{
						return redirect('/restaurantlist')->with('message','Oops! Something went wrong');;
					}
					}else{
						return redirect('/')->with('message','Reach HR For Access');
						}
			}else{
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
				} 
		}
		public function deleterestaurant($id){
			if(session()->get("email")){
				DB::connection('mysql')->table('restaurant')
				->where('restaurant.restaurant_id', '=', $id)
				->update(['status_id' => 1]);
					return redirect('/restaurantlist')->with('message','Restaurant Successfully Deleted!');
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
				} 
		}
		public function productlist($restaurantid){
		if(session()->get("email")){
			$taskres = DB::connection('mysql')->table('restaurant')
			->where('restaurant.restaurant_id','=',$restaurantid)
			->where('restaurant.status_id','=',2)
			->select('restaurant.*')
			->first();
			$task = DB::connection('mysql')->table('product')
			->join('restaurant','restaurant.restaurant_id','=','product.restaurant_id')
			->where('product.restaurant_id','=',$restaurantid)
			->where('product.status_id','=',2)
			->select('product.*','restaurant.*')
			->get();
			return view('food.productlist',['datares'=>$taskres,'data'=>$task,'id'=>$restaurantid]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function addproductmodal($id){
		if(session()->get("email")){
			if(session()->get("role") <= 2){
				$task = DB::connection('mysql')->table('restaurant')
				->where('restaurant.restaurant_id','=',$id)
				->where('restaurant.status_id','=',2)
				->select('restaurant.restaurant_id','restaurant.restaurant_name')
				->first();
				return view('food.modal.addproduct',['data'=>$task]);
			}else{
				return redirect('/productlist')->with('message','You Are Not Allowed To Add Product');
			}
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submitaddproduct(Request $request){
		if(session()->get("email")){
			if(session()->get("role") <= 2){
			$this->validate($request, [
        	    'image'=>'mimes:jpeg,bmp,png|max:5120|required',
        	    'name'=>'required',
        	    'amount'=>'required',
        	    'unit'=>'required',
        	    'quantity'=>'required',
    	    ]);
			if($request->hasFile('image') && $request->image->isValid()){
                    $number = rand(1,999);
			        $numb = $number / 7 ;
			        $extension = $request->image->extension();
                    $filename  = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
                    $filename = $request->image->move(public_path('product'),$filename);
			        $img = Image::make($filename)->resize(800,800, function($constraint) {
                        $constraint->aspectRatio();
                    });
			        $img->save($filename);
			        $filename = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
    	    }else{
                $filename = 'no_image.jpg';    
            }
     		$addproduct[] = array(
				'product_name' => $request->name,
				'product_picture' => $filename,
				'product_price' => $request->amount,
				'product_unit' => $request->unit,
				'product_quantity' => $request->quantity,
				'restaurant_id' => $request->restaurantid,
				'status_id' => 2,
				'created_by' => session()->get('id'),
				'created_at' => date('Y-m-d h:i:s')
				);
			DB::connection('mysql')->table('product')->insert($addproduct);
			if($addproduct){
					return redirect('/productlist/'.$request->restaurantid)->with('message','Product Added Successfully');;
			}
			else{
				return redirect('/productlist')->with('message','Oops! Something went wrong');;
			}
			}
			else{
				return redirect('/')->with('message','Reach HR For Access');
				}
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
			} 
	}
	public function editproductmodal($id){
		if(session()->get("email")){
			if(session()->get("role") <= 2){
				$task = DB::connection('mysql')->table('product')
					->where('product.product_id','=',$id)
					->select('product.*')
					->first();
				return view('food.modal.editproduct',['data' => $task ]);
			}else{
				return redirect('/productlist')->with('message','You Are Not Allowed To Edit Product');
			}
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submiteditproduct(Request $request){
		if(session()->get("email")){
			if(session()->get("role") <= 2){
				$this->validate($request, [
        	    'image'=>'mimes:jpeg,bmp,png|max:5120',
        	    'name'=>'required',
        	    'amount'=>'required',
        	    'unit'=>'required',
        	    'quantity'=>'required',
    	    ]);
			if($request->hasFile('image') && $request->image->isValid()){
	                    $number = rand(1,999);
	                    $numb = $number / 7 ;
	                    $extension = $request->image->extension();
	                    $filename  = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
	                    $filename = $request->image->move(public_path('product'),$filename);
	                    $img = Image::make($filename)->resize(800,800, function($constraint) {
	                        $constraint->aspectRatio();
	                    });
	                    $img->save($filename);
						$filename = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
					}else{
	                $filename = 'no_image.jpg';    
	                }
	                if ($filename == 'no_image.jpg') {
	                	// dd($filename);
	                	$addproduct =   DB::connection('mysql')->table('product')
						->where('product.product_id', '=', $request->hdnproductid)
						->update(['product_name' => $request->name,
							'product_price' => $request->amount,
							'product_unit' => $request->unit,
							'product_quantity' => $request->quantity]);
	                }else{
				$addproduct =   DB::connection('mysql')->table('product')
				->where('product.product_id', '=', $request->hdnproductid)
				->update(['product_name' => $request->name,
					'product_picture' => $filename,
					'product_price' => $request->amount,
					'product_unit' => $request->unit,
					'product_quantity' => $request->quantity,
					'updated_at' => date('Y-m-d h:i:s'),
					'updated_by' => session()->get('id')]);
				}
				if($addproduct){
						return redirect('/productlist/'.$request->hdnrestaurantid)->with('message','Restaurant Updated Successfully');
							}
				else{
						return redirect('/productlist/'.$request->hdnrestaurantid)->with('message','Oops! Something went wrong');
					}
					}else{
						return redirect('/')->with('message','Reach HR For Access');
						}
			}else{
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
				} 
		}
		public function deleteproduct($id){
			if(session()->get("email")){
				DB::connection('mysql')->table('product')
				->where('product.product_id', '=', $id)
				->update(['status_id' => 1]);
				$getrestaurantid = DB::connection('mysql')->table('product')
					->where('product.product_id','=',$id)
					->select('product.restaurant_id')
					->first();
					return redirect('/productlist/'.$getrestaurantid->restaurant_id)->with('message','Product Successfully Deleted!');
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
				} 
		}
		public function addtocart($id){
		if(session()->get("email")){
			$getids = explode(".", $id);
			$getproductpriceandqty = DB::connection('mysql')->table('product')
			->where('product_id','=',$getids[1])
			->select('product_price','product_quantity')
			->first();
			$addproduct[] = array(
				'restaurant_id' 		=> $getids[0],
				'product_id'			=> $getids[1],
				'order_productprice' 	=> $getproductpriceandqty->product_price,
				'order_productquantity' => $getproductpriceandqty->product_quantity,
				'order_status' => "Pending",
				'status_id' => 2,
				'created_by' => session()->get('id'),
				'created_at' => date('Y-m-d h:i:s')
				);
			DB::connection('mysql')->table('order')->insert($addproduct);
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
			} 
	}
	public function userorderlist(){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('order')
			->join('restaurant','restaurant.restaurant_id','=','order.restaurant_id')
			->join('product','product.product_id','=','order.product_id')
			->where('order.order_status','!=',"Deliver")
			->where('order.status_id','=',2)
			->where('order.created_by','=',session()->get('id'))
			->select('order.order_status','order.created_by','order.order_productprice','order.order_productquantity','product.*','restaurant.restaurant_name')
			->get();

			$ordercount = DB::connection('mysql')->table('order')
			->join('restaurant','restaurant.restaurant_id','=','order.restaurant_id')
			->join('product','product.product_id','=','order.product_id')
			->where('order.order_status','!=',"Deliver")
			->where('order.status_id','=',2)
			->where('order.created_by','=',session()->get('id'))
			->select('order.order_status','order.created_by','product.*','restaurant.restaurant_name')
			->sum('order.created_by');


			$proceedordercount = DB::connection('mysql')->table('order')
			->join('restaurant','restaurant.restaurant_id','=','order.restaurant_id')
			->join('product','product.product_id','=','order.product_id')
			->where('order.order_status','!=',"Proceed")
			->where('order.status_id','=',2)
			->where('order.created_by','=',session()->get('id'))
			->select('order.order_status','order.created_by','product.*','restaurant.restaurant_name')
			->sum('order.created_by');
			// dd($ordercount);
			return view('food.modal.orderlist',['data'=>$task, 'ordercount' => $ordercount, 'proceedordercount' => $proceedordercount]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function proceedorder(){
		if(session()->get("email")){
			$order =   DB::connection('mysql')->table('order')
			->where('order.order_status', '=', "Pending")
			->where('order.created_by', '=', session()->get('id'))
			->update(['order_status' => "Proceed",
				'updated_by' => session()->get('id'),
				'updated_at' => date('Y-m-d h:i:s')]);
			return redirect('/restaurantlist')->with('message','Order Proceed Successfully');
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
			} 
	}
	public function usercartlist($id){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('order')
			->join('restaurant','restaurant.restaurant_id','=','order.restaurant_id')
			->join('product','product.product_id','=','order.product_id')
			->where('restaurant.restaurant_id','=',$id)
			->where('order.order_status','!=',"Deliver")
			->where('order.status_id','=',2)
			->where('order.created_by','=',session()->get('id'))
			->select('order_id','order.order_status','order.created_by','order.order_productprice','order.order_productquantity','product.*','restaurant.restaurant_name')
			->get();

			$ordercount = DB::connection('mysql')->table('order')
			->join('restaurant','restaurant.restaurant_id','=','order.restaurant_id')
			->join('product','product.product_id','=','order.product_id')
			->where('order.order_status','!=',"Deliver")
			->where('order.status_id','=',2)
			->where('order.created_by','=',session()->get('id'))
			->select('order.order_status','order.created_by','product.*','restaurant.restaurant_name')
			->sum('order.created_by');
			// dd($task);
			return view('food.modal.cartlist',['data'=>$task, 'ordercount' => $ordercount]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function addmoretocart($id){
		if(session()->get("email")){
			$getorderidandprice = explode(".", $id);
			$getproductpriceandqty = DB::connection('mysql')->table('order')
			->where('order_id','=',$getorderidandprice[1])
			->select('order_productprice','order_productquantity')
			->first();
			$updateprice = $getproductpriceandqty->order_productprice+$getorderidandprice[2];
			$updateqty = $getproductpriceandqty->order_productquantity+$getorderidandprice[3];
			$order =   DB::connection('mysql')->table('order')
			->where('order.order_id', '=', $getorderidandprice[1])
			->update(['order_productprice' => $updateprice,
				'order_productquantity' => $updateqty,
				'updated_at' => date('Y-m-d h:i:s')]);
			// return redirect('/productlist')->with('message','Order Proceed Successfully');
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
			} 
	}
	public function deletefromcart($id){
		if(session()->get("email")){
			$getorderidandprice = explode(".", $id);
			$getproductpriceandqty = DB::connection('mysql')->table('order')
			->where('order_id','=',$getorderidandprice[1])
			->select('order_productprice','order_productquantity')
			->first();
			if($getproductpriceandqty->order_productquantity > $getorderidandprice[3]){
			$updateprice = $getproductpriceandqty->order_productprice-$getorderidandprice[2];
			$updateqty = $getproductpriceandqty->order_productquantity-$getorderidandprice[3];
			$order =   DB::connection('mysql')->table('order')
			->where('order.order_id', '=', $getorderidandprice[1])
			->update(['order_productprice' => $updateprice,
				'order_productquantity' => $updateqty,
				'updated_at' => date('Y-m-d h:i:s')]);
			}else{
			$updateprice = $getproductpriceandqty->order_productprice-$getorderidandprice[2];
			$order =   DB::connection('mysql')->table('order')
			->where('order.order_id', '=', $getorderidandprice[1])
			->update(['status_id' => 1,
				'updated_at' => date('Y-m-d h:i:s')]);
			}
			// return redirect('/productlist')->with('message','Order Proceed Successfully');
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
			} 
	}
	public function deliveryordertlist(){
		if(session()->get("email")){
			if(session()->get("role") <= 2){
			$task = DB::connection('mysql')->table('order')
			->join('elsemployees','elsemployees.elsemployees_empid','=','order.created_by')
			->join('hrm_department','hrm_department.dept_id','=','elsemployees.elsemployees_departid')
			->join('restaurant','restaurant.restaurant_id','=','order.restaurant_id')
			->join('product','product.product_id','=','order.product_id')
			->where('order.order_status','=',"Proceed")
			->where('order.status_id','=',2)
			->select('elsemployees.elsemployees_name','hrm_department.dept_name','order_id','order.order_status','order.created_by','order.order_productprice','order.order_productquantity','product.*','restaurant.restaurant_name')
			->get();
			}elseif(session()->get("role") == 3){
			$task = DB::connection('mysql')->table('order')
			->join('elsemployees','elsemployees.elsemployees_empid','=','order.created_by')
			->join('hrm_department','hrm_department.dept_id','=','elsemployees.elsemployees_departid')
			->join('restaurant','restaurant.restaurant_id','=','order.restaurant_id')
			->join('product','product.product_id','=','order.product_id')
			->where('order.order_status','=',"Proceed")
			->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
            ->orwhere('elsemployees.elsemployees_empid','=',session()->get("id"))
			->where('order.status_id','=',2)
			->select('elsemployees.elsemployees_name','hrm_department.dept_name','order_id','order.order_status','order.created_by','order.order_productprice','order.order_productquantity','product.*','restaurant.restaurant_name')
			->get();
			}else{
			$task = DB::connection('mysql')->table('order')
			->join('elsemployees','elsemployees.elsemployees_empid','=','order.created_by')
			->join('hrm_department','hrm_department.dept_id','=','elsemployees.elsemployees_departid')
			->join('restaurant','restaurant.restaurant_id','=','order.restaurant_id')
			->join('product','product.product_id','=','order.product_id')
			->where('order.order_status','=',"Proceed")
			->where('elsemployees.elsemployees_empid','=',session()->get("id"))
			->where('order.status_id','=',2)
			->select('elsemployees.elsemployees_name','hrm_department.dept_name','order_id','order.order_status','order.created_by','order.order_productprice','order.order_productquantity','product.*','restaurant.restaurant_name')
			->get();
			}
			return view('food.deliveryordertlist',['data'=>$task]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function cancelorcompleteorderlist(){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('order')
			->join('elsemployees','elsemployees.elsemployees_empid','=','order.created_by')
			->join('hrm_department','hrm_department.dept_id','=','elsemployees.elsemployees_departid')
			->join('restaurant','restaurant.restaurant_id','=','order.restaurant_id')
			->join('product','product.product_id','=','order.product_id')
			->where('order.order_status','=',"Deliver")
			->orwhere('order.order_status','=',"Cancel")
			->where('order.status_id','=',2)
			->select('elsemployees.elsemployees_name','hrm_department.dept_name','order_id','order.order_status','order.created_by','order.order_productprice','order.order_productquantity','product.*','restaurant.restaurant_name')
			->get();
			// dd($task);
			return view('food.cancelorcompleteorderlist',['data'=>$task]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function deliverd($id){
		if(session()->get("email")){
			$order =   DB::connection('mysql')->table('order')
			->where('order_id', '=', $id)
			->update(['order_status' => "Deliver",
				'updated_by' => session()->get('id'),
			'updated_at' => date('Y-m-d h:i:s')]);
		return redirect('/restaurantlist')->with('message','Order Delivered Successfully');
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
		} 
	}
	public function canceled($id){
		if(session()->get("email")){
			$order =   DB::connection('mysql')->table('order')
			->where('order_id', '=', $id)
			->update(['order_status' => "Cancel",
				'updated_by' => session()->get('id'),
			'updated_at' => date('Y-m-d h:i:s')]);
		return redirect('/restaurantlist')->with('message','Order Delivered Successfully');
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
		} 
	}
}