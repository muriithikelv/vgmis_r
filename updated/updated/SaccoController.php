<?php

namespace App\Http\Controllers\Sacco;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sacco\SaccoRequest;
use App\Model\Sacco\Sacco;
use App\Model\Role;
use App\Model\Sacco\MilkCollection;
use App\Model\Sacco\SaccoEditor;
use App\Model\Sacco\SaccoMember;
use App\Model\Settings\Region;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaccoController extends Controller
{

    public function index()
    {
        $results = Sacco::get();
        return view('admin.sacco.index', ['results' => $results]);
    }


    public function create()
    {
        return view('admin.sacco.form');
    }


    public function store(SaccoRequest $request)
    {
        $input = $request->all();
        try {
            Sacco::create($input);
            $bug = 0;
            insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, "Created SACCO - " . $request->sacco_name);
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect('sacco')->with('success', 'Sacco successfully saved.');
        } else {
            return redirect('sacco')->with('error', 'Something Error Found !, Please try again.');
        }
    }

    public function show($id)
    {
        $state['members'] = 'active';
        $state['collections'] = 'inactive';
        $state['editors'] = 'inactive';

        $selected_sacco = Sacco::where('sacco_id', $id)->first();
        $sacco_members = SaccoMember::where('sacco_id', $id)->get();

        $collection = MilkCollection::where('sacco_id', $id)->get();

        $regions = Region::get();

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
        'state' => $state,
        'regions' => $regions,
        'sacco' => $selected_sacco,
        'sacco_members' => $sacco_members,
        'collection' => $collection,
        'editors' => $editors,
        'sacco_editors' => $sacco_editors,
        'active_members' => $activeMembersNumber,
        'pending_members' => $pendingMembersNumber
    ]);

}


public function edit($id)
{
    $editModeData = Sacco::findOrFail($id);
    return view('admin.sacco.form', ['editModeData' => $editModeData]);
}


public function update(SaccoRequest $request, $id)
{
    $Sacco = Sacco::findOrFail($id);
    $input = $request->all();
    try {
        insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, "Updated SACCO - " . $Sacco->sacco_name);
        $Sacco->update($input);
        $bug = 0;
    } catch (\Exception $e) {
        $bug = $e->errorInfo[1];
    }

    if ($bug == 0) {
        return redirect('sacco')->with('success', 'Sacco successfully updated ');
    } else {
        return redirect()->back()->with('error', 'Something Error Found !, Please try again.');
    }
}

public function destroy($id)
{

    try {
        $sacco = Sacco::FindOrFail($id);
        insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, "Deleted SACCO - " . $Sacco->sacco_name);
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

private function shouldAddSingleMemberEntry(Request $request)
{
    return ($request->get('member_no') !== null && $request->get('member_name') !== null && $request->get('member_id_no') !== null && $request->get('region_id') !== null);
}
public function addMembers(Request $request)
{
    $role = Role::where('role_name', 'Normal Users')->first(['role_id']);
    if ($this->shouldAddSingleMemberEntry($request)) {
        $input = [];
        $input['sacco_id'] = $request->get('sacco_id');
        $input['member_number'] = $request->get('member_no');
        $input['member_name'] = $request->get('member_name');
        $input['member_id_no'] = $request->get('member_id_no');
        $input['location'] = $request->get('region_id');
        insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, "Added SACCO Member - " . $request->get('member_name'));
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
            $input['location'] = $value[3];

            SaccoMember::create($input);
            $this->createUser($request->get('sacco_id'), $input, $role);
        }
    }
    return redirect()->back()->with('success', 'Sacco members uploaded successfully');
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
        insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, "Added milk collection - " . $request->get('member_number'));
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

        insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, "Added bulk milk collection - " . $request->get('sacco_id'));
    }
    return redirect()->back()->with('success', 'Milk collection uploaded successfully');
}


public function addEditor(Request $request)
{
    $editor = $request->get('user_id');
    if ($editor !== null) {
        SaccoEditor::create($request->all());
        insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, "Added Editor");
        return redirect()->back()->with('success', 'Editor added successfully');
    } else {
        return redirect()->back()->with('error', 'Please select an editor you want to add');
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
            $message = "You have not added any milk collection yet!";
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
            $message = "Milk collection record added successfully";
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
            $message = "Milk collection updated successfully";
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
            $message = "Milk collection record deleted successfully";
        } else {
            $status = false;
            $message = "The selected harvest record is missing!";
        }

        return ['success' => $status, 'data' => [], 'message' => $message];
    };

    return response()
    ->json(executeRestrictedAccess($block_one, "auth", ['request' => $request]));
}
}
