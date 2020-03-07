<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table="posts";
    protected $fillable = ['title','category_id','image','content','user_id','created_at','updated_at'];
    public function ShowNameCategory()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
    public function ShowNameUser()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}