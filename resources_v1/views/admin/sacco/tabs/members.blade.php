<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <i class="mdi mdi-table fa-fw"></i> Group Members
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="btn btn-success pull-right waves-effect waves-light" data-toggle="modal"
                            data-target="#responsive-modal-bulk"><i class="fa fa-plus-circle"
                                aria-hidden="true"></i> Add Members</button>
                    </div>
                </div>
            </div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"
                            aria-label="Close"><span aria-hidden="true">×</span></button>
                        @foreach($errors->all() as $error)
                        <strong>{!! $error !!}</strong><br>
                        @endforeach
                    </div>
                    @endif
                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert"
                            aria-hidden="true">×</button>
                        <i
                            class="cr-icon glyphicon glyphicon-ok"></i>&nbsp;<strong>{{ session()->get('success') }}</strong>
                    </div>
                    @endif
                    @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert"
                            aria-hidden="true">×</button>
                        <i
                            class="glyphicon glyphicon-remove"></i>&nbsp;<strong>{{ session()->get('error') }}</strong>
                    </div>
                    @endif
                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i
                            class="cr-icon glyphicon glyphicon-ok"></i>&nbsp;<strong>{{ session()->get('success') }}</strong>
                    </div>
                    @endif
                    @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i
                            class="glyphicon glyphicon-remove"></i>&nbsp;<strong>{{ session()->get('error') }}</strong>
                    </div>
                    @endif
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-3">Name: <span style="font-weight:bold">{{ $sacco->sacco_name }}</span>
                        </div>
                        <div class="col-md-3">Description: <span
                                style="font-weight:bold">{{ $sacco->description}}</span></div>
                                
                        <div class="col-md-3">Active Members: <span style="font-weight:bold"> {{ $active_members }} </span></div>
                        <div class="col-md-3">Pending Activation: <span style="font-weight:bold">{{ $pending_members }}</span></div>
                    </div>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered">
                            <thead>
                                <tr class="tr_header">
                                    <th>S/L</th>
                                    <th>Member No.</th>
                                    <th>Name</th>
                                    <th>ID No</th>
                                    <th>Location</th>
                                    {{-- <th>Status</th> --}}
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {!! $sl=null !!}
                                @foreach($sacco_members AS $value)
                                <tr class="{!! $value->sacco_id !!}">
                                    <td style="width: 300px;">{!! ++$sl !!}</td>
                                    <td>{!! $value->member_number !!}</td>
                                    <td>{!! $value->member_name !!}</td>
                                    <td>{!! $value->member_id_no !!}</td>
                                    <td>{!! $value->region->region_name !!}</td>{{-- 
                                    <td>{!!$value->user->status!!}</td> --}}
                                    <td style="width: 100px;">
                                        <a href="{!! route('sacco.edit_members',$value->sacco_members_id) !!}" title="Edit"
                                            class="btn btn-success btn-xs btnColor" data-toggle="modal"
                                            data-target="#responsive-modal-bulk">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <a href="{!!route('sacco.delete_members',$value->sacco_members_id )!!}" title="Delete"
                                            data-token="{!! csrf_token() !!}" data-id="{!! $value->sacco_members_id!!}"
                                            class="delete btn btn-danger btn-xs deleteBtn btnColor"><i
                                                class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="responsive-modal-bulk" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title"><b>Add Members to {{ $sacco->sacco_name}} <span
                            class="monthAndYearName"></span></b></h5>
            </div>
            @if(isset($editModeData))
            {{ Form::model($editModeData, array('route' => array('sacco.update_members', $editModeData->sacco_members_id), 'method' => 'PUT','files' => 'true','class' => 'form-horizontal')) }}
            @else
            {{ Form::open(array('route' => 'sacco.add_members','enctype'=>'multipart/form-data')) }}
            @endif
            <div class="modal-body">
            <input type="hidden" name="sacco_id" value="{{ $sacco->sacco_id }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInput" class="label-medium">Member No</label>
                            {!! Form::text('member_number',Input::old('member_number'), $attributes
                            = array('class'=>'form-control required
                            member_number','id'=>'member_number','placeholder'=>'Enter member number')) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="recipient-name" class="label-medium">Member Name</label>
                            {!! Form::text('member_name',Input::old('member_name'), $attributes
                            = array('class'=>'form-control required
                            member_name','id'=>'member_name','placeholder'=>'Enter member name')) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInput" class="label-medium">ID Number</label>
                            {!! Form::text('member_id_no',Input::old('member_id_no'), $attributes
                            = array('class'=>'form-control required
                            member_id_no','id'=>'member_id_no','placeholder'=>'Enter member ID number')) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="recipient-name" class="label-medium">Region</label>
                            <select class="form-control payment_method" name="region_id">
                                <option value="">--- Select Region ---</option>
                                @foreach($regions as $value)
                                <option value="{{$value->region_id}}" @if($value->region_id ==
                                    old('region_id')) {{"selected"}} @endif>{{$value->region_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-bottom: 20px">
                        <b>You can also add bulk members by uploading members csv file</b>
                    </div>
                    <div class="col-md-6" style="padding-top: 30px">
                        <a href="{!! route('sacco.download', 'sample_sacco_members_csv') !!}">Download sample CSV
                            file</a>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInput" class="label-medium">Members file</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="	fa fa-picture-o"></i></span>
                            <input class="form-control photo" id="members_list" accept=".csv"
                                onchange='triggerValidation(this)' name="members_list" type="file">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect"
                    data-dismiss="modal"><b>Close</b></button>
                @if(isset($editModeData))
                <button type="submit" class="btn btn-success btn_style waves-effect waves-light"><i class="fa fa-pencil"></i> <b>Update</b></button>
                @else
                <button type="submit" class="btn btn-success btn_style waves-effect waves-light"> <b>Save</b></button>
                @endif
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>