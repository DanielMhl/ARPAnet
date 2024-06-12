<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userRoot = [
            'name' => 'root',
            'email' => 'root@outlook.com',
            'password' => '$2y$10$IFRVH0.rUGzyKFPTX/z7kuSxbm4bq1eSQXh3GS20CEO7DN09oUVDm',
            'tipo' => 'admin',
            'created_at' => '2022-11-23 21:34:44',
            'updated_at' => '2022-11-23 21:34:44',
            'foto' => 'perfil.png'
        ];

        DB::table('users')->insert($userRoot);
    }
}
