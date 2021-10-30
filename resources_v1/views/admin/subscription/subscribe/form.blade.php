@extends('admin.master')
@section('content')
@if(isset($editModeData))
@section('title','Edit Subscription')
@else
@section('title','Add Subscription')
@endif

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<i class="mdi mdi-table fa-fw"></i> @yield('title')
						</div>
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<a href="{{route('subscription.index')}}"
								class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i
									class="fa fa-list-ul" aria-hidden="true"></i> View Subscription</a>
						</div>
					</div>
				</div>
				<div class="panel-wrapper collapse in" aria-expanded="true">
					<div class="panel-body">
						@if(isset($editModeData))
						{{ Form::model($editModeData, array('route' => array('subscription.update', $editModeData->subscription_id), 'method' => 'PUT','files' => 'true','class' => 'form-horizontal')) }}
						@else
						{{ Form::open(array('route' => 'subscription.store','enctype'=>'multipart/form-data','class'=>'form-horizontal')) }}
						@endif
						<div class="form-body">
							<div class="row">
								<div class="col-md-offset-2 col-md-6">
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
								</div>
							</div>
							<div class="row">
								<div class="col-md-4" style="padding: 0px 30px 0px 30px">
									<div class="form-group">
										<label class="control-label label-medium">Phone Number<span
												class="validateRq">*</span></label>
										{!! Form::text('phone_no',Input::old('phone_no'), $attributes
										= array('class'=>'form-control required
										phone_no','id'=>'phone_no','placeholder'=>'Enter phone number')) !!}
									</div>
									<input name="is_created_by" value="admin" hidden>
								</div>
								<div class="col-md-4" style="padding: 0px 30px 0px 30px">
									<div class="form-group">
										<label class="control-label label-medium">Amount<span
												class="validateRq">*</span></label>
										{!! Form::text('amount',Input::old('amount'), $attributes
										= array('class'=>'form-control required
										amount','id'=>'amount','placeholder'=>'Enter amount')) !!}
									</div>
								</div>
								<div class="col-md-4" style="padding: 0px 30px 0px 30px">
									<div class="form-group">
										<label class="control-label label-medium">Transaction Code<span
												class="validateRq">*</span></label>
										{!! Form::text('transaction_code',Input::old('transaction_code'), $attributes
										= array('class'=>'form-control required
										transaction_code','id'=>'transaction_code','placeholder'=>'Enter transaction
										code')) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label for="exampleInput" class="label-medium">Start Date<span
										class="validateRq">*</span></label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control start_date dateField" readonly required
											id="start_date" placeholder="Enter start date" name="start_date" type="text"
											value="{{ old('start_date') }}">
									</div>
								</div>
								<div class="col-md-4">
									<label for="exampleInput" class="label-medium">End Date<span
										class="validateRq">*</span></label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control end_date dateField" readonly required id="end_date"
											placeholder="Enter end date" name="end_date" type="text"
											value="{{ old('end_date') }}">
									</div>
								</div>
								<div class="col-md-4" style="padding-top: 20px">
									@if(isset($editModeData))
									<button type="submit" class="btn btn-success btn_style"><i class="fa fa-pencil"></i>
										Update</button>
									@else
									<button type="submit" class="btn btn-success btn_style"><i class="fa fa-check"></i>
										Save</button>
									@endif
								</div>
							</div>
						</div>
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection