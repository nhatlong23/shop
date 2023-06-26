<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Cart;
use App\Models\City;
use App\Models\Info;
use App\Models\Category;
use App\Models\Brand;
use Carbon\Carbon;

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('tbl_product')->where('product_id', $productId)->first();
        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['title'] = $product_info->product_title;
        $data['price'] = $product_info->product_price;
        $data['weight'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);
        return Redirect::to('/show-cart');
        // Cart::destroy();
    }

    public function show_cart()
    {
        $city = City::orderBy('matp', 'ASC')->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();
        return view('pages.cart.show_cart')->with('category', $cate_product)->with('brand', $brand_product)->with('city', $city);
    }

    public function delete_to_cart($rowId)
    {
        Cart::update($rowId, 0);
        return back();
    }

    public function update_cart_quantity(Request $request)
    {
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId, $qty);
        return back();
    }

    public function cart()
    {
        $info = Info::find(1);
        $meta_title = $info->info_title;
        $meta_description = $info->info_desc;
        $meta_image = '';
        $meta_url = url()->current();

        $city = City::orderBy('matp', 'ASC')->get();
        $cate_product = Category::where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = Brand::where('brand_status', '0')->orderby('brand_id', 'desc')->get();
        return view('pages.cart.cart_ajax', compact('cate_product', 'brand_product', 'city', 'info', 'meta_title', 'meta_description', 'meta_image', 'meta_url'));
    }

    public function add_cart_ajax(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');
        if ($cart) {
            $is_avaiable = 0;
            foreach ($cart as $key => $val) {
                if ($val['product_id'] == $data['cart_product_id']) {
                    $is_avaiable++;
                }
            }
            if ($is_avaiable == 0) {
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_quantity' => $data['cart_product_quantity'],
                    'product_price' => $data['cart_product_price'],
                );
                Session::put('cart', $cart);
            }
        } else {
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_quantity' => $data['cart_product_quantity'],
                'product_price' => $data['cart_product_price'],
            );
        }
        Session::put('cart', $cart);
    }

    public function delete_cart($session_id)
    {
        $cart = Session::get('cart');
        if ($cart) {
            foreach ($cart as $key => $val) {
                if ($val['session_id'] == $session_id) {
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return back()->with('message', 'Xóa sản phẩm thành công');
        } else {
            return back()->with('message', 'Xóa sản phẩm thất bại');
        }
    }

    public function update_cart(Request $request)
    {
        $data = $request->all();
        $cart = Session::get('cart');
        if ($cart) {
            $message = '';
            foreach ($data['cart_qty'] as $key => $qty) {
                foreach ($cart as $session => $val) {
                    if ($val['session_id'] == $key && $qty < $cart[$session]['product_quantity']) {
                        $cart[$session]['product_qty'] = $qty;
                        $message .= 'Cập nhật số lượng sản phẩm ' . $cart[$session]['product_name'] . ' thành công <br>';
                    } elseif ($val['session_id'] == $key && $qty > $cart[$session]['product_quantity']) {
                        $message .= 'Sản phẩm ' . $cart[$session]['product_name'] . ' chỉ còn ' . $cart[$session]['product_quantity'] . ' sản phẩm <br>';
                    }
                }
            }
            Session::put('cart', $cart);
            return back()->with('message', $message);
        } else {
            return back()->with('message', 'Cập nhật giỏ hàng thất bại');
        }
    }

    public function delete_all_cart()
    {
        $cart = Session::get('cart');
        if ($cart) {
            Session::forget('cart');
            Session::forget('coupon');
            Session::forget('fee');
            return back()->with('message', 'Xóa giỏ hàng thành công');
        } else {
            return back()->with('message', 'Xóa giỏ hàng thất bại');
        }
    }
}
