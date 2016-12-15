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
    <img alt="plant" class="plantImage" src="{{ $wishlistplant->image }}"/>

    <h2>Here is your wishlist plant</h2>

    <h3>{{ $wishlistplant->common_name }} ({{ $wishlistplant->scientific_name}})</h3>
    <h4>Description</h4>
    <p>
        @if( $wishlistplant->description )
            {{$wishlistplant->description}}
        @else
            <a class='button' href='/gardens/{{ $garden-> id}}/wishlistplants/edit/{{ $wishlistplant-> id}}'>Add Description</a>
        @endif
    </p>
    <h4>Prior Success</h4>
    <p>
        @if( $wishlistplant->prior_success )
            {{$wishlistplant->prior_success}}
        @else
            <a class='button' href='/gardens/{{ $garden-> id}}/wishlistplants/edit/{{ $wishlistplant-> id}}'>Add Prior Success</a>
        @endif
    </p>
    <h4>USDA Zones</h4>
    <p>
        @if( $wishlistplant->min_zone > 0)
            {{$wishlistplant->min_zone}}
        @else
            <a class='button' href='/gardens/{{ $garden-> id}}/wishlistplants/edit/{{ $wishlistplant-> id}}'>Add Minimum</a>
        @endif -
        @if( $wishlistplant->max_zone > 0)
            {{$wishlistplant->max_zone}}
        @else
            <a class='button' href='/gardens/{{ $garden-> id}}/wishlistplants/edit/{{ $wishlistplant-> id}}'>Add Maximum</a>
        @endif
    </p>
    <h4>Height</h4>
    <p>
        @if( $wishlistplant->height )
            {{$wishlistplant->height}}
        @else
            <a class='button' href='/gardens/{{ $garden-> id}}/wishlistplants/edit/{{ $wishlistplant-> id}}'>Add Height</a>
        @endif
    </p>
    <h4>Bloomtime</h4>
    <p>
        @if( $wishlistplant->bloomtime )
            {{ $wishlistplant->bloomtime }}
        @else
            <a class='button' href='/gardens/{{ $garden-> id}}/wishlistplants/edit/{{ $wishlistplant-> id}}'>Add Bloomtime</a>
        @endif
    </p>
    <h4>Last Grown</h4>
    <p>
        @if( $wishlistplant->last_grown )
            {{ $wishlistplant->last_grown }}
        @else
            <a class='button' href='/gardens/{{ $garden-> id}}/wishlistplants/edit/{{ $wishlistplant-> id}}'>Add Last Grown</a>
        @endif
    </p>
    <br>
    <a class='button' href='/gardens/{{ $garden-> id}}/wishlistplants/delete/{{ $wishlistplant-> id}}'>Delete</a>
    <a class='button' href='/gardens/{{ $garden-> id}}/wishlistplants/edit/{{ $wishlistplant-> id}}'>Edit</a>
    <a class='button' href='/gardens/{{ $garden-> id}}/wishlistplants/move/{{ $wishlistplant-> id}}'>Add to Plants</a>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
@stop
