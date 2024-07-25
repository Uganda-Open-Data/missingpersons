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
        Schema::table('victims', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('remanded_from_id')->nullable()->change();
            $table->unsignedBigInteger('remanded_to_id')->nullable()->change();
        });
    }


};
