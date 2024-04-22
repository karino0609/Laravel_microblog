@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
  <h1>{{ $title }}</h1>
  <form method="post" action="{{ route('users.update', $user) }}">
      @csrf
      @method('patch')
      <label>名前：<br>
        <input type="text" name="name" value="{{ $user->name }}">
      </label><br>
      <br>
      <label>プロフィール紹介：<br>
        <textarea name="profile" cols="40" rows="3"　class="profile_field" placeholder="プロフィールを入力">{{ $user->profile }}</textarea>
      </label><br>
      <br>
      <input type="submit" value="更新">
  </form><br>
@endsection