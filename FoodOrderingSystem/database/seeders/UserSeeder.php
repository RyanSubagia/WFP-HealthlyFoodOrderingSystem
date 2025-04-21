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
                'poin' => 10,
                'no_telp' => '081234567890',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'password' => 'password123',
                'role' => 'customer',
                'poin' => 20,
                'no_telp' => '082345678901',
            ],
            [
                'name' => 'Michael Johnson',
                'email' => 'michael.johnson@example.com',
                'password' => 'password123',
                'role' => 'customer',
                'poin' => 15,
                'no_telp' => '083456789012',
            ],
            [
                'name' => 'Emily Davis',
                'email' => 'emily.davis@example.com',
                'password' => 'password123',
                'role' => 'customer',
                'poin' => 25,
                'no_telp' => '084567890123',
            ],
            [
                'name' => 'Robert Brown',
                'email' => 'robert.brown@example.com',
                'password' => 'password123',
                'role' => 'customer',
                'poin' => 30,
                'no_telp' => '085678901234',
            ],
            [
                'name' => 'Sophia Wilson',
                'email' => 'sophia.wilson@example.com',
                'password' => 'password123',
                'role' => 'customer',
                'poin' => 5,
                'no_telp' => '086789012345',
            ],
            [
                'name' => 'James Moore',
                'email' => 'james.moore@example.com',
                'password' => 'password123',
                'role' => 'customer',
                'poin' => 40,
                'no_telp' => '087890123456',
            ],
            [
                'name' => 'Olivia Taylor',
                'email' => 'olivia.taylor@example.com',
                'password' => 'password123',
                'role' => 'customer',
                'poin' => 10,
                'no_telp' => '088901234567',
            ],
            [
                'name' => 'William Anderson',
                'email' => 'william.anderson@example.com',
                'password' => 'password123',
                'role' => 'customer',
                'poin' => 50,
                'no_telp' => '089012345678',
            ],
            [
                'name' => 'Isabella Thomas',
                'email' => 'isabella.thomas@example.com',
                'password' => 'password123',
                'role' => 'customer',
                'poin' => 60,
                'no_telp' => '081234567890',
            ],
            [
                'name' => 'Liam Martinez',
                'email' => 'liam.martinez@example.com',
                'password' => 'password123',
                'role' => 'customer',
                'poin' => 35,
                'no_telp' => '082345678901',
            ],
            [
                'name' => 'Ava Garcia',
                'email' => 'ava.garcia@example.com',
                'password' => 'password123',
                'role' => 'customer',
                'poin' => 45,
                'no_telp' => '083456789012',
            ],
            [
                'name' => 'Ethan Rodriguez',
                'email' => 'ethan.rodriguez@example.com',
                'password' => 'password123',
                'role' => 'customer',
                'poin' => 25,
                'no_telp' => '084567890123',
            ],
            [
                'name' => 'Mia Hernandez',
                'email' => 'mia.hernandez@example.com',
                'password' => 'password123',
                'role' => 'customer',
                'poin' => 55,
                'no_telp' => '085678901234',
            ],
            [
                'name' => 'Lucas Wilson',
                'email' => 'lucas.wilson@example.com',
                'password' => 'password123',
                'role' => 'customer',
                'poin' => 30,
                'no_telp' => '086789012345',
            ],
            [
                'name' => 'Amelia Lee',
                'email' => 'amelia.lee@example.com',
                'password' => 'password123',
                'role' => 'customer',
                'poin' => 15,
                'no_telp' => '087890123456',
            ],
            [
                'name' => 'Jack Clark',
                'email' => 'jack.clark@example.com',
                'password' => 'password123',
                'role' => 'customer',
                'poin' => 20,
                'no_telp' => '088901234567',
            ],
            [
                'name' => 'Charlotte Allen',
                'email' => 'charlotte.allen@example.com',
                'password' => 'password123',
                'role' => 'customer',
                'poin' => 40,
                'no_telp' => '089012345678',
            ],
            [
                'name' => 'Benjamin Young',
                'email' => 'benjamin.young@example.com',
                'password' => 'password123',
                'role' => 'customer',
                'poin' => 10,
                'no_telp' => '081234567890',
            ],
            [
                'name' => 'Harper King',
                'email' => 'harper.king@example.com',
                'password' => 'password123',
                'role' => 'customer',
                'poin' => 5,
                'no_telp' => '082345678901',
            ],
        ]);
    }
}
