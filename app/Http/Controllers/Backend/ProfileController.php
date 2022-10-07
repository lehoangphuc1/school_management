<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ProfileView()
    {
        $id = (Auth::user())->id;
        $user = User::find($id);
        return view('backend.user.view_profile', compact('user'));
    }
    public function ProfileEdit()
    {
        $id = (Auth::user())->id;
        $editData = User::find($id);
        return view('backend.user.edit_profile', compact('editData'));
    }
    public function ProfileUpdate(Request $rq)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $rq->name;
        $data->email = $rq->email;
        $data->phone = $rq->phone;
        $data->address = $rq->address;
        $data->gender = $rq->gender;
        if ($rq->file('image')) {
            $file = $rq->file('image');
            @unlink(public_path('upload/user_images/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['image'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Sửa profile thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('profile.view')->with($notification);
    }

    public function UsershowChangePassword()
    {
        return view('backend.user.changePassword_user');
    }
    public function UserChangePassword(Request $request)
    {
        // $user = new User();
        // if (!(Hash::check($rq->get('current_password'), $user->password))) {
        //     return redirect()->back()->with("errors", "Your current password does not matches with the password.");
        // }
        // if (strcmp($rq->get('current_password'), $rq->get('password')) == 0) {
        //     // Current password and new password same
        //     return redirect()->back()->with("errors", "New Password cannot be same as your current password.");
        // }
        // $validatedData = $rq->validate([
        //     'current_password' => 'required',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);
        // $user->password = Hash::make($rq->get('password'));
        // $user->save();
        // return redirect()->back()->with("success", "Password successfully changed!"); cach1
        // $validatedData = $rq->validate([
        //     'current_password' => 'required',
        //     'password' => 'required|string|min:6',
        // ]);
        // // $user = new User();
        // // if (!(Hash::check($rq->get('current-password'), $user->password))) {
        // //     return redirect()->back()->with("errors", "Your current password does not matches with the password.");
        // $hashedPassword = Auth::user()->password;
        // if (!Hash::check($rq->current_password, $hashedPassword)) {
        //     return redirect()->back()->with("errors", "Your current password does not matches with the password.");
        // } else {
        //     $user = User::find(Auth::id());
        //     $user->password = Hash::make($rq->password);
        //     $user->save();
        //     Auth::logout();
        //     return redirect()->route('login');
        // }
        # Validation
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required',
            'confirm_password' => ['same:password'],
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->current_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                $users = User::find(Auth::id());
                $users->password = Hash::make($request->password);
                $users->save();
                $notification = array(
                    'message' => 'Thay đổi mật khẩu thành công',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'message' => 'Mật khẩu mới không được trùng mật khẩu cũ',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Mật khẩu cũ không khớp',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
