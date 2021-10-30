@extends('admin.master')
@section('content')
@section('title','County Report')
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
        $("#countyReport").validate();
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
								{{ Form::open(array('route' => 'reports.countyReport','id'=>'countyReport')) }}
								<div class="col-md-1"></div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="exampleInput" class="label-medium">County<span
												class="validateRq">*</span></label>
										<select name="county_id" class="form-control location_id  select2"
											onchange="getData(1)" required>
											<option value="">--- Select County ---</option>
											@foreach($countyList as $value)
											<option value="{{$value->county_id}}" @if($value->county_id ==
												old('county_id')) {{"selected"}} @endif>{{$value->county_name}}
											</option>
											@endforeach
										</select>
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
							<a class="btn btn-success" style="color: #fff"
								href="{{ URL('downloadCountyReport/?county_id='.$county_id)}}"><i
									class="fa fa-download fa-lg" aria-hidden="true"></i> Download PDF</a>
						</h4>
						@endif
                        @if(!empty($results))
                            <div class="table-responsive">
                                <table id="" class="table table-bordered">
                                    <thead class="tr_header">
                                    <tr>
                                        <th style="width:100px;">S/L</th>
                                        <th>Sacco Name</th>
										<th>Description</th>
										<th>Number of male members</th>
										<th>Number of female members</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($results) > 0)
                                            {{$sl=null}}
                                            @foreach($results as $value)
                                            <tr>
                                                <td>{{++$sl}}</td>
												<td>{{$value->sacco_name}}</td>
												<td>{{$value->description}}</td>
												<td>{{$value->male_members}}</td>
												<td>{{$value->female_members}}</td>
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
