<?php

use App\User;
use App\Model\Audit\Audit;
use App\Model\Market\Product;
use App\Model\Sales\Sales;
use Illuminate\Support\Facades\DB;
use App\Model\Subscription\Subscription;

function dateConvertFormtoDB($date)
{
    if (!empty($date)) {
        return date("Y-m-d", strtotime(str_replace('/', '-', $date)));
    }
}

function dateConvertDBtoForm($date)
{
    if (!empty($date)) {
        $date = strtotime($date);
        return date('d/m/Y', $date);
    }
}

function employeeInfo()
{
    return  User::where('user_id', session('logged_session_data.user_id'))->first();
}

function insertAudit($user_id, $user_name, $action)
{
    Audit::create([
        'user_id' => $user_id,
        'user_name' => $user_name,
        'action' => $action
    ]);
}


function permissionCheck()
{

    $role_id = session('logged_session_data.role_id');
    return $result =  json_decode(DB::table('menus')->select('menu_url')
        ->join('menu_permission', 'menu_permission.menu_id', '=', 'menus.id')
        ->where('menu_permission.role_id', '=', $role_id)
        ->whereNotNull('action')->get()->toJson(), true);
}

function showMenu()
{
    $role_id = session('logged_session_data.role_id');
    $modules = json_decode(DB::table('modules')->get()->toJson(), true);
    $menus =  json_decode(DB::table('menus')
        ->select(DB::raw('menus.id, menus.name, menus.menu_url, menus.parent_id, menus.module_id'))
        ->join('menu_permission', 'menu_permission.menu_id', '=', 'menus.id')
        ->where('menu_permission.role_id', $role_id)
        ->where('menus.status', 1)
        ->whereNull('action')
        ->orderBy('menus.id', 'ASC')
        ->get()->toJson(), true);

    $sideMenu = [];
    if ($menus) {
        foreach ($menus as $menu) {
            if (!isset($sideMenu[$menu['module_id']])) {
                $moduleId = array_search($menu['module_id'], array_column($modules, 'id'));

                $sideMenu[$menu['module_id']] = [];
                $sideMenu[$menu['module_id']]['id'] = $modules[$moduleId]['id'];
                $sideMenu[$menu['module_id']]['name'] = $modules[$moduleId]['name'];
                $sideMenu[$menu['module_id']]['icon_class'] = $modules[$moduleId]['icon_class'];
                $sideMenu[$menu['module_id']]['menu_url'] = '#';
                $sideMenu[$menu['module_id']]['parent_id'] = '';
                $sideMenu[$menu['module_id']]['module_id'] = $modules[$moduleId]['id'];
                $sideMenu[$menu['module_id']]['sub_menu'] = [];
            }

            if ($menu['parent_id'] == 0) {
                $sideMenu[$menu['module_id']]['sub_menu'][$menu['id']] = $menu;
                $sideMenu[$menu['module_id']]['sub_menu'][$menu['id']]['sub_menu'] = [];
            } else {
                array_push($sideMenu[$menu['module_id']]['sub_menu'][$menu['parent_id']]['sub_menu'], $menu);
            }
        }
    }

    return $sideMenu;
}

function mainSideMenu()
{
    $role_id = session('logged_session_data.role_id');
    $modules = json_decode(DB::table('modules')->get()->toJson(), true);
    $menus =  json_decode(DB::table('menus')
        ->select(DB::raw('menus.id, menus.position, menus.name, menus.menu_url, menus.parent_id, menus.module_id'))
        ->join('menu_permission', 'menu_permission.menu_id', '=', 'menus.id')
        ->where('menu_permission.role_id', $role_id)
        ->where('menus.status', 1)
        //->where('menus.parent_id', 0)
        ->whereNotIn('menus.module_id', [0])
        ->whereNull('action')
        ->orderBy('menus.position', 'ASC')
        ->get()->toJson(), true);
    $sideMenu = [];
    //dd($menus);

    if ($menus) {
        foreach ($menus as $menu) {
            if (!isset($sideMenu[$menu['module_id']])) {
                $moduleId = array_search($menu['module_id'], array_column($modules, 'id'));
                $sideMenu[$menu['module_id']] = [];
                $sideMenu[$menu['module_id']]['id'] = $modules[$moduleId]['id'];
                $sideMenu[$menu['module_id']]['name'] = $modules[$moduleId]['name'];
                $sideMenu[$menu['module_id']]['icon_class'] = $modules[$moduleId]['icon_class'];
                $sideMenu[$menu['module_id']]['parent_id'] = '';
                $sideMenu[$menu['module_id']]['module_id'] = $modules[$moduleId]['id'];
                $sideMenu[$menu['module_id']]['sub_menu'] = [];

                $menus_subs =  json_decode(DB::table('menus')
                    ->select(DB::raw('menus.id, menus.position, menus.name, menus.menu_url, menus.parent_id, menus.module_id'))
                    ->join('menu_permission', 'menu_permission.menu_id', '=', 'menus.id')
                    ->where('menu_permission.role_id', $role_id)
                    ->where('menus.status', 1)
                    ->where('menus.module_id', $menu['module_id'])
                    ->whereNull('action')
                    ->whereNotNull('menu_url')
                    ->orderBy('menus.position', 'ASC')
                    ->limit(1)
                    ->get()->toJson(), true);

                $sideMenu[$menu['module_id']]['menu_url'] = $menus_subs[0]['menu_url'];
            }
        }
    }


    return $sideMenu;
}

function getMooduleIdentifier()
{
    return 'TpGcodQmw24x4GHRE8g-WQhCYpzRwzhjB3ZiRWNVdw';
}

function updateActiveModule($module_id)
{
    $is_updated = DB::table('active_module_tracker')
        ->where('status', 1)
        ->update(['module_id' => $module_id]);
    return $is_updated;
}

function getActiveModule()
{
    $active_module = DB::table('active_module_tracker')->where('status', 1)->first();
    return $active_module->module_id;
}

function showModuleMenu($module_id)
{
    $module_id = empty($module_id) ? getActiveModule() : $module_id;

    if ($module_id) {
        updateActiveModule($module_id);
    }

    $role_id = session('logged_session_data.role_id');
    $modules = json_decode(DB::table('modules')->get()->toJson(), true);
    $menus =  json_decode(DB::table('menus')
        ->select(DB::raw('menus.id, menus.sub_position, menus.name, menus.menu_url, menus.parent_id, menus.module_id'))
        ->join('menu_permission', 'menu_permission.menu_id', '=', 'menus.id')
        ->where('menu_permission.role_id', $role_id)
        ->where('menus.status', 1)
        ->where('menus.module_id', $module_id)
        ->where('menus.parent_id', 0)
        ->whereNull('action')
        ->orderBy('menus.sub_position', 'ASC')
        ->get()->toJson(), true);

    $menus_subs =  json_decode(DB::table('menus')
        ->select(DB::raw('menus.id, menus.sub_position, menus.name, menus.menu_url, menus.parent_id, menus.module_id'))
        ->join('menu_permission', 'menu_permission.menu_id', '=', 'menus.id')
        ->where('menu_permission.role_id', $role_id)
        ->where('menus.status', 1)
        ->where('menus.module_id', $module_id)
        ->whereNotIn('menus.parent_id', [0])
        ->whereNull('action')
        ->orderBy('menus.sub_position', 'ASC')
        ->get()->toJson(), true);

    $sideMenu = [];
    if ($menus) {
        foreach ($menus as $menu) {
            if (!isset($sideMenu[$menu['module_id']])) {
                $moduleId = array_search($module_id, array_column($modules, 'id'));
                $sideMenu[$menu['module_id']] = [];
                $sideMenu[$menu['module_id']]['id'] = $modules[$moduleId]['id'];
                $sideMenu[$menu['module_id']]['name'] = $modules[$moduleId]['name'];
                $sideMenu[$menu['module_id']]['icon_class'] = $modules[$moduleId]['icon_class'];
                $sideMenu[$menu['module_id']]['menu_url'] = '#';
                $sideMenu[$menu['module_id']]['parent_id'] = '';
                $sideMenu[$menu['module_id']]['module_id'] = $modules[$moduleId]['id'];
                $sideMenu[$menu['module_id']]['sub_menu'] = [];
            }

            if ($menu['parent_id'] == 0) {
                $sideMenu[$menu['module_id']]['sub_menu'][$menu['id']] = $menu;
                $sideMenu[$menu['module_id']]['sub_menu'][$menu['id']]['sub_menu'] = [];
            }
        }

        if ($menus_subs) {
            foreach ($menus_subs as $sub) {
                array_push($sideMenu[$menu['module_id']]['sub_menu'][$sub['parent_id']]['sub_menu'], $sub);
            }
        }
    }
    return $sideMenu;
}

function convartMonthAndYearToWord($data)
{
    $monthAndYear    = explode('-', $data);

    $month          = $monthAndYear[1];
    $dateObj        = DateTime::createFromFormat('!m', $month);
    $monthName      = $dateObj->format('F');
    $year           = $monthAndYear[0];

    return $monthAndYearName = $monthName . " " . $year;
}


function employeeAward()
{
    return ['Employee of the Month' => 'Employee of the Month', 'Employee of the Year' => 'Employee of the Year', 'Best Employee' => 'Best Employee'];
}


function findMonthToAllDate($month)
{
    $start_date = $month . '-01';
    $end_date   = date("Y-m-t", strtotime($start_date));

    $target      = strtotime($start_date);
    $workingDate = [];
    while ($target <= strtotime(date("Y-m-d", strtotime($end_date)))) {
        $temp = [];
        $temp['date'] = date('Y-m-d', $target);
        $temp['day']  = date('d', $target);
        $temp['day_name']  = date('D', $target);
        $workingDate[] = $temp;
        $target += (60 * 60 * 24);
    }
    return $workingDate;
}


function findMonthToStartDateAndEndDate($month)
{
    $start_date = $month . '-01';
    $end_date   = date("Y-m-t", strtotime($start_date));
    $data = [
        'start_date' => $start_date,
        'end_date'   => $end_date,
    ];
    return $data;
}


function getAuthUser($request)
{
    $token = $request->header('Authorization');
    $token = explode(" ", $token);
    $token = isset($token) ? $token[1] : null;
    return User::where('user_id', $token)->first();
}


function executeRestrictedAccess($auth_func, $failed_func, $params, $should_check_subscription = true)
{
    $user = getAuthUser($params['request']);
    $params['user'] = $user;
    $data = [];
    $should_execute_logic = true;
    if ($should_check_subscription) {
        $should_execute_logic = hasActiveSubscription($params['request']);
    }

    if (isset($user)) {
        $data = $should_execute_logic ? $auth_func($params) : ['success' => false, 'data' => $data, 'message' => 'You don\'t an active subscription!'];
    } else {
        if ($failed_func == "auth") {
            $data = function () {
                return ['success' => false, 'data' => [], 'message' => 'Invalid user!'];
            };
        } else {
            $data =  $failed_func;
        }
    }

    return $data;
}


function hasActiveSubscription($request)
{
    $token = getAuthUser($request);
    $subscription = Subscription::where('user_id', $token->user_id)->where('status', 1)->orderBy('end_date', 'desc')->first();
    $isValidSubscription = false;
    if (isset($subscription)) {
        $today = date("Y-m-d");
        $isValidSubscription = isSubscriptionValid($today, $subscription->end_date);
    }
    return isset($subscription) && $isValidSubscription;
}

function isSubscriptionValid($date_1, $date_2)
{

    $date_1 = strtotime($date_1);
    $date_2 = strtotime($date_2);

    return $date_1 <= $date_2;
}

function isValidOtp($created_date)
{
    $created_date = date_create($created_date);

    $today = date("Y-m-d");
    $today = date_create($today);
    $diff = date_diff($today, $created_date);
    return $diff->format("%a") < 2;
}
