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
        Schema::create('holding_locations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name");
            $table->string("description")->nullable();
            $table->string("officer_in_charge")->nullable();
            $table->string("pin")->nullable();
        });

        // sample data
        DB::table('holding_locations')->insert(['name' => 'Unknown']);
    }
};
