<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Gallery;
use File;
use Illuminate\Support\Facades\Auth;


session_start();

class ProductController extends Controller
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

    public function add_product()
    {
        $this->AuthLogin();
        $cate_product = Category::orderby('category_id', 'desc')->get();
        $brand_product = Brand::orderby('brand_id', 'desc')->get();
        return view('admin.product.add_product', compact('cate_product', 'brand_product'));
    }

    public function all_product()
    {
        $this->AuthLogin();
        // $all_product = Product::with('category', 'brand')->orderby('product_id', 'desc')->get();
        // $category = Category::pluck ('category_name', 'category_id');
        // $brand = Brand::pluck ('brand_name', 'brand_id');
        $all_product = Product::with('category', 'brand')->orderby('product_id', 'desc')->paginate(5);
        return view('admin.product.all_product', compact('all_product'));
    }

    public function save_product(Request $request)
    {
        $this->AuthLogin();
        // $data = $request->all();
        $data = $request->validate(
            [
                'product_name' => 'required|unique:tbl_product|max:100',
                'slug' => 'required|unique:tbl_product|max:100',
                'product_price' => 'required|numeric',
                'product_quantity' => 'required|numeric',
                'product_title' => 'required|max:255',
                'product_desc' => 'required',
                'product_content' => 'required',
                'product_image' => 'required',
                'product_cate' => 'required',
                'product_brand' => 'required',
                'product_status' => 'required',
            ],
            [
                'product_name.required' => 'Tên sản phẩm không được để trống',
                'product_name.unique' => 'Tên sản phẩm đã có, vui lòng nhập tên khác',
                'product_name.max' => 'Tên sản phẩm không được vượt quá 100 ký tự',
                'slug.required' => 'Slug sản phẩm không được để trống',
                'slug.unique' => 'Slug sản phẩm đã có, vui lòng nhập slug khác',
                'slug.max' => 'Slug sản phẩm không được vượt quá 100 ký tự',
                'product_price.required' => 'Giá sản phẩm không được để trống',
                'product_price.numeric' => 'Vui lòng nhập số!',
                'product_quantity.required' => 'Số lượng sản phẩm không được để trống',
                'product_quantity.numeric' => 'Vui lòng nhập số!',
                'product_title.required' => 'Tiêu đề sản phẩm không được để trống',
                'product_title.max' => 'Tiêu đề sản phẩm không được vượt quá 255 ký tự',
                'product_desc.required' => 'Mô tả sản phẩm không được để trống',
                'product_content.required' => 'Nội dung sản phẩm không được để trống',
                'product_image.required' => 'Hình ảnh sản phẩm không được để trống',
                'product_cate.required' => 'Danh mục sản phẩm không được để trống',
                'product_brand.required' => 'Thương hiệu sản phẩm không được để trống',
                'product_status.required' => 'Trạng thái sản phẩm không được để trống',
            ],
        );
        $product = new Product();
        $product->product_name = $data['product_name'];
        $product->product_price = $data['product_price'];
        $product->product_title = $data['product_title'];
        $product->product_desc = $data['product_desc'];
        $product->product_quantity = $data['product_quantity'];
        $product->product_content = $data['product_content'];
        $product->slug = $data['slug'];
        $product->category_id = $data['product_cate'];
        $product->brand_id = $data['product_brand'];
        $product->product_status = $data['product_status'];
        $product->created_at = Carbon::now();
        $product->updated_at = Carbon::now();

        $get_image = $request->file('product_image');
        $part = 'uploads/product/';
        $part_gallery = 'uploads/gallery/';
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($part, $new_image);
            $product->product_image = $new_image;
            try {
                File::copy($part . $new_image, $part_gallery . $new_image);
            } catch (\Exception $e) {
                echo 'Có lỗi xảy ra khi sao chép tệp: ', $e->getMessage();
            }
        }
        $product->save();
        $gallery = new Gallery();
        $gallery->name = $new_image;
        $gallery->images = $new_image;
        $gallery->product_id = $product->product_id;
        $gallery->save();

        Session::put('message', 'Thêm sản phẩm thành công');
        return Redirect::to('all-product');
    }

    public function unactive_product($product_id)
    {
        $this->AuthLogin();
        $product = Product::find($product_id);
        $product->product_status = 1;
        $product->save();
        Session::put('message', 'Không kích hoạt sản phẩm thành công');
        return back();
    }

    public function active_product($product_id)
    {
        $this->AuthLogin();
        $product = Product::find($product_id);
        $product->product_status = 0;
        $product->save();
        Session::put('message', 'Kích hoạt sản phẩm thành công');
        return back();
    }

    public function edit_product($product_id)
    {
        $this->AuthLogin();
        $edit_product = Product::find($product_id);
        $cate_product = Category::orderby('category_id', 'desc')->get();
        $brand_product = Brand::orderby('brand_id', 'desc')->get();
        return view('admin.product.edit_product', compact('edit_product', 'cate_product', 'brand_product'));
    }

    public function update_product(Request $request, $product_id)
    {
        $this->AuthLogin();
        // $data = $request->all();
        $data = $request->validate(
            [
                'product_name' => 'required|unique:tbl_product|max:100',
                'slug' => 'required|unique:tbl_product|max:245',
                'product_price' => 'required|numeric',
                'product_quantity' => 'numeric',
                'product_title' => 'required|max:255',
                'product_desc' => 'required|max:255',
                'product_content' => 'required',
                // 'product_image' => 'required',
                'product_cate' => 'required',
                'product_brand' => 'required',
                'product_status' => 'required',
            ],
            [
                'product_name.required' => 'Tên sản phẩm không được để trống',
                'product_name.unique' => 'Tên sản phẩm đã có, vui lòng nhập tên khác',
                'product_name.max' => 'Tên sản phẩm không được vượt quá 100 ký tự',
                'slug.required' => 'Slug sản phẩm không được để trống',
                'slug.unique' => 'Slug sản phẩm đã có, vui lòng nhập slug khác',
                'slug.max' => 'Slug sản phẩm không được vượt quá 245 ký tự',
                'product_price.required' => 'Giá sản phẩm không được để trống',
                'product_price.numeric' => 'Vui lòng nhập số!',
                // 'product_quantity.required' => 'Số lượng sản phẩm không được để trống',
                'product_quantity.numeric' => 'Vui lòng nhập số!',
                'product_title.required' => 'Tiêu đề sản phẩm không được để trống',
                'product_title.max' => 'Tiêu đề sản phẩm không được vượt quá 255 ký tự',
                'product_desc.required' => 'Mô tả sản phẩm không được để trống',
                'product_desc.max' => 'Mô tả sản phẩm không được vượt quá 255 ký tự',
                'product_content.required' => 'Nội dung sản phẩm không được để trống',
                // 'product_image.required' => 'Hình ảnh sản phẩm không được để trống',
                'product_cate.required' => 'Danh mục sản phẩm không được để trống',
                'product_brand.required' => 'Thương hiệu sản phẩm không được để trống',
                'product_status.required' => 'Trạng thái sản phẩm không được để trống',
            ],
        );

        $product = Product::find($product_id);
        $product->product_name = $data['product_name'];
        $product->product_price = $data['product_price'];
        $product->product_quantity = $data['product_quantity'];
        $product->product_title = $data['product_title'];
        $product->product_desc = $data['product_desc'];
        $product->product_content = $data['product_content'];
        $product->slug = $data['slug'];
        $product->category_id = $data['product_cate'];
        $product->brand_id = $data['product_brand'];
        $product->product_status = $data['product_status'];
        $product->created_at = Carbon::now();
        $product->updated_at = Carbon::now();
        $get_image = $request->file('product_image');
        if ($get_image) {
            if (file_exists('uploads/product/' . $product->product_image)) {
                unlink('uploads/product/' . $product->product_image);
            } else {
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move('uploads/product', $new_image);
                $product->product_image = $new_image;
            }
        }
        $product->save();
        Session::put('message', 'Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');
    }

    public function delete_product($product_id)
    {
        $this->AuthLogin();
        $product = Product::find($product_id);
        if (file_exists('uploads/product/' . $product->product_image)) {
            unlink('uploads/product/' . $product->product_image);
        }
        $product->delete();
        Session::put('message', 'Xóa sản phẩm thành công');
        return back();
    }
}
