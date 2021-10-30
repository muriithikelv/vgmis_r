<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\APIUserRequest;
use App\Repositories\CommonRepository;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use App\Http\Requests\UserRequest;
use App\Model\Audit\Audit;
use App\Model\Role;
use App\Model\Sacco\Sacco;
use App\Model\Sacco\SaccoMember;
use App\User;

class UserController extends Controller
{

    protected $commonRepository;

    public function __construct(CommonRepository $commonRepository)
    {
        $this->commonRepository = $commonRepository;
    }



    public function index()
    {
        $allUsers = User::with('role')->orderBy('user_id', 'desc')->get();
        return view('admin.user.user.index', ['data' => $allUsers]);
    }


    public function audit()
    {
        $audit = Audit::all()->take(100);
        return view('admin.user.user.audit', ['data' => $audit]);
    }

    public function create()
    {
        $roleList = $this->commonRepository->roleList();
        return view('admin.user.user.add_user', ['data' => $roleList]);
    }



    public function store(UserRequest $request)
    {

        unset($request['password_confirmation']);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['created_by'] = Auth::user()->user_id;
        $input['updated_by'] = Auth::user()->user_id;

        try {
            User::create($input);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect('user')->with('success', 'User successfully saved.');
        } else {
            return redirect('user')->with('error', 'Something error found !, Please try again.');
        }
    }

    public function APIstore(APIUserRequest $request)
    {
        $success = false;
        $message = 'Registration failed.';
        try {

            $role = Role::where('role_name', 'Normal Users')->first(['role_id']);
            $input = $request->all();

            $default_sacco_id = Sacco::where('sacco_name', 'System Sacco')->first(['sacco_id']);
            $sacco_id =  $input['sacco_id'] == 10001 ? $default_sacco_id->sacco_id : $input['sacco_id'];

            $sacco_member = SaccoMember::where('member_id_no', $input['id_no'])->first();

            if (isset($sacco_member)) {
                $member_number = isset($sacco_member) ? $sacco_member->member_number : $input['id_no'];
                $member_number = $input['sacco_id'] == 10001 ? $input['id_no'] : $member_number;

                $user = User::where("user_name", $input['id_no'])->first();
                if (isset($user)) {
                    $user->update([
                        'password' => Hash::make($input['password']),
                        'user_name' => $input['phone_no'],
                        'status' => 1
                    ]);
                } else {
                    $input['sacco_id'] = $sacco_id;
                    $input['password'] = Hash::make($input['password']);
                    $input['user_name'] = $input['phone_no'];
                    $input['role_id'] = $role->role_id;
                    $input['status'] = 1;
                    $input['member_number'] = $member_number;
                    User::create($input);
                }

                $sacco_member->update([
                    'status' => 1
                ]);

                $success = true;
                $message = 'Registration successful.';
            } else {
                $success = false;
                $message = 'Invalid National ID Number';
            }
        } catch (\Exception $e) {
            $success = false;
        }

        return response()
            ->json(['success' => $success, 'message' => $message]);
    }



    public function edit($id)
    {
        $roleList = $this->commonRepository->roleList();
        $editModeData = User::FindOrFail($id);
        return view('admin.user.user.edit_user', ['data' => $roleList, 'editModeData' => $editModeData]);
    }



    public function update(UserRequest $request, $id)
    {

        $data = User::FindOrFail($id);
        $input = $request->all();
        $input['created_by'] = Auth::user()->user_id;;
        $input['updated_by'] = Auth::user()->user_id;

        try {
            $data->update($input);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect()->back()->with('success', 'User successfully updated.');
        } else {
            return redirect()->back()->with('error', 'Something error found !, Please try again.');
        }
    }



    public function destroy($id)
    {
        try {
            $user = User::FindOrFail($id);
            $user->delete();
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


}
