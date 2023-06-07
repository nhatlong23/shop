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
use App\Models\Info;
use App\Models\Gallery;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $info = Info::find(1);
        $meta_title = $info->info_title;
        $meta_description = $info->info_desc;
        $meta_image = '';
        $meta_url = url()->current();
        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(4)->get();
        $all_product = Product::where('product_status', '1')->orderby('product_id', 'desc')->limit(8)->get();
        return view('pages.home', compact('category', 'brand', 'slider', 'all_product', 'info', 'meta_title', 'meta_description', 'meta_image', 'meta_url'));
    }

    public function search(Request $request)
    {
        if (($_POST['keywords_submit'])) {
            $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
            $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();

            $keywords = $request->keywords_submit;
            $info = Info::find(1);
            $meta_title = $keywords;
            $meta_description = $keywords;
            $meta_image = '';
            $meta_url = url()->current();
            $search_product = Product::where('product_name', 'like', '%' . $keywords . '%')->get();
            return view('pages.detail.search', compact('search_product', 'category', 'brand', 'meta_title', 'meta_description', 'meta_image', 'meta_url', 'info', 'keywords'));
        } else {
            return redirect()->back();
        }
    }

    public function show_category_home($slug)
    {
        $info = Info::find(1);
        $cate_slug = Category::where('slug', $slug)->first();
        $meta_title = $cate_slug->category_name;
        $meta_description = $cate_slug->category_desc;
        $meta_image = '';
        $meta_url = url()->current();

        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $category_name = Category::where('category_status', '1')->where('slug', $slug)->limit(1)->get();
        $category_by_slug = Product::where('product_status', '1')
            ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
            ->where('tbl_category_product.slug', $slug)->get();

        return view('pages.category.show_category', compact('category', 'brand', 'category_by_slug', 'category_name', 'meta_title', 'meta_description', 'meta_image', 'meta_url', 'info'));
    }

    public function show_brand_home($slug)
    {
        $info = Info::find(1);
        $brand_slug = Brand::where('slug', $slug)->first();
        $meta_title = $brand_slug->brand_name;
        $meta_description = $brand_slug->brand_desc;
        $meta_image = '';
        $meta_url = url()->current();

        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $brand_name = Brand::where('brand_status', '1')->where('slug', $slug)->limit(1)->get();
        $brand_by_slug = Product::where('product_status', '1')
            ->join('tbl_brand_product', 'tbl_product.brand_id', '=', 'tbl_brand_product.brand_id')
            ->where('tbl_brand_product.slug', $slug)->get();

        return view('pages.brand.show_brand', compact('category', 'brand', 'brand_by_slug', 'brand_name', 'meta_title', 'meta_description', 'meta_image', 'meta_url', 'info'));
    }


    public function details_product($slug)
    {
        $info = Info::find(1);
        $product = Product::where('slug', $slug)->first();
        $meta_title = $product->product_name;
        $meta_description = $product->product_desc;
        $meta_image = '';
        $meta_url = url()->current();

        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();

        $product_details = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_product.slug', $slug)->get();
        
        foreach ($product_details as $key => $value) {
            $category_id = $value->category_id;
            $product_id = $value->product_id;

            $info = Info::find(1);
            $product = Product::where('slug', $slug)->first();
            $meta_title = $product->product_name;
            $meta_description = $product->product_desc;
            $meta_image = '';
            $meta_url = url()->current();
        }
        //gallery
        $gallery = Gallery::where('product_id', $product_id)->get();
        
        $related = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_category_product.category_id', $category_id)->whereNotIn('tbl_product.slug', [$slug])->get();

        return view('pages.detail.show_details', compact('category', 'brand', 'product_details', 'related', 'gallery', 'info', 'meta_title', 'meta_description', 'meta_image', 'meta_url'));
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
