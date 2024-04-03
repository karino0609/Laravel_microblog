<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // フォロー一覧
    public function index()
    {
        $follow_users = \Auth::user()->follow_users;
        return view('follows.index', [
            'title'=>'フォロー一覧',
            'follow_users' => $follow_users,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
 

    /**
     * Store a newly created resource in storage.
     */
    // フォロー追加
    public function store(Request $request)
    {
        $user = \Auth::user();
        Follow::create([
            'user_id' => $user->id,
            'follow_id' => $request->follow_id,
            ]);
            \Session::flash('success', 'フォローしました');
            return redirect()->route('posts.index');
    }
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    // フォロー削除
    public function destroy($id)
    {
        $follow = \Auth::user()->follows->where('folllow_id', $id)->first();
        $follow->delete();
        \Session::flash('success', 'フォロー解除しました');
        return redirect()->route('posts.index');
    }
    
    // フォロワー一覧
    public function followerIndex() 
    {
        $followers = \Auth::user()->followers;
        return view('follows.follower_index', [
            'title' => 'フォロワー一覧',
            'followers' => $followers,
            ]);
    }
}
