<?php

namespace App;

class Lesson extends \Eloquent {

    protected $fillable = ['title', 'body'];

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}