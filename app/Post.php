<?php

namespace App;

use Faker\Provider\HtmlLorem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];

    public function author()
    {
        return $this->belongsTo('App\User');
    }

    public function post_images()
    {
        return $this->hasMany('App\PostImage');
    }
}
