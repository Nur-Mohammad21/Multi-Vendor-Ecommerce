<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminManagementController extends Controller
{
    public function adminManagement($type =null)
    {
//        $admins = Admin::get()->toArray();
//        dd($admins);
//        echo print_r($admins); die;
        $admins = Admin::query();
        if (!empty($type))
        {
            $admins = $admins->where('type',$type);
            $title = ucfirst($type)."s";
            // return $admins;
        }else{
            $title = " All SuperAdmin/SubAdmin/Vendors";
        }
        $admins = $admins->get()->toArray();
//        return $admins;
        return view('admin.admin_management.admins')->with(compact('admins','title'));
//        dd($admins);
    }
    public function viewVendorDetails($id)
    {
        $vendorDetails = Admin::with('vendor_personal','vendor_business','vendor_bank')->where('id',$id)->first();
        $vendorDetails = json_decode(json_encode($vendorDetails),true);
         // dd($vendorDetails);
        return view('admin.vendor.view_vendor_details')->with(compact('vendorDetails'));
    }


}
