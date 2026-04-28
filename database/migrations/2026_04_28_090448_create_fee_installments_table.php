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
        Schema::create('fee_installments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->integer('installment_no');
            $table->date('due_date');

            $table->decimal('amount', 10, 2);
            $table->decimal('discount_amount', 10, 2)->default(0);
            $table->decimal('final_amount', 10, 2);

            $table->decimal('paid_amount', 10, 2)->default(0);
            $table->enum('status', ['pending', 'partial', 'paid']);
            $table->timestamp('paid_on')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_installments');
    }
};
