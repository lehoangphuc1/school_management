@extends('admin.admin_master')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
           Danh sách lớp
            <a href="{{ route('student.class.add') }}" style="float: right" class="btn btn-primary">Thêm lớp học</a>
        </div>
   
        
        <div class="card-body">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allData as $key => $student )
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $student->name}}</td>
                        <td>
                            <a href="{{ route('student.class.edit',$student->id)}}" class="btn btn-info">Sửa</a>
                            <a class="btn btn-danger" id="delete" href="{{route('student.class.delete',$student->id)}}"><i class="fa fa-trash"></i>Xóa</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection