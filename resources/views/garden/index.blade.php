@extends('layouts.master')


@section('title')
    Green Thumb Garden
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
@stop


@section('content')
    <h2>Here is your garden!</h2>

    <h3>My Plants</h3>
    <div class='plant'>
        @foreach($plants as $plant)
            <a href="/plants/show/{{ $plant->id }}">
                <div class='eachPlant'>
                    <h4>{{ $plant->common_name }}</h4>
                    <p>{{ $plant->description }}</p>
                </div>
            </a>
        @endforeach
    </div>
    <h3>My Wishlist Plants</h3>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
@stop
