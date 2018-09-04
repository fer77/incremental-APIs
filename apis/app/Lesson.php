<?php

namespace App;

class Lesson extends \Eloquent {

    protected $fillable = ['title', 'body', 'some_bool'];

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}