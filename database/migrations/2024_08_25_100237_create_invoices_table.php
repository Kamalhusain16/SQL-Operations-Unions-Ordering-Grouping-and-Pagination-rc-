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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('customer_id');

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreign('customer_id')->references('id')->on('customers')
                ->restrictOnDelete()->cascadeOnUpdate();

            // Invoice fields
            $table->string('total_price', 50);
            $table->boolean('paid')->default(0);
            $table->string('vat', 50);
            $table->string('discount', 50);
            $table->string('payable', 50);

            // Timestamps
            $table->timestamps(); // This will create created_at and updated_at fields with the useCurrent() behavior
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
