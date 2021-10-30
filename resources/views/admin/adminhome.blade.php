@extends('admin.master')
@section('content')
@section('title','Dashboard')
 @include('admin.partials.lower_top_menu_bar')
       <!--begin::Post-->
	 {{--   @for ($i = 0; $i < 5; $i++)
	   <p>The current value is {{ $i }}.</p>
   @endfor --}}
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container">
								<!--begin::Row-->
								<div class="row gy-5 g-xl-8">
									<!--begin::Col-->
									<div class="col-xxl-4">
										<!--begin::Mixed Widget 2-->
										<div class="card card-xxl-stretch">
											<!--begin::Header-->
											<div class="card-header border-0 bg-danger py-5">
												<h3 class="card-title fw-bolder text-white">Sales Statistics</h3>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body p-0">
												<!--begin::Chart-->
												<div class="mixed-widget-2-chart card-rounded-bottom bg-danger" data-kt-color="danger" style="height: 200px"></div>
												<!--end::Chart-->
												<!--begin::Stats-->
												<div class="card-p mt-n20 position-relative">
													<!--begin::Row-->
													<div class="row g-0">
														<!--begin::Col-->
														<div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
															<!--begin::Svg Icon | path: icons/duotone/Media/Equalizer.svg-->
															<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
																		<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
																		<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
																		<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
																	</g>
																</svg>
															</span>
															<!--end::Svg Icon-->
															<a href="{{route('sacco.index')}}" class="text-warning fw-bold fs-6">Total Groups</a>
                                                            <h3>{{$totalGroups}}</h3>
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col bg-light-primary px-6 py-8 rounded-2 mb-7">
															<!--begin::Svg Icon | path: icons/duotone/Communication/Add-user.svg-->
															<span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																	<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<a href="{{route('user.index')}}" class="text-primary fw-bold fs-6">Total Users</a>
                                                            <h3>{{$totalUsers}}</h3>
														</div>
														<!--end::Col-->
													</div>
													<!--end::Row-->
													<!--begin::Row-->
													<div class="row g-0">
														<!--begin::Col-->
														<div class="col bg-light-danger px-6 py-8 rounded-2 me-7">
															<!--begin::Svg Icon | path: icons/duotone/Design/Layers.svg-->
															<span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
																	<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<a href="{{route('product.index')}}" class="text-danger fw-bold fs-6 mt-2">Total Products</a>
                                                            <h3>{{$totalProducts}}</h3>
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col bg-light-success px-6 py-8 rounded-2">

															<!--begin::Svg Icon | path: icons/duotone/Communication/Urgent-mail.svg-->
															<span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
															    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                            viewBox="0 0 24 24" version="1.1">
                                                            <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                            <path    d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                                fill="#000000" fill-rule="nonzero" />
                                                             </svg>
															</span>
															<!--end::Svg Icon-->
															<a href="{{route('farmer.index')}}" class="text-success fw-bold fs-6 mt-2">Total Farmers</a>
                                                            <h3>{{$totalFarmer}}</h3>
														</div>
														<!--end::Col-->
													</div>
													<!--end::Row-->
												</div>
												<!--end::Stats-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 2-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-xxl-4">
										<!--begin::Mixed Widget 7-->
										<div class="card card-xxl-stretch-50 mb-5 mb-xl-8">
											<!--begin::Body-->
											<div class="card-body d-flex flex-column p-0">

											</div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 10-->
									</div>
									<!--end::Col-->
								</div>
								<!--end::Row-->
								 <!--begin::Row-->
								<div class="row gy-5 gx-xl-8">
									{{-- <!--begin::Col-->
									<div class="col-xxl-4">
										<!--begin::List Widget 3-->
										<div class="card card-xxl-stretch mb-xl-3">
											<!--begin::Header-->
											<div class="card-header border-0">
												<h3 class="card-title fw-bolder text-dark">Todo</h3>
												<div class="card-toolbar">
													<!--begin::Menu-->
													<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
														<!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
														<span class="svg-icon svg-icon-2">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
																	<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
																	<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
																	<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
																</g>
															</svg>
														</span>
														<!--end::Svg Icon-->
													</button>
													<!--begin::Menu 3-->
													<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
														<!--begin::Heading-->
														<div class="menu-item px-3">
															<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
														</div>
														<!--end::Heading-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3">Create Invoice</a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="#" class="menu-link flex-stack px-3">Create Payment
															<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3">Generate Bill</a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start" data-kt-menu-flip="center, top">
															<a href="#" class="menu-link px-3">
																<span class="menu-title">Subscription</span>
																<span class="menu-arrow"></span>
															</a>
															<!--begin::Menu sub-->
															<div class="menu-sub menu-sub-dropdown w-175px py-4">
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">Plans</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">Billing</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">Statements</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu separator-->
																<div class="separator my-2"></div>
																<!--end::Menu separator-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<div class="menu-content px-3">
																		<!--begin::Switch-->
																		<label class="form-check form-switch form-check-custom form-check-solid">
																			<!--begin::Input-->
																			<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
																			<!--end::Input-->
																			<!--end::Label-->
																			<span class="form-check-label text-muted fs-6">Recuring</span>
																			<!--end::Label-->
																		</label>
																		<!--end::Switch-->
																	</div>
																</div>
																<!--end::Menu item-->
															</div>
															<!--end::Menu sub-->
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3 my-1">
															<a href="#" class="menu-link px-3">Settings</a>
														</div>
														<!--end::Menu item-->
													</div>
													<!--end::Menu 3-->
													<!--end::Menu-->
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-2">
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-8">
													<!--begin::Bullet-->
													<span class="bullet bullet-vertical h-40px bg-success"></span>
													<!--end::Bullet-->
													<!--begin::Checkbox-->
													<div class="form-check form-check-custom form-check-solid mx-5">
														<input class="form-check-input" type="checkbox" value="" />
													</div>
													<!--end::Checkbox-->
													<!--begin::Description-->
													<div class="flex-grow-1">
														<a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Create FireStone Logo</a>
														<span class="text-muted fw-bold d-block">Due in 2 Days</span>
													</div>
													<!--end::Description-->
													<span class="badge badge-light-success fs-8 fw-bolder">New</span>
												</div>
												<!--end:Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-8">
													<!--begin::Bullet-->
													<span class="bullet bullet-vertical h-40px bg-primary"></span>
													<!--end::Bullet-->
													<!--begin::Checkbox-->
													<div class="form-check form-check-custom form-check-solid mx-5">
														<input class="form-check-input" type="checkbox" value="" />
													</div>
													<!--end::Checkbox-->
													<!--begin::Description-->
													<div class="flex-grow-1">
														<a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Stakeholder Meeting</a>
														<span class="text-muted fw-bold d-block">Due in 3 Days</span>
													</div>
													<!--end::Description-->
													<span class="badge badge-light-primary fs-8 fw-bolder">New</span>
												</div>
												<!--end:Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-8">
													<!--begin::Bullet-->
													<span class="bullet bullet-vertical h-40px bg-warning"></span>
													<!--end::Bullet-->
													<!--begin::Checkbox-->
													<div class="form-check form-check-custom form-check-solid mx-5">
														<input class="form-check-input" type="checkbox" value="" />
													</div>
													<!--end::Checkbox-->
													<!--begin::Description-->
													<div class="flex-grow-1">
														<a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Scoping &amp; Estimations</a>
														<span class="text-muted fw-bold d-block">Due in 5 Days</span>
													</div>
													<!--end::Description-->
													<span class="badge badge-light-warning fs-8 fw-bolder">New</span>
												</div>
												<!--end:Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-8">
													<!--begin::Bullet-->
													<span class="bullet bullet-vertical h-40px bg-primary"></span>
													<!--end::Bullet-->
													<!--begin::Checkbox-->
													<div class="form-check form-check-custom form-check-solid mx-5">
														<input class="form-check-input" type="checkbox" value="" />
													</div>
													<!--end::Checkbox-->
													<!--begin::Description-->
													<div class="flex-grow-1">
														<a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">KPI App Showcase</a>
														<span class="text-muted fw-bold d-block">Due in 2 Days</span>
													</div>
													<!--end::Description-->
													<span class="badge badge-light-primary fs-8 fw-bolder">New</span>
												</div>
												<!--end:Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-8">
													<!--begin::Bullet-->
													<span class="bullet bullet-vertical h-40px bg-danger"></span>
													<!--end::Bullet-->
													<!--begin::Checkbox-->
													<div class="form-check form-check-custom form-check-solid mx-5">
														<input class="form-check-input" type="checkbox" value="" />
													</div>
													<!--end::Checkbox-->
													<!--begin::Description-->
													<div class="flex-grow-1">
														<a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Project Meeting</a>
														<span class="text-muted fw-bold d-block">Due in 12 Days</span>
													</div>
													<!--end::Description-->
													<span class="badge badge-light-danger fs-8 fw-bolder">New</span>
												</div>
												<!--end:Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center">
													<!--begin::Bullet-->
													<span class="bullet bullet-vertical h-40px bg-success"></span>
													<!--end::Bullet-->
													<!--begin::Checkbox-->
													<div class="form-check form-check-custom form-check-solid mx-5">
														<input class="form-check-input" type="checkbox" value="" />
													</div>
													<!--end::Checkbox-->
													<!--begin::Description-->
													<div class="flex-grow-1">
														<a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Customers Update</a>
														<span class="text-muted fw-bold d-block">Due in 1 week</span>
													</div>
													<!--end::Description-->
													<span class="badge badge-light-success fs-8 fw-bolder">New</span>
												</div>
												<!--end:Item-->
											</div>
											<!--end::Body-->
										</div>
										<!--end:List Widget 3-->
									</div>
									<!--end::Col--> --}}
									<!--begin::Col-->
									<div class="col-xl-8">
										<!--begin::Tables Widget 9-->
										<div class="card card-xxl-stretch mb-5 mb-xl-8">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bolder fs-3 mb-1">Members Statistics</span>
													<span class="text-muted mt-1 fw-bold fs-7">Total Group Members &nbsp;{{$totalMembers}}</span>
												</h3>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body py-3">
												<!--begin::Table container-->
												<div class="table-responsive">
													<!--begin::Table-->
													<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
														<!--begin::Table head-->
														<thead>
															<tr class="fw-bolder text-muted">
																<th class="w-25px">
																	<div class="form-check form-check-sm form-check-custom form-check-solid">
																		<input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-9-check" />
																	</div>
																</th>
																<th class="min-w-150px">Username</th>
																<th class="min-w-140px">Group</th>
																<th class="min-w-120px">Location & Id.no</th>
																<th class="min-w-120px text-end">Date Joined</th>
															</tr>
														</thead>
														<!--end::Table head-->
														<!--begin::Table body-->
														<tbody>
                                                            @foreach ($newMembers as $member)
                                                            <tr>
																<td>
																	<div class="form-check form-check-sm form-check-custom form-check-solid">
																		<input class="form-check-input widget-9-check" type="checkbox" value="1" />
																	</div>
																</td>
																<td>
																	<div class="d-flex align-items-center">
																		{{-- <div class="symbol symbol-45px me-5">
																			<img src="assets/media/avatars/150-11.jpg" alt="" />
																		</div> --}}
																		<div class="d-flex justify-content-start flex-column">
																			<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$member->member_name}}</a>
																			<span class="text-muted fw-bold text-muted d-block fs-7">{{$member->member_number}}</span>
																		</div>
																	</div>
																</td>
																<td>
																	<a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">{{$member->sacco->sacco_name}}</a>
																	<span class="text-muted fw-bold text-muted d-block fs-7">{{$member->sacco->description}}</span>
																</td>
                                                                <td>
																	<a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">{{$member->member_id_no}}</a>
																	<span class="text-muted fw-bold text-muted d-block fs-7">{{$member->location->location_name}}</span>
																</td>
																<td>
																	<div class="d-flex flex-column w-100 me-2">
																		<div class="d-flex flex-stack mb-2">
																			<span class="text-muted me-2 fs-7 fw-bold">{{$member->created_at->diffForHumans()}}</span>
																		</div>
																	</div>
																</td>
															</tr>
                                                            @endforeach

														</tbody>
														<!--end::Table body-->
													</table>
													<!--end::Table-->
												</div>
												<!--end::Table container-->
											</div>
											<!--begin::Body-->
										</div>
										<!--end::Tables Widget 9-->
									</div>
									<!--end::Col-->
								</div>
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row g-5 gx-xxl-8">

									<!--begin::Col-->
									<div class="col-xxl-8">
										<!--begin::Tables Widget 5-->
										<div class="card card-xxl-stretch mb-5 mb-xxl-8">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bolder fs-3 mb-1">Latest Products</span>
													<span class="text-muted mt-1 fw-bold fs-7">Total Products&nbsp;{{$totalProducts}}</span>
												</h3>
												<div class="card-toolbar">
													<ul class="nav">
														<li class="nav-item">
															<a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary active fw-bolder px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_5_tab_1">Month</a>
														</li>
														<li class="nav-item">
															<a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_5_tab_2">Week</a>
														</li>
														<li class="nav-item">
															<a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4" data-bs-toggle="tab" href="#kt_table_widget_5_tab_3">Day</a>
														</li>
													</ul>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body py-3">
												<div class="tab-content">
													<!--begin::Tap pane-->
													<div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
														<!--begin::Table container-->
														<div class="table-responsive">
															<!--begin::Table-->
															<!--begin::Table-->
															<table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
																<!--begin::Table head-->
																<thead>
																	<tr class="border-0">
																		<th class="p-0 w-50px"></th>
																		<th class="p-0 min-w-150px">Product Name</th>
																		<th class="p-0 min-w-150px">Product Description</th>
																		<th class="p-0 min-w-150px">(Added by)Owner</th>
																		<th class="p-0 min-w-50px text-end">Action</th>
																	</tr>
																</thead>
																<!--end::Table head-->
																<!--begin::Table body-->
																<tbody>
																	@foreach ($monthProducts as $value)
                                                                    <tr>
																		<td>
																			{{-- <div class="symbol symbol-45px me-2">
																				<span class="symbol-label">
																					<img src="assets/media/svg/brand-logos/plurk.svg" class="h-50 align-self-center" alt="" />
																				</span>
																			</div> --}}
																		</td>
																		<td>
																			<a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$value->name}}</a>
																			<span class="text-muted fw-bold d-block">Ksh{{$value->price}}</span>
																		</td>
																		<td class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$value->description}}</td>
																		<td class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$value->user->phone_no}}
																		</td>
																		<td class="text-end">
																			<a href="{{route('product.index')}}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
																				<!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
																				<span class="svg-icon svg-icon-2">
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<polygon points="0 0 24 0 24 24 0 24" />
																							<rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																						</g>
																					</svg>
																				</span>
																				<!--end::Svg Icon-->
																			</a>
																		</td>
																	</tr>
                                                                    @endforeach
																</tbody>
																<!--end::Table body-->
															</table>
														</div>
														<!--end::Table-->
													</div>
													<!--end::Tap pane-->
													<!--begin::Tap pane-->
													<div class="tab-pane fade" id="kt_table_widget_5_tab_2">
														<!--begin::Table container-->
														<div class="table-responsive">
															<!--begin::Table-->
															<!--begin::Table-->
															<table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
																<!--begin::Table head-->
																<thead>
																	<tr class="border-0">
																		<th class="p-0 w-50px"></th>
																		<th class="p-0 min-w-150px">Product Name</th>
																		<th class="p-0 min-w-150px">Product Description</th>
																		<th class="p-0 min-w-150px">(Added by)Owner</th>
																		<th class="p-0 min-w-50px text-end">Action</th>
																	</tr>
																</thead>
																<!--end::Table head-->
																<!--begin::Table body-->
																<tbody>
																	@foreach ($weekProducts as $value)
                                                                    <tr>
																		<td>
																			{{-- <div class="symbol symbol-45px me-2">
																				<span class="symbol-label">
																					<img src="assets/media/svg/brand-logos/plurk.svg" class="h-50 align-self-center" alt="" />
																				</span>
																			</div> --}}
																		</td>
																		<td>
																			<a href="" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$value->name}}</a>
																			<span class="text-muted fw-bold d-block">Ksh{{$value->price}}</span>
																		</td>
																		<td class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$value->description}}</td>
																		<td class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$value->user->phone_no}}
																		</td>
																		<td class="text-end">
																			<a href="{{route('product.index')}}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
																				<!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
																				<span class="svg-icon svg-icon-2">
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<polygon points="0 0 24 0 24 24 0 24" />
																							<rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																						</g>
																					</svg>
																				</span>
																				<!--end::Svg Icon-->
																			</a>
																		</td>
																	</tr>
                                                                    @endforeach
																</tbody>
																<!--end::Table body-->
															</table>
														</div>
														<!--end::Table-->
													</div>
													<!--end::Tap pane-->
													<!--begin::Tap pane-->
													<div class="tab-pane fade" id="kt_table_widget_5_tab_3">
														<!--begin::Table container-->
														<div class="table-responsive">
															<!--begin::Table-->
															<table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
																<!--begin::Table head-->
																<thead>
																	<tr class="border-0">
																		<th class="p-0 w-50px"></th>
																		<th class="p-0 min-w-150px">Product Name</th>
																		<th class="p-0 min-w-150px">Product Description</th>
																		<th class="p-0 min-w-150px">(Added by)Owner</th>
																		<th class="p-0 min-w-50px text-end">Action</th>
																	</tr>
																</thead>
																<!--end::Table head-->
																<!--begin::Table body-->
																<tbody>
																	@foreach ($newProducts as $item)
                                                                    <tr>
																		<td>
																			{{-- <div class="symbol symbol-45px me-2">
																				<span class="symbol-label">
																					<img src="assets/media/svg/brand-logos/plurk.svg" class="h-50 align-self-center" alt="" />
																				</span>
																			</div> --}}
																		</td>
																		<td>
																			<a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$value->name}}</a>
																			<span class="text-muted fw-bold d-block">Ksh{{$value->price}}</span>
																		</td>
																		<td class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$value->description}}</td>
																		<td class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$value->user->phone_no}}
																		</td>
																		<td class="text-end">
																			<a href="{{route('product.index')}}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
																				<!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
																				<span class="svg-icon svg-icon-2">
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<polygon points="0 0 24 0 24 24 0 24" />
																							<rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																						</g>
																					</svg>
																				</span>
																				<!--end::Svg Icon-->
																			</a>
																		</td>
																	</tr>
                                                                    @endforeach
																</tbody>
																<!--end::Table body-->
															</table>
														</div>
														<!--end::Table-->
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
								<!--end::Row-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->




@endsection


@section('page_scripts')

<script>
    var KTWidgets = function () {
    // Statistics widgets


    // Mixed widgets
    var initMixedWidget2 = function() {
        var charts = document.querySelectorAll('.mixed-widget-2-chart');

        var color;
        var strokeColor;
        var height;
        var labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
        var borderColor = KTUtil.getCssVariableValue('--bs-gray-200');
        /* var users= @json($users); */
        var options;
        var chart;

        [].slice.call(charts).map(function(element) {
            height = parseInt(KTUtil.css(element, 'height'));
            color = KTUtil.getCssVariableValue('--bs-' + element.getAttribute("data-kt-color"));
            strokeColor = KTUtil.colorDarken(color, 15);

            options = {
                series: [{
                    name: 'Net Profit',
                    data:[30, 45, 32, 70, 40, 40, 40]
                }],
                chart: {
                    fontFamily: 'inherit',
                    type: 'area',
                    height: height,
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    },
                    sparkline: {
                        enabled: true
                    },
                    dropShadow: {
                        enabled: true,
                        enabledOnSeries: undefined,
                        top: 5,
                        left: 0,
                        blur: 3,
                        color: strokeColor,
                        opacity: 0.5
                    }
                },
                plotOptions: {},
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                },
                fill: {
                    type: 'solid',
                    opacity: 0
                },
                stroke: {
                    curve: 'smooth',
                    show: true,
                    width: 3,
                    colors: [strokeColor]
                },
                xaxis: {
                    categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        show: false,
                        style: {
                            colors: labelColor,
                            fontSize: '12px'
                        }
                    },
                    crosshairs: {
                        show: false,
                        position: 'front',
                        stroke: {
                            color: borderColor,
                            width: 1,
                            dashArray: 3
                        }
                    }
                },
                yaxis: {
                    min: 0,
                    max: 80,
                    labels: {
                        show: false,
                        style: {
                            colors: labelColor,
                            fontSize: '12px'
                        }
                    }
                },
                states: {
                    normal: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    hover: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    active: {
                        allowMultipleDataPointsSelection: false,
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    }
                },
                tooltip: {
                    style: {
                        fontSize: '12px',
                    },
                    y: {
                        formatter: function (val) {
                            return "Ksh" + val + " thousands"
                        }
                    },
                    marker: {
                        show: false
                    }
                },
                colors: ['transparent'],
                markers: {
                    colors: [color],
                    strokeColor: [strokeColor],
                    strokeWidth: 3
                }
            };

            chart = new ApexCharts(element, options);
            chart.render();
        });
    }



    // Public methods
    return {
        init: function () {
            // Statistics widgets

            // Charts widgets

            // Mixed widgets
            initMixedWidget2();
            // Feeds

            // Follow button
        }
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = KTWidgets;
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTWidgets.init();
});
</script>
@endsection