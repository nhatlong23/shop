<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin;
use App\Models\Social;
use Socialite;
use Illuminate\Support\Facades\Auth;
use App\Rules\Captcha;

session_start();

class AdminController extends Controller
{
    public function AuthLogin()
    {
        // if (Session::get('login_normal')) {
        //     $admin_id = Session::get('admin_id');
        // } else {
        //     $admin_id = Auth::id();
        // }
        // if ($admin_id) {
        //     return Redirect::to('dashboard');
        // } else {
        //     return Redirect::to('admin')->send();
        // }
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
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
        $data = $request->validate([
            'admin_email' => 'required|email',
            'admin_password' => 'required',
            'g-recaptcha-response' => new Captcha(),
        ]);

        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
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
}
