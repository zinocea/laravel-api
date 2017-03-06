<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['firstname', 'lastname', 'email', 'gender', 'country', 'bonus_percent'];

    public function loginAccount()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function bankAccount()
    {
        return $this->hasOne('App\Models\Account', 'customer_id', 'id');
    }
}
