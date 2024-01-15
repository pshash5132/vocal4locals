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
        Schema::table('abouts', function (Blueprint $table) {
            $table->string('about_title1')->nullable();
            $table->string('about1')->nullable();
            $table->string('about_title2')->nullable();
            $table->string('about2')->nullable();
            $table->string('about_title3')->nullable();
            $table->string('about3')->nullable();
            $table->string('about_title4')->nullable();
            $table->string('about4')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            //
        });
    }
};