<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\ChangePasswordRequest;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

use App\User;


class ChangePasswordController extends Controller
{

    public function index()
    {
        return view('admin.user.user.changePassword');
    }


    public function update(ChangePasswordRequest $request, $id)
    {
        $input['password'] = Hash::make($request['password']);
        if (Auth::attempt(['user_id' => Auth::user()->user_id, 'password' => $request->oldPassword])) {
            User::where('user_id', Auth::user()->user_id)->update($input);
            return redirect()->back()->with('success', 'Password successfully updated.');
        } else {
            return redirect()->back()->with('error', 'Old Password does not match.');
        }
    }


    public function APIPasswordRequest(Request $request)
    {
        $email = $request->get('email');
        $user = User::where('email', $email)->first();
        $status = false;
        $message = "Invalid email address. Please check your email and try again!";
        if (isset($user)) {
            $otp = rand(1000, 9999);
            $user->update(['otp' => $otp]);
            $status = true;
            $message = "We sent password reset instructions to " . $email . ". Please follow the instructions to complete your request";
        }
        return response()->json(['success' => $status, 'data' => [], 'message' => $message]);
    }

    public function APIPasswordReset(Request $request)
    {
    
        $status = false;
        $message = "Invalid email address. Please check your email and try again!";
        $email = $request->get('email');
        $user = User::where('email', $email)->first();
        if (isset($user)) {
            $input['password'] = Hash::make($request['password']);
            $input['otp'] = null;
            if ($user->otp == $request->get('otp') && isValidOtp($user->updated_at)) {
                $user->update($input);
                $status = true;
                $message = "Your password reset was successful.";
            } else {
                $message = "The OTP you entered is invalid.";
            }
        }
        return response()->json(['success' => $status, 'data' => [], 'message' => $message]);
    }
}
