@extends('layouts.master')


@section('title')
    Green Thumb
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
@stop


@section('content')
    @if(Auth::check())
        <h2>Welcome back to <em>Green Thumb</em> {{Auth::user()->name}}!</h2>
        <h3>Your Gardens</h3>
        <a href='/gardens/create'><button>Add Garden</button></a>
        @foreach($gardens as $garden)
            <a href='/gardens/show/{{ $garden->id }}'>
                <div class='each'>
                    <image alt="gardenImage" class="gardenImage" src="{{ $garden->image }}" />
                    <h4>Go To '{{ $garden->name }}'</h4>
                    <p>{{ $garden->description }}</p>
                    <a href='/gardens/delete/{{ $garden-> id}}'><button>Delete</button></a>
                    <a href='/gardens/edit/{{ $garden-> id}}'><button>Edit</button></a>
                </div>
            </a>
        @endforeach
    @else
        <h2>Welcome to <em>Green Thumb</em> the web application for managing your gardens!</h2>
        <ul>
            <li>Create gardens</li>
            <li>Populate your gardens with plants</li>
            <li>Keep a wishlist of plants that you want in the future</li>
        </ul>
        <a href='/register'><button>Get Started with your first Garden</button></a>
    @endif

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
@stop
