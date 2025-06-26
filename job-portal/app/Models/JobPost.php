<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $table = 'job_posts';

    protected $fillable = [
        'company_id', 'title', 'industry', 'position', 'salary', 'job_type',
        'address', 'phone', 'email', 'description', 'skill_tags', 'deadline',
        'requirements', 'degree_required', 'benefits', 'quantity'
    ];

    public function company() {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
