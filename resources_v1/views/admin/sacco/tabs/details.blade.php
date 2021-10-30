<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <i class="mdi mdi-table fa-fw"></i> @yield('title')
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="{{route('sacco.index')}}"
                                class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i
                                        class="fa fa-list-ul" aria-hidden="true"></i> View Groups</a>
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
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-3">Name: <span style="font-weight:bold">{{ $sacco->sacco_name }}</span>
                        </div>
                        <div class="col-md-3">Description: <span
                                style="font-weight:bold">{{ $sacco->description}}</span></div>
                                
                        <div class="col-md-3">Currently saving: <span
                                style="font-weight:bold">{{ $sacco->currently_saving}}</span></div>
                                
                        <div class="col-md-3">Date started saving: <span
                                style="font-weight:bold">{{ $sacco->date_started_saving}}</span></div>
                        </div>
                        <hr style="background-color:black">
                     <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-3">Circle Number: <span style="font-weight:bold">{{ $sacco->circle_number}}</span>
                        </div>
                        <div class="col-md-3">Share Value:<strong>Ksh</strong> <span
                                style="font-weight:bold">{{ $sacco->share_value}}</span></div>
                                
                        <div class="col-md-3">Total Shares Value:<strong>Ksh</strong>  <span
                                style="font-weight:bold">{{ $sacco->total_shares}}</span></div>
                                
                        <div class="col-md-3">Next meeting date: <span
                                style="font-weight:bold">{{ $sacco->next_meeting_date}}</span></div>
                         </div>  
                        <hr style="background-color:black">
                         <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-3">Loan fund cash at now:<strong>Ksh</strong>  <span style="font-weight:bold">{{ $sacco->loan_fund_cash }}</span>
                        </div>
                        <div class="col-md-3">Loan fund at bank at now:<strong>Ksh</strong>  <span
                                style="font-weight:bold">{{ $sacco->loan_fund_bank}}</span></div>
                                
                        <div class="col-md-3">Does the group have a constitution ?: <span
                                style="font-weight:bold">{{ $sacco->constitution}}</span></div>
                                
                        <div class="col-md-3">Registered Male members as per the constitution: <span
                                style="font-weight:bold">{{ $sacco->male_as_per_constitution}}</span></div>
                                 </div>
                                 
                        <hr style="background-color:black">
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-3">Registered Female members as per the constitution: <span style="font-weight:bold">{{ $sacco->female_as_per_constitution}}</span>
                        </div>
                        <div class="col-md-3">Do you have properties owned by the group?: <span
                                style="font-weight:bold">{{ $sacco->property_owned}}</span></div>
                                
                        <div class="col-md-3">Name of the property: <span
                                style="font-weight:bold">{{ $sacco->name_of_the_property}}</span></div>
                                
                        <div class="col-md-3">Value of the property:<strong>Ksh</strong>  <span
                                style="font-weight:bold">{{ $sacco->value_of_the_property}}</span></div>
                        </div>
                        
                        <hr style="background-color:black">
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-3">Value of savings: <strong>Ksh</strong> <span style="font-weight:bold">{{ $sacco->value_of_savings}}</span>
                        </div>
                        <div class="col-md-3">Value of loans outstanding:<strong>Ksh</strong>  <span
                                style="font-weight:bold">{{ $sacco->value_of_loan_outstanding}}</span></div>
                                
                        <div class="col-md-3">Purpose of the Loan: <span
                                style="font-weight:bold">{{ $sacco->loan_purpose}}</span></div>
                                
                        <div class="col-md-3">Number of people with loans: <span
                                style="font-weight:bold">{{ $sacco->number_of_people_with_loans}}</span></div>
                  </div>
                  
                        <hr style="background-color:black">
                  <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-3">Loan fund / cash  if any: <strong>Ksh</strong> <span style="font-weight:bold">{{ $sacco->loan_fund}}</span>
                        </div>
                        <div class="col-md-3">Share Value: <strong>Ksh</strong> <span
                                style="font-weight:bold">{{ $sacco->share_value}}</span></div>
                                
                        <div class="col-md-3">Total Shares Value: <strong>Ksh</strong> <span
                                style="font-weight:bold">{{ $sacco->total_shares}}</span></div>
                                
                        <div class="col-md-3">Next meeting date of the group: <span
                                style="font-weight:bold">{{ $sacco->next_meeting_date}}</span></div>
                 </div>
                 
                        <hr style="background-color:black">
                 <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-3">Loan fund cash at now: <strong>Ksh</strong> <span style="font-weight:bold">{{ $sacco->loan_fund_cash }}</span>
                        </div>

                        <div class="col-md-3">Bank balance if any:<strong>Ksh</strong>  <span
                                style="font-weight:bold">{{ $sacco->bank_balance}}</span></div>
                                
                        <div class="col-md-3">Social fund balance if any:<strong>Ksh</strong>  <span
                                style="font-weight:bold">{{ $sacco->social_fund}}</span></div>
                                
                        <div class="col-md-3">Property now if any: <span
                                style="font-weight:bold">{{ $sacco->property_now}}</span></div>
                </div>
                
                        <hr style="background-color:black">
                <div class="row" style="margin-bottom: 20px">
                       <div class="col-md-3">External debts if any:<strong>Ksh</strong>  <span style="font-weight:bold">{{ $sacco->external_debts}}</span>
                        </div>
                        <div class="col-md-3">Grants provided:<strong>Ksh</strong>  <span
                                style="font-weight:bold">{{ $sacco->grants_provided}}</span></div>
                                
                        <div class="col-md-3">Type of farming: <span
                                style="font-weight:bold">{{ $sacco->type_of_farming}}</span></div>

                        <div class="col-md-3">Crops planted: <span
                                style="font-weight:bold">{{ $sacco->crops_planted}}</span></div>
                </div>
                
                        <hr style="background-color:black">
                <div class="row" style="margin-bottom: 20px">

                       <div class="col-md-3">Inputs provided: <span
                                style="font-weight:bold">{{ $sacco->inputs_provided}}</span></div>
                                
                        <div class="col-md-3">Size of land: <span
                                style="font-weight:bold">{{ $sacco->size_of_land}}</span></div>
                                
                        <div class="col-md-3">Past output bags: <span style="font-weight:bold">{{ $sacco->past_output_bags}}</span>
                        </div>

                        <div class="col-md-3">Sales in Ksh: <strong>Ksh</strong> <span
                                style="font-weight:bold">{{ $sacco->sales}}</span></div>
                 </div>
                 
                        <hr style="background-color:black">
                 <div class="row" style="margin-bottom: 20px">
                                
                        <div class="col-md-3">Farm inputs cost:<strong>Ksh</strong>  <span
                                style="font-weight:bold">{{ $sacco->farm_inputs_cost}}</span></div>
                                
                        <div class="col-md-3">Reserve cash for inputs:<strong>Ksh</strong>  <span
                                style="font-weight:bold">{{ $sacco->reserve_cash}}</span></div>

                        <div class="col-md-3">Do you have linkage to market?: <span style="font-weight:bold">{{ $sacco->linkage_to_market }}</span>
                        </div>
                        
                        <div class="col-md-3">Market access cost:<strong>Ksh</strong>  <span
                                style="font-weight:bold">{{ $sacco->market_access_cost}}</span></div>
                 </div>
                 
                        <hr style="background-color:black">
                 <div class="row" style="margin-bottom: 20px">
                                
                        <div class="col-md-3">Have you been linked to any financial institution?: <span
                                style="font-weight:bold">{{ $sacco->link_to_financial_institution}}</span></div>
                                
                        <div class="col-md-3">Name of the institution: <span
                                style="font-weight:bold">{{ $sacco->name_of_the_institution}}</span></div>
                                
                        <div class="col-md-3">Amount offered by the institution: <strong>Ksh</strong> <span style="font-weight:bold">{{ $sacco->amount_offered}}</span>
                        </div>
                        
                        <div class="col-md-3">What will you use the money for?: <span
                                style="font-weight:bold">{{ $sacco->money_usage}}</span></div>
                 </div>
                 
                        <hr style="background-color:black">
                 <div class="row" style="margin-bottom: 20px">
                                
                        <div class="col-md-3">Other: <span
                                style="font-weight:bold">{{ $sacco->other}}</span></div>
                </div>
                
                        <hr style="background-color:black">
                <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-3">Active Members: <span style="font-weight:bold"> {{ $active_members }} </span></div>
                        <div class="col-md-3">Pending Activation: <span style="font-weight:bold">{{ $pending_members }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        {{-- </div>
    </div>
</div> --}}