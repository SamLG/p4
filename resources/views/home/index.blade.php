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
    <h2>Manage your gardens!</h2>
    <h3>My Gardens</h3>
    <a href='/gardens/create'><button>Add Garden</button></a>
    @foreach($gardens as $garden)
        <a href='/gardens/show/{{ $garden->id }}'>
            <div class='each'>
                <h4>{{ $garden->name }}</h4>
                <p>{{ $garden->description }}</p>
                <a href='/gardens/delete/{{ $garden-> id}}'><button>Delete</button></a>
                <a href='/gardens/edit/{{ $garden-> id}}'><button>Edit</button></a>
            </div>
        </a>
    @endforeach

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
@stop
