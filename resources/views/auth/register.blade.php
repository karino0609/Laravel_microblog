@extends('layouts.not_logged_in')

@section('content')
 <h1>サインアップ</h1>
 
 <form method="POST" action="{{ route('register') }}">
     @csrf
     <div>
         <label>
             ユーザー名：
             <input type="text" name="name">
         </label>
     </div><br>
     
     <div>
         <label>
             パスワード：
             <input type="password" name="password">
         </label>
     </div><br>
     
     <div>
         <label>
             パスワード（確認用）：
             <input type="password" name="password_confirmation">
         </label>
     </div><br>
     
     <div>
         <input type="submit" value="登録">
     </div><br>
 </form>
@endsection