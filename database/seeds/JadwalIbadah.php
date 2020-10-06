<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalIbadah extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('jadwal_ibadah')->insert([
            'id' => 1,
            'jadwal' => 'Ibadah Pagi',
            'mulai' => '07.00',
            'selesai' => '04.00',
            'kuota' => 100
        ]);

        DB::table('jadwal_ibadah')->insert([
            'id' => 2,
            'jadwal' => 'Ibadah Malam',
            'mulai' => '18.00',
            'selesai' => '20.00',
            'kuota' => 100
        ]);
    }
}
