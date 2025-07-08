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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('url');
            $table->string('description_ITA');
            $table->string('description_ESP');
            $table->string('description_ENG');
            $table->string('curriculum_ITA');
            $table->string('curriculum_ESP');
            $table->string('curriculum_ENG');
            $table->string('dev_languages');
            $table->smallInteger('order');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
