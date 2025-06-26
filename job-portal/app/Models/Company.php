<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'name', 'address', 'website', 'description', 'avatar_url',
        'industry', 'city', 'benefits'
    ];

    public function account() {
        return $this->hasOne(CompanyAccount::class, 'company_id');
    }

    public function jobPosts() {
        return $this->hasMany(JobPost::class, 'company_id');
    }

    public function invitedJobs() {
        return $this->hasMany(InvitedJob::class, 'company_id');
    }

    public function savedSeekers() {
        return $this->hasMany(SavedSeeker::class, 'company_id');
    }

    public function savedBySeekers() {
        return $this->hasMany(SavedCompany::class, 'company_id');
    }
}
