@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
  <h1>{{ $title }}</h1>
  
  <a href="{{ route('posts.create') }}">新規投稿</a>
  <ul class="post">
      @forelse($posts as $post)
          <li class="post">
            <div class="post_content">
              <div class="post_body">
                  {!! nl2br(e($post->comment)) !!}
　　　　　　　　<div class="post_body_heading">
                投稿者名：{{ $post->user->name }}
                投稿日時：({{ $post->created_at }})
                
                  [<a href="{{ route('posts.edit', $post) }}">編集</a>]
                  <form class="delete" method="post" action="{{ route('posts.destroy', $post) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="削除">
                  </form>
                </div>
              </div>
            </div>
          </li>
      @empty
      <li>投稿がありません</li>
      @endforelse
  </ul>
  @endsection
  