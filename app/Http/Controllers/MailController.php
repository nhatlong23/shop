<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;
use App\Models\Coupon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class MailController extends Controller
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
        //
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
    public function update(Request $request, $id)
    {
        //
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

    public function send_coupon_vip($coupon_time, $coupon_condition, $coupon_number, $coupon_code, Request $request)
    {
        $data = $request->all();
        // Get customer vip
        $customers_vip = Customer::where('customer_vip', 1)->get();
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $coupon = Coupon::where('coupon_code', $coupon_code)->first();
        $coupon_start = $coupon->coupon_start;
        $coupon_end = $coupon->coupon_end;
        $title_mail = "Mã khuyến mãi ngày: " . $now;
        $data = [];
        foreach ($customers_vip as $vip) {
            $data['email'][] = $vip->customer_email;
        }
        $couponData = [
            'coupon_start' => $coupon_start,
            'coupon_end' => $coupon_end,
            'coupon_time' => $coupon_time,
            'coupon_condition' => $coupon_condition,
            'coupon_number' => $coupon_number,
            'coupon_code' => $coupon_code,
        ];
        Mail::send('admin.mail.send_coupon', ['coupon' => $couponData], function ($message) use ($title_mail, $data) {
            $message->to($data['email'], 'Khách hàng VIP')->subject($title_mail);
            $message->from(config('mail.from.address'), $title_mail);
        });
        return redirect()->back()->with('message', 'Gửi mã khuyến mãi thành công');
    }
    public function send_coupon(Request $request)
    {
        $data = $request->all();
        //get customer
        $customers = Customer::where('customer_vip', '=', null)->get();
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $title_mail = "Mã khuyến mãi ngày: " . '' . $now;
        $data = [];
        foreach ($customers as $vip) {
            $data['email'][] = $vip->customer_email;
        }
        Mail::send('admin.mail.send_coupon', $data, function ($message) use ($title_mail, $data) {
            $message->to($data['email'], 'Khách hàng VIP')->subject($title_mail);
            $message->from($data['email'], $title_mail);
        });
        return redirect()->back()->with('success', 'Gửi mã khuyến mãi thành công');
    }
    public function send_mail(Request $request)
    {
        $data = $request->all();
        $to_name = "Long Nguyen";
        $to_email = "nhatlong23568@gmail.com"; //send to this email
        $data = array("name" => "Mail từ tài khoản khách hàng", "body" => "mail gửi về vấn đề hàng hóa");
        Mail::send('admin.mail.send_order', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email)->subject('Test thử gửi mail');
            $message->from($to_email, $to_name);
        });

        return redirect('/')->with('message', 'Gửi mail thành công');
    }
    public function forgot_password()
    {
        return view('pages.checkout.forgot_password');
    }

    public function reset_password(Request $request)
    {
        $data = $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $title_mail = "Lấy lại password: " . '' . $now;
        $customer = Customer::where('customer_email', '=' , $data['email'])->get();
        foreach ($customer as $key => $customer){
            $customer_id = $customer->customer_id;
        }

        if($customer){
            $count_customer = $customer->count();
            if($count_customer == 0){
                return redirect()->back()->with('error', 'Email không tồn tại');
            }else{
                $random_token = Str::random(30);
                $customer = Customer::find($customer_id);
                $customer->customer_token = $random_token;
                $customer->save();
                //send mail
                $to_email = $data['email']; //send to this email
                $link_reset_password = url('update-new-password?email='.$to_email.'&token='.$random_token);
                $data = array("name" => $title_mail, "body" => $link_reset_password, "email" => $data['email']);

                Mail::send('admin.mail.send_reset_password', ['data'=>$data], function ($message) use ($title_mail, $data) {
                    $message->to($data['email'])->subject($title_mail);
                    $message->from($data['email'], $title_mail);
                });
                return redirect()->back()->with('message', 'Vui lòng check mail để lấy lại mật khẩu');
            }
        }        
    }

    public function reset_new_password(Request $request){
        $data = $request->all();
        $random_token = Str::random(30);
        $customer = Customer::where('customer_email', '=' , $data['email'])->where('customer_token', '=' , $data['token'])->get();
        $count = $customer->count();
        if($count>0){
            foreach($customer as $key => $customer){
                $customer_id = $customer->customer_id;
            }
            $reset_password = Customer::find($customer_id);
            $reset_password->customer_password = bcrypt($data['password_account']);
            $reset_password->customer_token = $random_token;
            $reset_password->save();
            return redirect('login-checkout');
        }else{
            return redirect('forgot-password')->with('message', 'Vui lòng nhập mail vì đã quá hạn');
        }
    }

    public function confirm_email(Request $request)
    {
        $data = $request->all();
        $customer = Customer::where('customer_email', '=', $data['email'])->first();

        if ($customer) {
            if ($customer->customer_status == 1) {
                // Customer email is already verified
                $customer_id = $customer->customer_id;

                // Update session data
                Session::put('customer_id', $customer_id);
                Session::put('customer_name', $customer->customer_name);

                return redirect('checkout');
            } else {
                // Customer email is not verified
                return redirect()->back()->with('message', 'Vui lòng xác nhận email để đăng nhập');
            }
        }

        // Handle the case where the customer is not found
        return redirect()->back()->with('message', 'Không tìm thấy khách hàng');
    }

    public function update_new_password(){
        return view ('pages.checkout.update_new_password');
    }

    public function mail_example()
    {
        return view('admin.mail.send_confirm');
    }
}
