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
        Schema::create('routine', function (Blueprint $table) {
            $table->id();
            $table->string('routine_id');
            $table->string('institute_id');
            $table->string('status');
            $table->string('classroom_no')->nullable();
            $table->string('break_time')->nullable();
            $table->string('day')->nullable();
            $table->string('class_1')->nullable();
            $table->string('teacher_1')->nullable();
            $table->string('timing_1')->nullable();
            $table->string('class_2')->nullable();
            $table->string('teacher_2')->nullable();
            $table->string('timing_2')->nullable();
            $table->string('class_3')->nullable();
            $table->string('teacher_3')->nullable();
            $table->string('timing_3')->nullable();
            $table->string('class_4')->nullable();
            $table->string('teacher_4')->nullable();
            $table->string('timing_4')->nullable();
            $table->string('class_5')->nullable();
            $table->string('teacher_5')->nullable();
            $table->string('timing_5')->nullable();
            $table->string('class_6')->nullable();
            $table->string('teacher_6')->nullable();
            $table->string('timing_6')->nullable();
            $table->string('class_7')->nullable();
            $table->string('teacher_7')->nullable();
            $table->string('timing_7')->nullable();
            $table->string('class_8')->nullable();
            $table->string('teacher_8')->nullable();
            $table->string('timing_8')->nullable();
            $table->string('class_9')->nullable();
            $table->string('teacher_9')->nullable();
            $table->string('timing_9')->nullable();
            $table->string('class_10')->nullable();
            $table->string('teacher_10')->nullable();
            $table->string('timing_10')->nullable();
            $table->string('class_11')->nullable();
            $table->string('teacher_11')->nullable();
            $table->string('timing_11')->nullable();
            $table->string('class_12')->nullable();
            $table->string('teacher_12')->nullable();
            $table->string('timing_12')->nullable();
            $table->string('class_13')->nullable();
            $table->string('teacher_13')->nullable();
            $table->string('timing_13')->nullable();
            $table->string('class_14')->nullable();
            $table->string('teacher_14')->nullable();
            $table->string('timing_14')->nullable();
            $table->string('class_15')->nullable();
            $table->string('teacher_15')->nullable();
            $table->string('timing_15')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routine');
    }
};
