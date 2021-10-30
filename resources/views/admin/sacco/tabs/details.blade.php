<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card body-->
            <div class="card-body pt-0">
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
                <hr style="background-color:black">
                <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-3">Active Members: <span style="font-weight:bold"> {{ $active_members }} </span></div>
                        <div class="col-md-3">Pending Activation: <span style="font-weight:bold">{{ $pending_members }}</span></div>
                    </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
 </div>
</div>