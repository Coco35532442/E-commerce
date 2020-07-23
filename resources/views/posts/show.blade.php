
@extends('layouts/master')

@section('content')

<!-- Page Header -->
<header class="masthead" style="background-image: url('img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>{{ $post->title }}</h1>
            <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
            <span class="meta">Posted by
              <a href="#">Start Bootstrap</a>
              on {{$post->created_at->toFormattedDateString() }}</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            {{$post->body}}
        </div>
      </div>
    </div>
  </article>

  <hr>
    <div class="d-flex justify-content-center">
        <a href="/posts/{{ $post->id }}/edit" class="btn btn-info mr-2">Edit</a>
        <form action="/posts/{{$post->id}}" method="post">
          @csrf
          {{ method_field('DELETE') }}
          <input type="submit" class="btn btn-danger" value="Delete">
        </form>
    </div>

    <hr>

    <div class="container">
      <div class="row">
        <div class="col-md-10">
          @foreach($post->comments as $comment)
            <div>{{$comment->body}}</div>
          @endforeach
        </div>
      </div>
    </div>
  
@endsection