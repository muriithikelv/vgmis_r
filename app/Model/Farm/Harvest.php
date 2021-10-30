<?php

namespace App\Model\Farm;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    protected $table = 'harvest';
    protected $primaryKey = 'harvest_id';

    protected $fillable = [
        'harvest_id', 'harvest_name', 'user_id', 'amount'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
