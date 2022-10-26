@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="card" style="margin:10px 0px 0px 15px">
    <div class="card-header">
    <h4 class="card-title">Sửa thông tin học sinh</h4>
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
        <form class="form form-vertical" method="post" action="{{ route('student.registration.update',$editData->student_id) }}" enctype="multipart/form-data">
         @csrf   
         <input type="hidden" name="id" value="{{ $editData->id }}">
        <div class="form-body">
            <div class="row">
            <div class="col-12">
                <div class="form-group has-icon-left">
                    <label for="first-name-icon">Tên</label>
                    <div class="position-relative">
                        <input type="text" name="name" value="{{ $editData['student']['name'] }} "class="form-control" placeholder="Nhập vào tên" id="first-name-icon">
                        <div class="form-control-icon">
                            <i data-feather="clipboard"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <label for="email-id-icon">Giới tính</label>
                <div class="input-group mb-3">
                    <select name="gender" class="form-select" id="inputGroupSelect01">
                        <option selected value="">Lựa chọn giới tính...</option>
                        <option value="Nam" {{ $editData['student']['gender'] =='Nam' ? 'selected' : '' }}>Nam</option>
                        <option value="Nữ" {{ $editData['student']['gender'] =='Nữ' ? 'selected' : '' }}>Nữ</option>
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group has-icon-left">
                    <label for="first-name-icon">Email</label>
                    <div class="position-relative">
                        <input type="text" name="email" value="{{ $editData['student']['email'] }}" class="form-control" placeholder="Nhập vào email" id="first-name-icon">
                        <div class="form-control-icon">
                            <i data-feather="clipboard"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group has-icon-left">
                <label for="first-name-icon">Ngày sinh</label>
                <div class="position-relative">
                    <input type="date" name="birthday" value="{{ $editData['student']['birthday'] }}"  class="form-control" placeholder="Nhập ngày sinh" id="first-name-icon">
                    <div class="form-control-icon">
                        <i data-feather="clipboard"></i>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-12">
                <div class="form-group has-icon-left">
                    <label for="first-name-icon">Điện thoại</label>
                    <div class="position-relative">
                        <input type="text" name="phone" class="form-control" value="{{ $editData['student']['phone'] }} " placeholder="Nhập số đt" id="first-name-icon">
                        <div class="form-control-icon">
                            <i data-feather="clipboard"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group has-icon-left">
                    <label for="first-name-icon">Địa chỉ</label>
                    <div class="position-relative">
                        <input type="text" name="address" class="form-control" value="{{ $editData['student']['address'] }} "  placeholder="Nhập địa chỉ" id="first-name-icon">
                        <div class="form-control-icon">
                            <i data-feather="clipboard"></i>
                        </div>
                    </div>
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
                        <img style="width:100px; height:100px;border:1px solid #000000;" src="{{ (!empty($editData['student']['image']))? url('upload/student_images/'.$editData['student']['image']):url('upload/no_image.jpg') }}" id="showImage" alt="">
                        <div class="form-control-icon">
                            <i data-feather="gender"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <label for="email-id-icon">Lớp</label>
                <div class="input-group mb-3">
                    <select name="class_id" class="form-select" id="inputGroupSelect01">
                        <option selected value="">Lựa chọn lớp học...</option>
                        @foreach($classes as $class)
                        <option value="{{ $class->id }}" {{ ($editData->class_id == $class->id) ? "selected" : "" }}>{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
           
            <div class="col-12">
                <label for="email-id-icon">Buổi học</label>
                <div class="input-group mb-3">
                    <select name="shift_id" class="form-select" id="inputGroupSelect01">
                        <option selected value="">Lựa chọn buổi học...</option>
                        @foreach($shifts as $shift)
                        <option value="{{ $shift->id }}" {{ ($editData->shift_id == $shift->id)  ? "selected" :"" }}>{{ $shift->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12">
                <label for="email-id-icon">Năm học</label>
                <div class="input-group mb-3">
                    <select name="year_id" class="form-select" id="inputGroupSelect01">
                        <option selected value="">Lựa chọn năm học...</option>
                        @foreach($years as $year)
                        <option value="{{ $year->id }}"l {{ ($editData->year_id == $year->id) ? "selected" :"" }}>{{ $year->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12">
                <label for="email-id-icon">Group</label>
                <div class="input-group mb-3">
                    <select name="group_id" class="form-select" id="inputGroupSelect01">
                        <option selected value="">Lựa chọn nhóm...</option>
                        @foreach($groups as $group)
                        <option value="{{ $group->id }}" {{ ($editData->group_id == $group->id)  ? "selected" :"" }}>{{ $group->name }}</option>
                        @endforeach
                    </select>
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