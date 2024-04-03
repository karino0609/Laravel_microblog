@extends('layouts.logged_in')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>

<a href="{{ url('/posts') }}">一覧に戻る</a>

<form method="post" action="{{ route('posts.update', $post->id) }}">
    @csrf
    @method('patch')
    <div>
        <label>
            <textarea name="comment" cols="40" rows="2" class="comment_field" placeholder="コメントを入力">{{$post->comment}}</textarea>
        </label>
    </div>
    <div>
        <input type="submit" value="更新">
    </div>
</form>

@endsection