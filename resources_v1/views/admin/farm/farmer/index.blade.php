@extends('admin.master')
@section('content')
@section('title','Farmers List')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<i class="mdi mdi-table fa-fw"></i> @yield('title')
						</div>
						{{-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<a href="{{ route('county.create') }}"
								class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">
								<i class="fa fa-plus-circle" aria-hidden="true"></i> Add Farmer</a>
						</div> --}}
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
										<th>Email</th>
										<th>Phone No</th>
										<th>ID No</th>
										{{-- <th>Status</th> --}}
										{{-- <th style="text-align: center;">Action</th> --}}
									</tr>
								</thead>
								<tbody>
									{!! $sl=null !!}
									@foreach($results AS $value)
									<tr class="{!! $value->county_id !!}">
										<td style="width: 50px;">{!! ++$sl !!}</td>
										<td>{!! $value->first_name !!}</td>
										<td>{!! $value->last_name !!}</td>
										<td>{!! $value->email !!}</td>
										<td>{!! $value->phone_no !!}</td>
										<td>{!! $value->id_no !!}</td>
										{{-- <td style="width: 100px;">
											<a href="{!! route('county.edit',$value->county_id) !!}"
												class="btn btn-success btn-xs btnColor">
												<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
											</a>
											<a href="{!!route('county.delete',$value->county_id )!!}"
												data-token="{!! csrf_token() !!}" data-id="{!! $value->county_id!!}"
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
</div>
@endsection