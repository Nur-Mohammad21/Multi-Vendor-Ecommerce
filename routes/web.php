<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\AdminManagementController;
use App\Http\Controllers\Admin\SectionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//require __DIR__.'/auth.php';

Route::prefix('/admins')->namespace('App\Http\Controllers\Admin')->group(function (){
    //admins Login Route
    Route::match(['get','post'],'login',[AdminController::class,'login'])->name('admins-login');
    Route::group(['middleware'=>['adminMiddleware']],function(){
        //admins Login Route
        Route::get('dashboard',[AdminController::class,'dashboard'])->name('admins-dashboard');
        // Update Admin Password
        Route::match(['get','post'],'/admin/update/password',[AdminController::class,'updateAdminPassword'])->name('setting-password');

        // Check Admin Password
        Route::post('/check-Admins-Password',[AdminController::class,'checkAdminPassword']);
        // update check admin password
        Route::match(['get','post'],'/update-check-Admins-Password',[AdminController::class,'updateCheckAdminPassword'])->name('update-check-admins-password');
        // update Admin Details
        Route::match(['get','post'],'UpdateAdminsDetails',[AdminController::class,'updateAdminDetails'])->name('update-admins-details');
        // update Vendor Details form
        Route::match(['get','post'],'/update-vendors-details/{slug}',[VendorController::class,'updateVendorsDetails'])->name('/admin/update-vendors-details/personal');
        Route::match(['get','post'],'/update-vendors-details/{slug}',[VendorController::class,'updateVendorsDetails'])->name('update-vendors-details/business');
        Route::match(['get','post'],'/update-vendors-details/{slug}',[VendorController::class,'updateVendorsDetails'])->name('update-vendors-details/bank');
        // View Super admin // SubAdmin // Vendors
        Route::get('/admins/{type?}',[AdminManagementController::class,'adminManagement'])->name('admin.all.vendors');
        //view vendors
        Route::get('/view-vendor-details/{id}',[AdminManagementController::class,'viewVendorDetails'])->name('view_vendor-details');
        //update Admin Status
        Route::post('/update-admin-status',[AdminController::class,'updateAdminStatus'])->name('update-admin-status');
        // section controller
        Route::get('/section-index',[SectionController::class,'sectionIndex'])->name('section-index');
        Route::get('logout',[AdminController::class,'logout'])->name('logout');
    });

});






