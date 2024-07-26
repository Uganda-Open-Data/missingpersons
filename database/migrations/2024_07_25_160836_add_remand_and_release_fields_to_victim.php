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
            $table->unsignedBigInteger('remanded_from_id')->nullable();
            $table->foreign('remanded_from_id')->references('id')->on('holding_locations'); // The Court

            $table->unsignedBigInteger('remanded_to_id')->nullable();
            $table->foreign('remanded_to_id')->references('id')->on('holding_locations'); // The Prison
            
            $table->date('remanded_on')->nullable();
            $table->date('remanded_until')->nullable();
            $table->text('remanded_by')->nullable(); // The Judge
            $table->date('released_on')->nullable();

        });
    }

};
