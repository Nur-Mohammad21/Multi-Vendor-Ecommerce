<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Country;
use App\Models\VendorsBankDetail;
use App\Models\VendorsBusinessDetail;
use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
class VendorController extends Controller
{
    public function updateVendorsDetails($slug,Request $request)
    {
        if ($slug == "personal") {
            if ($request->isMethod('post'))
            {
                $data = $request->all();
//                echo '<pre>';print_r($data); die;
//                $rules = [
//                    'vendor_name' => 'required|regex:/^[\pL\s\-]+$/u',
//                    'vendor_city' => 'required|regex:/^[\pL\s\-]+$/u',
//                    'mobile' => 'required|numeric|min:11',
//                    'vendor_address' => 'required',
//                    'vendor_image' => 'required|image|mimes:jpg,png,jpeg,gif,
//                                        svg|max:2048|dimensions:min_width=100,
//                                        min_height=100,max_width=1000,max_height=1000'
//
//                ];
//                $customMessage = [
//                    'vendor_name.required' => 'Name is required',
//                    'vendor_name.regex' => 'Valid name is required',
//                    'vendor_city.required' => 'City is required',
//                    'vendor_city.regex' => 'Valid City is required',
//                    'mobile.required' => 'Mobile required',
//                    'mobile.numeric' => 'Valid Mobile is required',
//                    'vendor_address.required' => 'Address is required',
//                    'vendor_image.required' => 'Valid Image is required',
//                ];
               // echo '<pre>';print_r($data); die;
                //$this->validate($request,$rules,$customMessage);
                // admin Image/ Photo Upload
                if ($request->hasFile('vendor_image'))
                {
                    $image_tmp = $request->file('vendor_image');
                    if ($image_tmp->isValid())
                    {
                        // get Image Extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        // Generate new  Image Name
                        $imageName = rand(111,99999).'.'.$extension;
                        $imagePath =  'admin/images/vendor_image/';
                        // upload new Image/Photo
                        // Image::make($image_tmp)->resize(300,300)->save($imagePath);
                        $image_tmp->move($imagePath,$imageName);
                    }else if (!empty($data['current_vendor_image']))
                    {
                        $imageName = $data['current_vendor_image'];
                    }else{
                        $imageName = '';
                    }
                }
//                echo print_r($data); die;
                //update in Admins tables
                Admin::where('id',Auth::guard('admin')->user()->id)
                    ->update(['name'=>$data['vendor_name'],'mobile'=>$data['mobile'],'image'=>$imageName]);
                //Vendor in Admins tables
                Vendor::where('id',Auth::guard('admin')->user()->vendor_id)
                        ->update(['name'=>$data['vendor_name'],
                            'mobile'=>$data['mobile'],
                            'address'=>$data['vendor_address'],
                            'city'=>$data['vendor_city'],
                            'country'=>$data['vendor_country'],
                            'country_code'=>$data['country_code'],
                            'image'=>$imageName,
                        ]);
                return redirect()->back()->with('success_message','Vendor Detail Update Successfully!');
            }
            $vendorDetails = Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->first();

        } else if ($slug == "business") {
            if ($request->isMethod('post'))
            {
                $data = $request->all();
//                echo '<pre>';print_r($data); die;
//                $rules = [
//                    'shop_name' => 'required|regex:/^[\pL\s\-]+$/u',
//                    'shop_city' => 'required|regex:/^[\pL\s\-]+$/u',
//                    'shop_mobile' => 'required|numeric|min:11',
//                    'shop_address' => 'required',
//                    'shop_country' => 'required',
//                    'address_proof' => 'required',
//                    'address_proof_image' => 'required|image'
//                ];
//                $customMessage = [
//                    'shop_name.required' => 'Name is required',
//                    'shop_name.regex' => 'Valid name is required',
//                    'shop_city.required' => 'City is required',
//                    'shop_city.regex' => 'Valid City is required',
//                    'shop_mobile.required' => 'Mobile required',
//                    'shop_mobile.numeric' => 'Valid Mobile is required',
//                    'shop_address.required' => 'Address is required',
//                    'address_proof.required' => 'Address is required',
//                    'shop_country.required' =>'Shop Country is required',
//                    'address_proof_image.required' => 'Address Proof Image is required',
//                    'address_proof_image.image' => 'Valid Address Proof Image is required',
//                ];
////                 echo '<pre>';print_r($data); die;
//                $this->validate($request,$rules,$customMessage);
                // admin Image/ Photo Upload

                if ($request->hasFile('address_proof_image'))
                {
                    $image_tmp = $request->file('address_proof_image');
//                    echo '<pre>';print_r($image_tmp); die;
                    if ($image_tmp->isValid())
                    {
                        // get Image Extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        // Generate new  Image Name
                        $imageName = rand(111,99999).'.'.$extension;
                        $imagePath =  'admin/images/proofs/';
                        // upload new Image/Photo
                        // Image::make($image_tmp)->resize(300,300)->save($imagePath);
                        $image_tmp->move($imagePath,$imageName);
//                        echo '<pre>';print_r($image_tmp); die;
                    }
                    else if (!empty($data['current_address_proof_image']))
                    {
                        $imageName = $data['current_address_proof_image'];
                    }else{
                        $imageName = '';
                    }
                }
                //Update in vendor_business_details tables
                VendorsBusinessDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)
                    ->update([
                        'shop_name'=>$data['shop_name'],
                        'shop_email'=>$data['shop_email'],
                        'shop_mobile'=>$data['shop_mobile'],
                        'shop_address'=>$data['shop_address'],
                        'shop_city'=>$data['shop_city'],
                        'shop_country'=>$data['shop_country'],
                        'shop_website'=>$data['shop_website'],
                        'address_proof'=>$data['address_proof'],
                        'business_license_number'=>$data['business_license_number'],
                        'gst_number'=>$data['gst_number'],
                        'pan_number'=>$data['pan_number'],
                        'address_proof_image'=> $imageName,
                    ]
                    );
                return redirect()->back()->with('success_message','Vendor Business Detail Update Successfully!');
            }
            $vendorDetails = VendorsBusinessDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first();
//            dd($vendorDetails);
        } else if ($slug == "bank") {
            if ($request->isMethod('post'))
            {
                $data = $request->all();
//                echo '<pre>';print_r($data); die;
                $rules = [
                    'bank_email' => 'required',
                    'account_holder_name' => 'required',
                    'bank_name' => 'required',
                    'account_number' => 'required',
                    'account_ifsc_code' => 'required',
                ];
                $customMessage = [
                    'bank_email.required' => 'Email is required',
                    'account_holder_name.regex' => 'Account Holder name is required',
                    'bank_name' => 'Bank name is required',
                    'account_number.required' => 'Account Number is required',
                    'account_ifsc_code.required' => 'Account IFIS Code is required',
                ];
//                 echo '<pre>';print_r($data); die;
                $this->validate($request,$rules,$customMessage);
                VendorsBankDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)
                    ->update([
                            'bank_email'=>$data['bank_email'],
                            'account_holder_name'=>$data['account_holder_name'],
                            'bank_name'=>$data['bank_name'],
                            'account_number'=>$data['account_number'],
                            'account_ifsc_code'=>$data['account_ifsc_code'],
                        ]
                    );
                return redirect()->back()->with('success_message','Vendor Bank Detail Update Successfully!');
            }
            $vendorDetails = VendorsBankDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first();
//            dd($vendorDetails);
        }
        $countries = Country::where('status',1)->get()->toArray();
        return view('admin.vendor.update_vendor_details')->with(compact('slug','vendorDetails','countries'));
    }
}
