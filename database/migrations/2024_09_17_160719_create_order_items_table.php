<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('own_wax_amount');
            $table->string('comb_type');
            $table->string('comb_size');
            $table->string('comb_amount');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('tank_id')->nullable();

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('tank_id')->references('id')->on('tanks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('order_items');
    }
};
