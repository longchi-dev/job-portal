<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavedCompany extends Model
{
    protected $table = 'saved_companies';

    protected $fillable = ['job_seeker_id', 'company_id', 'job_post_id'];

    public $timestamps = false;
    public $incrementing = false;
}
