@extends('layouts.not_logged_in')

@section('content')
 <h1>ログイン</h1>
 
 <form method="POST" action="{{ route('login') }}">
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
     
     <input type="submit" value="ログイン">
 </form><br>
@endsection