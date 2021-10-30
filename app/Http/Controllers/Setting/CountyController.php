<?php

namespace App\Http\Controllers\Setting;

use App\Model\Farm\Vet;
use App\Model\Market\Vendor;

use App\Model\Settings\County;


use App\Model\Settings\Location;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\CountyRequest;
use App\Model\Sacco\Sacco;

class CountyController extends Controller
{

    public function index(){
        $results = County::get();
        return view('admin.setting.county.index',['results'=>$results]);
    }


    public function create(){
        return view('admin.setting.county.form');
    }


    public function store(CountyRequest $request) {
        $input = $request->all();
        try{
            County::create($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug==0){
            return redirect('county')->with('success', 'County successfully saved.');
        }else {
            return redirect('county')->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function show($id){
        $editModeData = County::findOrFail($id);
        return view('admin.setting.county.form',['editModeData' => $editModeData]);
    }


    public function update(CountyRequest $request,$id) {
        $county = County::findOrFail($id);
        $input = $request->all();
        try{
            $county->update($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug==0){
            return redirect()->back()->with('success', 'County successfully updated ');
        }else {
            return redirect()->back()->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function destroy($id){

      $count = Location::where('county_id','=',$id)->count();
      $vendor = Vendor::where('county_id', '=', $id)->count();
      $vet = Vet::where('county_id', '=', $id)->count();
      $sacco = Sacco::where('county_id', '=', $id)->count();

         if($count>0 || $vendor > 0 || $vet > 0 || $sacco > 0){

            return  'hasForeignKey';
         }


        try{
            $county = County::FindOrFail($id);
            $county->delete();
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


    public function APICounties()
    {
        $counties = County::all();
        $status = false;
        $message = 'No county found';
        if (isset($counties)) {
            $status = true;
            $message = "OK";
        }
        return response()
            ->json(['success' => $status, 'message' => $message, 'data' => $counties]);
    }
}
