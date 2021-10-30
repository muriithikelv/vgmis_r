@extends('admin.master')
@section('content')
@section('title','Ward Report')
@include('admin.partials.lower_top_menu_bar')
<script>
    jQuery(function (){
        $("#wardReport").validate();
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
                        {{ Form::open(array('route' => 'reports.wardReport','id'=>'wardReport')) }}
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Ward</label>
                        {{ Form::select('ward_id',$wardList, Input::old('ward_id'), array('class' => 'form-select form-select-solid fw-bolder ward_id select2','required'=>'required','data-style'=>'btn-info btn-outline')) }}

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
                                    <a class="btn btn-primary" style="color: #fff"
								href="{{ URL('downloadWardReport/?ward_id='.$ward_id)}}"><i
									class="fa fa-download fa-lg" aria-hidden="true"></i> Download PDF</a>
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
                            <th class="min-w-125px">Sacco Name</th>
                            <th class="min-w-125px">Description</th>
                            <th class="min-w-125px">Number of male members</th>
							<th class="min-w-125px">Number of female members</th>

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
                                {!! $value->description !!}
                            </td>
                            <!--end::Customer=-->
                            <!--begin::Status=-->
                            <td>
                                {!! $value->male_members !!}
                            </td>
                            <!--end::Status=-->
                            <!--begin::Billing=-->
                            <td>
                                {!! $value->female_members !!}
                            </td>

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
