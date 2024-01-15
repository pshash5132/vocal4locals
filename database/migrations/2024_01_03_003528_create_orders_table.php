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
            $table->string('invoice_id');
            $table->unsignedBigInteger('user_id');
            $table->double('sub_total');
            $table->double('discount_amount')->nullable();
            $table->double('amount');
            $table->integer('product_qty');
            $table->string('payment_method')->nullable();
            $table->string('payment_status');
            $table->text('order_address');
            $table->text('shipping_method');
            $table->text('coupon')->nullable();
            $table->string('order_status')->default('Pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade');
        });
    }
    // 164057
    // 164085
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
