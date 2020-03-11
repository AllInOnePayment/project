<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_lists')->insert([
            'service_id'=>0,
            'service_name'=>'AllInOne'
        ]);
        DB::table('service_lists')->insert([
            'service_id'=>1,
            'service_name'=>'AllInOne'
        ]);
    }
}
