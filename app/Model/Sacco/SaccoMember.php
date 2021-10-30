<?php

namespace App\Model\Sacco;

use App\Model\Sacco\SaccoMember as SaccoSaccoMember;
use App\User;

use App\Model\Settings\Region;
use App\Model\Settings\Location;
use Illuminate\Database\Eloquent\Model;

class SaccoMember extends Model
{

	protected $table = 'sacco_members';
    protected $primaryKey = 'sacco_members_id';

    protected $fillable = [
        'sacco_id',  'member_name', 'member_number', 'member_id_no','member_number','location_id'
    ];


	 public function getstatusAttribute($attribute)
	{
	return[
		1 => 'Active',
		0 => 'Pending',
	][$attribute];
	}

	public function scopeActive($query)
	{
		return $query->where('status', 1);
	}

	public function scopePending($query)
	{
		return $query->where('status', 0);
	}
	public function user(){
		return  $this->belongsTo(User::class, 'user_id');
	}
	public function location(){
		return  $this->belongsTo(Location::class, 'location_id');
	}

	public function sacco()
	{
		return $this->belongsTo(Sacco::class,'sacco_id');
	}
}
