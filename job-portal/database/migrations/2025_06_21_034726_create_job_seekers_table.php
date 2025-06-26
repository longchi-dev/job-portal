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
        Schema::create('job_seekers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 100)->default('');
            $table->string('avatar_url', 500)->default('');
            $table->string('desired_job', 100)->default('');
            $table->date('birth_date')->default('2003-01-01');
            $table->tinyInteger('gender');
            $table->tinyInteger('job_type');
            $table->string('industry', 100)->default('');
            $table->string('city', 100)->default('');
            $table->string('address', 100)->default('');
            $table->string('career_goal', 1000)->default('');
            $table->string('education', 500)->default('');
            $table->string('skills', 400)->default('');
            $table->string('experience', 1000)->default('');
            $table->string('profile_summary', 200)->default('');
            $table->string('skill_tags', 200)->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_seekers');
    }
};
