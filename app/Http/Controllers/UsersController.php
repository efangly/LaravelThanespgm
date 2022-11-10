<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use File;
use App\User;
use App\Plan;
use Auth;
class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['checklogin'] ]);
    }
    
    public function index()
    {
      $users = User::where('userID','=', Auth::user()->userID)->get();
      $plan = Plan::where('userID','=', Auth::user()->userID)->take(3)->orderBy('Lastmodify', 'DESC')->get();
      return view('Home', compact('users','plan'));
    }

    public function checklogin(Request $request)
    {
      $user_data = array(
        'username'  => $request->get('username'),
        'password' => $request->get('password')
       );
      if(Auth::attempt($user_data))
      {
        if(Auth::user()->Status == 'Guest'){
          return redirect('/Monitor/Timeline');
        }
        else{
          return redirect('/');
        }
      }
      else
      {
        return back()->with('error', 'Wrong Login');
      }
    }

    public function listUser()
    {
      $users = User::all()->toArray();
      return view('CreatePlan', compact('users'));
    }

    public function createUser(Request $request)
    {
      $users = new User;
      $users->userID = $request->get('userid');
      $users->username = $request->get('username');
      $users->password = Hash::make($request->get('pass'));
      $users->Name = $request->get('firstname') . "  " . $request->get('lastname');
      $users->Nick_name = $request->get('firstname');
      $users->Sine = $request->get('sine');
      $users->Department = "IT Programmer";
      $users->email = $request->get('email');
      $users->Status = $request->get('status');
      $users->NN = $request->get('nickname');
      $users->remember_token = Str::random(40);
      $users->save();
      return redirect()->route('showUser')->with('success','บันทึกข้อมูลเรียบร้อย');
    }

    public function show()
    {
      if (Auth::user()->Status == 'Admin'){
        $user = User::paginate(6);
        return view('AddUser', compact('user'));
      }
      else{
        return back()->with('error', 'สำหรับ Admin เท่านั้น');
      }
    }

    function upload(Request $request)
    {
      $image = $request->file('select_image');      
      $new_name = Auth::user()->userID . date('mdYHis') . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('images/profile'), $new_name);
      File::delete(public_path(Auth::user()->profile));
      //update path to database
      $users = User::find(Auth::user()->userID);
      $users->profile = '/images/profile/'.$new_name;
      $users->save();
      return back()->with('success', 'อัพโหลดไฟล์เรียบร้อยแล้ว');
    }      

    public function update(Request $request, $id)
    {
        //
    }
    
    public function destroyUser(Request $request)
    {
      $users = User::find($request->userId); 
      $users->delete();
      return response()->json(['userID'=> $request->userId]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
