<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('users')->updateOrInsert([
            'id' => '1',
            'name' => 'System Admin',
            'email' => 'ms@styxtechgroup.com',
            'password' => Hash::make('Admin123'),
            'current_team_id' => '1',
            'created_at' => now()
        ]);
        DB::table('users')->updateOrInsert([
            'id' => '2',
            'name' => 'Wesley Kambale',
            'email' => 'spartanwk@gmail.com',
            'password' => Hash::make('Kambale123'),
            'current_team_id' => '1',
            'created_at' => now()
        ]);
        DB::table('users')->updateOrInsert([
            'id' => '3',
            'name' => 'Stephen Musoke',
            'email' => 'ssmusoke@gmail.com',
            'password' => Hash::make('Admin123'),
            'current_team_id' => '1',
            'created_at' => now()
        ]);
        DB::table('teams')->updateOrInsert([
            'id' => '1',
            'user_id' => '1',
            'name' => 'Approval Team',
            'personal_team' => '0',
            'created_at' => now()
        ]);
        DB::table('team_user')->updateOrInsert([
            'team_id' => '1',
            'user_id' => '1',
            'created_at' => now()
        ]);
        DB::table('team_user')->updateOrInsert([
            'team_id' => '1',
            'user_id' => '2',
            'created_at' => now()
        ]);
        DB::table('team_user')->updateOrInsert([
            'team_id' => '1',
            'user_id' => '3',
            'created_at' => now()
        ]);

        Schema::enableForeignKeyConstraints();
    }
};
