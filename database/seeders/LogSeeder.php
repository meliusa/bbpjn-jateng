<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class LogSeeder extends Seeder
{
    public function run()
    {
        // Ambil semua ID dari tabel members dan gates
        $memberIds = DB::table('members')->pluck('id')->toArray();
        $gateIds = DB::table('gates')->pluck('id')->toArray();

        // Loop untuk menambah 3000 entri log
        $logs = [];
        for ($i = 0; $i < 3000; $i++) {
            $logs[] = [
                'member_id' => Arr::random($memberIds),  // Pilih ID member secara acak
                'gate_id' => Arr::random($gateIds),     // Pilih ID gate secara acak
                'created_at' => now()->subDays(rand(0, 30))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
                'updated_at' => now()->subDays(rand(0, 30))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
            ];

            // Setiap 500 data, lakukan insert ke database untuk menghindari masalah memori
            if (($i + 1) % 500 == 0 || $i == 2999) {
                DB::table('logs')->insert($logs);
                $logs = []; // Reset array setelah insert untuk batch berikutnya
            }
        }
    }
}
