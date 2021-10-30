<?php

namespace App\Http\Controllers\Sales;

use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use App\Model\Sales\Sales;

use App\Model\Market\Vendor;

use Illuminate\Http\Request;
use App\Model\Market\Product;
use App\Model\Market\Category;
use App\Model\PrintHeadSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Repositories\CommonRepository;
use Illuminate\Contracts\Session\Session;
use App\Http\Requests\Market\ProductRequest;
use App\Http\Requests\Settings\SalesRequest;

class SalesController extends Controller
{

    protected $commonRepository;

    public function __construct(CommonRepository $commonRepository)
    {
        $this->commonRepository = $commonRepository;
    }


    public function index(Request $request)
    {
        $userList  = $this->commonRepository->userList();
        $vendorList  = $this->commonRepository->vendorList();
        $categoryList = $this->commonRepository->categoryList();
        $results = Product::join('user','product.bought_by', '=','user.user_id')->with(['user', 'vendor', 'category'])
                            ->where('product.status',2)
                            ->orderBy('product_id', 'DESC')
                            ->get();
        return view('admin.sales.index', ['results' => $results,'data' => $userList,'vendors' => $vendorList, 'categorys' => $categoryList]);
    }

    public function invoice(Request $id)
    {
      $product = Product::join('user','product.bought_by', '=','user.user_id')->with('user','vendor')->find($id)->first();
      $invoice_number = 'VGMIS' . (str_pad((int)+ $product->product_id+1, 4, '0', STR_PAD_LEFT));



       $data   =[
           'product' => $product->name,
           'username' =>$product->vendor->name,
           'price' => $product->price,
           'delivery_cost' =>$product->delivery_cost,
           'description' =>$product->description,
           'date_bought' =>$product->updated_at,
           'bought_by' => $product->user->user_name,
           'invoice_number' =>$invoice_number,

       ];
       $pdf    = PDF::loadView('admin.invoice.salesInvoice',$data);
       $pdf->setPaper('A4', 'landscape');
        return $pdf->download('invoice.pdf');
  }





}
