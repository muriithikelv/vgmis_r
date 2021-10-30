@extends('admin.master')
@section('content')
@section('title','Add Role Permission')
@include('admin.partials.lower_top_menu_bar')
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
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Form-->
                        {{ Form::open(array('route' => 'rolePermission.store','enctype'=>'multipart/form-data','id'=>'userInfo')) }}
                        <div class="row">
                         <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">Role</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    {{ Form::select('role_id',$data, Input::old('role_id'), array('class' => 'form-select form-select-solid fw-bolder role_id required','onchange'=>'getMenu(this)','id'=>'role_id')) }}
                                    <!--end::Input-->
                                </div>
                        </div>
                                <div class="col-md-4"></div>
                                <div class="row">
                                    <div class="form-group">
                                    <div class="ShowMember">

                                    </div>
                                </div>
                                </div>
                            <!--begin::Actions-->
                            <div class="text-center pt-15">
                               <button type="submit" id="formSubmit" disabled="disabled" class="btn btn-primary">
                                    <span class="indicator-label">Update</span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        {{ form::close() }}
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card header-->
            </div>
            <!--end::Card-->
         </div>
         <!-- end::Container -->
     </div>
     <!-- end::post -->




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
                $('body').find('#formSubmit').attr('disabled', false);
            } else {
                $('.inputCheckbox').each(function () {
                    this.checked = false;
                });
                $('body').find('#formSubmit').attr('disabled', true);
            }
        });
        $(document).on("click", '.checkSingle', function (event) {
            if (this.checked) {
                $('body').find('#formSubmit').attr('disabled', false);
            } else{
                $('body').find('#formSubmit').attr('disabled', true);
            }
        });

        function getMenu(select) {
            //$(".preloader").fadeIn("slow");

            var role_id = $('.role_id ').val();
            if (role_id != '') {
                $('body').find('#formSubmit').attr('disabled', true);
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
                    var dataFormat = '<label class="fs-5 fw-bolder form-label mb-2">Pages permission </label>';

                    dataFormat += '<div class="col-md-8 col-md-6 mx-auto" style="margin-top: 20px">';
                    dataFormat += '<div class="form-check form-check-custom form-check-solid me-9">';
                    dataFormat += '<input class="form-check-input inputCheckbox checkAll"  type="checkbox" id="kt_roles_select_all" >';
                    dataFormat += '<label for="inlineCheckbox">Select All</label>';
                    dataFormat += '	</div>';
                    var sl=1;
                    $.each(result.arrayFormat, function (key, value) {
                        dataFormat += '<div class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100 min-w-md-350px p-9 bg-lighten" style="margin-bottom:25px; padding:5px">';
                        dataFormat += '<span style="font-weight:400; border-bottom:1px solid #000;">' + key + '</span>';
                        dataFormat += '<div class="">';

                        $.each(value, function (key1, value1) {
                            sl++;
                            checkedValue = '';
                            if (value1['hasPermission'] == 'yes') {
                                checkedValue = 'checked';
                            }
                            dataFormat += '<div class="d-flex pt-3 form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">';
                            dataFormat += '<input class="form-check-input inputCheckbox checkSingle" data-menu="' + value1['id'] + '" type="checkbox" id="inlineCheckbox1'+sl+'" ' + checkedValue + ' name="menu_id[]" value="' + value1['id'] + '">';
                            dataFormat += '<label class="form-check-label" for="inlineCheckbox1'+sl+'">'+ value1['name'] + '</label>';
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
                                    dataFormat += '<div style="'+subMenuCss+'" class="">';
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