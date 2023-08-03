<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Padidi',
                'email' => 'pogi@padidi.com',
                'password' => bcrypt('123456789'),
            ),
        ));
    }
}
