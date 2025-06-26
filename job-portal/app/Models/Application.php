<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'applications';

    protected $fillable = ['job_post_id', 'job_seeker_id', 'approved'];

    public function jobPost() {
        return $this->belongsTo(JobPost::class, 'job_post_id');
    }

    public function jobSeeker() {
        return $this->belongsTo(JobSeeker::class, 'job_seeker_id');
    }
}
