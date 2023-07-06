<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Cart;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Info;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\Coupon;
use App\Models\Social;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class CheckoutController extends Controller
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

    public function login_checkout()
    {
        return view('pages.checkout.login_checkout');
    }

    public function add_customer(Request $request)
    {
        $data = $request->validate(
            [
                'customer_name' => 'required|max:25',
                'customer_phone' => 'required|unique:tbl_customers,customer_phone|max:25',
                'customer_email' => 'required|unique:tbl_customers,customer_email|max:25',
                'customer_password' => 'required|min:6|confirmed',

            ],
            [
                'customer_name.required' => 'Tên không được để trống',
                'customer_name.max' => 'Tên không được vượt quá 25 ký tự',
                'customer_phone.required' => 'Số điện thoại không được để trống',
                'customer_phone.unique' => 'Số điện thoại đã tồn tại',
                'customer_phone.max' => 'Số điện thoại không được vượt quá 25 ký tự',
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
        $customer->customer_password = bcrypt($data['customer_password']);
        $customer->created_at = Carbon::now();
        $customer->save();
        $customer_id = $customer->customer_id;
        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $data['customer_name']);
        return Redirect::to('checkout');
    }

    public function checkout()
    {
        return view('pages.checkout.show_checkout');
    }


    public function logout_checkout()
    {
        Session::flush();
        return Redirect::to('/');
    }

    public function login_customer(Request $request)
    {
        $data = $request->all();
        $email = $data['email_account'];
        $password = $data['password_account'];
        $result = Customer::where('customer_email', $email)->first();
        
        if ($result && password_verify($password, $result->customer_password)) {
            Session::put('customer_id', $result->customer_id);
            return Redirect::to('/checkout');
        } else {
            return Redirect::to('/login-checkout');
        }
    }

    public function login_customer_google(){
        config([
            'services.google.redirect' => env('GOOGLE_CALLBACK_URL'),
        ]);
        return Socialite::driver('google')->redirect();
    }

    public function callback_customer_google(){
        
    }

    public function confirm_order(Request $request)
    {
        $data = $request->all();

        // Giảm số lượng phiếu giảm giá
        if (!empty($data['order_coupon'])) {
            $coupon = Coupon::where('coupon_code', $data['order_coupon'])->first();
        
            if ($coupon) {
                $coupon->decrement('coupon_time');
                $coupon_mail = $coupon->coupon_code;
            } else {
                $coupon_mail = "Invalid coupon";
            }
        } else {
            $coupon_mail = "Không sử dụng mã";
        }
        $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        if (isset($coupon)) {
            $coupon_number = $coupon->coupon_number;
            $coupon_condition = $coupon->coupon_condition;
        } else {
            // Không có mã giảm giá
            $coupon_number = null;
            $coupon_condition = 'Không có mã giảm giá';
        }
        // Tạo một bản ghi vận chuyển mới
        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $shipping->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $shipping->save();
        
        $shipping_id = $shipping->shipping_id;
        
        // Tạo mã thanh toán
        $checkout_code = substr(md5(microtime()), rand(0, 26), 5);
        
        // Tạo đơn hàng mới
        $order = new Order();
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        $order->order_code = $checkout_code;
        $order->order_date = Carbon::now('Asia/Ho_Chi_Minh');
        $order->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $order->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $order->save();
        
        // Xử lý chi tiết đơn hàng cho từng mặt hàng trong giỏ hàng
        if (Session::get('cart')) {
            foreach (Session::get('cart') as $key => $cart) {
                $order_details = new OrderDetails();
                $order_details->order_code = $checkout_code;
                $order_details->product_id = $cart['product_id'];
                $order_details->product_name = $cart['product_name'];
                $order_details->product_price = $cart['product_price'];
                $order_details->product_sales_quantity = $cart['product_qty'];
                $order_details->product_coupon = $data['order_coupon'];
                $order_details->product_feeship = $data['order_fee'];
                $order_details->created_at = Carbon::now('Asia/Ho_Chi_Minh');
                $order_details->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
                $order_details->save();
            }
        }

        //send mail
        $title_mail = "Đơn hàng ngày: " . '' . $order_date;
        $customer = Customer::find(Session::get('customer_id'));
        $data['email'][] = $customer->customer_email;
        $cart_array = [];
        if (Session::get('cart')) {
            foreach (Session::get('cart') as $key => $cart_mail) {
                $cart_array[] = [
                    "product_image" => $cart_mail['product_image'],
                    "product_name" => $cart_mail['product_name'],
                    "product_price" => $cart_mail['product_price'], 
                    "product_qty" => $cart_mail['product_qty'],
                ];
            }
        }
        //lay shipping
        $shipping_array = array(
            "customer_name" => $customer->customer_name,
            "shipping_name" => $data['shipping_name'],
            "shipping_phone" => $data['shipping_phone'],
            "shipping_email" => $data['shipping_email'],
            "shipping_address" => $data['shipping_address'],
            "shipping_notes" => $data['shipping_notes'],
            "shipping_method" => $data['shipping_method'],
            "fee_shipping" => $data['order_fee'],
        );
        //order_code,coupon code
        $order_code_array = array(
            "order_code" => $checkout_code,
            "coupon_code" => $coupon_mail,
            "order_date" => $order_date,
            "coupon_number" => $coupon_number,
            "coupon_condition" => $coupon_condition,
        );
        Mail::send('admin.mail.send_order', ['data'=>$data, 'cart_array'=>$cart_array, 'shipping_array'=>$shipping_array, 'order_code_array'=>$order_code_array],
        function ($message) use ($title_mail, $data) {
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'], $title_mail);
        });
        // Xóa dữ liệu giỏ hàng, phí và phiếu giảm giá khỏi phiên
        Session::forget('cart');
        Session::forget('fee');
        Session::forget('coupon');
    }
    
    public function success_order()
    {
        return view('pages.checkout.success');
    }

    //order Admin
    public function manage_order()
    {
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')
            ->join('tbl_customers', 'tbl_order.customer_id', '=', 'tbl_customers.customer_id')
            ->select('tbl_order.*', 'tbl_customers.customer_name')
            ->orderby('tbl_order.order_id', 'desc')->get();
        $manager_order = view('admin.manage_order')->with('all_order', $all_order);
        return view('admin.layout')->with('admin.manage_order', $manager_order);
    }

    public function view_order($order_id)
    {
        $this->AuthLogin();
        $order_by_id = DB::table('tbl_order')
            ->join('tbl_customers', 'tbl_order.customer_id', '=', 'tbl_customers.customer_id')
            ->join('tbl_shipping', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
            ->join('tbl_order_details', 'tbl_order.order_id', '=', 'tbl_order_details.order_id')
            ->select('tbl_order.*', 'tbl_customers.*', 'tbl_shipping.*', 'tbl_order_details.*')
            ->first();
        $manager_order_by_id = view('admin.view_order')->with('order_by_id', $order_by_id);
        return view('admin.layout')->with('admin.view_order', $manager_order_by_id);
    }

    public function delete_order($order_id)
    {
        $this->AuthLogin();
        DB::table('tbl_order')->where('order_id', $order_id)->delete();
        Session::put('message', 'Xóa đơn hàng thành công');
        return Redirect::to('/manager_order');
    }
}
