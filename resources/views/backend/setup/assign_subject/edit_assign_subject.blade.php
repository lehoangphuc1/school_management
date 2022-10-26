@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="card" style="margin:10px 0px 0px 15px">
    <div class="card-header">
    <h4 class="card-title">Sửa tổng các khoản phí</h4>
    </div>
    <div class="card-content">
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="form form-vertical" method="post" action="{{ route('assign.subject.update',$editData[0]->class_id) }}">
         @csrf   
        <div class="form-body">
            <div class="row">
            <div class="col-12">
                <label for="email-id-icon">Lớp học</label>
                <div class="input-group mb-3">
                    <select name="class_id" class="form-select" id="inputGroupSelect01">
                        <option selected value="">Lựa chọn lớp học...</option>
                        @foreach ($classes as $class )
                        <option value="{{ $class->id }}" {{($editData['0']->class_id == $class->id) ? "selected" : "" }}>{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12">
                @foreach ($editData as $edit)
                <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">   
                <div class="row add_item">
                    <div class="col-md-3">
                        <label for="email-id-icon">Môn học</label>
                        <div class="input-group mb-3">
                            <select name="subject_id[]" class="form-select" id="inputGroupSelect01">
                                <option selected value="">Lựa chọn môn học...</option>
                                @foreach ($subjects as $subject )
                                <option value="{{ $subject->id }}" {{ ($edit->subject_id == $subject->id) ? "selected" : "" }}>{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group has-icon-left">
                            <label for="first-name-icon">Điểm tổng kết</label>
                            <div class="row">
                            <div class="position-relative">
                                <input type="text" name="full_mark[]" value="{{ $edit->full_mark }}" class="form-control" placeholder="Nhập vào điểm" id="first-name-icon">
                                <div class="form-control-icon" style="left: 10px">
                                    <i data-feather="clipboard"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group has-icon-left">
                            <label for="first-name-icon">Điểm qua môn</label>
                            <div class="row">
                            <div class="position-relative">
                                <input type="text" name="pass_mark[]" value="{{ $edit->pass_mark }}" class="form-control" placeholder="Nhập vào điểm" id="first-name-icon">
                                <div class="form-control-icon" style="left: 10px">
                                    <i data-feather="clipboard"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group has-icon-left">
                            <label for="first-name-icon">Kết luận</label>
                            <div class="row">
                            <div class="col-md-6 position-relative">
                                <input type="text" name="subject_mark[]" value="{{ $edit->subject_mark }}" class="form-control" placeholder="Nhập vào điểm" id="first-name-icon">
                                <div class="form-control-icon" style="left: 10px">
                                    <i data-feather="clipboard"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="btn btn-success addeventmore"><i class="fa fa-plus"></i></span>
                                <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                            </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
    
    @endforeach
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-1 mb-1">Cập Nhật</button>
            </div>
        </div>
        
        </form>
        <div style="visibility: hidden" class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="form-row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="email-id-icon">Môn học</label>
                                <div class="input-group mb-3">
                                    <select name="subject_id[]" class="form-select" id="inputGroupSelect01">
                                        <option selected value="">Lựa chọn môn học...</option>
                                        @foreach ($subjects as $subject )
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Điểm tổng kết</label>
                                    <div class="row">
                                    <div class="position-relative">
                                        <input type="text" name="full_mark[]" class="form-control" placeholder="Nhập vào điểm" id="first-name-icon">
                                        <div class="form-control-icon" style="left: 10px">
                                            <i data-feather="clipboard"></i>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Điểm qua môn</label>
                                    <div class="row">
                                    <div class="position-relative">
                                        <input type="text" name="pass_mark[]" class="form-control" placeholder="Nhập vào điểm" id="first-name-icon">
                                        <div class="form-control-icon" style="left: 10px">
                                            <i data-feather="clipboard"></i>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Kết luận</label>
                                    <div class="row">
                                    <div class="col-md-6 position-relative">
                                        <input type="text" name="subject_mark[]" class="form-control" placeholder="Nhập vào điểm" id="first-name-icon">
                                        <div class="form-control-icon" style="left: 10px">
                                            <i data-feather="clipboard"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="btn btn-success addeventmore"><i class="fa fa-plus"></i></span>
                                        <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                                    </div>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</div>
<div >
    
</div>
<script type="">
$(document).ready(function(){
    var counter = 0;
    $(document).on("click",'.addeventmore',function(){
        var whole_extra_item_add = $('#whole_extra_item_add').html();
        $(this).closest(".add_item").append(whole_extra_item_add);
        counter++;
    });
    $(document).on("click",'.removeeventmore',function(event){
        $(this).closest("#delete_whole_extra_item_add").remove();
        counter -= 1;
    });
});
</script>
@endsection