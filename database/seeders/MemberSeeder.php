<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MemberSeeder extends Seeder
{
    public function run()
    {
        $dummyPhotoPath = 'photos/dummy-photo.jpg'; // Updated path to the dummy photo

        $members = [
            [
                'department' => 'IT',
                'nip' => '9876543210',
                'name' => 'Budi Setiawan',
                'phone_number' => '081298765432',
                'address' => 'Jl. Mawar No. 123',
                'position' => 'Supervisor',
                'barcode' => 'BC001',
                'photo' => $dummyPhotoPath,
            ],
            [
                'department' => 'HR',
                'nip' => '1234567890',
                'name' => 'Siti Aminah',
                'phone_number' => '081234567890',
                'address' => 'Jl. Melati No. 45',
                'position' => 'Manager',
                'barcode' => 'BC002',
                'photo' => $dummyPhotoPath,
            ],
            [
                'department' => 'Finance',
                'nip' => '1112223334',
                'name' => 'Ali Akbar',
                'phone_number' => '081112223344',
                'address' => 'Jl. Cempaka No. 67',
                'position' => 'Staff',
                'barcode' => 'BC003',
                'photo' => $dummyPhotoPath,
            ],
            [
                'department' => 'Marketing',
                'nip' => '4445556667',
                'name' => 'Dewi Lestari',
                'phone_number' => '081234567891',
                'address' => 'Jl. Kenanga No. 89',
                'position' => 'Executive',
                'barcode' => 'BC004',
                'photo' => $dummyPhotoPath,
            ],
            [
                'department' => 'IT',
                'nip' => '8889990001',
                'name' => 'Rudi Hartono',
                'phone_number' => '081298765433',
                'address' => 'Jl. Bunga No. 12',
                'position' => 'Developer',
                'barcode' => 'BC005',
                'photo' => $dummyPhotoPath,
            ],
        ];

        foreach ($members as &$member) {
            // Generate random created_at and updated_at timestamps
            $createdAt = Carbon::now()->subDays(random_int(0, 30))
                ->setTime(random_int(0, 23), random_int(0, 59), random_int(0, 59));
                
            $updatedAt = (clone $createdAt)->addDays(random_int(0, 10));

            // Ensure updated_at is always later than created_at
            if ($updatedAt < $createdAt) {
                $updatedAt = $createdAt->addDays(random_int(0, 10));
            }

            $member['created_at'] = $createdAt;
            $member['updated_at'] = $updatedAt;
        }

        DB::table('members')->insert($members);
    }
}
