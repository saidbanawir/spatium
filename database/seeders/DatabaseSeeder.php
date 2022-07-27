<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
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
        // \App\Models\User::factory(10)->create();

        // $faker = faker::create();
        // foreach(range(1,100) as $index)
        // {
        //     DB::table('users')->insert([
        //         'nama' => $faker->name,
        //         'username' => $faker->unique()->userName,
        //         'email' => $faker->unique()->safeEmail,
        //         'password' => Hash::make('password'),
        //         'kota' => 'Surabaya',
        //         'role' => 'Member',
        //         'alamat' => 'Surabaya',
        //         'created_at' => $faker->dateTimeBetween('-6 month','+1 month'),
        //     ]);
        // }

        $this->call([
            UserSeeder::class,
            LocationSeeder::class,
        ]);

    }
}
