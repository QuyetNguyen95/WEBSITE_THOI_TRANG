<?php

namespace App\Models;

use App\User;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    protected $table = 'reply_comments';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,'re_user_id');
    }
    public function rating()
    {
        return $this->belongsTo(Rating::class,'re_rating_id');
    }
}
