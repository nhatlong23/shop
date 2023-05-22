<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Info;
use Illuminate\Support\Facades\Auth;

class InfoController extends Controller
{
    public function AuthLogin()
    {
        if (Session::get('login_normal')) {
            $admin_id = Session::get('admin_id');
        } else {
            $admin_id = Auth::id();
        }
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function all_Info()
    {
        $this->AuthLogin();
        $all_info = Info::all();
        return view('admin.info.all_info')->with(compact('all_info'));
    }

    public function update_info(Request $request, $info_id)
    {
        $this->AuthLogin();
        $data = $request->validate(
            [
                'info_title' => 'required|unique:tbl_info|max:50',
                'info_desc' => 'required|unique:tbl_info|max:254',
                'info_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'info_title.required' => 'Tiêu đề không được để trống',
                'info_title.unique' => 'Tiêu đề đã tồn tại',
                'info_title.max' => 'Tiêu đề không được vượt quá 50 ký tự',
                'info_desc.required' => 'Mô tả không được để trống',
                'info_desc.unique' => 'Mô tả đã tồn tại',
                'info_desc.max' => 'Mô tả không được vượt quá 254 ký tự',
                'info_logo.image' => 'Ảnh không đúng định dạng',
                'info_logo.mimes' => 'Ảnh không đúng định dạng',
                'info_logo.max' => 'Ảnh không được vượt quá 2048 ký tự',
            ]
        );

        $info = Info::find($info_id);
        $info->info_title = $data['info_title'];
        $info->info_desc = $data['info_desc'];
        $get_image = $request->file('info_logo');
        if ($get_image) {
            if (file_exists('uploads/info/' . $info->info_logo)) {
                unlink('uploads/info/' . $info->info_logo);
            } else {
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move('uploads/info', $new_image);
                $info->info_logo = $new_image;
            }
        }
        $info->save();

        Session::put('message', 'Cập nhật thông tin wedsite thành công');
        return view('admin.info.all_info', compact(('update_info')));
    }
}
