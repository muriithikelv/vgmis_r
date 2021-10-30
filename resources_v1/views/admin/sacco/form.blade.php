@extends('admin.master')
@section('content')
@if(isset($editModeData))
@section('title','Edit Group')
@else
@section('title','Add Group')
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
							<a href="{{route('sacco.index')}}"
								class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i
									class="fa fa-list-ul" aria-hidden="true"></i> View Group</a>
						</div>
					</div>
				</div>
				<div class="panel-wrapper collapse in" aria-expanded="true">
					<div class="panel-body">
						@if(isset($editModeData))
						{{ Form::model($editModeData, array('route' => array('sacco.update', $editModeData->sacco_id), 'method' => 'PUT','files' => 'true','class' => 'form-horizontal')) }}
						@else
						{{ Form::open(array('route' => 'sacco.store','enctype'=>'multipart/form-data','class'=>'form-horizontal')) }}
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
										<label class="label-medium">Group Name<span class="validateRq">*</span></label>
										{!! Form::text('sacco_name',Input::old('sacco_name'), $attributes
										= array('class'=>'form-control required
										sacco_name','id'=>'sacco_name','placeholder'=>'Enter Group
										name')) !!}
									</div>
								</div>
								<div class="col-md-1"></div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="label-medium">Description<span class="validateRq">*</span></label>
										{!! Form::text('description',Input::old('description'), $attributes
										= array('class'=>'form-control required
										description','id'=>'description','placeholder'=>'Enter Group
										description')) !!}
									</div>
								</div>
								<div class="col-md-1"></div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="exampleInput" class="label-medium">County<span
											class="validateRq">*</span></label>
										<select name="county_id" class="form-control county_id  select2"
											onchange="getData(1)" required>
											<option value="">--- Select County ---</option>
											@foreach($counties as $value)
											<option value="{{$value->county_id}}" @if($value->county_id ==
												old('county_id')) {{"selected"}} @endif>{{$value->county_name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-1"></div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="exampleInput" class="label-medium">Sub County<span
											class="validateRq">*</span></label>
										<select name="sub_county_id" class="form-control sub_county_id  select2"
											onchange="getData(1)" required>
											<option value="">--- Select Sub County ---</option>
											@foreach($subcounties as $value)
											<option value="{{$value->sub_county_id}}" @if($value->sub_county_id ==
												old('sub_county_id')) {{"selected"}} @endif>{{$value->sub_county_name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-1"></div>
								
								<div class="col-md-3">
									<div class="form-group">
										<label for="exampleInput" class="label-medium">Ward<span
											class="validateRq">*</span></label>
										<select name="ward_id" class="form-control ward_id  select2"
											onchange="getData(1)" required>
											<option value="">--- Select Ward ---</option>
											@foreach($ward as $value)
											<option value="{{$value->ward_id}}" @if($value->ward_id ==
												old('ward_id')) {{"selected"}} @endif>{{$value->ward_name}}</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="col-md-1"></div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="label-medium">Number of Male members at formation? <span class="validateRq">*</span></label>
										{!! Form::text('male_members',Input::old('male_members'), $attributes
										= array('class'=>'form-control required
										male_members','id'=>'male_members','placeholder'=>'Enter Male
										members')) !!}
									</div>
								</div>
								</div>
								<div class="row">

									<div class="col-md-4">
										<div class="form-group">
											<label class="label-medium">Number of Female members at formation? <span class="validateRq">*</span></label>
											{!! Form::text('female_members',Input::old('female_members'), $attributes
											= array('class'=>'form-control required
											female_members','id'=>'female_members','placeholder'=>'Enter Female
											members')) !!}
										</div>
									</div>
								</div>
								
								<h2> Group Information</h2>
								<div class="row">
									<div class="col-md-3">
											<label for="exampleInput" class="label-medium">Are you currently saving<span
												class="validateRq">*</span></label>
												
											<select name="currently_saving" class="form-control currently_saving select2"
												 required>
												<option value="">--- Select currently saving ---</option>
												
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										
									</div>
									<div class="col-md-1"></div>
									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">Indicate date started saving<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
											{!! Form::date('date_started_saving',Input::old('date_started_saving'), $attributes = array('class'=>'form-control date_started_saving','placeholder'=>'Enter from date')) !!}
										</div>
									</div>
									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">Circle Number<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"></span>
											{!! Form::text('circle_number',Input::old('circle_number'), $attributes = array('class'=>'form-control circle_number','placeholder'=>'Circle Number')) !!}
										</div>
									</div>
								</div>
								<div class="row">
									
									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">Share Value<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"></span>
											{!! Form::text('share_value',Input::old('share_value'), $attributes = array('class'=>'form-control share_value','placeholder'=>'Share Value')) !!}
										</div>
									</div>

									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">Total Shares Bought in the meeting Value<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"></span>
											{!! Form::text('total_shares',Input::old('total_shares'), $attributes = array('class'=>'form-control total_shares','placeholder'=>'Total Shares')) !!}
										</div>
									</div>
									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">Next meeting date <span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
											{!! Form::date('next_meeting_date',Input::old('next_meeting_date'), $attributes = array('class'=>'form-control next_meeting_date','placeholder'=>'Enter Next meeting date')) !!}
										</div>
									</div>

								</div>
								<br/>
								<div class="row">
				
									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">Loan fund cash in the box at now<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"></span>
											{!! Form::text('loan_fund_cash',Input::old('loan_fund_cash'), $attributes = array('class'=>'form-control loan_fund_cash','placeholder'=>'Enter Loan fund cash in the box at now')) !!}
										</div>
									</div>

									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">Loan fund at bank at now<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"></span>
											{!! Form::text('loan_fund_bank',Input::old('loan_fund_bank'), $attributes = array('class'=>'form-control loan_fund_bank','placeholder'=>'Enter Loan fund bank at now')) !!}
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInput" class="label-medium">Does the group have a constitution ? <span
												class="validateRq">*</span></label>
											<select name="constitution" class="form-control constitution select2"
												 required>
												<option value="">--- Select option---</option>
												
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
									</div>
									
								</div>	
								<div class="row">
									
									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">Number of Registered Male members as per the constitution<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"></span>
											{!! Form::text('male_as_per_constitution',Input::old('male_as_per_constitution'), $attributes = array('class'=>'form-control male_as_per_constitution','placeholder'=>'Enter Number of Registered Male members as per the constitution')) !!}
										</div>
									</div>

									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">Number of Registered Female members as per the constitution<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"></span>
											{!! Form::text('female_as_per_constitution',Input::old('female_as_per_constitution'), $attributes = array('class'=>'form-control female_as_per_constitution','placeholder'=>'Enter Number of Registered Female members as per the constitution')) !!}
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInput" class="label-medium">Do you have properties owned by the group?  <span
												class="validateRq">*</span></label>
											<select name="property_owned" class="form-control currently_saving select2"
												 required>
												<option value="">--- Select option---</option>
												
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										       </div>
									       </div>
									
								</div>
								
								<div class="row">
                                      
									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">Name of the property<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"></span>
											{!! Form::text('name_of_the_property',Input::old('name_of_the_property'), $attributes = array('class'=>'form-control name_of_the_property','placeholder'=>'Enter Name of the property')) !!}
										</div>
									</div>

									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">Value of the property<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"></span>
											{!! Form::text('value_of_the_property',Input::old('value_of_the_property'), $attributes = array('class'=>'form-control value_of_the_property','placeholder'=>'Enter Value of the property')) !!}
										</div>
									</div>
									
								</div>
									<h2>Loans and savings</h2>
								<div class="row">

									
									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">Value of savings<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"></span>
											{!! Form::text('value_of_savings',Input::old('value_of_savings'), $attributes = array('class'=>'form-control value_of_savings','placeholder'=>'Enter Value of savings')) !!}
										</div>
									</div>
									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">Value of loans outstanding<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"></span>
											{!! Form::text('value_of_loan_outstanding',Input::old('value_of_loan_outstanding'), $attributes = array('class'=>'form-control value_of_loan_outstanding','placeholder'=>'Enter Value of loan outstanding')) !!}
										</div>
									</div>
									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">Purpose of the Loan<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"></span>
											{!! Form::text('loan_purpose',Input::old('loan_purpose'), $attributes = array('class'=>'form-control loan_purpose','placeholder'=>'Enter Loan purpose')) !!}
										</div>
									</div>
									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">Number of people with loans<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"></span>
											{!! Form::text('number_of_people_with_loans',Input::old('number_of_people_with_loans'), $attributes = array('class'=>'form-control number_of_people_with_loans','placeholder'=>'Enter Number of people with loans')) !!}
										</div>
									</div>
                                      <div class="col-md-4">
										<label for="exampleInput" class="label-medium">Loan fund / cash in box if any<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"></span>
											{!! Form::text('loan_fund',Input::old('loan_fund'), $attributes = array('class'=>'form-control loan_fund','placeholder'=>'Enter Loan fund ')) !!}
										</div>
									</div>
								</div>
                             <h2>Other assets and liabilities</h2>
								<div class="row">
									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">Bank balance if any<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"></span>
											{!! Form::text('bank_balance',Input::old('bank_balance'), $attributes = array('class'=>'form-control bank_balance','placeholder'=>'Enter bank balance')) !!}
										</div>
									</div>

									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">Social fund balance if any<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"></span>
											{!! Form::text('social_fund',Input::old('social_fund'), $attributes = array('class'=>'form-control social_fund','placeholder'=>'Enter Social fund ')) !!}
										</div>
									</div>
									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">Property now if any<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"></span>
											{!! Form::text('property_now',Input::old('property_now'), $attributes = array('class'=>'form-control property_now','placeholder'=>'Enter property now ')) !!}
										</div>
									</div>
									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">External debts if any<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"></span>
											{!! Form::text('external_debts',Input::old('external_debts'), $attributes = array('class'=>'form-control external_debts','placeholder'=>'Enter external debts')) !!}
										</div>
									</div>

									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">Grants provided<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"></span>
											{!! Form::text('grants_provided',Input::old('grants_provided'), $attributes = array('class'=>'form-control grants_provided','placeholder'=>'Enter Grants Provided ')) !!}
										</div>
									</div>
								</div>
								<h2>Key Members activities</h2>
								<div class="row">
									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">Type of farming<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"></span>
											{!! Form::text('type_of_farming',Input::old('type_of_farming'), $attributes = array('class'=>'form-control type_of_farming','placeholder'=>'Enter type of farming')) !!}
										</div>
									</div>

									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">Crops planted<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"></span>
											{!! Form::text('crops_planted',Input::old('crops_planted'), $attributes = array('class'=>'form-control crops_planted','placeholder'=>'Enter crops planted ')) !!}
										</div>
									</div>
									<div class="col-md-4">
										<label for="exampleInput" class="label-medium">Inputs provided<span class="validateRq">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"></span>
											{!! Form::text('inputs_provided',Input::old('inputs_provided'), $attributes = array('class'=>'form-control inputs_provided','placeholder'=>'Enter Inputs provided ')) !!}
										</div>
									</div>
								</div>
							<div class="row">
								<div class="col-md-4">
									<label for="exampleInput" class="label-medium">Size of land<span class="validateRq">*</span></label>
									<div class="input-group">
										<span class="input-group-addon"></span>
										{!! Form::text('size_of_land',Input::old('size_of_land'), $attributes = array('class'=>'form-control size_of_land','placeholder'=>'Enter size of land')) !!}
									</div>
								</div>

								<div class="col-md-4">
									<label for="exampleInput" class="label-medium">Past output bags<span class="validateRq">*</span></label>
									<div class="input-group">
										<span class="input-group-addon"></span>
										{!! Form::text('past_output_bags',Input::old('past_output_bags'), $attributes = array('class'=>'form-control past_output_bags','placeholder'=>'Enter past output bags ')) !!}
									</div>
								</div>
								<div class="col-md-4">
									<label for="exampleInput" class="label-medium">Sales in Ksh<span class="validateRq">*</span></label>
									<div class="input-group">
										<span class="input-group-addon"></span>
										{!! Form::text('sales',Input::old('sales'), $attributes = array('class'=>'form-control sales','placeholder'=>'Enter sales ')) !!}
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-4">
									<label for="exampleInput" class="label-medium">How much do you use to buy farm inputs?<span class="validateRq">*</span></label>
									<div class="input-group">
										<span class="input-group-addon"></span>
										{!! Form::text('farm_inputs_cost',Input::old('farm_inputs_cost'), $attributes = array('class'=>'form-control farm_inputs_cost','placeholder'=>'Enter Farm inputs cost')) !!}
									</div>
								</div>

								<div class="col-md-4">
									<label for="exampleInput" class="label-medium">How much reserve cash do you have for input?<span class="validateRq">*</span></label>
									<div class="input-group">
										<span class="input-group-addon"></span>
										{!! Form::text('reserve_cash',Input::old('reserve_cash'), $attributes = array('class'=>'form-control reserve_cash','placeholder'=>'Enter reserve cash for input ')) !!}
									</div>
								</div>
								<div class="col-md-4">
									<label for="exampleInput" class="label-medium">Do you have linkage to market?<span class="validateRq">*</span></label>
									<select name="linkage_to_market" class="form-control currently_saving select2"
												 required>
												<option value="">--- Select option---</option>
												
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										 </div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<label for="exampleInput" class="label-medium">How Much do you spend to access Market?<span class="validateRq">*</span></label>
												<div class="input-group">
													<span class="input-group-addon"></span>
													{!! Form::text('market_access_cost',Input::old('market_access_cost'), $attributes = array('class'=>'form-control market_access_cost','placeholder'=>'Enter Market access cost ')) !!}
												</div>
											</div>
										</div>
										<h2>Trainings Received</h2>
										<div class="row">
											<div class="col-md-4">
												<label for="exampleInput" class="label-medium">VSLA<span class="validateRq">*</span></label>
												<div class="input-group">
													{!! Form::checkbox('market_access_cost',Input::old('market_access_cost'), $attributes = array('class'=>'form-control market_access_cost','placeholder'=>'Enter Market access cost ')) !!}
												</div>
												<label for="exampleInput" class="label-medium">SILC<span class="validateRq">*</span></label>
												<div class="input-group">
													{!! Form::checkbox('market_access_cost',Input::old('market_access_cost'), $attributes = array('class'=>'form-control market_access_cost','placeholder'=>'Enter Market access cost ')) !!}
												</div>
												<label for="exampleInput" class="label-medium">AGRIBUSINESS<span class="validateRq">*</span></label>
												<div class="input-group">
													{!! Form::checkbox('market_access_cost',Input::old('market_access_cost'), $attributes = array('class'=>'form-control market_access_cost','placeholder'=>'Enter Market access cost ')) !!}
												</div>
												<label for="exampleInput" class="label-medium">FARMING<span class="validateRq">*</span></label>
												<div class="input-group">
													{!! Form::checkbox('market_access_cost',Input::old('market_access_cost'), $attributes = array('class'=>'form-control market_access_cost','placeholder'=>'Enter Market access cost ')) !!}
												</div>
												<label for="exampleInput" class="label-medium">Financial Literacy<span class="validateRq">*</span></label>
												<div class="input-group">
													{!! Form::checkbox('market_access_cost',Input::old('market_access_cost'), $attributes = array('class'=>'form-control market_access_cost','placeholder'=>'Enter Market access cost ')) !!}
												</div>
												<label for="exampleInput" class="label-medium">Digital Data management Training<span class="validateRq">*</span></label>
												<div class="input-group">
													{!! Form::checkbox('market_access_cost',Input::old('market_access_cost'), $attributes = array('class'=>'form-control market_access_cost','placeholder'=>'Enter Market access cost ')) !!}
												</div>
												
											</div>
											<div class="col-md-4">
												<label for="exampleInput" class="label-medium">Have you been linked to any financial institution?<span class="validateRq">*</span></label>
												<select name="link_to_financial_institution" class="form-control currently_saving select2"
															 required>
															<option value="">--- Please select---</option>
															
															<option value="yes">Yes</option>
															<option value="no">No</option>
														</select>
													 </div>

													 <div class="col-md-4">
														<label for="exampleInput" class="label-medium"> Name of the institution<span class="validateRq">*</span></label>
														<div class="input-group">
															<span class="input-group-addon"></span>
															{!! Form::text('name_of_the_institution',Input::old('name_of_the_institution'), $attributes = array('class'=>'form-control name_of_the_institution','placeholder'=>'Enter Name of the institution ')) !!}
														</div>
													</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<label for="exampleInput" class="label-medium">Amount offered by the institution<span class="validateRq">*</span></label>
												<div class="input-group">
													<span class="input-group-addon"></span>
													{!! Form::text('amount_offered',Input::old('amount_offered'), $attributes = array('class'=>'form-control amount_offered','placeholder'=>'Enter amount offered')) !!}
												</div>
											</div>
											<div class="col-md-4">
												<label for="exampleInput" class="label-medium">What will you use the money for?<span class="validateRq">*</span></label>
												<select name="money_usage" class="form-control currently_saving select2"
															 required>
															<option value="">--- Please select---</option>
															
															<option value="buying inputs">Buying Inputs</option>
															<option value="Market Access">Market Access</option>
															<option value="Ploughing">Ploughing</option>
														</select>
													 </div>

													 <div class="col-md-4">
														<label for="exampleInput" class="label-medium">Other<span class="validateRq">*</span></label>
														<div class="input-group">
															<span class="input-group-addon"></span>
															{!! Form::textarea('other',Input::old('other'), $attributes = array('class'=>'form-control other','placeholder'=>'Enter other')) !!}
														</div>
													</div>
										</div>
								<div class="col-md-3" style="margin-top: 25px;">
									@if(isset($editModeData))
									<button type="submit" class="btn btn-success btn_style"><i class="fa fa-pencil"></i>
										Update</button>
									@else
									<button type="submit" class="btn btn-success btn_style"><i class="fa fa-check"></i>
										Save</button>
									@endif
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
   $(document).ready(function(){

      $(document).on ('change','.county_id',function(){
     console.log ("coming");


	   var sub_county_id =$(this).val();
	   console.log("id");
	  });




   });

  
</script>
@endsection
