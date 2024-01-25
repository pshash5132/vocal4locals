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
        Schema::create('cab_inquiries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            $table->string('from_location');
            $table->string('to_location');
            $table->date('departure');
            $table->date('return');
            $table->double('budget');
            $table->enum('status', ['1', '2', '3', '4', '5'])->default('1')->comment('1=>new,2=>pending,3=>booked,4=>not available,5=>cancelled');
            $table->timestamps();
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cab_inquiries');
    }
};
