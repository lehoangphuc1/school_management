<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function StudentGroupView()
    {
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.group.view_group', $data);
    }
    public function StudentGroupAdd(Request $rq)
    {
        return view('backend.setup.group.add_group');
    }
    public function StudentGroupStore(Request $rq)
    {
        $validatedData = $rq->validate([
            'name' => 'required|unique:student_groups,name',
        ]);
        $data = new StudentGroup();
        $data->name = $rq->name;
        $data->save();
        $notification = array(
            'message' => 'Thêm group thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);
    }
    public function StudentGroupEdit(Request $rq, $id)
    {
        $editData = StudentGroup::find($id);
        return view('backend.setup.group.edit_group', compact('editData'));
    }
    public function StudentGroupUpdate(Request $rq, $id)
    {
        $data = StudentGroup::find($id);
        $validatedData = $rq->validate([
            'name' => 'required|unique:student_groups,name,' . $data->id,
        ]);
        $data->name = $rq->name;
        $data->save();
        $notification = array(
            'message' => 'Sửa group thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);
    }
    public function StudentGroupDelete($id)
    {
        $user = StudentGroup::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Xóa group thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);
    }
}
