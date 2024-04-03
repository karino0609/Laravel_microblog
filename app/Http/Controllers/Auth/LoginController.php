<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

// Requestをインポート（忘れずに！）
use Illuminate\Http\Request;

class LoginController extends Controller
{
     use AuthenticatesUsers;
     
     // ログイン後のリダイレクト先を変更
     protected $redirectTo = RouteServiceProvider::HOME;
     
     public function __construct()
     {
         $this->middleware('guest')->except('logout');
     }
     
     // ログアウト後の動作をカスタマイズ
     protected function loggedOut(Request $request)
     {
         // ログイン画面にリダイレクト
         return redirect(secure_url('login'));
     }
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function username()
{
    // 認証に利用したいフィールド名に変更
    return 'name';
}

}

