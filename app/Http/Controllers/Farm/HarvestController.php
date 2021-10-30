<?php

namespace App\Http\Controllers\Farm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Farm\HarvestRequest;

use App\Model\Farm\Harvest;

use App\Repositories\CommonRepository;


use App\Model\Subscription\Subscription;
use Illuminate\Http\Request;

class HarvestController extends Controller
{

    protected $commonRepository;

    public function __construct(CommonRepository $commonRepository)
    {
        $this->commonRepository = $commonRepository;
    }


    public function index()
    {
        $results = Harvest::with('user')->get();
        $userList = $this->commonRepository->userList();
        return view('admin.farm.harvest.index', ['results' => $results, 'data' =>$userList]);
    }


    public function create()
    {
        $userList = $this->commonRepository->userList();
        return view('admin.farm.harvest.form',['data' =>$userList]);
    }

    public function show($id)
    {
        $harvest = Harvest::with('user')->where('harvest_id',$id)->first();
        $userList = $this->commonRepository->userList();
        $editModeData = Harvest::findorFail($id);
        return view('admin.farm.harvest.form',compact('harvest','editModeData','userList'));
    }

    public function store(HarvestRequest $request)
    {
        $input = $request->all();
        try {
            Harvest::create($input);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect('harvest')->with('success', 'Harvest successfully saved.');
        } else {
            return redirect('harvest')->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function edit($id)
    {
        $userList = $this->commonRepository->userList();
        $editModeData = Harvest::findOrFail($id);
        return view('admin.farm.harvest.form', ['editModeData' => $editModeData, 'data' => $userList]);
    }


    public function update(Request $request, $id)
    {
        $harvest = Harvest::findOrFail($id);
        $input = $request->all();
        try {
            $harvest->update($input);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect()->back()->with('success', 'Harvest successfully updated ');
        } else {
            return redirect()->back()->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function destroy($id)
    {

        try {
            $harvest = Harvest::FindOrFail($id);
            $harvest->delete();
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

    public function APIHarvest(Request $request)
    {
        $block_one = function ($params) {
            $harvests = Harvest::where('user_id', $params['user']->user_id)->get();
            $data = $harvests;
            $message = "";
            if (!$harvests->isEmpty()) {
                $status = true;
            } else {
                $status = false;
                $message = "You have not added any harvest yet!";
            }

            return ['success' => $status, 'data' => $data, 'message' => $message];
        };

        return response()
            ->json(executeRestrictedAccess($block_one, "auth", ['request' => $request]));
    }

    public function APIHarvestStore(Request $request)
    {
        $block_one = function ($params) {
            $input = $params['request']->all();
            $input['harvest_name'] = $input['type'];
            $input['user_id'] = $params['user']->user_id;
            if (Harvest::create($input)) {
                $status = true;
                $message = "Harvest created successfully";
            } else {
                $status = false;
                $message = "Your action failed. Please try again";
            }

            return ['success' => $status, 'data' => [], 'message' => $message];
        };

        return response()
            ->json(executeRestrictedAccess($block_one, "auth", ['request' => $request]));
    }


    public function APIHarvestUpdate(Request $request)
    {
        $block_one = function ($params) {
            $input = $params['request']->all();

            $harvest = Harvest::where('harvest_id', $input['harvest_id'])->where('user_id', $params['user']->user_id)->first();
            $status = false;
            $message = "";
            if (isset($harvest)) {
                $input['harvest_name'] = $input['type'];
                $input['amount'] = $input['amount'];
                $harvest->update($input);
                $status = true;
                $message = "Harvest updated successfully";
            } else {
                $status = false;
                $message = "The selected harvest record is missing!";
            }

            return ['success' => $status, 'data' => [], 'message' => $message];
        };

        return response()
            ->json(executeRestrictedAccess($block_one, "auth", ['request' => $request]));
    }

    public function APIHarvestDelete(Request $request)
    {
        $block_one = function ($params) {
            $input = $params['request']->all();

            $harvest = Harvest::where('harvest_id', $input['harvest_id'])->where('user_id', $params['user']->user_id)->first();
            $status = false;
            $message = "";
            if (isset($harvest)) {
                $harvest->delete();
                $status = true;
                $message = "Harvest record deleted successfully";
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
