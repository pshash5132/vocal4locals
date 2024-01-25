<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('product_variants', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('product_id');
        //     $table->string('name');
        //     $table->boolean('status')->default(1);
        //     $table->timestamps();

        //     $table->foreign('product_id')
        //         ->references('id')->on('products')
        //         ->onDelete('cascade')
        //         ->onUpdate('restrict');
        //     $table->index('product_id');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('product_variants');
    }
};
