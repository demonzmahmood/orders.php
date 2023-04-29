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
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('orderNumber')->primary(); 
            $table->date('orderDate');
            $table->date('requiredDate');
            $table->date('shippedDate')->nullable();
            $table->string('status', 15);
            $table->text('comments')->nullable();
            $table->unsignedBigInteger('customerNumber');
            $table->timestamps();
            $table->index('orderNumber');

            $table->foreign('customerNumber')->references('customerNumber')->on('customers');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
