<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Armand du Plessis',
            'email' => 'superadmin@demo.com',
            'password' => Hash::make('123456789'),
        ]);
        $user->assignRole('Super Admin');

        User::factory()
            ->count(100)
            ->withRandomRole()
            ->create();
    }


}
