<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\File;
use Storage;

class FileController extends Controller
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

    public function upload_file()
    {
    }
    public function upload_image()
    {
    }
    public function upload_video()
    {
    }
    public function download_file($path, $name)
    {
        $contents = collect(Storage::cloud()->listContents('/', false))
            ->where('type', '=', 'file')
            ->where('path', '=', $path)
            ->first(); // there can be duplicate file names!
        $filename_download = $name;
        $rawData = Storage::cloud()->get($contents['path']);
        return response($rawData, 200)->header('Content-Type', $contents['mimetype'])->header('Content-Disposition', "attachment; filename=$filename_download");
    }
    public function create_file()
    {
        $this -> AuthLogin();
        Storage::cloud()->put('test.txt', 'Hello World');
        dd('File was saved to Google Drive');
    }
    public function list_file()
    {
        $this -> AuthLogin();
        $dir = '/';
        $recursive = false; // Get subdirectories also?
        $contents = collect(Storage::cloud()->listContents($dir, $recursive));
        return $contents;
    }
    public function read_file()
    {
    }
    public function delete_file($path)
    {
        $this -> AuthLogin();
        $file_info = collect(Storage::cloud()->listContents('/', false))
            ->where('type', '=', 'file')
            ->where('path', '=', $path)
            ->first(); // there can be duplicate file names!
        Storage::cloud()->delete($file_info['path']);
        dd('File was deleted from Google Drive');
    }
    public function create_forded()
    {
        $this -> AuthLogin();
        Storage::cloud()->makeDirectory('test');
        dd('Directory was created');
    }
    public function rename_forded()
    {
        $this -> AuthLogin();
        $folder = collect(Storage::cloud()->listContents('/', false))
            ->where('type', '=', 'dir')
            ->where('filename', '=', 'test')
            ->first(); // There could be duplicate directory names!
        Storage::cloud()->move($folder['path'], 'test2');
        dd('Directory was renamed');
    }
    public function delete_forded()
    {
        $this -> AuthLogin();
        $folder = collect(Storage::cloud()->listContents('/', false))
            ->where('type', '=', 'dir')
            ->where('filename', '=', 'test2')
            ->first(); // There could be duplicate directory names!
        Storage::cloud()->deleteDirectory($folder['path']);
        dd('Directory was deleted');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //read_data
    public function index()
    {
        $this -> AuthLogin();
        $dir = '/';
        $recursive = false; // Get subdirectories also?
        $contents = collect(Storage::cloud()->listContents($dir, $recursive))->where('type', '=', 'file');
        
        return view('admin.document.index', compact('contents'));
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
    public function show($id)
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
    public function update(Request $request, $id)
    {
        //
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
}
