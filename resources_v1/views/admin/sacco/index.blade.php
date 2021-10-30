@extends('admin.master')
@section('content')
@section('title', 'Group List')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                <i class="mdi mdi-table fa-fw"></i> @yield('title')
                            </div>
                            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                                <a href="{{ route('sacco.create') }}"
                                    class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Group</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i
                                        class="cr-icon glyphicon glyphicon-ok"></i>&nbsp;<strong>{{ session()->get('success') }}</strong>
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i
                                        class="glyphicon glyphicon-remove"></i>&nbsp;<strong>{{ session()->get('error') }}</strong>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="myTable" class="table table-bordered">
                                    <thead>
                                        <tr class="tr_header">
                                            <th>S/L</th>
                                            <th>Group</th>
                                            <th>Description</th>
                                            <th>County</th>
                                            <th>Sub County</th>
                                            <th>Ward</th>
                                            <th>No of male members</th>
                                            <th>No of female members</th>{{--
                                            <th>Current savings</th>
                                            <th>Start saving date</th>
                                            <th>Cirle number</th>
                                            <th>Share value</th>
                                            <th>Total Shares</th>
                                            <th>Next Meeting date</th>
                                            <th>Loan fund cash</th>
                                            <th>Loan Fund Bank</th>
                                            <th>Constitution</th> --}}
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {!! $sl = null !!}
                                        @foreach ($results as $value)
                                            <tr class="{!!  $value->sacco_id !!}">
                                                <td>{!! ++$sl !!}</td>
                                                <td>{!! $value->sacco_name !!}</td>
                                                <td>{!! $value->description !!}</td>
                                                <td>{!! $value->county->county_name !!}</td>
                                                <td>{!! $value->sub_county->sub_county_name !!}</td>
                                                <td>{!! $value->ward->ward_name !!}</td>
                                                <td>{!! $value->male_members !!}</td>
                                                <td>{!! $value->female_members !!}</td>{{--
                                                <td>{!! $value->currently_saving !!}</td>
                                                <td>{!! $value->date_started_saving !!}</td>
                                                <td>{!! $value->circle_number !!}</td>
                                                <td>{!! $value->share_value !!}</td>
                                                <td>{!! $value->total_shares !!}</td>
                                                <td>{!! $value->next_meeting_date !!}</td>
                                                <td>{!! $value->loan_fund_cash !!}</td>
                                                <td>{!! $value->loan_fund_bank !!}</td>
                                                <td>{!! $value->constitution !!}</td> --}}
                                                {{-- <td>{!! $value->description !!}</td>
                                                <td>{!! $value->description !!}</td>
                                                <td>{!! $value->description !!}</td>
                                                <td>{!! $value->description !!}</td>
                                                <td>{!! $value->description !!}</td>
                                                <td>{!! $value->description !!}</td>
                                                <td>{!! $value->description !!}</td>
                                                <td>{!! $value->description !!}</td>
                                                <td>{!! $value->description !!}</td>
                                                <td>{!! $value->description !!}</td>
                                                <td>{!! $value->description !!}</td>
                                                <td>{!! $value->description !!}</td>
                                                <td>{!! $value->description !!}</td>
                                                <td>{!! $value->description !!}</td>
                                                <td>{!! $value->description !!}</td>
                                                <td>{!! $value->description !!}</td>
                                                <td>{!! $value->description !!}</td> --}}
                                                <td style="width: 100px;">
                                                    <a title="View Details"
                                                        href="{!!  route('sacco.show', $value->sacco_id) !!}"
                                                        class="btn btn-primary btn-xs btnColor">
                                                        <i class="glyphicon glyphicon-th-large" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="{!!  route('sacco.edit', $value->sacco_id) !!}" title="Edit"
                                                        class="btn btn-success btn-xs btnColor">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="{!!  route('sacco.delete', $value->sacco_id) !!}"
                                                        title="Delete" data-token="{!!  csrf_token() !!}"
                                                        data-id="{!!  $value->sacco_id !!}"
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
    </div>
@endsection
