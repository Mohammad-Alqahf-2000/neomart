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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('en_description')->nullable();
            $table->text('ar_description')->nullable();
            $table->string('logo', 255)->nullable();
            $table->decimal("shipping_cost", 6, 2)->default(0);
            $table->decimal("tax_rate", 10, 2)->default(0);
            $table->string('tax_type')->default('value')->comment("percentage or value");
            $table->foreignId('user_id')->unique()->constrained('users', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
