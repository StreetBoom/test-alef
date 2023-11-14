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
        Schema::create('curriculum_lecture', function (Blueprint $table) {
            $table->foreignId('curriculum_id')->constrained('curriculums');
            $table->foreignId('lecture_id')->constrained();
            $table->integer('priority');
            $table->boolean('was_listened')->default(0);
            $table->unique([
               'curriculum_id' ,'lecture_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculum_lecture');
    }
};
