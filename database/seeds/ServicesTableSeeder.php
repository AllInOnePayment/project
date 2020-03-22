<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'service_name'=>'AllInOneUser'
        ]);
        DB::table('services')->insert([
            'service_name'=>'AllInOneAdmin'
        ]);
    }
}
