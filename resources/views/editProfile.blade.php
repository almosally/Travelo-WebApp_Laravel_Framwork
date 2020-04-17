@extends('layouts.app')

@section('content')
    <h1>Edit Profile</h1>
    {!! Form::open(['action' => ['UsersController@updateProfile',$user->id ],'method'=>'PUT','enctype' => 'multipart/form-data']) !!}
    <img class="rounded-circle" src="{{url('/image/' . $user->image)}}" alt="Generic placeholder image" width="140" height="140">
    <div class="form-group">
        {{form::label('name','Name')}}
        {{form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Name'])}}
    </div>
    <div class="form-group">
        {{form::label('email','Email')}}
        {{form::text('email',$user->email,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Email'])}}
    </div>
    <div class="form-group">
        {{Form::file('user_image')}}
    </div>
    {{form::submit('Submit',['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}
@endsection