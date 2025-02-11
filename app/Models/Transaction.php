<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Transaction extends Model
{
    protected $table = 'transactions';
    protected $guarded = [''];

    public function user()
    {
    	return $this->belongsTo(User::class,'tr_user_id');
    }
}
