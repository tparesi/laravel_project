<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model {

    protected $fillable = [
        'title',
        'body'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply', 'tweet_id', 'id');
    }
}
