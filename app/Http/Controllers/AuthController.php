<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Roles;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register_auth(){
        return view('admin.auth.register');
    }

    public function register(Request $request){
        $this->validate($request, [
            'admin_email' => 'required|email|unique:tbl_admin,admin_email',
            'admin_password' => 'required|min:4|max:20',
            'admin_name' => 'required',
            'admin_phone' => 'required',
        ], [
            'admin_email.required' => 'Vui lòng nhập email',
            'admin_email.email' => 'Email không đúng định dạng',
            'admin_email.unique' => 'Email đã có người sử dụng',
            'admin_password.required' => 'Vui lòng nhập mật khẩu',
            'admin_password.min' => 'Mật khẩu ít nhất 4 ký tự',
            'admin_password.max' => 'Mật khẩu nhiều nhất 20 ký tự',
            'admin_name.required' => 'Vui lòng nhập tên',
            'admin_phone.required' => 'Vui lòng nhập số điện thoại',
        ]);

        $admin = new Admin();
        $admin->admin_email = $request->admin_email;
        $admin->admin_password = bcrypt($request->admin_password);
        $admin->admin_name = $request->admin_name;
        $admin->admin_phone = $request->admin_phone;
        $admin->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $admin->save();

        return redirect('login-auth')->with('message', 'Đăng ký thành công');
    }   

    public function login_auth(){
        return view('admin.auth.login');
    }

    public function login(Request $request){
        $data = $request->validate  ([
            'admin_email' => 'required|email',
            'admin_password' => 'required|min:4|max:20',
        ], [
            'admin_email.required' => 'Vui lòng nhập email',
            'admin_email.email' => 'Email không đúng định dạng',
            'admin_password.required' => 'Vui lòng nhập mật khẩu',
            'admin_password.min' => 'Mật khẩu ít nhất 4 ký tự',
            'admin_password.max' => 'Mật khẩu nhiều nhất 20 ký tự',
        ]);
        if(Auth::attempt(['admin_email' => $request->admin_email, 'admin_password' => $request->admin_password])){
            return redirect('dashboard');
        }else{
            return redirect()->back()->with('message', 'Đăng nhập thất bại');
        }
    }

    public function logout_auth(){
        Auth::logout();
        return redirect('login-auth');
    }
}
