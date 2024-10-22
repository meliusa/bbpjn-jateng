<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GateSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        DB::table('gates')->insert([
            [
                'gate_code' => 'G123',
                'gate_number' => '1',
                'door_number' => 'A1',
                'created_at' => $now->subDays(rand(0, 30)),
                'updated_at' => $now->subDays(rand(0, 30)),
            ],
            [
                'gate_code' => 'G124',
                'gate_number' => '2',
                'door_number' => 'B2',
                'created_at' => $now->subDays(rand(0, 30)),
                'updated_at' => $now->subDays(rand(0, 30)),
            ],
            [
                'gate_code' => 'G125',
                'gate_number' => '3',
                'door_number' => 'C3',
                'created_at' => $now->subDays(rand(0, 30)),
                'updated_at' => $now->subDays(rand(0, 30)),
            ],
            [
                'gate_code' => 'G126',
                'gate_number' => '4',
                'door_number' => 'D4',
                'created_at' => $now->subDays(rand(0, 30)),
                'updated_at' => $now->subDays(rand(0, 30)),
            ],
            [
                'gate_code' => 'G127',
                'gate_number' => '5',
                'door_number' => 'E5',
                'created_at' => $now->subDays(rand(0, 30)),
                'updated_at' => $now->subDays(rand(0, 30)),
            ],
        ]);
    }
}
