<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use File;
use App\User;
use App\CheckWorking;
use Auth;
class CheckWorkingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $check = CheckWorking::orderBy('lastmodified', 'DESC')->paginate(6);
        return view('CheckWorking', compact('check'));
    }

    public function Save(Request $request)
    {
       $id = IdGenerator::generate(['table' => 'check_workings','field'=>'id_checkworking', 'length' => 8, 'prefix' =>'CH']);
       $name = Auth::user()->Name;
       $checkstatus = $request->get('checkworking_status');
       switch ($checkstatus){
        case "office":
          $status = 'เข้าออฟฟิศ';
          break;
        case "onsite":
          $status = 'ออกนอกสถานที่ : '.$request->get('locationname');
          break;
        case "leavework":
          $status = $request->get('leavetype')." : ".$request->get('leaveworking');
          break;
        case "other":
          $status = 'อื่นๆ : '.$request->get('otherr');
          break;
        default:
          return redirect()->route('CheckWorking');
       }
       $position = $request->get('position');
       $ipaddress = $this->getIp();
       if($request->file('select_image') != null){
        $image = $request->file('select_image');
        $new_name = Auth::user()->userID . date('mdYHis') . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/working'), $new_name);
        $imgpath = '/images/working/'.$new_name;
       }
       else{
        $imgpath = NULL;
       }    
       //insert checkworking
       $check = new CheckWorking;
       $check->id_checkworking = $id;
       $check->name = $name;
       $check->status = $status;
       $check->position = $position;
       $check->ipaddress = $ipaddress;
       $check->imgpath = $imgpath;
       $check->lastmodified = NOW();
       $check->save();

       return redirect()->route('CheckWorking')->with('success','บันทึกข้อมูลเรียบร้อย');
    }

    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }
}
