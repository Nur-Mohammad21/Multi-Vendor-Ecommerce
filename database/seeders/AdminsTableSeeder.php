<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            [
                'id'=>3,
                'name'=> 'Nur Mohammad',
                'type'=> 'subadmin',
                'vendor_id'=>3,
                'mobile'=>'01500000000',
                'email'=> 'subadmin@gmail.com',
                'password'=>'$2a$12$uj.JTSAGcIRNQfK3crcXEejVbCS3TtwidZry4nU8B9OIonbFhzgHq',
                'image'=> '',
                'status'=>1,
            ],
//            [
//                'id'=>2,
//                'name'=> 'Admin',
//                'type'=> 'admin',
//                'vendor_id'=>0,
//                'mobile'=>'01511111111',
//                'email'=> 'admin@admin.com',
//                'password'=>'',
//                'image'=> '',
//                'status'=>1,
//            ],
        ];
        Admin::insert($adminRecords);
    }
}
