<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
          [
              'nama' => 'Spatium Community',
              'username' => 'admin',
              'password' => bcrypt('admin'),
              'email' => 'spatiumcom@gmail.com',
              'kota' => 'Kraksaan',
              'alamat' => 'Kraksaan',
              'role' => 'Admin',
          ], 
        ];
        $perusahaans = [
            [
              'nama' => 'Admin Dashboard',
              'username' => 'admin1',
              'password' => bcrypt('admin1'),
              'email' => 'spatiumadmin@gmail.com',
              'kota' => 'Kraksaan',
              'alamat' => 'Kraksaan',
              'role' => 'Admin',
            ],
        ];
        
        DB::table('users')->insert($users);
        DB::table('perusahaans')->insert($perusahaans);
        
    }
}
