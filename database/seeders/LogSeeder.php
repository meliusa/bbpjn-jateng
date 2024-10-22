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
        $memberIds = DB::table('members')->pluck('id')->toArray();
        $gateIds = DB::table('gates')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            DB::table('logs')->insert([
                'member_id' => Arr::random($memberIds),
                'gate_id' => Arr::random($gateIds),
                'created_at' => now()->subDays(rand(0, 30))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
                'updated_at' => now()->subDays(rand(0, 30))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
            ]);
        }
    }
}
