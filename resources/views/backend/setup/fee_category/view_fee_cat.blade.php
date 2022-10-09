@extends('admin.admin_master')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
           Các khoản phí
            <a href="{{ route('fee.category.add') }}" style="float: right" class="btn btn-primary">Thêm khoản phí</a>
        </div>
   
        
        <div class="card-body">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Khoản phí</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allData as $key => $feecat )
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $feecat->name}}</td>
                        <td>
                            <a href="{{ route('fee.category.edit',$feecat->id)}}" class="btn btn-info">Sửa</a>
                            <a class="btn btn-danger" id="delete" href="{{route('fee.category.delete',$feecat->id)}}"><i class="fa fa-trash"></i>Xóa</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection