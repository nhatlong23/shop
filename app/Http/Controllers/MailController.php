<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
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

    public function send_coupon()
    {
        //get customer vip
        $customers_vip = Customer::where('customer_vip', 1)->get();
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $title_mail = "Mã khuyến mãi ngày: " . '' . $now;
        $data = [];
        foreach ($customers_vip as $vip) {
            $data['email'][] = $vip->customer_email;
        }
        Mail::send('admin.mail.send_coupon', $data, function ($message) use ($title_mail, $data) {
            $message->to($data['email'], 'Khách hàng VIP')->subject($title_mail);
            $message->from($data['email'], $title_mail);
        });
        return redirect()->back()->with('success', 'Gửi mã khuyến mãi thành công');
    }
    public function send_mail()
    {
        $to_name = "Long Nguyen";
        $to_email = "nhatlong23568@gmail.com"; //send to this email
        $data = array("name" => "Mail từ tài khoản khách hàng", "body" => "mail gửi về vấn đề hàng hóa");
        Mail::send('admin.mail.send_mail', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email)->subject('Test thử gửi mail');
            $message->from($to_email, $to_name);
        });

        return redirect('/')->with('message', 'Gửi mail thành công');
    }
    public function mail_example()
    {
        return view('admin.mail.send_coupon');
    }
}
