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
        Schema::create('service_inquiries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_category_id');
            $table->unsignedBigInteger('service_product_id');
            $table->double('budget');
            $table->string('name');
            $table->string('email');
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('pincode');
            $table->bigInteger('mobile');
            $table->string('address_type');
            $table->enum('status', ['1', '2', '3', '4', '5'])->default('1')->comment('1=>new,2=>pending,3=>booked,4=>completed,5=>cancelled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_inquiries');
    }
};
