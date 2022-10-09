<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamTypeController extends Controller
{
    public function ExamTypeView()
    {
        $data['allData'] = ExamType::all();
        return view('backend.setup.exam_type.view_exam_type', $data);
    }
    public function ExamTypeAdd()
    {
        return view('backend.setup.exam_type.add_exam_type');
    }
    public function ExamTypeStore(Request $rq)
    {
        $validatedData = $rq->validate([
            'name' => 'required|unique:exam_types,name',
        ]);
        $data = new ExamType();
        $data->name = $rq->name;
        $data->save();
        $notification = array(
            'message' => 'Thêm kỳ thi thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }
    public function ExamTypeEdit(Request $rq, $id)
    {
        $editData = ExamType::find($id);
        return view('backend.setup.exam_type.edit_exam_type', compact('editData'));
    }
    public function  ExamTypeUpdate(Request $rq, $id)
    {
        $data = ExamType::find($id);
        $validatedData = $rq->validate([
            'name' => 'required|unique:exam_types,name,' . $data->id,
        ]);
        $data->name = $rq->name;
        $data->save();
        $notification = array(
            'message' => 'Sửa kỳ thi thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }
    public function ExamTypeDelete($id)
    {
        $user = ExamType::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Xóa kỳ thi thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }
}
