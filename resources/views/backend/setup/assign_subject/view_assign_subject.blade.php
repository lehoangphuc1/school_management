@extends('admin.admin_master')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
           Kết quả môn học
            <a href="{{ route('assign.subject.add') }}" style="float: right" class="btn btn-primary">Thêm kết quả môn học</a>
        </div>
   
        
        <div class="card-body">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>lớp</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allData as $key => $assign )
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $assign['student_class']['name']}}</td>
                        <td>
                            <a href="{{ route('assign.subject.edit',$assign->class_id) }}" class="btn btn-info">Sửa</a>
                            <a class="btn btn-primary" href="">Chi tiết</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection