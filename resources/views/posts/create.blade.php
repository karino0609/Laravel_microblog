@extends('layouts.logged_in')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>

<a href="{{ url('/posts') }}">一覧に戻る</a>
<br>
<br>
<form method="post" action="{{ route('posts.store') }}">
    @csrf
    <div>
        <label>
            <textarea name="comment" cols="40" rows="2" class="comment_field" placeholder="コメントを入力"></textarea>
        </label>
    </div>
    <div>
        <br>
        <input type="submit" value="保存">
    </div>
    <br>
</form>

@endsection