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
        Schema::create('customers', function (Blueprint $table) {
            $table->unsignedBigInteger('customerNumber')->primary();
            $table->string('customerName', 50);
            $table->string('contactLastName', 50);
            $table->string('contactFirstName', 50);
            $table->string('phone', 50);
            $table->string('addressLine1', 50);
            $table->string('addressLine2', 50)->nullable();
            $table->string('city', 50);
            $table->string('state', 50)->nullable();
            $table->string('postalCode', 15)->nullable();
            $table->string('country', 50);
            $table->unsignedBigInteger('salesRepEmployeeNumber')->nullable();
            $table->decimal('creditLimit', 10, 2)->nullable();
            $table->index('salesRepEmployeeNumber');
            $table->foreign('salesRepEmployeeNumber')->references('employeeNumber')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
