<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable;
    use Billable;

    protected $dates=['trial_ends_at', 'subscription_ends_at'];
/*    protected $cardUpFront = false;*/

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','slug','sex',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function contents()
    {
        return $this->hasMany('App\Content');
    }

    public function benefits()
    {
        return $this->hasOne('App\Benefit');
    }
    
    public function jobs()
    {
        return $this->belongsToMany('App\Job', 'jobs_users', 'user_id', 'job_slug');
    }
}
