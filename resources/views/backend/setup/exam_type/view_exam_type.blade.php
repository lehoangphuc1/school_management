@extends('admin.admin_master')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
           Các kỳ thi
            <a href="{{ route('exam.type.add') }}" style="float: right" class="btn btn-primary">Thêm kỳ thi</a>
        </div>
   
        
        <div class="card-body">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Kỳ thi</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allData as $key => $exam_type )
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $exam_type->name}}</td>
                        <td>
                            <a href="{{ route('exam.type.edit',$exam_type->id)}}" class="btn btn-info">Sửa</a>
                            <a class="btn btn-danger" id="delete" href="{{route('exam.type.delete',$exam_type->id)}}"><i class="fa fa-trash"></i>Xóa</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection