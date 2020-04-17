@extends('layouts.app')
@section('content')



    <div class="container-fluid">

        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <div class="col-lg-12">
                        <ul class="nav flex-column">

                            <div class="col-md-2 d-none d-md-block bg-light sidebar">
                                <img class="rounded-circle" src="{{url('/image/' . Auth::user()->image)}}" alt="Generic placeholder image" width="140" height="140">

                                <h2 style="vertical-align: inherit;">Admin: {{ Auth::user()->name }}</h2>
                                <a href="/editProfile" class="btn btn-primary">Edit profile</a>
                            </div>

                            <li class="nav-item">

                                <a class="nav-link active" href="/dashboard">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    Dashboard <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#admino">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                    Posts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#users">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                    Users
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="export_excel">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                                    Reports
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/posts/create">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>Create post
                                </a>
                            </li></ul></div>

                </div>
            </nav>


            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Admin Panel</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <a href="{{ route('export_excel.excel') }}" class="btn btn-sm btn-outline-secondary">Export</a>
                        </div>
                    </div>
                </div>




                <h2 id="admino">Posts</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>

                            <th>Title</th>
                            <th>User</th>
                            <th>edit</th>
                            <th>delete</th>
                            <th>more info</th>

                        </tr>
                        </thead>

                        @foreach($posts as $post)
                            <tbody>

                            <td>{{$post->title}}</td>
                            <td>{{$post->user->name}}</td>
                            <div class="row">
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                                <td>
                                    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                                <td>
                                    <a class="btn btn-success" href="/posts/{{$post->id}}">More info</a>
                                </td>
                            </div>

                            </tbody>
                        @endforeach

                    </table>
                </div>
                <br/>
                <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="779" height="327" style="display: block; height: 10px; width: 433px;"></canvas>
                <h1 id="users">web site users</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>picture</th>
                            <th>id</th>
                            <th>User name</th>
                            <th>email adress</th>
                            <th>number of posts</th>
                            <th>Action</th>

                        </tr>
                        </thead>


                        @foreach($users as $user)

                            <tbody>
                            @if($user->admin==0)
                                <td><img class="rounded-circle" src="{{url('/image/' . $user->image)}}" alt="Generic placeholder image" width="100" height="100"></td>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{count($user->posts->groupby('id'))
                     }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        {!!Form::open(['action' => ['UsersController@destroy', $user->id],'onsubmit'=> "return confirm('Are you sure?')",'method' => 'POST', 'class' => 'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                        <a href="/setadmin/{{$user->id}}" class="btn btn-success">Make As Admin</a>
                                    </div>
                                </td>
                            @endif
                            </tbody>
                        @endforeach
                    </table>
                </div>



                <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="779" height="327" style="display: block; height: 10px; width: 433px;"></canvas>

                <h1 id="users">admin users</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>picture</th>
                            <th>id</th>
                            <th>User name</th>
                            <th>email adress</th>
                            <th>number of posts</th>
                            <th>Action</th>

                        </tr>
                        </thead>


                        @foreach($users as $user)

                            <tbody>
                            @if($user->admin==1)
                                <td><img class="rounded-circle" src="{{url('/image/' . $user->image)}}" alt="Generic placeholder image" width="100" height="100"></td>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{count($user->posts->groupby('id'))
                     }}
                                </td>
                                <td>
                                    <a href="/setadmin/{{$user->id}}" class="btn btn-danger">Remove As Admin</a>

                                </td>
                            @endif
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </main></div></div>
@endsection

