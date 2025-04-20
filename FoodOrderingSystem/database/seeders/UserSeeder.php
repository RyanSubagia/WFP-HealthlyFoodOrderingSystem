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
                'poin_royalty' => 1000,
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'password' => 'password123',
                'poin_royalty' => 500,
            ],
            [
                'name' => 'Michael Johnson',
                'email' => 'michael.johnson@example.com',
                'password' => 'password123',
                'poin_royalty' => 1500,
            ],
            [
                'name' => 'Emily Davis',
                'email' => 'emily.davis@example.com',
                'password' => 'password123',
                'poin_royalty' => 300,
            ],
            [
                'name' => 'Robert Brown',
                'email' => 'robert.brown@example.com',
                'password' => 'password123',
                'poin_royalty' => 800,
            ],
            [
                'name' => 'Sophia Wilson',
                'email' => 'sophia.wilson@example.com',
                'password' => 'password123',
                'poin_royalty' => 1200,
            ],
            [
                'name' => 'James Moore',
                'email' => 'james.moore@example.com',
                'password' => 'password123',
                'poin_royalty' => 950,
            ],
            [
                'name' => 'Olivia Taylor',
                'email' => 'olivia.taylor@example.com',
                'password' => 'password123',
                'poin_royalty' => 400,
            ],
            [
                'name' => 'William Anderson',
                'email' => 'william.anderson@example.com',
                'password' => 'password123',
                'poin_royalty' => 600,
            ],
            [
                'name' => 'Isabella Thomas',
                'email' => 'isabella.thomas@example.com',
                'password' => 'password123',
                'poin_royalty' => 1100,
            ],
            
            [
                'name' => 'Liam Martinez',
                'email' => 'liam.martinez@example.com',
                'password' => 'password123',
                'poin_royalty' => 750,
            ],
            [
                'name' => 'Ava Garcia',
                'email' => 'ava.garcia@example.com',
                'password' => 'password123',
                'poin_royalty' => 1300,
            ],
            [
                'name' => 'Ethan Rodriguez',
                'email' => 'ethan.rodriguez@example.com',
                'password' => 'password123',
                'poin_royalty' => 900,
            ],
            [
                'name' => 'Mia Hernandez',
                'email' => 'mia.hernandez@example.com',
                'password' => 'password123',
                'poin_royalty' => 850,
            ],
            [
                'name' => 'Lucas Wilson',
                'email' => 'lucas.wilson@example.com',
                'password' => 'password123',
                'poin_royalty' => 700,
            ],
            [
                'name' => 'Amelia Lee',
                'email' => 'amelia.lee@example.com',
                'password' => 'password123',
                'poin_royalty' => 1100,
            ],
            [
                'name' => 'Jack Clark',
                'email' => 'jack.clark@example.com',
                'password' => 'password123',
                'poin_royalty' => 650,
            ],
            [
                'name' => 'Charlotte Allen',
                'email' => 'charlotte.allen@example.com',
                'password' => 'password123',
                'poin_royalty' => 1000,
            ],
            [
                'name' => 'Benjamin Young',
                'email' => 'benjamin.young@example.com',
                'password' => 'password123',
                'poin_royalty' => 1200,
            ],
            [
                'name' => 'Harper King',
                'email' => 'harper.king@example.com',
                'password' => 'password123',
                'poin_royalty' => 950,
            ],
        ]);
    }
}
