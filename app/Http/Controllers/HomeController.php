<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(4)->get();
        $all_product = Product::where('product_status', '1')->orderby('product_id', 'desc')->limit(8)->get();
        return view('pages.home', compact('category', 'brand', 'slider', 'all_product'));
    }

    public function search(Request $request)
    {
        if (($_POST['keywords_submit'])) {
            $cate_product = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
            $brand_product = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
            $keywords = $request->keywords_submit;
            $search_product = Product::where('product_name', 'like', '%' . $keywords . '%')->get();
        } else {
            return redirect()->back();
        }
        return view('pages.product.search', compact('cate_product', 'brand_product', 'search_product'));
    }

    public function show_category_home($slug)
    {
        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $category_name = Category::where('category_status', '1')->where('slug', $slug)->limit(1)->get();
        $category_by_slug = Product::where('product_status', '1')
            ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
            ->where('tbl_category_product.slug', $slug)->get();

        return view('pages.category.show_category', compact('category', 'brand', 'category_by_slug', 'category_name'));
    }

    public function show_brand_home($slug)
    {
        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $brand_name = Brand::where('brand_status', '1')->where('slug', $slug)->limit(1)->get();
        $brand_by_slug = Product::where('product_status', '1')
            ->join('tbl_brand_product', 'tbl_product.brand_id', '=', 'tbl_brand_product.brand_id')
            ->where('tbl_brand_product.slug', $slug)->get();

        return view('pages.brand.show_brand', compact('category', 'brand', 'brand_by_slug', 'brand_name'));
    }


    public function details_product($slug)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $details_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_product.slug', $slug)->get();
        foreach ($details_product as $key => $value) {
            $category_id = $value->category_id;
        }
        $related_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_category_product.category_id', $category_id)->whereNotIn('tbl_product.slug', [$slug])->get();
        return view('pages.detail.show_details')->with('category', $cate_product)
            ->with('brand', $brand_product)->with('product_details', $details_product)
            ->with('related', $related_product);
    }

    public function send_mail()
    {
        $to_name = "Long Nguyen";
        $to_email = "nhatlong23568@gmail.com"; //send to this email
        $data = array("name" => "Mail từ tài khoản khách hàng", "body" => "mail gửi về vấn đề hàng hóa");
        Mail::send('pages.send_mail', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email)->subject('Test thử gửi mail');
            $message->from($to_email, $to_name);
        });

        return redirect('/')->with('message', 'Gửi mail thành công');
    }
}
