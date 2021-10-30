<?php

namespace App\Model\Farm;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Livestock extends Model
{
    protected $table = 'livestock';
    protected $primaryKey = 'livestock_id';

    protected $fillable = [
        'livestock_id',  'user_id', 'livestock_name', 'number', 'gender', 'age'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
