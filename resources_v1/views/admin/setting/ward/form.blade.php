@extends('admin.master')
@section('content')
@if(isset($editModeData))
@section('title','Edit Ward')
@else
@section('title','Add Ward')
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
							<a href="{{route('ward.index')}}"
								class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i
									class="fa fa-list-ul" aria-hidden="true"></i> View Wards</a>
						</div>
					</div>
				</div>
				<div class="panel-wrapper collapse in" aria-expanded="true">
					<div class="panel-body">
						@if(isset($editModeData))
						{{ Form::model($editModeData, array('route' => array('ward.update', $editModeData->ward_id), 'method' => 'PUT','files' => 'true','class' => 'form-horizontal')) }}
						@else
						{{ Form::open(array('route' => 'ward.store','enctype'=>'multipart/form-data','class'=>'form-horizontal')) }}
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
										<label for="exampleInput" class="label-medium">Sub County<span
												class="validateRq">*</span></label>
										<select name="sub_county_id" class="form-control sub_county_id  select2"
											onchange="getData(1)" required>
											<option value="">--- Select Sub County ---</option>
											@foreach($subcountyList as $value)
											<option value="{{$value->sub_county_id}}" @if($value->sub_county_id ==
												old('sub_county_id')) {{"selected"}} @endif>{{$value->sub_county_name}}
											</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-1"></div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="label-medium">Ward Name<span
												class="validateRq">*</span></label>
											{!! Form::text('ward_name',Input::old('ward_name'), $attributes
											= array('class'=>'form-control required
											ward_name','id'=>'ward_name','placeholder'=>'Enter Ward
											name')) !!}
									</div>
								</div>
							</div>
							<div class="form-actions">
								<div class="row">
											<div class="col-md-8">
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
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection