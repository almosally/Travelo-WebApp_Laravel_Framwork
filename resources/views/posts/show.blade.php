@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default" >Go back</a>
    <h1>{{$post->title}}</h1>

    <div>
        {!!  $post->body!!}
    </div>
    <hr>
    <small>written on {{$post->created_at}}</small>
    <hr>
    @if(!Auth::guest())
        <a href="{{$post->id}}/edit" class="btn btn-default">Edit</a>
    {!!Form::open(['action'=>['PostsController@destroy',$post->id],'class'=>'pull-right','method'=>'POST'])!!}
    {{Form::hidden('_method','Delete')}}
    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}

    {!! form::close() !!}
    @endif
@endsection