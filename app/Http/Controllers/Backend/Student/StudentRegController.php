<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\StudentClass;
use DB;
use PDF;

class StudentRegController extends Controller
{
    public function StudentRegisterView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['year_id'] = StudentYear::orderBy('id', 'desc')->first()->id;
        $data['class_id'] = StudentClass::orderBy('id', 'desc')->first()->id;
        $data['allData'] = AssignStudent::where('year_id', $data['year_id'])->where('class_id', $data['class_id'])->get();
        return view('backend.student.student_reg.student_view', $data);
    }
    public function StudentRegisterAdd()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        return view('backend.student.student_reg.student_add', $data);
    }
    public function StudentRegisterStore(Request $rq)
    {
        DB::transaction(function () use ($rq) {
            $checkYear = StudentYear::find($rq->year_id)->name;
            $student = User::where('usertype', 'student')->orderBy('id', 'DESC')->first()->id;
            if ($student == null) {
                $firstReg = 0;
                $studentId = $firstReg + 1;
                if ($studentId < 10) {
                    $id_no = '000' . $studentId;
                } elseif ($studentId < 100) {
                    $id_no = '00' . $studentId;
                } elseif ($studentId < 1000) {
                    $id_no = '0' . $studentId;
                }
            } else {
                $student = User::where('usertype', 'student')->orderBy('id', 'DESC')->first()->id;
                $studentId = $student + 1;
                if ($studentId < 10) {
                    $id_no = '000' . $studentId;
                } elseif ($studentId < 100) {
                    $id_no = '00' . $studentId;
                } elseif ($studentId < 1000) {
                    $id_no = '0' . $studentId;
                }
            }
            $final_id_no = $checkYear . $id_no;
            $user = new User();
            $code = rand(0000, 9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'Student';
            $user->code = $code;
            $user->name = $rq->name;
            $user->email = $rq->email;
            $user->address = $rq->address;
            $user->birthday = date('Y-m-d', strtotime($rq->birthday));
            $user->gender = $rq->gender;
            $user->phone = $rq->phone;
            if ($rq->file('image')) {
                $file = $rq->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();
            $assign_student = new AssignStudent();
            $assign_student->student_id = $user->id;
            $assign_student->year_id = $rq->year_id;
            $assign_student->class_id = $rq->class_id;
            $assign_student->group_id = $rq->group_id;
            $assign_student->shift_id = $rq->shift_id;
            $assign_student->save();
        });
        $notification = array(
            'message' => 'Thêm user thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('student.registration.view')->with($notification);
    }
    public function StudentClassYearWise(Request $rq)
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['year_id'] = $rq->year_id;
        $data['class_id'] = $rq->class_id;
        $data['allData'] = AssignStudent::where('year_id', $rq->year_id)->where('class_id', $rq->class_id)->get();
        return view('backend.student.student_reg.student_view', $data);
    }
    public function StudentRegisterEdit($student_id, Request $rq)
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        $data['editData'] = AssignStudent::with(['student'])->where('student_id', $student_id)->first();
        // dd($data['editData']->toArray());

        return view('backend.student.student_reg.student_edit', $data);
    }
    public function StudentRegisterUpdate(Request $rq, $student_id)
    {
        DB::transaction(function () use ($rq, $student_id) {
            $user = User::where('id', $student_id)->first();
            $user->name = $rq->name;
            $user->email = $rq->email;
            $user->address = $rq->address;
            $user->birthday = date('Y-m-d', strtotime($rq->birthday));
            $user->gender = $rq->gender;
            $user->phone = $rq->phone;
            if ($rq->file('image')) {
                $file = $rq->file('image');
                @unlink(public_path('upload/student_images/' . $user->image));
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();
            $assign_student = AssignStudent::where('id', $rq->id)->where('student_id', $student_id)->first();
            $assign_student->year_id = $rq->year_id;
            $assign_student->class_id = $rq->class_id;
            $assign_student->group_id = $rq->group_id;
            $assign_student->shift_id = $rq->shift_id;
            $assign_student->save();
        });
        $notification = array(
            'message' => 'Cập nhật thông tin user thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('student.registration.view')->with($notification);
    }
    public function StudentRegisterDetail($student_id)
    {
        $data['details'] = AssignStudent::with(['student'])->where('student_id', $student_id)->first();
        $pdf = PDF::loadView('backend.student.student_reg.student_details_pdf', $data);
        // $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
