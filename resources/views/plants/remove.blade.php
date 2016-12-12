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
    <h2>Confirm transfer of {{ $plant->common_name }} to Wishlist</h2>

    <form method='POST' action='/gardens/{{ $garden->id }}/plants/remove/{{ $plant->id }}'>

        {{ method_field('DELETE') }}

        {{ csrf_field() }}

        <h3>Are you sure you want to transfer <em>{{ $plant->common_name }}</em> to Wishlist?</h3>

        <input type='submit' value='Yes'>

    </form>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
@stop
