<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobSeekerAccount extends Model
{
    protected $table = 'job_seeker_accounts';

    protected $fillable = ['job_seeker_id', 'username', 'password', 'phone', 'email', 'otp'];

    protected $hidden = ['password'];

    public $timestamps = false;

    public function jobSeeker() {
        return $this->belongsTo(JobSeeker::class, 'job_seeker_id');
    }
}
