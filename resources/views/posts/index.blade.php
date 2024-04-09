@extends('layouts.logged_in')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>


<ul class="recommended_users">
    @forelse($recommended_users as $recommended_user)
    <li>
        <a href="{{ route('users.show', $recommended_user) }}">{{ $recommended_user->name }}</a>
        @if(Auth::user()->isFollowing($recommended_user))
        <form method="post" action="{{ secure_url(route('follows.destroy', $recommended_user)) }}" class="follow">
            @csrf
            @method('delete')
            <input type="submit" value="フォロー解除">
        </form>
        @else
        <form method="post" action="{{ secure_url(route('follows.store')) }}" class="follow">
            @csrf
            <input type="hidden" name="follow_id" value="{{ $recommended_user->id }}">
            <input type="submit" value="フォロー">
        </form>
        @endif
    </li>
    @empty
    <li>他のユーザーが存在しません。</li>
    @endforelse
</ul>

<ul class="post">
    @forelse($posts as $post)
    <li class="post">
        <div class="post_content">
            <div class="post_body">
                {!! nl2br(e($post->comment)) !!}
                　　　　　　　　<div class="post_body_heading">
                    投稿者名：<a href="{{ route('users.show', $post->user) }}">{{ $post->user->name }}</a>
                    投稿日時：({{ $post->created_at }})
                    @if($post->user->id == Auth::id())
                    [<a href="{{ route('posts.edit', $post) }}">編集</a>]
                    <form class="delete" method="post" action="{{ route('posts.destroy', $post) }}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="削除">
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </li>
    @empty
    <li>投稿がありません</li>
    @endforelse
</ul>
@endsection