@extends('admin.master')
@section('content')
@section('title','Edit Group')
@if(isset($editModeData))
@section('formtitle','Edit Group')
@else
@section('formtitle','Add Group')
@endif
@include('admin.partials.lower_top_menu_bar')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Card-->
        <div class="card">
			<div class="card-header border-0 pt-6">

                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-subscription-table-toolbar="base">

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
            </div>
            <!--end::Card header-->
                <!--begin::Card body-->
            <div class="card-body pt-0">
                <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-3">Name: <span style="font-weight:bold">{{ $sacco->sacco_name }}</span>
                        </div>
                        <div class="col-md-3">Description: <span
                                style="font-weight:bold">{{ $sacco->description}}</span></div>

                        <div class="col-md-3">Currently saving: <span
                                style="font-weight:bold">{{ $sacco->currently_saving}}</span></div>

                        <div class="col-md-3">Date started saving: <span
                                style="font-weight:bold">{{ $sacco->date_started_saving}}</span></div>
                     </div>
                     <hr style="background-color:black">
                     <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-3">Circle Number: <span style="font-weight:bold">{{ $sacco->circle_number}}</span>
                        </div>
                        <div class="col-md-3">Share Value:<strong>Ksh</strong> <span
                                style="font-weight:bold">{{ $sacco->share_value}}</span></div>

                        <div class="col-md-3">Total Shares Value:<strong>Ksh</strong>  <span
                                style="font-weight:bold">{{ $sacco->total_shares}}</span></div>

                        <div class="col-md-3">Next meeting date: <span
                                style="font-weight:bold">{{ $sacco->next_meeting_date}}</span></div>
                         </div>
                         <hr style="background-color:black">
                         <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-3">Loan fund cash at now:<strong>Ksh</strong>  <span style="font-weight:bold">{{ $sacco->loan_fund_cash }}</span>
                        </div>
                        <div class="col-md-3">Loan fund at bank at now:<strong>Ksh</strong>  <span
                                style="font-weight:bold">{{ $sacco->loan_fund_bank}}</span></div>

                        <div class="col-md-3">Does the group have a constitution ?: <span
                                style="font-weight:bold">{{ $sacco->constitution}}</span></div>

                        <div class="col-md-3">Registered Male members as per the constitution: <span
                                style="font-weight:bold">{{ $sacco->male_as_per_constitution}}</span></div>
                                 </div>
                                 <hr style="background-color:black">
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-3">Registered Female members as per the constitution: <span style="font-weight:bold">{{ $sacco->female_as_per_constitution}}</span>
                        </div>
                        <div class="col-md-3">Do you have properties owned by the group?: <span
                                style="font-weight:bold">{{ $sacco->property_owned}}</span></div>

                        <div class="col-md-3">Name of the property: <span
                                style="font-weight:bold">{{ $sacco->name_of_the_property}}</span></div>

                        <div class="col-md-3">Value of the property:<strong>Ksh</strong>  <span
                                style="font-weight:bold">{{ $sacco->value_of_the_property}}</span></div>
                        </div>
                        <hr style="background-color:black">
                        <div class="row" style="margin-bottom: 20px">
                            <div class="col-md-3">Value of savings: <strong>Ksh</strong> <span style="font-weight:bold">{{ $sacco->value_of_savings}}</span>
                            </div>
                            <div class="col-md-3">Value of loans outstanding:<strong>Ksh</strong>  <span
                                    style="font-weight:bold">{{ $sacco->value_of_loan_outstanding}}</span></div>

                            <div class="col-md-3">Purpose of the Loan: <span
                                    style="font-weight:bold">{{ $sacco->loan_purpose}}</span></div>

                            <div class="col-md-3">Number of people with loans: <span
                                    style="font-weight:bold">{{ $sacco->number_of_people_with_loans}}</span></div>
                      </div>
                      <hr style="background-color:black">
                      <div class="row" style="margin-bottom: 20px">
                            <div class="col-md-3">Loan fund / cash  if any: <strong>Ksh</strong> <span style="font-weight:bold">{{ $sacco->loan_fund}}</span>
                            </div>
                            <div class="col-md-3">Share Value: <strong>Ksh</strong> <span
                                    style="font-weight:bold">{{ $sacco->share_value}}</span></div>

                            <div class="col-md-3">Total Shares Value: <strong>Ksh</strong> <span
                                    style="font-weight:bold">{{ $sacco->total_shares}}</span></div>

                            <div class="col-md-3">Next meeting date of the group: <span
                                    style="font-weight:bold">{{ $sacco->next_meeting_date}}</span></div>
                     </div>
                     <hr style="background-color:black">
                     <div class="row" style="margin-bottom: 20px">
                            <div class="col-md-3">Loan fund cash at now: <strong>Ksh</strong> <span style="font-weight:bold">{{ $sacco->loan_fund_cash }}</span>
                            </div>

                            <div class="col-md-3">Bank balance if any:<strong>Ksh</strong>  <span
                                    style="font-weight:bold">{{ $sacco->bank_balance}}</span></div>

                            <div class="col-md-3">Social fund balance if any:<strong>Ksh</strong>  <span
                                    style="font-weight:bold">{{ $sacco->social_fund}}</span></div>

                            <div class="col-md-3">Property now if any: <span
                                    style="font-weight:bold">{{ $sacco->property_now}}</span></div>
                    </div>
                    <hr style="background-color:black">
                    <div class="row" style="margin-bottom: 20px">
                           <div class="col-md-3">External debts if any:<strong>Ksh</strong>  <span style="font-weight:bold">{{ $sacco->external_debts}}</span>
                            </div>
                            <div class="col-md-3">Grants provided:<strong>Ksh</strong>  <span
                                    style="font-weight:bold">{{ $sacco->grants_provided}}</span></div>

                            <div class="col-md-3">Type of farming: <span
                                    style="font-weight:bold">{{ $sacco->type_of_farming}}</span></div>

                            <div class="col-md-3">Crops planted: <span
                                    style="font-weight:bold">{{ $sacco->crops_planted}}</span></div>
                    </div>
                    <hr style="background-color:black">
                <div class="row" style="margin-bottom: 20px">

                       <div class="col-md-3">Inputs provided: <span
                                style="font-weight:bold">{{ $sacco->inputs_provided}}</span></div>

                        <div class="col-md-3">Size of land: <span
                                style="font-weight:bold">{{ $sacco->size_of_land}}</span></div>

                        <div class="col-md-3">Past output bags: <span style="font-weight:bold">{{ $sacco->past_output_bags}}</span>
                        </div>

                        <div class="col-md-3">Sales in Ksh: <strong>Ksh</strong> <span
                                style="font-weight:bold">{{ $sacco->sales}}</span></div>
                 </div>
                 <hr style="background-color:black">
                 <div class="row" style="margin-bottom: 20px">

                        <div class="col-md-3">Farm inputs cost:<strong>Ksh</strong>  <span
                                style="font-weight:bold">{{ $sacco->farm_inputs_cost}}</span></div>

                        <div class="col-md-3">Reserve cash for inputs:<strong>Ksh</strong>  <span
                                style="font-weight:bold">{{ $sacco->reserve_cash}}</span></div>

                        <div class="col-md-3">Do you have linkage to market?: <span style="font-weight:bold">{{ $sacco->linkage_to_market }}</span>
                        </div>

                        <div class="col-md-3">Market access cost:<strong>Ksh</strong>  <span
                                style="font-weight:bold">{{ $sacco->market_access_cost}}</span></div>
                 </div>
                 <hr style="background-color:black">
                 <div class="row" style="margin-bottom: 20px">

                        <div class="col-md-3">Have you been linked to any financial institution?: <span
                                style="font-weight:bold">{{ $sacco->link_to_financial_institution}}</span></div>

                        <div class="col-md-3">Name of the institution: <span
                                style="font-weight:bold">{{ $sacco->name_of_the_institution}}</span></div>

                        <div class="col-md-3">Amount offered by the institution: <strong>Ksh</strong> <span style="font-weight:bold">{{ $sacco->amount_offered}}</span>
                        </div>

                        <div class="col-md-3">What will you use the money for?: <span
                                style="font-weight:bold">{{ $sacco->money_usage}}</span></div>
                 </div>
                 <hr style="background-color:black">
                 <div class="row" style="margin-bottom: 20px">

                        <div class="col-md-3">Other: <span
                                style="font-weight:bold">{{ $sacco->other}}</span></div>
                </div>
            </div>
            <!--end::Card body-->

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
				{{ Form::model($editModeData, array('route' => array('sacco.update', $editModeData->sacco_id), 'method' => 'PUT','files' => 'true','class' => 'form')) }}
				@else
				{{ Form::open(array('route' => 'sacco.store','enctype'=>'multipart/form-data','class'=>'form')) }}
				@endif
					<!--begin::Scroll-->
					<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
					  <!--begin::Input group-->
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Group Name</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('sacco_name', Input::old('sacco_name'), $attributes =
									array('class'=>'form-control form-control-solid mb-3 mb-lg-0 required
									sacco_name','id'=>'sacco_name','placeholder'=>'Enter your sacco name')) !!}
							<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Description</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('description', Input::old('description'), $attributes =
							array('class'=>'form-control form-control-solid mb-3 mb-lg-0 required
							description','id'=>'description','placeholder'=>'Enter your last name')) !!}<!--end::Input-->
						</div>
						<!--end::Input group-->
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">County</label>
						{{ Form::select('county_id',$counties, Input::old('county_id'), array('class' => 'form-select form-select-solid fw-bolder county_id select2','required'=>'required','data-style'=>'btn-info btn-outline')) }}
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Sub County</label>
						{{ Form::select('sub_county_id',$subcounties, Input::old('sub_county_id'), array('class' => 'form-select form-select-solid fw-bolder sub_county_id select2','required'=>'required','data-style'=>'btn-info btn-outline')) }}
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Ward</label>
						{{ Form::select('ward_id',$wardList, Input::old('ward_id'), array('class' => 'form-select form-select-solid fw-bolder ward_id select2','required'=>'required','data-style'=>'btn-info btn-outline')) }}
						</div>
						<!--begin::Input group-->
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Number of male members at formation? </label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('male_members', Input::old('male_members'), $attributes =
							array('class'=>'form-control form-control-solid mb-3 mb-lg-0 required male_members','id'=>'male_members','placeholder'=>'Enter your male members')) !!}
						<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Number of female members at formation? </label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('female_members', Input::old('female_members'), $attributes =
								 array('class'=>'form-control form-control-solid mb-3 mb-lg-0 required
							 female_members','id'=>'female_members','placeholder'=>'Enter female members')) !!}<!--end::Input-->
						</div>
						<h7>Group Information</h7>
						<div class="fv-row mb-7">
					     <label class="required fs-6 fw-bold form-label mb-2">Are you currently saving?</label>
                          {{ Form::select('currently_saving', array('No' => 'No', 'Yes' => 'Yes'), Input::old('currently_saving'), array('class' => 'form-select form-select-solid fw-bolder required')) }}
						</div>
						<div class="col-md-6 fv-row">
							<label class="required fs-6 fw-bold mb-2">Indicate date started saving</label>
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
							    <input class="form-control form-control-solid ps-12" type="date" name="date_started_saving" value="{{old('date_started_saving',date('Y-m-d'))}}" />
								<!--end::Datepicker-->
							</div>
							<!--end::Input-->
						</div>
						<!--end::Col-->
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Circle Number</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('circle_number', Input::old('circle_number'), $attributes =
							array('class'=>'form-control form-control-solid mb-3 mb-lg-0 required
							circle_number','id'=>'circle_number','placeholder'=>'Enter your circle number')) !!}<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Share Value</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('share_value', Input::old('share_value'), $attributes =
								array('class'=>'form-control form-control-solid mb-3 mb-lg-0 required
								share_value','id'=>'share_value','placeholder'=>'Enter share value')) !!}
							<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Total Shares Bought in the meeting Value</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('total_shares',Input::old('total_shares'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 total_shares','placeholder'=>'Total Shares')) !!}
							<!--end::Input-->
						</div>
						<div class="col-md-6 fv-row">
							<label class="required fs-6 fw-bold mb-2">Next meeting date</label>
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
							    <input class="form-control form-control-solid ps-12" type="date" name="next_meeting_date" value="{{old('next_meeting_date',date('Y-m-d'))}}" />

								 <!--end::Datepicker-->
							</div>
							<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Loan fund cash in the box at now</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('loan_fund_cash', Input::old('loan_fund_cash'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 required loan_fund_cash','id'=>'loan_fund_cash','placeholder'=>'Enter loan fund cash')) !!}<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Loan fund at bank at now</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('loan_fund_bank', Input::old('loan_fund_bank'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 required loan_fund_bank','id'=>'loan_fund_bank','placeholder'=>'Enter loan fund at bank')) !!}
						<!--end::Input-->
						</div>
						<div class="fv-row mb-10">
							<!--begin::Label-->
							<label class="required fs-6 fw-bold form-label mb-2">Does the group have a constitution ?:</label>
							<!--end::Label-->
							<!--begin::Input-->
							{{ Form::select('constitution', array('No' => 'No', 'Yes' => 'Yes'), Input::old('constitution'), array('class' => 'form-select form-select-solid fw-bolder required')) }}
						    <!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Number of Registered Male members as per the constitution</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('male_as_per_constitution',Input::old('male_as_per_constitution'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 male_as_per_constitution','placeholder'=>'Enter Number of Registered Male members as per the constitution')) !!}

						<!--end::Input-->
						</div>

                        <div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Number of Registered female members as per the constitution</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('female_as_per_constitution',Input::old('female_as_per_constitution'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 male_as_per_constitution','placeholder'=>'Enter Number of Registered Male members as per the constitution')) !!}

						<!--end::Input-->
						</div>
						<div class="fv-row mb-10">
							<!--begin::Label-->
							<label class="required fs-6 fw-bold form-label mb-2">Do you have properties owned by the group?:</label>
							<!--end::Label-->
							<!--begin::Input-->
							{{ Form::select('property_owned', array('No' => 'No', 'Yes' => 'Yes'), Input::old('property_owned'), array('class' => 'form-select form-select-solid fw-bolder required')) }}
						   	<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Name of the property</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('name_of_the_property',Input::old('name_of_the_property'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0  name_of_the_property','placeholder'=>'Enter Name of the property')) !!}

						<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Value of the property</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('value_of_the_property',Input::old('value_of_the_property'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0  value_of_the_property','placeholder'=>'Enter Value of the property')) !!}

						<!--end::Input-->
						</div>
						<h7>Loans and savings</h7>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Value of savings</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('value_of_savings',Input::old('value_of_savings'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 value_of_savings','placeholder'=>'Enter Value of savings')) !!}

						<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Value of loans outstanding</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('value_of_loan_outstanding',Input::old('value_of_loan_outstanding'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 value_of_loan_outstanding','placeholder'=>'Enter Value of loan outstanding')) !!}

						<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Purpose of the Loan</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('loan_purpose',Input::old('loan_purpose'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 loan_purpose','placeholder'=>'Enter Loan purpose')) !!}

						<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Number of people with loans</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('number_of_people_with_loans',Input::old('number_of_people_with_loans'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 number_of_people_with_loans','placeholder'=>'Enter Number of people with loans')) !!}

						<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Loan fund / cash in box if any</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('loan_fund',Input::old('loan_fund'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 loan_fund','placeholder'=>'Enter Loan fund ')) !!}

						<!--end::Input-->
						</div>
						<h2>Other assets and liabilities</h2>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Bank balance if any</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('bank_balance',Input::old('bank_balance'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 bank_balance','placeholder'=>'Enter bank balance')) !!}

						<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Social fund balance if any</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('social_fund',Input::old('social_fund'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 social_fund','placeholder'=>'Enter Social fund ')) !!}

						<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Property now if any</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('property_now',Input::old('property_now'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 property_now','placeholder'=>'Enter property now ')) !!}

						<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">External debts if any</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('external_debts',Input::old('external_debts'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0  external_debts','placeholder'=>'Enter external debts')) !!}

						<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Grants provided</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('grants_provided',Input::old('grants_provided'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 grants_provided','placeholder'=>'Enter Grants Provided ')) !!}

						<!--end::Input-->
						</div>
						<h2>Key member activities</h2>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Type of farming</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('type_of_farming',Input::old('type_of_farming'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 type_of_farming','placeholder'=>'Enter type of farming')) !!}

						<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Crops planted</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('crops_planted',Input::old('crops_planted'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 crops_planted','placeholder'=>'Enter Crops planted')) !!}

						<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Inputs provided</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('inputs_provided',Input::old('inputs_provided'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 inputs_provided','placeholder'=>'Enter Inputs provided ')) !!}

						<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Size of land</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('size_of_land',Input::old('size_of_land'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 size_of_land','placeholder'=>'Enter size of land')) !!}

						<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Past output bags</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('past_output_bags',Input::old('past_output_bags'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 past_output_bags','placeholder'=>'Enter past output bags ')) !!}

						<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Sales in Ksh</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('sales',Input::old('sales'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 sales','placeholder'=>'Enter sales ')) !!}

						<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">How much do you use to buy farm inputs?</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('farm_inputs_cost',Input::old('farm_inputs_cost'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0  farm_inputs_cost','placeholder'=>'Enter Farm inputs cost')) !!}

						<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">How much reserve cash do you have for input?</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('reserve_cash',Input::old('reserve_cash'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 reserve_cash','placeholder'=>'Enter reserve cash for input ')) !!}

						<!--end::Input-->
						</div>
						<div class="fv-row mb-10">
							<!--begin::Label-->
							<label class="required fs-6 fw-bold form-label mb-2">Do you have any link to the market? ?:</label>
							<!--end::Label-->
							<!--begin::Input-->
							{{ Form::select('linkage_to_market', array('No' => 'No', 'Yes' => 'Yes'), Input::old('linkage_to_market'), array('class' => 'form-select form-select-solid fw-bolder required')) }}
						   <!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">How Much do you spend to access Market?</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('market_access_cost',Input::old('market_access_cost'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 market_access_cost','placeholder'=>'Enter Market access cost ')) !!}

						<!--end::Input-->
						</div>
						<h2>Trainings Received</h2>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Have you been linked to any financial institution?:</label>
						{{ Form::select('link_to_financial_institution',array('Yes' =>'Yes','No'=>'No' ), Input::old('link_to_financial_institution'), array('class' => 'form-select form-select-solid fw-bolder county_id select2','required'=>'required','data-style'=>'btn-info btn-outline')) }}
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Name of the institution</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('name_of_the_institution',Input::old('name_of_the_institution'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 name_of_the_institution','placeholder'=>'Enter Name of the institution ')) !!}

						<!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Amount offered by the institution</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::text('amount_offered',Input::old('amount_offered'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 amount_offered','placeholder'=>'Enter amount offered ')) !!}

						<!--end::Input-->
						</div>
						<div class="fv-row mb-10">
							<!--begin::Label-->
							<label class="required fs-6 fw-bold form-label mb-2">How will you use the money offered:</label>
							<!--end::Label-->
							<!--begin::Input-->
							{{ Form::select('money_usage',array('Buying Inputs' =>'Buying Inputs','Market Access'=>'Market Access','Ploughing'=>'Ploughing' ), Input::old('money_usage'), array('class' => 'form-select form-select-solid fw-bolder money_usage select2','required'=>'required','data-style'=>'btn-info btn-outline')) }}
						   <!--end::Input-->
						</div>
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Other</label>
							<!--end::Label-->
							<!--begin::Input-->
							{!! Form::textarea('other',Input::old('other'), $attributes = array('class'=>'form-control form-control-solid mb-3 mb-lg-0 other','placeholder'=>'Enter other')) !!}

						<!--end::Input-->
						</div>






						<!--end::Input group-->
					   {{--  <div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Role</label>
							<!--end::Label-->
							<!--begin::Input-->
							{{ Form::select('role_id',$data, Input::old('role_id'), array('class' => 'form-select form-select-solid fw-bolder role_id required')) }}
							<!--end::Input-->
						</div> --}}
					</div>
					<!--end::Scroll-->
					<!--begin::Actions-->
					<div class="text-center pt-15">
						<button type="reset" class="btn btn-white me-3" data-kt-users-modal-action="cancel">Discard</button>
						<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
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