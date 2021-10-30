@extends('admin.master')
@section('content')
@section('title','Group Details ')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!-- Nav tabs -->
            <div class="card">
                <ul class="nav nav-tabs" role="tablist">
                
                   <li role="presentation" class="{!! $state['details'] !!}"><a href="#details" aria-controls="details" role="tab" data-toggle="tab"><i
                                class="fa fa-info-circle"></i>  <span>Group Details</span></a></li>
                    <li role="presentation" class="{!! $state['members'] !!}"><a href="#members" aria-controls="members" role="tab"
                            data-toggle="tab"><i class="fa fa-home"></i>  <span>Group Members</span></a></li>
                    <li role="presentation" class="{!! $state['collections'] !!}"><a href="#collections" aria-controls="collections" role="tab"
                            data-toggle="tab"><i class="fa fa-user"></i>  <span>Member Record</span></a></li>
                    <li role="presentation" class="{!! $state['editors'] !!}"><a href="#editors" aria-controls="editors" role="tab" data-toggle="tab"><i
                                class="fa fa-envelope-o"></i>  <span>Group Admins</span></a></li>
                                <li role="presentation" class="{!! $state['coordinators'] !!}"><a href="#coordinators" aria-controls="coordinators" role="tab"
                                    data-toggle="tab"><i class="fa fa-user"></i>  <span>County Coordinators</span></a></li>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane {!! $state['details'] !!}" id="details">
                @include('admin.sacco.tabs.details')
            </div>
            <div role="tabpanel" class="tab-pane {!! $state['members'] !!}" id="members">
                @include('admin.sacco.tabs.members')
            </div>
            <div role="tabpanel" class="tab-pane {!! $state['collections'] !!}" id="collections">
                @include('admin.sacco.tabs.collections')
            </div>
            <div role="tabpanel" class="tab-pane {!! $state['editors'] !!}" id="editors">
                @include('admin.sacco.tabs.editors')
            </div>
            <div role="tabpanel" class="tab-pane {!! $state['coordinators'] !!}" id="coordinators">
                @include('admin.sacco.tabs.county_coordinators')
            </div>
        </div>
    </div>
</div>
<script>
    var regex = new RegExp("(.*?)\.(csv)$");

    function triggerValidation(el) {
    if (!(regex.test(el.value.toLowerCase()))) {
        el.value = '';
        alert('Please select correct file format');
     }
}
</script>
@endsection