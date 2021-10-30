<?php

namespace App\Model\Subscription;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscription';
    protected $primaryKey = 'subscription_id';

    protected $fillable = [
        'subscription_id', 'phone_no', 'user_id', 'amount', 'transaction_code', 'start_date', 'end_date', 'created_by', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
