@extends('admin.master')
@section('content')
@section('title','Add Role Permission')
@include('admin.partials.lower_top_menu_bar')

<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Row-->
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-9">
 <!--begin::Add new card-->
 <div class="ol-md-4">
    <!--begin::Card-->
    <div class="card h-md-100">
        <!--begin::Card body-->
        <div class="card-body d-flex flex-center">
            <!--begin::Button-->
            <button type="button" class="btn btn-clear d-flex flex-column flex-center" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
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

        <!--begin::Modals-->
        <!--begin::Modal - Add role-->
        <div class="modal fade" id="kt_modal_add_role" tabindex="-1" aria-hidden="true">
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
                        <form id="kt_modal_add_role_form" class="form" action="#">
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
                                    <input class="form-control form-control-solid" placeholder="Enter a role name" name="role_name" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Permissions-->
                                <div class="fv-row">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bolder form-label mb-2">Role Permissions</label>
                                    <!--end::Label-->
                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                                            <!--begin::Table body-->
                                            <tbody class="text-gray-600 fw-bold">
                                                <!--begin::Table row-->
                                                <tr>
                                                    <td class="text-gray-800">Administrator Access
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allows a full access to the system"></i></td>
                                                    <td>
                                                        <!--begin::Checkbox-->
                                                        <label class="form-check form-check-custom form-check-solid me-9">
                                                            <input class="form-check-input" type="checkbox" value="" id="kt_roles_select_all" />
                                                            <span class="form-check-label" for="kt_roles_select_all">Select all</span>
                                                        </label>
                                                        <!--end::Checkbox-->
                                                    </td>
                                                </tr>
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Label-->
                                                    <td class="text-gray-800">User Management</td>
                                                    <!--end::Label-->
                                                    <!--begin::Options-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="user_management_read" />
                                                                <span class="form-check-label">Read</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="user_management_write" />
                                                                <span class="form-check-label">Write</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" name="user_management_create" />
                                                                <span class="form-check-label">Create</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </td>
                                                    <!--end::Options-->
                                                </tr>
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Label-->
                                                    <td class="text-gray-800">Content Management</td>
                                                    <!--end::Label-->
                                                    <!--begin::Options-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="content_management_read" />
                                                                <span class="form-check-label">Read</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="content_management_write" />
                                                                <span class="form-check-label">Write</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" name="content_management_create" />
                                                                <span class="form-check-label">Create</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </td>
                                                    <!--end::Options-->
                                                </tr>
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Label-->
                                                    <td class="text-gray-800">Financial Management</td>
                                                    <!--end::Label-->
                                                    <!--begin::Options-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="financial_management_read" />
                                                                <span class="form-check-label">Read</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="financial_management_write" />
                                                                <span class="form-check-label">Write</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" name="financial_management_create" />
                                                                <span class="form-check-label">Create</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </td>
                                                    <!--end::Options-->
                                                </tr>
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Label-->
                                                    <td class="text-gray-800">Reporting</td>
                                                    <!--end::Label-->
                                                    <!--begin::Options-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="reporting_read" />
                                                                <span class="form-check-label">Read</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="reporting_write" />
                                                                <span class="form-check-label">Write</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" name="reporting_create" />
                                                                <span class="form-check-label">Create</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </td>
                                                    <!--end::Options-->
                                                </tr>
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Label-->
                                                    <td class="text-gray-800">Payroll</td>
                                                    <!--end::Label-->
                                                    <!--begin::Options-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="payroll_read" />
                                                                <span class="form-check-label">Read</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="payroll_write" />
                                                                <span class="form-check-label">Write</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" name="payroll_create" />
                                                                <span class="form-check-label">Create</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </td>
                                                    <!--end::Options-->
                                                </tr>
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Label-->
                                                    <td class="text-gray-800">Disputes Management</td>
                                                    <!--end::Label-->
                                                    <!--begin::Options-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="disputes_management_read" />
                                                                <span class="form-check-label">Read</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="disputes_management_write" />
                                                                <span class="form-check-label">Write</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" name="disputes_management_create" />
                                                                <span class="form-check-label">Create</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </td>
                                                    <!--end::Options-->
                                                </tr>
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Label-->
                                                    <td class="text-gray-800">API Controls</td>
                                                    <!--end::Label-->
                                                    <!--begin::Options-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="api_controls_read" />
                                                                <span class="form-check-label">Read</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="api_controls_write" />
                                                                <span class="form-check-label">Write</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" name="api_controls_create" />
                                                                <span class="form-check-label">Create</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </td>
                                                    <!--end::Options-->
                                                </tr>
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Label-->
                                                    <td class="text-gray-800">Database Management</td>
                                                    <!--end::Label-->
                                                    <!--begin::Options-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="database_management_read" />
                                                                <span class="form-check-label">Read</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="database_management_write" />
                                                                <span class="form-check-label">Write</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" name="database_management_create" />
                                                                <span class="form-check-label">Create</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </td>
                                                    <!--end::Options-->
                                                </tr>
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Label-->
                                                    <td class="text-gray-800">Repository Management</td>
                                                    <!--end::Label-->
                                                    <!--begin::Options-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="repository_management_read" />
                                                                <span class="form-check-label">Read</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="repository_management_write" />
                                                                <span class="form-check-label">Write</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" name="repository_management_create" />
                                                                <span class="form-check-label">Create</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </td>
                                                    <!--end::Options-->
                                                </tr>
                                                <!--end::Table row-->
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                </div>
                                <!--end::Permissions-->
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
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Add role-->
        <!--begin::Modal - Update role-->
        <div class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-750px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bolder">Update Role</h2>
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
                    <div class="modal-body scroll-y mx-5 my-7">
                        <!--begin::Form-->
                        <form id="kt_modal_update_role_form" class="form" action="#">
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_role_header" data-kt-scroll-wrappers="#kt_modal_update_role_scroll" data-kt-scroll-offset="300px">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bolder form-label mb-2">
                                        <span class="required">Role name</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Enter a role name" name="role_name" value="Developer" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Permissions-->
                                <div class="fv-row">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bolder form-label mb-2">Role Permissions</label>
                                    <!--end::Label-->
                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                                            <!--begin::Table body-->
                                            <tbody class="text-gray-600 fw-bold">
                                                <!--begin::Table row-->
                                                <tr>
                                                    <td class="text-gray-800">Administrator Access
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allows a full access to the system"></i></td>
                                                    <td>
                                                        <!--begin::Checkbox-->
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                                            <input class="form-check-input" type="checkbox" value="" id="kt_roles_select_all" />
                                                            <span class="form-check-label" for="kt_roles_select_all">Select all</span>
                                                        </label>
                                                        <!--end::Checkbox-->
                                                    </td>
                                                </tr>
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Label-->
                                                    <td class="text-gray-800">User Management</td>
                                                    <!--end::Label-->
                                                    <!--begin::Input group-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="user_management_read" />
                                                                <span class="form-check-label">Read</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="user_management_write" />
                                                                <span class="form-check-label">Write</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" name="user_management_create" />
                                                                <span class="form-check-label">Create</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </td>
                                                    <!--end::Input group-->
                                                </tr>
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Label-->
                                                    <td class="text-gray-800">Content Management</td>
                                                    <!--end::Label-->
                                                    <!--begin::Input group-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="content_management_read" />
                                                                <span class="form-check-label">Read</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="content_management_write" />
                                                                <span class="form-check-label">Write</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" name="content_management_create" />
                                                                <span class="form-check-label">Create</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </td>
                                                    <!--end::Input group-->
                                                </tr>
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Label-->
                                                    <td class="text-gray-800">Financial Management</td>
                                                    <!--end::Label-->
                                                    <!--begin::Input group-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="financial_management_read" />
                                                                <span class="form-check-label">Read</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="financial_management_write" />
                                                                <span class="form-check-label">Write</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" name="financial_management_create" />
                                                                <span class="form-check-label">Create</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </td>
                                                    <!--end::Input group-->
                                                </tr>
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Label-->
                                                    <td class="text-gray-800">Reporting</td>
                                                    <!--end::Label-->
                                                    <!--begin::Input group-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="reporting_read" />
                                                                <span class="form-check-label">Read</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="reporting_write" />
                                                                <span class="form-check-label">Write</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" name="reporting_create" />
                                                                <span class="form-check-label">Create</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </td>
                                                    <!--end::Input group-->
                                                </tr>
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Label-->
                                                    <td class="text-gray-800">Payroll</td>
                                                    <!--end::Label-->
                                                    <!--begin::Input group-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="payroll_read" />
                                                                <span class="form-check-label">Read</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="payroll_write" />
                                                                <span class="form-check-label">Write</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" name="payroll_create" />
                                                                <span class="form-check-label">Create</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </td>
                                                    <!--end::Input group-->
                                                </tr>
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Label-->
                                                    <td class="text-gray-800">Disputes Management</td>
                                                    <!--end::Label-->
                                                    <!--begin::Input group-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="disputes_management_read" />
                                                                <span class="form-check-label">Read</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="disputes_management_write" />
                                                                <span class="form-check-label">Write</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" name="disputes_management_create" />
                                                                <span class="form-check-label">Create</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </td>
                                                    <!--end::Input group-->
                                                </tr>
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Label-->
                                                    <td class="text-gray-800">API Controls</td>
                                                    <!--end::Label-->
                                                    <!--begin::Input group-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="api_controls_read" />
                                                                <span class="form-check-label">Read</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="api_controls_write" />
                                                                <span class="form-check-label">Write</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" name="api_controls_create" />
                                                                <span class="form-check-label">Create</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </td>
                                                    <!--end::Input group-->
                                                </tr>
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Label-->
                                                    <td class="text-gray-800">Database Management</td>
                                                    <!--end::Label-->
                                                    <!--begin::Input group-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="database_management_read" />
                                                                <span class="form-check-label">Read</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="database_management_write" />
                                                                <span class="form-check-label">Write</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" name="database_management_create" />
                                                                <span class="form-check-label">Create</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </td>
                                                    <!--end::Input group-->
                                                </tr>
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Label-->
                                                    <td class="text-gray-800">Repository Management</td>
                                                    <!--end::Label-->
                                                    <!--begin::Input group-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="repository_management_read" />
                                                                <span class="form-check-label">Read</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="" name="repository_management_write" />
                                                                <span class="form-check-label">Write</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" name="repository_management_create" />
                                                                <span class="form-check-label">Create</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </td>
                                                    <!--end::Input group-->
                                                </tr>
                                                <!--end::Table row-->
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                </div>
                                <!--end::Permissions-->
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
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Update role-->
        <!--end::Modals-->

    </div>
    <!--end::Row-->
</div>
<!--end::Container-->
</div>
<!--end::Post-->
	{{-- <div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading"><i class="mdi mdi-clipboard-text fa-fw"></i> Role Permission</div>
					<div class="panel-wrapper collapse in" aria-expanded="true">
						<div class="panel-body">
							{{ Form::open(array('route' => 'rolePermission.store','enctype'=>'multipart/form-data','id'=>'userInfo')) }}
							<div class="form-body">
								<div class="row">
									<div class="col-md-8 col-sm-12">
										@if($errors->any())
											<div class="alert alert-danger alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
															aria-hidden="true">×</span></button>
												@foreach($errors->all() as $error)
													<strong>{!! $error !!}</strong><br>
												@endforeach
											</div>
										@endif
										@if(session()->has('success'))
											<div class="alert alert-success alert-dismissable">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<i class="cr-icon glyphicon glyphicon-ok"></i>&nbsp;<strong>{{ session()->get('success') }}</strong>
											</div>
										@endif
										@if(session()->has('error'))
											<div class="alert alert-danger alert-dismissable">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<i class="glyphicon glyphicon-remove"></i>&nbsp;<strong>{{ session()->get('error') }}</strong>
											</div>
										@endif
										<div class="form-group">
											<label for="role" class="label-medium">User Role<span class="validateRq">*</span></label>
											{{ Form::select('role_id',$data, Input::old('role_id'), array('class' => 'form-control role_id select2 required','onchange'=>'getMenu(this)','id'=>'role_id')) }}
										</div>
									</div>
									<div class="col-md-4"></div>

								</div>
								<div class="row">
									<div class="form-group">
										<div class="ShowMember">

										</div>
									</div>
								</div>


							</div>
							<div class="form-actions">
								<div class="row">
									<div class="col-md-6">
										<button type="submit" id="formSubmit" disabled="disabled" class="btn btn-success btn_style"><i class="fa fa-check"></i> Update</button>
									</div>
								</div>
							</div>
						{{ Form::close() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}
@endsection
@section('page_scripts')
	<script>
        $(document).on('change','[data-menu]',function(event){
            if(this.checked==false){
                var getMenuId = $(this).attr('data-menu');
                $('[data-formenu="'+getMenuId+'"]').prop('checked',false);
            }
        });
        $(document).on('change','[data-formenu]',function(event){
            if(this.checked==true){
                var getMenuId = $(this).attr('data-formenu');
                $('[data-menu="'+getMenuId+'"]').prop('checked',true);
            }
        });
        $(document).on("click", '.checkAll', function (event) {
            if (this.checked) {
                $('.inputCheckbox').each(function () {
                    this.checked = true;
                });
            } else {
                $('.inputCheckbox').each(function () {
                    this.checked = false;
                });
            }
        });

        function getMenu(select) {
            //$(".preloader").fadeIn("slow");

            var role_id = $('.role_id ').val();
            if (role_id != '') {
                $('body').find('#formSubmit').attr('disabled', false);
            } else {
                $('.inputCheckbox').each(function(){
                    this.checked = false;
                });
                $('body').find('#formSubmit').attr('disabled', true);
                //$.notify("Please select role ..!", "error");
                $(".se-pre-con").fadeOut("slow");
                return false;
            }

            var action = "{{ URL::to('rolePermission/get_all_menu') }}";
            $.ajax({
                type: 'POST',
                url: action,
                data: {role_id: role_id, '_token': $('input[name=_token]').val()},

                success: function (result) {
                    var subMenus,checkedValue;
                    var dataFormat = '<label class="col-md-2 col-sm-12 control-label label-medium" style="padding: 17px;">Pages permission </label>';

                    dataFormat += '<div id="area_select" class="col-md-6 col-sm-12" style="margin-top: 20px">';
                    dataFormat += '<div class="checkbox checkbox-info">';
                    dataFormat += '<input class="inputCheckbox checkAll"  type="checkbox" id="inlineCheckbox" >';
                    dataFormat += '<label for="inlineCheckbox"><strong style="font-weight: 400">Select All</strong></label>';
                    dataFormat += '	</div>';
                    var sl=1;
                    $.each(result.arrayFormat, function (key, value) {
                        dataFormat += '<div class="well" style="margin-bottom:15px; padding:20px">';
                        dataFormat += '<span style="font-weight:400; border-bottom:1px solid #000;">' + key + '</span>';
                        dataFormat += '<div class="panel-body">';

                        $.each(value, function (key1, value1) {
                            sl++;
                            checkedValue = '';
                            if (value1['hasPermission'] == 'yes') {
                                checkedValue = 'checked';
                            }
                            dataFormat += '<div class="checkbox checkbox-info">';
                            dataFormat += '<input class="inputCheckbox" data-menu="' + value1['id'] + '" type="checkbox" id="inlineCheckbox1'+sl+'" ' + checkedValue + ' name="menu_id[]" value="' + value1['id'] + '">';
                            dataFormat += '<label for="inlineCheckbox1'+sl+'">'+ value1['name'] + '</label>';
                            dataFormat += '</div>';
                            console.log(result.subMenu[value1['id']]);
                            if(result.subMenu[value1['id']] !== undefined){
                                subMenus = result.subMenu[value1['id']];
                                var i=1;
                                for(var subMenuIndex in subMenus){
                                    checkedValue='';
                                    if(subMenus[subMenuIndex].hasPermission=='yes'){
                                        checkedValue='checked';
                                    }
                                    var subMenuCss = 'margin-bottom: 12px';
                                    if(i==1){
                                        subMenuCss = "margin-bottom: 12px;margin-left: 24px";
                                    }
                                    i++;
                                    dataFormat += '<div style="'+subMenuCss+'" class="checkbox checkbox-inline checkbox-primary">';
                                    dataFormat += '<input type="checkbox" id="inlineCheckbox'+subMenus[subMenuIndex].id+'" value="' + subMenus[subMenuIndex].id + '" data-formenu="' + value1['id'] + '" '+checkedValue+' name="menu_id[]" value="'+subMenus[subMenuIndex].id+'">';
                                    dataFormat += '<label for="inlineCheckbox'+subMenus[subMenuIndex].id+'"> '+subMenus[subMenuIndex].name+' </label>';
                                    dataFormat += '</div>';
                                }
                                i=1;
                            }

                        })

                        dataFormat += '</div>';
                        dataFormat += '</div>';

                    });
                    $('.ShowMember').html(dataFormat);
                    //$(".preloader").fadeOut("slow");
                }
            });
        }
	</script>
@endsection