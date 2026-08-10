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
            $table->id();
            $table->decimal('amount');
            $table->string('method', 150);
            $table->string('status', 50)->default("unpaid")->comment("unpaid , pending , paid , partoally_paid , failed , refunded , partially_refunded", "canceled");
            $table->unsignedBigInteger('transaction_id');
            $table->timestamp("paid_at");
            $table->foreignId('store_order_id')->constrained('store_orders', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
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
