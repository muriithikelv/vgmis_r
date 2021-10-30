<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Model\Settings\County;
use App\Model\Settings\Location;
use App\Model\Settings\SubCounty;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\CommonRepository;
use App\Http\Requests\Settings\SubCountyRequest;
use App\Model\Sacco\Sacco;

class SubCountyController extends Controller
{
    protected $commonRepository;

    public function __construct(CommonRepository $commonRepository)
    {
        $this->commonRepository = $commonRepository;
    }
    public function index(){

        $results = SubCounty::with('county')->get();

        $countys = $this->commonRepository->countyList();
        return view('admin.setting.subcounty.index',['results'=>$results,'countys'=>$countys]);
    }


    public function create(){

        $countys = County::get();

        return view('admin.setting.subcounty.form',['countys'=>$countys]);
    }


    public function store(SubCountyRequest $request) {
        $input = $request->all();
        try{
            SubCounty::create($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug==0){
            return redirect('subcounty')->with('success', 'SubCounty successfully saved.');
        }else {
            return redirect('subcounty')->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function show($id){
        $countys = $this->commonRepository->countyList();
        $editModeData = SubCounty::findOrFail($id);
        return view('admin.setting.subcounty.form',['editModeData' => $editModeData, 'countys' =>$countys]);
    }


    public function update(SubCountyRequest $request,$id) {
        $SubCounty = SubCounty::findOrFail($id);
        $input = $request->all();
        try{
            $SubCounty->update($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug==0){
            return redirect()->back()->with('success', 'SubCounty successfully updated ');
        }else {
            return redirect()->back()->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function destroy($id){

      $count = Location::where('sub_county_id','=',$id)->count();
      $sacco = Sacco::where('sub_county_id','=',$id)->count();

         if($count>0 || $sacco > 0){

            return  'hasForeignKey';
         }


        try{
            $SubCounty = SubCounty::FindOrFail($id);
            $SubCounty->delete();
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


    public function APISubCounties()
    {
        $subcounties = SubCounty::all();
        $status = false;
        $message = 'No Sub County found';
        if (isset($subcounties)) {
            $status = true;
            $message = "OK";
        }
        return response()
            ->json(['success' => $status, 'message' => $message, 'data' => $subcounties]);
    }
}
