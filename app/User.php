<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','first_name','middle_name','last_name','city','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * quan he 1-n
     */

    public  function comment()
    {
        return $this->hasMany('app\Comment');
    }
    public  function companies()
    {
        return $this->hasMany('app\Company');
    }

    public  function role()
    {
        return $this->belongsTo('app\Role');
    }

    public  function tasks()
    {
        return $this->belongsToMany('app\Task');
    }
    public  function projects()
    {
        return $this->belongsToMany('app\Project');
    }
}
