<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyAccount extends Model
{
    protected $table = 'company_accounts';

    protected $fillable = ['company_id', 'username', 'password', 'phone', 'email'];

    protected $hidden = ['password'];

    public $timestamps = false;

    public function company() {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
