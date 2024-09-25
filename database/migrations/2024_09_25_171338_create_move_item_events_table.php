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
        Schema::create('move_item_events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('order_item_id');
            $table->unsignedBigInteger('from_tank_id')->nullable();
            $table->unsignedBigInteger('to_tank_id')->nullable();

            $table->foreign('order_item_id')->references('id')->on('order_items');
            $table->foreign('from_tank_id')->references('id')->on('tanks');
            $table->foreign('to_tank_id')->references('id')->on('tanks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('move_item_events');
    }
};
