<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class MemberSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $dummyPhotoPath = 'photos/dummy-photo.jpg'; // Path untuk foto dummy

        $departments = ['IT', 'HR', 'Finance', 'Marketing'];
        $positions = ['Supervisor', 'Manager', 'Staff', 'Executive', 'Developer'];

        $members = [];

        // Loop untuk menghasilkan 3000 data dummy
        for ($i = 0; $i < 3000; $i++) {
            $department = $departments[array_rand($departments)];
            $position = $positions[array_rand($positions)];

            $createdAt = Carbon::now()->subDays(random_int(0, 30))
                ->setTime(random_int(0, 23), random_int(0, 59), random_int(0, 59));

            $updatedAt = (clone $createdAt)->addDays(random_int(0, 10));

            // Pastikan updated_at lebih besar dari created_at
            if ($updatedAt < $createdAt) {
                $updatedAt = $createdAt->addDays(random_int(0, 10));
            }

            // Menambahkan data member
            $members[] = [
                'department' => $department,
                'nip' => $faker->unique()->numerify('############'), // NIP unik
                'name' => $faker->name, // Nama acak
                'phone_number' => $faker->numerify('08##########'), // Format nomor telepon lebih pendek (12 digit)
                'address' => $faker->address, // Alamat acak
                'position' => $position,
                'barcode' => 'BC' . str_pad($i + 1, 3, '0', STR_PAD_LEFT), // Barcode unik
                'photo' => $dummyPhotoPath,
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ];

            // Batch insert setiap 500 data untuk efisiensi
            if (count($members) >= 500) {
                DB::table('members')->insert($members);
                $members = []; // Kosongkan array setelah insert
            }
        }

        // Insert sisa data jika ada yang tersisa
        if (count($members) > 0) {
            DB::table('members')->insert($members);
        }
    }
}
