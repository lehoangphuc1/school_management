<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function UserView()
    {
        // $data = User::all();
        // $data['allData'] = User::all();
        $data['allData'] = User::where('usertype', 'Admin')->get();
        return view('backend.user.view_user', $data);
    }
    public function UserAdd(Request $rq)
    {
        return view('backend.user.add_user');
    }
    public function UserStore(Request $rq)
    {
        $rq->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
        ]);
        // $user = new User([
        //     'name' => $rq->get('name'),
        //     'usertype' => $rq->get('usertype'),
        //     'password' => Hash::make($rq->get('name')),
        //     'email' => $rq->get('email')
        // ]);
        $user = new User();
        $code = rand(0000, 9999);
        $user->usertype = 'Admin';
        $user->role = $rq->role;
        $user->name = $rq->name;
        $user->email = $rq->email;
        $user->password = bcrypt($code);
        $user->code = $code;
        $user->save();
        // add toastr message
        $notification = array(
            'message' => 'Thêm người dùng mới thành công',
            'alert-type' => 'success'
        );
        // return redirect()->route('user.view')->with('message', 'Thêm người dùng mới thành công');
        return redirect()->route('user.view')->with($notification);
    }
    public function UserEdit($id)
    {
        $user = User::find($id);
        return view('backend.user.edit_user', compact('user'));
    }
    public function UserUpdate($id, Request $rq)
    {
        $rq->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
        ]);
        $user = User::find($id);
        $user->name = $rq->name;
        $user->email = $rq->email;
        $user->role = $rq->role;
        $user->save();
        $notification = array(
            'message' => 'Sửa thông tin người dùng thành công',
            'alert-type' => 'info'
        );
        return redirect()->route('user.view')->with($notification);
    }
    public function UserDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Xóa người dùng thành công',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
