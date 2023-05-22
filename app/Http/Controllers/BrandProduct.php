<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BrandProduct extends Controller
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
    public function add_brand_product(Request $request)
    {
        $this->AuthLogin();
        return view('admin.brand.add_brand_product');
    }

    public function all_brand_product()
    {
        $this->AuthLogin();
        // $all_brand_product = DB::table('tbl_brand_product')->get();
        $all_brand_product = Brand::all();
        return view('admin.brand.all_brand_product', compact('all_brand_product'));
    }

    public function save_brand_product(Request $request)
    {
        $this->AuthLogin();

        // $data = $request->all();
        $data = $request->validate(
            [
                'brand_product_name' => 'required|unique:tbl_brand_product,brand_name|max:255',
                'brand_slug' => 'required|unique:tbl_brand_product,slug|max:255',
                'brand_product_desc' => 'required|max:255',
                'brand_product_status' => 'required',
            ],
            [
                'brand_product_name.required' => 'Tên thương hiệu không được để trống',
                'brand_product_name.unique' => 'Tên thương hiệu đã tồn tại',
                'brand_product_name.max' => 'Tên thương hiệu không được vượt quá 255 ký tự',
                'brand_slug.required' => 'Slug không được để trống',
                'brand_slug.unique' => 'Slug đã tồn tại',
                'brand_slug.max' => 'Slug không được vượt quá 255 ký tự',
                'brand_product_desc.required' => 'Mô tả thương hiệu không được để trống',
                'brand_product_desc.max' => 'Mô tả thương hiệu không được vượt quá 255 ký tự',
                'brand_product_status.required' => 'Trạng thái thương hiệu không được để trống',
            ]
        );

        $brand = new Brand();
        $brand->brand_name = $data['brand_product_name'];
        $brand->slug = $data['brand_slug'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $brand->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $brand->save();
        Session::put('message', 'Thêm thương hiệu sản phẩm thành công');
        return redirect::to('all-brand-product');
    }

    public function unactive_brand_product($brand_product_id)
    {
        $this->AuthLogin();
        $brand = Brand::find($brand_product_id);
        $brand->brand_status = 1;
        $brand->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $brand->save();
        Session::put('message', 'Kích hoạt danh mục sản phẩm thành công');
        return back();
    }

    public function active_brand_product($brand_product_id)
    {
        $this->AuthLogin();
        $brand = Brand::find($brand_product_id);
        $brand->brand_status = 0;
        $brand->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $brand->save();
        Session::put('message', 'Không Kích hoạt danh mục sản phẩm thành công');
        return back();
    }

    public function edit_brand_product($brand_product_id)
    {
        $this->AuthLogin();
        $edit_brand_product = Brand::where('brand_id', $brand_product_id)->get();
        return view('admin.brand.edit_brand_product', compact('edit_brand_product'));
    }

    public function update_brand_product(Request $request, $brand_product_id)
    {
        $this->AuthLogin();
        // $data = $request->all();
        $data = $request->validate(
            [
                'brand_product_name' => 'required|unique:tbl_brand_product,brand_name|max:255',
                'brand_slug' => 'required|unique:tbl_brand_product,slug|max:255',
                'brand_product_desc' => 'required|max:255',
                'brand_product_status' => 'required',
            ],
            [
                'brand_product_name.required' => 'Tên thương hiệu không được để trống',
                'brand_product_name.unique' => 'Tên thương hiệu đã tồn tại',
                'brand_product_name.max' => 'Tên thương hiệu không được vượt quá 255 ký tự',
                'brand_slug.required' => 'Slug không được để trống',
                'brand_slug.unique' => 'Slug đã tồn tại',
                'brand_slug.max' => 'Slug không được vượt quá 255 ký tự',
                'brand_product_desc.required' => 'Mô tả thương hiệu không được để trống',
                'brand_product_desc.max' => 'Mô tả thương hiệu không được vượt quá 255 ký tự',
                'brand_product_status.required' => 'Trạng thái thương hiệu không được để trống',
            ]
        );

        $brand = Brand::find($brand_product_id);
        $brand->brand_name = $data['brand_product_name'];
        $brand->slug = $data['brand_slug'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        $brand->save();

        Session::put('message', 'Cập nhật danh mục sản phẩm thành công');
        return redirect::to('all-brand-product');
    }

    public function delete_brand_product(Request $request, $brand_product_id)
    {
        $this->AuthLogin();
        $data = $request->all();
        $brand = Brand::find($brand_product_id);
        $brand->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công');
        return back();
    }
}
