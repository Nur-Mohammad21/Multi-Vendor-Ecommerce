<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Image;
class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function updateAdminPassword()
    {
//        echo "<pre>";
//        print_r(Auth::guard('admin')->user()); die;
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.setting.update_admins_password')->with(compact('adminDetails'));
    }
    public function checkAdminPassword(Request $request)
    {
        $data = $request->all();
//            echo '<pre>';
//            print_r($data); die;
        if (Hash::check($data['current_password'],Auth::guard('admin')->user()->password))
        {
            return "true";
        }
        else
        {
            return "false";
        }
    }
    public function updateCheckAdminPassword(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $data = $request->all();
//            echo '<pre>'; print_r($data); die;
            // Check if current password entered by admin is correct
            if (!Hash::check($data['current_password'],Auth::guard('admin')->user()->passeowd))
            {
                // check if new password is matching with confirm password
                if($data['confirm_Password']==$data['new_password'])
                {
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_password'])]);
                    return redirect()->back()->with('success_message','Password has been update successfully!');
                }
                else
                {
                    return redirect()->back()->with('error_message','new password and confirm password does not match ');
                }
            }
            else
            {
                return redirect()->back()->with('error_message','Your Current Password is Incorrect');
            }
        }

    }
    public function updateAdminDetails(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $data = $request->all();
//            echo '<pre>'; print_r($data); die;
            $rules = [
                'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'admin_mobile' => 'required|numeric|min:11',
            ];
            $customMessage = [
                'admin_name.required' => 'Name is required',
                'admin_name.regex' => 'Valid name is required',
                'admin_mobile.required' => 'Mobile required',
                'admin_mobile.numeric' => 'Valid Mobile is required',
            ];
            $this->validate($request,$rules,$customMessage);
            // admin Image/ Photo Upload
            if ($request->hasFile('admin_image'))
            {
                $image_tmp = $request->file('admin_image');
                if ($image_tmp->isValid())
                {
                    // get Image Extension
                   $extension = $image_tmp->getClientOriginalExtension();
                    // Generate new  Image Name
                    $imageName = rand(111,99999).'.'.$extension;
                   $imagePath =  'admin/images/photo/';
                    // upload new Image/Photo
                   // Image::make($image_tmp)->resize(300,300)->save($imagePath);
                    $image_tmp->move($imagePath,$imageName);
                }else if (!empty($data['current_admin_image']))
                {
                    $imageName = $data['current_admin_image'];
                }else{
                    $imageName = '';
                }
            }

            Admin::where('id',Auth::guard('admin')->user()->id)
                ->update(['name'=>$data['admin_name'],'mobile'=>$data['admin_mobile'],'image'=>$imageName]);
            return redirect()->back()->with('success_message','Admins Detail Update Successfully!');

        }
        $adminCheckDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.setting.update_admins_details')->with(compact('adminCheckDetails'));
    }
    public function login( Request $request)
    {
//        echo $password = Hash::make('12345678'); die;
        if ($request->isMethod('post'))
        {
            $data = $request->all();
//            echo '<pre>';
//            print_r($data); die;
            $rules = [
                'email' => 'required|email:max:255',
                'password' => 'required',
            ];
            $customMessage = [
                'email.required' => 'Email Address required',
                'email.email' => 'Valid Email Address required',
                'password.required' => 'Password required',
            ];
            $this->validate($request,$rules,$customMessage);

            if (Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'], 'status'=>1]))
            {
                return  redirect('/admins/dashboard');
            }
            else
            {
                return redirect()->back()->with('error_message','Invalid Email or Password');
            }
        }

        return view('admin.login');
    }
    public function updateAdminStatus(Request $request)
    {
        if ($request->ajax())
        {
            $data = $request->all();
            //echo "<pre>";print_r($data); die;
            if ($data["status"]=="Active") {
                $status =0;
            }else{
                $status =1;
            }
            Admin::where('id',$data["admin_id"])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'admin_id'=>$data['admin_id']]);
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('logout');
    }
}
