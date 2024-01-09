<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

session_start();

class CategoryProduct extends Controller
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

    public function add_category_product()
    {
        $this->AuthLogin();
        $subcategory = Category::where('category_parent', 0)->orderBy('category_id', 'desc')->get();
        return view('admin.category.add_category_product', compact('subcategory'));
    }

    public function all_category_product()
    {
        $this->AuthLogin();
        $all_category_product = Category::all();
        $paren = Category::where('category_parent', 0)->orderBy('category_id', 'DESC')->get();
        return view('admin.category.all_category_product', compact('all_category_product', 'paren'));
    }

    public function save_category_product(Request $request)
    {
        $this->AuthLogin();
        // $data = $request->all();
        $data = $request->validate(
            [
                'category_name' => 'required|unique:tbl_category_product|max:100',
                'slug' => 'required|unique:tbl_category_product|max:100',
                'category_desc' => 'required',
                'category_parent' => 'required',
                'category_status' => 'required',
            ],
            [
                'category_name.required' => 'Tên danh mục không được để trống',
                'category_name.unique' => 'Tên danh mục đã có, vui lòng nhập tên khác',
                'category_name.max' => 'Tên danh mục không được vượt quá 100 ký tự',
                'slug.required' => 'Slug danh mục không được để trống',
                'slug.unique' => 'Slug danh mục đã có, vui lòng nhập slug khác',
                'slug.max' => 'Slug danh mục không được vượt quá 100 ký tự',
                'category_desc.required' => 'Mô tả danh mục không được để trống',
                'category_parent.required' => 'Danh mục cha không được để trống',
                'category_status.required' => 'Trạng thái danh mục không được để trống',
            ]
        );

        $category = new Category();
        $category->category_name = $data['category_name'];
        $category->slug = $data['slug'];
        $category->category_desc = $data['category_desc'];
        $category->category_parent = $data['category_parent'];
        $category->category_status = $data['category_status'];
        $category->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $category->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $category->save();
        Session::put('message', 'Thêm danh mục sản phẩm thành công');
        return Redirect::to('/add-category-product');
    }

    public function unactive_category_product($category_product_id)
    {
        $this->AuthLogin();
        $category = Category::find($category_product_id);
        $category->category_status = 1;
        $category->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $category->save();
        Session::put('message', 'Kích hoạt danh mục sản phẩm thành công');
        return back();
    }

    public function active_category_product($category_product_id)
    {
        $this->AuthLogin();
        $category = Category::find($category_product_id);
        $category->category_status = 0;
        $category->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $category->save();
        Session::put('message', 'Không Kích hoạt danh mục sản phẩm thành công');
        return back();
    }

    public function edit_category_product($category_product_id)
    {
        $this->AuthLogin();
        $subcategory = Category::orderBy('category_id', 'desc')->get();
        $edit_category_product = Category::where('category_id', $category_product_id)->get();
        return view('admin.category.edit_category_product', compact('edit_category_product', 'subcategory'));
    }

    public function update_category_product(Request $request, $category_product_id)
    {
        $this->AuthLogin();
        // $data = $request->all();
        $data = $request->validate(
            [
                'category_name' => 'required|unique:tbl_category_product|max:100',
                'slug' => 'required|unique:tbl_category_product|max:100',
                'category_desc' => 'required|max:255',
                'category_parent' => 'required',
                'category_status' => 'required',
            ],
            [
                'category_name.required' => 'Tên danh mục không được để trống',
                'category_name.unique' => 'Tên danh mục đã có, vui lòng nhập tên khác',
                'category_name.max' => 'Tên danh mục không được vượt quá 100 ký tự',
                'slug.required' => 'Slug danh mục không được để trống',
                'slug.unique' => 'Slug danh mục đã có, vui lòng nhập slug khác',
                'slug.max' => 'Slug danh mục không được vượt quá 100 ký tự',
                'category_desc.required' => 'Mô tả danh mục không được để trống',
                'category_desc.max' => 'Mô tả danh mục không được vượt quá 100 ký tự',
                'category_parent.required' => 'Danh mục cha không được để trống',
                'category_status.required' => 'Trạng thái danh mục không được để trống',
            ]
        );

        $category = Category::find($category_product_id);
        $category->category_name = $data['category_name'];
        $category->slug = $data['slug'];
        $category->category_desc = $data['category_desc'];
        $category->category_parent = $data['category_parent'];
        $category->category_status = $data['category_status'];
        $category->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $category->save();
        Session::put('message', 'Cập nhật danh mục sản phẩm thành công');

        return redirect::to('all-category-product');
    }

    public function delete_category_product($category_product_id)
    {
        $this->AuthLogin();
        $category = Category::find($category_product_id);
        $category->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công');
        return back();
    }

    public function export_csv()
    {
        //
    }

    public function import_csv()
    {
        //
    }
    public function tabs_product(Request $request)
    {
        $data = $request->all();
        $output = '';
        $products = Product::where('category_id', $data['cate_id'])->orderBy('product_id', 'desc')->limit(4)->get();
        $product_count = $products->count();
        if ($product_count > 0) {
            foreach ($products as $product) {
                $output .= '
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="' . asset('uploads/product/' . $product->product_image) . '" alt="" />
                                    <h2>' . number_format($product->product_price, 0, ',', '.') . ' VNĐ</h2>
                                    <p>' . $product->product_name . '</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>' . trans('lang.add_to_cart') . '</a>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
            }
        } else {
            $output = '<h2>Không có sản phẩm nào</h2>';
        }
        return $output;
    }


}
