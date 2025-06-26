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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->default('');
            $table->string('address', 100)->default('');
            $table->string('website', 50)->default('');
            $table->string('description', 2000)->default('');
            $table->string('avatar_url', 500)->default('');
            $table->string('industry', 100)->default('');
            $table->string('city', 100)->default('');
            $table->string('benefits', 2000)->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
