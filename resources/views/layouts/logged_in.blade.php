@extends('layouts.default')
 
@section('header')
<header>
    <ul class="header_nav">
        <li>
          <a href="{{ route('posts.index') }}">
          ペットの記録
          </a>
        </li>
        <li>
         <p>こんにちは、{{ Auth::user()->name }}さん！</p>
        </li>
        <div class="header_right">
        <li>
          <a href="{{ route('posts.create') }}">
          新規投稿
          </a>
        </li>
        <li>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <input type="submit" value="ログアウト">
          </form>
        </li>
        </div>
    </ul>
@if( Auth::check() )
    {{ Auth::user()->name }}
@endif
</header>
@endsection