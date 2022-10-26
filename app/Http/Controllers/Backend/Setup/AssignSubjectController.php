<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;

class AssignSubjectController extends Controller
{
    public function AssignSubjectView()
    {
        // $data['allData'] = AssignSubject::all();
        $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get(); //get tổng by categoryid
        // dd($data['allData']->toArray());
        return view('backend.setup.assign_subject.view_assign_subject', $data);
    }
    public function AssignSubjectAdd()
    {
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.add_assign_subject', $data);
    }
    public function AssignSubjectStore(Request $rq)
    {
        $subjectCount = count($rq->subject_id);
        if ($subjectCount != NULL) {
            for ($i = 0; $i < $subjectCount; $i++) {
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $rq->class_id;
                $assign_subject->subject_id = $rq->subject_id[$i];
                $assign_subject->full_mark = $rq->full_mark[$i];
                $assign_subject->pass_mark = $rq->pass_mark[$i];
                $assign_subject->subject_mark = $rq->subjective_mark[$i];
                $assign_subject->save();
            }
        }
        $notification = array(
            'message' => 'Thêm kết quả học thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('assign.subject.view')->with($notification);
    }
    public function AssignSubjectEdit($class_id)
    {
        $data['editData'] = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();
        // dd($data['editData']->toArray());
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.edit_assign_subject', $data);
    }
    public function AssignSubjectUpdate(Request $rq, $class_id)
    {
        if ($rq->subject_id == NULL) {
            $notification = array(
                'message' => 'Bạn vui lòng chọn ít nhất 1 môn học',
                'alert-type' => 'error'
            );
            return redirect()->route('assign.subject.edit', $class_id)->with($notification);
        } else {
            $countSubject = count($rq->subject_id);
            AssignSubject::where('class_id', $class_id)->delete();
            if ($countSubject != NULL) {
                for ($i = 0; $i < $countSubject; $i++) {
                    $assign_subject = new AssignSubject();
                    $assign_subject->class_id = $rq->class_id;
                    $assign_subject->subject_id = $rq->subject_id[$i];
                    $assign_subject->full_mark = $rq->full_mark[$i];
                    $assign_subject->pass_mark = $rq->pass_mark[$i];
                    $assign_subject->subject_mark = $rq->subject_mark[$i];
                    $assign_subject->save();
                }
            }
            $notification = array(
                'message' => 'Thay đổi kết quả thành công',
                'alert-type' => 'success'
            );
            return redirect()->route('assign.subject.view')->with($notification);
        }
    }
}
