<?php

namespace Database\Seeders;

use App\Models\Vendor;
use App\Models\VendorsBankDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorTableSeeder extends Seeder
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
                'name'=> 'Masud',
                'mobile'=>'01720254621',
                'email'=> 'masud@gmail.com',
                'address'=>'Kuril',
                'city'=> 'Dhaka',
                'country'=> 'Bangladesh',
                'country_code'=> '147258',
                'image'=> 'pic.jpg',
                'status'=> '1',
            ],
        ];
        Vendor::insert($vendorsRecords);
    }
}
