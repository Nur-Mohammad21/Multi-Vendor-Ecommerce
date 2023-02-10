<?php

namespace Database\Seeders;

use App\Models\VendorsBankDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorsRecords =[
            [
                'id'=>1,
                'vendor_id'=> '1',
                'bank_email'=> 'masud@gmail.com',
                'account_holder_name'=>'Admin Electronic Store',
                'bank_name'=> 'Basic Bank',
                'account_number'=>'0100008482',
                'account_ifsc_code'=> '147258',
            ],
        ];
         VendorsBankDetail::insert($vendorsRecords);

    }
}
