<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = \Auth::user();
        $follow_user_ids = $user->follow_users->pluck('id');
        $user_posts = $user->posts()->orWhereIn('user_id', $follow_user_ids)->latest()->get();
        return view('posts.index', [
            'title'=>'投稿一覧',
            'posts' => $user_posts,
            'recommended_users' => User::recommend($user->id)->get()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create', [
            'title'=>'新規投稿',
            ]);
    }
    
    // 投稿追加する場合
     public function store(PostRequest $request){
        Post::create([
          'user_id' => \Auth::user()->id,
          'comment' => $request->comment,
        ]);
        session()->flash('success', '投稿を追加しました');
        return redirect()->route('posts.index');
      }

    /**
     * Store a newly created resource in storage.
     */
     

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)//editは編集する場合
    {
        $post = Post::find($id);//idを見つけて取得
        return view('posts.edit', [
            'title'=>'投稿編集',
            'post' => $post,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, PostRequest $request)
    {
       $post = Post::find($id);//idを見つけて取得
       $post->update($request->only(['comment']));
       session()->flash('success', '投稿を編集しました');
       return redirect()->route('posts.index');
    }
    
        public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)//destroyは投稿削除の場合
    {
        $post = POST::find($id);//idを見つけて取得
        $post->delete();
        session()->flash('success', '投稿を削除しました');
        return redirect()->route('posts.index');
    }
}
