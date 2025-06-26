<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavedSeeker extends Model
{
    protected $table = 'saved_seekers';

    protected $fillable = ['job_seeker_id', 'company_id'];

    public $timestamps = false;
    public $incrementing = false;
}
