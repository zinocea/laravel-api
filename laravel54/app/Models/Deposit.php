<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $table = 'deposits';
    protected $fillable = ['account_id','amount'];

    public function account()
    {
        return $this->belongsTo('App\Models\Account', 'account_id');
    }
}
