@extends('admin.master')
@section('content')
@section('title','View Article')
@if(isset($editModeData))
@section('formtitle','Edit Article')
@else
@section('formtitle','Add Article')
@endif
@include('admin.partials.lower_top_menu_bar')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
	<!--begin::Container-->
	<div id="kt_content_container" class="container">
		<!--begin::Card-->
		<div class="card">
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
			<!--begin::Card toolbar-->
			<div class="card-toolbar">
				<!--begin::Toolbar-->
				<div class="d-flex justify-content-end" data-kt-subscription-table-toolbar="base">
				<!--begin::Filter-->
				<a href="{{route('article.index')}}" type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
					View article</a>
					<!--end::Filter-->
					<!--begin::Add subscription-->
					<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
					<!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
					<span class="svg-icon svg-icon-2">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
							<rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1" />
						</svg>
					</span>
					<!--end::Svg Icon-->@yield('formtitle')</a>
					<!--end::Add subscription-->
				</div>
				<!--end::Toolbar-->
				<!--begin::Group actions-->
				<div class="d-flex justify-content-end align-items-center d-none" data-kt-subscription-table-toolbar="selected">
					<div class="fw-bolder me-5">
					<span class="me-2" data-kt-subscription-table-select="selected_count"></span>Selected</div>
					<button type="button" class="btn btn-danger" data-kt-subscription-table-select="delete_selected">Delete Selected</button>
				</div>
				<!--end::Group actions-->
			</div>
			<!--end::Card toolbar-->
				<!--begin::Card body-->
			<div class="card-body p-0">
				<!--begin::Card body-->
				<div class="card-body pt-0">
				 	<div class="row" style="margin-bottom: 20px">
							<div class="col-md-3">Article Title: <span style="font-weight:bold">{{$editModeData->title}}</span>
							</div>
							<div class="col-md-3">Added By: <span
									style="font-weight:bold">{{$editModeData->createdBy->first_name}}
									{{$editModeData->createdBy->last_name}}</span></div>
							<div class="col-md-3">Added By: <span
									style="font-weight:bold">{{$editModeData->createdBy->first_name}}
										{{$editModeData->createdBy->last_name}}</span></div>
							<div class="col-md-3">Added By: <span
								style="font-weight:bold">@php
								if($editModeData->attach_file!='')
								{
								$info = new SplFileInfo($editModeData->attach_file);
								$extension = $info->getExtension();

								if($extension === 'png' || $extension === 'jpg' || $extension === 'jpeg' ||
								$extension === 'PNG' || $extension === 'JPG' || $extension === 'JPEG'){
								echo '<img src="'.asset('uploads/notice/'.$editModeData->attach_file).'"
									width="50%">';
								}else{
								echo '<embed src="'.asset('uploads/notice/'.$editModeData->attach_file).'"
									width="50%" height="550px" />';
								}
								}
								@endphp</span></div>
                            <div class="col-md-3">Description: <span
                                    style="font-weight:bold">{!! $editModeData->description !!}</span></div>

					</div>

				</div>
            <!--end::Card body-->
			</div>
			<!--end::Card body-->
			<!--begin::Modal - Add task-->

		</div>
		<!--end::Card-->
	</div>
	<!--end::Container-->
</div>
<!--end::Post-->
<!--begin::Modal - Add task-->
<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-650px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header" id="kt_modal_add_user_header">
				<!--begin::Modal title-->
				<h2 class="fw-bolder">@yield('formtitle')</h2>
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
				@if(isset($editModeData))
				{{ Form::model($editModeData, array('route' => array('article.update', $editModeData->article_id), 'method' => 'PUT','files' => 'true','class' => 'form','id'=>'kt_modal_add_user_form')) }}
				@else
				{{ Form::open(array('route' => 'article.store','enctype'=>'multipart/form-data','class'=>'form','id'=>'kt_modal_add_user_form')) }}
				@endif
					<!--begin::Scroll-->
					<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

						<!--begin::Input group-->
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Article Title</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('title',Input::old('title'), $attributes =
								array('class'=>'form-control form-control-solid mb-3 mb-lg-0 required
								title','id'=>'title','placeholder'=>'Enter title')) !!} <!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Description</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::textarea('description',Input::old('description'), $attributes =
								array('class'=>'form-control form-control-solid mb-3 mb-lg-0 textarea_editor
								required','rows'=>'15','id'=>'description','placeholder'=>'Enter
								description')) !!}
						</div>
						<!--end::Input group-->
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Status</label>
							<!--end::Label-->
							<!--begin::Input-->
							{{ Form::select('status', array('Published' => 'Published', 'Unpublished' => 'Unpublished'), Input::old('status'), array('class' => 'form-control status select2 required')) }}
							<!--end::Input-->
						</div>
													  <div class="fv-row mb-7">
														<label class="required fs-6 fw-bold mb-2">Publish date</label>
														<!--begin::Input-->
														<div class="position-relative d-flex align-items-center">
															<!--begin::Icon-->
															<div class="symbol symbol-20px me-4 position-absolute ms-4">
																<span class="symbol-label bg-secondary">
																	<!--begin::Svg Icon | path: icons/duotone/Layout/Layout-grid.svg-->
																	<span class="svg-icon">
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24" height="24" />
																				<rect fill="#000000" opacity="0.3" x="4" y="4" width="4" height="4" rx="1" />
																				<path d="M5,10 L7,10 C7.55228475,10 8,10.4477153 8,11 L8,13 C8,13.5522847 7.55228475,14 7,14 L5,14 C4.44771525,14 4,13.5522847 4,13 L4,11 C4,10.4477153 4.44771525,10 5,10 Z M11,4 L13,4 C13.5522847,4 14,4.44771525 14,5 L14,7 C14,7.55228475 13.5522847,8 13,8 L11,8 C10.4477153,8 10,7.55228475 10,7 L10,5 C10,4.44771525 10.4477153,4 11,4 Z M11,10 L13,10 C13.5522847,10 14,10.4477153 14,11 L14,13 C14,13.5522847 13.5522847,14 13,14 L11,14 C10.4477153,14 10,13.5522847 10,13 L10,11 C10,10.4477153 10.4477153,10 11,10 Z M17,4 L19,4 C19.5522847,4 20,4.44771525 20,5 L20,7 C20,7.55228475 19.5522847,8 19,8 L17,8 C16.4477153,8 16,7.55228475 16,7 L16,5 C16,4.44771525 16.4477153,4 17,4 Z M17,10 L19,10 C19.5522847,10 20,10.4477153 20,11 L20,13 C20,13.5522847 19.5522847,14 19,14 L17,14 C16.4477153,14 16,13.5522847 16,13 L16,11 C16,10.4477153 16.4477153,10 17,10 Z M5,16 L7,16 C7.55228475,16 8,16.4477153 8,17 L8,19 C8,19.5522847 7.55228475,20 7,20 L5,20 C4.44771525,20 4,19.5522847 4,19 L4,17 C4,16.4477153 4.44771525,16 5,16 Z M11,16 L13,16 C13.5522847,16 14,16.4477153 14,17 L14,19 C14,19.5522847 13.5522847,20 13,20 L11,20 C10.4477153,20 10,19.5522847 10,19 L10,17 C10,16.4477153 10.4477153,16 11,16 Z M17,16 L19,16 C19.5522847,16 20,16.4477153 20,17 L20,19 C20,19.5522847 19.5522847,20 19,20 L17,20 C16.4477153,20 16,19.5522847 16,19 L16,17 C16,16.4477153 16.4477153,16 17,16 Z" fill="#000000" />
																			</g>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																</span>
															</div>
															<!--end::Icon-->
															<!--begin::Datepicker-->
																										{!! Form::text('publish_date',(isset($editModeData)) ?
																		dateConvertDBtoForm($editModeData->publish_date) :
																		Input::old('publish_date'), $attributes = array('class'=>'form-control form-control-solid ps-12
																		dateField','id'=>'publish_date','placeholder'=>'Enter
																		publish date')) !!}
															<!--end::Datepicker-->
														</div>
														<!--end::Input-->
													</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Attach File</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::file('attach_file',$attributes =
							array('class'=>'form-control')) !!} <!--end::Input-->
						</div>
						<!--end::Input group-->

					</div>
					<!--end::Scroll-->
					<!--begin::Actions-->
					<div class="text-center pt-15">
						<button type="reset" class="btn btn-white me-3" data-kt-users-modal-action="cancel">Discard</button>
						<button type="submit" class="btn btn-primary" data-kt-users-modal-action="">
							<span class="indicator-label">Submit</span>
							<span class="indicator-progress">Please wait...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>
					<!--end::Actions-->
				{{ form::close() }}
				<!--end::Form-->
			</div>
			<!--end::Modal body-->
		</div>
		<!--end::Modal content-->
	</div>
	<!--end::Modal dialog-->
</div>
<!--end::Modal - Add task-->
@endsection