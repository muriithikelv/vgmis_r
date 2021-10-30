@extends('admin.master')
@section('content')
@if(isset($editModeData))
@section('title','Edit Vendor')
@else
@section('title','Add Vendor')
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
							<a href="{{route('vendors.index')}}"
								class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i
									class="fa fa-list-ul" aria-hidden="true"></i> View Vendor</a>
						</div>
					</div>
				</div>
				<div class="panel-wrapper collapse in" aria-expanded="true">
					<div class="panel-body">
						@if(isset($editModeData))
						{{ Form::model($editModeData, array('route' => array('vendors.update', $editModeData->vendor_id), 'method' => 'PUT','files' => 'true','class' => 'form-horizontal')) }}
						@else
						{{ Form::open(array('route' => 'vendors.store','enctype'=>'multipart/form-data','class'=>'form-horizontal')) }}
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
								<div class="col-md-3">
									<div class="form-group">
										<label class="label-medium">Vendor Name<span
												class="validateRq">*</span></label>
										
											{!! Form::text('name',Input::old('name'), $attributes
											= array('class'=>'form-control required
											name','id'=>'_name','placeholder'=>'Enter Vendor
											name')) !!}
									</div>
								</div>
								<div class="col-md-1"></div>

									<div class="col-md-3">
										<div class="form-group">
											<label class="label-medium">Owner<span class="validateRq">*</span></label>
											{{ Form::select('user_id',$data, Input::old('user_id'), array('class' => 'form-control user_id select2','required'=>'required','data-style'=>'btn-info btn-outline')) }}
										</div>
									</div>
									<div class="col-md-1"></div>

									<div class="col-md-3">
										<div class="form-group">
											<label class="label-medium">County<span
													class="validateRq">*</span></label>
											<select name="county_id" class="form-control county_id  select2"
												onchange="getData(1)" required>
												<option value="">--- Select County ---</option>
												@foreach($countys as $value)
												<option value="{{$value->county_id}}" @if($value->county_id ==
													old('county_id')) {{"selected"}} @endif>{{$value->county_name}}
												</option>
												@endforeach
											</select>
										</div>
									</div>
							</div>
							<div class="row">

									<div class="col-md-3">
										<div class="form-group">
											<label class="label-medium">Location<span
													class="validateRq">*</span></label>
											<select name="location_id" class="form-control location_id  select2"
												onchange="getData(1)" required>
												<option value="">--- Select Location---</option>
												@foreach($location as $value)
												<option value="{{$value->county_id}}" @if($value->location_id ==
													old('location_id')) {{"selected"}} @endif>{{$value->location_name}}
												</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-1"></div>

									<div class="col-md-3">
										<div class="form-group">
											<label class="label-medium">Region<span
													class="validateRq">*</span></label>
											<select name="region_id" class="form-control region_id  select2"
												onchange="getData(1)" required>
												<option value="">--- Select Region---</option>
												@foreach($region as $value)
												<option value="{{$value->region_id}}" @if($value->region_id ==
													old('region_id')) {{"selected"}} @endif>{{$value->region_name}}
												</option>
												@endforeach
											</select>
										</div>
									</div>
									
							</div>
							<div class="form-actions">
								<div class="row">
									<div class="col-md-8">
										<div class="row">
											<div class="col-md-offset-4 col-md-8">
												@if(isset($editModeData))
												<button type="submit" class="btn btn-success btn_style"><i
														class="fa fa-pencil"></i> Update</button>
												@else
												<button type="submit" class="btn btn-success btn_style"><i
														class="fa fa-check"></i> Save</button>
												@endif
											</div>
										</div>
									</div>
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