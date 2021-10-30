@extends('admin.master')
@section('content')
@section('title','Dashboard')
<style>
    .dash_image {

        width: 60px;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box analytics-info panel">
                <h3 class="box-title">Total Groups</h3>
                <ul class="list-inline two-part">
                    <li>
                        <img class="dash_image" src="{{ asset('admin_assets/img/employee.png') }}">
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-success"></i> <span
                            class="counter text-success">{{$totalGroups}}</span></li>
                </ul>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box analytics-info panel">
                <h3 class="box-title">Group Admins</h3>
                <ul class="list-inline two-part">
                    <li>
                        <img class="dash_image" src="{{ asset('admin_assets/img/department.png') }}">
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span
                            class="counter text-purple">{{$totalGroupadmins}}</span></li>
                </ul>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box analytics-info panel">
                <h3 class="box-title">Total Members</h3>
                <ul class="list-inline two-part">
                    <li>
                        <img class="dash_image" src="{{ asset('admin_assets/img/present.png') }}">
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-info"></i> <span
                            class="counter text-info">{{$totalMembers}}</span></li>
                </ul>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box analytics-info panel">
                <h3 class="box-title">Total Users </h3>
                <ul class="list-inline two-part">
                    <li>
                        <img class="dash_image" src="{{ asset('admin_assets/img/absent.png') }}">
                    </li>
                    <li class="text-right"><i class="ti-arrow-down text-danger"></i> <span
                            class="counter text-danger">{{$totalUsers}}</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="panel">
                <div class="panel-heading"> LATEST RECORDS </div>
                <div class="table-responsive">
                    <table class="table table-hover manage-u-table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>GROUP</th>
                                <th>FARMER</th>
                                <th>DATE</th>
                                <th>REASON</th>
                                <th>AMOUNT (KES)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($collections) > 0)
                            {{$collectionSl =null }}
                            @foreach($collections as $collection)
                            <tr>
                                <td class="text-center">{{ ++$collectionSl }}</td>
                                <td>
                                    {{ $collection->sacco->sacco_name }}
                                </td>
                                <td>
                                    {{$collection->user->first_name." ".$collection->user->last_name}}
                                </td>
                                <td>{{$collection->delivery_date}} </td>
                                <td>
                                    {{ $collection->delivery_time }}
                                </td>

                                <td>
                                    {{ $collection->quantity }}
                                </td>

                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="8">No data available </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection


@section('page_scripts')
<link href="{!! asset('admin_assets/plugins/bower_components/news-Ticker-Plugin/css/site.css') !!}" rel="stylesheet"
    type="text/css" />
<script
    src="{!! asset('admin_assets/plugins/bower_components/news-Ticker-Plugin/scripts/jquery.bootstrap.newsbox.min.js') !!}">
</script>

<script type="text/javascript">
    (function() {

            $(".demo1").bootstrapNews({
                newsPerPage: 2,
                autoplay: true,
                pauseOnHover:true,
                direction: 'up',
                newsTickerInterval: 4000,
                onToDo: function () {
                    //console.log(this);
                }
            });

        })();

        $(document).on('click', '.remarksForLeave', function () {

            var actionTo = "{{ URL::to('approveOrRejectLeaveApplication') }}";
            var leave_application_id = $(this).attr('data-leave_application_id');
            var status = $(this).attr('data-status');

            if(status == 2){
                var statusText = "Are you want to approve leave application?";
                var btnColor = "#2cabe3";
            }else{
                var statusText = "Are you want to reject leave application?";
                var btnColor = "red";
            }

            swal({
                    title: "",
                    text: statusText,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: btnColor,
                    confirmButtonText: "Yes",
                    closeOnConfirm: false
                },
                function (isConfirm) {
                    var token = '{{ csrf_token() }}';
                    if (isConfirm) {
                        $.ajax({
                            type: 'POST',
                            url:actionTo,
                            data: {leave_application_id:leave_application_id,status:status,_token:token},
                            success: function (data) {
                                if (data == 'approve') {
                                    swal({
                                            title: "Approved!",
                                            text: "Leave application approved.",
                                            type: "success"
                                        },
                                        function (isConfirm) {
                                            if (isConfirm) {
                                                $('.' + leave_application_id).fadeOut();
                                            }
                                        });

                                }else{
                                    swal({
                                            title: "Rejected!",
                                            text: "Leave application rejected.",
                                            type: "success"
                                        },
                                        function (isConfirm) {
                                            if (isConfirm) {
                                                $('.' + leave_application_id).fadeOut();
                                            }
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
@endsection