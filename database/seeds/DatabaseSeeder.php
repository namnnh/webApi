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

            ['username' => 'GreatAdmin',
            'email' => 'admin@la.fr',
            'password' => bcrypt('admin'),
            'seen' => true,
            'role_id' => 1,
            'valid' => true,
            'confirmed' => true],

            ['username' => 'GreatRedactor',
            'email' => 'redac@la.fr',
            'password' => bcrypt('redac'),
            'seen' => true,
            'role_id' => 2,
            'valid' => true,
            'confirmed' => true],

            ['username' => 'Walker',
            'email' => 'walker@la.fr',
            'password' => bcrypt('walker'),
            'seen' => false,
            'role_id' => 3,
            'valid' => false,
            'confirmed' => true],

            ['username' => 'Slacker',
            'email' => 'slacker@la.fr',
            'password' => bcrypt('slacker'),
            'seen' => false,
            'role_id' => 3,
            'valid' => false,
            'confirmed' => true]

        ]);
        // DB::table('jokes')->insert([
        //     [
        //         'body' => 'This is the test sentence',
        //         'user_id' => 1
        //     ]
        // ]);
         DB::table('roles')->insert([

            ['title' => 'Administrator', 'slug' => 'admin'],
            ['title' => 'Redactor', 'slug' => 'redac'],
            ['title' => 'User', 'slug' => 'user']

        ]);
    }
}
