<?php

namespace App\Http\Controllers\User;

use App\Lib\Enumerations\UserStatus;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\APILoginRequest;
use App\Http\Requests\LoginRequest;

use Illuminate\Support\Facades\Hash;



use Session;


class LoginController extends Controller
{


    public function index()
    {
        if (Auth::check()) {
            return redirect()->intended(url('/dashboard'));
        }

        return view('admin.login');
    }



    public function Auth(LoginRequest $request)
    {
        if (Auth::attempt(['user_name' => $request->user_name, 'password' => $request->user_password])) {
            $userStatus = Auth::user()->status;
            if ($userStatus == UserStatus::$ACTIVE) {

                insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, "User login");

                $user_data = [
                    "user_id"       => Auth::user()->user_id,
                    "user_name"     => Auth::user()->user_name,
                    "role_id"       => Auth::user()->role_id,
                ];
                session()->put('logged_session_data', $user_data);
                return redirect()->intended(url('/dashboard'));
            } elseif ($userStatus == UserStatus::$INACTIVE) {
                Auth::logout();
                return redirect(url('/'))->withInput()->with('error', 'You are temporary blocked. please contact to admin');
            } else {
                Auth::logout();
                return redirect(url('/'))->withInput()->with('error', 'You are terminated. please contact to admin');
            }
        } else {
            return redirect(url('/'))->withInput()->with('error', 'User name or password does not matched');
        }
    }



    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect(url('/'))->with('success', 'logout successful ..!');
    }



    public function APIAuth(APILoginRequest $request)
    {
        $message = '';
        $success = false;
        $resp = [];

        if (Auth::attempt(['user_name' => $request->phone_no, 'password' => $request->password])) {
            $userStatus = Auth::user()->status;
            if ($userStatus == UserStatus::$ACTIVE) {
                $auth_user = Auth::user();
                $resp = [
                    'access_token' => (string) $auth_user->user_id,
                    'success' => true,
                    'message' => $message,
                    'token_type' => 'Bearer',
                    'expires_at' => '',
                    'user' => $this->composeUserData($auth_user),
                ];
                $message = 'Login successful';
                return response()
                    ->json($resp);
            } elseif ($userStatus == UserStatus::$INACTIVE) {
                Auth::logout();
                $message = 'You are temporary blocked. please contact to admin';
            } else {
                Auth::logout();
                $message = 'You are terminated. please contact to admin';
            }
        } else {
            $message = 'User name or password does not matched';
        }

        return response()
            ->json(['success' => $success, 'message' => $message]);
    }

    private function composeUserData($auth_user)
    {
        return [
            'id' => $auth_user->user_id,
            'sacco_id' => $auth_user->sacco_id,
            'role_id' => $auth_user->role_id,
            'first_name' => $auth_user->first_name,
            'last_name' => $auth_user->last_name,
            'email' => $auth_user->email,
            'phone_no' => $auth_user->phone_no,
            'id_no' => $auth_user->id_no,
            'email_verified_at' => null,
            'status' => $auth_user->status,
            'created_at' => $auth_user->created_at->toDateString(),
            'updated_at' => $auth_user->updated_at->toDateString(),
            'member_number' => $auth_user->member_number
        ];
    }
}
