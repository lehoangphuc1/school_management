<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function StudentClassView()
    {
        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class', $data);
    }
    public function StudentClassAdd()
    {
        return view('backend.setup.student_class.add_class');
    }
    public function StudentClassStore(Request $rq)
    {
        $validatedData = $rq->validate([
            'name' => 'required|unique:student_classes,name',
        ]);
        $data = new StudentClass();
        $data->name = $rq->name;
        $data->save();
        $notification = array(
            'message' => 'Thêm lớp học thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('student.class.view')->with($notification);
    }
    public function StudentClassEdit(Request $rq, $id)
    {
        $editData = StudentClass::find($id);
        return view('backend.setup.student_class.edit_class', compact('editData'));
    }
    public function StudentClassUpdate(Request $rq, $id)
    {
        $data = StudentClass::find($id);
        $validatedData = $rq->validate([
            'name' => 'required|unique:student_classes,name,' . $data->id,
        ]);
        $data->name = $rq->name;
        $data->save();
        $notification = array(
            'message' => 'Sửa lớp học thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('student.class.view')->with($notification);
    }
    public function StudentClassDelete($id)
    {
        $user = StudentClass::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Xóa lớp học thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('student.class.view')->with($notification);
    }
}
