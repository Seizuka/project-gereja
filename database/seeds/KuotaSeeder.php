<?php

use Illuminate\Database\Seeder;

class KuotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('kuota')->insert([
            'id' => 1,
            'kuota' => 100
        ]);
    }
}
