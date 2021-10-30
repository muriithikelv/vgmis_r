<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <i class="mdi mdi-table fa-fw"></i> Group Admins
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="btn btn-success pull-right waves-effect waves-light" data-toggle="modal"
                            data-target="#responsive-modal-editors"><i class="fa fa-plus-circle"
                                aria-hidden="true"></i> Add Admin</button>
                    </div>
                </div>
            </div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
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
                        <div class="col-md-4">Name: <span style="font-weight:bold">{{ $sacco->sacco_name}}</span>
                        </div>
                        <div class="col-md-4">Description: <span
                                style="font-weight:bold">{{ $sacco->description}}</span></div>
                        <div class="col-md-4">Member Count: <span style="font-weight:bold">0</span></div>
                    </div>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered">
                            <thead>
                                <tr class="tr_header">
                                    <th>S/L</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email <Address></Address></th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {!! $sl=null !!}
                                @foreach($sacco_editors AS $value)
                                <tr class="{!! $value->sacco_id !!}">
                                    <td style="width: 300px;">{!! ++$sl !!}</td>
                                    <td>{!! $value->user->first_name !!}</td>
                                    <td>{!! $value->user->last_name !!}</td>
                                    <td>{!! $value->user->email !!}</td>
                                    <td style="width: 100px;">
                                        <a href="{!!route('sacco.remove_editors',$value->sacco_editors_id )!!}" title="Remove"
                                            data-token="{!! csrf_token() !!}" data-id="{!! $value->sacco_editors_id!!}"
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
<div id="responsive-modal-editors" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title"><b>Add Admin to {{ $sacco->sacco_name}} <span
                            class="monthAndYearName"></span></b></h5>
            </div>
            {{ Form::open(array('route' => 'sacco.add_editor','enctype'=>'multipart/form-data')) }}
            <div class="modal-body">
                
            <input type="hidden" name="sacco_id" value="{{ $sacco->sacco_id }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="recipient-name" class="label-medium">Admin</label>
                            <select class="form-control user_id" name="user_id">
                                <option value="">--- Select Admin ---</option>
                                @foreach($editors as $value)
                                <option value="{{$value->user_id}}" @if($value->user_id ==
                                    old('user_id')) {{"selected"}} @endif>{{$value->first_name.' '.$value->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect"
                    data-dismiss="modal"><b>Close</b></button>
                <button type="submit" class="btn btn-success btn_style waves-effect waves-light"> <b>Save</b></button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>