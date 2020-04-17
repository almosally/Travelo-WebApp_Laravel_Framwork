@extends('layouts.app')
@section('content')
    <div class="jumbotron text-center well">

        <h1>Travelo</h1>
        <p>Travelo blog for all travelers</p>


        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <p> Place for sharing experience and ideas for trip lovers.</p>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        @endif
    </div>

    <div class="row">
        @foreach($countries as $country)
            <div class="col-md-4">
                <a href="/articles/{{$country->id}}">
                    <article class="card">
                        <img class="card-img" style="width: 100%" src="/storage/country_images/{{$country->image}}">
                        <div class="overlay">
                            <div class="text">{{$country->country}}</div>
                        </div>
                    </article>
                </a>
            </div>
        @endforeach

    </div>
@endsection

