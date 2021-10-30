<?php

namespace App\Http\Controllers\Farm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Farm\LivestockRequest;

use App\Model\Farm\Livestock;


use App\Repositories\CommonRepository;

use Illuminate\Http\Request;

class LivestockController extends Controller
{
    protected $commonRepository;

    public function __construct(CommonRepository $commonRepository)
    {
        $this->commonRepository = $commonRepository;
    }


    public function index()
    {
        $results = Livestock::with('user')->get();
        $userList = $this->commonRepository->userList();
        return view('admin.farm.livestock.index', ['results' => $results,'data' => $userList]);
    }


    public function create()
    {
        $userList = $this->commonRepository->userList();
        return view('admin.farm.livestock.form',['data' => $userList]);
    }

    public function show($id)
    {
        $livestock = Livestock::with('user')->where('livestock_id',$id)->first();
        $userList = $this->commonRepository->userList();
        $editModeData = Livestock::findorFail($id);
        return view('admin.farm.livestock.form',compact('livestock','userList','editModeData'));
    }


    public function store(LivestockRequest $request)
    {
        $input = $request->all();
        try {
            Livestock::create($input);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect('livestock')->with('success', 'Livestock successfully saved.');
        } else {
            return redirect('livestock')->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function edit($id)
    {
        $userList = $this->commonRepository->userList();
        $editModeData = Livestock::findOrFail($id);
        return view('admin.farm.livestock.form', ['editModeData' => $editModeData, 'data' => $userList]);
    }


    public function update(LivestockRequest $request, $id)
    {
        $livestock = Livestock::findOrFail($id);
        $input = $request->all();
        try {
            $livestock->update($input);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect()->back()->with('success', 'Livestock successfully updated ');
        } else {
            return redirect()->back()->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function destroy($id)
    {

        try {
            $livestock = Livestock::FindOrFail($id);
            $livestock->delete();
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

    public function APILivestock(Request $request)
    {
        $block_one = function ($params) {
            $livestocks = Livestock::where('user_id', $params['user']->user_id)->get();
            $data = $livestocks;
            $message = "";
            if (!$livestocks->isEmpty()) {
                $status = true;
            } else {
                $status = false;
                $message = "You have not added any livestock record yet!";
            }

            return ['success' => $status, 'data' => $data, 'message' => $message];
        };

        $response = executeRestrictedAccess($block_one, "auth", ['request' => $request]);
        return response()->json($response);
    }

    public function APILivestockStore(Request $request)
    {
        $block_one = function ($params) {
            $input = $params['request']->all();
            $input['user_id'] = $params['user']->user_id;
            $input['livestock_name'] = $input['type'];
            $input['number'] = $input['number'];
            $input['gender'] = $input['gender'];
            $input['age'] = $input['age'];
            if (Livestock::create($input)) {
                $status = true;
                $message = "Livestock record added successfully";
            } else {
                $status = false;
                $message = "Your action failed. Please try again";
            }

            return ['success' => $status, 'data' => [], 'message' => $message];
        };

        return response()
            ->json(executeRestrictedAccess($block_one, "auth", ['request' => $request]));
    }


    public function APILivestockUpdate(Request $request)
    {
        $block_one = function ($params) {
            $input = $params['request']->all();

            $livestock = Livestock::where('livestock_id', $input['livestock_id'])->first();
            $status = false;
            $message = "";
            if (isset($livestock)) {
                $input['livestock_name'] = $input['type'];
                $input['number'] = $input['number'];
                $input['gender'] = $input['gender'];
                $input['age'] = $input['age'];
                $livestock->update($input);
                $status = true;
                $message = "Livestock record updated successfully";
            } else {
                $status = false;
                $message = "The selected livestock record is missing!";
            }

            return ['success' => $status, 'data' => [], 'message' => $message];
        };

        return response()
            ->json(executeRestrictedAccess($block_one, "auth", ['request' => $request]));
    }

    public function APILivestockDelete(Request $request)
    {
        $block_one = function ($params) {
            $input = $params['request']->all();

            $livestock = Livestock::where('livestock_id', $input['livestock_id'])->first();
            $status = false;
            $message = "";
            if (isset($livestock)) {
                $livestock->delete();
                $status = true;
                $message = "Livestock record deleted successfully";
            } else {
                $status = false;
                $message = "The selected livestock record is missing!";
            }

            return ['success' => $status, 'data' => [], 'message' => $message];
        };

        return response()
            ->json(executeRestrictedAccess($block_one, "auth", ['request' => $request]));
    }
}
