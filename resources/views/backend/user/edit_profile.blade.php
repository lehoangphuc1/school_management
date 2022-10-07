@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="card" style="margin:10px 0px 0px 15px">
    <div class="card-header">
    <h4 class="card-title">Sửa Profile</h4>
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
        <form class="form form-vertical" method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
         @csrf   
        <div class="form-body">
            <div class="row">
            <div class="col-12">
                <div class="form-group has-icon-left">
                    <label for="first-name-icon">Tên người dùng</label>
                    <div class="position-relative">
                        <input type="text" name="name" class="form-control" value="{{ $editData->name }}" placeholder="Tên" id="first-name-icon">
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
                        <input type="text" name="email" class="form-control" value="{{ $editData->email }}" placeholder="Email" id="email-id-icon">
                        <div class="form-control-icon">
                            <i data-feather="mail"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                
                <div class="form-group has-icon-left">
                    <label for="email-id-icon">Số điện thoại</label>
                    <div class="position-relative">
                        <input type="text" name="phone" class="form-control" value="{{ $editData->phone }}" placeholder="Điện thoại" id="email-id-icon">
                        <div class="form-control-icon">
                            <i data-feather="phone"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                
                <div class="form-group has-icon-left">
                    <label for="email-id-icon">Địa chỉ</label>
                    <div class="position-relative">
                        <input type="text" name="address" class="form-control" value="{{ $editData->address }}" placeholder="Địa chỉ" id="email-id-icon">
                        <div class="form-control-icon">
                            <i data-feather="user"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group has-icon-left">
                <label for="email-id-icon">Giới tính</label>
                <div class="input-group mb-3">
                    <select name="gender" class="form-select" id="inputGroupSelect01">
                        <option value="Nam" {{ $editData->gender == "Nam" ? "selected" : "" }}>Nam</option>
                        <option value="Nữ" {{ $editData->gender == "Nữ" ? "selected" : "" }}>Nữ</option>
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group has-icon-left">
                    <label for="email-id-icon">Avatar</label>
                    <div class="position-relative">
                        <input type="file" id="image" name="image" class="form-control"  id="email-id-icon">
                        <div class="form-control-icon">
                            <i data-feather="image"></i>
                        </div>
                    </div>
                    <div class="position-relative">
                        <img style="width:100px; height:100px;border:1px solid #000000;" src="{{ (!empty($user->image))? url('upload/user_images/'.$user->image):url('upload/no_image.jpg') }}" id="showImage" alt="">
                        <div class="form-control-icon">
                            <i data-feather="gender"></i>
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
<script type="text/javascript">
   $( document ).ready(function() {
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0'])
        });
    });
</script>
@endsection