<?php

namespace App\Model\Sacco;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SaccoEditor extends Model
{
    protected $table = 'sacco_editors';
    protected $primaryKey = 'sacco_editors_id';

    protected $fillable = [
        'sacco_editors_id', 'user_id', 'sacco_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
