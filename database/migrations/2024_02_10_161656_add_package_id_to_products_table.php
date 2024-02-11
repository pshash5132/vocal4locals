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
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('package_id')->nullable()->after('brand_id');
            $table->integer('expected_delivery_days')->nullable()->after('package_id');
            $table->foreign('package_id')
            ->references('id')->on('packages')
            ->onDelete('cascade')
            ->onUpdate('restrict');
            $table->index('package_id');
        });
        Schema::table('hotel_inquiries', function (Blueprint $table) {
            $table->double('budget')->nullable()->change();
        });
        Schema::table('cab_inquiries', function (Blueprint $table) {
            $table->double('budget')->nullable()->change();
            $table->string('drive_type')->default('Self Drive');
            $table->integer('total_persons')->default(1);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('package_id');
            $table->dropColumn('expected_delivery_days');
        });
    }
};