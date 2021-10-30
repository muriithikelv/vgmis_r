<?php

namespace App\Http\Controllers\Market;

use App\User;
use App\Model\Sales\Sales;
use App\Model\Market\Vendor;
use Illuminate\Http\Request;

use App\Model\Market\Product;

use App\Model\Market\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Repositories\CommonRepository;
use Illuminate\Contracts\Session\Session;
use App\Http\Requests\Market\ProductRequest;
use App\Http\Requests\Settings\SalesRequest;

class ProductController extends Controller
{

    protected $commonRepository;

    public function __construct(CommonRepository $commonRepository)
    {
        $this->commonRepository = $commonRepository;
    }


    public function index()
    {
        $userList  = $this->commonRepository->userList();
        $vendorList  = $this->commonRepository->vendorList();
        $categoryList = $this->commonRepository->categoryList();
        $results = Product::with(['user', 'vendor', 'category'])->get();
        return view('admin.market.product.index', ['results' => $results,'data' => $userList,'vendors' => $vendorList, 'categorys' => $categoryList]);
    }


    public function create()
    {
        $userList  = $this->commonRepository->userList();
        $vendors   = Vendor::get();
        $categorys = Category::get();
        return view('admin.market.product.form',['data' => $userList,'vendors' => $vendors, 'categorys' => $categorys]);
    }

    public function show($id)
    {
        $product = Product::with('user', 'vendor','category')->where('product_id',$id)->first();
        $userList  = $this->commonRepository->userList();
        $vendorList  = $this->commonRepository->vendorList();
        $categoryList = $this->commonRepository->categoryList();
        $editModeData = Product::findorFail($id);
        return view('admin.market.product.form',compact('product','editModeData','userList','vendorList','categoryList'));
    }


    public function store(ProductRequest $request)
    {
        $input = $request->all();
        try {
            Product::create($input);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect('product')->with('success', 'Product successfully saved.');
        } else {
            return redirect('product')->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function edit($id)
    {
        $userList  = $this->commonRepository->userList();
        $vendorList  = $this->commonRepository->vendorList();
        $categoryList = $this->commonRepository->categoryList();
        $editModeData = Product::findOrFail($id);
        return view('admin.market.product.form', ['editModeData' => $editModeData, 'vendors' => $vendorList, 'data' => $userList, 'categorys' => $categoryList]);
    }


    private function purchaseconfirmpurchase($id, $status)
    {
        try {
            $product = Product::FindOrFail($id);
            $action = $status == 2 ? "Sales made ".$product->product_name : "Sales cancelled ".$product->product_name;
             insertAudit(Auth::user()->user_id, Auth::user()->first_name . " " . Auth::user()->last_name, "Sales made for".$product,$action);

            $input["status"] = $status;
            try {
                $product->update($input);
                $bug = 0;
            } catch (\Exception $e) {
                $bug = $e->errorInfo[1];
            }
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            echo "success";
        } else {
            echo 'error';
        }
    }
    public function purchase($id)
    {
        $this->purchaseconfirmpurchase($id, 2);
    }
    public function  requestPurchase($id)
    {
        $this->purchaseconfirmpurchase($id, 1);
    }
    public function cancelPurchase($id)
    {
        $this->purchaseconfirmpurchase($id, 0);
    }
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $input = $request->all();
        try {
            $product->update($input);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect()->back()->with('success', 'Product successfully updated ');
        } else {
            return redirect()->back()->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function destroy($id)
    {

        try {
            $product = Product::FindOrFail($id);
            $product->delete();
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

    public function APICreateProduct(Request $request)
    {
        $block_one = function ($params) {

            $input = $params['request']->all();

            $input['user_id'] = $params['user']->user_id;

            $vendor = Vendor::where('user_id',  $params['user']->user_id)->first();

            $input['vendor_id'] = $vendor->vendor_id;

            if (Product::create($input)) {
                $status = true;
                $message = "Product created successfully!";
            } else {
                $status = false;
                $message = "Your action failed. Please try again";
            }

            return ['success' => $status, 'data' => [], 'message' => $message];
        };

        $response = executeRestrictedAccess($block_one, "auth", ['request' => $request], false);

        return response()->json($response);
    }

    public function APIVendorProducts(Request $request)
    {
        $block_one = function ($params) {

            $products = Product::with(['user', 'vendor' => function ($q) {
                $q->with(['county', 'location']);
            }])->where('user_id', $params['user']->user_id)->get();
            $status = false;
            $message = "";

            $data = [];
            if (!$products->isEmpty()) {
                foreach ($products as $key => $product) {
                    $object = (object) [
                        'id' => $product->product_id,
                        'vendor_id' => $product->vendor_id,
                        'category_id' => $product->category_id,
                        'name' => $product->name,
                        'price' => $product->price,
                        'delivery_cost' => $product->delivery_cost,
                        'description' => $product->description,
                        'created_at' => $product->created_at->toDateString(),
                        'updated_at' => $product->updated_at->toDateString(),
                        'vendor_name' => isset($product->vendor) ? $product->vendor->name : '',
                        'vendor_email' => isset($product->user) ? $product->user->email : '',
                        'vendor_phone_no' => isset($product->user) ? $product->user->phone_no : '',
                        'vendor_county' => isset($product->vendor->county) ? $product->vendor->county->county_name : '',
                        'vendor_location' => isset($product->vendor->location) ? $product->vendor->location->location_name : '',
                        'images' => [],
                    ];
                    array_push($data, $object);
                }

                $status = true;
                $message = "";
            } else {
                $status = false;
                $message = "You have not added any product yet!";
            }

            return ['success' => $status, 'data' => $data, 'message' => $message];
        };

        $response = executeRestrictedAccess($block_one, "auth", ['request' => $request], false);
        return response()->json($response);
    }


    public function APIProducts(Request $request)
    {
        $block_one = function ($params) {

            $products = Product::with(['user', 'vendor' => function ($q) {
                $q->with(['county', 'location']);
            }])->orderBy('created_at', 'desc')->get();
            $status = false;
            $message = "";

            $data = [];
            if (!$products->isEmpty()) {
                foreach ($products as $key => $product) {
                    $images = [];
                    $image = (object) [
                        'id' => 1,
                        'product_image' => 'https://dummyimage.com/mediumrectangle',
                        'created_at' => $product->created_at->toDateString(),
                    ];
                    array_push($images, $image);

                    $object = (object) [
                        'id' => $product->product_id,
                        'vendor_id' => $product->vendor_id,
                        'category_id' => $product->category_id,
                        'name' => $product->name,
                        'price' => $product->price,
                        'delivery_cost' => $product->delivery_cost,
                        'description' => $product->description,
                        'created_at' => $product->created_at->toDateString(),
                        'updated_at' => $product->updated_at->toDateString(),
                        'vendor_name' => isset($product->vendor) ? $product->vendor->name : '',
                        'vendor_email' => isset($product->user) ? $product->user->email : '',
                        'vendor_phone_no' => isset($product->user) ? $product->user->phone_no : '',
                        'vendor_county' => isset($product->vendor->county) ? $product->vendor->county->county_name : '',
                        'vendor_location' => isset($product->vendor->location) ? $product->vendor->location->location_name : '',
                        'images' => $images,
                    ];
                    array_push($data, $object);
                }

                $status = true;
                $message = "";
            } else {
                $status = false;
                $message = "You have not added any product yet!";
            }

            return ['success' => $status, 'data' => $data, 'message' => $message];
        };

        $response = executeRestrictedAccess($block_one, "auth", ['request' => $request], false);
        return response()->json($response);
    }

    public function APIPurchaseProducts(Request $request)
    {

        $block_one = function ($params) {
            $input = $params['request']->all();

            $product = Product::where('product_id', $input['product_id'])->where('status','=','0')->first();
            $status = false;
            $message = "";
            if (isset($product)) {
                $input['bought_by'] = $params['user']->user_id;
                $input['status'] = 1 ;
                $product->update($input);
                $status = true;
                $message = "Purchase request sent successfully";
            }elseif($product=['status']!=0)
            {
                $status = false;
                $message = "The product selected  already bought or missing!";
            }

            return ['success' => $status, 'data' => [], 'message' => $message];
        };
    return response()
            ->json(executeRestrictedAccess($block_one, "auth", ['request' => $request]));

    }

    public function APIConfirmPurchase(Request $request)
    {
        $block_one = function ($params) {
            $input = $params['request']->all();

            $product = Product::where('product_id', $input['product_id'])->where('status','=','1')->first();
            $status = false;
            $message = "";
            if (isset($product)) {
                $input['bought_by'] = $params['user']->user_id;
                $input['status'] = 2 ;
                $product->update($input);
                $status = true;
                $message = "Purchase confirmed successfully";
            }elseif($product=['status']!=1)
            {
                $status = false;
                $message = "The product selected  already bought or missing!";
            }

            return ['success' => $status, 'data' => [], 'message' => $message];
        };
    return response()
            ->json(executeRestrictedAccess($block_one, "auth", ['request' => $request]));
    }

     public function APICancelPurchase(Request $request)
    {
        $block_one = function ($params) {
            $input = $params['request']->all();

            $product = Product::where('product_id', $input['product_id'])->where('status','=','1')->first();
            $status = false;
            $message = "";
            if (isset($product)) {
                $input['bought_by'] = "";
                $input['status'] = 0 ;
                $product->update($input);
                $status = true;
                $message = "Purchase request cancelled successfully";
            }elseif($product=['status']!=1)
            {
                $status = false;
                $message = "The product selected  already bought or missing!";
            }

            return ['success' => $status, 'data' => [], 'message' => $message];
        };
    return response()
            ->json(executeRestrictedAccess($block_one, "auth", ['request' => $request]));
    }


}
