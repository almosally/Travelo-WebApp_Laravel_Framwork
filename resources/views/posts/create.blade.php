@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    {!! Form::open(['action' => 'PostsController@store','method'=>'Post']) !!}
        <div class="form-group">
            {{form::label('title','Title')}}
            {{form::text('title','',['class'=>'form-control','placeholder'=>'title'])}}
        </div>
    <div class="form-group">
        {{form::label('body','Body')}}
        {{form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Body text'])}}
    </div>
    {{form::submit('Submit',['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}
@endsection