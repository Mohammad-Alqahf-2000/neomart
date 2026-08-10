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
            $table->id();
            $table->string('status', 50)->default('pending')->comment("pending ,processing ,confirmed ,shipping ,cancelled,completed , delivered ,refund");
            $table->decimal('total_amount');
            $table->text('note')->nullable();
            $table->foreignId('user_id')->constrained('users', 'id')->restrictOnDelete();
            $table->timestamp("paid_at")->nullable();
            $table->string('payment_status')->default("unpaid")->comment("unpaid , pending , paid , partoally_paid , failed , refunded , partially_refunded", "canceled");
            $table->timestamps();
            $table->softDeletes();
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
