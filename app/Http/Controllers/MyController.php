<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class MyController extends Controller
{
    public function logout(){
	
     DB::connection('mysql')->table('elsemployees')
        ->where('elsemployees_empid','=',session()->get("id"))
        ->update([
        'user_loginstatus'    => "Offline",
        ]); 
		session()->forget('batchid');
		session()->forget('id');
		session()->forget('name');
		session()->forget('role');
		session()->forget('image');
		session()->forget('email');
		return view('welcome');
	}
	public function forgetpassword()
    {
      return view('forgetpassword');
    }
    public function forget_submit(Request $get)
    {
    	if($get->email == ""){
            return redirect('/')->with('message','Please Enter Email');
        }
      $verify_token =  $this->generateRandomString(100);
      $data = array();
      $data['verify_token'] = $verify_token;
       $cmd = DB::connection('mysql')->table('elsemployees')
                 ->where('elsemployees_email', $get->email)
                 ->update(['verify_token' => $verify_token]);
      if($cmd){
        $toemail = $get->email;
              Mail::send('email.forget_password', ['name' => 'web',
                    'email' => 'muhammad.mehroz@bizzworld.com','verify_token' => $verify_token,],
                function ($message) use ($toemail) {
                  $message->to($toemail)
                //->subject('Employee Leave Request Submited By: Noman');
                ->subject('Forget Password');
                });
        return redirect('/forgetpassword')->with('message','Check Your Email'); 
      } else{
        return redirect('/forgetpassword')->with('message','Something went wrong'); 
      }
                
      //dd($get);
    }
    public function forget($verify_token)
    {
      $result =  DB::connection('mysql')->table('elsemployees')
                 ->where('verify_token', '=',$verify_token)
                 ->select('elsemployees.elsemployees_empid')->first();

      if(!empty($result)){
        $data = array();
        $data['verify_token'] = $verify_token;
       return view('resetpassword',$data);
      } else{
         return redirect('/')->with('message','Link Expired.');
      }
    }
    public function reset_submit(Request $get)
    {
      //dd($get);
      $cmd = DB::connection('mysql')->table('elsemployees')
                 ->where('verify_token', $get->verify_token)
                 ->update(['elsemployees_password' => $get->password,'verify_token' => '']);
      if($cmd){
        return redirect('/')->with('message','Password Has been Reset Successfully.'); 
      } else{
        return redirect('/')->with('message','Something Went Wrong'); 
      }
    }

    public  function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
	
	
}
