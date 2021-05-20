@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          {{-- @dd($post) --}}
          <h1>{{$post->title}}</h1>
          <span>{{$post->content}}</span>
          <p>scritto da <strong>{{$post->user->name}}</strong></p>
        </div>
      </div>
    </div>
@endsection