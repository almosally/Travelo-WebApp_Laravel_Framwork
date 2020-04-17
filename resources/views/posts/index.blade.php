@extends('layouts.app')

@section('content')
    <h1>ARTICLES</h1>
    @if(count($posts)>0)
        <div class="jumbotron">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <img style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}">
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">{{$post->title}}</h3>
                                        <div class="card-text">Written by: {{$post->user->name}}</div>
                                        @if (Auth::user())
                                            <a class="btn btn-primary" href="/posts/{{$post->id}}">More info</a>
                                        @else
                                            <span class="text-muted">For more info </span>
                                            <a href="/register">register</a>
                                        @endif
                                    </div></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif

@endsection
