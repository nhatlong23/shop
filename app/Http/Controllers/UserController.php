<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class UserController extends Controller
{
    public function all_user(Request $request)
    {
        $admin = Admin::with('roles')->orderBy('admin_id', 'ASC')->get();
        return view('admin.user.all_user', compact('admin'));
    }


    public function add_user()
    {
        // $data = $request->all();
        return view('admin.user.add_user');
    }

    public function insert_user(Request $request)
    {
        $data = $request->validate([
            'admin_name' => 'required',
            'admin_email' => 'required|email|unique:tbl_admin,admin_email',
            'admin_phone' => 'required|numeric',
            'admin_password' => 'required|min:4',
        ], [
            'admin_name.required' => 'Tên người dùng không được để trống',
            'admin_email.required' => 'Email không được để trống',
            'admin_email.email' => 'Email không đúng định dạng',
            'admin_email.unique' => 'Email đã tồn tại',
            'admin_phone.required' => 'Số điện thoại không được để trống',
            'admin_phone.numeric' => 'Số điện thoại phải là số',
            'admin_password.required' => 'Mật khẩu không được để trống',
            'admin_password.min' => 'Mật khẩu phải có ít nhất 4 ký tự',
        ]);

        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_phone = $data['admin_phone'];
        $admin->admin_password = md5($data['admin_password']);
        $admin->save();
        $admin->roles()->attach(Roles::where('name', 'User')->first());
        return redirect()->back()->with('message', 'Thêm người dùng thành công');
    }

    public function assign_roles(Request $request)
    {
        $data = $request->all();
        if (Auth::id() == $request->admin_id) {
            return redirect()->back()->with('message', 'Không thể cấp quyền cho chính mình');
        }
        $user = Admin::where('admin_email', $data['admin_email'])->first();

        if (!$user) {
            return redirect()->back()->withErrors(['message', 'User not found']);
        }

        $user->roles()->detach();

        if ($request['author_role']) {
            $user->roles()->attach(Roles::where('name', 'Author')->first());
        }
        if ($request['admin_role']) {
            $user->roles()->attach(Roles::where('name', 'Admin')->first());
        }
        if ($request['user_role']) {
            $user->roles()->attach(Roles::where('name', 'User')->first());
        }

        $message = 'Cập nhật quyền cho email <span style="color:red">' . $request['admin_email'] . '</span> thành công';

        return redirect()->back()->with('message', $message);
    }

    public function delete_user_roles($admin_id)
    {

        if (Auth::id() == $admin_id) {
            return redirect()->back()->with('message', 'Không thể xóa quyền của người dùng này');
        }
        $admin = Admin::find($admin_id);
        if ($admin) {
            $admin->roles()->detach();
            $admin->delete();
        }
        return redirect()->back()->with('message', 'Xóa user thành công');
    }

    public function impersonate($admin_id){
        $user = Admin::where('admin_id', $admin_id)->first();
        if($user){
            session()->put('impersonate', $user->admin_id);
        }
        return Redirect()->back();
    }

    public function impersonate_leave(){
        session()->forget('impersonate');
        return Redirect()->back();
    }
}
