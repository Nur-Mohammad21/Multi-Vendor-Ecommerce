<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Auth;

class Admin extends Authenticable
{
    use HasFactory;
    protected $guard = 'Admin';

    public function vendor_personal()
    {
        return $this->belongsTo(Vendor::class,'vendor_id');
    }
    public function vendor_business()
    {
        return $this->belongsTo(VendorsBusinessDetail::class,'vendor_id');
    }
    public function vendor_bank()
    {
        return $this->belongsTo(VendorsBankDetail::class,'vendor_id');
    }
}
