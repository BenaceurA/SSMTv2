<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "admin",
            'password' => Hash::make('admin'),
            'email' => "ayoub.benaceur1@gmail.com"
        ]);

        DB::table('user_permissions')->insert([
            'user_id' => 1,
            'AO_E'  => 1,
            'MO_E' => 1,
            'SO_E' => 1,

            'AO_S'  => 1,
            'MO_S'  => 1,
            'SO_S' => 1,

            'TC_E'  => 1,
            'TL_E'  => 1,
            'SC_E'  => 1,

            'TC_S' => 1,
            'TL_S'  => 1,
            'SC_S' => 1,

            'TC_CS'  => 1,
            'TL_CS'  => 1,
            'SC_E_CS' => 1,
            'SC_S_CS'  => 1,

            'AU'  => 1,
            'DU'  => 1,
        ]);
    }
}
