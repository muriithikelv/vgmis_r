@extends('admin.master')
@section('content')
@section('title','Location List')
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
							<a href="{{ route('location.create') }}"
								class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">
								<i class="fa fa-plus-circle" aria-hidden="true"></i> Add Location</a>
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
										<th>Name</th>
										<th>County</th>
										<th style="text-align: center;">Action</th>
									</tr>
								</thead>
								<tbody>
									{!! $sl=null !!}
									@foreach($results AS $value)
									<tr class="{!! $value->location_id !!}">
										<td style="width: 300px;">{!! ++$sl !!}</td>
										<td>{!! $value->location_name !!}</td>
										<td>{!! $value->county->county_name !!}</td>
										<td style="width: 100px;">
											<a href="{!! route('location.edit',$value->location_id) !!}"
												class="btn btn-success btn-xs btnColor">
												<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
											</a>
											<a href="{!!route('location.delete',$value->location_id )!!}"
												data-token="{!! csrf_token() !!}" data-id="{!! $value->location_id!!}"
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