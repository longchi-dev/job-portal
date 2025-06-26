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
        Schema::create('saved_companies', function (Blueprint $table) {
            $table->unsignedBigInteger('job_seeker_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('job_post_id');
            $table->primary(['job_seeker_id', 'company_id', 'job_post_id']);
            $table->foreign('job_seeker_id')->references('id')->on('job_seekers');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('job_post_id')->references('id')->on('job_posts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saved_companies');
    }
};
