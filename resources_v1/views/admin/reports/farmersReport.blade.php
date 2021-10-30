@extends('admin.master')
@section('content')
@section('title','Farmers Report')
<style>
	.saccoName{
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
        $("#farmersReport").validate();
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
								{{ Form::open(array('route' => 'reports.loansReport','id'=>'loansReport')) }}
								<div class="col-md-1"></div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="exampleInput" class="label-medium">Farmer<span
												class="validateRq">*</span></label>
										<select name="sacco_id" class="form-control location_id  select2"
											onchange="getData(1)" required>
											<option value="">--- Select Group ---</option>
											@foreach($farmersList as $value)
											<option value="{{$value->user_id}}" @if($value->user_id ==
												old('user_id')) {{"selected"}} @endif>{{$value->user_name}}
											</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<label class="control-label label-medium" for="email">From Date<span class="validateRq">*</span></label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input type="text" class="form-control dateField required" readonly placeholder="Select Date"  name="from_date" value="@if(isset($from_date)) {{$from_date}}@else {{ dateConvertDBtoForm(date('Y-01-01')) }} @endif">
									</div>
								</div>

								<div class="col-md-3">
									<label class="control-label label-medium" for="email">To Date<span class="validateRq">*</span></label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input type="text" class="form-control dateField required" readonly placeholder="Select Date"  name="to_date" value="@if(isset($to_date)) {{$to_date}}@else {{ dateConvertDBtoForm(date('Y-m-d')) }} @endif">
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
                        @if(!empty($data))
                            <div class="table-responsive">
                                <table id="" class="table table-bordered">
                                    <thead class="tr_header">
                                    <tr>
                                        <th style="width:100px;">S/L</th>
                                        <th>Sacco Name</th>
										<th>Loan Fund Cash</th>
										<th>Loan Fund Bank</th>
										<th>Value of outstanding Loan</th>
										<th>Loan Purpose</th>
										{{-- <th>County</th> --}}

                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($data) > 0)
                                            {{$sl=null}}
                                            @foreach($data as $value)
                                            <tr>
                                                <td>{{++$sl}}</td>
												<td>{{$value->sacco_name}}</td>
												<td>{{$value->loan_fund_cash}}</td>
												<td>{{$value->loan_fund_bank}}</td>
												<td>{{$value->value_of_loan_outstanding}}</td> 
												<td>{{$value->loan_purpose}} </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="8">No data have found !</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        @endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
