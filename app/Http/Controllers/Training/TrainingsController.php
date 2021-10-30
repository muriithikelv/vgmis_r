<?php

namespace App\Http\Controllers\Training;

use Illuminate\Http\Request;
use App\Model\Training\Training;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Training\TrainingRequest;

class TrainingsController extends Controller
{
    public function index()
    {
        $results = Training::with('CreatedBy')->orderBy('training_id','DESC')->get();
        return view('admin.training.index',['results'=>$results]);
    }

    public function create(){
        return view('admin.training.index');
    }



    public function store(TrainingRequest $request) {

        $input  = $request->all();
        $input['created_by'] = Auth::user()->user_id;
        $input['updated_by'] = Auth::user()->user_id;

        try{
            Training::create($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug==0){
            return redirect('training')->with('success', 'Training Successfully saved.');
        }else {
            return redirect('training')->with('error', 'Something Error Found !, Please try again.');
        }
    }



    public function show($id){

        $editModeData = Training::with('createdBy')->where('training_id',$id)->first();
        return view('admin.training.index',compact('editModeData'));
    }



    public function edit($id){
        $training = Training::with('CreatedBy')->where('training_id',$id)->first();
        $editModeData = Training::FindOrFail($id);
        return view('admin.training.form',compact('editModeData'),['training'=>$training]);
    }



    public function update(TrainingRequest $request,$id) {

        $data = Training::FindOrFail($id);
        $input = $request->all();
        $input['created_by'] = Auth::user()->user_id;
        $input['updated_by'] = Auth::user()->user_id;

        try{
            $data->update($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug==0){
            return redirect()->back()->with('success', 'Training Successfully Updated.');
        }else {
            return redirect()->back()->with('error', 'Something Error Found !, Please try again.');
        }
    }



    public function destroy($id){
        try{
            $data = Training::FindOrFail($id);

            $data->delete();
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


    public function APITrainings(Request $request)
    {
        $block_one = function ($params) {

            $trainings = Training::where('status', '=', 'Published')->get();
            $status = false;
            $message = "";

            $data = [];
            if (!$trainings->isEmpty()) {
                foreach ($trainings as $key => $training) {
                    $object = (object) [
                        'id' => $training->training_id,
                        'user_id' => 2,
                        'title' => $training->title,
                        'body' => $training->description,
                        'created_at' => $training->created_at->toDateString(),
                        'updated_at' => $training->updated_at->toDateString()
                    ];
                    array_push($data, $object);
                }

                $status = true;
                $message = "OK";
            } else {
                $status = false;
                $message = "There are no published trainings";
            }

            return ['success' => $status, 'data' => $data, 'message' => $message];
        };

        $response = executeRestrictedAccess($block_one, "auth", ['request' => $request]);
        return response()->json($response);
    }
}
