<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'en_name' => 'Admin',
            'np_name' => 'Admin',
            'gender' => 'Female',
            'designation' => 'Laravel Developer',
            'address' => 'Kalanki, Kathmandu',
            'contact_number' => '9834234234',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'slug' => Str::slug('admin'),
        ]);
    }
}
