<?php

namespace App\Model\Sacco;
use App\Model\Settings\County;
use App\Model\Settings\SubCounty;
use App\Model\Settings\Ward;

use Illuminate\Database\Eloquent\Model;

class Sacco extends Model
{
    protected $table = 'sacco';
    protected $primaryKey = 'sacco_id';

    protected $fillable = [
        'sacco_id', 'sacco_name', 'description','county_id','sub_county_id','ward_id','male_members','female_members','currently_saving','date_started_saving','circle_number',
        'share_value','total_shares','next_meeting_date','loan_fund_cash','loan_fund_bank','constitution','male_as_per_constitution','female_as_per_constitution',
        'property_owned','name_of_the_property','value_of_the_property','value_of_savings','loan_purpose','number_of_people_with_loans',
        'loan_fund','bank_balance','social_fund','property_now','external_debts','grants_provided','type_of_farming','crops_planted',
        'inputs_provided','size_of_land','sales','farm_inputs_cost','reserve_cash','linkage_to_market','market_access_cost','link_to_financial_institution',
        'name_of_the_institution','amount_offered','money_usage','other'
    ];
    public function county()
        {
            return $this->belongsTo(County::class, 'county_id');
        }

    public function sub_county()
        {
            return $this->belongsTo(SubCounty::class, 'sub_county_id');
        }

    public function ward()
        {
            return $this->belongsTo(Ward::class, 'ward_id');
        }
}

