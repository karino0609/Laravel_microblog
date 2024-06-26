<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;


use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $user = User::find($id); 
        return view('users.index', [
        'title'=>'プロフィール',
        'user' => $user,
         ]);
    }
    
    public function edit($id) {
        // $user = \Auth::user();
        $user = User::find($id);
        return view('users.edit',[
            'title'=>'プロフィール編集',
            'user'=>$user,
        ]);
    }
    
    public function update(UserRequest $request, $id) {
        // $user = \Auth::user();
        $user = User::find($id);
        $user->update($request->only(['name', 'profile']));
        
        session()->flash('success', 'プロフィールを変更しました');
        return redirect()->route('users.show', $user);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
