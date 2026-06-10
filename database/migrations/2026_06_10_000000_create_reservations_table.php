<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('email');
            $table->string('phone_number');
            $table->integer('number_of_guests');
            $table->dateTime('reservation_time');
            $table->text('special_requests')->nullable();
            $table->timestamps(); // Creates created_at and updated_at automatically
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};