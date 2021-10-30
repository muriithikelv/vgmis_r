@extends('admin.master')
@section('content')
@section('title','Savings Report')
@include('admin.partials.lower_top_menu_bar')
<script>
    jQuery(function (){
        $("#savingsReport").validate();
     });

</script>
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        {{ Form::open(array('route' => 'reports.savingsReport','id'=>'savingsReport')) }}

                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="required fs-6 fw-bold form-label mb-2">Group:</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="sacco_id" class="form-control form-select form-select-solid fw-bolder sacco_id  select2"
											onchange="getData(1)" required>
											<option value="">--- Select Group ---</option>
											@foreach($groupList as $value)
											<option value="{{$value->sacco_id}}" @if($value->sacco_id ==
												old('sacco_id')) {{"selected"}} @endif>{{$value->sacco_name}}
											</option>
											@endforeach
										</select>
                        <!--end::Input-->
                    </div>
                    <div class="fv-row mb-10">
                    <div class="position-relative d-flex align-items-center">
                        <!--begin::Icon-->
                        <div class="symbol symbol-20px me-4 position-absolute ms-4">

                        </div>
                        <!--end::Icon-->
                        <!--begin::Datepicker-->
                         <input class="form-control form-control-solid ps-12" type="date" placeholder="Select a date" name="from_date" value="@if(isset($from_date)) {{$from_date}}@else {{ dateConvertDBtoForm(date('Y-01-01')) }} @endif" />
                         	<!--end::Datepicker-->
                    </div>
                    </div>
                    <div class="position-relative d-flex align-items-center">
                        <!--begin::Icon-->
                        <div class="symbol symbol-20px me-4 position-absolute ms-4">

                        </div>
                        <!--end::Icon-->
                        <!--begin::Datepicker-->
                         <input class="form-control form-control-solid ps-12" type="date" placeholder="Select a date" name="to_date" value="@if(isset($to_date)) {{$to_date}}@else {{ dateConvertDBtoForm(date('Y-m-d')) }} @endif" />
                         	<!--end::Datepicker-->
                    </div>
                     </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Filter-->
                        <button type="submit" type="button" class="btn btn-light-primary me-3">
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

                            @if(count($results) > 0)
                            <h4>
                                @if(isset($from_date))
                                <a class="btn btn-success" style="color: #fff"
                                    href="{{ URL('downloadsavingsReport/?sacco_id='.$sacco_id.'&from_date='.$from_date.'&to_date='.$to_date)}}"><i
                                        class="fa fa-download fa-lg" aria-hidden="true"></i> Download PDF</a>
                                        @else
                                        <a class="btn btn-success" style="color: #fff"
                                    href="{{ URL('downloadsavingsReport/?sacco_id='.$sacco_id.'&from_date='.dateConvertDBtoForm(date('Y-01-01')) .'&to_date='.dateConvertDBtoForm(date('Y-m-d')))}}"><i
                                        class="fa fa-download fa-lg" aria-hidden="true"></i> Download PDF</a>
                                        @endif
                            </h4>
                            @endif
                    </div>
                    <!--end::Toolbar-->
                </div>
                {{Form::close()}}
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                         <!--begin::Card body-->
              <div class="card-body pt-0">
                <!--begin::Table-->
                @if(!empty($results))
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_subscriptions_table">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_subscriptions_table .form-check-input" value="1" />
                                </div>
                            </th>
                            <th class="min-w-125px">Sacco Name</th>
                            <th class="min-w-125px">Date started saving</th>
                            <th class="min-w-125px">Savings balance</th>

                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-bold">
                        @if(count($results) > 0)
                        @foreach($results AS $value)
                        <tr>
                            <!--begin::Checkbox-->
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <!--end::Checkbox-->
                            <!--begin::Customer=-->
                            <td>{!! $value->sacco_name !!}
                            </td>
                            <td>
                                {{$value->date_started_saving}}
                            </td>
                            <!--end::Customer=-->
                            <!--begin::Status=-->
                            <td>
                                {{$value->value_of_savings}}
                            </td>
                            <!--end::Status=-->
                            <!--begin::Billing=-->

                            <!--end::Date=-->


                        </tr>
                        @endforeach
                        @else
                                            <tr>
                                                <td colspan="8">No data have found !</td>
                                            </tr>
                        @endif
                    </tbody>
                    <!--end::Table body-->
                </table>
                @endif
                <!--end::Table-->
            </div>
            <!--end::Card body-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
