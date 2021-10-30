@extends('admin.master')
@section('content')
@section('title','Loans Report')
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
        $("#loansReport").validate();
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
										<label for="exampleInput" class="label-medium">Group<span
												class="validateRq">*</span></label>
										<select name="sacco_id" class="form-control location_id  select2"
											onchange="getData(1)" required>
											<option value="">--- Select Group ---</option>
											@foreach($groupList as $value)
											<option value="{{$value->sacco_id}}" @if($value->sacco_id ==
												old('sacco_id')) {{"selected"}} @endif>{{$value->sacco_name}}
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
						@if(count($results) > 0)
						<h4 class="text-right">
							@if(isset($from_date))
							<a class="btn btn-success" style="color: #fff"
								href="{{ URL('downloadLoansReport/?sacco_id='.$sacco_id.'&from_date='.$from_date.'&to_date='.$to_date)}}"><i
									class="fa fa-download fa-lg" aria-hidden="true"></i> Download PDF</a>
									@else
									<a class="btn btn-success" style="color: #fff"
								href="{{ URL('downloadLoansReport/?sacco_id='.$sacco_id.'&from_date='.dateConvertDBtoForm(date('Y-01-01')) .'&to_date='.dateConvertDBtoForm(date('Y-m-d')))}}"><i
									class="fa fa-download fa-lg" aria-hidden="true"></i> Download PDF</a>
									@endif
						</h4>
						@endif
                        @if(!empty($results))
                            <div class="table-responsive">
                                <table id="" class="table table-bordered">
                                    <thead class="tr_header">
                                    <tr>
                                        <th>Sacco Name</th>
										<th>Loan Fund Cash</th>
										<th>Loan Fund Bank</th>
										<th>Value of outstanding Loan</th>
										<th>Loan Purpose</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($results) > 0)
                                            {{$sl=null}}
                                            @foreach($results as $value)
                                            <tr>
                                                
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
