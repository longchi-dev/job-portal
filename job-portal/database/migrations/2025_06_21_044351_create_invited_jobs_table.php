<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invited_jobs', function (Blueprint $table) {
            $table->unsignedBigInteger('job_seeker_id');
            $table->unsignedBigInteger('company_id');
            $table->boolean('approved');
            $table->foreign('job_seeker_id')->references('id')->on('job_seekers');
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invited_jobs');
    }
};
