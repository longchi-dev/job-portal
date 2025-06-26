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
        Schema::create('job_seeker_accounts', function (Blueprint $table) {
            $table->unsignedBigInteger('job_seeker_id');
            $table->string('username', 50);
            $table->string('password', 255);
            $table->string('phone', 11);
            $table->string('email', 100);
            $table->unsignedInteger('otp')->nullable();
            $table->timestamps();

            $table->primary(['username', 'email']);
            $table->foreign('job_seeker_id')->references('id')->on('job_seekers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_seeker_accounts');
    }
};
