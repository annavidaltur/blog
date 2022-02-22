<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'Anna Vidal',
            'email' => 'annavidaltur@gmail.com',
            'password' => bcrypt('1234')
        ])->assignRole('Admin');
        
        User::factory(10)->create();
    }
}
