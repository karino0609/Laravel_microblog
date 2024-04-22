@extends('layouts.default')
 
@section('header')
<header>
    <ul class="header_nav">
        <li>
          <a href="{{ route('posts.index') }}">
          ペットたちの記録
          </a>
        </li>
        <li>
         <p>こんにちは、{{ Auth::user()->name }}さん！</p>
        </li>
        <li>
          <a href="{{ route('users.show', Auth::id()) }}">
            プロフィール
          </a>
        </li>
        <li>
          <a href="{{ route('follows.index') }}">
            フォローユーザー一覧
          </a>
        </li>
        <div class="header_right">
        <li>
          <a href="{{ route('posts.create') }}">
          新規投稿
          </a>
        </li>
        <br>
        <li>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <input type="submit" value="ログアウト">
          </form>
        </li>
        </div>
    </ul>
</header>
@endsection