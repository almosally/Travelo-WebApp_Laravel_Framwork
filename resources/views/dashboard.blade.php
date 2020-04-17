@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                            <a href="posts/create" class="btn btn-primary">Create article</a>
                    <h3>
                        Your Posts
                    </h3>
                        @if(count($posts)>0)
                    <tabe class="table table-striped">
                        <tr>
                            <th>Tilte</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->title}} </td>
                                <td> <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a> </td>
                                <td>
                                    {!!Form::open(['action'=>['PostsController@destroy',$post->id],'class'=>'pull-right','method'=>'POST'])!!}
                                    {{Form::hidden('_method','Delete')}}
                                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}

                                    {!! form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                    </tabe>
                    @else <p>You have no posts yet</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
