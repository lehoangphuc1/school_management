@extends('admin.admin_master')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
           Danh sách group
            <a href="{{ route('student.group.add') }}" style="float: right" class="btn btn-primary">Thêm group</a>
        </div>
   
        
        <div class="card-body">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Group</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allData as $key => $group )
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $group->name}}</td>
                        <td>
                            <a href="{{ route('student.group.edit',$group->id)}}" class="btn btn-info">Sửa</a>
                            <a class="btn btn-danger" id="delete" href="{{route('student.group.delete',$group->id)}}"><i class="fa fa-trash"></i>Xóa</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection