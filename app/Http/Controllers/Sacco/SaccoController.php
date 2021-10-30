<?php

namespace App\Http\Controllers\Sacco;

use App\User;

use App\Model\Role;

use Barryvdh\DomPDF\Facade as PDF;

use App\Model\Sacco\Sacco;
use App\Model\Settings\Ward;
use Illuminate\Http\Request;
use App\Model\Settings\County;
use App\Model\Settings\Region;
use App\Model\Sacco\SaccoEditor;
use App\Model\Sacco\SaccoMember;
use App\Model\Settings\Location;
use App\Model\Settings\SubCounty;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Model\Sacco\MilkCollection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Model\Sacco\CountyCoordinator;
use App\Repositories\CommonRepository;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use App\Http\Requests\Sacco\SaccoRequest;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use App\Http\Requests\Sacco\editorsRequest;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use App\Http\Requests\Sacco\CoordinatorRequest;
use App\Http\Requests\Sacco\SaccoMemberRequest;

class SaccoController extends Controller
{
    public function __construct(CommonRepository $commonRepository)
    {
        $this->commonRepository=$commonRepository;
    }

    public function index()
    {
        $counties       = $this->commonRepository->CountyList();
        $subcounties    = $this->commonRepository->subCountyList();
        $wardList           = $this->commonRepository->wardList();
        $results = Sacco::with('county','sub_county','ward')->get();
        return view('admin.sacco.index', ['results' => $results,'counties' => $counties,'subcounties' => $subcounties,'wardList' => $wardList]);
    }


    public function create()
    {
        $counties       = $this->commonRepository->CountyList();
        $subcounties    = $this->commonRepository->subCountyList();
        $wardList           = $this->commonRepository->wardList();

        return view('admin.sacco.form', ['counties' => $counties,'subcounties' => $subcounties,'wardList' => $wardList]);
    }


    public function store(SaccoRequest $request)
    {
        $input = $request->all();
        try {
            Sacco::create($input);
            $bug = 0;
            insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, "Created Group - " . $request->sacco_name);
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect('sacco')->with('success', 'Group successfully saved.');
        } else {
            return redirect('sacco')->with('error', 'Something Error Found !, Please try again.');
        }
    }

    public function groupMembers($id)
    {
        $sacco_members = SaccoMember::with('user','location')->where('sacco_id', $id)->get();
        return view('admin.sacco.tabs.members',['sacco_members'=>$sacco_members]);
    }
    function importData(Request $request){
        $this->validate($request, [
            'uploaded_file' => 'required|file|mimes:xls,xlsx'
        ]);
        $the_file = $request->file('uploaded_file');
        try{
            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $sheet        = $spreadsheet->getActiveSheet();
            $row_limit    = $sheet->getHighestDataRow();
            $column_limit = $sheet->getHighestDataColumn();
            $row_range    = range( 2, $row_limit );
            $column_range = range( 'AQ', $column_limit );
            $startcount = 2;
            $data = array();
            foreach ( $row_range as $row ) {
                $data[] = [
                    'sacco_name' =>$sheet->getCell( 'A' . $row )->getValue(),
                    'description'  =>$sheet->getCell( 'B' . $row )->getValue(),
                    'county_id'  =>$sheet->getCell( 'C' . $row )->getValue(),
                    'sub_county_id'  =>$sheet->getCell( 'D' . $row )->getValue(),
                    'ward_id'  =>$sheet->getCell( 'E' . $row )->getValue(),
                    'male_members'  =>$sheet->getCell( 'F' . $row )->getValue(),
                    'female_members'  =>$sheet->getCell( 'G' . $row )->getValue(),
                    'currently_saving'  =>$sheet->getCell( 'H' . $row )->getValue(),
                    'date_started_saving'  =>$sheet->getCell( 'I' . $row )->getValue(),
                    'circle_number'  =>$sheet->getCell( 'J' . $row )->getValue(),
                    'share_value'  =>$sheet->getCell( 'K' . $row )->getValue(),
                    'total_shares' =>$sheet->getCell( 'L' . $row )->getValue(),
                    'next_meeting_date' =>$sheet->getCell( 'M' . $row )->getValue(),
                    'loan_fund_cash' =>$sheet->getCell( 'N' . $row )->getValue(),
                    'loan_fund_bank' =>$sheet->getCell( 'O' . $row )->getValue(),
                    'constitution' =>$sheet->getCell( 'P' . $row )->getValue(),
                    'male_as_per_constitution' =>$sheet->getCell( 'Q' . $row )->getValue(),
                    'female_as_per_constitution' =>$sheet->getCell( 'R' . $row )->getValue(),
                    'property_owned' =>$sheet->getCell( 'S' . $row )->getValue(),
                    'name_of_the_property' =>$sheet->getCell( 'T' . $row )->getValue(),
                    'value_of_the_property' =>$sheet->getCell( 'U' . $row )->getValue(),
                    'value_of_savings' =>$sheet->getCell( 'V' . $row )->getValue(),
                    'loan_purpose' =>$sheet->getCell( 'W' . $row )->getValue(),
                    'number_of_people_with_loans' =>$sheet->getCell( 'X' . $row )->getValue(),
                    'loan_fund' =>$sheet->getCell( 'Y' . $row )->getValue(),
                    'bank_balance' =>$sheet->getCell( 'Z' . $row )->getValue(),
                    'social_fund'  =>$sheet->getCell( 'AA' . $row )->getValue(),
                    'property_now' =>$sheet->getCell( 'AB' . $row )->getValue(),
                    'external_debts' =>$sheet->getCell( 'AC' . $row )->getValue(),
                    'grants_provided' =>$sheet->getCell( 'AD' . $row )->getValue(),
                    'type_of_farming'=>$sheet->getCell( 'AE' . $row )->getValue(),
                    'crops_planted'  =>$sheet->getCell( 'AF' . $row )->getValue(),
                    'inputs_provided' =>$sheet->getCell( 'AG' . $row )->getValue(),
                    'size_of_land' =>$sheet->getCell( 'AH' . $row )->getValue(),
                    'sales'  =>$sheet->getCell( 'AI' . $row )->getValue(),
                    'farm_inputs_cost' =>$sheet->getCell( 'AJ' . $row )->getValue(),
                    'reserve_cash' =>$sheet->getCell( 'AK' . $row )->getValue(),
                    'linkage_to_market'  =>$sheet->getCell( 'AL' . $row )->getValue(),
                    'market_access_cost' =>$sheet->getCell( 'AM' . $row )->getValue(),
                    'link_to_financial_institution' =>$sheet->getCell( 'AN' . $row )->getValue(),
                    'name_of_the_institution'  =>$sheet->getCell( 'AO' . $row )->getValue(),
                    'amount_offered'  =>$sheet->getCell( 'AP' . $row )->getValue(),
                    'money_usage' =>$sheet->getCell( 'AQ' . $row )->getValue(),
                    'other' =>$sheet->getCell( 'AR' . $row )->getValue(),
                ];
                $startcount++;
            }
            DB::table('sacco')->insert($data);
        } catch (Exception $e) {
            $error_code = $e->errorInfo[1];
            return back()->withErrors('There was a problem uploading the data!');
        }
        return back()->withSuccess('Great! Data has been successfully uploaded.');
    }
    /**
     * @param $customer_data
     */
    public function ExportExcel($customer_data){
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '4000M');
        try {
            $spreadSheet = new Spreadsheet();
            $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
            $spreadSheet->getActiveSheet()->fromArray($customer_data);
            $Excel_writer = new Xls($spreadSheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Customer_ExportedData.xls"');
            header('Cache-Control: max-age=0');
            ob_end_clean();
            $Excel_writer->save('php://output');
            exit();
        } catch (Exception $e) {
            return;
        }
    }
    /**
     *This function loads the customer data from the database then converts it
     * into an Array that will be exported to Excel
     */
    function exportData(){
        $data = DB::table('tbl_customer')->orderBy('CustomerID', 'DESC')->get();
        $data_array [] = array("CustomerName","Gender","Address","City","PostalCode","Country");
        foreach($data as $data_item)
        {
            $data_array[] = array(
                'CustomerName' =>$data_item->CustomerName,
                'Gender' => $data_item->Gender,
                'Address' => $data_item->Address,
                'City' => $data_item->City,
                'PostalCode' => $data_item->PostalCode,
                'Country' =>$data_item->Country
            );
        }
        $this->ExportExcel($data_array);
    }

    public function list(Request $id)
    {
      $county= County::all();
       $data   =[/*
           'county_id' => $county->county_id, */
           'county' =>$county
       ];
       $pdf    = PDF::loadView('admin.reports.pdf.countyList',$data);
       $pdf->setPaper('A4', 'landscape');
        return $pdf->download('countylist.pdf');
    }

    public function show($id)
    {
        $state['members'] = 'inactive';
        $state['collections'] = 'inactive';
        $state['editors'] = 'inactive';
        $state['coordinators'] = 'inactive';
        $state['details'] = 'active';

        $selected_sacco = Sacco::where('sacco_id', $id)->first();

        $userList = $this->commonRepository->userList();
        $sacco_members = SaccoMember::join('user','sacco_members.member_number', '=','user.member_number')->with('location')->where('user.sacco_id', $id)->get();

        $collection = MilkCollection::with('user')->where('sacco_id', $id)->get();

        $coordinators = User::where('role_id', 11)->get();
        $county_coordinators = CountyCoordinator::with('user')->where('sacco_id', $id)->get();

        $details = Sacco::where('sacco_id', $id)->get();

        $location = Location::get();


        $editors = User::where('role_id', 9)->get();
        $sacco_editors = SaccoEditor::with('user')->where('sacco_id', $id)->get();

        $memberStatuses = 0;
        $activeMembersNumber = 0;
        $pendingMembersNumber = 0;
        try{
         $memberStatuses = DB::table('sacco_members')
         ->select(DB::raw('status,count(*) as active_members'))
         ->where('sacco_id', $id)
         ->groupBy('status')
         ->get();

         foreach ($memberStatuses as $key => $value) {

            $status =  json_decode($value->status, true);

            if($status == 1){
                $activeMembersNumber = json_decode($value->active_members, true);
            }else if($status == 0){
                $pendingMembersNumber = json_decode($value->active_members, true);
            }
        }


    }catch(\Exception $e){


    }


    return view('admin.sacco.show', [
        'data'=>$userList,
        'state' => $state,
        'location' => $location,
        'sacco' => $selected_sacco,
        'sacco_members' => $sacco_members,
        'collection' => $collection,
        'details' =>$details,
        'coordinators' =>$coordinators,
        'county_coordinators' =>$county_coordinators,
        'editors' => $editors,
        'sacco_editors' => $sacco_editors,
        'active_members' => $activeMembersNumber,
        'pending_members' => $pendingMembersNumber
    ]);

}


public function edit($id)
{

    $editModeData    = Sacco::with('county','sub_county','ward')->findOrFail($id);
    $selected_sacco = Sacco::where('sacco_id', $id)->first();
    $counties       = $this->commonRepository->CountyList();
    $subcounties    = $this->commonRepository->subCountyList();
    $wardList           = $this->commonRepository->wardList();
    return view('admin.sacco.form', ['editModeData' => $editModeData, 'sacco' => $selected_sacco, 'counties' => $counties, 'subcounties' => $subcounties, 'wardList' =>$wardList]);
}


public function update(SaccoRequest $request, $id)
{
    $Sacco = Sacco::findOrFail($id);
    $input = $request->all();
    try {
        insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, "Updated Group - " . $Sacco->sacco_name);
        $Sacco->update($input);
        $bug = 0;
    } catch (\Exception $e) {
        $bug = $e->errorInfo[1];
    }

    if ($bug == 0) {
        return redirect('sacco')->with('success', 'Group successfully updated ');
    } else {
        return redirect()->back()->with('error', 'Something Error Found !, Please try again.');
    }
}

public function destroy($id)
{
    $count = Sacco::where('county_id','=',$id)->count();
    $user = User::where('sacco_id', '=', $id)->count();


         if($count>0 || $user > 0){

            return  'hasForeignKey';
         }

    try {
        $sacco = Sacco::FindOrFail($id);
        insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, "Deleted Group - " . $sacco->sacco_name);
        $sacco->delete();
        $bug = 0;
    } catch (\Exception $e) {
        $bug = $e->errorInfo[1];
    }

    if ($bug == 0) {
        echo "success";
    } elseif ($bug == 1451) {
        echo 'hasForeignKey';
    } else {
        echo 'error';
    }
}

public function download($filename)
{
    $file_path = storage_path('app/public/' . $filename . '.csv');

    if (file_exists($file_path)) {
        return response()->download($file_path, $filename . '.csv');
    } else {
        return redirect()->back()->with('error', 'Requested file does not exist on our server!');
    }
}

private function shouldAddSingleMemberEntry(SaccoMemberRequest $request)
{
    return ($request->get('member_number') !== null && $request->get('member_name') !== null && $request->get('member_id_no') !== null && $request->get('location_id') !== null);
}
public function addMembers(SaccoMemberRequest $request)
{
    $role = Role::where('role_name', 'Normal Users')->first(['role_id']);
    if ($this->shouldAddSingleMemberEntry($request)) {
        $input = [];
        $input['sacco_id'] = $request->get('sacco_id');
        $input['member_number'] = $request->get('member_number');
        $input['member_name'] = $request->get('member_name');
        $input['member_id_no'] = $request->get('member_id_no');
        $input['location_id'] = $request->get('location_id');
        insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, "Added Group Member - " . $request->get('member_name'));
        SaccoMember::create($input);
        $this->createUser($request->get('sacco_id'), $input, $role);
    }

    if ($request->file('members_list') !== null) {
        $file_path = $request->file('members_list');
        $csv = array_map('str_getcsv', file($file_path));
        array_shift($csv);

        foreach ($csv as $key => $value) {
            $input = [];
            $input['sacco_id'] = $request->get('sacco_id');
            $input['member_number'] = $value[0];
            $input['member_name'] = $value[1];
            $input['member_id_no'] = $value[2];
            $input['location_id'] = $value[3];

            SaccoMember::create($input);
            $this->createUser($request->get('sacco_id'), $input, $role);
        }
    }
    return redirect()->back()->with('success', 'Group members uploaded successfully');

}

public function editMembers($id){

    $sacco= Sacco::where('sacco_id', $id)->first();
    $location = Location::all();
    $editModeData =SaccoMember::findOrFail($id);
    return view('admin.sacco.tabs.members',['editModeData' => $editModeData,'location'=>$location, 'sacco' => $sacco]);
}

public function updateMembers(SaccoMemberRequest $request, $id)
{
    $Sacco = SaccoMember::findOrFail($id);
    $input = $request->all();
    try {
        insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, "Updated Group - " . $Sacco->sacco_name);
        $Sacco->update($input);
        $bug = 0;
    } catch (\Exception $e) {
        $bug = $e->errorInfo[1];
    }

    if ($bug == 0) {
        return redirect('sacco')->with('success', 'Member successfully updated ');
    } else {
        return redirect()->back()->with('error', 'Something Error Found !, Please try again.');
    }
}


public function destroyMembers($id)
{

    try {
        $saccomember = SaccoMember::FindOrFail($id);
        insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, "Deleted Member - " . $saccomember->sacco_id);
        $saccomember->delete();
        $bug = 0;
    } catch (\Exception $e) {
        $bug = $e->errorInfo[1];
    }

    if ($bug == 0) {
        echo "success";
    } elseif ($bug == 1451) {
        echo 'hasForeignKey';
    } else {
        echo 'error';
    }
}



private function shouldAddSingleCollectionEntry(Request $request)
{
    return ($request->get('member_number') !== null && $request->get('delivery_date') !== null && $request->get('delivery_time') !== null && $request->get('quantity') !== null);
}


public function createUser($sacco_id, $data, $role)
{
    $input['sacco_id'] = $sacco_id;
    $input['password'] = Hash::make($data['member_id_no']);
    $input['user_name'] = $data['member_id_no'];
    $input['role_id'] = $role->role_id;
    $input['status'] = 0;
    $input['member_number'] = $data['member_number'];
    User::create($input);
}



public function addCollection(Request $request)
{

    if ($this->shouldAddSingleCollectionEntry($request)) {
        $user = User::where('member_number', $request->get('member_number'))->first();
        $input = [];
        $input['sacco_id'] = $request->get('sacco_id');
        $input['user_id'] = $user->user_id;
        $input['member_number'] = $request->get('member_number');
        $input['delivery_date'] = dateConvertFormtoDB($request->get('delivery_date'));
        $input['delivery_time'] = $request->get('delivery_time');
        $input['quantity'] = $request->get('quantity');
        MilkCollection::create($input);
        insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, "Added member record - " . $request->get('member_number'));
    }

    if ($request->file('collection_file') !== null) {
        $file_path = $request->file('collection_file');
        $csv = array_map('str_getcsv', file($file_path));
        array_shift($csv);

        foreach ($csv as $key => $value) {
            $input = [];
            $user = User::where('member_number', $value[0])->first();
            $input['sacco_id'] = $request->get('sacco_id');
            $input['member_number'] = $value[0];
            $input['user_id'] = $user->user_id;
            $input['delivery_date'] = dateConvertFormtoDB($value[1]);
            $input['delivery_time'] = $value[2];
            $input['quantity'] = $value[3];

            MilkCollection::create($input);
        }

        insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, "Added bulk member record - " . $request->get('sacco_id'));
    }
    return redirect()->back()->with('success', 'Member record uploaded successfully');
}


public function addEditor(editorsRequest $request)
{
    $editor = $request->get('user_id');
    if ($editor !== null) {
        SaccoEditor::create($request->all());
        insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, "Added Admin");
        return redirect()->back()->with('success', 'Admin added successfully');
    } else {
        return redirect()->back()->with('error', 'Please select an admin you want to add');
    }
}

public function removeEditor($id)
{
    try {
        $sacco_editors = SaccoEditor::FindOrFail($id);
        $sacco_editors->delete();
        $bug = 0;
    } catch (\Exception $e) {
        $bug = $e->errorInfo[1];
    }

    if ($bug == 0) {
        echo "success";
    } else {
        echo 'error';
    }
}

public function addCoordinator(CoordinatorRequest $request)
{
    $county_coordinators = $request->get('user_id');
    if ($county_coordinators !== null) {
        CountyCoordinator::create($request->all());
        insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, "Added Coordinator");
        return redirect()->back()->with('success', 'Coordinator added successfully');
    } else {
        return redirect()->back()->with('error', 'Please select coordinator you want to add');
    }
}

public function removeCoordinator($id)
{
    try {
        $county_coordinators = CountyCoordinator::FindOrFail($id);
        $county_coordinators ->delete();
        $bug = 0;
    } catch (\Exception $e) {
        $bug = $e->errorInfo[1];
    }

    if ($bug == 0) {
        echo "success";
    } else {
        echo 'error';
    }
}


public function APISaccos()
{
    $saccos = Sacco::get();

    return response()
    ->json(['success' => true, 'data' => $saccos]);
}

public function APISearchSaccoMember(Request $request)
{
    $sacco_member = SaccoMember::where(['sacco_id' => $request->get('sacco_id')])->where(['member_number' => $request->get('member_number')])->first();
    $status = false;
    $data = [];
    $message = "Sacco member not found";
    if (isset($sacco_member)) {
        $status = true;
        $sacco_member["member_id_no"] = "";
        $data = $sacco_member;
        $data['id'] = $sacco_member->sacco_members_id;
        $data['route'] = $sacco_member->location;
        $message = "OK";
    }
    return response()
    ->json(['success' => $status, 'message' => $message, 'data' => $data]);
}


public function APICollection(Request $request, $id)
{
    $block_one = function ($params) {
        $harvests = MilkCollection::where('member_number', $params['member_number'])->get();
        $data = $harvests;
        $message = "";
        if (!$harvests->isEmpty()) {
            $status = true;
        } else {
            $status = false;
            $message = "You have not added any member yet!";
        }

        return ['success' => $status, 'data' => $data, 'message' => $message];
    };

    $response = executeRestrictedAccess($block_one, "auth", ['request' => $request, 'member_number' => $id]);
    return response()->json($response);
}

public function APICollectionStore(Request $request)
{
    $block_one = function ($params) {
        $input = $params['request']->all();
        $input['user_id'] = $params['user']->user_id;
        $input['sacco_id'] = $params['user']->sacco_id;
        $input['member_number'] = $input['member_number'];
        $input['delivery_date'] = $input['date'];
        $input['delivery_time'] = $input['time'];
        $input['quantity'] = $input['amount'];
        if (MilkCollection::create($input)) {
            $status = true;
            $message = "Member record added successfully";
        } else {
            $status = false;
            $message = "Your action failed. Please try again";
        }

        return ['success' => $status, 'data' => [], 'message' => $message];
    };

    return response()
    ->json(executeRestrictedAccess($block_one, "auth", ['request' => $request]));
}


public function APICollectionUpdate(Request $request)
{
    $block_one = function ($params) {
        $input = $params['request']->all();

        $collection = MilkCollection::where('milk_collections_id', $input['collection_id'])->where('member_number', $input['member_number'])->first();
        $status = false;
        $message = "";
        if (isset($collection)) {
            $input['member_number'] = $input['member_number'];
            $input['delivery_date'] = $input['date'];
            $input['delivery_time'] = $input['time'];
            $input['quantity'] = $input['amount'];
            $collection->update($input);
            $status = true;
            $message = "Member record updated successfully";
        } else {
            $status = false;
            $message = "The selected harvest record is missing!";
        }

        return ['success' => $status, 'data' => [], 'message' => $message];
    };

    return response()
    ->json(executeRestrictedAccess($block_one, "auth", ['request' => $request]));
}

public function APICollectionDelete(Request $request)
{
    $block_one = function ($params) {
        $input = $params['request']->all();

        $collection = MilkCollection::where('milk_collections_id', $input['collection_id'])->first();
        $status = false;
        $message = "";
        if (isset($collection)) {
            $collection->delete();
            $status = true;
            $message = "Memeber record deleted successfully";
        } else {
            $status = false;
            $message = "The selected harvest record is missing!";
        }

        return ['success' => $status, 'data' => [], 'message' => $message];
    };

    return response()
    ->json(executeRestrictedAccess($block_one, "auth", ['request' => $request]));
}

/* public function APIMembers(Request $request, $id)
{
   $block_one = function ($params){

    $members = SaccoMember:: where('member_number', $params['member_number'])->get();
    $data    = $members;
    $message ="";
    if(!$members->isEmpty()){
        $status = true;
    }
    else{
        $status = false;
        $message = "You have no members added yet."
    }

    return['success' => $status, 'data' =>$data, 'message' => $message ]

   };
   $response = executeRestrictedAccess($block_one, "auth", ['request' => $request, 'member_number' => $id]);
   return response()->json($response);

} */
}
