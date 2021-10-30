<?php

namespace App\Http\Controllers\Farm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Farm\VetRequest;

use App\Model\Farm\Vet;
use App\Model\Settings\County;
use App\Model\Settings\Location;
use App\Model\Settings\Region;
use App\Repositories\CommonRepository;

use Illuminate\Http\Request;

class VetController extends Controller
{
    protected $commonRepository;

    public function __construct(CommonRepository $commonRepository)
    {
        $this->commonRepository = $commonRepository;
    }


    public function index()
    {
        $results = Vet::with(['user', 'county', 'location'])->get();
        $countys  = $this->commonRepository->countyList();
        $location =$this->commonRepository->locationList();
        $userList = $this->commonRepository->userList();
        return view('admin.farm.vet.index', ['countys' =>$countys,'location' => $location,'results' => $results,'data'=>$userList]);
    }


    public function create()
     {
        $countys  = County::get();
        $location = Location::get();
        $region   = Region::get();
        $userList = $this->commonRepository->userList();
        return view('admin.farm.vet.form',['countys' =>$countys,'data'=>$userList,'location' => $location, 'region' =>$region]);
     }

    public function show($id)
    {
        $vet = Vet::with('user','county','location')->where('vet_id',$id)->first();
        $editModeData = Vet::findorFail($id);
        $countyList  = $this->commonRepository->countyList();
        $locationList = $this->commonRepository->locationList();
        $userList = $this->commonRepository->userList();
        return view('admin.farm.vet.form', compact('vet','editModeData','countyList','locationList','userList'));

    }


    public function store(VetRequest $request)
    {
        $input = $request->all();
        try {
            Vet::create($input);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect('vet')->with('success', 'Vet successfully saved.');
        } else {
            return redirect('vet')->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function edit($id)
    {
        $countyList  = $this->commonRepository->countyList();
        $locationList = $this->commonRepository->locationList();
        $userList = $this->commonRepository->userList();
        $editModeData = Vet::findOrFail($id);
        return view('admin.farm.vet.form', ['editModeData' => $editModeData,'data' =>$userList,'countys' =>$countyList, 'location' => $locationList]);
    }


    public function update(VetRequest $request, $id)
    {
        $vet = Vet::findOrFail($id);
        $input = $request->all();
        try {
            $vet->update($input);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect()->back()->with('success', 'Vet successfully updated ');
        } else {
            return redirect()->back()->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function destroy($id)
    {
        $count = Vet::where('county_id','=',$id)->count();

         if($count>0){

            return  'hasForeignKey';
         }

        try {
            $Vet = Vet::FindOrFail($id);
            $Vet->delete();
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


    public function APIVetRegister(Request $request)
    {
        $block_one = function ($params) {
            $input = $params['request']->all();
            $input['user_id'] = $params['user']->user_id;

            $vet = Vet::where('user_id', $params['user']->user_id)->first();

            if (!isset($vet)) {
                if (Vet::create($input)) {
                    $status = true;
                    $message = "You have successfully registered as a vet!";
                } else {
                    $status = false;
                    $message = "Your action failed. Please try again";
                }
            } else {
                $status = false;
                $message = "You are already signed up as a vet";
            }
            return ['success' => $status, 'data' => [], 'message' => $message];
        };

        $response = executeRestrictedAccess($block_one, "auth", ['request' => $request], false);

        return response()->json($response);
    }


    public function APIVetDetails(Request $request)
    {
        $block_one = function ($params) {
            $input = $params['request']->all();

            $vet = Vet::with(['user', 'county', 'location'])->where('user_id', $params['user']->user_id)->first();

            $status = false;
            $message = "";

            $data = [];
            if (isset($vet)) {
                $data["id"] = $vet->vet_id;
                $data["user_id"] = $vet->user_id;
                $data["county_id"] = $vet->county_id;
                $data["location_id"] = $vet->location_id;
                $data["region_id"] = $vet->region_id;
                $data["approved"] = $vet->approved;
                $data["name"] = $vet->name;
                $data["id_image"] = $vet->id_image;
                $data["profile_image"] = $vet->profile_image;
                $data["vet_certificate"] = $vet->vet_certificate;
                $data["created_at"] = $vet->created_at->toDateString();
                $data["updated_at"] = $vet->updated_at->toDateString();
                $data["email"] = isset($vet->user) ? $vet->user->email : null;
                $data["phone_no"] = isset($vet->user) ? $vet->user->phone_no : null;
                $data["county"] = isset($vet->user) ? $vet->county->county_name : null;
                $data["location"] = isset($vet->user) ? $vet->location->location_name : null;
                $status = true;
                $message = "";
            } else {
                $status = false;
                $message = "You have not registered as a vet. Please register first!";
            }

            return ['success' => $status, 'data' => $data, 'message' => $message];
        };

        $response = executeRestrictedAccess($block_one, "auth", ['request' => $request], false);
        return response()->json($response);
    }


    public function APIVets(Request $request)
    {
        $block_one = function ($params) {
            $vets = Vet::with(['user', 'county', 'location'])->orderBy('created_at', 'desc')->get();

            $status = false;
            $message = "";

            $data = [];
            if (!$vets->isEmpty()) {
                foreach ($vets as $key => $vet) {
                    $object = (object) [
                        'id' => $vet->vet_id,
                        'user_id' =>  (integer) $vet->user_id,
                        'county_id' =>  (integer) $vet->county_id,
                        'location_id' =>  (integer) $vet->location_id,
                        'region_id' =>  (integer) $vet->region_id,
                        'approved' =>  (integer) $vet->approved,
                        'name' => $vet->name,
                        'id_image' => $vet->id_image,
                        'profile_image' => $vet->profile_image,
                        'vet_certificate' => $vet->vet_certificate,
                        'created_at' => $vet->created_at->toDateString(),
                        'updated_at' => $vet->updated_at->toDateString(),
                        'email' => isset($vet->user) ? $vet->user->email : null,
                        'phone_no' => isset($vet->user) ? $vet->user->phone_no : null,
                        'county' => isset($vet->user) ? $vet->county->county_name : null,
                        'location' => isset($vet->user) ? $vet->location->location_name : null,
                    ];
                    array_push($data, $object);
                }
                $status = true;
                $message = "";
            } else {
                $status = false;
                $message = "There are no vets at the moment!";
            }

            return ['success' => $status, 'data' => $data, 'message' => $message];
        };

        $response = executeRestrictedAccess($block_one, "auth", ['request' => $request], false);
        return response()->json($response);
    }
}
