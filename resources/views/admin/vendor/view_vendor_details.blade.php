@extends('admin.layout.layout')
@section('title')
    View Vendor Details
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">All Vendor Details</h3>
                        <h6 class="font-weight-normal mb-0"> <a href="{{ url('admins/admins/vendor') }}">Back To Vendor</a></h6>
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

            <div class="row">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> Personal  Information</h4>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input  class="form-control" value="{{ $vendorDetails['vendor_personal']['email'] }}" readonly="" >
                                </div>
                                <div class="form-group">
                                    <label for="vendor_name">Name</label>
                                    <input type="text" class="form-control" id="vendor_name" name="vendor_name"
                                           value="{{ $vendorDetails['vendor_personal']['email'] }}"
                                           placeholder="Enter your name" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter 11-13 digit enter mobile number"
                                           value="{{ $vendorDetails['vendor_personal']['name'] }}"
                                           maxlength="13" minlength="11" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="vendor_address">Address</label>
                                    <input type="text" class="form-control" id="vendor_address" name="vendor_address"
                                           value="{{ $vendorDetails['vendor_personal']['address'] }}"
                                           placeholder="Enter your Address" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="vendor_city">City</label>
                                    <input type="text" class="form-control" id="vendor_city" name="vendor_city"
                                           value="{{ $vendorDetails['vendor_personal']['city'] }}"
                                           placeholder="Enter your City Name" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="vendor_country">Country</label>
                                    <input type="text" class="form-control" id="vendor_country" name="vendor_country"
                                           value="{{ $vendorDetails['vendor_personal']['country'] }}"
                                           placeholder="Enter your City Country" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="country_code">Country Code</label>
                                    <input type="text" class="form-control" id="country_code" name="country_code"
                                           value="{{ $vendorDetails['vendor_personal']['country_code'] }}"
                                           placeholder="Enter your City Country" readonly="">
                                </div>
                                @if(!empty($vendorDetails['vendor_personal']['image']))
                                <div class="form-group">
                                    <label for="vendor_image">Vendor Photo</label>
                                        <div>
                                            <img src="{{ url('admin/images/vendor_image/'.$vendorDetails['vendor_personal']['image']) }}" style="width: 200px;" height="200px">
                                        </div>
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> Business  Information</h4>
                            <div class="form-group">
                                <label>Email</label>
                                <input  class="form-control"
                                        value="{{ $vendorDetails['vendor_business']['shop_email'] }}" readonly="" >
                            </div>
                            <div class="form-group">
                                <label >Shop Name</label>
                                <input type="text" class="form-control"
                                       value="{{ $vendorDetails['vendor_business']['shop_name'] }}" readonly="">
                            </div>
                            <div class="form-group">
                                <label >Shop Mobile</label>
                                <input type="text" class="form-control"
                                       value="{{ $vendorDetails['vendor_business']['shop_mobile'] }}" readonly="">
                            </div>
                            <div class="form-group">
                                <label >Shop Address</label>
                                <input type="text" class="form-control"
                                       value="{{ $vendorDetails['vendor_business']['shop_address'] }}" readonly="">
                            </div>

                            <div class="form-group">
                                <label for="vendor_city"> Shop City</label>
                                <input type="text" class="form-control"
                                       value="{{ $vendorDetails['vendor_business']['shop_city'] }}"
                                       placeholder="Enter your City Name" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="vendor_country"> Shop Country</label>
                                <input type="text" class="form-control"
                                       value="{{ $vendorDetails['vendor_business']['shop_country'] }}"
                                       placeholder="Enter your City Country" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="vendor_country"> Shop Website</label>
                                <input type="text" class="form-control"
                                       value="{{ $vendorDetails['vendor_business']['shop_website'] }}" readonly="" >

                            </div>
                            <div class="form-group">
                                <label >Address Proof</label>
                                <input type="text" class="form-control"
                                       value="{{ $vendorDetails['vendor_business']['address_proof'] }}"
                                       placeholder="Enter your City Country" readonly="">
                            </div>
                            <div class="form-group">
                                <label > Business License Number</label>
                                <input type="text" class="form-control"
                                       value="{{ $vendorDetails['vendor_business']['business_license_number'] }}"
                                       placeholder="Enter your City Country" readonly="">
                            </div>
                            <div class="form-group">
                                <label > GST Number</label>
                                <input type="text" class="form-control"
                                       value="{{ $vendorDetails['vendor_business']['gst_number'] }}"
                                       placeholder="Enter your City Country" readonly="">
                            </div>
                            <div class="form-group">
                                <label > PAN Number</label>
                                <input type="text" class="form-control"
                                       value="{{ $vendorDetails['vendor_business']['pan_number'] }}"
                                       placeholder="Enter your City Country" readonly="">
                            </div>

                            @if(!empty($vendorDetails['vendor_business']['address_proof_image']))
                            <div class="form-group">
                                <label>Address Proof Image</label>
                                    <div>
                                        <img src=" {{ url('admin/images/proofs/'.$vendorDetails['vendor_business']['address_proof_image']) }}"
                                             style="width: 200px;" height="200px">
                                    </div>
                               </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> Bank  Information</h4>
                            <div class="form-group">
                                <label>Email</label>
                                <input  class="form-control"
                                        value="{{ $vendorDetails['vendor_bank']['bank_email'] }}" readonly="" >
                            </div>
                            <div class="form-group">
                                <label >Account Holder Name</label>
                                <input type="text" class="form-control"
                                       value="{{ $vendorDetails['vendor_bank']['account_holder_name'] }}" readonly="">
                            </div>
                            <div class="form-group">
                                <label >Bank Name</label>
                                <input type="text" class="form-control"
                                       value="{{ $vendorDetails['vendor_bank']['bank_name'] }}" readonly>
                            </div>
                            <div class="form-group">
                                <label >Account Number</label>
                                <input type="text" class="form-control"
                                       value="{{ $vendorDetails['vendor_bank']['account_number'] }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="vendor_city">Account IFSC Code</label>
                                <input type="text" class="form-control"
                                       value="{{ $vendorDetails['vendor_bank']['account_ifsc_code'] }}"
                                       placeholder="Enter your City Name" readonly="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

@endsection
