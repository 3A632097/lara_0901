<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class AdminPostsController extends Controller
{
    public function index()
    {
        //return view('admin.posts.index');

        //使用 Model 查詢資料
        $post=Post::orderBy('created_at', 'DESC')->get();
        $data=['posts'=>$post];
        return view('admin.posts.index', $data);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function edit($id)
    {
        //$data = ['id' => $id];
        //在 PostsController的 edit內取得舊資料
        $post = Post::find($id);
        $data = ['post' => $post];
        return view('admin.posts.edit', $data);
    }

    //0901(1)
//    public function store(Request $request)
//    {
//        Post::create($request->all());
//        //設定跳轉頁面
//        return redirect()->route('admin.posts.index');
//    }

    //0901(2-3)編輯 PostsController裡設定 type-­hinting
    public function store(PostRequest $request)
    {
    //
    }

    //0901(1)
    //在 PostsController的 update內更新資料
//    public function update(Request $request,$id)
//    {
//        $post = Post::find($id);
//        $post->update($request->all());
//        return redirect()->route('admin.posts.index');
//    }

    //0901(2-3)編輯 PostsController裡設定 type-­hinting
    public function update(PostRequest $request)
    {
        //
    }

    //在 PostsController的 destroy內刪除資料
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('admin.posts.index');
    }

}
