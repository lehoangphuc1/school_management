@extends('admin.admin_master')
@section('content')
<div class="card" style="margin:10px 0px 0px 15px">
    <div class="card-header">
    <h4 class="card-title">Thay đổi mật khẩu</h4>
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
        <form class="form form-vertical" method="post" action="{{ route('user.changePasswordPost') }}">
         @csrf   
        <div class="form-body">
            <div class="row">
            <div class="col-12">
                <div class="form-group has-icon-left">
                    <label for="first-name-icon">Mật khẩu hiện tại</label>
                    <div class="position-relative">
                        <input type="password" name="current_password" class="form-control" placeholder="Nhập vào mật khẩu hiện tại" id="first-name-icon">
                        <div class="form-control-icon">
                            <i data-feather="lock"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                
                <div class="form-group has-icon-left">
                    <label for="lock-icon">Mật khẩu mới</label>
                    <div class="position-relative">
                        <input type="password" name="password" class="form-control"  placeholder="Nhập vào mật khẩu mới">
                        <div class="form-control-icon">
                            <i data-feather="lock"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                
                <div class="form-group has-icon-left">
                    <label for="lock-icon"> Xác nhận lại khẩu mới</label>
                    <div class="position-relative">
                        <input type="password" name="confirm_password" class="form-control" placeholder="Xác nhận lại mật khẩu mới">
                        <div class="form-control-icon">
                            <i data-feather="lock"></i>
                        </div>
                    </div>
                </div>
            </div>
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