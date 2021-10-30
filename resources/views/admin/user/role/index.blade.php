@extends('admin.master')
@section('content')
@section('title','Role List')
@include('admin.partials.lower_top_menu_bar')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
     <div id="kt_content_container" class="container">
        <!--begin::Row-->
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-9">
            <!--begin::Alert-->

										@if($errors->any())
										<div class="alert alert-dismissible bg-danger d-flex flex-column flex-sm-row w-100 p-5 mb-10">
											<!--begin::Content-->
											@foreach($errors->all() as $error)
											<div class="d-flex flex-column text-light pe-0 pe-sm-10">
												<span>{!! $error !!}</span>
											</div>
											@endforeach
											<!--end::Content-->
											<!--begin::Close-->
											<button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
												<!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
												<span class="svg-icon svg-icon-2x svg-icon-light">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
															<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
															<rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</button>
											<!--end::Close-->
										</div>
										@endif
										@if(session()->has('success'))
										<div class="alert alert-dismissible bg-light-info d-flex flex-column flex-sm-row w-100 p-5 mb-10">
											<!--begin::Icon-->
											<!--begin::Svg Icon | path: icons/duotone/General/Notification2.svg-->
											<span class="svg-icon svg-icon-2hx svg-icon-success me-4">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />
														<path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000" />
													</g>
												</svg>
											</span>
											<!--end::Svg Icon-->
											<!--end::Icon-->
											<!--begin::Content-->
											<div class="d-flex flex-column pe-0 pe-sm-10">
												{{-- <span class="fw-bolder">This is an alert</span> --}}
												<span class="fw-bolder">{{ session()->get('success') }}</span>
											</div>
											<!--end::Content-->
											<!--begin::Close-->
											<button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
												<!--begin::Svg Icon | path: icons/duotone/Interface/Close-Square.svg-->
												<span class="svg-icon svg-icon-1 svg-icon-info">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M2.36899 6.54184C2.65912 4.34504 4.34504 2.65912 6.54184 2.36899C8.05208 2.16953 9.94127 2 12 2C14.0587 2 15.9479 2.16953 17.4582 2.36899C19.655 2.65912 21.3409 4.34504 21.631 6.54184C21.8305 8.05208 22 9.94127 22 12C22 14.0587 21.8305 15.9479 21.631 17.4582C21.3409 19.655 19.655 21.3409 17.4582 21.631C15.9479 21.8305 14.0587 22 12 22C9.94127 22 8.05208 21.8305 6.54184 21.631C4.34504 21.3409 2.65912 19.655 2.36899 17.4582C2.16953 15.9479 2 14.0587 2 12C2 9.94127 2.16953 8.05208 2.36899 6.54184Z" fill="#12131A" />
														<path fill-rule="evenodd" clip-rule="evenodd" d="M8.29289 8.29289C8.68342 7.90237 9.31658 7.90237 9.70711 8.29289L12 10.5858L14.2929 8.29289C14.6834 7.90237 15.3166 7.90237 15.7071 8.29289C16.0976 8.68342 16.0976 9.31658 15.7071 9.70711L13.4142 12L15.7071 14.2929C16.0976 14.6834 16.0976 15.3166 15.7071 15.7071C15.3166 16.0976 14.6834 16.0976 14.2929 15.7071L12 13.4142L9.70711 15.7071C9.31658 16.0976 8.68342 16.0976 8.29289 15.7071C7.90237 15.3166 7.90237 14.6834 8.29289 14.2929L10.5858 12L8.29289 9.70711C7.90237 9.31658 7.90237 8.68342 8.29289 8.29289Z" fill="#12131A" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</button>
											<!--end::Close-->
										</div>
										@endif
										 <!--end::Alert-->
            <!--begin::Col-->
            @foreach ($data as $value)
            <div class="col-md-4">
                <!--begin::Card-->
                <div class="card card-flush h-md-100">

                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>{{$value->role_name}}</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-1">
                        <!--begin::Users-->
                        <div class="fw-bolder text-gray-600 mb-5">Total users with this role:
                            {{-- @if($value->role_name == $totalassigned)
                             {{$totalassigned }}
                            @endif --}}
                            </div>
                        <!--end::Users-->
                        <!--begin::Permissions-->
                        {{-- <div class="d-flex flex-column text-gray-600">
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
                    <div class="card-footer flex-wrap pt-0">
                        <a href="{!! route('userRole.edit',$value->role_id) !!}" class="btn btn-light btn-active-primary my-1 me-2">View Role</a>
                        <a href="{!!route('userRole.destroy',$value->role_id )!!}" data-token="{!! csrf_token() !!}" data-id="{!! $value->role_id!!}" type="button" class="delete btn btn-white btn-active-light-primary my-1">Delete Role</a>
                    </div>
                    <!--end::Card footer-->
                </div>
                <!--end::Card-->

            </div>
             @endforeach
            <!--begin::Add new card-->
            <div class="ol-md-4">
                <!--begin::Card-->
                <div class="card h-md-100">
                    <!--begin::Card body-->
                    <div class="card-body d-flex flex-center">
                        <!--begin::Button-->
                        <button type="button" class="btn btn-clear d-flex flex-column flex-center" data-bs-toggle="modal" data-bs-target="#kt_modal_add_roles">
                            <!--begin::Illustration-->
                            <img src="assets/media/illustrations/user-role.png" alt="" class="mw-100 mh-150px mb-7" />
                            <!--end::Illustration-->
                            <!--begin::Label-->
                            <div class="fw-bolder fs-3 text-gray-600 text-hover-primary">Add New Role</div>
                            <!--end::Label-->
                        </button>
                        <!--begin::Button-->
                    </div>
                    <!--begin::Card body-->
                </div>
                <!--begin::Card-->
            </div>
            <!--begin::Add new card-->
        </div>

        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->

<!--begin::Modal - Add role-->
<div class="modal fade" id="kt_modal_add_roles" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Add a Role</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-lg-5 my-7">
                <!--begin::Form-->
                    @if(isset($editModeData))
						{{ Form::model($editModeData, array('route' => array('userRole.update', $editModeData->role_id), 'method' => 'PUT','files' => 'true','class' => 'form', 'id' =>'kt_modal_add_role_form')) }}
						@else
						{{ Form::open(array('route' => 'userRole.store','enctype'=>'multipart/form-data','class' => 'form', 'id' =>'kt_modal_add_role_form')) }}
						@endif
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_role_header" data-kt-scroll-wrappers="#kt_modal_add_role_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bolder form-label mb-2">
                                <span class="required">Role name</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            {!! Form::text('role_name',Input::old('role_name'), $attributes =
											array('class'=>'form-control form-control-solid required
											role_name','id'=>'role_name','placeholder'=>'Enter Role name')) !!}
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>

                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-white me-3" data-kt-roles-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                    {{ Form::close()}}
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add role-->

@endsection
