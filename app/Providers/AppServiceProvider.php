<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Info;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Brand;

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

        $category = Category::where('category_status', '1')->orderby('category_id', 'asc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'asc')->get();
        $data = [
            'info' => $info,
            'meta_title' => $meta_title,
            'meta_description' => $meta_description,
            'meta_image' => $meta_image,
            'meta_url' => $meta_url,
            'category' => $category,
            'brand' => $brand,
        ];
        View::share($data);
    }
}
