<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Project;
use App\ProjectDetail;
use Auth;

class MonitorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $project = Project::orderBy('Project_Start', 'DESC')->get();
        return view('Monitor.TimeLine', compact('project'));
    }
    
    public function Detail($id)
    {
        $project = ProjectDetail::where('ID_Project','=',$id)->get();
        $hospital = Project::where('ID_Project','=',$id)->get();
        return view('Monitor.TimeLineDetail', compact('project','hospital'));
    }

    public function projectlist()
    {
        $project = Project::orderBy('Project_Start', 'DESC')->get();
        return view('Monitor.ProjectManager', compact('project'));
    }

    public function createproject()
    {
        return view('Monitor.CreateProject');
    }

    public function updateproject($id)
    {
        $project = ProjectDetail::where('ID_Project','=',$id)->get();
        $hospital = Project::where('ID_Project','=',$id)->get();
        return view('Monitor.UpdateProject', compact('project','hospital'));
    }

    public function Save(Request $request)
    {
        //add Project
        $id = IdGenerator::generate(['table' => 'projects','field'=>'ID_Project', 'length' => 8, 'prefix' =>'PJ']);
        $userID = Auth::user()->userID;
        $dateStart = date("Y-m-d", strtotime($request->get('Project_Start')));
        $dateEnd = date("Y-m-d", strtotime($request->get('Project_End')));
        $projectname = $request->get('ProjectSite');
        $hospital = $request->get('Hospital');
        //insert Project
        $project = new Project;
        $project->ID_Project = $id;
        $project->userID = $userID;
        $project->Project_Start = $dateStart;
        $project->Project_End = $dateEnd;
        $project->ProjectSite = $projectname;
        $project->Hospital = $hospital;
        $project->Task = "0";
        $project->save();

        //add DetailProject
        $idDetail = IdGenerator::generate(['table' => 'project_details','field'=>'ID_ProjectDetail', 'length' => 8, 'prefix' =>'PD']);
        $acceptuser = Auth::user()->userID;

        //insert Project
        $projectDT = new ProjectDetail;
        $projectDT->ID_ProjectDetail = $idDetail;
        $projectDT->ID_Project = $id;
        $projectDT->productname = $projectname;
        $projectDT->interface = "คุยสรุปเรื่องการ Interface";
        $projectDT->interfacedatestart = $dateStart;
        $projectDT->interfacedateend = $dateEnd;
        $projectDT->interfaceowner = "";
        $projectDT->interfacestatus = "In Progress";
        $projectDT->data = "รอข้อมูลตัวอย่าง เพื่อทดสอบระบบเบื้องต้น";
        $projectDT->datadatestart = $dateStart;
        $projectDT->datadateend = $dateEnd;
        $projectDT->dataowner = "";
        $projectDT->datastatus = "In Progress";
        $projectDT->test = "ทดสอบการเชื่อมต่อข้อมูล";
        $projectDT->testdatestart = $dateStart;
        $projectDT->testdateend = $dateEnd;
        $projectDT->testowner = "";
        $projectDT->teststatus = "In Progress";
        $projectDT->install = "เครื่องเข้าติดตั้ง";
        $projectDT->installdatestart = $dateStart;
        $projectDT->installdateend = $dateEnd;
        $projectDT->installowner = "";
        $projectDT->installstatus = "In Progress";
        $projectDT->setting = "ตั้งค่าและทดสอบอุปกรณ์";
        $projectDT->settingdatestart = $dateStart;
        $projectDT->settingdateend = $dateEnd;
        $projectDT->settingowner = "";
        $projectDT->settingstatus = "In Progress";
        $projectDT->edit = "ติดตั้ง แก้ไข ตั้งค่า ทดสอบระบบ";
        $projectDT->editdatestart = $dateStart;
        $projectDT->editdateend = $dateEnd;
        $projectDT->editowner = "";
        $projectDT->editstatus = "In Progress";
        $projectDT->train = "อบรมและทดลองใช้งานจริง";
        $projectDT->traindatestart = $dateStart;
        $projectDT->traindateend = $dateEnd;
        $projectDT->trainowner = "";
        $projectDT->trainstatus = "In Progress";
        $projectDT->using = "ใช้งานจริง";
        $projectDT->usingdatestart = $dateStart;
        $projectDT->usingdateend = $dateEnd;
        $projectDT->usingowner = "";
        $projectDT->usingstatus = "In Progress";
        $projectDT->check = "ส่งงานและตรวจรับ";
        $projectDT->checkdatestart = $dateStart;
        $projectDT->checkdateend = $dateEnd;
        $projectDT->checkowner = "";
        $projectDT->checkstatus = "In Progress";
        $projectDT->standby = "Standby";
        $projectDT->standbydatestart = $dateStart;
        $projectDT->standbydateend = $dateEnd;
        $projectDT->standbyowner = "";
        $projectDT->standbystatus = "In Progress";
        $projectDT->acceptuser = Auth::user()->Nick_name;
        $projectDT->save ();

        return redirect()->route('Project')->with('success','บันทึกข้อมูลเรียบร้อย');
    }

    public function updatesave(Request $request)
    {
        $projectDT = ProjectDetail::find($request->get('ID_ProjectDetail'));
        $projectDT->interfacedatestart = $request->interface_Start;
        $projectDT->interfacedateend = $request->interface_End;
        $projectDT->interfaceowner = $request->interfaceTXT;
        $projectDT->interfacestatus = $request->InterfaceStatus;
        $projectDT->datadatestart = $request->data_Start;
        $projectDT->datadateend = $request->data_End;
        $projectDT->dataowner = $request->dataTXT;
        $projectDT->datastatus = $request->dataStatus;
        $projectDT->testdatestart = $request->test_Start;
        $projectDT->testdateend = $request->test_End;
        $projectDT->testowner = $request->testTXT;
        $projectDT->teststatus = $request->testStatus;
        $projectDT->installdatestart = $request->install_Start;
        $projectDT->installdateend = $request->install_End;
        $projectDT->installowner = $request->installTXT;
        $projectDT->installstatus = $request->installStatus;
        $projectDT->settingdatestart = $request->setting_Start;
        $projectDT->settingdateend = $request->setting_End;
        $projectDT->settingowner = $request->settingTXT;
        $projectDT->settingstatus = $request->settingStatus;
        $projectDT->editdatestart = $request->edit_Start;
        $projectDT->editdateend = $request->edit_End;
        $projectDT->editowner = $request->editTXT;
        $projectDT->editstatus = $request->editStatus;
        $projectDT->traindatestart = $request->train_Start;
        $projectDT->traindateend = $request->train_End;
        $projectDT->trainowner = $request->trainTXT;
        $projectDT->trainstatus = $request->trainStatus;
        $projectDT->usingdatestart = $request->using_Start;
        $projectDT->usingdateend = $request->using_End;
        $projectDT->usingowner = $request->usingTXT;
        $projectDT->usingstatus = $request->usingStatus;
        $projectDT->checkdatestart = $request->check_Start;
        $projectDT->checkdateend = $request->check_End;
        $projectDT->checkowner = $request->checkTXT;
        $projectDT->checkstatus = $request->checkStatus;
        $projectDT->standbydatestart = $request->standby_Start;
        $projectDT->standbydateend = $request->standby_End;
        $projectDT->standbyowner = $request->standbyTXT;
        $projectDT->standbystatus = $request->standbyStatus;
        $projectDT->acceptuser = Auth::user()->Nick_name;
        //$projectDT->save();
        //cals percent project
        $task=array($request->InterfaceStatus,$request->dataStatus,$request->testStatus,$request->installStatus,$request->settingStatus
                    ,$request->editStatus,$request->trainStatus,$request->usingStatus,$request->checkStatus,$request->standbyStatus);
        $counts = array_count_values($task);
        $project = Project::find($request->get('ID_Project'));
        $project->Task = $counts['20'].'0';
        $project->save();
        return redirect()->route('Project')->with('success','บันทึกข้อมูลเรียบร้อย');
    }
}
