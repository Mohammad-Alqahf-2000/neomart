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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('en_name', 255);
            $table->string('ar_name', 255);
            $table->text('en_description');
            $table->text('ar_description');
            $table->smallInteger('stock')->unsigned()->default(0);
            $table->decimal('price');
            $table->boolean('availability');
            $table->string('type',50)->comment(" 'N' for new , 'U' for used");
            $table->foreignId('brand_id')->constrained('brands', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('sub_category_id')->constrained('sub_categories', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('store_id')->constrained('stores', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
