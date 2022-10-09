@extends('admin.admin_master')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
           Ca học
            <a href="{{ route('student.shift.add') }}" style="float: right" class="btn btn-primary">Thêm ca học</a>
        </div>
   
        
        <div class="card-body">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ca học</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allData as $key => $shift )
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $shift->name}}</td>
                        <td>
                            <a href="{{ route('student.shift.edit',$shift->id)}}" class="btn btn-info">Sửa</a>
                            <a class="btn btn-danger" id="delete" href="{{route('student.shift.delete',$shift->id)}}"><i class="fa fa-trash"></i>Xóa</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection