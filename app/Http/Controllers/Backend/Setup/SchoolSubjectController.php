<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;


class SchoolSubjectController extends Controller
{
    public function SchoolSubjectView()
    {
        $data['allData'] = SchoolSubject::all();
        return view('backend.setup.school_subject.view_school_subject', $data);
    }
    public function SchoolSubjectAdd()
    {
        return view('backend.setup.school_subject.add_school_subject');
    }
    public function SchoolSubjectStore(Request $rq)
    {
        $validatedData = $rq->validate([
            'name' => 'required|unique:school_subjects,name',
        ]);
        $data = new SchoolSubject();
        $data->name = $rq->name;
        $data->save();
        $notification = array(
            'message' => 'Thêm môn học thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('school.subject.view')->with($notification);
    }
    public function SchoolSubjectEdit(Request $rq, $id)
    {
        $editData = SchoolSubject::find($id);
        return view('backend.setup.school_subject.edit_school_subject', compact('editData'));
    }
    public function  SchoolSubjectUpdate(Request $rq, $id)
    {
        $data = SchoolSubject::find($id);
        $validatedData = $rq->validate([
            'name' => 'required|unique:school_subjects,name,' . $data->id,
        ]);
        $data->name = $rq->name;
        $data->save();
        $notification = array(
            'message' => 'Sửa môn học thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('school.subject.view')->with($notification);
    }
    public function SchoolSubjectDelete($id)
    {
        $user = SchoolSubject::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Xóa môn học thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('school.subject.view')->with($notification);
    }
}
