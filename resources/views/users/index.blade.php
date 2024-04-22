@extends('layouts.logged_in')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>
<dl>
    <dt>名前</dt>
    <dd>{{ $user->name }}</dd>
    @if(Auth::user()->isFollowing($user))
<form method="post" action="{{ route('follows.destroy', $user) }}" class="follow">
    @csrf
    @method('delete')
    <input type="submit" value="フォロー解除">
</form>
@elseif (Auth::user()->id != $user->id)
<form method="post" action="{{ route('follows.store') }}" class="follow">
    @csrf
    <input type="hidden" name="follow_id" value="{{ $user->id }}">
    <input type="submit" value="フォロー">
</form>
@endif
<br>
    <dt>プロフィール紹介</dt>
    <dd>
      @if(empty($user->profile))
        プロフィール紹介はありません。
      @else
        {{ $user->profile }}
        @if ($user->id == Auth::id())
          [<a href="{{ route('users.edit', $user) }}">編集</a>]
        @endif
      @endif
    </dd>
<br>
    </dd>
    <dt>投稿一覧</dt>
    <dd>
      <ul class="post">
        @forelse($user->posts as $post)
          <li class="post">
            <div class="post_content">
              <div class="post_body">
                  {!! nl2br(e($post->comment)) !!}
　　　　　　　　<div class="post_body_heading">
                投稿日時：({{ $post->created_at }})
                </div>
              </div>
            </div>
          </li>
        @empty
          <li>投稿はありません。</li>
        @endforelse
      </ul>
    </dd>
</dl>

@endsection