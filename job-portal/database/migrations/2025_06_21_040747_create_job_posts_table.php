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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('title', 100);
            $table->string('industry', 100);
            $table->string('position', 100);
            $table->decimal('salary', 20, 2);
            $table->tinyInteger('job_type');
            $table->string('address', 150);
            $table->string('phone', 11);
            $table->string('email', 150);
            $table->string('description', 2000);
            $table->string('skill_tags', 200);
            $table->date('deadline')->default('2023-06-06');
            $table->string('requirements', 5000)->default('');
            $table->string('degree_required', 100)->default('');
            $table->string('benefits', 5000)->default('');
            $table->integer('quantity')->default(1);
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
