<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\VendorsBusinessDetail;

class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $BusinessRecords = [
            [
                'id'=>1,
                'vendor_id'=> '1',
                'shop_name'=> 'Electronic Product',
                'shop_email'=>'shop@gmail.com',
                'shop_mobile'=>'01500000000',
                'shop_address'=>'Dhaka-1212',
                'shop_city'=>'Dhaka',
                'shop_country'=>'Bangladesh',
                'shop_website'=>'electronic.com',
                'address_proof'=>'badda Dhaka',
                'address_proof_image'=>'img.jpg',
                'business_license_number'=>'112235',
                'gst_number'=>'12549',
                'pan_number'=>'78956',
            ]
    ];
        VendorsBusinessDetail::insert($BusinessRecords);
    }
}
