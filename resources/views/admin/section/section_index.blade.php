@extends('admin.layout.layout')
@section('title')
    Section Details
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Section</h4>

                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Section Id</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sections as $section)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $section["id"] }}</td>
                                        <td>{{ $section['name'] }}</td>
                                        <td>
                                            @if($section["status"]==1)
                                                <a class="updateAdminStatus"
                                                   id="admins-{{ $section["id"] }}" admin_id="{{ $section["id"] }}"
                                                   href="javascript:void(0)">
                                                    <i  style="font-size:25px;" class=" 2x mdi mdi-bookmark-check" status="Active"></i>
                                                </a>
                                            @else
                                                <a class="updateAdminStatus"
                                                   id="admins-{{ $section["id"] }}" admin_id="{{ $section["id"] }}"
                                                   href="javascript:void(0)">
                                                    <i style="font-size:25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($section['type']=="vendor")
                                                <a href="{{ route('view_vendor-details',[$section['id']]) }}">
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
