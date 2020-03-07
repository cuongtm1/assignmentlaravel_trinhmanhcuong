<?php

namespace App\Models;
use App\Models\{User,Post,Comment};
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content','post_id','user_id','is_active','created_at','updated_at'];
    public function user_name()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }


}
