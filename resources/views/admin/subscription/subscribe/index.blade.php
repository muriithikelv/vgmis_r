@extends('admin.master')
@section('content')
@section('title','User List')
@include('admin.partials.lower_top_menu_bar')
@if(isset($editModeData))
@section('formtitle','Edit User')
@else
@section('formtitle','Add User')
@endif
			<!--begin::Page-->


						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container">
								<!--begin::Card-->
								<div class="card">
									<!--begin::Card header-->
									<div class="card-header border-0 pt-6">
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
										<!--begin::Card title-->
										<div class="card-title">
											<!--begin::Search-->
											<div class="d-flex align-items-center position-relative my-1">
												<!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
												<span class="svg-icon svg-icon-1 position-absolute ms-6">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
															<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->
												<input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search user" />
											</div>
											<!--end::Search-->
										</div>
										<!--begin::Card title-->
										<!--begin::Card toolbar-->
										<div class="card-toolbar">
											<!--begin::Toolbar-->
											<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
												<!--begin::Filter-->
												<button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
												<!--begin::Svg Icon | path: icons/duotone/Text/Filter.svg-->
												<span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z" fill="#000000" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->Filter</button>
												<!--begin::Menu 1-->
												<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
													<!--begin::Header-->
													<div class="px-7 py-5">
														<div class="fs-5 text-dark fw-bolder">Filter Options</div>
													</div>
													<!--end::Header-->
													<!--begin::Separator-->
													<div class="separator border-gray-200"></div>
													<!--end::Separator-->
													<!--begin::Content-->
													<div class="px-7 py-5" data-kt-user-table-filter="form">
														<!--begin::Input group-->
														<div class="mb-10">
															<label class="form-label fs-6 fw-bold">Role:</label>
															<select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
																<option></option>
																<option value="Administrator">Administrator</option>
																<option value="Analyst">Analyst</option>
																<option value="Developer">Developer</option>
																<option value="Support">Support</option>
																<option value="Trial">Trial</option>
															</select>
														</div>
														<!--end::Input group-->
														<!--begin::Input group-->
														<div class="mb-10">
															<label class="form-label fs-6 fw-bold">Two Step Verification:</label>
															<select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="two-step" data-hide-search="true">
																<option></option>
																<option value="Enabled">Enabled</option>
															</select>
														</div>
														<!--end::Input group-->
														<!--begin::Actions-->
														<div class="d-flex justify-content-end">
															<button type="reset" class="btn btn-white btn-active-light-primary fw-bold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
															<button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
														</div>
														<!--end::Actions-->
													</div>
													<!--end::Content-->
												</div>
												<!--end::Menu 1-->
												<!--end::Filter-->
												<!--begin::Export-->
												<button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
												<!--begin::Svg Icon | path: icons/duotone/Files/Export.svg-->
												<span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
															<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 8.000000) scale(1, -1) rotate(-180.000000) translate(-12.000000, -8.000000)" x="11" y="2" width="2" height="12" rx="1" />
															<path d="M12,2.58578644 L14.2928932,0.292893219 C14.6834175,-0.0976310729 15.3165825,-0.0976310729 15.7071068,0.292893219 C16.0976311,0.683417511 16.0976311,1.31658249 15.7071068,1.70710678 L12.7071068,4.70710678 C12.3165825,5.09763107 11.6834175,5.09763107 11.2928932,4.70710678 L8.29289322,1.70710678 C7.90236893,1.31658249 7.90236893,0.683417511 8.29289322,0.292893219 C8.68341751,-0.0976310729 9.31658249,-0.0976310729 9.70710678,0.292893219 L12,2.58578644 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 2.500000) scale(1, -1) translate(-12.000000, -2.500000)" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->Export</button>
												<!--end::Export-->
												<!--begin::Add user-->
												<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
												<!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
												<span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
														<rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1" />
													</svg>
												</span>
												<!--end::Svg Icon-->Add User</button>
												<!--end::Add user-->
											</div>
											<!--end::Toolbar-->
											<!--begin::Group actions-->
											<div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
												<div class="fw-bolder me-5">
												<span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
												<button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
											</div>
											<!--end::Group actions-->
											<!--begin::Modal - Adjust Balance-->
											<div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
												<!--begin::Modal dialog-->
												<div class="modal-dialog modal-dialog-centered mw-650px">
													<!--begin::Modal content-->
													<div class="modal-content">
														<!--begin::Modal header-->
														<div class="modal-header">
															<!--begin::Modal title-->
															<h2 class="fw-bolder">Export Users</h2>
															<!--end::Modal title-->
															<!--begin::Close-->
															<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
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
														<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
															<!--begin::Form-->
															<form id="kt_modal_export_users_form" class="form" action="#">
																<!--begin::Input group-->
																<div class="fv-row mb-10">
																	<!--begin::Label-->
																	<label class="fs-6 fw-bold form-label mb-2">Select Roles:</label>
																	<!--end::Label-->
																	<!--begin::Input-->
																	<select name="role" data-control="select2" data-placeholder="Select a role" data-hide-search="true" class="form-select form-select-solid fw-bolder">
																		<option></option>
																		<option value="Administrator">Administrator</option>
																		<option value="Analyst">Analyst</option>
																		<option value="Developer">Developer</option>
																		<option value="Support">Support</option>
																		<option value="Trial">Trial</option>
																	</select>
																	<!--end::Input-->
																</div>
																<!--end::Input group-->
																<!--begin::Input group-->
																<div class="fv-row mb-10">
																	<!--begin::Label-->
																	<label class="required fs-6 fw-bold form-label mb-2">Select Export Format:</label>
																	<!--end::Label-->
																	<!--begin::Input-->
																	<select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bolder">
																		<option></option>
																		<option value="excel">Excel</option>
																		<option value="pdf">PDF</option>
																		<option value="cvs">CVS</option>
																		<option value="zip">ZIP</option>
																	</select>
																	<!--end::Input-->
																</div>
																<!--end::Input group-->
																<!--begin::Actions-->
																<div class="text-center">
																	<button type="reset" class="btn btn-white me-3" data-kt-users-modal-action="cancel">Discard</button>
																	<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
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
											<!--end::Modal - New Card-->
										</div>
										<!--end::Card toolbar-->
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body pt-0">
										<!--begin::Table-->
										<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
											<!--begin::Table head-->
											<thead>
												<!--begin::Table row-->
												<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
													<th class="w-10px pe-2">
														<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
															<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
														</div>
													</th>
													<th class="min-w-125px">User name</th>
													<th class="min-w-125px">Amount</th>
													<th class="min-w-125px">Transaction code</th>
													<th class="min-w-125px">Start date</th>
                                                    <th class="min-w-125px">End date</th>
													<th class="min-w-125px">Created By</th>
													<th class="text-end min-w-100px">Actions</th>
												</tr>
												<!--end::Table row-->
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody class="text-gray-600 fw-bold">
												<!--begin::Table row-->
												<tbody>
													{!! $sl=null !!}
													@foreach($results AS $value)
													<tr class="{!! $value->county_id !!}">
														<td style="width: 30px;">{!! ++$sl !!}</td>
														<td>{!! $value->user->first_name !!}</td>
														<td>{!! $value->user->last_name !!}</td>
														<td>{!! $value->phone_no !!}</td>
														<td>{!! $value->amount !!}</td>
														<td>{!! $value->transaction_code !!}</td>
														<td>{!! $value->start_date !!}</td>
														<td>{!! $value->end_date !!}</td>
														<td style="width: 120px;">
															<span
																class="label label-{{ $value->status==0 ? 'warning' : 'success' }}">{{ $value->status==0 ? 'Inactive' : 'Active' }}</span>
															@if($value->status==0)
															<a href="{!!route('subscription.activate',$value->subscription_id )!!}"
																data-token="{!! csrf_token() !!}"
																data-id="{!! $value->subscription_id!!}"
																class="approve btn btn-success btn-xs deleteBtn btnColor"><i
																	class="fa fa-check" aria-hidden="true" title="Approve"></i></a>
															@else
															<a href="{!!route('subscription.deactivate',$value->subscription_id )!!}"
																data-token="{!! csrf_token() !!}" data-id="{!! $value->subscription_id!!}"
																class="deactivate btn btn-danger btn-xs deleteBtn btnColor"><i
																	class="fa fa-times" aria-hidden="true" title="Revoke"></i></a>
															@endif
														</td>
														<td style="width: 100px;">
															<a href="{!! route('subscription.edit',$value->subscription_id) !!}"
																class="btn btn-success btn-xs btnColor">
																<i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit"></i>
															</a>
															<a href="{!!route('subscription.delete',$value->subscription_id )!!}"
																data-token="{!! csrf_token() !!}"
																data-id="{!! $value->subscription_id!!}"
																class="delete btn btn-danger btn-xs deleteBtn btnColor"><i
																	class="fa fa-trash-o" aria-hidden="true" title="Delete"></i></a>
														</td>
													</tr>
													@endforeach
												</tbody>
                                                @foreach($results AS $value)
												<tr>
													<!--begin::Checkbox-->
													<td>
														<div class="form-check form-check-sm form-check-custom form-check-solid">
															<input class="form-check-input" type="checkbox" value="1" />
														</div>
													</td>
													<!--end::Checkbox-->
													<!--begin::User=-->
													<td>{!! $value->user->created_by !!}</td>
													<td class="d-flex align-items-center">

														<!--begin::User details-->
														<div class="d-flex flex-column">
															<a href="apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">{!! $value->user->first_name.' '.$value->user->last_name !!}</a>
															<span>{!! $value->phone_no !!}</span>
														</div>
														<!--begin::User details-->
													</td>
													<!--end::User=-->
													<!--begin::Role=-->
													<td>{{$value->amount}}</td>
													<!--end::Role=-->
													<!--begin::username=-->
													<td>
														<div class="badge badge-light fw-bolder">{!! $value->transaction_code !!}</div>
													</td>
													<!--end::username=-->
													<!--begin::Two step=-->
													<td>{!! $value->start_date !!}</td>
													<!--end::Two step=-->
													<!--begin::Joined-->
													<td>{!! $value->end_date !!}</td>
													<!--begin::Joined-->
                                                    <!--begin::status-->
													<td>
														<span class="label label-{{ $value->status==2 ? 'warning' : 'success' }}">{{ $value->status==2 ? 'Inactive' : 'Active' }}</span>
                                                    </td>
													<!--begin::status-->
													<!--begin::Action=-->
													<td class="text-end">
														<a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Actions
														<!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
														<span class="svg-icon svg-icon-5 m-0">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<polygon points="0 0 24 0 24 24 0 24" />
																	<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)" />
																</g>
															</svg>
														</span>
														<!--end::Svg Icon--></a>
														<!--begin::Menu-->
														<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
															<!--begin::Menu item-->
													   <div class="menu-item px-3">
														<span
														class="label label-{{ $value->status==0 ? 'warning' : 'success' }}">{{ $value->status==0 ? 'Inactive' : 'Active' }}</span>
													@if($value->status==0)
													<a href="{!!route('subscription.activate',$value->subscription_id )!!}"
														data-token="{!! csrf_token() !!}"
														data-id="{!! $value->subscription_id!!}"
														class="approve btn btn-success btn-xs deleteBtn btnColor"><i
															class="fa fa-check" aria-hidden="true" title="Approve"></i></a>
													@else
													<a href="{!!route('subscription.deactivate',$value->subscription_id )!!}"
														data-token="{!! csrf_token() !!}" data-id="{!! $value->subscription_id!!}"
														class="deactivate btn btn-danger btn-xs deleteBtn btnColor"><i
															class="fa fa-times" aria-hidden="true" title="Revoke"></i></a>
													@endif
														</div>

												</td>
												<div class="menu-item px-3">

													<a href="{!!route('subscription.delete',$value->subscription_id )!!}"
														data-token="{!! csrf_token() !!}"
														data-id="{!! $value->subscription_id!!}"
														class="delete btn btn-danger btn-xs deleteBtn btnColor"><i
															class="fa fa-trash-o" aria-hidden="true" title="Delete"></i></a>
												</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="{!! route('subscription.edit',$value->subscription_id) !!}"
																	class="btn btn-success btn-xs btnColor">
																	<i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit"></i>
																</a></div>
															<!--end::Menu item-->
														</div>
														<!--end::Menu-->
													</td>
													<!--end::Action=-->
												</tr>
												<!--end::Table row-->
                                                @endforeach

											</tbody>
											<!--end::Table body-->
										</table>
										<!--end::Table-->
									</div>
									<!--end::Card body-->
								</div>
								<!--end::Card-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->


			<!--end::Page-->

		<!--end::Main-->


@endsection

@section('page_scripts')
<script>
	$(document).on('click', '.approve', function () {
        var actionTo = $(this).attr('href');
        var token = $(this).attr('data-token');
        var id = $(this).attr('data-id');
        swal({
                title: "Are you sure?",
                text: "The user associated with this subscription will be able to access restricted services",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#7ace4c",
                confirmButtonText: "Yes, Approve it!",
                closeOnConfirm: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: actionTo,
                        type: 'post',
                        data: {_method: 'post', _token: token},
                        success: function (data) {
                            console.log(data)
                           if (data == 'success') {
                                swal({
                                        title: "Approved!",
                                        text: "Subscription approved successfully!",
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
                                    text: "Something went wrong !, Please try again.",
                                    type: "error"
                                });
                            }
                        }

                    });
                } else {
                    swal("Cancelled", "Subscribption is still inactive .", "error");
                }
            });
        return false;
    });

	$(document).on('click', '.deactivate', function () {
        var actionTo = $(this).attr('href');
        var token = $(this).attr('data-token');
        var id = $(this).attr('data-id');
        swal({
                title: "Are you sure?",
                text: "The user associated with this subscription will not be able to access restricted services",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, revoke it!",
                closeOnConfirm: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: actionTo,
                        type: 'post',
                        data: {_method: 'post', _token: token},
                        success: function (data) {
                            console.log(data)
                         if (data == 'success') {
                                swal({
                                        title: "Revoked!",
                                        text: "Subscription revoked successfully!",
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
                                    text: "Something went wrong!, Please try again.",
                                    type: "error"
                                });
                            }
                        }

                    });
                } else {
                    swal("Cancelled", "Subscription is still active .", "error");
                }
            });
        return false;
    });
</script>
@endsection