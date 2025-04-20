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
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'password' => 'password123',
                'role' => 'customer',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'password' => 'password123',
                'role' => 'customer',
            ],
            [
                'name' => 'Michael Johnson',
                'email' => 'michael.johnson@example.com',
                'password' => 'password123',
                'role' => 'customer',
            ],
            [
                'name' => 'Emily Davis',
                'email' => 'emily.davis@example.com',
                'password' => 'password123',
                'role' => 'customer',
            ],
            [
                'name' => 'Robert Brown',
                'email' => 'robert.brown@example.com',
                'password' => 'password123',
                'role' => 'customer',
            ],
            [
                'name' => 'Sophia Wilson',
                'email' => 'sophia.wilson@example.com',
                'password' => 'password123',
                'role' => 'customer',
            ],
            [
                'name' => 'James Moore',
                'email' => 'james.moore@example.com',
                'password' => 'password123',
                'role' => 'customer',
            ],
            [
                'name' => 'Olivia Taylor',
                'email' => 'olivia.taylor@example.com',
                'password' => 'password123',
                'role' => 'customer',
            ],
            [
                'name' => 'William Anderson',
                'email' => 'william.anderson@example.com',
                'password' => 'password123',
                'role' => 'customer',
            ],
            [
                'name' => 'Isabella Thomas',
                'email' => 'isabella.thomas@example.com',
                'password' => 'password123',
                'role' => 'customer',
            ],
            
            [
                'name' => 'Liam Martinez',
                'email' => 'liam.martinez@example.com',
                'password' => 'password123',
                'role' => 'customer',
            ],
            [
                'name' => 'Ava Garcia',
                'email' => 'ava.garcia@example.com',
                'password' => 'password123',
                'role' => 'customer',
            ],
            [
                'name' => 'Ethan Rodriguez',
                'email' => 'ethan.rodriguez@example.com',
                'password' => 'password123',
                'role' => 'customer',
            ],
            [
                'name' => 'Mia Hernandez',
                'email' => 'mia.hernandez@example.com',
                'password' => 'password123',
                'role' => 'customer',
            ],
            [
                'name' => 'Lucas Wilson',
                'email' => 'lucas.wilson@example.com',
                'password' => 'password123',
                'role' => 'customer',
            ],
            [
                'name' => 'Amelia Lee',
                'email' => 'amelia.lee@example.com',
                'password' => 'password123',
                'role' => 'customer',
            ],
            [
                'name' => 'Jack Clark',
                'email' => 'jack.clark@example.com',
                'password' => 'password123',
                'role' => 'customer',
            ],
            [
                'name' => 'Charlotte Allen',
                'email' => 'charlotte.allen@example.com',
                'password' => 'password123',
                'role' => 'customer',
            ],
            [
                'name' => 'Benjamin Young',
                'email' => 'benjamin.young@example.com',
                'password' => 'password123',
                'role' => 'customer',
            ],
            [
                'name' => 'Harper King',
                'email' => 'harper.king@example.com',
                'password' => 'password123',
                'role' => 'customer',
            ],
        ]);
    }
}
