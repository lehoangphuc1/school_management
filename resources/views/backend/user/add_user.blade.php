@extends('admin.admin_master')
@section('content')
<div class="card" style="margin:10px 0px 0px 15px">
    <div class="card-header">
    <h4 class="card-title">Thêm người dùng</h4>
    </div>
    <div class="card-content">
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="form form-vertical" method="post" action="{{ route('user.store') }}">
         @csrf   
        <div class="form-body">
            <div class="row">
            <div class="col-12">
                <div class="form-group has-icon-left">
                    <label for="first-name-icon">Tên người dùng</label>
                    <div class="position-relative">
                        <input type="text" name="name" class="form-control" placeholder="Input with icon left" id="first-name-icon">
                        <div class="form-control-icon">
                            <i data-feather="user"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                
                <div class="form-group has-icon-left">
                    <label for="email-id-icon">Địa chỉ email</label>
                    <div class="position-relative">
                        <input type="text" name="email" class="form-control" placeholder="Email" id="email-id-icon">
                        <div class="form-control-icon">
                            <i data-feather="mail"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <label for="email-id-icon">USER ROLE</label>
                <div class="input-group mb-3">
                    <select name="role" id="role" class="form-select" id="inputGroupSelect01">
                        <option selected value="">Select role...</option>
                        <option value="Admin">Admin</option>
                        <option value="Operator">Operator</option>
                    </select>
                </div>
            </div>
            {{-- <div class="col-12">
                <div class="form-group has-icon-left">
                    <label for="password-id-icon">Mật Khẩu</label>
                    <div class="position-relative">
                        <input type="password" name="password" class="form-control" placeholder="Password" id="password-id-icon">
                        <div class="form-control-icon">
                            <i data-feather="lock"></i>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
            </div>
            </div>
        </div>
        </form>
    </div>
    </div>
</div>
@endsection