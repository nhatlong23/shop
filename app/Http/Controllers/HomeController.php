<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\Comment;
use App\Models\Rating;
use Carbon\Carbon;
use App\Models\Visitors;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(4)->get();
        $newProducts = Product::where('created_at', '>=', now()->subDays(30))->where('product_status', 1)->inRandomOrder()->limit(10)->get();
        $recommended = Product::where('product_status', 1)->where('product_sold', '>', 5)->inRandomOrder()->limit(10)->get();
        $category_tabs = Category::where('category_status', '1')->where('category_parent', '<>', 0)->orderBy('category_id', 'desc')->get();
        return view('pages.home', compact('slider', 'newProducts', 'recommended', 'category_tabs'));
    }
    public function contact()
    {
        return view('pages.contact.index');
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
        $category = Category::where('slug', $slug)->where('category_status', true)->first();

        if (!$category) {
            return view('404');
        }

        $meta_title = $category->category_name;
        $meta_description = $category->category_desc;
        $category_name = Category::where('category_status', '1')->where('slug', $slug)->limit(1)->get();

        $category_by_slug = [];

        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
            $query = Product::with('category')->where('category_id', $category->category_id)->where('product_status', '1');

            switch ($sort_by) {
                case 'giam_dan':
                    $category_by_slug = $query->orderBy('product_price', 'DESC')->paginate(12)->appends(request()->query());
                    break;
                case 'tang_dan':
                    $category_by_slug = $query->orderBy('product_price', 'ASC')->paginate(12)->appends(request()->query());
                    break;
                case 'kytu_za':
                    $category_by_slug = $query->orderBy('product_name', 'DESC')->paginate(12)->appends(request()->query());
                    break;
                case 'kytu_az':
                    $category_by_slug = $query->orderBy('product_name', 'ASC')->paginate(12)->appends(request()->query());
                    break;
                case 'none':
                    $category_by_slug = $query->paginate(12)->appends(request()->query());
                    break;
                default:
                    // Handle invalid sort_by values
                    break;
            }

            if (isset($_GET['start_price']) && isset($_GET['end_price'])) {
                $min_price = $_GET['start_price'];
                $max_price = $_GET['end_price'];

                $category_by_slug = $query->whereBetween('product_price', [$min_price, $max_price])->paginate(12)->appends(request()->query());
            }
        } else {
            $category_by_slug = Product::with('category')->where('category_id', $category->category_id)
                ->where('product_status', '1')->paginate(12)->appends(request()->query());
        }

        return view('pages.category.show_category', compact('category_by_slug', 'category_name', 'meta_title', 'meta_description'));
    }

    public function show_brand_home($slug)
    {
        $brand = Brand::where('slug', $slug)->where('brand_status', true)->first();

        if (!$brand) {
            abort(404);
        }

        $meta_title = $brand->brand_name;
        $meta_description = $brand->brand_desc;

        $brand_name = Brand::where('brand_status', '1')->where('slug', $slug)->limit(1)->get();

        $brand_by_slug = Product::with('category', 'brand')->where('product_status', '1')->where('brand_id', $brand->brand_id)->get();

        return view('pages.brand.show_brand', compact('brand_by_slug', 'brand_name', 'meta_title', 'meta_description'));
    }


    public function details_product($slug)
    {
        $product_details = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_product.slug', $slug)
            ->get();

        if ($product_details->isEmpty()) {
            abort(404);
        }

        $firstProductDetails = $product_details->first();
        $category_id = $firstProductDetails->category_id;
        $brand_id = $firstProductDetails->brand_id;
        $product_id = $firstProductDetails->product_id;

        $product = Product::with('category', 'brand')->where('slug', $slug)->where('product_status', 1)->first();

        $meta_title = $product->product_name;
        $meta_description = $product->product_desc;
        $product_category = $firstProductDetails->category_name;
        $category_slug = $product->category->slug;

        $gallery = Gallery::where('product_id', $product_id)->get();
        $related = Product::with('category', 'brand')
            ->where('category_id', $product->category_id)
            ->inRandomOrder()
            ->whereNotIn('slug', [$slug])
            ->get();

        $comment = Comment::where('product_id', $product_id)->where('status', 1)->count();
        $rating = Rating::where('product_id', $product_id)->avg('rating');
        $rating = round($rating);
        $reviews = Rating::where('product_id', $product_id)->count();

        $product->product_views += 1;
        $product->save();

        return view('pages.detail.show_details', compact(
            'product_details',
            'related',
            'gallery',
            'meta_title',
            'meta_description',
            'product_category',
            'category_slug',
            'comment',
            'rating',
            'reviews'
        ));
    }

    public function quickview(Request $request)
    {
        $data = $request->all();
        $product_id = $data['product_id'];
        $product = Product::find($product_id);
        $gallery = Gallery::where('product_id', $product_id)->get();

        $output = [
            'product_gallery' => '',
            'product_name' => $product->product_name,
            'product_price' => number_format($product->product_price) . ' VNĐ',
            'product_desc' => $product->product_desc,
            'product_content' => $product->product_content,
            'product_id' => $product->product_id,
            'product_image' => '<p><img style="width: 100%;" src="' . asset('uploads/product/' . $product->product_image) . '" alt=""></p> ',
            'product_button' => '<input type="button" name="add-to-cart" id="buy_quickview" class="btn btn-secondary btn-sm add-to-cart-quickview" value="Mua Ngay" data-id_product="' . $product->product_id . '">',
            'product_qty' => '<input name="qty" type="number" min="1" class="cart_product_qty_' . $product->product_id . '" value="1" />',
            'product_quickview_value' => '
                <input type="hidden" value="' . $product->product_id . '" class="cart_product_id_' . $product->product_id . ' ">
                <input type="hidden" value="' . $product->product_name . '" class="cart_product_name_' . $product->product_id . ' ">
                <input type="hidden" value="' . $product->product_image . '" class="cart_product_image_' . $product->product_id . ' ">
                <input type="hidden" value="' . $product->product_price . '" class="cart_product_price_' . $product->product_id . ' ">
                <input type="hidden" value="1" class="cart_product_qty_' . $product->product_id . ' ">
                <input type="hidden" value="' . $product->product_quantity . '" class="cart_product_quantity_' . $product->product_id . ' ">
                <input name="productid_hidden" type="hidden" value="' . $product->product_id . '" />
            ',
        ];

        foreach ($gallery as $key => $gal) {
            $output['product_gallery'] .= '
                <div class="item">
                    <img src="' . asset('uploads/gallery/' . $gal->gallery_image) . '" alt="">
                </div>
            ';
        }

        echo json_encode($output);
    }

    public function load_comment(Request $request)
    {
        $product_id = $request->product_id;
        $comments = Comment::where('product_id', $product_id)->where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();

        $output = '';
        $current_time = Carbon::now('Asia/Ho_Chi_Minh');

        foreach ($comments as $comment) {
            $createdTime = Carbon::parse($comment->created_at);
            $timeAgo = $createdTime->diffForHumans();

            $output .= "
                <div class='media' style='display: flex;'>
                    <img class='mr-3 rounded-circle' alt='' src='" . asset('uploads/avatar/' . $comment->avatar) . "' />
                    <div class='media-body' style='width: 100%'>
                        <div class='row' style='margin-bottom: -20px;'>
                            <div class='col-8 dis'>
                                <h5 style='color: green;'>@$comment->name</h5>
                                <span class='margin'>- $timeAgo</span>
                            </div>
                            <div class='col-4'>
                                <div class='pull-right reply' style='margin-right: 20px;'>
                                    <a href='#'><span><i class='fa fa-reply'></i>reply</span></a>
                                </div>
                            </div>
                        </div>
                        $comment->comment
            ";

            $replies = Comment::with('product')->where('comment_parent_comment', $comment->id)->get();

            foreach ($replies as $reply) {
                $createdTime = Carbon::parse($reply->created_at);
                $timeAgo = $createdTime->diffForHumans();

                $output .= "
                    <div class='media mt-4' style='display: flex;'>
                        <a class='pr-3' href='#'><img class='rounded-circle' alt=''
                                src='" . asset('uploads/avatar/' . $reply->avatar) . "' /></a>
                        <div class='media-body'>
                            <div class='row'>
                                <div class='col-12 dis'>
                                    <h5>$reply->name</h5>
                                    <span class='margin'>- $timeAgo</span>
                                </div>
                            </div>
                            $reply->comment
                        </div>
                    </div>
                ";
            }

            $output .= '</div></div>';
        }

        echo $output;
    }

    public function send_comment(Request $request)
    {
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;

        $comment = new Comment();
        $comment->product_id = $product_id;
        $comment->name = $comment_name;
        $comment->comment = $comment_content;
        $comment->avatar = 'Cute-Avatar.png';
        $comment->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $comment->save();
    }


}
