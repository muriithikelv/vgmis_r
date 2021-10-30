<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <i class="mdi mdi-table fa-fw"></i>Members Records
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="btn btn-success pull-right waves-effect waves-light" data-toggle="modal"
                            data-target="#responsive-modal-collection"><i class="fa fa-plus-circle"
                                aria-hidden="true"></i> Add Record</button>
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
                        <i class="glyphicon glyphicon-remove"></i>&nbsp;<strong>{{ session()->get('error') }}</strong>
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
                                    <th>Member No.</th>
                                    <th>Date</th>
                                    <th>Reason</th>
                                    <th>Amount(KES)</th>
                                   {{--  <th style="text-align: center;">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                {!! $sl=null !!}
                                @foreach($collection AS $value)
                                <tr class="{!! $value->sacco_id !!}">
                                    <td {{-- style="width: 300px;" --}}>{!! ++$sl !!}</td>
                                    <td>{!! $value->user->first_name !!}</td>
                                    <td>{!! $value->user->last_name !!}</td>
                                    <td>{!! $value->member_number !!}</td>
                                    <td>{!! $value->delivery_date !!}</td>
                                    <td>{!! $value->delivery_time !!}</td>
                                    <td>{!! $value->quantity !!}</td>
                                    {{-- <td style="width: 100px;">
                                        <a href="{!! route('sacco.edit',$value->sacco_id) !!}" title="Edit"
                                            class="btn btn-success btn-xs btnColor">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <a href="{!!route('sacco.delete',$value->sacco_id )!!}" title="Delete"
                                            data-token="{!! csrf_token() !!}" data-id="{!! $value->sacco_id!!}"
                                            class="delete btn btn-danger btn-xs deleteBtn btnColor"><i
                                                class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    </td> --}}
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
<div id="responsive-modal-collection" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title"><b>Add Member Record for {{ $sacco->sacco_name}} members<span
                            class="monthAndYearName"></span></b></h5>
            </div>
            {{ Form::open(array('route' => 'sacco.add_collection','enctype'=>'multipart/form-data')) }}
            <div class="modal-body">
                <input type="hidden" name="sacco_id" value="{{ $sacco->sacco_id }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="recipient-name" class="label-medium">Member</label>
                            <select class="form-control payment_method" name="member_number">
                                <option value="">--- Select Member ---</option>
                                @foreach($sacco_members as $value)
                                <option value="{{$value->member_number}}" @if($value->member_number ==
                                    old('member_number')) {{"selected"}} @endif>{{$value->member_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInput" class="label-medium">Date</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input class="form-control delivery_date dateField" readonly required id="delivery_date"
                                placeholder="Enter date" name="delivery_date" type="text"
                                value="{{ old('delivery_date') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="recipient-name" class="label-medium">Record Type</label>
                            <select class="form-control delivery_time" name="delivery_time">
                                <option value="">--- Select Member ---</option>
                                <option value="Loans">Loans</option>
                                <option value="Savings">Savings</option>
                                <option value="Interest">Interest</option>
                                <option value="Shares">Shares</option>
                                <option value="Penalties">Penalties</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="recipient-name" class="label-medium">Amount</label>
                            {!! Form::text('quantity',Input::old('quantity'), $attributes
                            = array('class'=>'form-control required
                            quantity','id'=>'quantity','placeholder'=>'Enter Amount (KES)')) !!}
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-12" style="margin-bottom: 20px">
                        <b>You can also add bulk milk collection by uploading milk collection csv file</b>
                    </div>
                    <div class="col-md-6" style="padding-top: 30px">
                        <a href="{!! route('sacco.download', 'sample_milk_collections_csv') !!}">Download sample CSV
                            file</a>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInput" class="label-medium">Collection file</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-excel-o"></i></span>
                            <input class="form-control photo" id="collection_file" accept=".csv"
                                onchange='triggerValidation(this)' name="collection_file" type="file">
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><b>Close</b></button>
                <button type="submit" class="btn btn-success btn_style waves-effect waves-light"> <b>Save</b></button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>