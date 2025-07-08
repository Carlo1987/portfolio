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
        Schema::create('curriculum_texts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curriculumSection_id');
            $table->string('text_ITA');
            $table->string('text_ESP');
            $table->string('text_ENG');
            $table->smallInteger('order');
            $table->timestamps();

            $table->foreign('curriculumSection_id')->references('id')->on('curriculum_sectiones')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculum_texts');
    }
};
