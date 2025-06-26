<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobSeeker extends Model
{
    protected $table = 'job_seekers';

    protected $fillable = [
        'full_name', 'avatar_url', 'desired_job', 'birth_date', 'gender', 'job_type',
        'industry', 'city', 'address', 'career_goal', 'education', 'skills',
        'experience', 'profile_summary', 'skill_tags'
    ];

    public function account() {
        return $this->hasOne(JobSeekerAccount::class, 'job_seeker_id');
    }

    public function applications() {
        return $this->hasMany(Application::class, 'job_seeker_id');
    }

    public function invitedJobs() {
        return $this->hasMany(InvitedJob::class, 'job_seeker_id');
    }

    public function savedCompanies() {
        return $this->hasMany(SavedCompany::class, 'job_seeker_id');
    }

    public function savedByCompanies() {
        return $this->hasMany(SavedSeeker::class, 'job_seeker_id');
    }
}
