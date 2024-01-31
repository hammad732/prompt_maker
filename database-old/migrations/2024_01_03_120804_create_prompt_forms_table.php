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
        Schema::create('prompt_forms', function (Blueprint $table) {
            $table->id();
            $table->string('post')->nullable();
            $table->string('c_name')->nullable();
            $table->string('work1')->nullable();
            $table->string('work2')->nullable();
            $table->string('timeline')->nullable();
            $table->string('cost')->nullable();
            $table->string('tone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prompt_forms');
    }
};
