<?php

namespace App\Model\Sacco;

use App\User;
use Illuminate\Database\Eloquent\Model;

class MilkCollection extends Model
{
    protected $table = 'milk_collections';
    protected $primaryKey = 'milk_collections_id';

    protected $fillable = [
        'sacco_id','milk_collections_id', 'user_id', 'member_number','delivery_date', 'delivery_time', 'quantity'
    ];

    public function sacco()
    {
        return $this->belongsTo(Sacco::class, 'sacco_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
