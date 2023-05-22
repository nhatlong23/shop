<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class SliderController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    public function unactive_slider($slider_id)
    {
        $this->AuthLogin();
        $slider = Slider::find($slider_id);
        $slider->slider_status = 1;
        $slider->save();
        Session::put('message', 'Kích hoạt slider thành công');
        return back();
    }

    public function active_slider($slider_id)
    {
        $this->AuthLogin();
        $slider = Slider::find($slider_id);
        $slider->slider_status = 0;
        $slider->save();
        Session::put('message', 'Không kích hoạt slider thành công');
        return back();
    }

    public function all_slider()
    {
        $all_slider = Slider::orderBy('slider_id', 'DESC')->get();
        return view('admin.slider.all_slider', compact('all_slider'));
    }

    public function add_slider()
    {
        return view('admin.slider.add_slider');
    }

    public function insert_slider(Request $request)
    {
        $this->AuthLogin();
        $data = request()->validate([
            'slider_name' => 'required|unique:tbl_slider,slider_name|max:100',
            'slider_desc' => 'required|max:255',
            'slider_image' => 'required',
            'slider_status' => 'required',
            
        ], [
            'slider_name.required' => 'Tên slider không được để trống',
            'slider_name.unique' => 'Tên slider đã tồn tại',
            'slider_name.max' => 'Tên slider không được vượt quá 100 ký tự',
            'slider_desc.required' => 'Mô tả slider không được để trống',
            'slider_desc.max' => 'Mô tả slider không được vượt quá 255 ký tự',
            'slider_image.required' => 'Hình ảnh slider không được để trống',
            'slider_status.required' => 'Status slider không được để trống',
        ]);

        $slider = new Slider();
        $slider->slider_name = $data['slider_name'];
        $slider->slider_desc = $data['slider_desc'];
        $slider->slider_status = $data['slider_status'];
        $slider->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $slider->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $get_image = $request->file('slider_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/slider', $new_image);
            $slider->slider_image = $new_image;
        }
        $slider->save();

        return redirect()->back()->with('message', 'Thêm slider thành công');
    }

    public function edit_slider($slider_id)
    {
        $this->AuthLogin();
        $edit_slider = Slider::find($slider_id);
        return view('admin.slider.edit_slider', compact('edit_slider'));
    }

    public function update_slider(Request $request, $slider_id)
    {
        $this->AuthLogin();
        $data = request()->validate([
            'slider_name' => 'required|max:100',
            'slider_desc' => 'required|max:255',
            'slider_image' => 'required',
            'slider_status' => 'required',
        ], [
            'slider_name.required' => 'Tên slider không được để trống',
            'slider_name.max' => 'Tên slider không được vượt quá 100 ký tự',
            'slider_desc.required' => 'Mô tả slider không được để trống',
            'slider_desc.max' => 'Mô tả slider không được vượt quá 255 ký tự',
            'slider_image.required' => 'Hình ảnh slider không được để trống',
            'slider_status.required' => 'Status slider không được để trống',
        ]);

        $slider = Slider::find($slider_id);
        $slider->slider_name = $data['slider_name'];
        $slider->slider_desc = $data['slider_desc'];
        $slider->slider_status = $data['slider_status'];
        $slider->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $get_image = $request->file('slider_image');
        if ($get_image) {
            if (file_exists('uploads/slider/' . $slider->slider_image)) {
                unlink('uploads/slider/' . $slider->slider_image);
            } else {
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move('uploads/slider', $new_image);
                $slider->slider_image = $new_image;
            }
        }
        $slider->save();

        return redirect()->back()->with('message', 'Cập nhật slider thành công');
    }

    public function delete_slider($slider_id)
    {
        $this->AuthLogin();
        $slider = slider::find($slider_id);
        if (file_exists('uploads/slider/' . $slider->slider_image)) {
            unlink('uploads/slider/' . $slider->slider_image);
        }
        $slider->delete();
        Session::put('message', 'Xóa slider thành công');
        return back();
    }

    
}
