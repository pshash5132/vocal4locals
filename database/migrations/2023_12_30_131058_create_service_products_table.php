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
        Schema::create('service_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_category_id');
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->string('title');
            $table->double('price');
            $table->double('offer_price');
            $table->date('offer_start_date');
            $table->date('offer_end_date');
            $table->text('detail');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('service_category_id')
                ->references('id')->on('service_categories')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            $table->index('service_category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_products');
    }
};
