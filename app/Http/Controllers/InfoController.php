<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class InfoController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Auth::id();
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        $info = Info::find(1);
        return view('admin.info.from', compact('info'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $info_id)
    {
        $this->AuthLogin();
        $data = $request->validate(
            [
                'info_title' => 'required|max:255',
                'info_desc' => 'required|max:255',
                'info_phone' => 'required|max:20',
                'info_email' => 'required|max:50',
                'info_logo' => 'mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            ],
            [
                'info_title.required' => 'Tiêu đề không được để trống',
                'info_desc.required' => 'Mô tả không được để trống',
                'info_phone.required' => 'Số điện thoại không được để trống',
                'info_email.required' => 'Email không được để trống',
                'info_logo.mimes' => 'Ảnh không đúng định dạng',
                'info_logo.max' => 'Ảnh không được quá 2MB',
                'info_logo.dimensions' => 'Ảnh không được nhỏ hơn 100x100px và lớn hơn 2000x2000px',
            ]
        );
        $info = Info::find($info_id);
        $info->info_title = $data['info_title'];
        $info->info_desc = $data['info_desc'];
        $info->info_phone = $data['info_phone'];
        $info->info_email = $data['info_email'];
        $info->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $get_image = $request->file('info_logo');


        if ($get_image) {
            if ($info->info_logo) {
                unlink('uploads/logo/' . $info->info_logo);
            } else {
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move('uploads/logo/', $new_image);
                $info->info_logo = $new_image;
            }
        }
        $info->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
