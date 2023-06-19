<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Hélio Luiz Monteiro Júnior',
            'email' => 'heliojr.monteiro@yahoo.com.br',
            'password' => bcrypt('12345678'),

        ]);
    }
}
