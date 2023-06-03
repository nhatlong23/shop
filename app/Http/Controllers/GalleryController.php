<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Product;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_id)
    {
        $product_id = $product_id;
        return view('admin.gallery.from', compact('product_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        $get_image = $request->file('file');
        if ($get_image) {
            foreach ($get_image as $key => $image) {
                $get_name_image = $image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image . rand(0, 9999) . '.' . $image->getClientOriginalExtension();
                $image->move('uploads/gallery', $new_image);
                $gallery = new Gallery();
                $gallery->name = $new_image;
                $gallery->images = $new_image;
                $gallery->product_id = $product_id;
                $gallery->save();
            }
        }
        return redirect()->back()->with('message', 'Thêm hình ảnh thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function load_gallery(Request $request)
    {
        $product_id = $request->product_id;
        $gallery = Gallery::where('product_id', $product_id)->get();
        $gallery_count = $gallery->count();

        $output = '
        <from>
        ' . @csrf_field() . '
        </from>
        <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên hình ảnh</th>
                <th>Images</th>
                <th>Quản lí</th>
            </tr>
        </thead>
        <tbody>
        ';
        if ($gallery_count > 0) {
            $i = 0;
            foreach ($gallery as $key => $gallery) {
                $i++;
                $output .= '
                <tr>
                    <td>' . $i . '</td>
                    <td contenteditable class="edit_gallery_name" data-gallery_id="' . $gallery->id . '">' . $gallery->name . '</td>
                    <td>
                        <img src="' . asset('uploads/gallery/' . $gallery->images) . '" width="100px" height="100px">
                        <input type="file" class="file_image" style="width:40%" data-gallery_id="' . $gallery->id . '" id="file-' . $gallery->id . '" accept="image/* name="file">
                    </td>
                    <td>
                        <a href="" data-gallery_id="' . $gallery->id . '" class="btn btn-danger btn-sm delete_gallery"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                ';
            }
        } else {
            $output .= '
            <tr>
                <td colspan="3" class="text-center">Không có hình ảnh nào</td>
            </tr>
            ';
        }
        $output .= '
        </tbody>
        </table>
        </from>
        ';
        echo $output;
    }

    public function update_gallery_name(Request $request)
    {
        $gallery_id = $request->gallery_id;
        $gallery_name = $request->gallery_name;
        $gallery = Gallery::find($gallery_id);
        $gallery->name = $gallery_name;
        $gallery->save();
    }

    public function delete_gallery(Request $request)
    {
        $gallery_id = $request->gallery_id;
        $gallery = Gallery::find($gallery_id);
        unlink('uploads/gallery/' . $gallery->images);
        $gallery->delete();
    }

    public function update_gallery_image(Request $request)
    {
        $gallery_id = $request->gallery_id;
        $get_image = $request->file('file');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/gallery', $new_image);
            $gallery = Gallery::find($gallery_id);
            unlink('uploads/gallery/' . $gallery->images);
            $gallery->images = $new_image;
            $gallery->save();
        }
    }
}
