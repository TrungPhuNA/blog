<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable =
    [
        'body',
        'url',
        'commenttable_id',
        'commenttable_type',
        'user_id'
    ];
}
