<?php

namespace App;

use Parsedown;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body'];

    public function path() 
    {
        return "/post/{$this->id}";
    }

    public static function boot() 
    {
        parent::boot();

        static::retrieved(function($post) {
            $post->body = (new Parsedown())->text($post->body);
        });
    }
}
