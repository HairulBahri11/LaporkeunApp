<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'guru']);
        Role::create(['name' => 'siswa']);


        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ]);
        $admin->assignRole('admin');

        $admin = User::create([
            'name' => 'beni',
            'email' => 'beni@gmail.com',
            'password' => bcrypt('beni123'),
            'role' => 'guru'
        ]);
        $admin->assignRole('guru');

        $admin = User::create([
            'name' => 'dinda',
            'email' => 'dinda@gmail.com',
            'password' => bcrypt('dinda123'),
            'role' => 'siswa'
        ]);
        $admin->assignRole('siswa');
    }
}
