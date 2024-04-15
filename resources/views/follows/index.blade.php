@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
  <h1>{{ $title }}</h1>
  
  <ul class="follow_users">
      @forelse($follow_users as $follow_user)
      <li class="follow_user">
          {{ $follow_user->name }}
          <form method="post" action="{{ route('follows.destroy', $follow_user) }}" class="follow">
              @csrf
              @method('delete')
              <input type="submit" value="フォロー解除">
          </form><br>
      </li>
      @empty
      <li>フォローしているユーザーはいません。</li>
      @endforelse
  </ul>
@endsection