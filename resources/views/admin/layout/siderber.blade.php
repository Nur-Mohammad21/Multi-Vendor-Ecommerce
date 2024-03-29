
<!-- partial -->
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admins-dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
{{--                {{ Auth::guard('admin')->user()->type }}--}}
            </a>
        </li>

        @if(Auth::guard('admin')->user()->type == "vendor")
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-vendors" aria-expanded="false" aria-controls="ui-vendors">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Vendor Details</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-vendors">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href=" {{ url('/admins/update-vendors-details/personal') }}">Personal Details</a></li>
                        <li class="nav-item"> <a class="nav-link" href=" {{ url('/admins/update-vendors-details/business') }} ">Business Details</a></li>
                        <li class="nav-item"> <a class="nav-link" href=" {{ url('/admins/update-vendors-details/bank') }} ">Bank Details</a></li>
                    </ul>
                </div>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-setting" aria-expanded="false" aria-controls="ui-setting">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Setting</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-setting">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href=" {{ route('setting-password') }}">update Password</a></li>
                        <li class="nav-item"> <a class="nav-link" href=" {{ route('update-admins-details') }}">Update Details</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-admins" aria-expanded="false" aria-controls="ui-admins">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Admin Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-admins">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href=" {{ route('admin.all.vendors','superadmin') }}">SuperAdmin</a></li>
                        <li class="nav-item"> <a class="nav-link" href=" {{ route('admin.all.vendors','subadmin') }}">SubAdmin/Admin</a></li>
                        <li class="nav-item"> <a class="nav-link" href=" {{ route('admin.all.vendors','vendor') }}"> Vendors</a></li>
                        <li class="nav-item"> <a class="nav-link" href=" {{ route('admin.all.vendors') }}"> All</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-users" aria-expanded="false" aria-controls="ui-users">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">User Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-users">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href=" {{ url('admins/users') }}">Users</a></li>
                        <li class="nav-item"> <a class="nav-link" href=" {{ url('admins/subscribers') }}">Subscribers</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-category" aria-expanded="false" aria-controls="ui-category">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Catalogue Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-category">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href=" {{ route('section-index') }}">Section</a></li>
                        <li class="nav-item"> <a class="nav-link" href=" {{ url('admins/products') }}">Products</a></li>
                        <li class="nav-item"> <a class="nav-link" href=" {{ url('admins/categories') }}">Categories</a></li>
                    </ul>
                </div>
            </li>
        @endif
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">--}}
{{--                <i class="icon-layout menu-icon"></i>--}}
{{--                <span class="menu-title">Setting</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="ui-basic">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href=" {{ route('setting-password') }}">Update Password</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{ route('update-admins-details') }} ">Update Details</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Form elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Charts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Tables</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <i class="icon-contract menu-icon"></i>
                <span class="menu-title">Icons</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
                <i class="icon-ban menu-icon"></i>
                <span class="menu-title">Error pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>
<!-- partial -->
