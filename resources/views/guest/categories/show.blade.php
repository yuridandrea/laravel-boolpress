@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          {{-- @dd($post) --}}
          <h1>{{$category->name}}</h1>
          <span>{{$category->content}}</span>
        </div>
      </div>
    </div>
@endsection