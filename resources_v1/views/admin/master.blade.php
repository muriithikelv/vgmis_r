<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{!! asset('admin_assets/img/logo.png') !!}" type="image/x-icon" />
    <title>@yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> -->
    <!-- Menu CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="{!! asset('admin_assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') !!}"
        rel="stylesheet">
    <!-- toast CSS -->
    <link href="{!! asset('admin_assets/plugins/bower_components/toast-master/css/jquery.toast.css') !!}"
        rel="stylesheet">
    <!-- morris CSS -->
    <link href="{!! asset('admin_assets/plugins/bower_components/morrisjs/morris.css') !!}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{!! asset('admin_assets/css/animate.css') !!}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{!! asset('admin_assets/css/style.css') !!}" rel="stylesheet">

    <!-- color CSS -->

    <!-- data table CSS -->
    <link href="{!! asset('admin_assets/plugins/bower_components/datatables/jquery.dataTables.min.css') !!}"
        rel="stylesheet" type="text/css" />

    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Date Picker -->
    <link rel="stylesheet" href="{!! asset('admin_assets/plugins/bower_components/datepicker/datepicker3.css') !!}">
    <!-- Daterange picker -->
    <link rel="stylesheet"
        href="{!! asset('admin_assets/plugins/bower_components/daterangepicker/daterangepicker-bs3.css') !!}">
    <!-- time picker-->
    <link rel="stylesheet"
        href="{!! asset('admin_assets/plugins/bower_components/timepicker/bootstrap-timepicker.min.css') !!}">
    <!-- sweetalert-->
    <link rel="stylesheet" href="{!! asset('admin_assets/plugins/bower_components/sweetalert/sweetalert.css') !!}">
    <!-- select 2 -->
    <link rel="stylesheet" href="{!! asset('admin_assets/plugins/bower_components/select2/select2.min.css') !!}">
    <!-- toast CSS -->
    <link href="{!! asset('admin_assets/plugins/bower_components/toast-master/css/jquery.toast.css') !!}"
        rel="stylesheet">
    <!-- Star Ratings -->
    <link href="{!! asset('admin_assets/plugins/bower_components/rateyo/jquery.rateyo.min.css') !!}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Custom CSS -->
    <link href="{!! asset('admin_assets/css/custom.css') !!}" rel="stylesheet">
    <link href="{!! asset('admin_assets/css/colors/purple-dark.css') !!}" id="theme" rel="stylesheet">
    <script src="{!! asset('admin_assets/plugins/bower_components/jquery/dist/jquery.min.js')!!}"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script type="text/javascript">
        var base_url = "{{ url('/').'/' }}";
    </script>
    <style>
        /*for yellow bg*/

        .navbar-header {
            background: #222a48;
        }

        #side-menu li a {
            color: #fff;
            border-left: 0px solid #2f323e;
        }

        .top-left-part .dark-logo {
            display: block;

        }

        .tiMenu {
            color: #fff;
        }

        .sidebar {
            background: #27333e;
            ;
            box-shadow: 1px 0px 20px rgba(0, 0, 0, 0.08);
        }

        .hideMenu {
            color: #fff;
        }

        #side-menu ul>li>a.active {
            color: #EDDF10;
            font-weight: 400;
        }

        #side-menu ul>li>a:hover {
            color: #fff;
        }

        /*for yellow bg*/

        .bg-title .breadcrumb {
            background: 0 0;
            margin-bottom: 0;
            float: none;
            padding: 0;
            margin-bottom: 9px;
            font-weight: 700;
            color: #777;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            height: auto;
            margin-top: -6px;
            padding-left: 0;
            padding-right: 0;
        }

        .select2-container .select2-selection--single {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            height: 35px;
        }

        .select2-container--default .select2-selection--single,
        .select2-selection .select2-selection--single {
            border: 1px solid #d2d6de;
            border-radius: 0;
            padding: 8px 11px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 26px;
            position: absolute;
            top: 4px;
            right: 1px;
            width: 20px;
        }

        .breadcrumbColor a {
            color: #41b3f9 !important;
        }

        th {
            font-weight: 400;
        }

        tr td {
            color: black !important;
        }

        .tr_header {
            background-color: #EDF1F5;
        }

        table.dataTable thead th,
        table.dataTable thead td {
            padding: 10px 18px;
            border-bottom: 1px solid #e4e7ea;
        }

        .btnColor {
            color: #fff !important;
        }

        .validateRq {
            color: red;
        }

        .panel .panel-heading {
            border-radius: 0;
            font-weight: 400;
            font-size: 16px;
            padding: 10px 25px;
        }

        .btn_style {
            width: 106px;
        }

        .error {
            color: red;
        }

        .white-box .box-title {
            font-weight: 400;
        }

        .font-medium {
            font-weight: 400;
        }

        .panel .panel-body:first-child h3 {
            font-weight: 400;
        }

        table.dataTable thead th,
        table.dataTable tfoot th {
            font-weight: 400;
        }

        .tabs-style-iconbox nav ul li.tab-current a {
            background-color: #bcbdbd;
        }

        .nav-tabs {
            border-bottom: 2px solid #DDD;
        }

        .nav-tabs>li.active>a,
        .nav-tabs>li.active>a:focus,
        .nav-tabs>li.active>a:hover {
            border-width: 0;
        }

        .nav-tabs>li>a {
            border: none;
            color: #ffffff;
            background: #5a4080;
        }

        .nav-tabs>li.active>a,
        .nav-tabs>li>a:hover {
            border: none;
            color: #5a4080 !important;
            background: #fff;
        }

        .nav-tabs>li>a::after {
            content: "";
            background: #5a4080;
            height: 2px;
            position: absolute;
            width: 100%;
            left: 0px;
            bottom: -1px;
            transition: all 250ms ease 0s;
            transform: scale(0);
        }

        .nav-tabs>li.active>a::after,
        .nav-tabs>li:hover>a::after {
            transform: scale(1);
        }

        .tab-nav>li>a::after {
            background: ##5a4080 none repeat scroll 0% 0%;
            color: #fff;
        }

        .tab-pane {
            padding: 15px 0;
        }

        .tab-content {
            padding: 20px
        }

        .nav-tabs>li {
            width: 20%;
            text-align: center;
        }

        @media all and (max-width:724px) {
            .nav-tabs>li>a>span {
                display: none;
            }

            .nav-tabs>li>a {
                padding: 5px 5px;
            }
        }
    </style>
</head>

<body class="fix-header" onload="addMenuClass()">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    {{--     <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div> --}}
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <h2 style="color: #fff; margin-left: 10px">VFGM System</h2>
                    <!-- Logo -->
                    {{-- <a class="logo" href="{{url('dashboard')}}">
                    <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img style="width: 90px;"
                            src="{!! asset('admin_assets/img/logo.png') !!}" alt="home"
                            class="dark-logo img-fluid img-responsive" />
                    </b>
                    <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text-->
                    </span> </a> --}}
                </div>
                <!-- /Logo -->
                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i
                                class="ti-menu tiMenu"></i></a>
                    </li>
                    {{--<li class="dropdown">
                    <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> <i class="mdi mdi-gmail"></i>
                        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </a>
                    <ul class="dropdown-menu mailbox animated bounceInDown">
                        <li>
                            <div class="drop-title">You have 4 new messages</div>
                        </li>
                        <li>
                            <div class="message-center">
                                <a href="#">
                                    <div class="user-img"> <img src="{!! asset('admin_assets/img/users/arijit') !!}" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                </a>
                                <a href="#">
                                    <div class="user-img"> <img src="{!! asset('admin_assets/img/users/arijit.jpg') !!}" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                </a>
                                <a href="#">
                                    <div class="user-img"> <img src="{!! asset('admin_assets/img/users/arijit.jpg') !!}" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                </a>
                                <a href="#">
                                    <div class="user-img"> <img src="{!! asset('admin_assets/img/users/arijit.jpg') !!}" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>--}}
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    {{--<li>
                    <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                        <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                </li>--}}
                    <li class="dropdown">
                        <?php
                    $employeeInfo = employeeInfo();
                    if($employeeInfo->photo != ''){
                    ?>
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img
                                src="{!! asset('uploads/employeePhoto/'.$employeeInfo[0]->photo) !!}" alt="user-img"
                                width="36" class="img-circle"><b class="hidden-xs " style="color: #fff !important;">{!!
                                $employeeInfo[0]->user_name !!}</b><span class="caret"></span>
                        </a>
                        <?php  }else{ ?>
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img
                                src="{!! asset('admin_assets/img/default.png') !!}" alt="user-img" width="36"
                                class="img-circle"><b class="hidden-xs" style="color: #fff !important; "><span
                                    class="hideMenu" style="color: #fff !important;">{!! $employeeInfo->first_name
                                    !!}</span></b><span class="caret hideMenu"></span> </a>
                        <?php } ?>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            {{-- <li><a href="{{url('profile')}}"><i class="ti-user"></i> My Profile</a></li> --}}
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('changePassword')}}"><i class="ti-settings"></i> Change Password</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{URL::to('/logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span
                            class="hide-menu">Navigation</span>
                    </h3>
                </div>
                <div class="user-profile">
                    <div class="dropdown user-pro-body">
                        <?php  if($employeeInfo->photo != ''){  ?>
                        <div><img src="{!! asset('uploads/employeePhoto/'.$employeeInfo->photo) !!}" alt="user-img"
                                class="img-circle"></div>
                        <?php  }else{ ?>
                        <div><img src="{!! asset('admin_assets/img/default.png') !!}" alt="user-img" class="img-circle">
                        </div>
                        <?php } ?>
                        <a href="#" class="dropdown-toggle u-dropdown " data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false"><span class="hideMenu">{!!
                                $employeeInfo->first_name !!}</span> </a>

                    </div>
                </div>
                <ul class="nav" id="side-menu">
                    <li><a href="{{ url('dashboard') }}" class="waves-effect"><i class="mdi mdi-home hideMenu"
                                data-icon="v"></i> <span class="hide-menu hideMenu"> Dashboard </span></a>
                    </li>
                    <?php
                $sideMenu = mainSideMenu();

                $menuItem = '';
                $moduleIdentifier = getMooduleIdentifier();

                if($sideMenu){
                    foreach($sideMenu as $key => $value){
                    $menuItem .= '<li class="treeview waves-effect">
                                        <a href="' . ($value['menu_url'] ? route($value['menu_url'], [ $moduleIdentifier => $value['module_id']]) : 'javascript:void(0)') . '" class="module">
                                            <i class="iconFontSize ' . $value['icon_class'] . ' hideMenu"></i> <span class="hide-menu hideMenu">&nbsp;' . $value['name'] . '</span>
                                        </a>';
                }
                }

                echo $menuItem;
                ?>

                </ul>
            </div>
        </div>

        <div id="page-wrapper">
            @include('admin.partials.top_manu_bar')
            <div style="height: 20px"></div>
            @yield('content')
        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center">
            {{date('Y')}} &copy; <strong><a href="https://finseed.co.ke" target="_blank">VFGM System</a>
            </strong> All rights reserved.
        </footer>
    </div>
    </div>
    <!-- Bootstrap Core JavaScript -->

    <script src="{!! asset('admin_assets/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{!! asset('admin_assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') !!}"></script>
    <!--slimscroll JavaScript -->
    <script src="{!! asset('admin_assets/js/jquery.slimscroll.js') !!}"></script>
    <!--Wave Effects -->
    <script src="{!! asset('admin_assets/js/waves.js') !!}"></script>
    <!--Counter js -->
    <script src="{!! asset('admin_assets/plugins/bower_components/waypoints/lib/jquery.waypoints.js') !!}"></script>
    <script src="{!! asset('admin_assets/plugins/bower_components/counterup/jquery.counterup.min.js') !!}"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="{!! asset('admin_assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') !!}">
    </script>
    <!-- Custom Theme JavaScript -->
    <script src="{!! asset('admin_assets/js/custom.min.js') !!}"></script>
    <script src="{!! asset('admin_assets/js/dashboard1.js') !!}"></script>
    <script src="{!! asset('admin_assets/plugins/bower_components/toast-master/js/jquery.toast.js') !!}"></script>
    <script src="{!! asset('admin_assets/plugins/bower_components/datatables/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('admin_assets/plugins/bower_components/sweetalert/sweetalert-dev.js') !!}"></script>
    <!-- bootstrap-datepicker -->
    <script src="{!! asset('admin_assets/plugins/bower_components/datepicker/bootstrap-datepicker.js')!!}"></script>
    <!--TIme picker js-->
    <script src="{!! asset('admin_assets/plugins/bower_components/timepicker/bootstrap-timepicker.min.js')!!}"></script>
    <!-- select2 -->
    <script src="{!! asset('admin_assets/plugins/bower_components/select2/select2.full.min.js')!!}"></script>

    <script src="{!! asset('admin_assets/plugins/bower_components/toast-master/js/jquery.toast.js')!!}"></script>
    <script src="{!! asset('admin_assets/js/toastr.js')!!}"></script>

    <!-- jquery-validator -->
    <script type="text/javascript"
        src="{!! asset('admin_assets/plugins/bower_components/jquery-validator/jquery-validator.1.15.0.js')!!}">
    </script>
    <script type="text/javascript"
        src="{!! asset('admin_assets/plugins/bower_components/jquery-validator/jquery-additional-method.1.15.0.min.js')!!}">
    </script>
    <!-- Star Ratings -->
    <script src="{!! asset('admin_assets/plugins/bower_components/rateyo/jquery.rateyo.js')!!}"></script>



    <script>
        $(function () {
        $(".select2").select2();
        $('#myTable').DataTable({
            "ordering": false,
        });

    });

    function addMenuClass() {
        var segment3 = '{{ Request::segment(1) }}';
        var url = base_url + segment3;
        // var navItem = $(this).find("[href='" + url + "']");

        $('a[href="' + url + '"]').parents('.treeview-menu').addClass('collapse in');
        $('a[href="' + url + '"]').parents('.treeview-menu').parent().children('.module').addClass('active');
    }

    $(".alert-success").delay(2000).fadeOut("slow");
    //   $(".alert-danger").delay(2000).fadeOut("slow");
    $(document).on("focus", ".yearPicker", function () {
        $(this).datepicker({
            format: 'yyyy',
            minViewMode: 2
        }).on('changeDate', function (e) {
            $(this).datepicker('hide');
        });
    });
    $(document).on("focus", ".dateField", function () {
        $(this).datepicker({
            format: 'dd/mm/yyyy',
            todayHighlight: true,
            clearBtn: true
        }).on('changeDate', function (e) {
            $(this).datepicker('hide');
        });
    });
    $(document).on("focus", ".timePicker", function () {
        $(this).timepicker({
            showInputs: false,
            minuteStep: 1
        });
    });
    $(".monthField").datepicker({
        format: "yyyy-mm",
        viewMode: "months",
        minViewMode: "months"
    }).on('changeDate', function (e) {
        $(this).datepicker('hide');
    });

    $(document).on('click', '.delete', function () {
        var actionTo = $(this).attr('href');
        var token = $(this).attr('data-token');
        var id = $(this).attr('data-id');
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: actionTo,
                        type: 'post',
                        data: {_method: 'delete', _token: token},
                        success: function (data) {
                            console.log(data)
                            if (data == 'hasForeignKey') {
                                swal({
                                    title: "Oops!",
                                    text: "This data is used anywhere",
                                    type: "error"
                                });
                            } else if (data == 'success') {
                                swal({
                                        title: "Deleted!",
                                        text: "Your information delete successfully.",
                                        type: "success"
                                    },
                                    function (isConfirm) {
                                        if (isConfirm) {
                                            $('.' + id).fadeOut();
                                            location.reload();
                                        }
                                    });
                            } else {
                                swal({
                                    title: "Error!",
                                    text: "Something Error Found !, Please try again.",
                                    type: "error"
                                });
                            }
                        }

                    });
                } else {
                    swal("Cancelled", "Your data is safe .", "error");
                }
            });
        return false;
    });

    </script>
    @yield('page_scripts')

</body>

</html>