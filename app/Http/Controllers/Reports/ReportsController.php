<?php

namespace App\Http\Controllers\Reports;

use App\User;
use Carbon\Carbon;

use App\Model\Farm\Farmer;
use App\Model\Sacco\Sacco;

use App\Model\Settings\Ward;

use Illuminate\Http\Request;

use App\Model\Settings\County;
use App\Model\PrintHeadSetting;
use App\Model\Sacco\SaccoMember;
use App\Model\Settings\Location;
use App\Model\Settings\SubCounty;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\CommonRepository;

class ReportsController extends Controller
{

    public function __construct(CommonRepository $commonRepository)
    {
        $this->commonRepository = $commonRepository;
    }


    public function index(Request $request)
    {

        $groupList =Sacco::get();
        $results = [];
        if ($_POST) {
            $result = $this->fetch($request->sacco_id);
        }
        $data = [
            'results'            =>  $results,
            'groupList'         =>  $groupList,
            'from_date'         =>  $request->from_date,
            'to_date'           =>  $request->to_date,
            'sacco_id'          =>  $request->sacco_id,
        ];

        return view('admin.reports.index', $data);
    }
    private function fetch($id)
    {
        return Sacco::where('sacco_id', $id)->first();
    }

    public function groupReport(Request $request){
        $groupList = Sacco ::get();

        $results = [];

        if ($_POST) {
            $results = Sacco::where('sacco_id', $request->sacco_id)
               ->orderBy('sacco_id', 'DESC')
                ->get();
        }
        return view('admin.reports.groupReport',['results'=>$results, 'groupList'=>$groupList, 'sacco_id'=>$request->sacco_id]);

    }

    public function downloadGroupReport(Request $request){
        $groupInfo     = Sacco::where('sacco_id', $request->sacco_id)->first();
        $printHead     = PrintHeadSetting::first();
        $results       = Sacco::where('sacco_id', $request->sacco_id)
                      ->orderBy('sacco_id', 'DESC')
                      ->get();

        $data = [
            'results'           =>  $results,
            'printHead'         =>  $printHead,
            'sacco_name'     =>  $groupInfo->sacco_name,
        ];

        $pdf = PDF::loadView('admin.reports.pdf.groupReportPdf', $data);
        $pdf->setPaper('A4', 'landscape');
        $pageName = $groupInfo->sacco_name . "group.pdf";
        return $pdf->download($pageName);

    }


    public function loansReport(Request $request){

        $groupList = Sacco ::get();


        $results=[];
        if ($_POST) {
            $results = Sacco::where('sacco_id', $request->sacco_id)
                ->whereBetween('created_at', [dateConvertFormtoDB($request->from_date), dateConvertFormtoDB($request->to_date)])
                ->orderBy('sacco_id', 'DESC')
                ->get();
        }

                return view('admin.reports.loansReport',['groupList'=>$groupList,'results' =>$results,'sacco_id'=>$request->sacco_id]);
    }

    public function downloadLoansReport(Request $request){
        $groupInfo     = Sacco::where('sacco_id', $request->sacco_id)->first();
        $printHead     = PrintHeadSetting::first();
        $results       = Sacco::where('sacco_id', $request->sacco_id)
                       ->whereBetween('created_at', [dateConvertFormtoDB($request->from_date), dateConvertFormtoDB($request->to_date)])
                      ->orderBy('sacco_id', 'DESC')
                      ->get();

        $data = [
            'results'           =>  $results,
            'from_date'         =>  dateConvertFormtoDB($request->from_date),
            'to_date'           =>  dateConvertFormtoDB($request->to_date),
            'printHead'         =>  $printHead,
            'sacco_name'     =>  $groupInfo->sacco_name,
        ];

        $pdf = PDF::loadView('admin.reports.pdf.loansReportPdf', $data);
        $pdf->setPaper('A4', 'landscape');
        $pageName = $groupInfo->sacco_name . "-loans-Report.pdf";
        return $pdf->download($pageName);

    }

    public function savingsReport(Request $request){

        $groupList = Sacco ::get();


        $results=[];
        if ($_POST) {
            $results = Sacco::where('sacco_id', $request->sacco_id)
                ->whereBetween('created_at', [dateConvertFormtoDB($request->from_date), dateConvertFormtoDB($request->to_date)])
                ->orderBy('sacco_id', 'DESC')
                ->get();
        }

                return view('admin.reports.savingsReport',['groupList'=>$groupList,'results' =>$results,'sacco_id'=>$request->sacco_id]);
    }

    public function downloadsavingsReport(Request $request){

        $groupInfo     = Sacco::where('sacco_id', $request->sacco_id)->first();
        $printHead     = PrintHeadSetting::first();
        $results       = Sacco::where('sacco_id', $request->sacco_id)
                       ->whereBetween('created_at', [dateConvertFormtoDB($request->from_date), dateConvertFormtoDB($request->to_date)])
                      ->orderBy('sacco_id', 'DESC')
                      ->get();

        $data = [
            'results'           =>  $results,
            'from_date'         =>  dateConvertFormtoDB($request->from_date),
            'to_date'           =>  dateConvertFormtoDB($request->to_date),
            'printHead'         =>  $printHead,
            'sacco_name'        =>  $groupInfo->sacco_name,
        ];

        $pdf = PDF::loadView('admin.reports.pdf.savingsReportPdf', $data);
        $pdf->setPaper('A4', 'landscape');
        $pageName = $groupInfo->sacco_name . "-savings-Report.pdf";
        return $pdf->download($pageName);
    }

 /*    public function pdfexport(Request $request)
    {
        $sacco= Sacco::find('sacco_id', $request->sacco_id);

        $pdf = PDF::loadView('admin.reports.pdf.savingsReportPdf',['sacco' => $sacco])->setPaper('A4','landscape');


        $fileName = $sacco->sacco_name;
        return $pdf->stream($fileName . '$pdf');


    } */
/*
    public function farmersReport(Request $request){

        $farmersList = User::where('role_id', 10)->get();


        if($_POST){
            $data = User::with(['farmer','livestock','harvest'])
                   ->whereBetween('created_at',[dateConvertDBtoForm($request->from_date), dateConvertDBtoForm($request->to_date)])
                   ->get();
                }
                else{
                    $data = User::with(['farmer','livestock','harvest'])
                    ->whereBetween('created_at', [date('Y-01-01'), date('Y-m-d')])
                    ->get();
                }
                return view('admin.reports.savingsReport',['farmersList'=>$farmersList,'data' =>$data]);
    }
 */

    public function countyReport(Request $request){

        $countyList = $this->commonRepository->countyList();

        $results = [];

        if ($_POST) {
            $results = Sacco::where('county_id', $request->county_id)
               ->orderBy('sacco_id', 'DESC')
                ->get();
        }
                return view('admin.reports.countyReport',['results'=>$results, 'countyList'=>$countyList, 'county_id'=>$request->county_id]);
    }

    public function downloadCountyReport(Request $request){
        $countyInfo     = Sacco::with('county')->where('county_id', $request->county_id)->first();
        $printHead     = PrintHeadSetting::first();
        $results       = Sacco::where('county_id', $request->county_id)
                      ->orderBy('county_id', 'DESC')
                      ->get();

        $data = [
            'results'           =>  $results,
            'printHead'         =>  $printHead,
            'county_name'     =>  $countyInfo->county->county_name,
        ];

        $pdf = PDF::loadView('admin.reports.pdf.countyReportPdf', $data);
        $pdf->setPaper('A4', 'landscape');
        $pageName = "county-Report.pdf";
        return $pdf->download($pageName);

    }


   public function subcountyReport(Request $request){
       $subcountyList = $this->commonRepository->SubcountyList();

       $results=[];

       if($_POST){
           $results = Sacco::where('sub_county_id',$request->sub_county_id)
                   ->orderBy('sacco_id','Desc')
                   ->get();
       }
         return view('admin.reports.subcountyReport',['results'=>$results,'subcountyList' =>$subcountyList,'sub_county_id'=>$request->sub_county_id]);
   }

   public function downloadSubCountyReport(Request $request){
    $subcountyInfo     = Sacco::with('sub_county')->where('sub_county_id', $request->sub_county_id)->first();
    $printHead     = PrintHeadSetting::first();
    $results       = Sacco::where('sub_county_id', $request->sub_county_id)
                  ->orderBy('sub_county_id', 'DESC')
                  ->get();

    $data = [
        'results'           =>  $results,
        'printHead'         =>  $printHead,
        'sub_county_name'     =>  $subcountyInfo->sub_county->sub_county_name,
    ];

    $pdf = PDF::loadView('admin.reports.pdf.subcountyReportPdf', $data);
    $pdf->setPaper('A4', 'landscape');
    $pageName = "subcounty-Report.pdf";
    return $pdf->download($pageName);

}

   public function wardReport(Request $request){
    $wardList = $this->commonRepository->wardList();

    $results=[];

    if($_POST){
        $results = Sacco::where('ward_id',$request->ward_id)
                ->orderBy('sacco_id','Desc')
                ->get();
    }
      return view('admin.reports.wardReport',['results'=>$results,'wardList' =>$wardList,'ward_id'=>$request->ward_id]);
}

public function downloadWardReport(Request $request){
    $wardInfo     = Sacco::with('ward')->where('ward_id', $request->ward_id)->first();
    $printHead     = PrintHeadSetting::first();
    $results       = Sacco::where('ward_id', $request->ward_id)
                  ->orderBy('ward_id', 'DESC')
                  ->get();

    $data = [
        'results'           =>  $results,
        'printHead'         =>  $printHead,
        'ward_name'     =>  $wardInfo->ward->ward_name,
    ];

    $pdf = PDF::loadView('admin.reports.pdf.wardReportPdf', $data);
    $pdf->setPaper('A4', 'landscape');
    $pageName = "ward-Report.pdf";
    return $pdf->download($pageName);

}

}
