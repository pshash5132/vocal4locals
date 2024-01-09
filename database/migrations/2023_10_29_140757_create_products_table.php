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
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->string('name');
            $table->string('slug');
            $table->string('thumb_image');
            $table->integer('qty')->nullable();
            $table->text('short_description');
            $table->text('long_description');
            $table->text('video_link')->nullable();
            $table->string('sku')->nullable();
            // $table->double('price')->nullable();
            // $table->double('offer_price')->nullable();
            $table->date('offer_start_date')->nullable();
            $table->date('offer_end_date')->nullable();
            $table->string('product_type')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('is_approved')->default(0);
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();

            $table->foreign('brand_id')
                ->references('id')->on('brands')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            $table->index('brand_id');

            $table->foreign('vendor_id')
                ->references('id')->on('vendors')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            $table->index('vendor_id');

            $table->foreign('subcategory_id')
                ->references('id')->on('sub_categories')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            $table->index('subcategory_id');

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
