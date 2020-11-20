<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'service_name'=>'Customer',
            'http'=>'www.allinone.com',
            'bank_account'=>'0' ,
            'payment_start'=>'0',
            'payment_end'=>'0',
            'group'=>'1'
        ]);
        DB::table('services')->insert([
            'service_name'=>'SuperAdmin',
            'http'=>'www.allinone.com',
            'bank_account'=>'0' ,
            'payment_start'=>'0',
            'payment_end'=>'0',
            'group'=>'2'
        ]);
    }
}
/*
DB::table('services')->insert([
    'service_name'=>'Customer'
    'http'=>'www.allinone.com'
    'bank_account'=>'0' 
    'payment_start'=>'0'
    'payment_end'=>'0'
    'group'=>'0'
]);
DB::table('services')->insert([
    'service_name'=>'SuperAdmin'
    'http'=>'www.allinone.com'
    'bank_account'=>'0' 
    'payment_start'=>'0'
    'payment_end'=>'0'
    'group'=>'0'
]);*/