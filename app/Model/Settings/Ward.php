<?php

namespace App\Model\Settings;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'ward';
    protected $primaryKey = 'ward_id';

    protected $fillable = [
        'sub_county_id','ward_id', 'ward_name'
    ];


public function sub_county()
    {
        return $this->belongsTo(SubCounty::class, 'sub_county_id');
    }

}
