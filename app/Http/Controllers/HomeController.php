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
use Illuminate\Support\Facades\DB as FacadesDB;

class HomeController extends Controller
{
    public function index()
    {
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(4)->get();
        $newProducts = Product::where('created_at', '>=', now()->subDays(30))->where('product_status', 1)->inRandomOrder()->limit(10)->get();
        return view('pages.home', compact('slider', 'newProducts'));
    }

    public function search(Request $request)
    {
        if (($_GET['search'])) {
            $search = $request->search;
            $meta_title = $search;
            $meta_description = $search;

            $search_product = Product::where('product_name', 'like', '%' . $search . '%')->where('product_status', '1')->get();
            return view('pages.detail.search', compact('search_product', 'meta_title', 'meta_description', 'search'));
        } else {
            return redirect()->back();
        }
    }

    public function tag($tag)
    {
        $tag = str_replace("-", " ", $tag);
        $meta_title = 'Tag: ' . $tag;
        $meta_description = 'Tag: ' . $tag;
        $product_tag = Product::where('product_tag', 'LIKE', '%' . $tag . '%')
            ->orWhere('product_name', 'LIKE', '%' . $tag . '%')
            ->orWhere('slug', 'LIKE', '%' . $tag . '%')
            ->where('product_status', 1)->orderBy('updated_at', 'DESC')->paginate(20);
        return view('pages.detail.tag', compact('product_tag', 'meta_title', 'meta_description', 'tag'));
    }

    public function show_category_home($slug)
    {
        $cate_slug = Category::where('slug', $slug)->first();
        $meta_title = $cate_slug->category_name;
        $meta_description = $cate_slug->category_desc;
        $category_name = Category::where('category_status', '1')->where('slug', $slug)->limit(1)->get();

        $category_by_slug = Product::with('category', 'brand')->where('product_status', '1')->where('category_id', $cate_slug->category_id)->get();
        return view('pages.category.show_category', compact('category_by_slug', 'category_name', 'meta_title', 'meta_description'));
    }

    public function show_brand_home($slug)
    {
        $brand_slug = Brand::where('slug', $slug)->first();
        $meta_title = $brand_slug->brand_name;
        $meta_description = $brand_slug->brand_desc;
        $brand_name = Brand::where('brand_status', '1')->where('slug', $slug)->limit(1)->get();

        $brand_by_slug = Product::with('category', 'brand')->where('product_status', '1')->where('brand_id', $brand_slug->brand_id)->get();
        return view('pages.brand.show_brand', compact('brand_by_slug', 'brand_name', 'meta_title', 'meta_description'));
    }


    public function details_product($slug)
    {
        $product = Product::with('category', 'brand')->where('slug', $slug)->where('product_status', 1)->first();
        $product_details = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_product.slug', $slug)->get();
        // $product_details = Product::with('category', 'brand')
        // ->where('category_id', $product->category_id)
        // ->where('brand_id', $brand_id->brand_id)
        // ->where('slug', $slug)->where('product_status', 1)->get();

        foreach ($product_details as $key => $value) {
            $category_id = $value->category_id;
            $brand_id = $value->brand_id;
            $product_id = $value->product_id;
            $product_category = $value->category_name;
            $category_slug = $product->category->slug;

            $product = Product::where('slug', $slug)->first();
            $meta_title = $product->product_name;
            $meta_description = $product->product_desc;
        }
        //gallery
        $gallery = Gallery::where('product_id', $product_id)->get();
        $related = Product::with('category', 'brand')->where('category_id', $product->category_id)
            ->orderBy(FacadesDB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();

        return view('pages.detail.show_details', compact('product_details', 'related', 'gallery', 'meta_title', 'meta_description', 'product_category', 'category_slug'));
    }

    public function quickview(Request $request)
    {
        $data = $request->all();
        $product_id = $data['product_id'];
        $product = Product::find($product_id);
        $gallery = Gallery::where('product_id', $product_id)->get();
        $output['product_gallery'] = '';
        foreach ($gallery as $key => $gal) {
            $output['product_gallery'] .= '
            <div class="item">
                <img src="' . asset('uploads/gallery/' . $gal->gallery_image) . '" alt="">
            </div>
            ';
        }
        $output['product_name'] = $product->product_name;
        $output['product_price'] = number_format($product->product_price) . ' VNĐ';
        $output['product_desc'] = $product->product_desc;
        $output['product_content'] = $product->product_content;
        $output['product_id'] = $product->product_id;
        $output['product_image'] = '<p><img style="width: 100%;" src="' . asset('uploads/product/' . $product->product_image) . '" alt=""></p> ';
        $output['product_button'] = '<input type="button" name="add-to-cart" id="buy_quickview" class="btn btn-secondary btn-sm add-to-cart-quickview" value="Mua Ngay"
        data-id_product="' . $product->product_id . '">';
        $output['product_qty'] = '<input name="qty" type="number" min="1" class="cart_product_qty_'. $product->product_id.'" value="1" />';
        $output['product_quickview_value'] = ' 
        <input type="hidden" value=" ' . $product->product_id . ' " class="cart_product_id_' . $product->product_id . ' ">
        <input type="hidden" value=" ' . $product->product_name . ' " class="cart_product_name_' . $product->product_id . ' ">
        <input type="hidden" value=" ' . $product->product_image . ' " class="cart_product_image_' . $product->product_id . ' ">
        <input type="hidden" value=" ' . $product->product_price . ' " class="cart_product_price_' . $product->product_id . ' ">
        <input type="hidden" value="1" class="cart_product_qty_ ' . $product->product_id . ' ">
        <input type="hidden" value=" ' . $product->product_quantity . ' " class="cart_product_quantity_' . $product->product_id . ' ">
        <input name="productid_hidden" type="hidden" value=" '.$product->product_id .'" />
        ';
        echo json_encode($output);
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
