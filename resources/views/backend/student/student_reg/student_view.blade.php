@extends('admin.admin_master')
@section('content')
<section class="section">
    <div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tìm kiếm học sinh</h3>
            </div>
        </div>

    </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('student.year.class.wise') }}" method="GET">
                            <div class="row">
                                <div class="col-sm-5">
                                    <select name="class_id" class="form-select" id="inputGroupSelect01">
                                        <option selected value="">Lựa chọn lớp học...</option>
                                        @foreach($classes as $class)
                                        <option value="{{ $class->id }}" {{ (@$class_id == $class->id)? "selected" : "" }}>{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-5">
                                    <select name="year_id" class="form-select" id="inputGroupSelect01">
                                        <option selected value="">Lựa chọn năm học...</option>
                                        @foreach($years as $year)
                                        <option value="{{ $year->id }}" {{ (@$year_id == $year->id)? "selected" : "" }}>{{ $year->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <input type="submit" class="btn btn-secondary" value="Tìm kiếm" name="search">
                                </div>
                            </div>
                    </form>
                </div>
            </div>
    <div class="card">
        <div class="card-header">
            Danh sách học sinh
            <a href="{{ route('student.registration.add') }}" style="float: right" class="btn btn-primary">Thêm học sinh</a>
        </div>
   
        
        <div class="card-body">
            @if(!@$search)
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Mã ID</th>
                        <th>Năm học</th>
                        <th>Lớp học</th>
                        <th>Image</th>
                        {{-- @if(Auth::user()->role == "Admin")
                        <th>Code</th>
                        @endif --}}
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allData as $key => $value )
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $value['student']['name']}}</td>
                        <td>{{ $value['student']['id_no']}}</td>
                        <td>{{ $value['student_year']['name']}}</td>
                        <td>{{ $value['student_class']['name']}}</td>
                        <td>  <img style="width:100px; height:100px;border:1px solid #000000;"
                             src="{{ (!empty($value['student']['image']))? url('upload/student_images/'.$value['student']['image']):url('upload/no_image.jpg') }}" style="width:50px;height:50px" id="showImage" alt="">
                        </td>
                        <td>
                            <a href="{{ route('student.registration.edit',$value->student_id) }}" class="btn btn-info">Sửa</a>
                            <a class="btn btn-danger" id="delete" href="{{ route('student.registration.delete',$value->student_id) }}"><i class="fa fa-trash"></i>Xóa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Mã ID</th>
                        <th>Năm học</th>
                        <th>Lớp học</th>
                        <th>Image</th>
                        {{-- @if(Auth::user()->role == "Admin")
                        <th>Code</th>
                        @endif --}}
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allData as $key => $value )
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $value['student']['name']}}</td>
                        <td>{{ $value['student']['id_no']}}</td>
                        <td>{{ $value['student_year']['name']}}</td>
                        <td>{{ $value['student_class']['name']}}</td>
                        <td>  <img style="width:100px; height:100px;border:1px solid #000000;"
                             src="{{ (!empty($value['student']['image']))? url('upload/student_images/'.$value['student']['image']):url('upload/no_image.jpg') }}" style="width:50px;height:50px" id="showImage" alt="">
                        </td>
                        <td>
                            <a href="{{ route('student.registration.edit',$value->student_id) }}" class="btn btn-info">Sửa</a>
                            <a class="btn btn-danger" id="delete" href="{{ route('student.registration.delete',$value->student_id) }}"><i class="fa fa-trash"></i>Xóa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

        </div>
    </div>
</section>
@endsection