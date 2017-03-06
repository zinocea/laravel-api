<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $table = 'withdraws';
    protected $fillable = ['account_id','amount'];

    public function account()
    {
        return $this->belongsTo('App\Models\Account', 'account_id');
    }
}
