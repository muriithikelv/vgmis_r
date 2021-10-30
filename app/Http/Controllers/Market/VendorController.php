<?php

namespace App\Http\Controllers\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Market\VendorRequest;

use App\Model\Market\Vendor;

use App\Repositories\CommonRepository;

use App\Model\Settings\County;

use App\Model\Settings\Location;

use App\Model\Settings\Region;

use App\Model\Market\Product;
use Illuminate\Http\Request;

class VendorController extends Controller
{

    protected $commonRepository;

    public function __construct(CommonRepository $commonRepository)
    {
        $this->commonRepository = $commonRepository;
    }

    public function index()
    {
        $countyList  = $this->commonRepository->countyList();
        $locationList = $this->commonRepository->locationList();
        $region   = Region::get();
        $userList = $this->commonRepository->userList();
        $results = Vendor::with(['user', 'county', 'location'])->get();
        return view('admin.market.vendor.index', ['results' => $results,'countys' => $countyList, 'data'=>$userList,'location' => $locationList]);
    }


    public function create()
    {    $countys  = County::get();
         $location = Location::get();
         $region   = Region::get();
         $userList = $this->commonRepository->userList();
        return view('admin.market.vendor.form',['countys' =>$countys,'data'=>$userList,'location' => $location, 'region' => $region]);
    }


    public function store(VendorRequest $request)
    {
        $input = $request->all();
        try {
            Vendor::create($input);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect()->back()->with('success', 'Vendor successfully saved.');
        } else {
            return redirect()->back()->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function show($id)
    {
        $vendor =Vendor::with('user','county','location')->where('vendor_id',$id)->first();
        $editModeData = Vendor::findOrFail($id);
        $countyList  = $this->commonRepository->countyList();
        $locationList = $this->commonRepository->locationList();
        $userList = $this->commonRepository->userList();
        return view('admin.market.vendor.form',compact('vendor','editModeData','countyList','locationList','userList'));
    }

    public function edit($id)
    {
        $countyList  = $this->commonRepository->countyList();
        $locationList = $this->commonRepository->locationList();
        $userList = $this->commonRepository->userList();
        $editModeData = Vendor::findOrFail($id);
        return view('admin.market.vendor.form', ['editModeData' => $editModeData, 'countys' => $countyList, 'location' =>$locationList, /* 'region' => $region, */ 'data'=>$userList]);
    }


    public function update(Request $request, $id)
    {
        $vendor = Vendor::findOrFail($id);
        $input = $request->all();
        try {
            $vendor->update($input);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect()->back()->with('success', 'Vendor successfully updated ');
        } else {
            return redirect()->back()->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function destroy($id)
    {
        $count =Product::where('vendor_id','=',$id)->count();
        if($count>0)
        {
            return 'hasForeignKey';
        }

        try {
            $vendor = Vendor::FindOrFail($id);
            $vendor->delete();
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

    public function APIVendorRegister(Request $request)
    {
        $block_one = function ($params) {
            $input = $params['request']->all();
            $input['user_id'] = $params['user']->user_id;

            $vendor = Vendor::where('user_id', $params['user']->user_id)->first();
            if (!isset($vendor)) {
                if (Vendor::create($input)) {
                    $status = true;
                    $message = "You have successfully registered as a vendor!";
                } else {
                    $status = false;
                    $message = "Your action failed. Please try again";
                }
            } else {
                $status = false;
                $message = "You are already signed up as a vendor";
            }

            return ['success' => $status, 'data' => [], 'message' => $message];
        };

        $response = executeRestrictedAccess($block_one, "auth", ['request' => $request], false);

        return response()->json($response);
    }

    public function APIVendorDetails(Request $request)
    {
        $block_one = function ($params) {
            $vendor = Vendor::with(['user', 'county', 'location'])->where('user_id', $params['user']->user_id)->first();

            $status = false;
            $message = "";

            $data = [];
            if (isset($vendor)) {
                $data["id"] = $vendor->vet_id;
                $data["user_id"] = $vendor->user_id;
                $data["county_id"] = $vendor->county_id;
                $data["location_id"] = $vendor->location_id;
                $data["region_id"] = $vendor->region_id;
                $data["approved"] = $vendor->approved;
                $data["name"] = $vendor->name;
                $data["created_at"] = $vendor->created_at->toDateString();
                $data["updated_at"] = $vendor->updated_at->toDateString();
                $data["email"] = isset($vendor->user) ? $vendor->user->email : null;
                $data["phone_no"] = isset($vendor->user) ? $vendor->user->phone_no : null;
                $data["county"] = isset($vendor->county) ? $vendor->county->county_name : null;
                $data["location"] = isset($vendor->location) ? $vendor->location->location_name : null;

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

    public function APIVendors(Request $request)
    {
        $block_one = function ($params) {
            $vendors = Vendor::with(['user', 'county', 'location'])->orderBy('created_at', 'desc')->get();


            $status = false;
            $message = "";

            $data = [];
            if (!$vendors->isEmpty()) {
                foreach ($vendors as $key => $vendor) {
                    $object = (object) [
                        'id' => $vendor->vet_id,
                        'user_id' => $vendor->user_id,
                        'county_id' => $vendor->county_id,
                        'location_id' => $vendor->location_id,
                        'region_id' => $vendor->region_id,
                        'approved' => $vendor->approved,
                        'name' => $vendor->name,
                        'created_at' => $vendor->created_at->toDateString(),
                        'updated_at' => $vendor->updated_at->toDateString(),
                        'email' => isset($vendor->user) ? $vendor->user->email : null,
                        'phone_no' => isset($vendor->user) ? $vendor->user->phone_no : null,
                        'county' => isset($vendor->county) ? $vendor->county->county_name : null,
                        'location' => isset($vendor->location) ? $vendor->location->location_name : null,
                    ];

                    array_push($data, $object);

                }

                $status = true;
                $message = "";
            } else {
                $status = false;
                $message = "There are vendors at the moment!";
            }

            return ['success' => $status, 'data' => $data, 'message' => $message];
        };

        $response = executeRestrictedAccess($block_one, "auth", ['request' => $request], false);
        return response()->json($response);
    }
}
