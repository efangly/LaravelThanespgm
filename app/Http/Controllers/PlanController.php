<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Plan;
use App\detailplan;
use PDF;
use Auth;

class PlanController extends Controller
{
    public $day;
    public $start;
    public $end;
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $plans = Plan::where('userID','=', Auth::user()->userID)->paginate(7);
        return view('OnSite', compact('plans'));
    }

    public function report()
    {
        $plans = Plan::where('userID','=', Auth::user()->userID)->orderBy('Date_Start', 'DESC')->get();
        return view('Report', compact('plans'));
    }

    public function edit($id)
    {
        $DTplans = detailplan::where('ID_Plan','=',$id)->get();
        return view('Edit', compact('DTplans'));
    }

    public function update(Request $request)
    {
        $DTplans = detailplan::find ($request->ID_detial);
        $DTplans->Location_Plan = $request->Location_Plan;
        $DTplans->Detial_Plan = $request->Detial_Plan;
        $DTplans->Plan_Name_All = $request->Plan_Name_All;
        $DTplans->Money_Total = $request->Money_Total;
        $DTplans->save ();
        return response()->json($DTplans);
    }

    public function destroy(Request $request)
    {
        $plan = detailplan::find($request->ID_detialplan); 
        $plan->delete();
        return response()->json(['ID_detial'=> $request->ID_detialplan]);
    }

    public function destroyPlan(Request $request)
    {   
        $DTplans = detailplan::where('ID_Plan', '=', $request->ID_plan); 
        $DTplans->delete();
        $plan = Plan::find($request->ID_plan); 
        $plan->delete();
        return response()->json(['ID_plan'=> $request->ID_plan]);
    }

    public function Save(Request $request)
    {
      //เช็คtextboxว่าง
      $this->validate($request, [ 'Date_Start' => 'required',
                                  'Date_End' => 'required',
                                  'Money' => 'required',
                                  'Location' => 'required',
                                  'Plan' => 'required']);
       //add id plan
       $id = IdGenerator::generate(['table' => 'plans','field'=>'ID_Plan', 'length' => 8, 'prefix' =>'PL']);
       $userID = Auth::user()->userID;
       $dateStart = date("Y-m-d", strtotime($request->get('Date_Start')));
       $dateEnd = date("Y-m-d", strtotime($request->get('Date_End')));
       $money = $request->get('Money');
       $local = $request->get('Location');
       $plans = $request->get('Plan');
       $planname = $request->get('Plan_Name');
       //insert plan
       $plan = new Plan;
       $plan->ID_Plan = $id;
       $plan->userID = $userID;
       $plan->Date_Start = $dateStart;
       $plan->Date_End = $dateEnd;
       $plan->Money = $money;
       $plan->Location = $local;
       $plan->Plan = $plans;
       $plan->Plan_Name = $planname;
       $plan->Lastmodify = NOW();
       $plan->save();
       //create detailplan
       while (strtotime($dateStart) <= strtotime($dateEnd)) {
            $detailID = IdGenerator::generate(['table' => 'detailplans','field'=>'ID_detial', 'length' => 10, 'prefix' =>'DTP']);
            //insert Detailplan
            $dtplan = new detailplan;
            $dtplan->ID_detial = $detailID;
            $dtplan->ID_Plan = $id;
            $dtplan->userID = $userID;
            $dtplan->Date_PlanS = $dateStart;
            $dtplan->Detial_Plan = $plans;
            $dtplan->Location_Plan = $local;
            $dtplan->Plan_Name_All = $planname;
            $dtplan->Money_Total = $money;
            $dtplan->Lastmodify = NOW();
            $dtplan->save();
            $dateStart = date ("Y-m-d", strtotime("+1 day", strtotime($dateStart)));
        }
       
       return redirect()->route('Report')->with('success','บันทึกข้อมูลเรียบร้อย');
    }

    public function showPDFMonth($id)
    {
        $myArray = explode(',', $id);
        $DTplans = detailplan::whereIn('ID_Plan', $myArray)->orderBy('Date_PlanS', 'ASC')->get();
        $viewMonth = \View::make('PDF.MonthPDF', compact('DTplans'));
        $htmlMonth = $viewMonth->render();
        $pdf = new PDF();
        PDF::setHeaderCallback(function($pdf) {
            $pdf->SetXY(15, 15);
            $pdf->SetFont('thsarabunnew','B', 20);
            $pdf->Cell(0, 15, 'รายงานปฎิบัติงานประจําเดือน', 0, false, 'C', 0, '', 0, false, 'M', 'M');
            $pdf->SetXY(15, 30);
            $pdf->SetFont('thsarabunnew','B', 14);
            $pdf->Cell(0, 15, 'วันที่ : '. date("d/m/Y"), 0, false, 'R', 0, '', 0, false, 'M', 'M');
            $pdf->SetXY(15, 40);
            $pdf->SetFont('thsarabunnew','B', 16);
            $pdf->Cell(0, 15, '     ชื่อ : '.Auth::user()->Name, 0, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf->SetXY(15, 40);
            $pdf->SetFont('thsarabunnew','B', 16);
            $pdf->Cell(0, 15, 'แผนก : '.Auth::user()->Sine, 0, false, 'R', 0, '', 0, false, 'M', 'M');
        });
        PDF::setFooterCallback(function($pdf) {
            $table = '<table border="0">
            <tr><th style="width: 50%" align="center">...........................................................</th>
            <th style="width: 50%" align="center">...........................................................</th></tr>
            <tr><td style="width: 50%" align="center"> ผู้ขอเบิกค่ายานพาหนะ</td>
            <td style="width: 50%" align="center">ผู้จัดการแผนก </td></tr>
            <tr><td style="width: 50%" align="center"></td>
            <td style="width: 50%" align="center"></td></tr>
            <tr><td style="width: 50%" align="center">...........................................................</td>
            <td style="width: 50%" align="center">...........................................................</td></tr>
            <tr><td style="width: 50%" align="center"> ผู้จัดการบัญชี</td>
            <td style="width: 50%" align="center">กรรมการผู้จัดการ/ผู้จัดการทั่วไป</td></tr></table>';
            $pdf->SetFont('thsarabunnew','B', 14);
            $pdf->SetY(-45);
            $pdf->writeHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'L', true);
            $pdf->SetY(-15);
            $pdf->SetFont('thsarabunnew','B', 12);
            $pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
        });
        $pdf::SetMargins(20, 50, 20);
        $pdf::SetAutoPageBreak(TRUE,55);
        $pdf::SetTitle('รายงานประจำเดือน(การเงิน)');
        $pdf::AddPage();
        $pdf::SetFont('thsarabunnew','B', 14);
        $pdf::WriteHTML($htmlMonth,true,false,true,false);
        $pdf::Output('Month.pdf');
    }

    public function setData($day,$start,$end){
        $this->day = $day;
        $this->start = $start;
        $this->end = $end;
    }

    public function showPDFMoney($id)
    {
        $myArray = explode(',', $id);
        $DTplans = detailplan::whereIn('ID_Plan', $myArray)->orderBy('Date_PlanS', 'ASC')->get();
        $this->setData(count($DTplans),$DTplans[0]->Date_PlanS,$DTplans[count($DTplans)-1]->Date_PlanS);
        $viewMoney = \View::make('PDF.MoneyPDF', compact('DTplans'));
        $htmlMoney = $viewMoney->render();
        $pdfMoney = new PDF();
        PDF::setHeaderCallback(function($pdf) {
            $pdf->SetXY(15, 16);
            $pdf->SetFont('thsarabunnew','B', 20);
            $pdf->Cell(0, 15, 'การชำระบัญชีเงินทดรองจ่าย', 0, false, 'C', 0, '', 0, false, 'M', 'M');
            $pdf->SetXY(15, 23);
            $pdf->Cell(0, 15, 'ค่าใช้จ่ายการเดินทางไปต่างจังหวัด/ต่างประเทศ', 0, false, 'C', 0, '', 0, false, 'M', 'M');
            $pdf->SetXY(15, 30);
            $pdf->SetFont('thsarabunnew','B', 14);
            $pdf->Cell(0, 15, 'วันที่ : '. date("d/m/Y"), 0, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf->Cell(0, 15, 'อ้างใบเบิกทดรองจ่ายเลขที่ : ................', 0, false, 'R', 0, '', 0, false, 'M', 'M');
            $pdf->SetXY(15, 37);
            $pdf->Cell(0, 15, 'ชื่อ : '.Auth::user()->Name, 0, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf->Cell(0, 15, 'แผนก : '.Auth::user()->Sine, 0, false, 'R', 0, '', 0, false, 'M', 'M');
            $pdf->SetXY(15, 44);
            $pdf->Cell(0, 15, 'จำนวนเงินที่เบิก : ................................................บาท', 0, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf->Cell(0, 15, '(............................................................................)', 0, false, 'R', 0, '', 0, false, 'M', 'M');
            $pdf->SetXY(15, 51);
            $pdf->Cell(0, 15, 'ชำระบัญชีเป็นค่าใช้จ่ายจำนวนเงิน : ..........................................บาท', 0, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf->Cell(0, 15, '(............................................................................)', 0, false, 'R', 0, '', 0, false, 'M', 'M');
            $pdf->SetXY(15, 58);
            $pdf->Cell(0, 15, 'ตามระยะเวลาในการเดินทาง : ..........'.$this->day.'..........วัน', 0, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf->Cell(0, 15, 'ตั้งแต่วันที่..........'.date("d/m/Y",strtotime($this->start)).'..........ถึง..........'.date("d/m/Y",strtotime($this->end)).'.......... ', 0, false, 'R', 0, '', 0, false, 'M', 'M');
            $pdf->SetXY(15, 65);
            $pdf->Cell(0, 15, 'หมายเหตุ. : เบิกก่อนเดินทางอย่างน้อย 7 วัน และต้องชำระภายใน 7 วัน นับจากสิ้นสุดการเดินทาง', 0, false, 'L', 0, '', 0, false, 'M', 'M');
        });
        PDF::setFooterCallback(function($pdf) {
            $table = '<table border="0">
            <tr><th style="width: 50%" align="center">...........................................................</th>
            <th style="width: 50%" align="center">...........................................................</th></tr>
            <tr><td style="width: 50%" align="center"> กรรมการผู้จัดการ/ผู้จัดการทั่วไป</td>
            <td style="width: 50%" align="center">ผู้ขอเบิกค่าใช้จ่าย </td></tr>
            <tr><td style="width: 50%" align="center">...........................................................</td>
            <td style="width: 50%" align="center">...........................................................</td></tr>
            <tr><td style="width: 50%" align="center"> ผู้จัดการแผนกบัญชี</td>
            <td style="width: 50%" align="center">ผู้จัดการเขต</td></tr>
            <tr><td style="width: 50%" align="center"></td>
            <td style="width: 50%" align="center">...........................................................</td></tr>
            <tr><td style="width: 50%" align="center"></td>
            <td style="width: 50%" align="center">ผู้จัดการแผนก</td></tr></table>';
            $sum = '<table border="0">
            <tr><td style="width: 64%" align="center"><table border="0">
            <tr><td align="right">ค่าใช้จ่ายทั้งสิ้น&nbsp;&nbsp;&nbsp;</td></tr><tr><td align="right">หักยอดเบิกทดลองจ่าย&nbsp;&nbsp;&nbsp;</td></tr>
            <tr><td align="right">ยอดเงินคงเหลือ..............จ่ายเพิ่ม&nbsp;&nbsp;&nbsp;</td></tr></table></td>
            <td style="width: 36%" align="center"><table border="1">
            <tr><th style="width: 21%" align="center"></th>
            <th style="width: 20%" align="center"></th>
            <th style="width: 20%" align="center"></th>
            <th style="width: 20%" align="center"></th>
            <th style="width: 20%" align="center"></th></tr>
            <tr><td style="width: 21%" align="center"></td>
            <td style="width: 20%" align="center"></td>
            <td style="width: 20%" align="center"></td>
            <td style="width: 20%" align="center"></td>
            <td style="width: 20%" align="center"></td></tr>
            <tr><td style="width: 21%" align="center"></td>
            <td style="width: 20%" align="center"></td>
            <td style="width: 20%" align="center"></td>
            <td style="width: 20%" align="center"></td>
            <td style="width: 20%" align="center"></td></tr></table></td></tr></table>';
            $pdf->SetFont('thsarabunnew','B', 14);
            $pdf->SetY(-75);
            $pdf->writeHTMLCell(0, 0, '', '', $sum, 0, 1, 0, true, '', true);
            $pdf->SetFont('thsarabunnew','B', 14);
            $pdf->SetY(-50);
            $pdf->writeHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'L', true);
            $pdf->SetY(-15);
            $pdf->SetFont('thsarabunnew','B', 10);
            $pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
        });
        $pdfMoney::SetMargins(10, 70, 10);
        $pdfMoney::SetAutoPageBreak(TRUE,85);
        $pdfMoney::SetTitle('การเงิน');
        $pdfMoney::AddPage();
        $pdfMoney::SetFont('thsarabunnew','B', 14);
        $pdfMoney::WriteHTML($htmlMoney,true,false,true,false);
        $pdfMoney::Output('Money.pdf');
    }

    public function showPDFHR($id)
    {
        $myArray = explode(',', $id);
        $DTplans = detailplan::whereIn('ID_Plan', $myArray)->orderBy('Date_PlanS', 'ASC')->get();
        $viewHR = \View::make('PDF.HrPDF', compact('DTplans'));
        $htmlHR = $viewHR->render();
        $pdfHR = new PDF();
        PDF::setHeaderCallback(function($pdf) {
            $pdf->SetXY(15, 15);
            $pdf->SetFont('thsarabunnew','B', 18);
            $pdf->Cell(0, 15, 'รายงานการออกนอกสถานที่', 0, false, 'C', 0, '', 0, false, 'M', 'M');
            $pdf->SetXY(15, 25);
            $pdf->SetFont('thsarabunnew','B', 16);
            $pdf->Cell(0, 15, 'วันที่เขียนเอกสาร : '. date("d/m/Y"), 0, false, 'R', 0, '', 0, false, 'M', 'M');
            $pdf->SetXY(15, 25);
            $pdf->SetFont('thsarabunnew','B', 16);
            $pdf->Cell(0, 15, 'ชื่อ : '.Auth::user()->Name.'   ตำแหน่ง: '.Auth::user()->Sine.'   ฝ่าย/แผนก :  IT Programmer', 0, false, 'L', 0, '', 0, false, 'M', 'M');
        });
        PDF::setFooterCallback(function($pdf) {
            $pdf->SetY(-15);
            $pdf->SetFont('thsarabunnew','B', 12);
            $pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
        });
        $pdfHR::SetMargins(10, 30, 10);
        $pdfHR::SetAutoPageBreak(TRUE,23);
        $pdfHR::SetTitle('HR');
        $pdfHR::AddPage('L');
        $pdfHR::SetFont('thsarabunnew','B', 16);
        $pdfHR::WriteHTML($htmlHR,true,false,true,false);
        $pdfHR::Output('HR.pdf');
    }

    public function allPDF($id)
    {
        $pdf = $this->showPDFHR($id);
        /*$mpdf = $this->showPDFMoney($id);
        $pdf::Output('HR.pdf','D');
        $mpdf::Output('Money.pdf','D');*/
    }
}

