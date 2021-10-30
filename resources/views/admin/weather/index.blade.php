@extends('admin.master')
@section('content')
@section('title','Weather')
@include('admin.partials.lower_top_menu_bar')

<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
     <div id="kt_content_container" class="container">
        <!--begin::Row-->
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-9">

            <!--begin::Col-->
            <div class="col-md-4 mx-auto">
               {{--  <div class="row ">
                    <input type="search" id="address" class="form-control" placeholder="Where are we going?" />

                    <p>Selected: <strong id="address-value">none</strong></p>
                </div> --}}
                <!--begin::Card-->
                <div class="card card-flush h-md-100">

                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h1>{{$location}}</h1>
                            <h2>&nbsp; {{round($data['main']['temp'])}}&#176;C</h2>
                        </div>
                        <div class="fw-bolder text-gray-600 mb-5">
                            <h4>{{strtoupper(\Carbon\Carbon::createFromTimestamp($data['dt'])->format('l jS \\of F Y h:i:s A'))}}</h4>
                        </div>
                        <div class="card-title">
                            <h3> {{ucfirst($data['weather'][0]['description'])}}</h3>
                            <img src="http://openweathermap.org/img/wn/{{$data['weather'][0]['icon']}}@4x.png" alt="icon">
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-1">
                        <!--begin::Users-->
                        <div class="fw-bolder text-gray-600 mb-5">
                            </div>
                        <!--end::Users-->
                        <!--begin::Permissions-->
                        {{--  <div class="d-flex flex-column text-gray-600">
                            <div class="d-flex align-items-center py-2">
                            <span class="bullet bg-primary me-3"></span>All Admin Controls</div>
                            <div class="d-flex align-items-center py-2">
                            <span class="bullet bg-primary me-3"></span>View and Edit Financial Summaries</div>
                            <div class="d-flex align-items-center py-2">
                            <span class="bullet bg-primary me-3"></span>Enabled Bulk Reports</div>
                            <div class="d-flex align-items-center py-2">
                            <span class="bullet bg-primary me-3"></span>View and Edit Payouts</div>
                            <div class="d-flex align-items-center py-2">
                            <span class="bullet bg-primary me-3"></span>View and Edit Disputes</div>
                            <div class='d-flex align-items-center py-2'>
                                <span class='bullet bg-primary me-3'></span>
                                <em>and 7 more...</em>
                            </div>
                        </div> --}}
                        <!--end::Permissions-->
                    </div>
                    <!--end::Card body-->
                    <!--begin::Card footer-->
                   {{--  <div class="card-footer flex-wrap pt-0">
                        <a href="{{route('weather.show')}}" class="btn btn-light btn-active-primary my-1 me-2">View </a>
                        <a href="" data-token="" data-id="" type="button" class="delete btn btn-white btn-active-light-primary my-1">Delete Role</a>
                    </div> --}}
                    <!--end::Card footer-->
                </div>
                <!--end::Card-->

            </div>
        </div>

        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->


@endsection
