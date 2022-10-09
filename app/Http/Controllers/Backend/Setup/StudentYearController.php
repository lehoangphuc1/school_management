<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function StudentYearView()
    {
        $data['allData'] = StudentYear::all();
        return view('backend.setup.year.view_year', $data);
    }
    public function StudentYearAdd()
    {
        return view('backend.setup.year.add_year');
    }
    public function StudentYearStore(Request $rq)
    {
        $validatedData = $rq->validate([
            'name' => 'required|unique:student_years,name',
        ]);
        $data = new StudentYear();
        $data->name = $rq->name;
        $data->save();
        $notification = array(
            'message' => 'Thêm năm học thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('student.year.view')->with($notification);
    }
    public function StudentYearEdit(Request $rq, $id)
    {
        $editData = StudentYear::find($id);
        return view('backend.setup.year.edit_year', compact('editData'));
    }
    public function StudentYearUpdate(Request $rq, $id)
    {
        $data = StudentYear::find($id);
        $validatedData = $rq->validate([
            'name' => 'required|unique:student_years,name,' . $data->id,
        ]);
        $data->name = $rq->name;
        $data->save();
        $notification = array(
            'message' => 'Sửa năm học thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('student.year.view')->with($notification);
    }
    public function StudentYearDelete($id)
    {
        $user = StudentYear::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Xóa năm học thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('student.year.view')->with($notification);
    }
}
