<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class CouponController extends Controller
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
    public function add_coupon()
    {
        $this->AuthLogin();
        // $coupon = Coupon::all();
        return view('admin.coupon.add_coupon');
    }

    public function add_coupon_code(Request $request)
    {
        $this->AuthLogin();
        $request->validate([
            'coupon_name' => 'required|unique:tbl_coupon,coupon_name',
            'coupon_code' => 'required|unique:tbl_coupon,coupon_code',
            'coupon_time' => 'required|alpha_num',
            'coupon_number' => 'required|alpha_num',
        ], [
            'coupon_name.required' => 'Tên mã giảm giá không được để trống',
            'coupon_name.unique' => 'Tên mã giảm giá đã tồn tại',
            'coupon_code.required' => 'Mã giảm giá không được để trống',
            'coupon_code.unique' => 'Mã giảm giá đã tồn tại',
            'coupon_time.required' => 'Số lượng mã không được để trống',
            'coupon_time.alpha_num' => 'Số lượng mã phải là số',
            'coupon_number.required' => 'Số % hoặc tiền giảm không được để trống',
            'coupon_number.alpha_num' => 'Số % hoặc tiền giảm phải là số',
        ]);

        $coupon = new Coupon();
        $coupon->coupon_name = $request->coupon_name;
        $coupon->coupon_code = $request->coupon_code;
        $coupon->coupon_time = $request->coupon_time;
        $coupon->coupon_number = $request->coupon_number;
        $coupon->coupon_condition = $request->coupon_condition;
        $coupon->created_at = Carbon::now();
        $coupon->save();
        Session::put('message', 'Thêm mã giảm giá thành công');
        return redirect::to('/add-coupon');
    }

    public function all_coupon()
    {
        $this->AuthLogin();
        $coupon = Coupon::orderBy('coupon_id', 'DESC')->get();
        return view('admin.coupon.all_coupon', compact('coupon'));
    }

    public function delete_coupon($coupon_id)
    {
        $this->AuthLogin();
        Coupon::find($coupon_id)->delete();
        Session::put('message', 'Xóa mã giảm giá thành công');
        return redirect::to('/all-coupon');
    }

    public function check_coupon(Request $request)
    {
        $data = $request->all();

        $coupon = Coupon::where('coupon_code', $data['coupon'])->first();
        if ($coupon) {
            $count_coupon = $coupon->count();
            if ($count_coupon > 0) {
                $count_session = Session::get('coupon');
                if ($count_session == true) {
                    $is_avaiable = 0;
                    if ($is_avaiable == 0) {
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,
                        );
                        Session::put('coupon', $cou);
                    }
                } else {
                    $cou[] = array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_condition' => $coupon->coupon_condition,
                        'coupon_number' => $coupon->coupon_number,
                    );
                    Session::put('coupon', $cou);
                }
                Session::save();
                return redirect()->back()->with('message', 'Thêm mã giảm giá thành công');
            }
        } else {
            return redirect()->back()->with('message', 'Mã giảm giá không tồn tại');
        }
    }
    public function  unset_coupon(){
        $coupon = Session::get('coupon');
        if($coupon == true){
            Session::forget('coupon');
            return back()->with('message', 'Xóa mã giảm giá thành công');
        }else{
            return back()->with('message', 'Xóa mã giảm giá thất bại');
        }
    }
}
