<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    public function StudentShiftView()
    {
        $data['allData'] = StudentShift::all();
        return view('backend.setup.shift.view_shift', $data);
    }
    public function StudentShiftAdd()
    {
        return view('backend.setup.shift.add_shift');
    }
    public function StudentShiftStore(Request $rq)
    {
        $validatedData = $rq->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);
        $data = new StudentShift();
        $data->name = $rq->name;
        $data->save();
        $notification = array(
            'message' => 'Thêm ca học thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('student.shift.view')->with($notification);
    }
    public function StudentShiftEdit(Request $rq, $id)
    {
        $editData = StudentShift::find($id);
        return view('backend.setup.shift.edit_group', compact('editData'));
    }
    public function StudentShiftUpdate(Request $rq, $id)
    {
        $data = StudentShift::find($id);
        $validatedData = $rq->validate([
            'name' => 'required|unique:student_shifts,name,' . $data->id,
        ]);
        $data->name = $rq->name;
        $data->save();
        $notification = array(
            'message' => 'Sửa ca học thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('student.shift.view')->with($notification);
    }
    public function StudentShiftDelete($id)
    {
        $user = StudentShift::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Xóa ca học thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('student.shift.view')->with($notification);
    }
}
