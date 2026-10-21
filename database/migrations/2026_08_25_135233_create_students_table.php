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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('admission_no');
            $table->string('name');
            $table->integer('gender');
            $table->string('date_of_birth');
            $table->string('phone')->unique();
            $table->string('password');
            $table->string('address');
            $table->string('class_id');
            $table->string('section_id');
            $table->string('parent_id');
            $table->timestamp('admission_date');
            $table->integer('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
