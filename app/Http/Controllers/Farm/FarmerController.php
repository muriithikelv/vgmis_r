<?php

namespace App\Http\Controllers\Farm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Farm\FarmerRequest;

use App\Model\Farm\Farmer;
use App\User;

class FarmerController extends Controller
{

    public function index(){
        $results = User::where('role_id', 10)->get();
        return view('admin.farm.farmer.index',['results'=>$results]);
    }


    public function create(){
        return view('admin.farm.farmer.form');
    }


    public function store(FarmerRequest $request) {
        $input = $request->all();
        try{
            Farmer::create($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug==0){
            return redirect('farmer')->with('success', 'Farmer successfully saved.');
        }else {
            return redirect('farmer')->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function edit($id){
        $editModeData = Farmer::findOrFail($id);
        return view('admin.farm.farmer.form',['editModeData' => $editModeData]);
    }


    public function update(FarmerRequest $request,$id) {
        $farmer = Farmer::findOrFail($id);
        $input = $request->all();
        try{
            $farmer->update($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug==0){
            return redirect()->back()->with('success', 'Farmer successfully updated ');
        }else {
            return redirect()->back()->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function destroy($id){

        try{
            $farmer = Farmer::FindOrFail($id);
            $farmer->delete();
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

}
