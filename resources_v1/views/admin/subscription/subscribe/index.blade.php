@extends('admin.master')
@section('content')
@section('title','Subscriptions List')
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
							<a href="{{ route('subscription.create') }}"
								class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">
								<i class="fa fa-plus-circle" aria-hidden="true"></i> Add Subscription</a>
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
						<div class="table-responsive">
							<table id="myTable" class="table table-bordered">
								<thead>
									<tr class="tr_header">
										<th>S/L</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Phone No</th>
										<th>Amount</th>
										<th>Code</th>
										<th>Start Date</th>
										<th>End Date</th>
										<th>Status</th>
										<th style="text-align: center;">Action</th>
									</tr>
								</thead>
								<tbody>
									{!! $sl=null !!}
									@foreach($results AS $value)
									<tr class="{!! $value->county_id !!}">
										<td style="width: 30px;">{!! ++$sl !!}</td>
										<td>{!! $value->user->first_name !!}</td>
										<td>{!! $value->user->last_name !!}</td>
										<td>{!! $value->phone_no !!}</td>
										<td>{!! $value->amount !!}</td>
										<td>{!! $value->transaction_code !!}</td>
										<td>{!! $value->start_date !!}</td>
										<td>{!! $value->end_date !!}</td>
										<td style="width: 120px;">
											<span
												class="label label-{{ $value->status==0 ? 'warning' : 'success' }}">{{ $value->status==0 ? 'Inactive' : 'Active' }}</span>
											@if($value->status==0)
											<a href="{!!route('subscription.activate',$value->subscription_id )!!}"
												data-token="{!! csrf_token() !!}"
												data-id="{!! $value->subscription_id!!}"
												class="approve btn btn-success btn-xs deleteBtn btnColor"><i
													class="fa fa-check" aria-hidden="true" title="Approve"></i></a>
											@else
											<a href="{!!route('subscription.deactivate',$value->subscription_id )!!}"
												data-token="{!! csrf_token() !!}" data-id="{!! $value->subscription_id!!}"
												class="deactivate btn btn-danger btn-xs deleteBtn btnColor"><i
													class="fa fa-times" aria-hidden="true" title="Revoke"></i></a>
											@endif
										</td>
										<td style="width: 100px;">
											<a href="{!! route('subscription.edit',$value->subscription_id) !!}"
												class="btn btn-success btn-xs btnColor">
												<i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit"></i>
											</a>
											<a href="{!!route('subscription.delete',$value->subscription_id )!!}"
												data-token="{!! csrf_token() !!}"
												data-id="{!! $value->subscription_id!!}"
												class="delete btn btn-danger btn-xs deleteBtn btnColor"><i
													class="fa fa-trash-o" aria-hidden="true" title="Delete"></i></a>
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
@section('page_scripts')
<script>
	$(document).on('click', '.approve', function () {
        var actionTo = $(this).attr('href');
        var token = $(this).attr('data-token');
        var id = $(this).attr('data-id');
        swal({
                title: "Are you sure?",
                text: "The user associated with this subscription will be able to access restricted services",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#7ace4c",
                confirmButtonText: "Yes, Approve it!",
                closeOnConfirm: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: actionTo,
                        type: 'post',
                        data: {_method: 'post', _token: token},
                        success: function (data) {
                            console.log(data)
                           if (data == 'success') {
                                swal({
                                        title: "Approved!",
                                        text: "Subscription approved successfully!",
                                        type: "success"
                                    },
                                    function (isConfirm) {
                                        if (isConfirm) {
                                            $('.' + id).fadeOut();
											location.reload();
                                        }
                                    });
                            } else {
                                swal({
                                    title: "Error!",
                                    text: "Something went wrong !, Please try again.",
                                    type: "error"
                                });
                            }
                        }

                    });
                } else {
                    swal("Cancelled", "Subscribption is still inactive .", "error");
                }
            });
        return false;
    });

	$(document).on('click', '.deactivate', function () {
        var actionTo = $(this).attr('href');
        var token = $(this).attr('data-token');
        var id = $(this).attr('data-id');
        swal({
                title: "Are you sure?",
                text: "The user associated with this subscription will not be able to access restricted services",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, revoke it!",
                closeOnConfirm: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: actionTo,
                        type: 'post',
                        data: {_method: 'post', _token: token},
                        success: function (data) {
                            console.log(data)
                         if (data == 'success') {
                                swal({
                                        title: "Revoked!",
                                        text: "Subscription revoked successfully!",
                                        type: "success"
                                    },
                                    function (isConfirm) {
                                        if (isConfirm) {
                                            $('.' + id).fadeOut();
											location.reload();
                                        }
                                    });
                            } else {
                                swal({
                                    title: "Error!",
                                    text: "Something went wrong!, Please try again.",
                                    type: "error"
                                });
                            }
                        }

                    });
                } else {
                    swal("Cancelled", "Subscription is still active .", "error");
                }
            });
        return false;
    });
</script>
@endsection