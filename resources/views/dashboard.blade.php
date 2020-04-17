@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>
        </div>
        <div class="jumbotron text-center">
            <div class="col-lg-12">
                <img class="rounded-circle" src="{{url('/image/' . Auth::user()->image)}}" alt="Generic placeholder image" width="140" height="140">

                <h2 style="vertical-align: inherit;"> {{ Auth::user()->name }}</h2>
                <h2 style="vertical-align: inherit;"> {{ Auth::user()->email }}</h2>
                <a href="/editProfile" class="btn btn-primary">Edit profile</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">



                <div class="panel-body">
                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    <h3>Your Blog Posts</h3>
                    @if(count($posts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'DELETE', 'class' => 'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection