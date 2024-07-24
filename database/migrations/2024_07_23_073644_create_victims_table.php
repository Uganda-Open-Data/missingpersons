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
        Schema::create('victims', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nick_name')->nullable();
            $table->string('x_handle')->nullable();
            $table->text('notes')->nullable();
            $table->string('last_known_location')->nullable();
            $table->string('gender');
            $table->timestamps();
            $table->foreignId("holding_location_id")->nullable();
            $table->string("status");
            $table->dateTime('status_date')->nullable();
            $table->foreignId("security_organ_id")->nullable();
            $table->boolean('confirmed')->default(false);
        });
    }
};
