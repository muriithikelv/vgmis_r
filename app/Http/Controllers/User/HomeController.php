<?php

namespace App\Http\Controllers\User;

use App\Model\EmployeeEducationQualification;

use App\Repositories\AttendanceRepository;

use App\Http\Controllers\Controller;
use App\Model\Farm\Farmer;
use App\Model\Farm\Vet;
use App\Model\Market\Product;
use App\Model\Market\Vendor;
use App\Model\Sacco\MilkCollection;
use App\Model\Sacco\SaccoEditor;
use App\Model\Sacco\SaccoMember;
use App\Model\Sacco\Sacco;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;


use Mail;


class HomeController extends Controller
{
    protected $user;


    function __construct(User $user)
    {
        $this->user            = $user;
     }


    public function index()
    {


        if (session('logged_session_data.role_id') != 1) {


            $userInfo = $this->user->with('role')->where('user_id', session('logged_session_data.user_id'))->first();



            $data = [
                'userInfo'            => $userInfo,
            ];

            return view('admin.generalUserHome', $data);
        }

            $totalFarmer = Farmer::all()->count();
            $totalvets = Vet::all()->count();
            $totalVendors = Vendor::all()->count();
            $totalProducts = Product::all()->count();
            $totalUsers = User::all()->count();
            $users = User::select(DB::raw("COUNT(*) as count"))
                        ->whereYear('created_at', date('Y'))
                        ->groupBy(DB::raw("Month(created_at)"))
                        ->pluck('count');
            $totalMembers = SaccoMember::all()->count();
            $totalGroupadmins = SaccoEditor::all()->count();
            $totalGroups = Sacco::all()->count();
            $newProducts = Product::with('user')->whereDate('created_at',DB::raw('CURDATE()'))->get();
            $weekProducts = Product::with('user')->whereBetween('created_at', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->get();
            $monthProducts = Product::with('user')->whereMonth('created_at', Carbon::now()->month)->get();
            $newMembers = SaccoMember::with('sacco','location')->whereMonth('created_at', Carbon::now()->month)->get();
            $collections = MilkCollection::with(['sacco', 'user'])->orderBy('created_at', 'desc')->take(10)->get();
            $data = [
                'totalVets' => $totalvets,
                'users' => $users,
                'newProducts' =>$newProducts,
                'newMembers' =>$newMembers,
                'weekProducts' =>$weekProducts,
                'monthProducts' =>$monthProducts,
                'totalFarmer' => $totalFarmer,
                'totalVendors' => $totalVendors,
                'totalProducts' => $totalProducts,
                'totalUsers' => $totalUsers,
                'totalMembers' => $totalMembers,
                'totalGroupadmins' => $totalGroupadmins,
                'totalGroups' => $totalGroups,
                'collections' => $collections
            ];


            return view('admin.adminhome', $data);


    }

    public function terms()
    {
        return view('admin.terms_and_conditions');
    }

    public function profile()
    {
        $userInfo       = User::where('user.user_id', session('logged_session_data.user_id'))->first();

        return view('admin.user.user.profile', ['userInfo' => $userInfo]);
    }


    public function mail()
    {

        $user = array(
            'name' => "Learning Laravel",
        );

        Mail::send('emails.mailExample', $user, function ($message) {
            $message->to("kamrultouhidsak@gmail.com");
            $message->subject('E-Mail Example');
        });

        return "Your email has been sent successfully";
    }
}
