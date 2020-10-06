<?php

use App\User;
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
        $admin = User::create([
        	'nik' => '213124',
            'nama' => 'Admin',
            'umur' => '20',
            'gender' => 'kosong',
            'email' => 'admin@paulusmiki.id',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'nik' => '352532',
            'nama' => 'User',
            'umur' => '21',
            'gender' => 'kosong',
            'email' => 'user@paulusmiki.id',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('user');
    }
}