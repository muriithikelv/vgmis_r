<?php

namespace App\Http\Controllers\Setting;

use App\Model\Farm\Vet;
use App\Model\Market\Vendor;

use App\Model\Settings\County;


use App\Model\Settings\Region;
use App\Model\Settings\Location;
use App\Http\Controllers\Controller;
use App\Repositories\CommonRepository;
use App\Http\Requests\Settings\LocationRequest;
use App\Model\Sacco\SaccoMember;

class LocationController extends Controller
{
    public function __construct(CommonRepository $commonRepository)
    {
        $this->commonRepository = $commonRepository;
    }

    public function index()
    {
        $results = Location::with('county')->get();
        $counties = $this->commonRepository->countyList();

        return view('admin.setting.location.index', ['results' => $results,'counties' => $counties]);
    }


    public function create()
    {
        $counties = County::get();
        return view('admin.setting.location.form', ['counties' => $counties]);
    }


    public function store(LocationRequest $request)
    {
        $input = $request->all();
        try {
            Location::create($input);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect('location')->with('success', 'Location successfully saved.');
        } else {
            return redirect('location')->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function show($id)
    {
        $editModeData = Location::with('county')->findOrFail($id);
        $counties = $this->commonRepository->countyList();
        return view('admin.setting.location.form', ['editModeData' => $editModeData, 'counties' => $counties]);
    }


    public function update(LocationRequest $request, $id)
    {
        $location = Location::findOrFail($id);
        $input = $request->all();
        try {
            $location->update($input);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect()->back()->with('success', 'Location successfully updated ');
        } else {
            return redirect()->back()->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function destroy($id)
    {

        $vendor = Vendor::where('location_id', '=', $id)->count();
        $count = Region::where('location_id', '=', $id)->count();
        $vet = Vet::where('location_id', '=', $id)->count();
        $members = SaccoMember::where('location_id', '=', $id)->count();




        if ($count > 0 || $vendor > 0 || $vet > 0 || $members > 0) {

            return  'hasForeignKey';
        }


        try {
            $location = Location::FindOrFail($id);
            $location->delete();
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

    public function APILocations()
    {
        $locations = Location::all();
        $status = false;
        $message = 'No location found';
        if (isset($locations)) {
            $status = true;
            $message = "OK";
        }
        return response()
            ->json(['success' => $status, 'message' => $message, 'data' => $locations]);
    }
}
