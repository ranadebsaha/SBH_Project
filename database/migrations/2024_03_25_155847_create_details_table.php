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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->string('institute_id');
            $table->string('classroom',100)->default(0);
            $table->string('class_start',100)->default(0);
            $table->string('class_close',100)->default(0);
            $table->string('break_time',100)->default(0);
            $table->string('weekend',100)->default(0);
            $table->string('class_time',100)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
