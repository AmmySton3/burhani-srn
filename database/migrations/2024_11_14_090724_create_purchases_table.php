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
        Schema::create('purchases', function (Blueprint $table) {
            $table->string('serial_no', 20)->primary();
            $table->string('model_no', 20);
            $table->string('name', 100);
            $table->string('company', 100);
            $table->string('invoice_no', 100);
            $table->string('date_of_purchase', 100);
            $table->string('vendor', 100);
            $table->string('status', 1)->default('P');
            $table->string('remarks', 200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
