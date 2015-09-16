<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model {

    protected $fillable = [
        'title',
        'body',
        'user_id'
    ];

}
