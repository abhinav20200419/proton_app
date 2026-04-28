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
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('father_name')->nullable();
            $table->string('phone');
            $table->string('admission_no')->unique();
            $table->date('admission_date');
            $table->foreignId('session_id')->constrained('user_sessions')->cascadeOnDelete();
            $table->foreignId('batch_id')->constrained()->cascadeOnDelete();
            $table->enum('fee_type', ['monthly', 'yearly']);
            $table->date('fee_start_date');
            $table->boolean('status')->default(true);
            $table->timestamps();
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
