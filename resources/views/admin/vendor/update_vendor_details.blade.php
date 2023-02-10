@extends('admin.layout.layout')
@section('title')
    Update Vendor Details
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Update Vendor Details</h3>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($slug=="personal")
            <div class="row">
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Personal Vendor Information</h4>
                            @if(Session::has('success_message'))
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong>  {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if(Session::has('error_message'))
                                <div class="alert alert-red alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong>  {{ Session::get('error_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form class="forms-sample" action="{{ url('/admins/update-vendors-details/personal') }}" method="post" enctype="multipart/form-data">@csrf
                                <div class="form-group">
                                    <label>Vendor Username/Email</label>
                                    <input  class="form-control" value="{{ $vendorDetails['email'] }}" readonly="" >
                                </div>
                                <div class="form-group">
                                    <label>Admin Type</label>
                                    <input class="form-control" value="{{  Auth::guard('admin')->user()->type }}" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="vendor_name">Name</label>
                                    <input type="text" class="form-control" id="vendor_name" name="vendor_name" value="{{  Auth::guard('admin')->user()->name }}"
{{--                                           value="{{ $vendorDetails['name'] }}"--}}
{{--                                           value="{{  Auth::guard('admin')->user()->name }}"--}}
                                           placeholder="Enter your name" required="">
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter 11-13 digit enter mobile number"
                                           value="{{  Auth::guard('admin')->user()->mobile }}"
                                           maxlength="13" minlength="11" required="">
                                </div>
                                <div class="form-group">
                                    <label for="vendor_address">Address</label>
                                    <input type="text" class="form-control" id="vendor_address" name="vendor_address"  value=" {{ $vendorDetails['address'] }}"
                                           placeholder="Enter your Address" required="">
                                </div>
                                <div class="form-group">
                                    <label for="vendor_city">City</label>
                                    <input type="text" class="form-control" id="vendor_city" name="vendor_city"  value=" {{ $vendorDetails['city'] }}"
                                           placeholder="Enter your City Name" required="">
                                </div>
                                <div class="form-group">
                                    <label for="vendor_country">Country</label>
{{--                                    <input type="text" class="form-control" id="vendor_country" name="vendor_country"  value="{{ $vendorDetails['country'] }}"--}}
{{--                                           placeholder="Enter your City Country" required="">--}}
                                    <select class="form-control" id="vendor_country" name="vendor_country" style="color: #495057;">
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country['country_name'] }}" @if($country['country_name'] == $vendorDetails['country']) selected @endif> {{ $country['country_name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="country_code">Country Code</label>
                                    <input type="text" class="form-control" id="country_code" name="country_code"  value="{{ $vendorDetails['country_code'] }}"
                                           placeholder="Enter your City Country" required="">
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <label for="pincode">PinCode</label>--}}
{{--                                    <input type="text" class="form-control" id="pincode" name="pincode"  value="{{ $vendorDetails['pincode'] }}"--}}
{{--                                           placeholder="Enter your City Country" required="">--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label for="vendor_image">Vendor Photo</label>
                                    <input type="file" class="form-control" id="vendor_image" name="vendor_image" placeholder="Enter your Photo" required="">
                                    @if(!empty($vendorDetails['image']))
                                        <a target="_blank" href=" {{ url('admin/images/vendor_image/'.$vendorDetails['image']) }}">View Image</a>
                                        <input type="hidden" name="current_vendor_image" value=" {{  $vendorDetails['image'] }}">
                                    @endif
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($slug=="business")
            <div class="row">
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update shop Business Information Details</h4>
                            @if(Session::has('success_message'))
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong>  {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if(Session::has('error_message'))
                                <div class="alert alert-red alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong>  {{ Session::get('error_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form class="forms-sample" action="{{ url('/admins/update-vendors-details/business') }}" method="post" enctype="multipart/form-data">@csrf
                                <div class="form-group">
                                    <label for="shop_email">Shop Username/Email</label>
                                    <input  class="form-control" id="shop_email" name="shop_email"  value="{{ $vendorDetails['shop_email'] }}" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="shop_name"> Shop Name</label>
                                    <input type="text" class="form-control" id="shop_name" name="shop_name"  value="{{ $vendorDetails['shop_name'] }}"
                                           placeholder="Enter your Shop name" required="">
                                </div>
                                <div class="form-group">
                                    <label for="shop_mobile">Shop Mobile</label>
                                    <input type="text" class="form-control" id="shop_mobile" name="shop_mobile" placeholder="Enter 11-13 digit Shop mobile number"
                                           value="{{ $vendorDetails['shop_mobile'] }}"
                                           maxlength="13" minlength="11" required="">
                                </div>
                                <div class="form-group">
                                    <label for="shop_city">Shop Address</label>
                                    <input type="text" class="form-control" id="shop_address" name="shop_address"  value="{{ $vendorDetails['shop_address'] }}"
                                           placeholder="Enter your Shop Address" required="">
                                </div>
                                <div class="form-group">
                                    <label for="shop_city">Shop City</label>
                                    <input type="text" class="form-control" id="shop_city" name="shop_city"  value="{{ $vendorDetails['shop_city'] }}"
                                           placeholder="Enter your Shop City" required="">
                                </div>
                                <div class="form-group">
                                    <label for="shop_country">Shop Country</label>
{{--                                    <input type="text" class="form-control" id="shop_country" name="shop_country"  value="{{ $vendorDetails['shop_country'] }}"--}}
{{--                                           placeholder="Enter your Shop Country" required="">--}}
                                    <select class="form-control" id="shop_country" name="shop_country" style="color: #495057;">
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country['country_name'] }}" @if($country['country_name'] == $vendorDetails['shop_country']) selected @endif> {{ $country['country_name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="shop_website">Shop Website</label>
                                    <input type="text" class="form-control" id="shop_website" name="shop_website"  value="{{ $vendorDetails['shop_website'] }}"
                                           placeholder="Enter your City Country" required="">
                                </div>
                                <div class="form-group">
                                    <label for="address_proof">Address Proof</label>
                                    <select class="form-control" id="address_proof" name="address_proof" style="color: #495057;">
                                        <option value="passport" @if($vendorDetails['address_proof']=="Passport") selected @endif>Passport</option>
                                        <option value="Voting Card" @if($vendorDetails["address_proof"]=="Voting Card") selected @endif>Voting Card</option>
                                        <option value="PAN" @if($vendorDetails["address_proof"]=="PAN") selected @endif>PAN</option>
                                        <option value="Driver License" @if($vendorDetails["address_proof"]=="Driver License") selected @endif>Driver License</option>
                                        <option value="NID Card" @if($vendorDetails["address_proof"]=="NID Card") selected @endif>NID Card</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="business_license_number">Business License Number</label>
                                    <input type="text" class="form-control" id="gst_number" name="business_license_number"
                                           value="{{ $vendorDetails['business_license_number'] }}"
                                           placeholder="Enter Your  Business License Number" required="">
                                </div>
                                <div class="form-group">
                                    <label for="gst_number">GST Number</label>
                                    <input type="text" class="form-control" id="gst_number" name="gst_number"  value="{{ $vendorDetails['gst_number'] }}"
                                           placeholder="Enter Your  GST Number" required="">
                                </div>
                                <div class="form-group">
                                    <label for="pan_number">PAN Number</label>
                                    <input type="text" class="form-control" id="pan_number" name="pan_number"  value="{{ $vendorDetails['pan_number'] }}"
                                           placeholder="Enter Your PAN Number" required="">
                                </div>
                                <div class="form-group">
                                    <label for="address_proof_image">Address Proof Image</label>
                                    <input type="file" class="form-control" id="address_proof_image" name="address_proof_image"
                                           placeholder="Enter Your Address Proof Image" required="">
                                    @if(!empty($vendorDetails['address_proof_image']))
                                        <a target="_blank" href=" {{ url('admin/images/proofs/'.$vendorDetails['address_proof_image']) }}">View Image</a>
                                        <input type="hidden" name="current_address_proof_image" value=" {{  $vendorDetails['address_proof_image'] }}">
                                    @endif
                                </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($slug=="bank")
            <div class="row">
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Bank Information Details</h4>
                            @if(Session::has('success_message'))
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong>  {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if(Session::has('error_message'))
                                <div class="alert alert-red alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong>  {{ Session::get('error_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form class="forms-sample" action=" {{ url('/admins/update-vendors-details/bank') }}" method="post" enctype="multipart/form-data">@csrf
                                <div class="form-group">
                                    <label for="bank_email">Bank Email/Email</label>
                                    <input  class="form-control" id="bank_email" name="bank_email"  value="{{ $vendorDetails['bank_email'] }}" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="account_holder_name">Account Holder Name</label>
                                    <input  class="form-control" id="account_holder_name" name="account_holder_name"  value="{{ $vendorDetails['account_holder_name'] }}" required="">
                                </div>
                                <div class="form-group">
                                    <label for="bank_name"> Bank Name</label>
                                    <input type="text" class="form-control" id="bank_name" name="bank_name"  value="{{ $vendorDetails['bank_name'] }}"
                                           placeholder="Enter Your Bank Name" required="">
                                </div>
                                <div class="form-group">
                                    <label for="account_number"> Account Number</label>
                                    <input type="text" class="form-control" id="account_number" name="account_number"  value="{{ $vendorDetails['account_number'] }}"
                                           placeholder="Enter Your Account Number" required="">
                                </div>
                                <div class="form-group">
                                    <label for="account_ifsc_code"> Account IFSC Code</label>
                                    <input type="text" class="form-control" id="account_ifsc_code" name="account_ifsc_code"  value="{{ $vendorDetails['account_ifsc_code'] }}"
                                           placeholder="Enter Your IFSC Account Code" required="">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection
