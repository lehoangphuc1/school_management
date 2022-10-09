@extends('admin.admin_master')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
           Tổng các khoản phí
            <a href="{{ route('fee.amount.add') }}" style="float: right" class="btn btn-primary">Thêm tổng khoản phí</a>
        </div>
   
        
        <div class="card-body">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã lớp</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allData as $key => $feeamount )
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $feeamount['fee_category']['name']}}</td>
                        <td>
                            <a href="{{ route('fee.amount.edit',$feeamount->fee_category_id) }}" class="btn btn-info">Sửa</a>
                            <a class="btn btn-primary" href="{{ route('fee.amount.detail',$feeamount->fee_category_id) }}">Chi tiết</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection