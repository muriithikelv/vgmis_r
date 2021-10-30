@extends('admin.master')
@section('content')
@section('title','Group Details ')
@include('admin.partials.lower_top_menu_bar')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
       <div class="row g-5 gx-xxl-8">
<!--begin::Col-->
                <div class="col-xxl-8">
                    <!--begin::Tables Widget 5-->
                    <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Latest Products</span>
                                <span class="text-muted mt-1 fw-bold fs-7">More than 400 new products</span>
                            </h3>
                            <div class="card-toolbar">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary {!! $state['details'] !!} fw-bolder px-4 me-1" data-bs-toggle="tab" href="#details">Group Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary {!! $state['members'] !!}  fw-bolder px-4 me-1" data-bs-toggle="tab" href="#members">Group Members</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary {!! $state['collections'] !!}  fw-bolder px-4" data-bs-toggle="tab" href="#collections">Member Record</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary {!! $state['editors'] !!} fw-bolder px-4" data-bs-toggle="tab" href="#editors">Group Admins</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary {!! $state['coordinators'] !!} fw-bolder px-4" data-bs-toggle="tab" href="#coordinators">County Coordinators</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <div class="tab-content">
                                <!--begin::Tap pane-->
                                <div class="tab-pane fade {!! $state['details'] !!}" id="details">
                                    <!--begin::Table container-->
                                    @include('admin.sacco.tabs.details')
                                    <!--end::Table-->
                                </div>
                                <!--end::Tap pane-->
                                <!--begin::Tap pane-->
                                <div class="tab-pane fade {!! $state['members'] !!}" id="members">
                                    @include('admin.sacco.tabs.members')
                                </div>
                                <!--end::Tap pane-->
                                <!--begin::Tap pane-->
                                <div class="tab-pane {!! $state['collections'] !!} fade" id="collections">
                                    @include('admin.sacco.tabs.collections')
                                </div>
                                <!--end::Tap pane-->
                                   <!--begin::Tap pane-->
                                   <div class="tab-pane {!! $state['editors'] !!} fade" id="editors">
                                    @include('admin.sacco.tabs.editors')
                                </div>
                                <!--end::Tap pane-->
                                   <!--begin::Tap pane-->
                                   <div class="tab-pane {!! $state['coordinators'] !!} fade" id="coordinators">
                                    @include('admin.sacco.tabs.county_coordinators')
                                </div>
                                <!--end::Tap pane-->
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Tables Widget 5-->
                </div>
<!--end::Col-->
        </div>
    </div>
</div>
@endsection