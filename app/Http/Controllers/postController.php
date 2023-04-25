<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;
use DB;
use Input;
use Excel;
use Carbon\Carbon;
use App\Http\Controllers\DateInterval;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class postController extends Controller
{
    public function selecttemplate(){
        return view('post.selecttemplate');
    }
    public function posteditor(Request $request){
        return view('post.template'.$request->template);
    }
}