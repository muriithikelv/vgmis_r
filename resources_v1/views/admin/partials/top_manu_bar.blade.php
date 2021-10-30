<div class="row" style="background: #fff;margin:65px 2px 10px 2px">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 style="margin-top: 10px;margin-left: 10px">@yield('title')</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <div class="topnav" id="myTopnav">
            <?php
                $moduleIdentifier = getMooduleIdentifier();
                $module_id = Request::query($moduleIdentifier);
                $currentRouteName = Route::currentRouteName();
                $topMenu = showModuleMenu($module_id);
                $menuItem = ''; 
                foreach ($topMenu as $key => $value){
                    if ($value['sub_menu']) {
                        
                        foreach ($value['sub_menu'] as $menu) {
                            if ($menu['menu_url'] != '' || $menu['sub_menu']) {
                                
                                if ($menu['sub_menu']) {
                                    $menuItem .= '<div class="dropdown-custom">
                                                    <button class="dropbtn">'.$menu['name'].'
                                                        <i class="fa fa-caret-down"></i>
                                                    </button>
                                                    <div class="dropdown-custom-content">';
                                            foreach ($menu['sub_menu'] as $subMenu) {
                                                $class = $currentRouteName == $subMenu['menu_url'] ? "color: #41b3f9;": "color: #8d8d8d;";
                                                $menuItem .= '<a href="' . ($subMenu['menu_url'] ? route($subMenu['menu_url'], [ $moduleIdentifier => $menu['module_id']]) : 'javascript:void(0)') . '" style="'.$class.'">' . $subMenu['name'] .'</a>';
                                            }
                                            $menuItem .= '</div></div>';
                                }else{
                                    $class = $currentRouteName == $menu['menu_url'] ? "color: #41b3f9;": "color: #8d8d8d;";
                                    $menuItem .= '<a href="' . ($menu['menu_url'] ? route($menu['menu_url'], [ $moduleIdentifier => $menu['module_id']]) : 'javascript:void(0)') . '" style="'.$class.'">' . $menu['name'] .'</a>';
                                }
                            }
                        }
                    }
                }
                echo $menuItem;
            ?>
        </div>
    </div>
</div>