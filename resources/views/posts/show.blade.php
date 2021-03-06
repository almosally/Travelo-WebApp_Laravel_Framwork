@extends('layouts.app')

@section('content')
    <a href="/articles/{{$post->country->id}}" class="btn btn-default" >Go back</a>
    <h1>{{$post->title}}</h1>
    <img style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}">
    <br><br>
    <div>
        {!!  $post->body!!}
    </div>
    <hr>
    <small>written on {{$post->created_at}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id==$post->user_id)
            <a href="{{$post->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['action'=>['PostsController@destroy',$post->id],'class'=>'pull-right','method'=>'POST'])!!}
            {{Form::hidden('_method','Delete')}}
            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
            {!! form::close() !!}

        @endif
        <a href="{{'/pdf/' . $post->id}}" class="btn btn-primary">Download PDF</a>
    @endif

@endsection