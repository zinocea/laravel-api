<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'account';
    protected $fillable = ['customer_id', 'amount', 'bonus'];

    public function owner()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }
    public function deposit()
    {
        return $this->hasMany('App\Models\Deposit', 'account_id', 'id');
    }
    public function withdraw()
    {
        return $this->hasMany('App\Models\Withdraw', 'account_id', 'id');
    }
}
