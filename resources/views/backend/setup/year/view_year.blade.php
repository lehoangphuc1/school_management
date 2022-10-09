@extends('admin.admin_master')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            Danh sách năm học
            <a href="{{ route('student.year.add') }}" style="float: right" class="btn btn-primary">Thêm năm học</a>
        </div>
   
        
        <div class="card-body">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Năm học</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allData as $key => $year )
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $year->name}}</td>
                        <td>
                            <a href="{{ route('student.year.edit',$year->id)}}" class="btn btn-info">Sửa</a>
                            <a class="btn btn-danger" id="delete" href="{{route('student.year.delete',$year->id)}}"><i class="fa fa-trash"></i>Xóa</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection