<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            [
                'name' => 'GreatAdmin',
                'email' => 'admin@la.fr',
                'password' => bcrypt('admin'),
            ],

            [
                'name' => 'GreatRedactor',
                'email' => 'redac@la.fr',
                'password' => bcrypt('redac'),
            ],

            [
                'name' => 'Walker',
                'email' => 'walker@la.fr',
                'password' => bcrypt('walker'),
            ],

            [
                'name' => 'Slacker',
                'email' => 'slacker@la.fr',
                'password' => bcrypt('slacker'),
            ]

        ]);
        DB::table('jokes')->insert([
            [
                'body' => 'This is the test sentence',
                'user_id' => 1
            ]
        ]);
    }
}
