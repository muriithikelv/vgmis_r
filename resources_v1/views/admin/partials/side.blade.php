<?php
$sideMenu = showMenu();
$menuItem = '';
$moduleIdentifier = getMooduleIdentifier();

foreach ($sideMenu as $key => $value) {
    $menuItem .= '<li class="treeview waves-effect">
                        <a href="javascript:void(0)" class="module">
                            <i class="iconFontSize ' . $value['icon_class'] . ' hideMenu"></i> <span class="hide-menu hideMenu">&nbsp;' . $value['name'] . '<span class="fa arrow"></span></span>
                        </a>';

    if ($value['sub_menu']) {
        $menuItem .= '<ul class="treeview-menu nav nav-second-level">';

        foreach ($value['sub_menu'] as $menu) {

            if ($menu['menu_url'] != '' || $menu['sub_menu']) {
                $menuItem .= '<li>
                <a href="' . ($menu['menu_url'] ? route($menu['menu_url'], [ $moduleIdentifier => $menu['module_id']]) : 'javascript:void(0)') . '">
                <i data-icon="/" class="linea-icon linea-basic fa-fw"></i>
                <span class="hideMenu">' . $menu['name'] . '</span>'
                    . ($menu['sub_menu'] ? '<i class="fa arrow"></i>' : '') .
                    '</a>';
                if ($menu['sub_menu']) {

                    $menuItem .= '<ul class="treeview-menu nav nav-third-level">';

                    foreach ($menu['sub_menu'] as $subMenu) {
                        $menuItem .= '<li class="">
                        <a class="hideMenu" href="' . ($subMenu['menu_url'] ? route($subMenu['menu_url'], [ $moduleIdentifier => $menu['module_id']]) : 'javascript:void(0)') . '"> <i class="fa fa-circle-o"></i> &nbsp;' . $subMenu['name'] . '</a>

                    </li>';
                    }
                    $menuItem .= '</ul>';
                }
                $menuItem .= '</li>';
            }

        }

        $menuItem .= '</ul>';
    }

    $menuItem .= '</li>';
}
echo $menuItem;
?>