<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        \App\Models\Student::create([
            'name' => 'Alice Johnson',
            'email' => 'alice@example.com',
            'age' => 20,
            'phone' => '09171234567',
            'status' => 'active',
        ]);

        \App\Models\Student::create([
            'name' => 'Bob Santos',
            'email' => 'bob@example.com',
            'age' => 22,
            'phone' => '09187654321',
            'status' => 'pending',
        ]);

        \App\Models\Student::create([
            'name' => 'Carol Reyes',
            'email' => 'carol@example.com',
            'age' => 19,
            'phone' => null,
            'status' => 'active',
        ]);

        \App\Models\Student::create([
            'name' => 'David Cruz',
            'email' => 'david@example.com',
            'age' => 21,
            'phone' => '09223456789',
            'status' => 'inactive',
        ]);
    }
}
