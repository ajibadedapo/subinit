<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'jobs_users', 'job_slug', 'user_id');
    }
}
