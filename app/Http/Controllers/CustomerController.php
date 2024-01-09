<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class CustomerController extends Controller
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
        $this->AuthLogin();
        $customer = Customer::orderBy('customer_id', 'DESC')->get();
        return view('admin.customer.index', compact('customer'));
    }

    public function add_customer(Request $request)
    {
        $data = $request->validate(
            [
                'customer_name' => 'required|max:25',
                'customer_phone' => 'required|unique:tbl_customers,customer_phone|max:11|regex:/^\d{10,11}$/',
                'customer_email' => 'required|unique:tbl_customers,customer_email|max:25',
                'customer_password' => 'required|min:6|confirmed',
            ],
            [
                'customer_name.required' => 'Tên không được để trống',
                'customer_name.max' => 'Tên không được vượt quá 25 ký tự',
                'customer_phone.required' => 'Số điện thoại không được để trống',
                'customer_phone.unique' => 'Số điện thoại đã tồn tại',
                'customer_phone.max' => 'Số điện thoại không được vượt quá 11 ký tự',
                'customer_phone.regex' => 'Số điện thoại không hợp lệ',
                'customer_email.required' => 'Email không được để trống',
                'customer_email.unique' => 'Email đã tồn tại',
                'customer_email.max' => 'Email không được vượt quá 25 ký tự',
                'customer_password.required' => 'Mật khẩu không được để trống',
                'customer_password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
                'customer_password.confirmed' => 'Mật khẩu không trùng khớp',
            ]
        );
        $customer = new Customer();
        $customer->customer_name = $data['customer_name'];
        $customer->customer_phone = $data['customer_phone'];
        $customer->customer_email = $data['customer_email'];
        $customer->customer_vip = false;
        $customer->verified_email = false;
        $customer->customer_status = true;
        $customer->customer_password = bcrypt($data['customer_password']);
        $customer->created_at = Carbon::now();
        $customer->save();
        $customer_id = $customer->customer_id;

        // Send confirmation email
        $to_email = $customer->customer_email;
        $confirm_date = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_mail = "Xác nhận email ngày: " . $confirm_date;
        $link_confirm_email = url('confirm-email?email='.$to_email);

        // Store session data
        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $data['customer_name']);

        $data = array("name" => $title_mail, "body" => $link_confirm_email, "email" => $to_email);
        Mail::send('admin.mail.send_confirm', ['data'=>$data], function ($message) use ($title_mail, $data) {
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'], $title_mail);
        });

        return redirect()->back()->with('message', 'Vui lòng kiểm tra email để xác nhận đăng nhập');
    }

    public function login_customer(Request $request)
    {
        $data = $request->all();
        $email = $data['email_account'];
        $password = $data['password_account'];
        $result = Customer::where('customer_email', $email)->first();

        if ($result && password_verify($password, $result->customer_password)) {
            if ($result->customer_status == true && $result->verified_email == true) {
                Session::put('customer_id', $result->customer_id);
                Session::put('customer_name', $result->customer_name);
                return redirect('/checkout');
            } else {
                return redirect()->back()->with('message', 'Không thể đăng nhập. Tài khoản của bạn chưa được xác nhận hoặc đã bị vô hiệu hóa.');
            }
        } else {
            return redirect('/login-checkout')->with('message', 'Tài khoản hoặc mật khẩu không chính xác.');
        }
    }

    public function toggleCustomerStatus($customer_id, $lock = true) {
        $this->AuthLogin();

        $customer = Customer::find($customer_id);

        if (!$customer) {
            return redirect()->back()->with('message', 'Không tìm thấy khách hàng');
        }

        $customer->customer_status = $lock ? false : true;
        $customer->save();

        $actionMessage = $lock ? 'khóa' : 'mở khóa';
        $statusMessage = $lock ? 'Tài khoản đã được khóa' : 'Tài khoản đã được mở khóa';

        return redirect()->back()->with('message', $statusMessage);
    }

    public function lock_customer($customer_id) {
        return $this->toggleCustomerStatus($customer_id, true);
    }

    public function unlock_customer($customer_id) {
        return $this->toggleCustomerStatus($customer_id, false);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        return view('admin.customer.form');
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
    public function destroy($id, $customer_id)
    {
        $customer = Customer::find($customer_id);
        $customer->customer_status = 0;
        $customer->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $customer->save();
        return back();
    }
}
