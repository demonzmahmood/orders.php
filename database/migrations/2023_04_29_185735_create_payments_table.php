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
        Schema::create('payments', function (Blueprint $table) {
            $table->unsignedBigInteger('customerNumber');
            $table->string('checkNumber', 50);
            $table->date('paymentDate');
            $table->decimal('amount', 10, 2);
            $table->primary(['customerNumber', 'checkNumber']);
            $table->foreign('customerNumber')->references('customerNumber')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
