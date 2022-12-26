<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => "Kenet Jose Picado Rojas",
            'email' => "kenetpicado1@gmail.com",
            'password' => bcrypt('26051998'),
            'dollar_price' => 36,
            'commission' => 4,
        ]);

        $user->assignRole('admin');

        $elmer = User::create([
            'name' => "Elmer Xavier Mendez Fargas",
            'email' => "mendezfargas06@gmail.com",
            'password' => bcrypt('elmer.bonanza06'),
            'dollar_price' => 43,
            'commission' => 7,
        ]);

        $elmer->assignRole('seller');
    }
}
