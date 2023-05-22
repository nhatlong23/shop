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


session_start();

class CategoryProduct extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function add_category_product()
    {
        $this->AuthLogin();
        return view('admin.category.add_category_product');
    }

    public function all_category_product()
    {
        $this->AuthLogin();
        $all_category_product = Category::all();
        return view('admin.category.all_category_product', compact('all_category_product'));
    }

    public function save_category_product(Request $request)
    {
        $this->AuthLogin();
        // $data = $request->all();
        $data = $request->validate(
            [
                'category_product_name' => 'required|unique:tbl_category|max:100',
                'category_slug' => 'required|unique:tbl_category|max:100',
                'category_product_desc' => 'required|max:255',
                'category_product_status' => 'required',
            ],
            [
                'category_product_name.required' => 'Tên danh mục không được để trống',
                'category_product_name.unique' => 'Tên danh mục đã có, vui lòng nhập tên khác',
                'category_product_name.max' => 'Tên danh mục không được vượt quá 100 ký tự',
                'category_slug.required' => 'Slug danh mục không được để trống',
                'category_slug.unique' => 'Slug danh mục đã có, vui lòng nhập slug khác',
                'category_slug.max' => 'Slug danh mục không được vượt quá 100 ký tự',
                'category_product_desc.required' => 'Mô tả danh mục không được để trống',
                'category_product_desc.max' => 'Mô tả danh mục không được vượt quá 100 ký tự',
                'category_product_status.required' => 'Trạng thái danh mục không được để trống',
            ]
        );

        $category = new Category();
        $category->category_name = $data['category_product_name'];
        $category->slug = $data['category_slug'];
        $category->category_desc = $data['category_product_desc'];
        $category->category_status = $data['category_product_status'];
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
        $edit_category_product = Category::where('category_id', $category_product_id)->get();
        return view('admin.category.edit_category_product', compact('edit_category_product'));
    }

    public function update_category_product(Request $request, $category_product_id)
    {
        $this->AuthLogin();
        // $data = $request->all();
        $data = $request->validate(
            [
                'category_product_name' => 'required|unique:tbl_category|max:100',
                'category_slug' => 'required|unique:tbl_category|max:100',
                'category_product_desc' => 'required|max:255',
                'category_product_status' => 'required',
            ],
            [
                'category_product_name.required' => 'Tên danh mục không được để trống',
                'category_product_name.unique' => 'Tên danh mục đã có, vui lòng nhập tên khác',
                'category_product_name.max' => 'Tên danh mục không được vượt quá 100 ký tự',
                'category_slug.required' => 'Slug danh mục không được để trống',
                'category_slug.unique' => 'Slug danh mục đã có, vui lòng nhập slug khác',
                'category_slug.max' => 'Slug danh mục không được vượt quá 100 ký tự',
                'category_product_desc.required' => 'Mô tả danh mục không được để trống',
                'category_product_desc.max' => 'Mô tả danh mục không được vượt quá 100 ký tự',
                'category_product_status.required' => 'Trạng thái danh mục không được để trống',
            ]
        );
        $category = Category::find($category_product_id);
        $category->category_name = $data['category_product_name'];
        $category->slug = $data['category_slug'];
        $category->category_desc = $data['category_product_desc'];
        $category->category_status = $data['category_product_status'];
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

    public function export_csv(){

    }

    public function import_csv(){
        
    }
    
}
