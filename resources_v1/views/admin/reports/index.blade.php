@extends('admin.master')
@section('content')
@section('title','Reports')
<style>
	.groupName{
		position: relative;
	}
	#sacco_id-error{
		position: absolute;
		top: 66px;
		left: 0;
		width: 100%he;
		width: 100%;
		height: 100%;
	}

</style>
<script>
    jQuery(function (){
        $("#groupReport").validate();
     });

</script>
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
						
					</div>
				</div>
			</div>
				<div class="panel-wrapper collapse in" aria-expanded="true">
					<div class="panel-body">
						<div class="row">
							<div id="searchBox">
								{{ Form::open(array('route' => 'reports.index','id'=>'index')) }}
								<div class="col-md-1"></div>
								<div class="col-md-3">
									
									<?php 
									$sacco_name = "";
								?>
								<div class="form-group employeeName">
									<label class="control-label label-medium" for="email">Group<span
											class="validateRq">*</span></label>
									<select class="form-control sacco_id select2 required" required
										name="sacco_id">
										<option value="">---- Please select ----</option>

										@foreach($groupList as $value)
										
										@if($value->sacco_id == $sacco_id)
										<?php
										$sacco_name = $value->sacco_name;
										?>
										@endif
										<option value="{{$value->sacco_id}}" @if($value->sacco_id ==
											$sacco_id) {{"selected"}} @endif>{{$value->sacco_name}}
											{{$value->sacco_name}}</option>
										@endforeach
									</select>
								</div>
								</div>
								<div class="col-md-3">
									<label class="control-label label-medium" for="email">From Date<span
											class="validateRq">*</span></label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input type="text" class="form-control dateField required" readonly
											placeholder="Select Date" name="from_date"
											value="@if(isset($from_date)) {{$from_date}}@else {{ dateConvertDBtoForm(date('Y-01-01')) }} @endif">
									</div>
								</div>

								<div class="col-md-3">
									<label class="control-label label-medium" for="email">To Date<span
											class="validateRq">*</span></label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input type="text" class="form-control dateField required" readonly
											placeholder="Select Date" name="to_date"
											value="@if(isset($to_date)) {{$to_date}}@else {{ dateConvertDBtoForm(date('Y-m-d')) }} @endif">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<input type="submit" id="filter" style="margin-top: 25px; width: 100px;" class="btn btn-info " value="Filter">
									</div>
								</div>
								{{ Form::close() }}
							</div>
							</div>
						<hr>
						
						<div class="table-responsive">
							<table id="" class="table table-bordered">
								<thead class="tr_header">
									<tr>{{-- 
										<th style="width:50px;">S/L</th> --}}
										<th>Sacco Name</th>
										<th>Description</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>{{$value->sacco_name}}</td>
										<td>{{$value->description}}</td>
									</tr>
									
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