<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable =
    [
        'name',
        'project_id',
        'company_id',
        'user_id',
        'days',
        'hours'
    ];

    public  function user()
    {
        return $this->belongsTo('app\User');
    }

    public  function project()
    {
        return $this->belongsTo('app\Project');
    }

    public  function company()
    {
        return $this->belongsTo('app\Company');
    }
    public  function users()
    {
        return $this->belongsToMany('app\User');
    }
}
