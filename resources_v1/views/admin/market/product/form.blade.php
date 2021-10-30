@extends('admin.master')
@section('content')
@if(isset($editModeData))
@section('title','Edit Product')
@else
@section('title','Add Product')
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
							<a href="{{route('product.index')}}"
								class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i
									class="fa fa-list-ul" aria-hidden="true"></i> View Product</a>
						</div>
					</div>
				</div>
				<div class="panel-wrapper collapse in" aria-expanded="true">
					<div class="panel-body">
						@if(isset($editModeData))
						{{ Form::model($editModeData, array('route' => array('product.update', $editModeData->product_id), 'method' => 'PUT','files' => 'true','class' => 'form-horizontal')) }}
						@else
						{{ Form::open(array('route' => 'product.store','enctype'=>'multipart/form-data','class'=>'form-horizontal')) }}
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
										<label for="exampleInput" class="label-medium">Owner<span class="validateRq">*</span></label>
										{{ Form::select('user_id',$data, Input::old('user_id'), array('class' => 'form-control user_id select2', 'required'=>'required','data-style'=>'btn-info btn-outline')) }}
									
									</div>
								</div>
								<div class="col-md-1"></div>

								<div class="col-md-3">
									<div class="form-group">
										<label class="label-medium">Vendor<span
												class="validateRq">*</span></label>
												
										<select name="vendor_id" class="form-control vendor_id  select2"
											onchange="getData(1)" required>
											<option value="">--- Select Vendor ---</option>
											@foreach($vendors as $value)
											<option value="{{$value->vendor_id}}" @if($value->vendor_id ==
												old('vendor_id')) {{"selected"}} @endif>{{$value->name}}
											</option>
											@endforeach
										</select>
									
									</div>
								</div>
								<div class="col-md-1"></div>

								<div class="col-md-3">
									<div class="form-group">
										<label class="label-medium">Categoty<span
												class="validateRq">*</span></label>
										<select name="category_id" class="form-control category_id  select2"
											onchange="getData(1)" required>
											<option value="">--- Select Category ---</option>
											@foreach($categorys as $value)
											<option value="{{$value->category_id}}" @if($value->category_id ==
												old('category_id')) {{"selected"}} @endif>{{$value->category_name}}
											</option>
											@endforeach
										</select>
									</div>
								</div>
								
							
								<div class="col-md-3">
									<div class="form-group">
										<label class="label-medium">Product Name<span
												class="validateRq">*</span></label>
										
											{!! Form::text('name',Input::old('name'), $attributes
											= array('class'=>'form-control required
											name','id'=>'name','placeholder'=>'Enter Product
											name')) !!}
										</div>
								</div>
								<div class="col-md-1"></div>

								<div class="col-md-3">
									<div class="form-group">
										<label class="label-medium">Product Description<span
												class="validateRq">*</span></label>
										
											{!! Form::text('description',Input::old('description'), $attributes
											= array('class'=>'form-control required
											description','id'=>'description','placeholder'=>'Enter description
											')) !!}
										</div>
									</div>
									<div class="col-md-1"></div>

								<div class="col-md-3">
									<div class="form-group">
										<label class="label-medium">Price<span
												class="validateRq">*</span></label>
											{!! Form::text('price',Input::old('price'), $attributes
											= array('class'=>'form-control required
											price','id'=>'price','placeholder'=>'Enter Product
											price')) !!}
									</div>
								</div>
								<div class="col-md-1"></div>

								<div class="col-md-3">
									<div class="form-group">
										<label class="label-medium">Delivery Cost<span
												class="validateRq">*</span></label>
											{!! Form::text('delivery_cost',Input::old('delivery_cost'), $attributes
											= array('class'=>'form-control required
											delivery_cost','id'=>'delivery_cost','placeholder'=>'Enter Product delivery
											cost')) !!}
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