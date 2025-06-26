<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvitedJob extends Model
{
    protected $table = 'invited_jobs';

    protected $fillable = ['job_seeker_id', 'company_id', 'approved'];

    public $timestamps = false;
    public $incrementing = false;
}
