<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;
use App\Models\Info;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Visitors;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Feeship;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register any bindings or services here
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->shareGlobalData();
    }

    /**
     * Share global data with views.
     *
     * @return void
     */
    private function shareGlobalData()
    {
        $info = Info::find(1);
        $meta_title = $info->info_title;
        $meta_description = $info->info_desc;
        $meta_image = '';
        $meta_url = Request::url();
        $min_price = Product::min('product_price');
        $max_price = Product::max('product_price');

        $user_ip = Request::ip();
        $visitor_count = Visitors::where('ip_address', $user_ip)->count();

        if ($visitor_count < 1) {
            Visitors::create([
                'ip_address' => $user_ip,
                'date_visitor' => Carbon::now('Asia/Ho_Chi_Minh')->toDateString(),
            ]);
        }

        $category = Category::where('category_status', '1')->orderBy('category_id', 'asc')->get();
        $brand = Brand::where('brand_status', '1')->orderBy('brand_id', 'asc')->get();

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
            'visitor_count' => $visitor_count,
            'total_visitors' => Visitors::count(),
            'product_count' => Product::count(),
            'order_count' => Order::count(),
            'feeship_count' => Feeship::count(),
            'category_count' => Category::count(),
            'brand_count' => Brand::count(),
            'customer_count' => Customer::count(),
            'coupon_count' => Coupon::count(),
        ];

        View::share($data);
    }
}
