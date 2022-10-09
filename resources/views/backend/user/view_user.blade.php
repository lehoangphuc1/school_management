@extends('admin.admin_master')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            Danh sách người dùng
            <a href="{{ route('user.add') }}" style="float: right" class="btn btn-primary">Thêm người dùng</a>
        </div>
   
        
        <div class="card-body">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Loại tài khoản</th>
                        <th>Địa chỉ mail</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allData as $key => $user )
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->usertype}}</td>
                        <td>{{ $user->email}}</td>
                        <td>
                            <a href="{{ route('user.edit',$user->id) }}" class="btn btn-info">Sửa</a>
                            {{-- <a href="{{ route('user.delete',$user->id) }}" class="btn btn-danger">Xóa</a> --}}
                            <a class="btn btn-danger" id="delete" href="{{route('user.delete',$user->id)}}"><i class="fa fa-trash"></i>Xóa</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection