<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Comment;

class CommentController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this -> AuthLogin();
        $list = Comment::with('product')->orderBy('status', 'DESC')->get();
        return view('admin.comment.index', compact('list'));
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
    public function show($id)
    {
        //
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
    
    public function comment_status(Request $request){
        $data = $request->all();
        $comment = Comment::find($data['comment_id']);
        $comment->status = $data['comment_status'];
        $comment->save();
    }

    public function reply_comment(Request $request){
        $data = $request->all();
        $comment = new Comment();
        $comment->product_id = $data['product_id'];
        $comment->comment = $data['comment'];
        $comment->comment_parent_comment = $data['comment_id'];
        $comment->status = 0;
        $comment->name = 'LongStore';
        $comment->avatar = 'Admin.png';
        $comment->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $comment->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $comment->save();        
    }
}
