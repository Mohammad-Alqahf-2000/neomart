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
        Schema::create('store_orders', function (Blueprint $table) {
            $table->id();
            $table->decimal("shipping_cost", 6, 2);
            $table->decimal("tax_rate", 10, 2);
            $table->decimal("tax_amount", 10, 2);
            $table->string('tax_type')->comment("percentage or value");
            $table->string('status', 50)->default('pending')->comment("pending ,processing ,confirmed ,shipping ,cancelled,completed , delivered ,refund");
            $table->decimal("total_sub", 10, 2);
            $table->decimal("total", 10, 2);
            $table->foreignId('order_id')->constrained('orders', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('store_id')->constrained('stores', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unique(['order_id', 'store_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_order');
    }
};
