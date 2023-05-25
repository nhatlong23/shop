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
use App\Models\Brand;
use App\Models\Customer;

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
        $cate_product = Category::where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = Brand::where('brand_status', '0')->orderby('brand_id', 'desc')->get();
        return view('pages.checkout.login_checkout', compact('cate_product', 'brand_product'));
    }

    public function add_customer(Request $request)
    {
        $data = $request->validate(
            [
                'customer_name' => 'required|unique:tbl_customers,customer_name|max:25',
                'customer_phone' => 'required|unique:tbl_customers,customer_phone|max:25',
                'customer_email' => 'required|unique:tbl_customers,customer_email|max:25',
                'customer_password' => 'required|min:6|max:20|confirmed',

            ],
            [
                'customer_name.required' => 'Tên không được để trống',
                'customer_name.unique' => 'Tên đã tồn tại',
                'customer_name.max' => 'Tên không được vượt quá 25 ký tự',
                'customer_phone.required' => 'Số điện thoại không được để trống',
                'customer_phone.unique' => 'Số điện thoại đã tồn tại',
                'customer_phone.max' => 'Số điện thoại không được vượt quá 25 ký tự',
                'customer_email.required' => 'Email không được để trống',
                'customer_email.unique' => 'Email đã tồn tại',
                'customer_email.max' => 'Email không được vượt quá 25 ký tự',
                'customer_password.required' => 'Mật khẩu không được để trống',
                'customer_password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
                'customer_password.max' => 'Mật khẩu không được vượt quá 20 ký tự',
                'customer_password.confirmed' => 'Mật khẩu không trùng khớp',
            ]
        );
        $customer = new Customer();
        $customer->customer_name = $data['customer_name'];
        $customer->customer_phone = $data['customer_phone'];
        $customer->customer_email = $data['customer_email'];
        $customer->customer_password = md5($data['customer_password']);
        $customer->created_at = Carbon::now();
        $customer->save();
        $customer_id = $customer->customer_id;
        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $data['customer_name']);
        return Redirect::to('checkout');
    }

    public function checkout()
    {
        $cate_product = Category::where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = Brand::where('brand_status', '0')->orderby('brand_id', 'desc')->get();

        return view('pages.checkout.show_checkout', compact('cate_product', 'brand_product'));
    }

    public function save_checkout_customer(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_notes'] = $request->shipping_notes;
        $data['shipping_address'] = $request->shipping_address;
        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id', $shipping_id);
        return Redirect::to('/payment');
    }

    public function payment()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();
        return view('pages.checkout.payment')->with('category', $cate_product)->with('brand', $brand_product);
    }

    public function order_place(Request $request)
    {
        // insert payment method
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order details
        $content = Cart::content();
        foreach ($content as $v_content) {
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_details')->insert($order_d_data);
        }
        if ($data['payment_method'] == 1) {
            echo 'Thanh toán bằng thẻ ATM';
        } else if ($data['payment_method'] == 2) {
            Cart::destroy();
            return view('pages.checkout.handcash');
        } else {
            echo 'Thanh toán bằng thẻ ghi nợ';
        }
        return Redirect::to('/payment');
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
        $password = md5($data['password_account']);
        $result = Customer::where('customer_email', $email)->where('customer_password', $password)->first();
        if ($result) {
            Session::put('customer_id', $result->customer_id);
            return Redirect::to('/checkout');
        } else {
            return Redirect::to('/login-checkout');
        }
    }

    public function confirm_order(Request $request)
    {
        $data = $request->all();
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

        $checkout_code = substr(md5(microtime()), rand(0, 26), 5);
        $order = new Order();
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        $order->order_code = $checkout_code;
        $order->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $order->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $order->save();

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
        Session::forget('cart');
        Session::forget('fee');
        Session::forget('coupon');
    }
    public function success_order(){
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
