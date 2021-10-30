<?php

namespace App\Http\Controllers\Setting;

use App\Model\Sacco\Sacco;

use App\Model\Settings\Ward;

use Illuminate\Http\Request;

use App\Model\Settings\Location;

use App\Model\Settings\SubCounty;

use App\Http\Controllers\Controller;
use App\Repositories\CommonRepository;
use App\Http\Requests\Settings\WardRequest;

class WardController extends Controller
{
    public function __construct(CommonRepository $commonRepository)
    {
      $this->commonRepository = $commonRepository;
    }
    public function index()
    {
        $results = Ward::with('sub_county')->get();

        $subcountyList = $this->commonRepository->SubcountyList();
        return view('admin.setting.ward.index', ['results' => $results, 'subcountyList' => $subcountyList]);
    }


    public function create()
    {

        $subcountyList = SubCounty::get();
        return view('admin.setting.ward.form', ['subcountyList' => $subcountyList]);
    }


    public function store(WardRequest $request)
    {
        $input = $request->all();
        try {
            Ward::create($input);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect('ward')->with('success', 'Ward successfully saved.');
        } else {
            return redirect('ward')->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function show($id)
    {   $subcountyList = $this->commonRepository->SubcountyList();
        $editModeData = Ward::findOrFail($id);
        return view('admin.setting.ward.form', ['editModeData' => $editModeData, 'subcountyList' => $subcountyList]);
    }


    public function update(WardRequest $request, $id)
    {
        $ward = Ward::findOrFail($id);
        $input = $request->all();
        try {
            $ward->update($input);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect()->back()->with('success', 'Ward successfully updated ');
        } else {
            return redirect()->back()->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function destroy($id)
    {

        $count = Location::where('ward_id', '=', $id)->count();
        $sacco = Sacco::where('ward_id','=',$id)->count();
        if ($count > 0 || $sacco > 0) {

            return  'hasForeignKey';
        }


        try {
            $ward = Ward::FindOrFail($id);
            $ward->delete();
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


    public function APIWard()
    {
        $ward = Ward::all();
        $status = false;
        $message = 'No Ward found';
        if (isset($ward)) {
            $status = true;
            $message = "OK";
        }
        return response()
            ->json(['success' => $status, 'message' => $message, 'data' => $ward]);
    }
}
