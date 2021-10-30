<?php

namespace App\Model\Settings;

use Illuminate\Database\Eloquent\Model;

class SubCounty extends Model
{
    protected $table = 'sub_county';
    protected $primaryKey = 'sub_county_id';

    protected $fillable = [
        'county_id','sub_county_id', 'sub_county_name'
    ];
    public function county()
    {
        return $this->belongsTo(County::class, 'county_id');
    }
}
