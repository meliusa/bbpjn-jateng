<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MemberSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        DB::table('members')->insert([
            [
                'department' => 'IT',
                'nip' => '9876543210',
                'name' => 'Budi Setiawan',
                'phone_number' => '081298765432',
                'address' => 'Jl. Mawar No. 123',
                'position' => 'Supervisor',
                'barcode' => 'BC001',
                'photo' => '/uploads/members/budi.jpg',
                'created_at' => $now->subDays(rand(0, 30)),
                'updated_at' => $now->subDays(rand(0, 30)),
            ],
            [
                'department' => 'HR',
                'nip' => '1234567890',
                'name' => 'Siti Aminah',
                'phone_number' => '081234567890',
                'address' => 'Jl. Melati No. 45',
                'position' => 'Manager',
                'barcode' => 'BC002',
                'photo' => '/uploads/members/siti.jpg',
                'created_at' => $now->subDays(rand(0, 30)),
                'updated_at' => $now->subDays(rand(0, 30)),
            ],
            [
                'department' => 'Finance',
                'nip' => '1112223334',
                'name' => 'Ali Akbar',
                'phone_number' => '081112223344',
                'address' => 'Jl. Cempaka No. 67',
                'position' => 'Staff',
                'barcode' => 'BC003',
                'photo' => '/uploads/members/ali.jpg',
                'created_at' => $now->subDays(rand(0, 30)),
                'updated_at' => $now->subDays(rand(0, 30)),
            ],
            [
                'department' => 'Marketing',
                'nip' => '4445556667',
                'name' => 'Dewi Lestari',
                'phone_number' => '081234567891',
                'address' => 'Jl. Kenanga No. 89',
                'position' => 'Executive',
                'barcode' => 'BC004',
                'photo' => '/uploads/members/dewi.jpg',
                'created_at' => $now->subDays(rand(0, 30)),
                'updated_at' => $now->subDays(rand(0, 30)),
            ],
            [
                'department' => 'IT',
                'nip' => '8889990001',
                'name' => 'Rudi Hartono',
                'phone_number' => '081298765433',
                'address' => 'Jl. Bunga No. 12',
                'position' => 'Developer',
                'barcode' => 'BC005',
                'photo' => '/uploads/members/rudi.jpg',
                'created_at' => $now->subDays(rand(0, 30)),
                'updated_at' => $now->subDays(rand(0, 30)),
            ],
        ]);
    }
}