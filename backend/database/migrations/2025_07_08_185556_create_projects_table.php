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
            $table->text('description_ITA');
            $table->text('description_ESP');
            $table->text('description_ENG');
            $table->text('curriculum_ITA');
            $table->text('curriculum_ESP');
            $table->text('curriculum_ENG');
            $table->string('dev_languages');
            $table->smallInteger('order');
            $table->smallInteger('status');
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
