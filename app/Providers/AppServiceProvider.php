<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Info;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Visitors;
use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Feeship;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $info = Info::find(1);
        $meta_title = $info->info_title;
        $meta_description = $info->info_desc;
        $meta_image = '';
        $meta_url = url()->current();
        $min_price = Product::min('product_price');
        $max_price = Product::max('product_price');
        // $min_price_range = $min_price + 50000;
        // $max_price_range = $max_price + 1000000;

        //visitors
        $user_ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
        $visitor_count = 0; // Initialize with default value
        //current online
        if ($user_ip) {
            $current_online = Visitors::where('ip_address', $user_ip)->get();
            $visitor_count = $current_online->count();
            if ($visitor_count < 1) {
                $new_online = new Visitors();
                $new_online->ip_address = $user_ip;
                $new_online->date_visitor = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
                $new_online->save();
            }
        } else {
            // Handle the case when REMOTE_ADDR is not available
            // You can log an error or perform an alternative action
        }
        $category = Category::where('category_status', '1')->orderby('category_id', 'asc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'asc')->get();
        //total all
        $total_visitors = Visitors::count();
        $product_count = Product::count();
        $order_count = Order::count();
        $customer_count = Customer::count();
        $coupon_count = Coupon::count();
        $feeship_count = Feeship::count();
        $category_count = Category::count();
        $brand_count = Brand::count();

        $data = [
            'info' => $info,
            'meta_title' => $meta_title,
            'meta_description' => $meta_description,
            'meta_image' => $meta_image,
            'meta_url' => $meta_url,
            'category' => $category,
            'brand' => $brand,
            'min_price' => $min_price,
            'max_price' => $max_price,
            // 'min_price_range' => $min_price_range,
            // 'max_price_range' => $max_price_range,
            'visitor_count' => $visitor_count,
            'total_visitors' => $total_visitors,
            'product_count' => $product_count,
            'order_count' => $order_count,
            'feeship_count' => $feeship_count,
            'category_count' => $category_count,
            'brand_count' => $brand_count,
            'customer_count' => $customer_count,
            'coupon_count' => $coupon_count,
        ];
        View::share($data);
    }
}
