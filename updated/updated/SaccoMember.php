<?php

namespace App\Model\Sacco;

use Illuminate\Database\Eloquent\Model;

class SaccoMember extends Model
{

	protected $table = 'sacco_members';
    protected $primaryKey = 'sacco_members_id';

    protected $fillable = [
        'sacco_id', 'member_number', 'member_name', 'member_id_no', 'location'
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
    
}
