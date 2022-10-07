@php
    $prefix = Request::route()->getPrefix(); //get ra prefix là user
    $route = Route::current()->getName();// get ra route name
@endphp
<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
<div class="sidebar-header">
<img src="{{ asset('backend/assets/images/logo.svg')}}" alt="" srcset="">
</div>
<div class="sidebar-menu">
<ul class="menu">
    
        
        <li class='sidebar-title'>Main Menu</li>
        
        <li class="sidebar-item {{ ($route == 'dashboard')?'active':'' }}">

            <a href="{{ route('dashboard') }}" class='sidebar-link'>
                <i data-feather="home" width="20"></i> 
                <span>Dashboard</span>
            </a>

            
        </li>
        <li class="sidebar-item  has-sub {{ ($prefix == '/users')?'active':'' }}">

            <a href="#" class='sidebar-link'>
                <i data-feather="user" width="20"></i> 
                <span>Quản lý người dùng</span>
            </a>

            
            <ul class="submenu ">
                
                <li>
                    <a href="{{ route('user.view') }}">Danh sách người dùng</a>
                </li>
                
                <li>
                    <a href="auth-register.html">Sửa thông tin người dùng</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  has-sub {{ ($prefix == '/profiles')?'active':'' }}">

            <a href="#" class='sidebar-link'>
                <i data-feather="user" width="20"></i> 
                <span>Quản lý thông tin cá nhân</span>
            </a>

            
            <ul class="submenu ">
                
                <li>
                    <a href="{{ route('profile.view') }}">Thông tin cá nhân</a>
                </li>
                
                <li>
                    <a href="{{ route('user.changePasswordGet') }}">Thay đổi mật khẩu</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  has-sub">

            <a href="#" class='sidebar-link'>
                <i data-feather="user" width="20"></i> 
                <span>Authentication</span>
            </a>

            
            <ul class="submenu ">
                
                <li>
                    <a href="auth-login.html">Login</a>
                </li>
                
                <li>
                    <a href="auth-register.html">Register</a>
                </li>
                
                <li>
                    <a href="auth-forgot-password.html">Forgot Password</a>
                </li>
            </ul>
        </li>
</ul>
</div>
<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
</div>