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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('city_id');
            $table->string('title');
            $table->string('ticket_price')->nullable();
            $table->text('ticket_url')->nullable();
            $table->datetime('from');
            $table->datetime('to');
            $table->text('image_url');
            $table->string('comment');
            $table->string('contact');
            $table->string('location');
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
