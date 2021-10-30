<?php

namespace App\Model\Market;

use App\Model\Settings\County;
use App\Model\Settings\Location;
use App\Model\Settings\Region;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'vendor';
    protected $primaryKey = 'vendor_id';

    protected $fillable = [
        'vendor_id', 'name', 'user_id', 'approved', 'county_id', 'location_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function county()
    {
        return $this->belongsTo(County::class, 'county_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

  /*   public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    } */
}
