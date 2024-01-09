<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Social;
use Socialite;
use Illuminate\Support\Facades\Auth;
use App\Rules\Captcha;
use App\Models\Statistics;
use App\Models\Visitors;
use Carbon\Carbon;

session_start();

class AdminController extends Controller
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

    public function login_facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook()
    {
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider', 'facebook')->where('provider_user_id', $provider->getId())->first();
        if ($account) {
            //login vao trang quan tri
            $account_name = Admin::where('admin_id', $account->user)->first();
            Session::put('admin_name', $account_name->admin_name);
            Session::put('login_normal', true);
            Session::put('admin_id', $account_name->admin_id);
            return Redirect::to('/dashboard')->with('message', 'Đăng nhập thành công');
        } else {
            //tao tai khoan moi
            $new_account = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook',
            ]);
            $orang = Admin::where('admin_email', $provider->getEmail())->first();
            if (!$orang) {
                $orang = Admin::create([
                    'admin_name' => $provider->getName(),
                    'admin_email' => $provider->getEmail(),
                    'admin_password' => '',
                    'admin_phone' => '',
                ]);
            }
            $new_account->admin()->associate($orang);
            $new_account->save();

            $account_name = Admin::where('admin_id', $account->user)->first();
            Session::put('admin_name', $account_name->admin_name);
            Session::put('login_normal', true);
            Session::put('admin_id', $account_name->admin_id);
            return Redirect::to('/dashboard')->with('message', 'Đăng nhập thành công');
        }
    }


    public function login_google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback_google()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $authUse = $this->findOrCreateUser($user, 'google');
        if ($authUse) {
            $account_name = Admin::where('admin_id', $user->user)->first();
            Session::put('admin_name', $account_name->admin_name);
            Session::put('login_normal', true);
            Session::put('admin_id', $account_name->admin_id);
        } elseif ($new_account) {
            $account_name = Admin::where('admin_id', $user->user)->first();
            Session::put('admin_name', $account_name->admin_name);
            Session::put('login_normal', true);
            Session::put('admin_id', $account_name->admin_id);
        }
        return Redirect::to('/dashboard')->with('message', 'Đăng nhập thành công');
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = Social::where('provider_user_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        } else {
            $new_account = new Social([
                'provider_user_id' => $user->id,
                'provider' => strtoupper($provider)
            ]);
            $orang = Admin::where('admin_email', $user->email())->first();
            if (!$orang) {
                $orang = Admin::create([
                    'admin_name' => $user->name(),
                    'admin_email' => $user->email(),
                    'admin_password' => '',
                    'admin_phone' => '1',
                ]);
            }
            $new_account->admin()->associate($orang);
            $new_account->save();
            return $new_account;
        }

        // $account_name = Admin::where('admin_id', $authUser->user)->first();
        // Session::put('admin_name', $account_name->admin_name);
        // Session::put('login_normal', true);
        // Session::put('admin_id', $account_name->admin_id);
        // return redirect('dashboard')->with('message', 'Dang nhap Admin thanh cong');
    }

    public function index()
    {
        return view('admin.login');
    }
    public function show_dashboard()
    {
        $this->AuthLogin();
        $early_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $end_of_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        $early_this_month = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $one_years = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        //total last month
        $total_last_month = Visitors::whereBetween('created_at', [$early_last_month, $end_of_last_month])->count();
        //total this month
        $total_this_month = Visitors::whereBetween('created_at', [$early_this_month, $now])->count();
        //total 1 years
        $total_one_years = Visitors::whereBetween('created_at', [$one_years, $now])->count();
        $product_view = Product::orderBy('product_views', 'desc')->orderBy('product_sold', 'desc')->take(10)->get();


        return view('admin.dashboard', compact('total_last_month', 'total_this_month', 'total_one_years', 'product_view'));
    }
    public function dashboard(Request $request)
    {
        $data = $request->validate([
            'admin_email' => 'required|email',
            'admin_password' => 'required',
            'g-recaptcha-response' => new Captcha(),
        ]);

        $admin_email = $request->admin_email;
        $admin_password = bcrypt($request->admin_password);
        $login = Admin::where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();

        if ($login) {
            $login_count = $login->count();
            if ($login_count > 0) {
                Session::put('admin_name', $login->admin_name);
                Session::put('admin_id', $login->admin_id);
                return Redirect::to('/dashboard');
            } else {
                Session::put('message', 'Email or Password is incorrect');
                return Redirect::to('/admin');
            }
        }
    }
    public function logout()
    {
        $this->AuthLogin();
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin');
    }

    public function dashboard_filter(Request $request)
    {
        $this->AuthLogin();
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $get = Statistics::whereBetween('order_date', [$from_date, $to_date])->orderBy('order_date', 'ASC')->get();

        // Kiểm tra nếu không có đơn hàng
        if ($get->isEmpty()) {
            echo 'Không có đơn hàng trong khoảng thời gian được chọn.';
        } else {
            $chart_data = [];
            foreach ($get as $key => $value) {
                $chart_data[] = array(
                    'period' => $value->order_date,
                    'order' => $value->total_order,
                    'sales' => $value->sales,
                    'profit' => $value->profit,
                    'quantity' => $value->quantity,
                );
            }
            echo json_encode($chart_data);
        }
    }


    public function dashboard_30days_order()
    {
        $this->AuthLogin();
        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = Statistics::whereBetween('order_date', [$sub30days, $now])->orderBy('order_date', 'ASC')->get();
        $chart_data = [];
        foreach ($get as $key => $value) {
            $chart_data[] = array(
                'period' => $value->order_date,
                'order' => $value->total_order,
                'sales' => $value->sales,
                'profit' => $value->profit,
                'quantity' => $value->quantity,
            );
        }
        echo json_encode($chart_data);
    }

    public function order_date(Request $request)
    {
        $this->AuthLogin();
        $order_date = $_GET['date'];
        // $order = Order::where('order_date', $order_date)->orderBy('created_at', 'DESC')->get();
        return view('admin.order.order_date', compact('order'));
    }

    public function dashboard_status(Request $request)
    {
        $data = $request->all();
        $first_month = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $early_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $end_of_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();


        $chart_data = []; // Initialize chart_data as an empty array

        if ($data['dashboard_value'] == '7day') {
            $get = Statistics::where('order_date', '>=', $sub7days)->orderBy('order_date', 'ASC')->get();
        } elseif ($data['dashboard_value'] == 'last_month') {
            $get = Statistics::whereBetween('order_date', [$early_last_month, $end_of_last_month])->orderBy('order_date', 'ASC')->get();
        } elseif ($data['dashboard_value'] == 'this_month') {
            $get = Statistics::whereBetween('order_date', [$first_month, $now])->orderBy('order_date', 'ASC')->get();
        } elseif ($data['dashboard_value'] == '365day') {
            $get = Statistics::whereBetween('order_date', [$sub365days, $now])->orderBy('order_date', 'ASC')->get();
        } else {
            $get = Statistics::orderBy('order_date', 'ASC')->get();
        }

        // Kiểm tra nếu không có đơn hàng
        if ($get->count() == 0) {
            echo 'Không có đơn hàng';
        } else {
            foreach ($get as $key => $value) {
                $chart_data[] = array(
                    'period' => $value->order_date,
                    'order' => $value->total_order,
                    'sales' => $value->sales,
                    'profit' => $value->profit,
                    'quantity' => $value->quantity,
                );
            }
        }

        echo json_encode($chart_data);
    }
}
