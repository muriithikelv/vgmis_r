<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\RegionRequest;
use App\Model\Settings\Region;


use App\Model\Settings\Location;

class RegionController extends Controller
{

    public function index(){
        $results = Region::with('location')->get();
        return view('admin.setting.region.index',['results'=>$results]);
    }


    public function create(){
        $locations = Location::get();
        return view('admin.setting.region.form', ['locations' => $locations]);
    }


    public function store(RegionRequest $request) {
        $input = $request->all();
        try{
            Region::create($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug==0){
            return redirect('region')->with('success', 'Region successfully saved.');
        }else {
            return redirect('region')->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function edit($id){
        $locations = Location::get();
        $editModeData = Region::findOrFail($id);
        return view('admin.setting.region.form',['editModeData' => $editModeData, 'locations' => $locations]);
    }


    public function update(RegionRequest $request,$id) {
        $region = Region::findOrFail($id);
        $input = $request->all();
        try{
            $region->update($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug==0){
            return redirect()->back()->with('success', 'Region successfully updated ');
        }else {
            return redirect()->back()->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function destroy($id){

        try{
            $region = Region::FindOrFail($id);
            $region->delete();
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug==0){
            echo "success";
        }elseif ($bug == 1451) {
            echo 'hasForeignKey';
        } else {
            echo 'error';
        }
    }


    public function APIRegions()
    {
        $regions = Region::all();
        $status = false;
        $message = 'No region found';
        if (isset($regions)) {
            $status = true;
            $message = "OK";
        }
        return response()
            ->json(['success' => $status, 'message' => $message, 'data' => $regions]);
    }

}
