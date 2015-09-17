<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'body',
        'tweet_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tweet()
    {
        return $this->belongsTo('App\Tweet');
    }
}
