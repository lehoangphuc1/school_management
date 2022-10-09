@extends('admin.admin_master')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
           Môn học
            <a href="{{ route('school.subject.add') }}" style="float: right" class="btn btn-primary">Thêm môn học</a>
        </div>
   
        
        <div class="card-body">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Môn học</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allData as $key => $subject )
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $subject->name}}</td>
                        <td>
                            <a href="{{ route('school.subject.edit',$subject->id)}}" class="btn btn-info">Sửa</a>
                            <a class="btn btn-danger" id="delete" href="{{route('school.subject.delete',$subject->id)}}"><i class="fa fa-trash"></i>Xóa</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection