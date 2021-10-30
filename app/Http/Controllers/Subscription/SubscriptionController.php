<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subscription\SubscriptionRequest;

use App\Model\Subscription\Subscription;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{

    public function index()
    {
        $results = Subscription::with('user')->get();
        return view('admin.subscription.subscribe.index', ['results' => $results]);
    }


    public function create()
    {
        return view('admin.subscription.subscribe.form');
    }


    public function store(SubscriptionRequest $request)
    {
        $message = "Something Error Found !, Please try again.";
        $bug = 1;
        try {
            $input = $request->all();

            $phone_number = '254' . substr($request->get('phone_no'), -9);
            $user_id = User::where('phone_no', $phone_number)->first(['user_id']);
            if (isset($user_id)) {
                $created_by = $request->get('is_created_by') == 'admin' ? Auth::user()->user_id : $user_id;
                $input['start_date'] = dateConvertFormtoDB($input['start_date']);
                $input['end_date'] = dateConvertFormtoDB($input['end_date']);
                $input['created_by'] = $created_by;
                $input['user_id'] = $user_id->user_id;
                $input['status'] = $request->get('is_created_by') == 'admin' ? 1 : 0;
                Subscription::create($input);
                $bug = 0;
                insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, "Subscription created for".$phone_number);
            } else {
                $message = "User with that mobile number was not found";
            }
        } catch (\Exception $e) {
            $bug = $e->errorInfo;
        }

        if ($bug == 0) {
            return redirect('subscription')->with('success', 'Subscription successfully saved.');
        } else {
            return redirect('subscription')->with('error', $message);
        }
    }


    public function edit($id)
    {
        $editModeData = Subscription::findOrFail($id);
        return view('admin.subscription.subscribe.form', ['editModeData' => $editModeData]);
    }


    public function update(SubscriptionRequest $request, $id)
    {
        $subscription = Subscription::findOrFail($id);
        $input = $request->all();
        $input['start_date'] = dateConvertFormtoDB($input['start_date']);
        $input['end_date'] = dateConvertFormtoDB($input['end_date']);
        try {
            $subscription->update($input);
            $bug = 0;
            insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, "Subscription updated for ".$subscription->phone_no);
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect()->back()->with('success', 'Subscription successfully updated ');
        } else {
            return redirect()->back()->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function destroy($id)
    {

        $subscription = Subscription::FindOrFail($id);

        if ($subscription->status == 0) {
            try {
                $subscription->delete();
                $bug = 0;
                insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, "Subrication deleted for ".$subscription->phone_no);
            } catch (\Exception $e) {
                $bug = $e->errorInfo[1];
            }
        } else {
            $bug = 5;
        }


        if ($bug == 0) {
            echo "success";
        } elseif ($bug == 5) {
            echo 'hasForeignKey';
        } else {
            echo 'error';
        }
    }

    public function activate($id)
    {
        $this->activateDeactiveSubscription($id, 1);
    }


    public function deactivate($id)
    {
        $this->activateDeactiveSubscription($id, 0);
    }

    private function activateDeactiveSubscription($id, $status)
    {
        try {
            $subscription = Subscription::FindOrFail($id);
            $action = $status == 1 ? "Subscription activated for ".$subscription->phone_no : "Subscription deactivated for ".$subscription->phone_no;
            insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, $action);
            $input["status"] = $status;
            try {
                $subscription->update($input);
                $bug = 0;
            } catch (\Exception $e) {
                $bug = $e->errorInfo[1];
            }
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            echo "success";
        } else {
            echo 'error';
        }
    }

    public function APISubscribe(Request $request)
    {
        $input = $request->all();

        $phone_number = '254' . substr($request->get('phone_no'), -9);
        $user_id = User::where('phone_no', $phone_number)->first(['user_id']);
        $message = "";
        $status = false;

        if (isset($user_id)) {

            $trans_code = Subscription::where('transaction_code', $request->get('transaction_code'))->first();
            if (!isset($trans_code)) {
                $created_by = $request->get('is_created_by') == 'admin' ? Auth::user()->user_id : $user_id;
                $input['created_by'] = $created_by;
                $input['user_id'] = $user_id->user_id;
                $input['status'] = $request->get('is_created_by') == 'admin' ? 1 : 0;
                Subscription::create($input);
                $status = true;
                $message = "Subscription received successfully. Please wait for approval";
            } else {
                $message = "The transaction code has already been used";
            }
        } else {
            $message = "User with that mobile number " . $phone_number . " does not exist";
        }

        return response()
            ->json(['success' => $status, 'message' => $message]);
    }

    public function APISubscriptionHistory(Request $request)
    {
        $block_one = function ($params) {
            $subscription = Subscription::where('user_id', $params['user']->user_id)->get();
            $data = $subscription;
            $message = "";
            if (isset($subscription)) {
                $status = true;
            } else {
                $status = false;
                $message = "You don't have any active subscription";
            }

            return ['success' => $status, 'data' => $data, 'message' => $message];
        };

        $block_two = function () {
            return ['success' => false, 'data' => [], 'message' => 'Invalid user!'];
        };

        return response()
            ->json(executeRestrictedAccess($block_one, $block_two, ['request' => $request]));
    }
}
