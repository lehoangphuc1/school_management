@extends('admin.admin_master')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
           Chi tiết chi phí
            <a href="{{ route('fee.amount.add') }}" style="float: right" class="btn btn-primary">Thêm tổng khoản phí</a>
        </div>
   
        <div class="card-body">        
            <h5><strong>Danh mục chi phí: </strong>{{ $detailsData['0']['fee_category']['name'] }}</h5>
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Lớp</th>
                        <th>Số tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailsData as $key => $feeamount )
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>Lớp {{ $feeamount['student_class']['name']}}</td>
                        <td>{{ $feeamount->amount}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection