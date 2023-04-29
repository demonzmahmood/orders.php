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
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->unsignedBigInteger('orderNumber');
            $table->string('productCode', 15);
            $table->integer('quantityOrdered');
            $table->decimal('priceEach', 10, 2);
            $table->smallInteger('orderLineNumber');
            $table->primary(['orderNumber', 'productCode']);

            $table->foreign('orderNumber')->references('orderNumber')->on('orders');
            $table->foreign('productCode')->references('productCode')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
