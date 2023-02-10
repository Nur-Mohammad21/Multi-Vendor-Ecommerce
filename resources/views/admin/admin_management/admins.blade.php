@extends('admin.layout.layout')
@section('title')
    Admin Update Details
@endsection
@section('content')
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> {{ $title }}</h4>

                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL NO</th>
                                            <th>Admin Id</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($admins as $admin)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $admin["id"] }}</td>
                                                <td>{{ $admin['name'] }}</td>
                                                <td>{{ $admin["type"] }}</td>
                                                <td>{{ $admin["mobile"] }}</td>
                                                <td>{{ $admin["email"] }}</td>
                                                <td>
                                                    <img src="{{ asset("admin/images/photo/".$admin["image"]) }}">
                                                </td>

                                                <td>
                                                    @if($admin["status"]==1)
                                                        <a class="updateAdminStatus"
                                                           id="admins-{{ $admin["id"] }}" admin_id="{{ $admin["id"] }}"
                                                           href="javascript:void(0)">
                                                            <i  style="font-size:25px;" class=" 2x mdi mdi-bookmark-check" status="Active"></i>
                                                        </a>
                                                    @else
                                                        <a class="updateAdminStatus"
                                                                    id="admins-{{ $admin["id"] }}" admin_id="{{ $admin["id"] }}"
                                                                    href="javascript:void(0)">
                                                            <i style="font-size:25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($admin['type']=="vendor")
                                                        <a href="{{ route('view_vendor-details',[$admin['id']]) }}">
                                                            <i class="mdi mdi-file-document" style="font-size: 25px;" ></i>
                                                        </a>
                                                    @else
{{--                                                        <i class="mdi mdi-file-document" style="font-size: 25px;" ></i>--}}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
@endsection
