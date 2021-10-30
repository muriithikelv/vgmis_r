@extends('admin.master')
@section('content')
@section('title','Audit Trail')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-info">
				<div class="panel-heading">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<i class="mdi mdi-table fa-fw"></i> @yield('title')
					</div>
				</div>
			</div>
				<div class="panel-wrapper collapse in" aria-expanded="true">
					<div class="panel-body">
						@if(session()->has('success'))
							<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<i class="cr-icon glyphicon glyphicon-ok"></i>&nbsp;<strong>{{ session()->get('success') }}</strong>
							</div>
						@endif
						@if(session()->has('error'))
							<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<i class="glyphicon glyphicon-remove"></i>&nbsp;<strong>{{ session()->get('error') }}</strong>
							</div>
						@endif
						<div class="table-responsive">
							<table id="myTable" class="table table-bordered">
								<thead class="tr_header">
									<tr>
										<th>S/L</th>
										<th>Name</th>
										<th>Action</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody>
									{!! $sl=null !!}
									@foreach($data AS $value)
										<tr class="{!! $value->user_id !!}">
											<td style="width: 100px;">{!! ++$sl !!}</td>
											<td>{!! $value->user_name !!}</td>
											<td >{!! $value->action !!}</td>
											<td>{!! $value->created_at !!}</td>
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
